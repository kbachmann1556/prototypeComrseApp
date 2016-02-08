<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index()
	{	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/products');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);


		$result = curl_exec($ch);
		$decoded = json_decode($result, true);
		// var_dump($decoded);
		// var_dump($ch);
		curl_close($ch);
		// $this->session->sess_destroy();
		$this->load->view('products', array('decoded'=>$decoded));
	}

	public function get_product_page($id)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/products/'.$id);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HEADER, true);


		$result = curl_exec($ch);
		$decoded = json_decode($result, true);
		// var_dump($decoded);
		// var_dump($ch);
		curl_close($ch);
		$this->load->view('single_product', array("decoded" => $decoded));
	}

	public function add_to_cart($id)
	{	
		if(null !== $this->session->userdata('cart'))
		{
			$cart = $this->session->userdata('cart');
			// var_dump($cart);
			// die();
			$ch_add = curl_init("https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/cart/".$cart['id']."/product/".$id."?quantity=1&priceOrder=true");
			curl_setopt($ch_add, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch_add, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
			curl_setopt($ch_add, CURLOPT_RETURNTRANSFER, true);

			$result = curl_exec($ch_add);
			$decoded = json_decode($result, true);
			// var_dump($decoded);
			// die();
			curl_close($ch_add);
			$this->session->set_userdata('cart', $decoded);
			redirect('/cart');

		}else{
			// echo 'here here herer';
			// die();
			$ch = curl_init('https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/cart');                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$result_cart = curl_exec($ch);
			$decoded_cart = json_decode($result_cart, true);
			// var_dump($decoded_cart);
			// die();
			curl_close($ch);

			$ch_add = curl_init("https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/cart/".$decoded_cart['id']."/product/".$id."?quantity=1&priceOrder=true");
			curl_setopt($ch_add, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch_add, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
			curl_setopt($ch_add, CURLOPT_RETURNTRANSFER, true);

			$result = curl_exec($ch_add);
			$decoded = json_decode($result, true);
			// var_dump($decoded);
			// die();
			curl_close($ch_add);

			$this->session->set_userdata('cart', $decoded);
			redirect('/cart');
		}
	}
	public function load_cart()
	{
		$cart = $this->session->userdata('cart');
		$this->load->view('cart', array("cart"=>$cart));
	}
	public function delete_item()
	{

		// /organizations/{organization_id}/cart/{cart_id}/items/{item_id}
		$cart_id = $this->input->post('cart_id');
		$item_id = $this->input->post('item_id');
		// echo $cart_id;
		// echo $item_id;

		$ch = curl_init('https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/cart/'.$cart_id.'/items/'.$item_id);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		$decoded = json_decode($result, true);
		// var_dump($decoded);
		// die();
		curl_close($ch);
		$this->session->set_userdata('cart', $decoded);		
		redirect('/cart');
		// die();
	}

	public function shippings()
	{
		$ch = curl_init("https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/shippings");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		$decoded = json_decode($result, true);
		// var_dump($decoded);
		// die();
		curl_close($ch);
		$this->load->view('shipping_options', array('shippings'=>$decoded));
	}

	public function payment()
	{
		$this->load->view('payment');
	}


	public function addresses()
	{
		$payment = array(
			"cart_id"=>$this->session->userdata('cart')['id'],
			"credit_card_number"=>$this->input->post('ccNumber'),
			"credit_card_c_v_c"=>$this->input->post('ccCVC'),
			"credit_card_exp_month"=>$this->input->post('ccMonth'),
			"credit_card_exp_year"=>$this->input->post('ccYear')
			);
		$this->session->set_userdata('payment', $payment);
		// var_dump($this->session->userdata('payment'));
		// die();
		$this->load->view('addresses');
	}

	public function add_addresses()
	{
		$cart = $this->session->userdata('cart');
		// var_dump($cart);
		// die();
		$data = array(
			"customer"=>array(
				"id"=>$cart['customer']['id'],
				"first_name"=>$this->input->post('first_name'),
				"last_name"=>$this->input->post('last_name'),
				"email_address"=>"test@test.com",
				// "customer_attributes"=>array(
				// 	"name"=>$cart['customer']['customer_attributes'][0]['name'],
				// 	"value"=>"GFghKJHghGJhgh",
				// 	"customer_id"=>$cart['customer']['customer_attributes'][0]['customer_id']
				// 	)
				),
			"addresses"=>array(
				array(
					"first_name"=>$this->input->post('first_name_billing'),
					"last_name"=>$this->input->post('last_name_billing'),
					"address_type"=>"billing",
					"address_line1"=>$this->input->post('address_billing'),
					"city"=>$this->input->post('city_billing'),
					"state"=>array(
						"name"=>"Washington",
						"abbreviation"=>"WA"
						),
					"country"=>array(
						"name"=>"United States",
						"abbreviation"=>"US"
						),
					"postal_code"=>$this->input->post('zip_billing'),
					"phone_primary"=>array(
						"id"=>null,
						"phone_number"=>$this->input->post('phone_billing'),
						"is_active"=>true,
						"is_default"=>true
						),
					"phone_secondary"=>array(
						"id"=>null,
						"phone_number"=>$this->input->post('phone_billing'),
						"is_active"=>false,
						"is_default"=>false
						),
					"phone_fax"=>array(
						"id"=>null,
						"phone_number"=>$this->input->post('phone_billing'),
						"is_active"=>false,
						"is_default"=>false
						),
					"company_name"=>"Test Company",
					"is_business"=>false,
					"is_default"=>true
					),
				array(
					"first_name"=>$this->input->post('first_name'),
					"last_name"=>$this->input->post('last_name'),
					"address_type"=>"shipping",
					"address_line1"=>$this->input->post('address'),
					"city"=>$this->input->post('city'),
					"state"=>array(
						"name"=>"Washington",
						"abbreviation"=>"WA"
						),
					"country"=>array(
						"name"=>"United States",
						"abbreviation"=>"US"
						),
					"postal_code"=>$this->input->post('zip'),
					"phone_primary"=>array(
						"id"=>null,
						"phone_number"=>$this->input->post('phone'),
						"is_active"=>true,
						"is_default"=>true
						),
					"phone_secondary"=>array(
						"id"=>null,
						"phone_number"=>$this->input->post('phone'),
						"is_active"=>false,
						"is_default"=>false
						),
					"phone_fax"=>array(
						"id"=>null,
						"phone_number"=>$this->input->post('phone'),
						"is_active"=>false,
						"is_default"=>false
						),
					"company_name"=>"Test Company",
					"is_business"=>false,
					"is_default"=>false
					)
				)
			);
		$data_string = json_encode($data);
		// echo $data_string;
		// die();

		$ch = curl_init('https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/customer/addresses');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=',
			'X-Comrse-Version: 2015-02-01',
			'Content Type: application/json'));
		
		$result = curl_exec($ch);
		// var_dump($result);
		$decoded = json_decode($result, true);
		// var_dump($decoded);
		// die();
		curl_close($ch);
		redirect('/review');
	}

	public function review_info()
	{
		$cart = $this->session->userdata('cart');
		$payment = $this->session->userdata('payment');
		$ch_cart = curl_init("https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/cart/".$cart['id']."?priceOrder=true");
		curl_setopt($ch_cart, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch_cart, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
		curl_setopt($ch_cart, CURLOPT_RETURNTRANSFER, true);

		$result_cart = curl_exec($ch_cart);
		$decoded_cart = json_decode($result_cart, true);
		// var_dump($decoded_cart);
		// die();
		curl_close($ch_cart);
		$this->session->set_userdata('cart', $decoded_cart);		

		$ch = curl_init("https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/customer/addresses/".$cart['customer']['id']);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=','X-Comrse-Version: 2015-02-01','Content Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);
		$decoded = json_decode($result, true);
		// var_dump($decoded);
		// die();
		curl_close($ch);
		$this->load->view('review', array('cart'=>$decoded_cart, 'payment'=>$payment, 'addresses'=>$decoded));
	}

	public function complete_order()
	{	
		//code to complete order//
		// $cart = $this->session->userdata('cart');
		// $payment = $this->session->userdata('payment');
		// $data_string = json_encode($payment);
		// $ch = curl_init('https://sandbox-omni.comr.se/1.0/organizations/sbz_xqlss463hj-m4bexgw/orders/'.$cart['customer']['id'].'/complete');                                                                      
		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		// 	'X-Comrse-Token: nRsCGD/IOC/G7DsFrMDTwZKYqZgjNkxaDIUAApNsNyM=',
		// 	'X-Comrse-Version: 2015-02-01',
		// 	'Content Type: application/json'));
		
		// $result = curl_exec($ch);
		// $decoded = json_decode($result, true);
		// // var_dump($decoded);
		// // die();
		// curl_close($ch);
		redirect('complete');
	}

	public function complete()
	{
		$cart = $this->session->userdata('cart');
		$this->load->view('complete', array('cart'=>$cart));
	}
	public function destroy_sess()
	{
		$this->session->sess_destroy();
		redirect('/');	
	}
}
