<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MTiendas extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the tienda
    public function obtener() {
        $query = $this->db->get('tienda');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the applications
    public function obtener_aplicaciones() {
        $query = $this->db->get('aplicacion');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->get('tienda');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("tienda", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to obtain the tienda by id
    public function obtenerTiendas($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tienda');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('tienda');

        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('tienda', $datos);
            return $result;
        }
    }


    // Public method to delete a record
     public function delete($id) {
        $result = $this->db->where('tienda_id =', $id);
        $result = $this->db->get('productos');

        if ($result->num_rows() > 0) {
            echo 'existe';
        } else {
            $result = $this->db->delete('tienda', array('id' => $id));
            return $result;
        }
       
    }
    

}
?>
