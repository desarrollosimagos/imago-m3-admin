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
        $query = $this->db->get('tienda');

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

    // Public method to obtain the productos by id
    public function obtenerMateriales($id) {
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
    

}
?>
