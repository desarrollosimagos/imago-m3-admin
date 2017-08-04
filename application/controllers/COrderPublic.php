<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class COrderPublic extends CI_Controller {
    

    public function __construct() {
        parent::__construct();

        
        // Load database
        $this->load->model('MOrder');
        $this->load->model('MClient');
        $this->load->model('MServices');
        $this->load->model('MProduct');
        $this->load->model('MFranchises');
        $this->load->model('MClient');
    }

    public function index() {
        
        redirect('public_perfil');
    }
    
    //Method to save a new record
    public function add_public() {
		// Conversión
		$fecha = $this->input->post('fecha');
		$fecha = explode('/', $fecha);
		$fecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];

        // Insert in orders
        $datos = array(
            'customer_id' => $this->input->post('customer_id'),
            //~ 'user_id' => $this->session->userdata('logged_in_public')['id'],
            'address_service_id' => $this->input->post('address'),
            'address_invoice_id' => $this->input->post('address'),
            'date_order' => date('Y-m-d H:i:s'),
            'date_citation' => $fecha,
            'sub_total' => $this->input->post('sub_total'), // Valor temporal
            'impuesto' => $this->input->post('impuesto'), // Valor temporal
            'total' => $this->input->post('total'), // Valor temporal
            'vehicle_id' => $this->input->post('vehiculo'),
            'status' => 1,
            'franchise_id' => $this->input->post('franquicia')
        );

        $result_id = $this->MOrder->insert($datos);
        
        echo $result_id;

        if ($result_id != '') {
			// Asociamos los servicios seleccionadas del combo select
			foreach($this->input->post('servicios') as $service_id){
				// Buscamos los datos de cada servicio asociado para obtener el precio y realizar los cálculos correspondientes
				$query_service = $this->MServices->obtenerServices($service_id);
				$sub_total = $query_service[0]->price;
				$iva = 12;  // Monto de iva temporalmente estático
				$impuesto = $sub_total * $iva / 100;
				$total = $sub_total + $impuesto;
				$data_service = array(
				'order_id'=>$result_id, 'service_id'=>$service_id, 'sub_total'=>$sub_total, 'impuesto'=>$impuesto, 'total'=>$total
				);
				$this->MOrder->insertServ($data_service);
			}
        }
    }

}
