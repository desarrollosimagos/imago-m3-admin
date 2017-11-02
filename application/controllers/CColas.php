<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CColas extends CI_Controller {

	public function __construct() {
        parent::__construct();


       
		// Load database
        $this->load->model('MColas');
        $this->load->model('MProductos');
        $this->load->model('MApis');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MColas->obtener();
		$this->load->view('colas/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$this->load->view('colas/registrar');
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$datos = array(
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'icon' => $_FILES['icon']['name'],
            'price' => $_POST['price'],
            'status' => $_POST['status'],
        );
        $result = $this->MColas->insert($datos);
        if ($result) {

			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/public/img/demos/medical)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando

			if (move_uploaded_file($_FILES['icon']['tmp_name'], $ruta."/assets/public/img/demos/medical/".$_FILES['icon']['name'])) {
				echo "El fichero es válido y se subió con éxito.\n";
			} else {
				echo "¡Posible ataque de subida de ficheros!\n";
			}
       
        }
    }
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['listar_categorias'] = $this->MProductos->obtenerCategorias();
        $data['listar_productos'] = $this->MProductos->obtenerByUser();
        $data['detalles_cola'] = $this->MColas->obtenerDetalles($data['id']);
        $this->load->view('colas/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		if($_FILES['icon']['name'] != ''){
			$datos = array(
				'id' => $_POST['id'],
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'icon' => $_FILES['icon']['name'],
				'price' => $_POST['price'],
				'status' => $_POST['status'],
			);
		}else{
			$datos = array(
				'id' => $_POST['id'],
				'name' => $_POST['name'],
				'description' => $_POST['description'],
				'price' => $_POST['price'],
				'status' => $_POST['status'],
			);
		}
        $result = $this->MColas->update($datos);
        if ($result) {
			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/public/img/demos/medical)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			if($_FILES['icon']['name'] != ''){
				if (move_uploaded_file($_FILES['icon']['tmp_name'], $ruta."/assets/public/img/demos/medical/".$_FILES['icon']['name'])) {
					echo "El fichero es válido y se subió con éxito.\n";
				} else {
					echo "¡Posible ataque de subida de ficheros!\n";
				}
			}     
        }
    }
    
    // Método para actualizar el status de una cola según su id
    public function update_status() {
		
		$id = $this->input->post('id');
		$nuevo_status = $this->input->post('new_status');
		
		// Primero buscamos los datos básicos de la cola
		$datos_cola = $this->MColas->obtenerCola($id);
		
		/* Si la cola está en proceso y la queremos pasar a procesado, verificamos si no tiene detalles pendientes antes de actualizar.
		 * Si la cola está en proceso y la queremos cancelar o pasar a pendiente, actualizamos sin validaciones extra. 
		   Si es una cola pendiente, actualizamos sin validaciones extra. */
		if($datos_cola[0]->status == 2 && $nuevo_status == 1){
			
			$detalles_cola = $this->MApis->obtenerDetallesEstatus($id, 2);
			
			if(count($detalles_cola) > 0){
			
				echo '{"response":"detalles pendientes"}';
			
			}else{
				
				// Datos para la actualización
				$datos = array(
					'id' => $id,
					'status' => $nuevo_status
				);
				
				$result = $this->MColas->update_status($datos);
				
				if($result){
					
					echo '{"response":"ok"}';
					
				}
				
			}
			
		}else{
			
			// Datos para la actualización
			$datos = array(
				'id' => $id,
				'status' => $nuevo_status
			);
			
			$result = $this->MColas->update_status($datos);
			
			if($result){
				
				echo '{"response":"ok"}';
				
			}
			
		}
		
	}
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MColas->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MColas->obtener();
        echo json_encode($result);
    }
	
	
}
