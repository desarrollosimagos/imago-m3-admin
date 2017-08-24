<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MProductos extends CI_Model {


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

    //Public method to obtain the units
    public function obtener_unidades() {
        $query = $this->db->get('measurement_units');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the shops
    public function obtener_tiendas() {
        $query = $this->db->get('tienda_virtual');

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

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
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
