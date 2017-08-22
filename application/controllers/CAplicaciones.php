<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAplicaciones extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MAplicaciones');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MAplicaciones->obtener();
		$this->load->view('aplicaciones/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$this->load->view('aplicaciones/registrar');
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$status = 0;
		if(isset($_POST['status'])){
			$status = 1;
		}
		$datos = array(
            'nombre' => $_POST['nombre'],
            'ruta' => $_POST['ruta'],
            'status' => $status
        );
        
        $result = $this->MAplicaciones->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MAplicaciones->obtenerAplicacion($data['id']);
        $this->load->view('aplicaciones/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		$status = 0;
		if(isset($_POST['status'])){
			$status = 1;
		}
		$datos = array(
			'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'ruta' => $_POST['ruta'],
            'status' => $status
        );
        
        $result = $this->MAplicaciones->update($datos);
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MAplicaciones->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MAplicaciones->obtener();
        echo json_encode($result);
    }
	
	
}
