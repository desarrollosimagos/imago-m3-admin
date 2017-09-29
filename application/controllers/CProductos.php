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
		$data['listar'] = $this->MProductos->obtenerByUser();
		$data['listar_unidades'] = $this->MProductos->obtener_unidades();
		$data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
		$data['listar_tiendas_fisicas'] = $this->MProductos->obtener_tiendas_fisicas();
		$this->load->view('productos/lista', $data);
		$this->load->view('footer');
	}
	
	public function index2()
	{
		$this->load->view('base');
		$data['listar'] = $this->MProductos->obtenerByUser();
		$data['listar_unidades'] = $this->MProductos->obtener_unidades();
		$data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
		$data['listar_tiendas_fisicas'] = $this->MProductos->obtener_tiendas_fisicas();
		$this->load->view('productos/lista', $data);
		$this->load->view('footer');
	}
	
	public function register()
	{
		$this->load->view('base');
		$data['listar_unidades'] = $this->MProductos->obtener_unidades();
		$data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
		$data['listar_tiendas_fisicas'] = $this->MProductos->obtener_tiendas_fisicas();
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
            'descripcion' => $_POST['descripcion'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'unidad_medida' => $_POST['unidad_medida'],
            'tienda_id' => $_POST['tienda_id'],
            'c_compra' => $c_compra,
            'c_vende' => $c_vende,
            'c_fabrica' => $c_fabrica,
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MProductos->insert($datos);
        
        echo $result;  // No comentar, esta impresión es necesaria para que se ejecute el método insert()
        
        // Si el producto fue registrado satisfactoriamente registramos las fotos
        if($result != 'existe'){
			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/img/productos)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			//~ print_r($_FILES);
			$i = 0;
			foreach($_FILES['imagen']['name'] as $imagen){
				if($imagen != ""){
					// Obtenemos la extensión
					$ext = explode(".",$imagen);
					$ext = $ext[1];
					$datos2 = array(
						'producto_id' => $result,
						'foto' => "foto".($i+1)."_".$result.".".$ext,
						'd_create' => date('Y-m-d')
					);
					$insertar_foto = $this->MProductos->insert_foto($datos2);
					if (move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/productos/foto".($i+1)."_".$result.".".$ext)) {
						echo "El fichero es válido y se subió con éxito.\n";
					} else {
						echo "¡Posible ataque de subida de ficheros!\n";
					}
					
					$i++;
				}
			}
		}
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
						'tiendav_id' => $tienda['id_tienda'],
						'referencia' => $tienda['referencia'],
						'precio' => $tienda['precio'],
						'cantidad' => $tienda['cantidad'],
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
        foreach ($tiendas_ids as $tiendav_id) {
			// Borramos la asociación tienda-producto
			$delete = $this->MProductos->delete_producto_tienda($tiendav_id);
		}
	}
	
	// Método para editar
    public function edit() {
		
		$this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MProductos->obtenerProductos($data['id']);
        $data['listar_unidades'] = $this->MProductos->obtener_unidades();
        $data['listar_tiendas'] = $this->MProductos->obtener_tiendas_fil();
        $data['listar_tiendas_fisicas'] = $this->MProductos->obtener_tiendas_fisicas();
        $data['tiendas_asociadas'] = $this->MProductos->obtenerTiendas($data['id']);
        $data['fotos_asociadas'] = $this->MProductos->obtenerFotos($data['id']);
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
            'descripcion' => $_POST['descripcion'],
            'costo_dolar' => $_POST['costo_dolar'],
            'costo_bolivar' => $_POST['costo_bolivar'],
            'unidad_medida' => $_POST['unidad_medida'],
            'tienda_id' => $_POST['tienda_id'],
            'c_compra' => $c_compra,
            'c_vende' => $c_vende,
            'c_fabrica' => $c_fabrica,
            'modificado' => date('Y-m-d')
        );
        
        $result = $this->MProductos->update($datos);
        
        if($result){
			// Sección para el registro del archivo en la ruta establecida para tal fin (assets/img/productos)
			$ruta = getcwd();  // Obtiene el directorio actual en donde se esta trabajando
			//~ print_r($_FILES);
			$i = 0;
			foreach($_FILES['imagen']['name'] as $imagen){
				if($imagen != ""){
					// Obtenemos la extensión
					$ext = explode(".",$imagen);
					$ext = $ext[1];
					$datos2 = array(
						'producto_id' => $_POST['id'],
						'foto' => "foto".($i+1)."_".$_POST['id'].".".$ext,
						'd_create' => date('Y-m-d')
					);
					$insertar_foto = $this->MProductos->insert_foto($datos2);
					if (move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/productos/foto".($i+1)."_".$_POST['id'].".".$ext)) {
						echo "El fichero es válido y se subió con éxito.\n";
					} else {
						echo "¡Posible ataque de subida de ficheros!\n";
					}
					
					$i++;
				}
			}
		}
	}
	
	// Método para actualizar desde la lista
    public function update_list() {
		//~ print_r($this->input->post());
		$productos = $this->input->post('productos');
		
		// Si el arreglo trae registros se procede a hacer los registros correspondientes
		if(count($productos) > 0){
			foreach ($productos as $producto) {
				// Actualizamos en productos si existe el indice id (la tabla no viene vacía)
				if(isset($producto['id'])){
					
					// Actualización de datos en la tabla de 'productos'
					$datos = array(
						'id' => $producto['id'],
						'nombre' => $producto['nombre'],
						'referencia' => $producto['referencia'],
						'costo_dolar' => $producto['costo_dolar'],
						'costo_bolivar' => $producto['costo_bolivar'],
						// 'unidad_medida' => $producto['unidad_medida'],
						// 'tiendav_id' => $producto['tiendav_id'],
						'c_compra' => $producto['c_compra'],
						'c_vende' => $producto['c_vende'],
						'c_fabrica' => $producto['c_fabrica'],
						'modificado' => date('Y-m-d')
					);
					
					$result = $this->MProductos->update_prices($datos);
					
					// Actualización de datos en la tabla de 'productos_tienda'
					$datos2 = array(
						'precio' => $producto['costo_bolivar']
					);
					
					$result2 = $this->MProductos->update_pt($producto['id'], $datos2);
				}
			}
		}
		
    }
    
	// Método para eliminar
	function delete($id) {
		
        $result1 = $this->MProductos->delete_pt_associated($id);  // Primero borramos los registros asociados en la tabla 'productos_tiendav'
        
        $result2 = $this->MProductos->delete($id);  // Borramos el producto
    }
	
	public function ajax_service()
    {                                          #Campo         #Tabla                #ID
        $result = $this->MProductos->obtener();
        echo json_encode($result);
    }
	
	
}
