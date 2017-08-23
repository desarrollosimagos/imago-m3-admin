<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MTiendas extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the tienda
    public function obtener() {
        $query = $this->db->get('tiendas');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the applications
    public function obtener_usuarios() {
        $query = $this->db->get('users');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('name =', $datos['name']);
        $result = $this->db->get('tiendas');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("tiendas", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to obtain the tienda by id
    public function obtenerTiendas($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tiendas');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to obtain the productos by id
    public function obtenerProductosTienda($id) {
        $this->db->where('tiendav_id', $id);
        $query = $this->db->get('productos_tiendav');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('name =', $datos['name']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('tiendas');

        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('tiendas', $datos);
            return $result;
        }
    }


    // Public method to delete a record
     public function delete($id) {
        $result = $this->db->where('tienda_id =', $id);
        $result = $this->db->get('users_tiendas');

        if ($result->num_rows() > 0) {
            echo 'existe';
        } else {
            $result = $this->db->delete('tiendas', array('id' => $id));
            return $result;
        }
       
    }
    

}
?>
