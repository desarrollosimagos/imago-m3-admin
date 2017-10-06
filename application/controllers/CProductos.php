<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProductos extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MProductos');
        $this->load->model('MTiendasVirtuales');
		
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
		//~ $data['listar'] = $this->MProductos->obtenerByUserLimit();
		//~ $data['listar_unidades'] = $this->MProductos->obtener_unidades();
		//~ $data['listar_tiendas'] = $this->MProductos->obtener_tiendas();
		//~ $data['listar_tiendas_fisicas'] = $this->MProductos->obtener_tiendas_fisicas();
		$this->load->view('productos/lista');
		$this->load->view('footer');
	}
	
	public function ajax_productos()
	{
		$fetch_data = $this->MProductos->make_datatables();
		//~ $consulta_ejecutada = $this->db->last_query();
		//~ echo $consulta_ejecutada;
		//~ echo count($fetch_data);
		$data = array();
		foreach($fetch_data as $row){
			$sub_array = array();
			// Proceso de busqueda de fotos asociadas al producto
			$num_fotos = $this->MProductos->buscar_fotos($row->id);
			$num_fotos = count($num_fotos);
			// Proceso de busqueda de tiendas virtuales asociadas al producto
			$lista_tiendasv = "";
			$tiendasv = $this->MProductos->obtenerTiendas($row->id);
			if(count($tiendasv) > 0){
				foreach($tiendasv as $tiendav){
					$t_v = $this->MTiendasVirtuales->obtenerTiendas($tiendav->tiendav_id);
					$lista_tiendasv .= $t_v[0]->nombre.", ";
				}
				$lista_tiendasv = substr($lista_tiendasv, 0, -2);
			}
						
			$sub_array[] = "<input type='checkbox' id='checkbox_".$row->id."' class='check'>";
			$sub_array[] = $row->nombre;
			$sub_array[] = $row->referencia;
			$sub_array[] = "<span id='checkbox_".$row->id."_column_dl'>".$row->costo_dolar."</span>";
			$sub_array[] = "<span id='checkbox_".$row->id."_column'>".$row->costo_bolivar."</span>";
			$sub_array[] = $row->name;
			$sub_array[] = $row->modificado;
			$sub_array[] = $row->descripcion;
			$sub_array[] = $lista_tiendasv;
			$sub_array[] = $num_fotos;
			$c_compra; $c_vende; $c_fabrica;
			if($row->c_compra == 0){$c_compra = "No";}else{$c_compra = "Sí";}
			if($row->c_vende == 0){$c_vende = "No";}else{$c_vende = "Sí";}
			if($row->c_fabrica == 0){$c_fabrica = "No";}else{$c_fabrica = "Sí";}
			$sub_array[] = $c_compra;
			$sub_array[] = $c_vende;
			$sub_array[] = $c_fabrica;
			$sub_array[] = "<a href='".base_url()."productos/edit/".$row->id."' title='Editar' style='color: #1ab394'><i class='fa fa-edit fa-2x'></i></a>";
			$sub_array[] = "<a class='borrar' id='".$row->id."' style='color: #1ab394' title='Eliminar'><i class='fa fa-trash-o fa-2x'></i></a>";
			
			$data[] = $sub_array;
		}
		
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->MProductos->get_all_data(),
			"recordsFiltered" => $this->MProductos->get_filtered_data(),
			"data" => $data
		);
		
		echo json_encode($output);
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
			$i = 0;  // Indice de la imágen
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
					//~ echo "foto".($i+1)."_".$_POST['id'].".".$ext;
					$insertar_foto = $this->MProductos->insert_foto($datos2);
					if (move_uploaded_file($_FILES['imagen']['tmp_name'][$i], $ruta."/assets/img/productos/foto".($i+1)."_".$_POST['id'].".".$ext)) {
						echo "El fichero es válido y se subió con éxito.\n";
					} else {
						echo "¡Posible ataque de subida de ficheros!\n";
					}
					
				}
				$i++;  // Incrementamos 
			}
		}
	}
	
	// Método para actualizar desde la lista
    public function update_list() {
		//~ print_r($this->input->post('productos'));
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
	
	// Método para referenciar y actualizar los precios de los productos en general
    public function update_list2() {
		//~ print_r($this->input->post('precio_dolar'));
		$precio_dolar = $this->input->post('precio_dolar');
		
		// Consultamos la lista de productos
		$productos = $this->MProductos->obtenerByUser();
		
		//~ print_r($productos);
		//~ echo count($productos);
		// Si el arreglo trae registros se procede a hacer las actualizaciones correspondientes
		if(count($productos) > 0){
			foreach ($productos as $producto) {
				
				// Calculo del nuevo precio referenciando el dólar actual
				$nuevo_precio = $producto->costo_dolar * $precio_dolar;
					
				// Actualización de datos en la tabla de 'productos'
				$datos = array(
					'id' => $producto->id,
					'costo_bolivar' => round($nuevo_precio, 2),
					'modificado' => date('Y-m-d')
				);
				
				$result = $this->MProductos->update_prices($datos);
				
				// Actualización de datos en la tabla de 'productos_tienda'
				$datos2 = array(
					'precio' => round($nuevo_precio, 2)
				);
				
				$result2 = $this->MProductos->update_pt($producto->id, $datos2);
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
