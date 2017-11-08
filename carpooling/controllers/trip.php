<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trip extends Front_Controller {

    var $student;

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('trip_model');
        $data['error'] = "";
        $this->CI = & get_instance();
        $this->user = $this->CI->carpool_session->userdata('carpool');
        $this->load->helper('form');
        $this->load->model('community_model');
        $this->load->model('Money_model');
    }

    function index() {
        redirect('home', 'refresh');
    }

    function tripdetails($id) {
         
        $data['seo_title'] = 'Trip Information';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        $data['error'] = "";
        $data['staus'] = "";
        $data['islogin'] = false;
        $data['user'] = '';
        $data['journeyDate'] = $this->session->userdata('journeyDate');        
        $data['description'] = '';
        $this->session->unset_userdata('journeyDate');
      
        $data['tripdetails'] = $this->trip_model->get_tripdetail($id);
        $data['comport_levels']= $this->trip_model->getcomport_list();        
        $data['advertisement_image'] = $this->trip_model->getad_image();
        $data['feedback'] = $this->trip_model->feedbackdetails($id);
        




        if (!empty($data['tripdetails'])) {
            if (!empty($this->user['user_id'])) {
                $data['islogin'] = true;
                $data['user'] = $this->user;
                $data['status'] = $this->check_enquiry($this->user['user_id'], $data['tripdetails']['trip_id'], $data['journeyDate']);
                $data['paymentStatus'] = $this->check_payment_enquiry($this->user['user_id'], $data['tripdetails']['trip_id'], $data['journeyDate']);
            }

            $data['description'] = $data['tripdetails']['source_leg'] . ' To ' . $data['tripdetails']['destination_leg'];
            $map = $this->trip_model->getmap_details($data['tripdetails']['trip_id']);
            $this->load->library('googlemaps');
            $config['center'] = $map['origin'];
            $config['apiKey'] = $this->config->item('google_api_key');
            $config['zoom'] = 'auto';
            $config['directions'] = TRUE;
            $config['directionsStart'] = $map['origin'];
            $config['directionsEnd'] = $map['destination'];
            $config['directionsWaypointArray'] = $map['route'];
            $config['map_height'] = '230px';
            $config['draggable'] = FALSE;
            $config['scrollwheel'] = FALSE;
            
            $this->googlemaps->initialize($config);

            $data['map'] = $this->googlemaps->create_map();
            

            $this->load->view('trip_detail', $data);
        } else {
            show_error('Not found trip details');
        }
    }

    function check_enquiry($user_id, $trip_id, $trip_date = '') {
        if ($trip_date != '') {
            $journey_date = date('Y-m-d', strtotime(str_replace('/', '-', $trip_date)));
        } else {
            $journey_date = date('Y-m-d', now());
        }

        $this->db->select('*');
        $this->db->where(array('enquiry_passanger_id' => $user_id, 'enquiry_trip_id' => $trip_id, 'enquiry_trip_date' => $journey_date, 'payment_flg' => '0'));
        $this->db->from('tbl_enquires');
        $result = $this->db->get();
        if ($result->num_rows > 0) {
            return 0;
        } else {
            return 1;
        }
    }

    function check_payment_enquiry($user_id, $trip_id, $trip_date = '') {
        if ($trip_date != '') {
            $journey_date = date('Y-m-d', strtotime(str_replace('/', '-', $trip_date)));
        } else {
            $journey_date = date('Y-m-d', now());
        }

        $this->db->select('*');
        $this->db->where(array('enquiry_passanger_id' => $user_id, 'enquiry_trip_id' => $trip_id, 'enquiry_trip_date' => $journey_date, 'payment_flg' => '1'));
        $this->db->from('tbl_enquires');
        $result = $this->db->get();
        if ($result->num_rows > 0) {
            return 0;
        } else {
            return 1;
        }
    }

    function readyBooking($ajax = true) {
        if ($ajax) {
            $post = $this->input->post(null, false);            
            if ($post) {
                $this->session->set_userdata('tripLegId', $post['tripId']);
                $this->session->set_userdata('tripDate', $post['tripDate']);
                die(json_encode(array('result' => true)));
            }
            show_404();
        } else {
            show_404();
        }
    }

    function book() {
        $tripLegId = $this->session->userdata('tripLegId');
        $tripDate = $this->session->userdata('tripDate');
        if ($tripLegId != '' && $tripDate != '') {
            $this->session->unset_userdata('tripDate');
            $data['seo_title'] = 'Booking Information';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
            $data['tripdetails'] = $this->trip_model->get_tripdetail($tripLegId);
            if (!empty($data['tripdetails'])) {
                if (!empty($this->user['user_id'])) {
                    $data['journeyDate'] = $tripDate;

                    $this->load->view('book_detail', $data);
                } else {
                    redirect('trip/tripdetails/' . $tripLegId);
                }
            } else {
                redirect('trip/tripdetails/' . $tripLegId);
            }
        } else if ($tripLegId != '') {
            redirect('trip/tripdetails/' . $tripLegId);
        } else {
            show_404();
        }
    }

    function ask_question($trip_led_id = false) {
        
        $data['id'] = '';
        $data['name'] = '';
        $data['email'] = '';
        $data['trip_led_id'] = $trip_led_id;
        $data['questions'] = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('questions', 'questions', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {

            if (validation_errors() != '') {
                echo validation_errors();
            } else {
                $this->load->view('ask_question', $data);
            }
        } else {

            $save['name'] = $this->input->post('name');
            $save['email'] = $this->input->post('email');
            $save['questions'] = $this->input->post('questions');
            $save['trip_led_id'] = $this->input->post('trip_led_id');
            
            $contact = $this->trip_model->ask_questions($save);            
            $get_owner_details = $this->trip_model->get_tripdetails($contact);         
            $edata['passanger_name'] = $get_owner_details['name'];
            $edata['passanger_email'] = $get_owner_details['email'];
            $edata['passanger_questions'] = $get_owner_details['questions'];
            $edata['trip_owner_name'] = $get_owner_details['user_first_name'] . '' . $get_owner_details['user_last_name'];
            $edata['trip_owner_email'] = $get_owner_details['user_email'];
            $edata['soruce'] = $get_owner_details['source'];
            $edata['destination'] = $get_owner_details['destination'];
            $edata['created_time'] = $get_owner_details['created_time'];


            $res = $this->db->where('tplid', '8')->get('tbl_email_template');
            $row = $res->row_array();

            // set replacement values for subject & body
            // {customer_name}

            $row['tplsubject'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplsubject']);

            $row['tplsubject'] = str_replace('{SOURCE}', $edata['soruce'], $row['tplsubject']);

            $row['tplsubject'] = str_replace('{DESTINATION}', $edata['destination'], $row['tplsubject']);

            $row['tplsubject'] = str_replace('{DATE}', $edata['created_time'], $row['tplsubject']);

            $row['tplmessage'] = str_replace('{NAME}', $edata['trip_owner_name'], $row['tplmessage']);

            $row['tplmessage'] = str_replace('{PNAME}', $edata['passanger_name'], $row['tplmessage']);

            $row['tplmessage'] = str_replace('{PEMAIL}', $edata['passanger_email'], $row['tplmessage']);

            $row['tplmessage'] = str_replace('{PQUESTIONS}', $edata['passanger_questions'], $row['tplmessage']);

            $row['tplmessage'] = str_replace('{COMPANY_NAME}', $this->config->item('company_name'), $row['tplmessage']);

            $param['message'] = $row['tplmessage'];

            $email_subject = $this->load->view('template', $param, TRUE);
            
            $this->load->library('email');

            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->from($this->config->item('email'), $this->config->item('company_name'));
            $this->email->to($edata['trip_owner_email']);
            $this->email->bcc($this->config->item('email'));
            $this->email->subject($row['tplsubject']);
            $this->email->message(html_entity_decode($email_subject));

            $this->email->send();   

            $this->session->set_flashdata('message', 'Feed back has been posted');
           
            echo 1;
        }
    }

    function login_popup() {

        //we check if they are logged in, generally this would be done in the constructor, but we want to allow customers to log out still
        //or still be able to either retrieve their password or anything else this controller may be extended to do
        $redirect = $this->auth_travel->is_logged_in(false, false);
        //if they are logged in, we send them back to the dashboard by default, if they are not logging in
        if ($redirect) {
            redirect('profile#personal-info');
        }

        $data['seo_title'] = '';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        $data['txtUserName'] = '';
        $data['txtPassword'] = '';
        $this->load->helper('form');
        $data['redirect'] = $this->session->flashdata('redirect');
        $submitted = $this->input->post('submitted');
        if ($submitted) {
            $email = $this->input->post('txtUserName');
            $password = $this->input->post('txtPassword');
            $remember = $this->input->post('remember');
            $redirect = $this->input->post('redirect');
            $login = $this->auth_travel->login_travel($email, $password, $remember);
            if ($login) {
                if ($redirect == '') {
                    $redirect = 'profile#personal-info';
                }
                redirect($redirect);
            } else {
                //this adds the redirect back to flash data if they provide an incorrect credentials
                $this->session->set_flashdata('redirect', $redirect);
                $this->session->set_flashdata('error', lang('error_authentication_failed'));
                redirect('login');
            }
        }
        $this->load->view('login_popup', $data);
    }
    
    function passanger_questions(){
        $data['seo_title'] = 'Passanger Questions';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        $data['passanger_ques'] = $this->trip_model->passanger_ques($this->user['user_id']); 
        
        $this->load->view('passanger_questions',$data);        
        
    }
    
    function public_profile($user_id= 0){
     
        $this->load->helper('form');
        
        $data['seo_title'] = 'Public profile';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';       
        $data['public_profile'] = $this->trip_model->get_overall_info($user_id);
        $data['user_comments'] = $this->trip_model->get_userscomments($user_id);  
        //echo '<pre>'; print_r($data['user_comments']); die;
        if(!empty($data['user_comments'])){       
        $comduser_id = $data['user_comments']['enquiry_passanger_id'];   
        //print_r($comduser_id); die;
        $data['comment_user'] = $this->trip_model->get_comduser_image($comduser_id);
        //echo '<pre>'; print_r($data['comment_user']); die;
        }
        //echo '<pre>';print_r($data); die;
        $this->load->view('public_profile',$data);
    }


}

?>