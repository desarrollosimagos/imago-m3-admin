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
		$data['listar_usuarios'] = $this->MTiendas->obtener_usuarios();
		$this->load->view('tiendas/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$data['listar_usuarios'] = $this->MTiendas->obtener_usuarios();
		$this->load->view('base');
		$this->load->view('tiendas/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$datos = array(
            'rif' => $_POST['rif'],
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'status' => 1
        );
        
        $result = $this->MTiendas->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
    }
    
    // Método para asociar usuarios a una tienda
    public function associate_users() {
		$id_tienda = $this->input->post('id_tienda');
		$usuarios = $this->input->post('usuarios');
		
		// Consultamos si hay registros de asociación de usuarios con la tienda actual
		$num_assoc = $this->MTiendas->obtenerUsuarios($id_tienda);
		// Si no hay registros de asociación a la tienda, entonces registramos la asociación con el usuario actual como administrador
		if(count($num_assoc) == 0){
			$datos1 = array(
				'user_id' => $this->session->userdata('logged_in')['id'],
				'tienda_id' => $id_tienda,
				'tipo' => 1,
				'd_create' => date('Y-m-d')." ".date("H:i:s")
			);

			$insert = $this->MTiendas->insertUsuarios($datos1);
		}
		
		// Si el arreglo trae registros se procede a hacer los registros correspondientes
		if(count($usuarios) > 0){
			foreach ($usuarios as $usuario) {
				$datos2 = array(
					'user_id' => $usuario['id_usuario'],
					'tienda_id' => $id_tienda,
					'tipo' => $usuario['tipo'],
					'd_create' => date('Y-m-d')." ".date("H:i:s")
				);

				$insert = $this->MTiendas->insertUsuarios($datos2);
			}
		}
	}
    
    // Método para desasociar usuarios de una tienda
    public function unassociate_users() {
		$tienda_id = $this->input->post('id_tienda');
		$usuarios_ids = $this->input->post('codigos_des1');
		$usuarios_ids = explode(',',$usuarios_ids);
        foreach ($usuarios_ids as $usert_id) {
			// Borramos la asociación tienda-usuario
			$delete = $this->MTiendas->delete_tienda_usuario($usert_id);
		}
	}
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MTiendas->obtenerTiendas($data['id']);
        $data['listar_usuarios'] = $this->MTiendas->obtener_usuarios();
        $data['usuarios_asociados'] = $this->MTiendas->obtenerUsuarios($data['id']);
        $this->load->view('tiendas/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		$datos = array(
			'id' => $_POST['id'],
            'rif' => $_POST['rif'],
            'name' => $_POST['name'],
            'address' => $_POST['address'],
            'phone' => $_POST['phone'],
            'status' => 1,
            'd_update' => date('Y-m-d')." ".date("H:i:s")
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
