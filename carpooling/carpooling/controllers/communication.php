<?php

class Communication extends Traveller_Controller {

    var $CI;
    var $user;
    var $sparrowmail = 'info@sparrowapp.co, duncan@sparrowapp.co, webrobota@gmail.com';

    function __construct() {
        parent::__construct();

        $this->CI = & get_instance();
        $this->user = $this->CI->carpool_session->userdata('carpool');

        $this->load->model('Trip_model');
        $this->load->model('Customer_model');
        $this->load->model('Money_model');
    }

    function sendenquiry($ajax = false) {

        if ($this->input->post('pmId')) {
            $trip_id = $this->input->post('pmId');
        }


        $tripDate = $this->input->post('tripDate');
        $profile = $this->Trip_model->get_trip($trip_id); //////  розібратись з перевіркою, чи існує trip!!!!!!!!!!!
        
        if ($profile) {

            $user_id = $this->user['user_id'];

            $customer = $this->Customer_model->get_customer($user_id);

            if ($this->check_enquiry($user_id, $trip_id)) {

                $name = $customer->user_first_name . ' ' . $customer->user_last_name;
                $passanger_email = $customer->user_email;
                $passanger_mobile = $customer->user_mobile;


                $traveller_name = $profile->user_first_name . ' ' . $profile->user_last_name;
                $traveller_email = $profile->user_email;
                $traveller_mobile = $profile->user_mobile;

                $save['enquiry_passanger_id'] = $user_id;
                $save['enquiry_trip_id'] = $trip_id;
                $save['enquire_travel_id'] = $profile->trip_user_id;
                $save['enquiry_trip_date'] = date('Y-m-d', strtotime(str_replace('/', '-', $tripDate)));

                if ($this->input->post('unixTime')) {
                    $save['enquiry_trip_unix_time'] = $this->input->post('unixTime');
                } else {
                    $save['enquiry_trip_unix_time'] = "";
                }

                $logdata['user']=$user_id;
                $logdata['action']='send enquiry for trip #'.$trip_id;
                logAll($logdata);


                /*  Geka accept money    // take from user and transfer to bank  */
                if ($this->Money_model->change_usermoney($user_id,-$this->Money_model->money_for_journey)) {
                //$this->Money_model->change_usermoney($profile->trip_user_id,$this->Money_model->money_for_journey);    
                    $this->Money_model->reserve_usermoney($user_id,$this->Money_model->money_for_journey,$trip_id);

                    $save['enquiry_trip_status'] = '1';  //  Geka accept trip enquery
                    $save['enquiry_cron_checked'] = '0'; 


                    $id = $this->save_enquiry($save);


                    $edata['passanger_name'] = $name;
                    $edata['passanger_email'] = $passanger_email;
                    $edata['passanger_mobile']=$passanger_mobile;
                    $edata['vehicle_number']=$profile->vechicle_number;
                    $edata['traveller_name'] = $traveller_name;
                    $edata['traveller_email'] = $traveller_email;
                    $edata['traveller_mobile']=$traveller_mobile;
                    $edata['this_trip_id']=$trip_id;

                    /*
                    if ($this->input->post('triplink')) {
                        $edata['triplink'] = $this->input->post('triplink');
                    } 
                    else {
                        $edata['triplink'] = "page link error";
                    }
                    */
                    $edata['triplink'] = base_url().'community/trip/'.$trip_id;

                    $edata['source']=$profile->source;
                    $edata['destination']=$profile->destination;
                    $edata['trip_time'] = gmdate("d-m-Y h:i a", $profile->trip_unix_time);
                    $edata['licence_number']=$profile->licence_number;


                    if ($_SERVER['SERVER_NAME']!="localhost") {
                        //  Geka send mails
                        //$this->tripowner($edata);
                        $this->tripbooker($edata);
                        $this->tripsparrow($edata);
                    }
            
                    /*
                    $fp = fopen('results.json', 'w');
                    fwrite($fp, json_encode($edata));
                    fclose($fp);
                    */ 

                    if ($ajax) {
                        die(json_encode(array('result' => 5))); ///  success
                    }
                }  else {
                    if ($ajax) {
                        die(json_encode(array('result' => 3))); /// wrong money 
                    }
                }  


            }  else {
                if ($ajax) {
                    die(json_encode(array('result' => 2))); /// wrong enquiry
                }
            }



        } else {
            if ($ajax) {
                die(json_encode(array('result' => 1))); /// if no profile | wrong journey trip_id ?
            }
        }

        //$redirect = $this->input->post('redirect');
        //die;
        //die(json_encode(array('result'=>false,'message'=>lang('error_no_account_record'))));
    }


    function tripsparrow($edata) {
        // send an email */
////            // get the email template
        $res = $this->db->where('tplid', '37')->get('tbl_email_template');
        $row = $res->row_array();

       
        $mailtext = '<hr>
            passenger name: '.$edata['passanger_name'].'<br>
            passenger email: '.$edata['passanger_email'].'<br>
            passenger mobile: '.$edata['passanger_mobile'].'<hr>
            
            driver name: '.$edata['traveller_name'].'<br>
            driver email: '.$edata['traveller_email'].'<br>
            driver mobile: '.$edata['traveller_mobile'].'<br>
            vehicle number: '.$edata['vehicle_number'].'<br>
            licence number: '.$edata['licence_number'].'<hr>
            
            from: '.$edata['source'].'<br>
            to: '.$edata['destination'].'<br>
            date: '.$edata['trip_time'].'<hr>

            trip page: '.$edata['triplink'].'<br>
        ';

        $row['tplmessage'] = str_replace('{TEXT}', $mailtext, $row['tplmessage']);
        $row['tplsubject'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplsubject']);
        $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);
       
        $param['message'] = $row['tplmessage'];

        $email_subject = $this->load->view('template', $param, TRUE);

        $this->load->library('email');

        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
        $this->email->to($this->sparrowmail);
        //$this->email->bcc($this->sparrowmail);
        $this->email->subject($row['tplsubject']);
        $this->email->message(html_entity_decode($email_subject));

        $this->email->send();
    }

    function tripowner($edata) {
        // send an email */
////			// get the email template
        $res = $this->db->where('tplid', '35')->get('tbl_email_template');
        $row = $res->row_array();

        // set replacement values for subject & body
        // {customer_name}

        $row['tplsubject'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplsubject']);
        
        $row['tplsubject'] = str_replace('{VEHICLE_NUMBER}', $edata['vehicle_number'], $row['tplsubject']);

        $row['tplmessage'] = str_replace('{NAME}', $edata['traveller_name'], $row['tplmessage']);

        $row['tplmessage'] = str_replace('{PNAME}', $edata['passanger_name'], $row['tplmessage']);

        $row['tplmessage'] = str_replace('{PEMAIL}', $edata['passanger_email'], $row['tplmessage']);

        $row['tplmessage'] = str_replace('{PMOBILE}', $edata['passanger_mobile'], $row['tplmessage']);

        $row['tplmessage'] = str_replace('{IP}', $this->input->ip_address(), $row['tplmessage']);

        $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);
       
        $param['message'] = $row['tplmessage'];

        $email_subject = $this->load->view('template', $param, TRUE);

        $this->load->library('email');

        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
        $this->email->to($edata['traveller_email']);
        //$this->email->bcc($this->sparrowmail);
        $this->email->subject($row['tplsubject']);
        $this->email->message(html_entity_decode($email_subject));

        $this->email->send();
    }

    function tripbooker($edata) {
        // send an email */
        // get the email template

    	/*
Hello {NAME}



Thank you for your enquiry with Sparrow. Please wait for the trip owner to accept this trip.
{TRIPLINK}
A Sparrow will be in touch to arrange a localised pick up location.



This is an automated email, please don't reply.

    	*/


        $res = $this->db->where('tplid', '35')->get('tbl_email_template');
        $row = $res->row_array();

        // set replacement values for subject & body

        $row['tplsubject'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplsubject']);
        $row['tplsubject'] .= ' - trip#'.$edata['this_trip_id'];

        $row['tplmessage'] = str_replace('{NAME}', $edata['passanger_name'], $row['tplmessage']);
        
        $row['tplmessage'] = str_replace('{TRIP}', $this->config->item('base_url'), $row['tplmessage']);
        
        $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);
        
        $row['tplmessage'] = str_replace('{ADMIN_EMAIL}', $this->config->item('admin_email'), $row['tplmessage']);

        
        $row['tplmessage'] = str_replace('{TRIPLINK}', $edata['triplink'], $row['tplmessage']);
        

        $param['message'] = $row['tplmessage'];

        $email_subject = $this->load->view('template', $param, TRUE);
        
        $this->load->library('email');

        $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
        $this->email->to($edata['passanger_email']);
        //$this->email->bcc($this->config->item('email'));
        $this->email->subject($row['tplsubject']);
        $this->email->message(html_entity_decode($email_subject));

        $this->email->send();
    }

    function check_enquiry($user_id, $trip_id) {

        $this->db->select('*');
        $this->db->where(array('enquiry_passanger_id' => $user_id, 'enquiry_trip_id' => $trip_id,'payment_flg'=>'0'));
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

}
