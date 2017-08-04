<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CClientPublic extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load database
        $this->load->model('MClient');
        $this->load->model('MFranchises');
        $this->load->model('MServices');
        $this->load->model('MMails');
    }

    public function index() {
        redirect('public_perfil');
    }
    
    // Método para guardar un nuevo registro desde la interfaz pública
    public function add3() {

        $datos = array(
            'username' => $this->input->post('username'),
            'password' => 'pbkdf2_sha256$12000$' . hash("sha256", $this->input->post('password')),
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'cell_phone' => $this->input->post('cell_phone'),
            'status' => $this->input->post('status')
        );
        if($this->input->post('g-recaptcha-response') != ''){
			echo "Pasó";
			$result_id = $this->MClient->insert($datos);
			if($result_id != 'existe cliente'){
				echo "Pasó";
				// Enviamos un correo de validación a la dirección correspondiente al usuario
				$this->MMails->enviarMail($result_id, $this->input->post('username'));
			}
		}
    }

    // Método para guardar un nuevo registro
    public function addCar() {

        $datos = array(
            'customer_id' => $this->input->post('customer_id2'),
            'trademark' => $this->input->post('trademark'),
            'model' => $this->input->post('model'),
            'color' => $this->input->post('color'),
            'year' => $this->input->post('year'),
            'license_plate' => $this->input->post('license_plate'),
        );

        $result = $this->MClient->insertCars($datos);
        
        echo $result;
    }

    // Método para actualizar un vehículo de un cliente
    public function updateCarPublic() {

        $datos = array(
			'id' => $this->input->post('id_vehiculo'),
            'customer_id' => $this->input->post('customer_id2'),
            'trademark' => $this->input->post('trademark'),
            'model' => $this->input->post('model'),
            'color' => $this->input->post('color'),
            'year' => $this->input->post('year'),
            'license_plate' => $this->input->post('license_plate'),
        );

        $result = $this->MClient->updateCars($datos);
        
        echo $result;
    }

    // Método para guardar un nuevo registro
    public function addAddress() {

        $datos = array(
            'customer_id' => $this->input->post('customer_id'),
            'description' => $this->input->post('description'),
            'city' => $this->input->post('city'),
            'zip' => $this->input->post('zip'),
            'address_1' => $this->input->post('address_1'),
            'address_2' => $this->input->post('address_2'),
            'phone' => $this->input->post('phone_1'),
            'cell_phone' => $this->input->post('cell_phone'),
        );

        $result = $this->MClient->insertAddress($datos);
    }
    
    // Método para guardar un nuevo registro
    public function addAddressPublic() {

        $datos = array(
            'customer_id' => $this->input->post('customer_id'),
            'description' => $this->input->post('description'),
            'city' => $this->input->post('city'),
            'zip' => $this->input->post('zip'),
            'address_1' => $this->input->post('address_1'),
            'address_2' => $this->input->post('address_2'),
            'phone' => $this->input->post('phone_1'),
            'cell_phone' => $this->input->post('cell_phone'),
        );

        $result = $this->MClient->insertAddressPublic($datos);
        
        echo $result;
    }
    
    // Método para actualizar una dirección de un cliente
    public function updateAddressPublic() {

        $datos = array(
            'id' => $this->input->post('id_direccion'),
            'customer_id' => $this->input->post('customer_id'),
            'description' => $this->input->post('description'),
            'city' => $this->input->post('city'),
            'zip' => $this->input->post('zip'),
            'address_1' => $this->input->post('address_1'),
            'address_2' => $this->input->post('address_2'),
            'phone' => $this->input->post('phone_1'),
            'cell_phone' => $this->input->post('cell_phone'),
        );

        $result = $this->MClient->updateAddress($datos);
        
        echo $result;
    }
    
    // Método para eliminar una dirección de un usuario cliente
	function deleteAddressPublic($id) {
		
        $result = $this->MClient->deleteAddress($id);
        
        echo $result;
    }
    
    // Método para eliminar un vehículo de un usuario cliente
	function deleteCarPublic($id) {
		
        $result = $this->MClient->deleteCars($id);
        
        echo $result;
    }
    
    // Método para actualizar de forma directa los teléfonos de un cliente
    public function update_phones() {
        $datos = array(
            'id' => $this->input->post('customer_id3'),
            'phone' => $this->input->post('phone_2'),
            'cell_phone' => $this->input->post('cell_phone_2')
        );
        // Reescribimos los teléfonos en los datos de sesión
        $this->session->userdata['logged_in_public']['phone'] = $this->input->post('phone_2');
        //~ echo $this->session->userdata['logged_in_public']['phone'];
        $this->session->userdata['logged_in_public']['cell_phone'] = $this->input->post('cell_phone_2');
        //~ echo $this->session->userdata['logged_in_public']['cell_phone'];
        // Actualizamos el cliente
        $result = $this->MClient->update($datos);
        
        echo $result;
    }

    public function ajax_client() {
        $result = $this->MClient->clients();
        echo json_encode($result);
    }

    public function ajax_client2($id) {
        $result = $this->MClient->obtenerClients($id);
        echo json_encode($result);
    }

    public function ajax_car($id) {
        $result = $this->MClient->obtenerCars($id);
        echo json_encode($result);
    }

    public function ajax_address($id) {
        $result = $this->MClient->obtenerAddress($id);
        echo json_encode($result);
    }

    public function ajax_car_id($id) {
        $result = $this->MClient->obtenerCarsId($id);
        echo json_encode($result);
    }

    public function ajax_address_id($id) {
        $result = $this->MClient->obtenerAddressId($id);
        echo json_encode($result);
    }

    public function ajax_services_franchise_id($id) {
        $result = $this->MFranchises->obtenerServicesFranchiseIdDetail($id);
        echo json_encode($result);
    }

    public function ajax_service_id($id) {
        $result = $this->MServices->obtenerServices($id);
        echo json_encode($result);
    }
    
    // Método para validar el correo de un cliente y proceder a activarlo
    public function validar_mail() {
		$id_client = $this->input->get('id');
		$datos_update = array('id'=>$id_client, 'status'=>1);
		// Activamos el cliente
        $result = $this->MClient->update_status($datos_update);
        
        if($result){
			// Obtenemos y armamos los datos del cliente
			$mail = $this->MClient->obtenerClients($id_client);
			$datos_reg = array(
				'name'=>$mail[0]->name,
				'lastname'=>$mail[0]->lastname,
				'phone'=>$mail[0]->phone,
				'cell_phone'=>$mail[0]->cell_phone,
				'username'=>$mail[0]->username
			);
			// Enviamos los datos registrados al correo del cliente y lo redireccionamos al inicio de sesión
			$this->MMails->enviarMailConfirm($datos_reg);
			redirect('public?confirm=1');
		}
    }

}
