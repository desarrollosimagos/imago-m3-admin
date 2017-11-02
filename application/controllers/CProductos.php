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
		$data['listar_tiendas_fil'] = $this->MProductos->obtener_tiendas_fil();
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
		//~ $data['listar_tiendas_fil'] = $this->MProductos->obtener_tiendas_fil_product();
		$this->load->view('productos/lista');
		$this->load->view('footer');
	}
	
	public function ajax_productos()
	{
		//~ // Creación de una tabla si ésta no existe
		//~ $tabla = "CREATE TABLE IF NOT EXISTS `categorias` (";
		//~ $tabla .= "`id` int(11) NOT NULL AUTO_INCREMENT,";
		//~ $tabla .= "`categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,";
		//~ $tabla .= "`categoria_padre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,";
		//~ $tabla .= "`referencia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,";
		//~ $tabla .= "`status` int(11) NOT NULL,";
		//~ $tabla .= "`aplicacion_id` int(11) NOT NULL,";
		//~ $tabla .= "`d_create` date NOT NULL,";
		//~ $tabla .= "`d_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,";
		//~ $tabla .= "PRIMARY KEY (`id`),";
		//~ $tabla .= "KEY `aplicacion_id` (`aplicacion_id`)";
		//~ $tabla .= ") ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
		//~ $query = $this->db->query($tabla);
		//~ 
		//~ $consulta = "alter table productos_tiendav add categoria_id int not null default 0 after tiendav_id";
		//~ $query2 = $this->db->query($consulta);
		//~ 
		//~ $consulta2 = "alter table productos_tiendav add KEY `categoria_id` (`categoria_id`)";
		//~ $query3 = $this->db->query($consulta2);
		//~ 
		//~ $consulta3 = "INSERT INTO `categorias` (`id`, `categoria`, `categoria_padre`, `referencia`, `status`, `aplicacion_id`, `d_create`, `d_update`) VALUES";
		//~ $consulta3 .= "(1, 'Categoría Uno', 'Categoría  Padre Uno', 'MLV1227', 1, 4, '0000-00-00', '2017-10-30 16:15:17'),";
		//~ $consulta3 .= "(2, 'Categoría Dos', 'Categoría Padre Dos', 'MLV1227', 1, 4, '0000-00-00', '2017-10-30 16:15:17'),";
		//~ $consulta3 .= "(3, 'Categoría Tres', 'Categoría Padre Tres', 'MLV1227', 1, 4, '0000-00-00', '2017-10-30 16:15:17'),";
		//~ $consulta3 .= "(4, 'Categoría Cuatro', 'Categoría Padre Cuatro', 'MLV1227', 1, 4, '0000-00-00', '2017-10-30 16:15:17'),";
		//~ $consulta3 .= "(5, 'Categoría Cinco', 'Categoría Padre Cinco', 'MLV1227', 1, 4, '0000-00-00', '2017-10-30 16:15:17'),";
		//~ $consulta3 .= "(6, 'Categoría Seis', 'Categoría Padre Seis', 'MLV1227', 1, 5, '0000-00-00', '2017-10-30 16:15:17'),";
		//~ $consulta3 .= "(7, 'Categoría Siete', 'Categoría Padre Siete', 'MLV1227', 1, 6, '0000-00-00', '2017-10-30 16:15:17')";
		//~ 
		//~ $query4 = $this->db->query($consulta3);
		
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
			$sub_array[] = "<a class='actualizar' id='".$row->id."' style='color: #1ab394' title='Actualizar precio'><i class='fa fa-refresh fa-2x'></i></a>";
			
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
	
	// Método alternativo para listar sólo los productos sin imágenes
	public function ajax_productos2()
	{		
		$fetch_data = $this->MProductos->make_datatables();
		
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
			
			if($num_fotos == 0){			
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
				$sub_array[] = "<a class='actualizar' id='".$row->id."' style='color: #1ab394' title='Actualizar precio'><i class='fa fa-refresh fa-2x'></i></a>";
				
				$data[] = $sub_array;
			}
		}
		
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->MProductos->get_all_data(),
			"recordsFiltered" => count($data),
			"data" => $data
		);
		
		echo json_encode($output);
	}
	
	// Método alternativo para listar sólo los productos sin tiendas virtuales asociadas
	public function ajax_productos3()
	{		
		$fetch_data = $this->MProductos->make_datatables();
		
		$data = array();
		foreach($fetch_data as $row){
			
			$sub_array = array();
			
			// Proceso de busqueda de fotos asociadas al producto
			$num_fotos = $this->MProductos->buscar_fotos($row->id);
			$num_fotos = count($num_fotos);
			// Proceso de busqueda de tiendas virtuales asociadas al producto
			$tiendasv = $this->MProductos->obtenerTiendas($row->id);
			
			if(count($tiendasv) == 0){		
				$sub_array[] = "<input type='checkbox' id='checkbox_".$row->id."' class='check'>";
				$sub_array[] = $row->nombre;
				$sub_array[] = $row->referencia;
				$sub_array[] = "<span id='checkbox_".$row->id."_column_dl'>".$row->costo_dolar."</span>";
				$sub_array[] = "<span id='checkbox_".$row->id."_column'>".$row->costo_bolivar."</span>";
				$sub_array[] = $row->name;
				$sub_array[] = $row->modificado;
				$sub_array[] = $row->descripcion;
				$sub_array[] = "";
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
				$sub_array[] = "<a class='actualizar' id='".$row->id."' style='color: #1ab394' title='Actualizar precio'><i class='fa fa-refresh fa-2x'></i></a>";
				
				$data[] = $sub_array;
			}
		}
		
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->MProductos->get_all_data(),
			"recordsFiltered" => count($data),
			"data" => $data
		);
		
		echo json_encode($output);
	}
	
	// Método alternativo para listar sólo los productos sin tiendas virtuales asociadas ni imágenes
	public function ajax_productos4()
	{		
		$fetch_data = $this->MProductos->make_datatables();
		
		$data = array();
		foreach($fetch_data as $row){
			
			$sub_array = array();
			// Proceso de busqueda de fotos asociadas al producto
			$num_fotos = $this->MProductos->buscar_fotos($row->id);
			$num_fotos = count($num_fotos);
			// Proceso de busqueda de tiendas virtuales asociadas al producto
			$tiendasv = $this->MProductos->obtenerTiendas($row->id);
			
			if(count($tiendasv) == 0 || $num_fotos == 0){		
				$sub_array[] = "<input type='checkbox' id='checkbox_".$row->id."' class='check'>";
				$sub_array[] = $row->nombre;
				$sub_array[] = $row->referencia;
				$sub_array[] = "<span id='checkbox_".$row->id."_column_dl'>".$row->costo_dolar."</span>";
				$sub_array[] = "<span id='checkbox_".$row->id."_column'>".$row->costo_bolivar."</span>";
				$sub_array[] = $row->name;
				$sub_array[] = $row->modificado;
				$sub_array[] = $row->descripcion;
				$sub_array[] = "";
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
				$sub_array[] = "<a class='actualizar' id='".$row->id."' style='color: #1ab394' title='Actualizar precio'><i class='fa fa-refresh fa-2x'></i></a>";
				
				$data[] = $sub_array;
			}
		}
		
		$output = array(
			"draw" => intval($_POST["draw"]),
			"recordsTotal" => $this->MProductos->get_all_data(),
			"recordsFiltered" => count($data),
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
						'categoria_id' => $tienda['id_categoria'],
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
        $data['listar_categorias'] = $this->MProductos->obtenerCategorias();
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
				
				// Actualización de datos en la tabla de 'productos_tiendav'
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
	
	// Método para listar las categorías según el id de la tienda virtual
	public function ajax_categoria($tiendav_id)
    {
		
		// Primero obtenemos el id de la aplicación asociada a la tienda virtual
		$datos_tiendav = $this->MTiendasVirtuales->obtenerTiendas($tiendav_id);
		
		
        $result = $this->MProductos->obtenerCategoriasByTv($datos_tiendav[0]->aplicacion_id);
        echo json_encode($result);
        
    }
	
	// Método para listar las tiendas virtuales según el id del producto seleccionado
	public function ajax_tiendasv($producto_id)
    {		
		
        $result = $this->MProductos->obtener_tiendas_fil_product($producto_id);
        echo json_encode($result);
        
    }
	
	
}
