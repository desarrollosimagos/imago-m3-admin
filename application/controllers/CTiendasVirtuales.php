<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTiendasVirtuales extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MTiendasVirtuales');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MTiendasVirtuales->obtener();
		$data['listar_tiendas'] = $this->MTiendasVirtuales->obtener_tiendas();
		$data['listar_aplicaciones'] = $this->MTiendasVirtuales->obtener_aplicaciones();
		$this->load->view('tiendas_virtuales/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$data['listar_tiendas'] = $this->MTiendasVirtuales->obtener_tiendas();
		$data['listar_aplicaciones'] = $this->MTiendasVirtuales->obtener_aplicaciones();
		$this->load->view('base');
		$this->load->view('tiendas_virtuales/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$datos = array(
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'url' => $_POST['url'],
            'tienda_id' => $_POST['tienda_id'],
            'tokens' => $_POST['tokens'],
            'token_cliente' => $_POST['token_cliente'],
            'secret_api' => $_POST['secret_api'],
            'url_callback' => $_POST['url_callback'],
            'cliente_api_id' => $_POST['cliente_api_id'],
            'app_id' => $_POST['app_id'],
            'aplicacion_id' => $_POST['aplicacion_id'],
            'formula' => $_POST['formula'],
            'status' => 1
        );
        
        $result = $this->MTiendasVirtuales->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MTiendasVirtuales->obtenerTiendas($data['id']);
        $data['listar_tiendas'] = $this->MTiendasVirtuales->obtener_tiendas();
        $data['listar_aplicaciones'] = $this->MTiendasVirtuales->obtener_aplicaciones();
        $this->load->view('tiendas_virtuales/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		$datos = array(
			'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'url' => $_POST['url'],
            'tienda_id' => $_POST['tienda_id'],
            'tokens' => $_POST['tokens'],
            'token_cliente' => $_POST['token_cliente'],
            'secret_api' => $_POST['secret_api'],
            'url_callback' => $_POST['url_callback'],
            'cliente_api_id' => $_POST['cliente_api_id'],
            'app_id' => $_POST['app_id'],
            'aplicacion_id' => $_POST['aplicacion_id'],
            'formula' => $_POST['formula'],
            'status' => 1,
            'd_update' => date('Y-m-d')." ".date("H:i:s")
        );
        
        $result = $this->MTiendasVirtuales->update($datos);
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MTiendasVirtuales->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MTiendasVirtuales->obtener();
        echo json_encode($result);
    }
	
	
}
