<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProductos extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MProductos');
		
    }
	
	public function index()
	{
		$this->load->view('base');
		$data['listar'] = $this->MProductos->obtener();
		$data['listar_unidades'] = $this->MProductos->obtener_unidades();
		$data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
		$this->load->view('productos/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$data['listar_unidades'] = $this->MProductos->obtener_unidades();
		$data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
		$this->load->view('productos/registrar', $data);
		$this->load->view('footer');
	}
	
	// Método para guardar un nuevo registro
    public function add() {
		$c_compra = 0; $c_vende = 0; $c_fabrica = 0;
		if(isset($_POST['c_compra'])){
			$c_compra = 1;
		}
		if(isset($_POST['c_vende'])){
			$c_vende = 1;
		}
		if(isset($_POST['c_fabrica'])){
			$c_fabrica = 1;
		}
		$datos = array(
            'nombre' => $_POST['nombre'],
            'referencia' => $_POST['referencia'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'unidad_medida' => $_POST['unidad_medida'],
            //~ 'tienda_id' => $_POST['tienda_id'],
            'c_compra' => $c_compra,
            'c_vende' => $c_vende,
            'c_fabrica' => $c_fabrica,
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MProductos->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
    }
    
    // Método para asociar tiendas a un producto
    public function associate_stores() {
		$id_producto = $this->input->post('id_producto');
		$tiendas = $this->input->post('tiendas');
		
		// Si el arreglo trae registros se procede a hacer los registros correspondientes
		if(count($tiendas) > 0){
			foreach ($tiendas as $tienda) {
				// Insertamos en productos_tienda si existe el indice id_tienda (la tabla no viene vacía)
				if(isset($tienda['id_tienda'])){
					$datos = array(
						'producto_id' => $id_producto,
						'tienda_id' => $tienda['id_tienda'],
						'referencia' => $tienda['referencia'],
						'd_create' => date('Y-m-d')." ".date("H:i:s")
					);

					$insert = $this->MProductos->insertTiendas($datos);
					//~ print_r($tienda);
				}
			}
		}
	}
    
    // Método para desasociar tiendas a un producto
    public function unassociate_stores() {
		$producto_id = $this->input->post('id_producto');
		$tiendas_ids = $this->input->post('codigos_des1');
		$tiendas_ids = explode(',',$tiendas_ids);
        foreach ($tiendas_ids as $tienda_id) {
			// Borramos la asociación tienda-producto
			$delete = $this->MProductos->delete_producto_tienda($tienda_id);
		}
	}
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MProductos->obtenerProductos($data['id']);
        $data['listar_unidades'] = $this->MProductos->obtener_unidades();
        $data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
        $data['tiendas_asociadas'] = $this->MProductos->obtenerTiendas($data['id']);
        $this->load->view('productos/editar', $data);
		$this->load->view('footer');
    }
	
	// Método para actualizar
    public function update() {
		$c_compra = 0; $c_vende = 0; $c_fabrica = 0;
		if(isset($_POST['c_compra'])){
			$c_compra = 1;
		}
		if(isset($_POST['c_vende'])){
			$c_vende = 1;
		}
		if(isset($_POST['c_fabrica'])){
			$c_fabrica = 1;
		}
		$datos = array(
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'referencia' => $_POST['referencia'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'unidad_medida' => $_POST['unidad_medida'],
            //~ 'tienda_id' => $_POST['tienda_id'],
            'c_compra' => $c_compra,
            'c_vende' => $c_vende,
            'c_fabrica' => $c_fabrica,
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MProductos->update($datos);	
	}
	
	// Método para actualizar desde la lista
    public function update_list() {
		$datos = array(
            'id' => $_POST['id'],
            'nombre' => $_POST['nombre'],
            'referencia' => $_POST['referencia'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'unidad_medida' => $_POST['unidad_medida'],
            //~ 'tienda_id' => $_POST['tienda_id'],
            'c_compra' => $_POST['c_compra'],
            'c_vende' => $_POST['c_vende'],
            'c_fabrica' => $_POST['c_fabrica'],
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MProductos->update($datos);
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result = $this->MProductos->delete($id);
        if ($result) {
          /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']);*/
        }
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MProductos->obtener();
        echo json_encode($result);
    }
	
	
}