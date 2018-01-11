<?php

class Rating extends Traveller_Controller {
    var $CI;
    function __construct() {
        parent::__construct();
        $this->CI = & get_instance();
        $this->load->model('rating_model');               
        $this->load->helper('url');        
    }

    function index() {
        $this->pending_rating();
    }
    
    function pending_rating() {

        $data = array();
        $this->load->helper('form');
        $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];
        $data['seo_title'] = 'Pending Rating';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        $data['user_id'] = $this->user_id;
        $data['pending_rating'] = $this->rating_model->get_pending_rating($this->user_id);
       
        $this->load->view('pending_rating', $data);
    }
    
    function given_rating() {

        $data = array();
        $this->load->helper('form');
        $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];
        $data['seo_title'] = 'Given Rating';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        $data['user_id'] = $this->user_id;
        $data['given_rating'] = $this->rating_model->get_given_rating($this->user_id);
        $this->load->view('given_rating', $data);
    }
    
    function received_rating() {

        $data = array();
        $this->load->helper('form');
        $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];
        $data['seo_title'] = 'Received Rating';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        $data['user_id'] = $this->user_id;
        $data['received_rating'] = $this->rating_model->get_received_rating($this->user_id);
        $this->load->view('received_rating', $data);
    }
    
    function add_rating(){
        $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];
        $receiver_id = $this->input->post('user_id');
        $rating = $this->input->post('rating');
        
        $save['id'] = false;
        $save['rating_giver_id'] = $this->user_id;
        $save['rating_receiver_id'] = $receiver_id;
        $save['rating'] = $rating;
        $this->rating_model->save_rating($save);
    }
}