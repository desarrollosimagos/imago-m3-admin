<?php
//~ defined('BASEPATH') OR exit('No direct script access allowed');

Class CApis extends CI_Controller {

    public function __construct() {
        @parent::__construct();

// Load database
        $this->load->model('MTiendas');
        $this->load->model('MProductos');
        $this->load->model('MAplicaciones');
        //~ $this->load->model('auditoria/ModelsAuditoria');
        //~ $this->load->model('busquedas_ajax/ModelsBusqueda');
    }
	
	public function mlibre(){
		// Consultamos los datos de la tienda
		$id = $this->input->get('id');
		$datosb_tienda = $this->MTiendas->obtenerTiendas($id);  // Datos básicos de la tienda
		
		//~ print_r($datosb_tienda);
		
		//~ echo "<br><br>";
		
		$datos_aplicacion = $this->MAplicaciones->obtenerAplicacion($datosb_tienda[0]->aplicacion_id);  // Datos de la aplicación asociada
		
		//~ print_r($datos_aplicacion);
		
		$productos = $this->MTiendas->obtenerProductosTienda($id);  // Lista de productos asociados
		
		//~ print_r($productos);
		// Si hay productos asociados
		if(count($productos) > 0){
			$meli = new Meli($datosb_tienda[0]->app_id, $datosb_tienda[0]->secret_api);
			if(isset($_GET['code'])) {
				//~ // If the code was in get parameter we authorize
				$user = $meli->authorize($_GET['code'], base_url().'mercado/update?id='.$id);
				//~ 
				//~ // Now we create the sessions with the authenticated user
				$_SESSION['access_token'] = $user['body']->access_token;
				$_SESSION['expires_in'] = $user['body']->expires_in;
				//~ $_SESSION['refrsh_token'] = $user['body']->refresh_token;
				//~ print_r($_SESSION['access_token']);
				//~ // We can check if the access token in invalid checking the time
				if($_SESSION['expires_in'] + time() + 1 < time()) {
					try {
						print_r($meli->refreshAccessToken());
					} catch (Exception $e) {
						echo "Exception: ",  $e->getMessage(), "\n";
					}
				}
				$i = 0;
				$errores = 0;  // Número de errores (Actualizaciones fallidas)
				$num_act = 0;  // Actualizaciones exitosas
				foreach($productos as $producto){
					$params = array('access_token' => $_SESSION['access_token']);

					$body = array('price' => $producto->precio);

					$response = $meli->put('/items/'.$producto->referencia, $body, $params);
					//~ print_r($response);
					//~ echo $response['httpCode'];
					if(isset($response['body']->error)){
						$errores++;
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
				$this->load->view('price_update', $data);
				$this->load->view('footer');
				//~ 
			} else {
				//~ echo "ingreso2";
				//~ echo '<a href="' . $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']) . '">Login</a>';
				$redirect = $meli->getAuthUrl(base_url().'mercado/update?id='.$id, Meli::$AUTH_URL['MLV']);
				redirect($redirect);
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
		$productos = $this->MTiendas->obtenerProductosTienda($id);
		
		print_r($productos);
		
		echo count($productos);
	}
	
	public function prestashop($id){
		$id = $this->input->get('id');
		$productos = $this->MTiendas->obtenerProductosTienda($id);
		
		print_r($productos);
		
		echo count($productos);
	}

}
