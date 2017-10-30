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
        $this->db->select('t_v.id, t_v.nombre, t_v.descripcion, t_v.url, t_v.tienda_id, t_v.tokens, t_v.token_cliente, t_v.secret_api, t_v.url_callback, t_v.cliente_api_id, t_v.app_id, t_v.aplicacion_id, t_v.formula, a.nombre nombre_aplicacion, a.ruta');
		$this->db->from('users_tiendas u_t');
		$this->db->join('tiendas t', 't.id = u_t.tienda_id');
		$this->db->join('tienda_virtual t_v', 't_v.tienda_id = t.id');
		$this->db->join('aplicacion a', 'a.id = t_v.aplicacion_id');
        $this->db->where('u_t.user_id =', $this->session->userdata['logged_in']['id']);
		$query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    //Public method to obtain the applications
    public function obtener_tiendas() {
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
    
    // Public method to obtain the productos by id
    public function obtenerProductosTienda2($id_producto, $id_tiendav) {
        $this->db->where('producto_id', $id_producto);
        $this->db->where('tiendav_id', $id_tiendav);
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

    // Public method to update a record of the table 'productos_tienda'
    public function update_tp($datos) {
		$result = $this->db->where('producto_id', $datos['producto_id']);
		$result = $this->db->where('tiendav_id', $datos['tiendav_id']);
		$result = $this->db->update('productos_tiendav', $datos);
		return $result;
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
