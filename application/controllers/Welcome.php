<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
        parent::__construct();
        
		// Load database
        $this->load->model('MServices');
        $this->load->model('MOrder');
        $this->load->model('MClient');
        $this->load->model('MServices');
        $this->load->model('MProduct');
        //~ $this->load->model('MFranchises');
    }
	 
	public function index()
	{
		//~ $data['pagina'] = 'public.php';
		//~ $data['section'] = 'public';
		//~ $data['servicios'] = $this->MServices->obtener();
		//~ $this->load->view('base_public', $data);
		$this->load->view('login_form');
	}
	
	public function admin()
	{
		$this->load->view('login_form');
	}
	
	public function somos()
	{
		$data['pagina'] = 'somos.php';
		$data['section'] = 'somos';
		$this->load->view('base_public', $data);
	}
	
	public function servicios()
	{
		$data['pagina'] = 'servicios.php';
		$data['section'] = 'servicios';
		$data['servicios'] = $this->MServices->obtener();
		$this->load->view('base_public', $data);
	}
	
	public function solicitud()
	{
		$data['pagina'] = 'solicitud.php';
		$data['section'] = 'solicitud';
		$data['direcciones'] = array();
        $data['vehiculos'] = array();
        $data['franquicias'] = $this->MFranchises->obtener();
        $data['servicios'] = $this->MServices->obtener();
		//Armamos la lista de direcciones asociadas
		if(isset($this->session->userdata['logged_in_public'])){
			$query_addresses = $this->db->get_where('addresses', array('customer_id'=>$this->session->userdata['logged_in_public']['id']));
			if($query_addresses->num_rows() > 0){
				foreach($query_addresses->result() as $address){
					$data['direcciones'][] = $address;
				}
			}
		}
		//Armamos la lista de vehículos asociados
		if(isset($this->session->userdata['logged_in_public'])){
			$query_vehicles = $this->db->get_where('vehicles', array('customer_id'=>$this->session->userdata['logged_in_public']['id']));
			if($query_vehicles->num_rows() > 0){
				foreach($query_vehicles->result() as $vehicle){
					$data['vehiculos'][] = $vehicle;
				}
			}
		}
		
		$this->load->view('base_public', $data);
	}
	
	public function noticias()
	{
		$data['pagina'] = 'noticias.php';
		$data['section'] = 'noticias';
		$this->load->view('base_public', $data);
	}
	
	public function contacto()
	{
		$data['pagina'] = 'contacto.php';
		$data['section'] = 'contacto';
		$this->load->view('base_public', $data);
	}
	
	public function public_perfil()
	{
		$data['pagina'] = 'public_perfil.php';
		$data['section'] = 'public';
        $data['list_orders_services'] = $this->MOrder->getServices();
        $data['list_orders_products'] = $this->MOrder->getProducts();
        $data['list_serv'] = $this->MServices->obtener();
        $data['list_prod'] = $this->MProduct->obtener();
        $data['list_franq'] = $this->MFranchises->obtener();
        $data['list_client'] = $this->MClient->obtener();
        $data['status'] = $this->MOrder->obtenerStatus();
        $data['direcciones'] = array();
        $data['vehiculos'] = array();
        $data['ordenes'] = array();
		
		//Armamos la lista de ordenes asociados
		$query_orders = $this->db->get_where('orders', array('customer_id'=>$this->session->userdata['logged_in_public']['id']));
		if($query_orders->num_rows() > 0){
			foreach($query_orders->result() as $order){
				$data['ordenes'][] = $order;
			}
		}
		//Armamos la lista de direcciones asociadas
		$query_addresses = $this->db->get_where('addresses', array('customer_id'=>$this->session->userdata['logged_in_public']['id']));
		if($query_addresses->num_rows() > 0){
			foreach($query_addresses->result() as $address){
				$data['direcciones'][] = $address;
			}
		}
		//Armamos la lista de vehículos asociados
		$query_vehicles = $this->db->get_where('vehicles', array('customer_id'=>$this->session->userdata['logged_in_public']['id']));
		if($query_vehicles->num_rows() > 0){
			foreach($query_vehicles->result() as $vehicle){
				$data['vehiculos'][] = $vehicle;
			}
		}
		$this->load->view('base_public', $data);
	}
	
}
