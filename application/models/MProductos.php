<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MProductos extends CI_Model {
	var $table = "users_tiendas u_t";
	var $select_column = array(
		"p.id", 
		"p.nombre", 
		"p.referencia", 
		"p.descripcion", 
		"p.costo_dolar", 
		"p.costo_bolivar",
		"p.tienda_id", 
		"t.name", 
		"p.c_compra", 
		"p.c_vende", 
		"p.c_fabrica", 
		"p.modificado"
	);
	var $order_column = array(
		"p.nombre", 
		"p.referencia",
		"p.descripcion", 
		"p.costo_dolar", 
		"p.costo_bolivar",
		"t.name", 
		"p.c_compra", 
		"p.c_vende", 
		"p.c_fabrica",
		"p.modificado",
	);

    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the productos
    public function obtener() {
        $query = $this->db->get('productos');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the productos
    public function obtenerByUser() {
        //~ $query = $this->db->get('productos');
        $this->db->select('p.id, p.nombre, p.referencia, p.descripcion, p.costo_dolar, p.costo_bolivar, p.unidad_medida, p.tienda_id, p.c_compra, p.c_vende, p.c_fabrica, p.modificado');
		$this->db->from('users_tiendas u_t');
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('productos p', 'p.tienda_id = t.id');
        $this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
        //~ // Obtenemos los ids de las tiendas del usuario para filtrar los productos // No fue necesario
        //~ $ids_tiendas = array();
		//~ foreach($this->session->userdata['logged_in']['tiendas'] as $tiendas){
			//~ foreach($tiendas as $tienda){
				//~ $ids_tiendas[] = $tienda->id;
			//~ }
		//~ }
        //~ $this->db->where_in('u_t.tienda_id', $ids_tiendas);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Método público para construir la consulta
    public function make_query() {
        $this->db->select($this->select_column);
        $this->db->distinct();
		$this->db->from($this->table);
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('productos p', 'p.tienda_id = t.id');
        $this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ""){
			//~ $this->db->like("p.nombre", $_POST["search"]["value"]);
			//~ $this->db->or_like("p.referencia", $_POST["search"]["value"]);
			//~ $this->db->or_like("p.descripcion", $_POST["search"]["value"]);
			//~ $this->db->or_like("p.costo_dolar", $_POST["search"]["value"]);
			//~ $this->db->or_like("p.costo_bolivar", $_POST["search"]["value"]);
			//~ $this->db->or_like("t.name", $_POST["search"]["value"]);
			//~ $this->db->or_like("p.modificado", $_POST["search"]["value"]);
			$condicionales_like = "(p.nombre LIKE '%".$_POST["search"]["value"]."%' OR ";
			$condicionales_like .= "p.referencia LIKE '%".$_POST["search"]["value"]."%' OR ";
			$condicionales_like .= "p.descripcion LIKE '%".$_POST["search"]["value"]."%' OR ";
			$condicionales_like .= "p.costo_dolar LIKE '%".$_POST["search"]["value"]."%' OR ";
			$condicionales_like .= "p.costo_bolivar LIKE '%".$_POST["search"]["value"]."%' OR ";
			$condicionales_like .= "t.name LIKE '%".$_POST["search"]["value"]."%' OR ";
			$condicionales_like .= "p.modificado LIKE '%".$_POST["search"]["value"]."%')";
			$this->db->where($condicionales_like);
		}
		if(isset($_POST["order"])){
			$this->db->order_by($this->order_column[$_POST["order"]["0"]["column"]], $_POST["order"]["0"]["dir"]);
		}else{
			$this->db->order_by("id", "DESC");
		}
        //~ // Obtenemos los ids de las tiendas del usuario para filtrar los productos // No fue necesario
        //~ $ids_tiendas = array();
		//~ foreach($this->session->userdata['logged_in']['tiendas'] as $tiendas){
			//~ foreach($tiendas as $tienda){
				//~ $ids_tiendas[] = $tienda->id;
			//~ }
		//~ }
        //~ $this->db->where_in('u_t.tienda_id', $ids_tiendas);
    }
    
    // Método público para ejecutar la consulta
    public function make_datatables(){
		$this->make_query();
		if($_POST["length"] != -1){
			$this->db->limit($_POST["length"], $_POST["start"]);
		}
		$query = $this->db->get();
		return $query->result();		
	}
	
	// Método público para obtener el número de registros resultantes de make_query()
	public function get_filtered_data(){
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// Método público para obtener el número total de registros de productos del usuario
	public function get_all_data(){
		$this->db->select($this->select_column);
		$this->db->from($this->table);
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('productos p', 'p.tienda_id = t.id');
		$this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		return $this->db->count_all_results();
	}

    //Public method to obtain the units
    public function obtener_unidades() {
        $query = $this->db->get('measurement_units');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Método publico, para obtener las tiendas virtuales
    public function obtener_tiendas() {
        $query = $this->db->get('tienda_virtual');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Método publico, para obtener las tiendas físicas asociadas al usuario logueado
    public function obtener_tiendas_fisicas() {
        //~ $query = $this->db->get('tiendas');
		$this->db->select('t.id, t.rif, t.name');
		$this->db->from('users_tiendas u_t');
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Método publico, para obtener las tiendas virtuales asociadas a las tiendas del usuario logueado
    public function obtener_tiendas_fil() {
        //~ $query = $this->db->get('tienda_virtual');
		$this->db->select('t_v.id, t_v.nombre');
		$this->db->from('users_tiendas u_t');
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('tienda_virtual t_v', 't_v.tienda_id = t.id');
		$this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Método publico, para obtener las tiendas virtuales asociadas a las tiendas del usuario logueado
    public function obtener_tiendas_fil_product($id_producto) {
        //~ $query = $this->db->get('tienda_virtual');
		$this->db->select('t_v.id, t_v.nombre');
		$this->db->from('users_tiendas u_t');
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('tienda_virtual t_v', 't_v.tienda_id = t.id');
		$this->db->join('productos_tiendav p_tv', 'p_tv.tiendav_id = t_v.id');
		$this->db->where('p_tv.producto_id =', $id_producto);
		$this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Método publico, para obtener las tiendas asociadas al producto
    public function obtenerTiendas($id) {
        $this->db->where('producto_id', $id);
        $query = $this->db->get('productos_tiendav');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->get('productos');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("productos", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to insert the data
    public function insert_foto($datos) {
		// Primero obtenemos el nombre de la foto sin extensión para que no haya riesgo de duplicado
		$without_ext = explode(".",$datos['foto']);
		$without_ext = $without_ext[0];
        $result = $this->db->where('producto_id =', $datos['producto_id']);
        $result = $this->db->like('foto', $without_ext);
        $result = $this->db->get('fotos');
        if ($result->num_rows() > 0) {
			$result = $this->db->where('producto_id =', $datos['producto_id']);
			$result = $this->db->like('foto', $without_ext);
			$result = $this->db->update("fotos", $datos);
            return 'existe';
        } else {
            $result = $this->db->insert("fotos", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to serach the fotos associated
    public function buscar_fotos($producto_id) {
        $result = $this->db->where('producto_id =', $producto_id);
        $result = $this->db->get('fotos');
        return $result->result();
    }
    
    // Método público, forma de insertar los datos de la asociación entre productos y tiendas
    public function insertTiendas($datos) {
        $result = $this->db->where('producto_id =', $datos['producto_id']);
        $result = $this->db->where('tiendav_id =', $datos['tiendav_id']);
        $result = $this->db->get('productos_tiendav');
        if ($result->num_rows() > 0) {
			$result = $this->db->where('producto_id =', $datos['producto_id']);
			$result = $this->db->where('tiendav_id =', $datos['tiendav_id']);
            $result = $this->db->update("productos_tiendav", $datos);
            return $result;
        } else {
            $result = $this->db->insert("productos_tiendav", $datos);
            return $result;
        }
    }

    // Public method to obtain the productos by id
    public function obtenerProductos($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('productos');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to obtain the productos by id
    public function obtenerFotos($producto_id) {
        $this->db->where('producto_id', $producto_id);
        $query = $this->db->get('fotos');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the productos by id
    public function obtenerCategorias() {
		
        $this->db->select('c.id, c.categoria');
        $this->db->distinct();
		$this->db->from('users_tiendas u_t');
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('tienda_virtual t_v', 't_v.tienda_id = t.id');
		$this->db->join('aplicacion a', 'a.id = t_v.aplicacion_id');
		$this->db->join('categorias c', 'c.aplicacion_id = a.id');
		$this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }
    
    // Public method to obtain the productos by id
    public function obtenerCategoriasByTv($aplicacion_id) {
		
        $this->db->where('aplicacion_id', $aplicacion_id);
        $query = $this->db->get('categorias');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
            
    }

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->where('tienda_id =', $datos['tienda_id']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('productos');

        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('productos', $datos);
            return $result;
        }
    }

    // Public method to update the prices of the products 
    public function update_prices($datos) {
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('productos', $datos);
		return $result;
    }

    // Public method to update a record of the table 'productos_tienda'
    public function update_pt($id, $datos) {
		$result = $this->db->where('producto_id', $id);
		$result = $this->db->update('productos_tiendav', $datos);
		return $result;
    }


    // Public method to delete a record
    public function delete($id) {
        //~ $result = $this->db->where('service_id =', $id);
        //~ $result = $this->db->get('franchises_productos');
//~ 
        //~ if ($result->num_rows() > 0) {
            //~ echo 'existe';
        //~ } else {
            $result = $this->db->delete('productos', array('id' => $id));
            return $result;
        //~ }
       
    }
    
    // Public method to delete a record
    public function delete_producto_tienda($id) {
		$result = $this->db->delete('productos_tiendav', array('id' => $id));
		return $result;
    }
    
    // Public method to delete a record
    public function delete_pt_associated($id) {
		$result = $this->db->delete('productos_tiendav', array('producto_id' => $id));
        return $result;
	} 

}
?>
