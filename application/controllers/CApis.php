<?php
//~ defined('BASEPATH') OR exit('No direct script access allowed');

Class CApis extends CI_Controller {

    public function __construct() {
        @parent::__construct();

// Load database
        $this->load->model('MTiendasVirtuales');
        $this->load->model('MColas');
        $this->load->model('MProductos');
        $this->load->model('MAplicaciones');
        $this->load->model('MApis');
    }
	
	// Método para sincronizar los datos de los productos de la tienda virtual seleccionada
	public function mlibre(){
		
		// Fecha
		$fecha = date('Y-m-d H-i-s');
		
		$id;
		
		// Capturamos el id de la tienda virtual. Si viene el id de la tienda directamente en la url lo tomamos por defecto.
		if(isset($_GET['id'])){
			
			$id = $this->input->get('id');
			
		}
		
		// Si por el contrario viene el id de una cola procedemos a buscar el id de la tienda virtual asociada a dicha cola.
		if(isset($_GET['cola_id'])){
			
			$datosb_cola = $this->MColas->obtenerCola($this->input->get('cola_id'));  // Datos básicos de la cola
			
			$id = $datosb_cola[0]->tiendav_id;
			
		}
		
		$datosb_tienda = $this->MTiendasVirtuales->obtenerTiendas($id);  // Datos básicos de la tienda
		
		$datos_aplicacion = $this->MAplicaciones->obtenerAplicacion($datosb_tienda[0]->aplicacion_id);  // Datos de la aplicación asociada
		
					
		// Verificamos si hay una cola pendiente de la tienda elegida
		$pendiente = $this->MApis->obtenerByTiendavEstatus($id, 3);
		
		if(count($pendiente) > 0){
			
			// Buscamos los detalles (productos) asociados a la cola pendiente
			$id_cola = $pendiente[0]->id;
			
			$productos = $this->MApis->obtenerDetallesEstatus($id_cola, 2);  // Lista de productos asociados a la cola de sincronización pendiente
			
			// Pasamos la cola al status 2 (En proceso...)
			// Armamos los datos a actualizar
			$data = array(
				'id' => $id_cola,
				'status' => 2
			);
			
			$result = $this->MApis->update_cola($data);
						
			//~ echo count($productos);
			//~ echo " (Para actualizar)";
			
		}else{
			
			// Primero buscamos si hay cola en proceso (status=2)
			$en_proceso = $this->MApis->obtenerByTiendavEstatus($id, 2);
			
			// Si hay cola en proceso, buscamos los detalles pendientes asociados a élla, si no, creamos una cola nueva con sus detalles pendientes
			if(count($en_proceso) > 0){
				
				$id_cola = $en_proceso[0]->id;
				$productos = $this->MApis->obtenerDetallesEstatus($id_cola, 2);  // Lista de productos pendientes asociados a la cola de sincronización en proceso...
				
			}else{
				
				// Registramos la nueva cola
				$datos_cola = array(
					'user_id' => $this->session->userdata['logged_in']['id'],
					'tiendav_id' => $id,
					'tienda_id' => $datosb_tienda[0]->tienda_id,
					'fecha' => date('Y-m-d'),
					'hora' => date('H:i:s'),
					'status' => 2,
				);
				$id_cola = $this->MApis->insertCola($datos_cola);
				
				// Buscamos los productos asociados a la tienda virtual
				$productos = $this->MTiendasVirtuales->obtenerProductosTienda($id);  // Lista de productos asociados
				
				// Registramos en la tabla cola_detalle los detalles de los productos a sincronizar
				foreach($productos as $producto){
					
					$datos_producto = $this->MProductos->obtenerProductos($producto->producto_id);  // Detalles del producto
					
					// Datos del detalle a registrar
					$datos_detalle = array(
						'producto_id' => $datos_producto[0]->id,
						'categoria_id' => $producto->categoria_id,
						'nombre' => $datos_producto[0]->nombre,
						'precio' => $producto->precio,
						'cantidad' => $producto->cantidad,
						'descripcion' => $datos_producto[0]->descripcion,
						'referencia' => $producto->referencia,
						'cola_id' => $id_cola,
						'status' => 2
					);
					$reg_detalle = $this->MApis->insertColaDetalle($datos_detalle);  // Registro de detalles del producto
					
				}
				
				// Buscamos los productos asociados a la cola
				$productos = $this->MApis->obtenerDetalles($id_cola);  // Lista de productos asociados a la cola de sincronización
				
			}
			
			//~ echo count($productos);
			//~ echo " (Para registrar)";
			
		}
		
		// Si hay productos asociados
		if(count($productos) > 0){
			
			$meli = new Meli($datosb_tienda[0]->app_id, $datosb_tienda[0]->secret_api);
			if($datosb_tienda[0]->expires_in + time() + 1 < time()){
				$params = array('access_token' => $datosb_tienda[0]->tokens);
				
				// Generamos un archivo con la lista de productos
				// $this->list_items($productos, $fecha);
										
				$i = 0;
				$errores = 0;  // Número de errores (Actualizaciones fallidas)
				$detalles_errores = '';  // Detalles de errores (Actualizaciones fallidas)
				$num_act = 0;  // Actualizaciones exitosas
				$num_reg = 0;  // Registros exitosos
				$captura_eventos = array();  // Captura de eventos e incidencias al actualizar precios
				foreach($productos as $producto){
					// Consultamos las fotos del producto
					$fotos_producto = $this->MProductos->obtenerFotos($producto->producto_id);  // Fotos del producto
					$lista_fotos = array();
					if(count($fotos_producto) > 0){
						foreach($fotos_producto as $fotos){
							$lista_fotos[] = array("source"=>base_url()."assets/img/productos/".$fotos->foto);
						}
					}else{
						$lista_fotos[] = array("source"=>base_url()."assets/img/productos/default.png");
					}
							
					// Consultamos los datos de la categoría del producto si ésta es diferente de 0 (cero)
					$categoria_id = 0;
					$categoria_referencia = "MLV1227";
					if($producto->categoria_id != 0){
						$data_categoria = $this->MApis->obtenerCategoria($producto->categoria_id);
						$categoria_id = $data_categoria[0]->id;
						$categoria_referencia = $data_categoria[0]->referencia;
					}
					
					//~ // Si el precio en bolívares del producto está en cero, lo pasamos a 1
					//~ if($producto->precio == 0){
						//~ $precio_bolivares = 1;
					//~ }else{
						//~ $precio_bolivares = $producto->precio;
					//~ }
					$precio_bolivares = $producto->precio;
					
					// Primero recortamos la cadena de nombre si su longitud supera los 60 caracteres
					if(strlen($producto->nombre) > 60){
						$nombre_producto = substr($producto->nombre, 0, 57)."...";
					}else{
						$nombre_producto = $producto->nombre;
					}
					
					// Si la tienda virtual tiene fórmula especificada le añadimos el cálculo de élla como comisión al precio del producto
					if($datosb_tienda[0]->formula == ""){
						$result = $precio_bolivares;
						$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto->cantidad, 'pictures' => $lista_fotos);
					}else{
						$precio = $datosb_tienda[0]->formula;
						$p = $precio_bolivares;
						$f_precio = str_replace('P',$p,$precio);
						eval("\$result = $f_precio;");
						$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto->cantidad, 'pictures' => $lista_fotos);
					}
					$response = $meli->put('/items/'.$producto->referencia, $body, $params);
					// print_r($response);
					//~ echo $response['httpCode'];
					if(isset($response['body']->error)){
						$errores++;
						//~ print_r($response['body']);
						if($response['body']->error == 'not_found'){
							// Procedemos a registrar el nuevo producto en la tienda virtual de mercado libre
							
							// Constriumos el item a enviar
							$item = array(
								"title" => $nombre_producto,
								"category_id" => $categoria_referencia,
								"price" => round($result, 2),
								"currency_id" => "VES",
								"available_quantity" => $producto->cantidad,
								"buying_mode" => "buy_it_now",
								"listing_type_id" => "bronze",
								"condition" => "new",
								"description" => array('plain_text' => $producto->descripcion),
								"pictures" => $lista_fotos  // Arreglo con lista de fotos
							);
							
							// Ejecutamos el método de envío de ítems
							$response_reg = $meli->post('/items', $item, $params);
							// Aumentamos el contador de registros si el ítem fue registrado correctamente
							if($response_reg['httpCode'] == '201'){
								$num_reg++;
								// Registro de incidencia
								$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$response_reg['body']->id.", Evento: Registrado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
								// Actualizamos el código de referencia en la tabla de asociaciones de productos con tiendas virtuales 'productos_tiendav'
								$cod_ref = $response_reg['body']->id;
								$data_referencia = array(
									'producto_id' => $producto->producto_id, 
									'tiendav_id' => $id,
									'referencia' => $cod_ref
								);
								$update_referencia = $this->MTiendasVirtuales->update_tp($data_referencia);
								
								// Actualizamos el estatus del detalle a 1 (Procesado)
								$data_up = array(
									'id' => $producto->id,
									'detalles' => $response_reg['httpCode']." - Registrado...",
									'status' => 1
								);
								$update_detalle = $this->MApis->update_detalle_cola($data_up);
							}else{
								// Actualizamos el campo 'detalles' del detalle con la información devuelta por la API
								$detalles_errores .= $response['body']->cause[0]->message."-";
								//~ print_r($response_reg['body']->cause);
								//~ exit();
								$data_up = array(
									'id' => $producto->id,
									'detalles' => $response_reg['httpCode']." - ".$response_reg['body']->error." - ".$response_reg['body']->message
								);
								$update_detalle = $this->MApis->update_detalle_cola($data_up);
								
								//~ echo $response_reg['httpCode'];
								//~ echo " - ";
								//~ print_r($response_reg['body']->error);
								//~ echo "<br>";
								//~ print_r($response_reg['body']);
								//~ echo "<br>";
								//~ echo "Producto: ".$producto->producto_id;
								//~ echo "<br>";
								//~ echo "Precio: ".$result;
								//~ echo "<br>";
							}
						}else if(strpos($response['body']->message, 'status:closed') !== false){
							// Registro de incidencia
							$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$producto->referencia.", Evento: ".$response['body']->error."1, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
							// Actualizamos el estatus del detalle a 1 y registramos el detalle del error
							$data_up = array(
								'id' => $producto->id,
								'detalles' => $response['httpCode']." - ".$response['body']->error." - ".$response['body']->message,
								'status' => 1
							);
							$update_detalle = $this->MApis->update_detalle_cola($data_up);							
						}else{
							// Registro de incidencia
							$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$producto->referencia.", Evento: ".$response['body']->error."2, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
							// Registramos el detalle del error
							$detalles_errores .= $response['body']->cause[0]->message."-";
							//~ echo $detalles_errores;
							//~ print_r($response['body']->cause);
							//~ exit();
							$data_up = array(
								'id' => $producto->id,
								'detalles' => $response['httpCode']." - ".$response['body']->error." - ".$response['body']->message
							);
							$update_detalle = $this->MApis->update_detalle_cola($data_up);
						}
					}else{
						// Si no hubo errores en el envío del precio y la cantidad, entonces enviamos la descripción
						$body = array('plain_text' => $producto->descripcion);
						$response_desc = $meli->put('/items/'.$producto->referencia.'/description', $body, $params);
						if(isset($response_desc['body']->error)){
							print_r($response_desc);
							// Registramos el detalle del error
							$data_up = array(
								'id' => $producto->id,
								'detalles' => $response_desc['httpCode']." - ".$response_desc['body']->error." - ".$response_desc['body']->message
							);
							$update_detalle = $this->MApis->update_detalle_cola($data_up);
						}
					}
					if($response['httpCode'] == '200'){
						$num_act++;
						// Registro de incidencia
						$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$response['body']->id.", Evento: Actualizado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
						
						// Actualizamos el estatus del detalle a 1 (Procesado)
						$data_up = array(
							'id' => $producto->id,
							'detalles' => $response['httpCode']." - Actualizado...",
							'status' => 1
						);
						$update_detalle = $this->MApis->update_detalle_cola($data_up);
					}
					$i++;
				}
				// Proceso de actualización final de la cola, si quedan detalles pendientes el estatus de la cola pasa a 3, 
				// si no, pasa a 1
				$detalles_pendientes = $this->MApis->obtenerDetallesEstatus($id_cola, 2);
				$st = 1;
				if(count($detalles_pendientes) > 0){
					$st = 3;
				}
				// Armamos los datos a actualizar
				$data = array(
					'id' => $id_cola,
					'status' => $st
				);
				
				$result = $this->MApis->update_cola($data);
				
				// Generamos el log
				$this->logs($captura_eventos, $fecha);
				
				$this->load->view('base');
				$data['mensaje'] = "Ha actualizado los precios con exito!";
				$data['num_act'] = $num_act;
				$data['errores'] = $errores;
				$data['detalles_errores'] = $detalles_errores;
				$data['registros'] = $num_reg;
				$this->load->view('price_update', $data);
				$this->load->view('footer');
			}else{
				if(isset($_GET['code'])) {
					// If the code was in get parameter we authorize
					$user = $meli->authorize($_GET['code'], base_url().'mercado/update?id='.$id);
					 
					// Now we create the sessions with the authenticated user
					if(isset($user['body']->access_token)){
						$_SESSION['access_token'] = $user['body']->access_token;
						$_SESSION['expires_in'] = $user['body']->expires_in;
						
						// Registramos el token y el tiempo en base de datos
						$datos = array(
							'id' => $id,
							'nombre' => $datosb_tienda[0]->nombre,
							'tokens' => $user['body']->access_token,
							'expires_in' => $user['body']->expires_in
						);
						
						$result = $this->MTiendasVirtuales->update($datos);
						
						// We can check if the access token in invalid checking the time
						if($_SESSION['expires_in'] + time() + 1 < time()) {
							try {
								print_r($meli->refreshAccessToken());
							} catch (Exception $e) {
								echo "Exception: ",  $e->getMessage(), "\n";
							}
						}
						
						$params = array('access_token' => $_SESSION['access_token']);
						
						// Generamos un archivo con la lista de productos
						// $this->list_items($productos, $fecha);
						
						$i = 0;
						$errores = 0;  // Número de errores (Actualizaciones fallidas)
						$detalles_errores = '';  // Detalles de errores (Actualizaciones fallidas)
						$num_act = 0;  // Actualizaciones exitosas
						$num_reg = 0;  // Registros exitosos
						$captura_eventos = array();  // Captura de eventos e incidencias al actualizar precios
						foreach($productos as $producto){
							// Consultamos las fotos del producto
							$fotos_producto = $this->MProductos->obtenerFotos($producto->producto_id);  // Fotos del producto
							$lista_fotos = array();
							if(count($fotos_producto) > 0){
								foreach($fotos_producto as $fotos){
									$lista_fotos[] = array("source"=>base_url()."assets/img/productos/".$fotos->foto);
								}
							}else{
								$lista_fotos[] = array("source"=>base_url()."assets/img/productos/default.png");
							}
							
							// Consultamos los datos de la categoría del producto si ésta es diferente de 0 (cero)
							$categoria_id = 0;
							$categoria_referencia = "MLV1227";
							if($producto->categoria_id != 0){
								$data_categoria = $this->MApis->obtenerCategoria($producto->categoria_id);
								$categoria_id = $data_categoria[0]->id;
								$categoria_referencia = $data_categoria[0]->referencia;
							}
							
							//~ // Si el precio en bolívares del producto está en cero, lo pasamos a 1
							//~ if($producto->precio == 0){
								//~ $precio_bolivares = 1;
							//~ }else{
								//~ $precio_bolivares = $producto->precio;
							//~ }
							$precio_bolivares = $producto->precio;
							
							// Primero recortamos la cadena de nombre si su longitud supera los 60 caracteres
							if(strlen($producto->nombre) > 60){
								$nombre_producto = substr($producto->nombre, 0, 57)."...";
							}else{
								$nombre_producto = $producto->nombre;
							}
							
							// Si la tienda virtual tiene fórmula especificada le añadimos el cálculo de élla como comisión al precio del producto
							if($datosb_tienda[0]->formula == ""){
								$result = $precio_bolivares;
								$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto->cantidad, 'pictures' => $lista_fotos);
							}else{
								$precio = $datosb_tienda[0]->formula;
								$p = $precio_bolivares;
								$f_precio = str_replace('P',$p,$precio);
								eval("\$result = $f_precio;");
								$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto->cantidad, 'pictures' => $lista_fotos);
							}

							$response = $meli->put('/items/'.$producto->referencia, $body, $params);
							// print_r($response);
							//~ echo $response['httpCode'];
							if(isset($response['body']->error)){
								$errores++;
								//~ print_r($response['body']);
								if($response['body']->error == 'not_found'){
									// Procedemos a registrar el nuevo producto en la tienda virtual de mercado libre
									
									// Constriumos el item a enviar
									$item = array(
										"title" => $nombre_producto,
										"category_id" => $categoria_referencia,
										"price" => round($result, 2),
										"currency_id" => "VES",
										"available_quantity" => $producto->cantidad,
										"buying_mode" => "buy_it_now",
										"listing_type_id" => "bronze",
										"condition" => "new",
										"description" => array('plain_text' => $producto->descripcion),
										"pictures" => $lista_fotos  // Arreglo con lista de fotos
									);
									
									// Ejecutamos el método de envío de items
									$response_reg = $meli->post('/items', $item, $params);
									// Aumentamos el contador de registros si el ítem fue registrado correctamente
									if($response_reg['httpCode'] == '201'){
										$num_reg++;
										// Registro de incidencia
										$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$response_reg['body']->id.", Evento: Registrado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
										// print_r($response_reg);
										// Actualizamos el código de referencia en la tabla de asociaciones de productos con tiendas virtuales 'productos_tiendav'
										$cod_ref = $response_reg['body']->id;
										$data_referencia = array(
											'producto_id' => $producto->producto_id, 
											'tiendav_id' => $id,
											'referencia' => $cod_ref
										);
										$update_referencia = $this->MTiendasVirtuales->update_tp($data_referencia);
										
										// Actualizamos el estatus del detalle a 1 (Procesado)
										$data_up = array(
											'id' => $producto->id,
											'detalles' => $response_reg['httpCode']." - Registrado...",
											'status' => 1
										);
										$update_detalle = $this->MApis->update_detalle_cola($data_up);
									}else{
										// Actualizamos el campo 'detalles' del detalle con la información devuelta por la API
										$detalles_errores .= $response['body']->cause[0]->message."-";
										//~ print_r($response_reg['body']->cause);
										//~ exit();
										$data_up = array(
											'id' => $producto->id,
											'detalles' => $response_reg['httpCode']." - ".$response_reg['body']->error." - ".$response_reg['body']->message
										);
										$update_detalle = $this->MApis->update_detalle_cola($data_up);
										
										//~ echo $response_reg['httpCode'];
										//~ echo " - ";
										//~ print_r($response_reg['body']->error);
										//~ echo "<br>";
										//~ exit();
										//~ print_r($response_reg['body']);
										//~ echo "<br>";
										//~ echo "Producto: ".$producto->producto_id;
										//~ echo "<br>";
										//~ echo "Precio: ".$result;
										//~ echo "<br>";
									}
								}else if(strpos($response['body']->message, 'status:closed') !== false){
									// Registro de incidencia
									$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$producto->referencia.", Evento: ".$response['body']->error."1, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
									// Actualizamos el estatus del detalle a 1 y registramos el detalle del error
									$data_up = array(
										'id' => $producto->id,
										'detalles' => $response['httpCode']." - ".$response['body']->error." - ".$response['body']->message,
										'status' => 1
									);
									$update_detalle = $this->MApis->update_detalle_cola($data_up);
								}else{
									//~ print_r($response['body']);
									$detalles_errores .= $response['body']->cause[0]->message."-";
									//~ echo $detalles_errores;
									//~ print_r($response['body']->cause);
									//~ exit();
									// Registro de incidencia
									$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$producto->referencia.", Evento: ".$response['body']->error."2, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
									// Registramos el detalle del error
									$data_up = array(
										'id' => $producto->id,
										'detalles' => $response['httpCode']." - ".$response['body']->error." - ".$response['body']->message
									);
									$update_detalle = $this->MApis->update_detalle_cola($data_up);
								}
							}else{
								// Si no hubo errores en el envío del precio y la cantidad, entonces enviamos la descripción
								$body = array('plain_text' => $producto->descripcion);
								$response_desc = $meli->put('/items/'.$producto->referencia.'/description', $body, $params);
								if(isset($response_desc['body']->error)){
									print_r($response_desc);
									// Registramos el detalle del error
									$data_up = array(
										'id' => $producto->id,
										'detalles' => $response_desc['httpCode']." - ".$response_desc['body']->error." - ".$response_desc['body']->message
									);
									$update_detalle = $this->MApis->update_detalle_cola($data_up);
								}
							}
							if($response['httpCode'] == '200'){
								$num_act++;
								// Registro de incidencia
								$captura_eventos[] = "[".date("r")."] Producto: ".$producto->producto_id.", Num Referencia: ".$response['body']->id.", Evento: Actualizado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
								
								// Actualizamos el estatus del detalle a 1 (Procesado)
								$data_up = array(
									'id' => $producto->id,
									'detalles' => $response['httpCode']." - Actualizado...",
									'status' => 1
								);
								$update_detalle = $this->MApis->update_detalle_cola($data_up);
							}
							$i++;
						}
						// Proceso de actualización final de la cola, si quedan detalles pendientes el estatus de la cola pasa a 3, 
						// si no, pasa a 1
						$detalles_pendientes = $this->MApis->obtenerDetallesEstatus($id_cola, 2);
						$st = 1;
						if(count($detalles_pendientes) > 0){
							$st = 3;
						}
						// Armamos los datos a actualizar
						$data = array(
							'id' => $id_cola,
							'status' => $st
						);
						
						$result = $this->MApis->update_cola($data);
						
						// Generamos el log
						$this->logs($captura_eventos, $fecha);
						
						$this->load->view('base');
						$data['mensaje'] = "Ha actualizado los precios con exito!";
						$data['num_act'] = $num_act;
						$data['errores'] = $errores;
						$data['detalles_errores'] = $detalles_errores;
						$data['registros'] = $num_reg;
						$this->load->view('price_update', $data);
						$this->load->view('footer');
					}else{
						$redirect = $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']);
						redirect($redirect);
					}
				} else {
					$redirect = $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']);
					redirect($redirect);
				}
			}
		}else{
			// Proceso de actualización final de la cola; si quedan detalles pendientes el estatus de la cola pasa a 3, 
			// si no, pasa a 1
			$detalles_pendientes = $this->MApis->obtenerDetallesEstatus($id_cola, 2);
			$st = 1;
			if(count($detalles_pendientes) > 0){
				$st = 3;
			}
			// Armamos los datos a actualizar
			$data = array(
				'id' => $id_cola,
				'status' => $st
			);
			
			$result = $this->MApis->update_cola($data);
			
			$this->load->view('base');
			$data['mensaje'] = "No hubo cambios!";
			$this->load->view('price_update', $data);
			$this->load->view('footer');
		}
		
	}
	
	
	// Método para sincronizar los datos de un producto específico con la tienda virtual seleccionada
	public function mlibre_singles(){
		
		// Fecha
		$fecha = date('Y-m-d H-i-s');
		
		// Consultamos los datos de la tienda y el producto, además de los de la aplicación asociada
		$producto_id = $this->input->get('producto_id');
		$tiendav_id = $this->input->get('tiendav_id');
		
		$datosb_tienda = $this->MTiendasVirtuales->obtenerTiendas($tiendav_id);  // Datos básicos de la tienda
		
		$datos_aplicacion = $this->MAplicaciones->obtenerAplicacion($datosb_tienda[0]->aplicacion_id);  // Datos de la aplicación asociada
		
		$producto = $this->MProductos->obtenerProductos($producto_id);  // Datos básicos del producto
		
		$producto_tiendav = $this->MTiendasVirtuales->obtenerProductosTienda2($producto_id, $tiendav_id);  // Datos de la asociación productos_tiendav 
		
		
		// Si hay productos asociados
		if(count($producto) > 0){
			// Reasignamos los valores a una variable más corta ya usada
			
			$meli = new Meli($datosb_tienda[0]->app_id, $datosb_tienda[0]->secret_api);
			if($datosb_tienda[0]->expires_in + time() + 1 < time()){
				$params = array('access_token' => $datosb_tienda[0]->tokens);
										
				$i = 0;
				$errores = 0;  // Número de errores (Actualizaciones fallidas)
				$num_act = 0;  // Actualizaciones exitosas
				$num_reg = 0;  // Registros exitosos
				$captura_eventos = array();  // Captura de eventos e incidencias al actualizar precios
				
				// Consultamos las fotos del producto
				$fotos_producto = $this->MProductos->obtenerFotos($producto[0]->id);  // Fotos del producto
				$lista_fotos = array();
				if(count($fotos_producto) > 0){
					foreach($fotos_producto as $fotos){
						$lista_fotos[] = array("source"=>base_url()."assets/img/productos/".$fotos->foto);
					}
				}else{
					$lista_fotos[] = array("source"=>base_url()."assets/img/productos/default.png");
				}
						
				// Consultamos los datos de la categoría del producto si ésta es diferente de 0 (cero)
				$categoria_id = 0;
				$categoria_referencia = "MLV1227";
				if($producto_tiendav[0]->categoria_id != 0){
					$data_categoria = $this->MApis->obtenerCategoria($producto_tiendav[0]->categoria_id);
					$categoria_id = $data_categoria[0]->id;
					$categoria_referencia = $data_categoria[0]->referencia;
				}
				
				// Primero recortamos la cadena de nombre si su longitud supera los 60 caracteres
				if(strlen($producto[0]->nombre) > 60){
					$nombre_producto = substr($producto[0]->nombre, 0, 57)."...";
				}else{
					$nombre_producto = $producto[0]->nombre;
				}
				
				// Si la tienda virtual tiene fórmula especificada le añadimos el cálculo de élla como comisión al precio del producto
				if($datosb_tienda[0]->formula == ""){
					$result = $producto_tiendav[0]->precio;
					$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto_tiendav[0]->cantidad, 'pictures' => $lista_fotos);
				}else{
					$precio = $datosb_tienda[0]->formula;
					$p = $producto_tiendav[0]->precio;
					$f_precio = str_replace('P',$p,$precio);
					eval("\$result = $f_precio;");
					$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto_tiendav[0]->cantidad, 'pictures' => $lista_fotos);
				}
				$response = $meli->put('/items/'.$producto_tiendav[0]->referencia, $body, $params);
				// print_r($response);
				// echo $response['httpCode'];
				if(isset($response['body']->error)){
					$errores++;
					//~ print_r($response['body']->error);
					if($response['body']->error == 'not_found'){
						// Procedemos a registrar el nuevo producto en la tienda virtual de mercado libre
						
						// Constriumos el item a enviar
						$item = array(
							"title" => $nombre_producto,
							"category_id" => $categoria_referencia,
							"price" => round($result, 2),
							"currency_id" => "VES",
							"available_quantity" => $producto_tiendav[0]->cantidad,
							"buying_mode" => "buy_it_now",
							"listing_type_id" => "bronze",
							"condition" => "new",
							"description" => $producto[0]->descripcion,
							"pictures" => $lista_fotos  // Arreglo con lista de fotos
						);
						
						// Ejecutamos el método de envío de ítems
						$response_reg = $meli->post('/items', $item, $params);
						// Aumentamos el contador de registros si el ítem fue registrado correctamente
						if($response_reg['httpCode'] == '201'){
							$num_reg++;
							// Registro de incidencia
							$captura_eventos[] = "[".date("r")."] Producto: ".$producto[0]->id.", Num Referencia: ".$response_reg['body']->id.", Evento: Registrado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
							// Actualizamos el código de referencia en la tabla de asociaciones de productos con tiendas virtuales 'productos_tiendav'
							$cod_ref = $response_reg['body']->id;
							$data_referencia = array(
								'producto_id' => $producto[0]->id, 
								'tiendav_id' => $tiendav_id,
								'referencia' => $cod_ref
							);
							$update_referencia = $this->MTiendasVirtuales->update_tp($data_referencia);
							
						}else{
							echo $response_reg['httpCode'];
							echo " - ";
							print_r($response_reg['body']->error);
							echo "<br>";
							print_r($response_reg['body']);
							echo "<br>";
						}
					}else if(strpos($response['body']->message, 'status:closed') !== false){
						// Registro de incidencia
						$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$producto_tiendav[0]->referencia.", Evento: ".$response['body']->error."1, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
						
					}else{
						// Registro de incidencia
						$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$producto_tiendav[0]->referencia.", Evento: ".$response['body']->error."2, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
					}
				}else{
					// Si no hubo errores en el envío del precio y la cantidad, entonces enviamos la descripción
					$body = array('plain_text' => $producto[0]->descripcion);
					$response_desc = $meli->put('/items/'.$producto_tiendav[0]->referencia.'/description', $body, $params);
					if(isset($response_desc['body']->error)){
						print_r($response_desc);
					}
				}
				if($response['httpCode'] == '200'){
					$num_act++;
					// Registro de incidencia
					$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$response['body']->id.", Evento: Actualizado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
					
				}
				$i++;
				
				// Generamos el log
				$this->logs($captura_eventos, $fecha);
				
				$this->load->view('base');
				$data['mensaje'] = "Ha actualizado el precio con exito!";
				$data['num_act'] = $num_act;
				$data['errores'] = $errores;
				$data['registros'] = $num_reg;
				$this->load->view('price_update_singles', $data);
				$this->load->view('footer');
			}else{
				if(isset($_GET['code'])) {
					// If the code was in get parameter we authorize
					$user = $meli->authorize($_GET['code'], base_url().'mercado/update_singles?producto_id='.$producto_id.'&tiendav_id='.$tiendav_id);
					 
					// Now we create the sessions with the authenticated user
					if(isset($user['body']->access_token)){
						$_SESSION['access_token'] = $user['body']->access_token;
						$_SESSION['expires_in'] = $user['body']->expires_in;
						
						// Registramos el token y el tiempo en base de datos
						$datos = array(
							'id' => $tiendav_id,
							'nombre' => $datosb_tienda[0]->nombre,
							'tokens' => $user['body']->access_token,
							'expires_in' => $user['body']->expires_in
						);
						
						$result = $this->MTiendasVirtuales->update($datos);
						
						// We can check if the access token in invalid checking the time
						if($_SESSION['expires_in'] + time() + 1 < time()) {
							try {
								print_r($meli->refreshAccessToken());
							} catch (Exception $e) {
								echo "Exception: ",  $e->getMessage(), "\n";
							}
						}
						
						$params = array('access_token' => $_SESSION['access_token']);
						
						// Generamos un archivo con la lista de productos
						// $this->list_items($productos, $fecha);
						
						$i = 0;
						$errores = 0;  // Número de errores (Actualizaciones fallidas)
						$num_act = 0;  // Actualizaciones exitosas
						$num_reg = 0;  // Registros exitosos
						$captura_eventos = array();  // Captura de eventos e incidencias al actualizar precios
						
						// Consultamos las fotos del producto
						$fotos_producto = $this->MProductos->obtenerFotos($producto[0]->id);  // Fotos del producto
						$lista_fotos = array();
						if(count($fotos_producto) > 0){
							foreach($fotos_producto as $fotos){
								$lista_fotos[] = array("source"=>base_url()."assets/img/productos/".$fotos->foto);
							}
						}else{
							$lista_fotos[] = array("source"=>base_url()."assets/img/productos/default.png");
						}
						
						// Consultamos los datos de la categoría del producto si ésta es diferente de 0 (cero)
						$categoria_id = 0;
						$categoria_referencia = "MLV1227";
						if($producto_tiendav[0]->categoria_id != 0){
							$data_categoria = $this->MApis->obtenerCategoria($producto_tiendav[0]->categoria_id);
							$categoria_id = $data_categoria[0]->id;
							$categoria_referencia = $data_categoria[0]->referencia;
						}
						
						// Primero recortamos la cadena de nombre si su longitud supera los 60 caracteres
						if(strlen($producto[0]->nombre) > 60){
							$nombre_producto = substr($producto[0]->nombre, 0, 57)."...";
						}else{
							$nombre_producto = $producto[0]->nombre;
						}
						
						// Si la tienda virtual tiene fórmula especificada le añadimos el cálculo de élla como comisión al precio del producto
						if($datosb_tienda[0]->formula == ""){
							$result = $producto[0]->costo_bolivar;
							$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto_tiendav[0]->cantidad, 'pictures' => $lista_fotos);
						}else{
							$precio = $datosb_tienda[0]->formula;
							$p = $producto_tiendav[0]->precio;
							$f_precio = str_replace('P',$p,$precio);
							eval("\$result = $f_precio;");
							$body = array('title' => $nombre_producto, 'price' => round($result, 2), 'available_quantity' => $producto_tiendav[0]->cantidad, 'pictures' => $lista_fotos);
						}

						$response = $meli->put('/items/'.$producto_tiendav[0]->referencia, $body, $params);
						// print_r($response);
						// echo $response['httpCode'];
						if(isset($response['body']->error)){
							$errores++;
							//~ print_r($response['body']->error);
							if($response['body']->error == 'not_found'){
								// Procedemos a registrar el nuevo producto en la tienda virtual de mercado libre
								
								// Constriumos el item a enviar
								$item = array(
									"title" => $nombre_producto,
									"category_id" => $categoria_referencia,
									"price" => round($result, 2),
									"currency_id" => "VES",
									"available_quantity" => $producto_tiendav[0]->cantidad,
									"buying_mode" => "buy_it_now",
									"listing_type_id" => "bronze",
									"condition" => "new",
									"description" => $producto[0]->descripcion,
									"pictures" => $lista_fotos  // Arreglo con lista de fotos
								);
								
								// Ejecutamos el método de envío de items
								$response_reg = $meli->post('/items', $item, $params);
								// Aumentamos el contador de registros si el ítem fue registrado correctamente
								if($response_reg['httpCode'] == '201'){
									$num_reg++;
									// Registro de incidencia
									$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$response_reg['body']->id.", Evento: Registrado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
									// print_r($response_reg);
									// Actualizamos el código de referencia en la tabla de asociaciones de productos con tiendas virtuales 'productos_tiendav'
									$cod_ref = $response_reg['body']->id;
									$data_referencia = array(
										'producto_id' => $producto_tiendav[0]->producto_id, 
										'tiendav_id' => $tiendav_id,
										'referencia' => $cod_ref
									);
									$update_referencia = $this->MTiendasVirtuales->update_tp($data_referencia);
									
								}else{
									echo $response_reg['httpCode'];
									echo " - ";
									print_r($response_reg['body']->error);
									echo "<br>";
									print_r($response_reg['body']);
									echo "<br>";
								}
							}else if(strpos($response['body']->message, 'status:closed') !== false){
								// Registro de incidencia
								$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$producto_tiendav[0]->referencia.", Evento: ".$response['body']->error."1, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
								
							}else{
								// Registro de incidencia
								$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$producto_tiendav[0]->referencia.", Evento: ".$response['body']->error."2, Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
							}
						}else{
							// Si no hubo errores en el envío del precio y la cantidad, entonces enviamos la descripción
							$body = array('plain_text' => $producto[0]->descripcion);
							$response_desc = $meli->put('/items/'.$producto_tiendav[0]->referencia.'/description', $body, $params);
							if(isset($response_desc['body']->error)){
								print_r($response_desc);
							}
						}
						if($response['httpCode'] == '200'){
							$num_act++;
							// Registro de incidencia
							$captura_eventos[] = "[".date("r")."] Producto: ".$producto_tiendav[0]->producto_id.", Num Referencia: ".$response['body']->id.", Evento: Actualizado..., Usuario: ".$this->session->userdata['logged_in']['id']."\r\n";
							
						}
						$i++;
						
						// Generamos el log
						$this->logs($captura_eventos, $fecha);
						
						$this->load->view('base');
						$data['mensaje'] = "Ha actualizado el precio con exito!";
						$data['num_act'] = $num_act;
						$data['errores'] = $errores;
						$data['registros'] = $num_reg;
						$this->load->view('price_update_singles', $data);
						$this->load->view('footer');
					}else{
						$redirect = $meli->getAuthUrl(base_url().'mercado/update_singles?producto_id='.$producto_id.'&tiendav_id='.$tiendav_id, Meli::$AUTH_URL['MLV']);
						redirect($redirect);
					}
				} else {
					$redirect = $meli->getAuthUrl(base_url().'mercado/update_singles?producto_id='.$producto_id.'&tiendav_id='.$tiendav_id, Meli::$AUTH_URL['MLV']);
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
	
	public function prestashop(){
		
		// Fecha
		$fecha = date('Y-m-d H-i-s');
		
		// Consultamos los datos de la tienda
		$id = $this->input->get('id');
		
		$datosb_tienda = $this->MTiendasVirtuales->obtenerTiendas($id);  // Datos básicos de la tienda
		
		$datos_aplicacion = $this->MAplicaciones->obtenerAplicacion($datosb_tienda[0]->aplicacion_id);  // Datos de la aplicación asociada
		
					
		// Verificamos si hay una cola pendiente de la tienda elegida
		$pendiente = $this->MApis->obtenerByTiendavEstatus($id, 3);
		
		if(count($pendiente) > 0){
			
			// Buscamos los detalles (productos) asociados a la cola pendiente
			$id_cola = $pendiente[0]->id;
			
			$productos = $this->MApis->obtenerDetallesEstatus($id_cola, 2);  // Lista de productos asociados a la cola de sincronización pendiente
			
			// Pasamos la cola al status 2 (En proceso...)
			// Armamos los datos a actualizar
			$data = array(
				'id' => $id_cola,
				'status' => 2
			);
			
			$result = $this->MApis->update_cola($data);
			
		}else{
			
			// Primero buscamos si hay cola en proceso (status=2)
			$en_proceso = $this->MApis->obtenerByTiendavEstatus($id, 2);
			
			// Si hay cola en proceso, buscamos los detalles pendientes asociados a élla, si no, creamos una cola nueva con sus detalles pendientes
			if(count($en_proceso) > 0){
				
				$id_cola = $en_proceso[0]->id;
				$productos = $this->MApis->obtenerDetallesEstatus($id_cola, 2);  // Lista de productos pendientes asociados a la cola de sincronización en proceso...
				
			}else{
				
				// Registramos la nueva cola
				$datos_cola = array(
					'user_id' => $this->session->userdata['logged_in']['id'],
					'tiendav_id' => $id,
					'tienda_id' => $datosb_tienda[0]->tienda_id,
					'fecha' => date('Y-m-d'),
					'hora' => date('H:i:s'),
					'status' => 2,
				);
				$id_cola = $this->MApis->insertCola($datos_cola);
				
				// Buscamos los productos asociados a la tienda virtual
				$productos = $this->MTiendasVirtuales->obtenerProductosTienda($id);  // Lista de productos asociados
				
				// Registramos en la tabla cola_detalle los detalles de los productos a sincronizar
				foreach($productos as $producto){
					
					$datos_producto = $this->MProductos->obtenerProductos($producto->producto_id);  // Detalles del producto
					
					// Datos del detalle a registrar
					$datos_detalle = array(
						'producto_id' => $datos_producto[0]->id,
						'categoria_id' => $producto->categoria_id,
						'nombre' => $datos_producto[0]->nombre,
						'precio' => $producto->precio,
						'cantidad' => $producto->cantidad,
						'descripcion' => $datos_producto[0]->descripcion,
						'referencia' => $producto->referencia,
						'cola_id' => $id_cola,
						'status' => 2
					);
					$reg_detalle = $this->MApis->insertColaDetalle($datos_detalle);  // Registro de detalles del producto
					
				}
				
				// Buscamos los productos asociados a la cola
				$productos = $this->MApis->obtenerDetalles($id_cola);  // Lista de productos asociados a la cola de sincronización
				
			}
			
		}
		
		// Si hay productos asociados
		if(count($productos) > 0){
			
			#echo "Actualizamos los precios de los productos resultantes en la tienda de m3 Uniformes";
			
			// Constantes de conexión al web service de prestashop
			define('DEBUG', true);
			define('PS_SHOP_PATH', $datosb_tienda[0]->url);
			define('PS_WS_AUTH_KEY', $datosb_tienda[0]->secret_api);
                        
			
			// Actualizamos los precios de los productos resultantes en la tienda de m3 Uniformes
			try {
			
				$webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
                                #echo "<pre>";
                                #print_r($webService); exit;
                                
				
				$num_act = 0;
				$errores = 0;

                               #print_r($productos); exit;

				foreach($productos as $producto){
					
					try {
						
						$tiendav_id = $id;

						$get_referencia = $this->MTiendasVirtuales->obtenerProductosTienda2($producto->producto_id, $tiendav_id);
						#echo "<pre>";
						#echo count($get_referencia);

						foreach ($get_referencia as $key => $value) {
							# code...
						
							$opt = array('resource' => 'products');
							#$opt['id']=$producto->referencia;
							$opt['id']= $value->referencia;
							$xml = $webService->get($opt);
							#print_r($xml); exit;
							//~ echo "Successfully recived data.";
								 /* Lista de nodos que no pueden modificarse.
								 *
								 *  - "manufacturer_name"
								 *  - "position_in_category"
								 *  - "quantity"
								 *  - "type"
								 */
								unset($xml->children()->children()->manufacturer_name);
								unset($xml->children()->children()->position_in_category);
								unset($xml->children()->children()->quantity);
								unset($xml->children()->children()->type);

								// Formula para efectuar el margen de ganancia sobre el producto

								if($datosb_tienda[0]->formula !=""){
									// Asignacion de formula
									$formula      = $datosb_tienda[0]->formula;
									// Asignacion de precio venta
									$precio_venta = ($producto->precio) / (100 - $formula) * 100;
								}else{
									$precio_venta = $producto->precio;
								}

							   	$xml->children()->children()->price = $precio_venta; // <-- Asignacion de precio!
							   	$xml->children()->children()->name = $producto->nombre; // <-- Asignacion de nombre!
							   	$xml->children()->children()->reference = $producto->referencia; // <-- Asignacion de referencia!
							   	$xml->children()->children()->description = $producto->descripcion; // <-- Asignacion de descripcion!
							// Cargar nuevos datos al generador de consultas.
							$opt['putXml']=$xml->asXML();
							$xml = $webService->edit($opt);

						}
						
						$num_act += 1;
						
						// Actualizamos el estatus del detalle a 1 (Procesado)
						$data_up = array(
							'id' => $producto->id,
							'detalles' => "Actualizado...",
							'status' => 1
						);
						
						$update_detalle = $this->MApis->update_detalle_cola($data_up);
						
					}catch (PrestaShopWebserviceException $ex) {
					
						$errores += 1;
                                                #echo "<pre>";
                                                #var_dump($ex->getTrace()); exit;
						
						// Registramos la incidencia
						$data_up = array(
							'id' => $producto->id,
							'detalles' => "Falló... ".$ex->getMessage()
						);
						
						$update_detalle = $this->MApis->update_detalle_cola($data_up);
					
					}
				
				}
				
				// Proceso de actualización final de la cola; si quedan detalles pendientes el estatus de la cola pasa a 3, 
				// si no, pasa a 1
				$detalles_pendientes = $this->MApis->obtenerDetallesEstatus($id_cola, 2);
				$st = 1;
				if(count($detalles_pendientes) > 0){
					$st = 3;
				}
				// Armamos los datos a actualizar
				$data = array(
					'id' => $id_cola,
					'status' => $st
				);
				
				$result = $this->MApis->update_cola($data);
				
				// Si el Servicio Web no lanza una excepción, la acción funcionó bien y no mostramos el siguiente mensaje
				$this->load->view('base');
				$data['mensaje'] = "Ha actualizado los precios con exito!";
				$data['num_act'] = $num_act;
				$data['errores'] = $errores;
				$data['registros'] = 0;
				$this->load->view('price_update', $data);
				$this->load->view('footer');
				
			} catch (Exception $ex) {
				
				// Aquí nos ocupamos de los errores.
				$trace = $ex->getTrace();
				if ($trace[0]['args'][0] == 404) echo 'Bad ID';
				else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
				else echo 'Otro error<br />'.$ex->getMessage();
				
			}
			
		}else{
			
			// Proceso de actualización final de la cola; si quedan detalles pendientes el estatus de la cola pasa a 3, 
			// si no, pasa a 1
			$detalles_pendientes = $this->MApis->obtenerDetallesEstatus($id_cola, 2);
			$st = 1;
			if(count($detalles_pendientes) > 0){
				$st = 3;
			}
			// Armamos los datos a actualizar
			$data = array(
				'id' => $id_cola,
				'status' => $st
			);
			
			$result = $this->MApis->update_cola($data);
			
			$this->load->view('base');
			$data['mensaje'] = "No hubo cambios!";
			$this->load->view('price_update', $data);
			$this->load->view('footer');
			
		}
		
	}
	
	// Genera un json con los datos de un producto por id dado
	public function product()
    {
		$data['id'] = $this->uri->segment(3);
        $result = $this->MProductos->obtenerProductos($data['id']);
        echo json_encode($result);
    }
    
    // Método para consultar si una tienda tiene cola de envío y saber en qué estatus está
    public function cola_estatus()
    {
		$id = $this->input->get('id');
        // Verificamos si hay una cola en proceso de la tienda elegida
		$en_proceso = $this->MApis->obtenerByTiendavEstatus($id, 2);
		
		if(count($en_proceso) > 0){
			
			echo 2;
			
		}else{
			
			// Verificamos si hay una cola pendiente de la tienda elegida
			$pendiente = $this->MApis->obtenerByTiendavEstatus($id, 3);
			
			if(count($pendiente) > 0){
				
				echo 3;
				
			}else{
				
				echo "No hay cola en proceso ni pendiente...";
				
			}
			
		}
    }
    
    // Método para cambiar el status de una cola a 4 (Cancelado)
    public function cancelar_cola()
    {
		$id = $this->input->get('id');
		// Verificamos si hay una cola en proceso de la tienda elegida
		$pendiente = $this->MApis->obtenerByTiendavEstatus($id, 3);
		
		if(count($pendiente) > 0){
			
			// Armamos los datos a actualizar
			$data = array(
				'id' => $pendiente[0]->id,
				'status' => 4
			);
			
			$result = $this->MApis->update_cola($data);
			
			if($result){
				
				echo 1;
				
			}else{
				
				echo 0;
				
			}
			
		}
		
    }
    
    // Método público para generar un registro de los eventos sucedidos durante una sincronización con la tienda virtual de Mercado Libre
    function logs($eventos, $fecha)
    {
		$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
		
        $ddf = fopen($ruta.'/application/logs/logs_'.$fecha.'.log','a');
        
		foreach($eventos as $evento){
			fwrite($ddf, $evento);
		}
		
		fclose($ddf);
		
    }
    
    // Método público para generar un registro de los eventos sucedidos durante una sincronización con la tienda virtual de Mercado Libre
    function list_items($list_items, $fecha)
    {
		$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
		
        $ddf = fopen($ruta.'/application/logs/list_items_'.$fecha.'.log','a');
		
		foreach($list_items as $producto){
			fwrite($ddf,"Producto id: ".$producto->producto_id.", Tienda id: ".$producto->tiendav_id.", Num Referencia: ".$producto->referencia.", Precio: ".$producto->precio.", Cantidad: ".$producto->cantidad."\r\n");
		}
		
		fclose($ddf);
		
    }

}
