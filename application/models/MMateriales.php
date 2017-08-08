<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MMateriales extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the materiales
    public function obtener() {
        $query = $this->db->get('materiales');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the materiales
    public function obtener_unidades() {
        $query = $this->db->get('measurement_units');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insert($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->get('materiales');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("materiales", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to obtain the materiales by id
    public function obtenerMateriales($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('materiales');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to update a record  
    public function update($datos) {
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('materiales');

        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('materiales', $datos);
            return $result;
        }
    }


    // Public method to delete a record
     public function delete($id) {
        //~ $result = $this->db->where('service_id =', $id);
        //~ $result = $this->db->get('franchises_materiales');
//~ 
        //~ if ($result->num_rows() > 0) {
            //~ echo 'existe';
        //~ } else {
            $result = $this->db->delete('materiales', array('id' => $id));
            return $result;
        //~ }
       
    }
    

}
?>
