<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CUpdateM3 extends CI_Controller {

	public function __construct() {
        parent::__construct();
       
		// Load database
        $this->load->model('MMessages');
		
    }
	
	// Método para guardar un nuevo registro desde la interfaz pública
    public function update_prices() {

        $datos = array(
            //~ 'name' => $this->input->post('name'),
            //~ 'email' => $this->input->post('email'),
            //~ 'subject' => $this->input->post('subject'),
            //~ 'message' => $this->input->post('message')
            'prueba' => "Prueba"
        );
        $this->load->view('base');
		$this->load->view('update_prices/price_update_m3', $datos);
		$this->load->view('footer');
    }
	
	
}
