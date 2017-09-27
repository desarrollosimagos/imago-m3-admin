<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class MUpdateM3 extends CI_Model {


    public function __construct() {
       
        parent::__construct();
        $this->load->database();
    }

    //Public method to obtain the services
    public function update_prices_db() {
        $consulta = "UPDATE m3_tienda00.ps_product_shop, mercuri.productos, ";
		$consulta .= "mercuri.tiendas SET m3_tienda00.ps_product_shop.price = mercuri.productos.costo_bolivar ";
		$consulta .= "WHERE mercuri.tiendas.id = mercuri.productos.tienda_id AND ";
		$consulta .= "m3_tienda00.ps_product_shop.id_product = mercuri.productos.referencia ";
		$consulta .= "AND m3_tienda00.ps_product_shop.id_shop = mercuri.tiendas.referencia";
		
		$query = $this->db->query($consulta);
    }    

}
?>
