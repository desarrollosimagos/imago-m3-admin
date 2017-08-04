<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMateriales extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MMateriales');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MMateriales->obtener();
		$this->load->view('materiales/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$this->load->view('materiales/registrar');
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$datos = array(
            'nombre' => $_POST['nombre'],
            'referencia' => $_POST['referencia'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MMateriales->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MMateriales->obtenerMateriales($data['id']);
        $this->load->view('materiales/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		$datos = array(
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'referencia' => $_POST['referencia'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MMateriales->update($datos);
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MMateriales->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MMateriales->obtener();
        echo json_encode($result);
    }
	
	
}
