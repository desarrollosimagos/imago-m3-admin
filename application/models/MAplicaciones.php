<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MAplicaciones extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the aplicacion
    public function obtener() {
        $query = $this->db->get('aplicacion');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->get('aplicacion');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("aplicacion", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to obtain the aplicacion by id
    public function obtenerAplicacion($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('aplicacion');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('aplicacion');

        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('aplicacion', $datos);
            return $result;
        }
    }


    // Public method to delete a record
     public function delete($id) {
        $result = $this->db->where('aplicacion_id =', $id);
        $result = $this->db->get('tienda');

        if ($result->num_rows() > 0) {
            echo 'existe';
        } else {
            $result = $this->db->delete('aplicacion', array('id' => $id));
            return $result;
        }
       
    }
    

}
?>
