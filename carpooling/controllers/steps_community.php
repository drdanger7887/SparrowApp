<?php

class Steps_community extends Front_Controller {

    var $travel;
    var $id;

    function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper('text');
        $this->load->model('search_model');
        $this->load->model('Home_model');
        $this->load->model('home_model');
        $this->load->model('vechicle_model');
        $this->load->model('category_model');
        $this->load->model('trip_model');

        if ($this->auth_travel->is_logged_in(false, false)):
            $this->CI = & get_instance();
            $this->carpool = $this->CI->carpool_session->userdata('carpool');
            $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
            $this->id = $carpool_session['carpool_session']['user_id'];

        else:
            $this->travel = '';
        endif;
    }

    function index() {
        $this->load->helper('form');

        $data['seo_title'] = 'Select Communities';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';


        $notfirst['user_notfirst'] = true;
        $this->db->update('tbl_users', $notfirst);

        $this->load->view('steps_community', $data);
    }




}

?>
