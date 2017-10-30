<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MApis extends CI_Model {

    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    // Método público para obtener colas
    public function obtener() {
        $query = $this->db->get('cola');

        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Método público para obtener cola por tiendav_id
    public function obtenerByTiendav($tiendav_id) {
        $this->db->where('tiendav_id', $tiendav_id);
        $query = $this->db->get('cola');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Método público para obtener cola por tiendav_id y un estatus específico
    public function obtenerByTiendavEstatus($tiendav_id, $estatus) {
        $this->db->where('tiendav_id', $tiendav_id);
        $this->db->where('status', $estatus);
        $query = $this->db->get('cola');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Método público para obtener detalles (productos) por cola_id
    public function obtenerDetalles($cola_id) {
        $this->db->where('cola_id', $cola_id);
        $query = $this->db->get('cola_detalle');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Método público para obtener detalles (productos) por cola_id y status
    public function obtenerDetallesEstatus($cola_id, $estatus) {
        $this->db->where('cola_id', $cola_id);
        $this->db->where('status', $estatus);
        $query = $this->db->get('cola_detalle');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }
    
    // Método público para obtener datos de una categoría por id
    public function obtenerCategoria($categoria_id) {
        $this->db->where('id', $categoria_id);
        $query = $this->db->get('categorias');
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return $query->result();
    }

    // Public method to insert the data
    public function insertCola($datos) {
        
		$result = $this->db->insert("cola", $datos);
		$id = $this->db->insert_id();
		return $id;
            
    }

    // Public method to insert the data
    public function insertColaDetalle($datos) {
        
		$result = $this->db->insert("cola_detalle", $datos);
		$id = $this->db->insert_id();
		return $id;
            
    }

    // Método público, para actualizar los datos (estatus) de la cola
    public function update_cola($datos) {
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('cola', $datos);
		return $result;
    }

    // Método público, para actualizar los datos (estatus) del detalle (producto) de la cola
    public function update_detalle_cola($datos) {
		$result = $this->db->where('id', $datos['id']);
		$result = $this->db->update('cola_detalle', $datos);
		return $result;
    }


}
?>
