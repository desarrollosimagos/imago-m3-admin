<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTiendas extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MTiendas');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MTiendas->obtener();
		$this->load->view('tiendas/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$this->load->view('tiendas/registrar');
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$datos = array(
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'url' => $_POST['url'],
            'tokens' => $_POST['tokens'],
            'token_cliente' => $_POST['token_cliente'],
            'secret_api' => $_POST['secret_api'],
            'url_callback' => $_POST['url_callback'],
            'cliente_api_id' => $_POST['cliente_api_id'],
            'aplicacion_id' => $_POST['aplicacion_id'],
            'status' => 1
        );
        
        $result = $this->MTiendas->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MTiendas->obtenerTiendas($data['id']);
        $this->load->view('tiendas/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		$datos = array(
			'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'url' => $_POST['url'],
            'tokens' => $_POST['tokens'],
            'token_cliente' => $_POST['token_cliente'],
            'secret_api' => $_POST['secret_api'],
            'url_callback' => $_POST['url_callback'],
            'cliente_api_id' => $_POST['cliente_api_id'],
            'aplicacion_id' => $_POST['aplicacion_id'],
            'status' => 1
        );
        
        $result = $this->MTiendas->update($datos);
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MTiendas->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MTiendas->obtener();
        echo json_encode($result);
    }
	
	
}
