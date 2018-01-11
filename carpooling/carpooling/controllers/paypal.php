<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends Front_Controller 
{
	 function  __construct(){
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model(array('payment_model','Trip_model','Customer_model'));
	 }
	 
	 function success(){
	    //get the transaction data
             
             $data['seo_title'] = 'Trip Information';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
            
		$paypalInfo = $this->input->post(null,false);
                $orderNumber = $this->input->get('orderId');
                if($orderNumber && $paypalInfo){

                    $orderDetails = $this->payment_model->get_order($orderNumber);
                    
                    if($orderDetails){
                        $orderParam['order_id'] = $orderDetails->order_id;
                        $orderParam['order_flg'] = '1';
                        $orderParam['payment_flg'] = '1';
                        $orderParam['payment_fields'] = json_encode($paypalInfo);
                        $id = $this->payment_model->save_order($orderParam);


                        $profile = $this->Trip_model->get_trip($orderDetails->order_trip_id);
                        
                        $user_id = $orderDetails->order_passenger_id;
                        $customer = $this->Customer_model->get_customer($user_id);

                        if ($this->check_enquiry($user_id, $profile->trip_id)) {

                            $save['enquiry_passanger_id'] = $user_id;
                            $save['enquiry_trip_id'] = $profile->trip_id;
                            $save['enquire_travel_id'] = $profile->trip_user_id;
                            $save['enquiry_trip_date'] = $orderDetails->order_trip_date;
                            $save['enquiry_trip_status'] = '1';
                            $save['payment_flg'] = '1';
               
                            $id = $this->save_enquiry($save);
                        } 

                        $data['item_name'] = $paypalInfo['item_name']; 
                        $data['txn_id'] = $paypalInfo["txn_id"];
                        $data['payment_amt'] = $paypalInfo["payment_gross"];
                        $data['currency_code'] = $paypalInfo["mc_currency"];
                        $data['status'] = $paypalInfo["payment_status"];
                        
                        // Car Owner Mail 
                        //send an email
                        // get the email template
                        $res = $this->db->where('tplid', '10')->get('tbl_email_template');
                        $row = $res->row_array();

                        // set replacement values for subject & body
                        // {customer_name}
                        $row['tplmessage'] = str_replace('{NAME}', $profile->user_first_name . '.' . $profile->user_last_name, $row['tplmessage']);

                        $row['tplmessage'] = str_replace('{VEHICLE_NUMBER}', $profile->vechicle_number, $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TRIP_NAME}', $data['item_name'], $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TRIP_DATE}', date('d/M/Y',  strtotime($orderDetails->order_trip_date)), $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{AMOUNT}', $data['payment_amt'], $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);


                        $param['message'] = $row['tplmessage'];

                        $email_subject = $this->load->view('template', $param, TRUE);

                        $this->load->library('email');

                        $config['mailtype'] = 'html';

                        $this->email->initialize($config);

                        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
                        $this->email->to($profile->user_email);
                        $this->email->subject($row['tplsubject']);
                        $this->email->message(html_entity_decode($email_subject));

                        $this->email->send();
                        
                        // Traveller Mail 
                        //send an email
                        // get the email template
                        $res = $this->db->where('tplid', '11')->get('tbl_email_template');
                        $row = $res->row_array();

                        // set replacement values for subject & body
                        // {customer_name}
                        $row['tplmessage'] = str_replace('{NAME}', $customer->user_first_name . '.' . $customer->user_last_name, $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TXN_ID}', $data['txn_id'], $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TRIP_DATE}', date('d/M/Y',  strtotime($orderDetails->order_trip_date)), $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{AMOUNT}', $data['payment_amt'], $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);


                        $param['message'] = $row['tplmessage'];

                        $email_subject = $this->load->view('template', $param, TRUE);

                        $this->load->library('email');

                        $config['mailtype'] = 'html';

                        $this->email->initialize($config);

                        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
                        $this->email->to($profile->user_email);
                        $this->email->subject($row['tplsubject']);
                        $this->email->message(html_entity_decode($email_subject));

                        $this->email->send();
                        
                        // Traveller Mail 
                        //send an email
                        // get the email template
                        $res = $this->db->where('tplid', '12')->get('tbl_email_template');
                        $row = $res->row_array();

                        // set replacement values for subject & body
                        // {customer_name}
                        $row['tplmessage'] = str_replace('{OWNER_NAME}', $profile->user_first_name . '.' . $profile->user_last_name, $row['tplmessage']);

                        $row['tplmessage'] = str_replace('{VEHICLE_NUMBER}', $profile->vechicle_number, $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TRAVELLER_NAME}', $customer->user_first_name . '.' . $customer->user_last_name, $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TXN_ID}', $data['txn_id'], $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{TRIP_DATE}', date('d/M/Y',  strtotime($orderDetails->order_trip_date)), $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{AMOUNT}', $data['payment_amt'], $row['tplmessage']);
                        
                        $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);


                        $param['message'] = $row['tplmessage'];

                        $email_subject = $this->load->view('template', $param, TRUE);

                        $this->load->library('email');

                        $config['mailtype'] = 'html';

                        $this->email->initialize($config);

                        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
                        $this->email->to($this->config->item('email'));
                        $this->email->subject($row['tplsubject']);
                        $this->email->message(html_entity_decode($email_subject));

                        $this->email->send();
                        
                        //pass the transaction data to view
                        $this->load->view('paymentSuccess', $data);
                    }else{
                        show_404();
                    }
                }else{
                    show_404();
                }
	 }
	 
	 function cancel(){
            $orderNumber = $this->input->get('orderId');
            if($orderNumber){
                $orderDetails = $this->payment_model->get_order($orderNumber);

                $orderParam['order_id'] = $orderDetails->order_id;
                $orderParam['order_flg'] = '2';
                $orderParam['payment_flg'] = '0';
                $id = $this->payment_model->save_order($orderParam);
            }
            $this->load->view('paymentCancel');
	 }
         
        function check_enquiry($user_id, $trip_id) {

            $this->db->select('*');
            $this->db->where(array('enquiry_passanger_id' => $user_id, 'enquiry_trip_id' => $trip_id,'payment_flg'=>'1'));
            $this->db->from('tbl_enquires');
            $result = $this->db->get();
            if ($result->num_rows > 0) {
                return false;
            } else {
                return true;
            }
        }

        function save_enquiry($data) {

            if (!empty($data['enquiry_id'])) {
                $this->db->where('enquiry_id', $data['enquiry_id'])->update('tbl_enquires', $data);
                return $data['enquiry_id'];
            } else {
                $this->db->insert('tbl_enquires', $data);
                return $this->db->insert_id();
            }
        }
	 
//	 function ipn(){
//		//paypal return transaction details array
//		$paypalInfo	= $this->input->post();
//            echo'<pre>';print_r($paypalInfo);echo'</pre>';exit;
//		$data['user_id'] = $paypalInfo['custom'];
//		$data['product_id']	= $paypalInfo["item_number"];
//		$data['txn_id']	= $paypalInfo["txn_id"];
//		$data['payment_gross'] = $paypalInfo["payment_gross"];
//		$data['currency_code'] = $paypalInfo["mc_currency"];
//		$data['payer_email'] = $paypalInfo["payer_email"];
//		$data['payment_status']	= $paypalInfo["payment_status"];
//
//		$paypalURL = $this->paypal_lib->paypal_url;		
//		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
//		
//		//check whether the payment is verified
//		if(eregi("VERIFIED",$result)){
//		    //insert the transaction data into the database
//			$this->product->insertTransaction($data);
//		}
//    }
}