<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CClient extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load database
        $this->load->model('MClient');
        $this->load->model('MMails');
    }

    public function index() {
        $this->load->view('base');
        $data['listar'] = $this->MClient->obtener();
        $this->load->view('client/lista', $data);
        $this->load->view('footer');
    }

    public function register() {
        $this->load->view('base');
        $this->load->view('client/registrar');
        $this->load->view('footer');
    }

    // Método para guardar un nuevo registro
    public function add() {

        $datos = array(
            'username' => $this->input->post('username'),
            'password' => 'pbkdf2_sha256$12000$' . hash("sha256", $this->input->post('password')),
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'cell_phone' => $this->input->post('cell_phone'),
            'status' => $this->input->post('status')
        );
        $result_id = $this->MClient->insert($datos);
       
        if ($result_id !== 'existe cliente'){
            
            $direccion = $this->input->post('direcciones');

            foreach ($direccion as $dire) {

                $dire = explode(";", $dire);

                if ($dire[1] != 'Ningún dato disponible en esta tabla') {

                    $city = $dire[1];
                    $zip = $dire[2];
                    $description = $dire[3];
                    $address_1 = $dire[4];
                    $address_2 = $dire[5];
                    $phone_1 = $dire[6];
                    $cell_phone_1 = $dire[7];

                    $datos2 = array(
                        'description' => $description,
                        'customer_id' => $result_id,
                        'city' => $city,
                        'zip' => $zip,
                        'address_1' => $address_1,
                        'address_2' => $address_2,
                        'phone' => $phone_1,
                        'cell_phone' => $cell_phone_1,
                    );

                    $result = $this->MClient->insertAddress($datos2);
                }
            }
            $vehiculos = $this->input->post('vehiculos');

            foreach ($vehiculos as $vehi) {

                $vehi = explode(";", $vehi);

                if ($vehi[1] != 'Ningún dato disponible en esta tabla') {

                    $trademark = $vehi[1];
                    $model = $vehi[2];
                    $color = $vehi[3];
                    $year = $vehi[4];
                    $license_plate = $vehi[5];

                    $datos3 = array(
                        'customer_id' => $result_id,
                        'trademark' => $trademark,
                        'model' => $model,
                        'color' => $color,
                        'year' => $year,
                        'license_plate' => $license_plate,
                    );

                    $result = $this->MClient->insertCars($datos3);
                }
            }
            
            
        }


    }

    // Método para guardar un nuevo registro
    public function add2() {

        $datos = array(
            'username' => $this->input->post('username'),
            'password' => 'pbkdf2_sha256$12000$' . hash("sha256", $this->input->post('password')),
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'cell_phone' => $this->input->post('cell_phone'),
            'status' => $this->input->post('status')
        );
        $result_id = $this->MClient->insert($datos);
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

    // Método para editar
    public function edit() {

        $this->load->view('base');
        $data['id'] = $this->uri->segment(3);
        $data['editar'] = $this->MClient->obtenerClients($data['id']);
        $data['listar_vehi'] = $this->MClient->obtenerCars($data['id']);
        $data['listar_dire'] = $this->MClient->obtenerAddress($data['id']);
        $this->load->view('client/editar', $data);
        $this->load->view('footer');
    }

    // Método para actualizar
    public function update() {

        $regs_eliminar1 = $this->input->post('codigos_des1');
        $regs_eliminar2 = $this->input->post('codigos_des2');

        // Verificamos si hay registros para eliminar
        if ($regs_eliminar1 != '') {
            $regs_eliminar1 = explode(",", $regs_eliminar1);

            // Desvinculamos (eliminamos de la tabla direcciones)
            foreach ($regs_eliminar1 as $reg) {

                // Eliminamos la asociación de la tabla direcciones
                $result = $this->MClient->deleteAddress($reg);
            }
        }

        // Verificamos si hay registros para eliminar
        if ($regs_eliminar2 != '') {
            $regs_eliminar2 = explode(",", $regs_eliminar2);

            // Desvinculamos (eliminamos de la tabla vehiculos)
            foreach ($regs_eliminar2 as $reg) {

                // Eliminamos la asociación de la tabla vehiculos
                $result = $this->MClient->deleteCars($reg);
            }
        }

        $datos = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'lastname' => $this->input->post('lastname'),
            'phone' => $this->input->post('phone'),
            'cell_phone' => $this->input->post('cell_phone')
        );
        $result = $this->MClient->update($datos);

        $direccion = $this->input->post('direcciones');
 
        foreach ($direccion as $dire) {

            $dire = explode(";", $dire);

            if ($dire[0] == 'undefined' && $dire[1] != 'Ningún dato disponible en esta tabla') {
                
                $city = $dire[1];
                $zip = $dire[2];
                $description = $dire[3];
                $address_1 = $dire[4];
                $address_2 = $dire[5];
                $phone_1 = $dire[6];
                $cell_phone_1 = $dire[7];

                $datos2 = array(
                    'description' => $description,
                    'customer_id' => $this->input->post('id'),
                    'city' => $city,
                    'zip' => $zip,
                    'address_1' => $address_1,
                    'address_2' => $address_2,
                    'phone' => $phone_1,
                    'cell_phone' => $cell_phone_1,
                );

                $result = $this->MClient->insertAddress($datos2);
            }

            if ($dire[1] != 'Ningún dato disponible en esta tabla') {
                
                $id = $dire[0];
                $city = $dire[1];
                $zip = $dire[2];
                $description = $dire[3];
                $address_1 = $dire[4];
                $address_2 = $dire[5];
                $phone_1 = $dire[6];
                $cell_phone_1 = $dire[7];


                $datos2 = array(
                    'description' => $description,
                    'customer_id' => $this->input->post('id'),
                    'id' => $id,
                    'city' => $city,
                    'zip' => $zip,
                    'address_1' => $address_1,
                    'address_2' => $address_2,
                    'phone' => $phone_1,
                    'cell_phone' => $cell_phone_1,
                );
                
                
                

                $result = $this->MClient->updateAddress($datos2);
            }
        }

        $vehiculos = $this->input->post('vehiculos');

        foreach ($vehiculos as $vehi) {

            $vehi = explode(";", $vehi);

            if ($vehi[0] == 'undefined' && $vehi[1] != 'Ningún dato disponible en esta tabla') {

                $trademark = $vehi[1];
                $model = $vehi[2];
                $color = $vehi[3];
                $year = $vehi[4];
                $license_plate = $vehi[5];


                $datos3 = array(
                    'customer_id' => $this->input->post('id'),
                    'trademark' => $trademark,
                    'model' => $model,
                    'color' => $color,
                    'year' => $year,
                    'license_plate' => $license_plate,
                );

                $result = $this->MClient->insertCars($datos3);
            }

            if ($vehi[1] != 'Ningún dato disponible en esta tabla') {

                $id = $vehi[0];
                $trademark = $vehi[1];
                $model = $vehi[2];
                $color = $vehi[3];
                $year = $vehi[4];
                $license_plate = $vehi[5];


                $datos3 = array(
                    'id' => $id,
                    'customer_id' => $this->input->post('id'),
                    'trademark' => $trademark,
                    'model' => $model,
                    'color' => $color,
                    'year' => $year,
                    'license_plate' => $license_plate,
                );

                $result = $this->MClient->updateCars($datos3);
            }
        }
    }

   // Método para actualizar de forma directa el status de un usuario
    public function update_status($id) {
        $accion = $this->input->post('accion');
        $estatus = 1;

        if ($accion == 'desactivar') {
            $estatus = 0;
        }

        // Armamos la data a actualizar
        $data_usuario = array(
            'id' => $id,
            'status' => $estatus,
            'd_update' => date('Y-m-d H:i:s'),
        );

        // Actualizamos el usuario con los datos armados
        $result = $this->MClient->update_status($data_usuario);
    }


    // Método para editar password
    public function pass() {
        print_r('hola', $this->input->post('password'));
        $datos = array(
            'id' => $this->input->post('id_client'),
            'password' => 'pbkdf2_sha256$12000$' . hash("sha256", $this->input->post('password')),
        );

        $result = $this->MClient->pass($datos);

        if ($result) {
            /*  $this->libreria->generateActivity('Eliminado País', $this->session->userdata['logged_in']['id']); */
        }
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
