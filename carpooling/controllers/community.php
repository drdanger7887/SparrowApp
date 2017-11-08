<?php

class Community extends Front_Controller {

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
        $this->load->model('community_model');
        $this->load->model('Money_model');

        if (!$this->auth_travel->is_logged_in(false, false)){
            redirect('login');}
    }

    function index() {
        $this->load->helper('form');
        $data['seo_title'] = 'Community Information';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';
        $this->load->view('community', $data);
    }

    function site($item='') {
        if ($item=='') {
           redirect('community'); 
        }
        $comm = $this->community_model->get_community_byslug($item);
        if ($comm) {
        //var_dump($comm[0]->comm_id);
        $data['communityid'] = $comm[0]->comm_id;
        $this->load->helper('form');
        $data['seo_title'] = 'The Community';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';
        $this->load->view('community', $data);
        } else {
           redirect('community');  
        }
    }




}

?>
