<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CUpdateM3 extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MUpdateM3');
        $this->load->model('MTiendas');
		
    }
	
	// Método para guardar un nuevo registro desde la interfaz pública
    public function update_prices() {
		if(isset($_GET['id'])){
			// Consultamos la base de datos externa de la tienda
			$data_tienda = $this->MTiendas->obtenerTiendas($_GET['id']);
			
			$result = $this->MUpdateM3->update_prices_db($_GET['id'], $data_tienda[0]->bd_externa, $data_tienda[0]->cp_externo);
			
			$consulta_ejecutada = $this->db->last_query();
			
			$datos = array(
				//~ 'name' => $this->input->post('name'),
				//~ 'email' => $this->input->post('email'),
				//~ 'subject' => $this->input->post('subject'),
				//~ 'message' => $this->input->post('message')
				'resultados' => $consulta_ejecutada
			);
			$this->load->view('base');
			$this->load->view('update_prices/price_update_m3', $datos);
			$this->load->view('footer');
			
		}
    }
	
	
}
