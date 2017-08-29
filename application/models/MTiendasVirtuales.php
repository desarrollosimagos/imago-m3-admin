<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MTiendasVirtuales extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the tienda
    public function obtener() {
        //~ $query = $this->db->get('tienda');
        $this->db->select('t.id, t.nombre, t.descripcion, t.url, t.tienda_id, t.tokens, t.token_cliente, t.secret_api, t.url_callback, t.cliente_api_id, t.app_id, t.aplicacion_id, a.nombre nombre_aplicacion, a.ruta');
		$this->db->from('tienda_virtual t');
		$this->db->join('aplicacion a', 'a.id = t.aplicacion_id');
        //~ $this->db->where('franchise_id', $id_franchise);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the applications
    public function obtener_tiendas() {
        $query = $this->db->get('tiendas');

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
        $result = $this->db->get('tienda_virtual');
        if ($result->num_rows() > 0) {
            return 'existe';
        } else {
            $result = $this->db->insert("tienda_virtual", $datos);
            $id = $this->db->insert_id();
            return $id;
        }
    }

    // Public method to obtain the tienda by id
    public function obtenerTiendas($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tienda_virtual');
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
        $result = $this->db->where('nombre =', $datos['nombre']);
        $result = $this->db->where('id !=', $datos['id']);
        $result = $this->db->get('tienda_virtual');

        if ($result->num_rows() > 0) {
            echo '1';
        } else {
            $result = $this->db->where('id', $datos['id']);
            $result = $this->db->update('tienda_virtual', $datos);
            return $result;
        }
    }


    // Public method to delete a record
     public function delete($id) {
        $result = $this->db->where('tiendav_id =', $id);
        $result = $this->db->get('productos_tiendav');

        if ($result->num_rows() > 0) {
            echo 'existe';
        } else {
            $result = $this->db->delete('tienda_virtual', array('id' => $id));
            return $result;
        }
       
    }
    

}
?>
