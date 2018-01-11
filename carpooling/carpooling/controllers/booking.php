<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends Traveller_Controller
{
	function  __construct() {
            parent::__construct();
            $this->load->library('paypal_lib');
            $this->load->model(array('trip_model','payment_model'));
             $this->CI = & get_instance();
            $this->user = $this->CI->carpool_session->userdata('carpool');
	}
	
	
	function pay(){
            $tripLegId = $this->session->userdata('tripLegId');
            $tripDate = $this->session->userdata('tripDate');
            $paypalDetails = $this->payment_model->getPayment('paypal');
            if($tripLegId!='' && $tripDate!='' && $paypalDetails){
                $tripdetails = $this->trip_model->get_tripdetail($tripLegId);
                if($tripdetails){
                    $param['order_id'] = FALSE;
                    $param['order_number'] = date('U').$this->user['user_id'];
                    $param['order_trip_leg_id'] = $tripdetails['trip_led_id'];
                    $param['order_trip_id'] = $tripdetails['trip_id'];
                    $param['order_travel_id'] = $tripdetails['user_id'];
                    $param['order_passenger_id'] = $this->user['user_id'];
                    $param['order_amount'] = $tripdetails['route_rate'];
                    $param['order_commission'] = $this->config->item('payment_commission');
                    $param['order_trip_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $tripDate)));
                    $id = $this->payment_model->save_order($param);
                    $source = explode(",", $tripdetails['source_leg']);
                    $destination = explode(",", $tripdetails['destination_leg']);
                    //Set variables for paypal form
                    
                    if($paypalDetails->is_method == '1'){
                        $paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //Live PayPal api url
                    }else{
                        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
                    }
                    
                    $paypalID = $paypalDetails->payment_id; //business email
                    $returnURL = base_url().'paypal/success?orderId='.$param['order_number']; //payment success url
                    $cancelURL = base_url().'paypal/cancel?orderId='.$param['order_number']; //payment cancel url
                    $notifyURL = base_url().'paypal/ipn?orderId='.$param['order_number']; //ipn url
                    //get particular product data
                    
                    $logo = theme_img('logo-template.jpeg');
                    $this->paypal_lib->set_paypal_url($paypalURL);
                    $this->paypal_lib->add_field('business', $paypalID);
                    $this->paypal_lib->add_field('return', $returnURL);
                    $this->paypal_lib->add_field('cancel_return', $cancelURL);
                    //$this->paypal_lib->add_field('notify_url', $notifyURL);
                    $this->paypal_lib->add_field('item_name', $source[0] .' To '.$destination[0]);
                    $this->paypal_lib->add_field('custom', $this->user['user_id']);
                    $this->paypal_lib->add_field('custom2', $tripDate);
                    $this->paypal_lib->add_field('rm', 2);
                    $this->paypal_lib->add_field('item_number', $tripdetails['trip_led_id']);
                    $this->paypal_lib->add_field('amount',  $tripdetails['route_rate']);		
                    $this->paypal_lib->image($logo);
                    $this->paypal_lib->paypal_auto_form();
                }else{
                    show_404();
                }
            }else{
                show_404();
            }
	}
}