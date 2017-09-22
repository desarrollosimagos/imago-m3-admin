<?php
//~ defined('BASEPATH') OR exit('No direct script access allowed');

Class CApis extends CI_Controller {

    public function __construct() {
        @parent::__construct();

// Load database
        $this->load->model('MTiendasVirtuales');
        $this->load->model('MProductos');
        $this->load->model('MAplicaciones');
        //~ $this->load->model('auditoria/ModelsAuditoria');
        //~ $this->load->model('busquedas_ajax/ModelsBusqueda');
    }
	
	public function mlibre(){
		// Consultamos los datos de la tienda
		$id = $this->input->get('id');
		$datosb_tienda = $this->MTiendasVirtuales->obtenerTiendas($id);  // Datos básicos de la tienda
		
		//~ print_r($datosb_tienda);
		
		//~ echo "<br><br>";
		
		$datos_aplicacion = $this->MAplicaciones->obtenerAplicacion($datosb_tienda[0]->aplicacion_id);  // Datos de la aplicación asociada
		
		//~ print_r($datos_aplicacion);
		
		$productos = $this->MTiendasVirtuales->obtenerProductosTienda($id);  // Lista de productos asociados
		
		//~ print_r($productos);
		// Si hay productos asociados
		if(count($productos) > 0){
			$meli = new Meli($datosb_tienda[0]->app_id, $datosb_tienda[0]->secret_api);
			if($datosb_tienda[0]->expires_in + time() + 1 < time()){
				$params = array('access_token' => $datosb_tienda[0]->tokens);
					
				$i = 0;
				$errores = 0;  // Número de errores (Actualizaciones fallidas)
				$num_act = 0;  // Actualizaciones exitosas
				$num_reg = 0;  // Registros exitosos
				foreach($productos as $producto){
					// Consultamos los detalles del producto
					$datos_producto = $this->MProductos->obtenerProductos($producto->producto_id);  // Detalles del producto
					// Consultamos las fotos del producto
					$fotos_producto = $this->MProductos->obtenerFotos($producto->producto_id);  // Fotos del producto
					$lista_fotos = array();
					foreach($fotos_producto as $fotos){
						$lista_fotos[] = array("source"=>base_url()."assets/img/productos/".$fotos->foto);
					}
					// Armamos la descripción a enviar
					$desc = $datos_producto[0]->descripcion;
					
					// Si la tienda virtual tiene fómula especificada le añadimos el cálculo de élla como comisión al precio del producto
					if($datosb_tienda[0]->formula == ""){
						$result = $producto->precio;
						$body = array('price' => round($result, 2), 'available_quantity' => $producto->cantidad);
					}else{
						$precio = $datosb_tienda[0]->formula;
						$p = $producto->precio;
						$f_precio = str_replace('P',$p,$precio);
						eval("\$result = $f_precio;");
						$body = array('price' => round($result, 2), 'available_quantity' => $producto->cantidad);
					}
					$response = $meli->put('/items/'.$producto->referencia, $body, $params);
					//~ print_r($response);
					//~ echo $response['httpCode'];
					if(isset($response['body']->error)){
						$errores++;
						if($response['body']->error == 'not_found'){
							// Procedemos a registrar el nuevo producto en la tienda virtual de mercado libre
							// Constriumos el item a enviar
							$item = array(
								"title" => $datos_producto[0]->nombre,
								"category_id" => "MLV1227",
								"price" => round($result, 2),
								"currency_id" => "VEF",
								"available_quantity" => $producto->cantidad,
								"buying_mode" => "buy_it_now",
								"listing_type_id" => "bronze",
								"condition" => "new",
								"description" => $desc,
								//~ "video_id" => "RXWn6kftTHY",
								//~ "warranty" => "12 month by Ray Ban",
								"pictures" => $lista_fotos  // Arreglo con lista de fotos
							);
							
							// Ejecutamos el método de envío de ítems
							$response_reg = $meli->post('/items', $item, $params);
							// Aumentamos el contador de registros si el ítem fue registrado correctamente
							if($response_reg['httpCode'] == '201'){
								$num_reg++;
								//~ print_r($response_reg);
								// Actualizamos el código de referencia en la tabla de asociaciones de productos con tiendas virtuales 'productos_tiendav'
								$cod_ref = $response_reg['body']->id;
								//~ $cod_ref = explode('MLV', $cod_ref);
								//~ $cod_ref = $cod_ref[1];
								$data_referencia = array(
									'producto_id' => $producto->producto_id, 
									'tiendav_id' => $id,
									'referencia' => $cod_ref
								);
								$update_referencia = $this->MTiendasVirtuales->update_tp($data_referencia);
							}
						}
					}else{
						// Si no hubo errores en el envío del precio y la cantidad, entonces enviamos la descripción
						$body = array('text' => $desc);
						$response_desc = $meli->put('/items/'.$producto->referencia.'/description', $body, $params);
						if(isset($response_desc['body']->error)){
							print_r($response_desc);
						}
					}
					if($response['httpCode'] == '200'){
						$num_act++;
					}
					//~ echo "<br>";
					//~ echo "<br>";
					$i++;
				}
				$this->load->view('base');
				$data['mensaje'] = "Ha actualizado los precios con exito!";
				$data['num_act'] = $num_act;
				$data['errores'] = $errores;
				$data['registros'] = $num_reg;
				$this->load->view('price_update', $data);
				$this->load->view('footer');
			}else{
				if(isset($_GET['code'])) {
					//~ // If the code was in get parameter we authorize
					$user = $meli->authorize($_GET['code'], base_url().'mercado/update?id='.$id);
					//~ 
					//~ // Now we create the sessions with the authenticated user
					if(isset($user['body']->access_token)){
						$_SESSION['access_token'] = $user['body']->access_token;
						$_SESSION['expires_in'] = $user['body']->expires_in;
						//~ $_SESSION['refrsh_token'] = $user['body']->refresh_token;
						//~ print_r($_SESSION['access_token']);
						//~ print_r($_SESSION['expires_in']);
						
						// Registramos el token y el tiempo en base de datos
						$datos = array(
							'id' => $id,
							'nombre' => $datosb_tienda[0]->nombre,
							'tokens' => $user['body']->access_token,
							'expires_in' => $user['body']->expires_in
						);
						
						$result = $this->MTiendasVirtuales->update($datos);
						
						//~ // We can check if the access token in invalid checking the time
						if($_SESSION['expires_in'] + time() + 1 < time()) {
							try {
								print_r($meli->refreshAccessToken());
							} catch (Exception $e) {
								echo "Exception: ",  $e->getMessage(), "\n";
							}
						}
						
						$params = array('access_token' => $_SESSION['access_token']);
						
						$i = 0;
						$errores = 0;  // Número de errores (Actualizaciones fallidas)
						$num_act = 0;  // Actualizaciones exitosas
						$num_reg = 0;  // Registros exitosos
						foreach($productos as $producto){
							// Consultamos los detalles del producto
							$datos_producto = $this->MProductos->obtenerProductos($producto->producto_id);  // Detalles del producto
							// Consultamos las fotos del producto
							$fotos_producto = $this->MProductos->obtenerFotos($producto->producto_id);  // Fotos del producto
							$lista_fotos = array();
							foreach($fotos_producto as $fotos){
								$lista_fotos[] = array("source"=>base_url()."assets/img/productos/".$fotos->foto);
							}
							// Armamos la descripción a enviar
							$desc = $datos_producto[0]->descripcion;
							
							// Si la tienda virtual tiene fómula especificada le añadimos el cálculo de élla como comisión al precio del producto
							if($datosb_tienda[0]->formula == ""){
								$result = $producto->precio;
								$body = array('price' => round($result, 2), 'available_quantity' => $producto->cantidad);
							}else{
								$precio = $datosb_tienda[0]->formula;
								$p = $producto->precio;
								$f_precio = str_replace('P',$p,$precio);
								eval("\$result = $f_precio;");
								$body = array('price' => round($result, 2), 'available_quantity' => $producto->cantidad);
							}
							//~ $body = array('price' => $producto->precio);

							$response = $meli->put('/items/'.$producto->referencia, $body, $params);
							//~ print_r($response);
							//~ echo $response['httpCode'];
							if(isset($response['body']->error)){
								$errores++;
								//~ echo $producto->referencia;
								//~ print_r($response);
								if($response['body']->error == 'not_found'){
									// Procedemos a registrar el nuevo producto en la tienda virtual de mercado libre
									// Constriumos el item a enviar
									$item = array(
										"title" => $datos_producto[0]->nombre,
										"category_id" => "MLV1227",
										"price" => round($result, 2),
										"currency_id" => "VEF",
										"available_quantity" => $producto->cantidad,
										"buying_mode" => "buy_it_now",
										"listing_type_id" => "bronze",
										"condition" => "new",
										"description" => $desc,
										//~ "video_id" => "RXWn6kftTHY",
										//~ "warranty" => "12 month by Ray Ban",
										"pictures" => $lista_fotos  // Arreglo con lista de fotos
									);
									
									// Ejecutamos el método de envío de items
									$response_reg = $meli->post('/items', $item, $params);
									// Aumentamos el contador de registros si el ítem fue registrado correctamente
									if($response_reg['httpCode'] == '201'){
										$num_reg++;
										//~ print_r($response_reg);
										// Actualizamos el código de referencia en la tabla de asociaciones de productos con tiendas virtuales 'productos_tiendav'
										$cod_ref = $response_reg['body']->id;
										//~ $cod_ref = explode('MLV', $cod_ref);
										//~ $cod_ref = $cod_ref[1];
										$data_referencia = array(
											'producto_id' => $producto->producto_id, 
											'tiendav_id' => $id,
											'referencia' => $cod_ref
										);
										$update_referencia = $this->MTiendasVirtuales->update_tp($data_referencia);
									}
								}
							}else{
								// Si no hubo errores en el envío del precio y la cantidad, entonces enviamos la descripción
								$body = array('text' => $desc);
								$response_desc = $meli->put('/items/'.$producto->referencia.'/description', $body, $params);
								if(isset($response_desc['body']->error)){
									print_r($response_desc);
								}
							}
							if($response['httpCode'] == '200'){
								$num_act++;
							}
							//~ echo "<br>";
							//~ echo "<br>";
							$i++;
						}
						$this->load->view('base');
						$data['mensaje'] = "Ha actualizado los precios con exito!";
						$data['num_act'] = $num_act;
						$data['errores'] = $errores;
						$data['registros'] = $num_reg;
						$this->load->view('price_update', $data);
						$this->load->view('footer');
					}else{
						$redirect = $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']);
						redirect($redirect);
					}
				} else {
					//~ echo "ingreso2";
					//~ echo '<a href="' . $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']) . '">Login</a>';
					$redirect = $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']);
					redirect($redirect);
				}
			}
		}else{
			$this->load->view('base');
			$data['mensaje'] = "No hubo cambios!";
			$this->load->view('price_update', $data);
			$this->load->view('footer');
		}
		
	}
	
	public function olx($id){
		$id = $this->input->get('id');
		$productos = $this->MTiendasVirtuales->obtenerProductosTienda($id);
		
		print_r($productos);
		
		echo count($productos);
	}
	
	public function prestashop($id){
		$id = $this->input->get('id');
		$productos = $this->MTiendasVirtuales->obtenerProductosTienda($id);
		
		print_r($productos);
		
		echo count($productos);
	}
	
	// Genera un json con los datos de un producto por id dado
	public function product()
    {
		$data['id'] = $this->uri->segment(3);
        $result = $this->MProductos->obtenerProductos($data['id']);
        echo json_encode($result);
    }

}
