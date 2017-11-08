<?php

class join_community extends Front_Controller {

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

        $data['seo_title'] = 'Trip Information';
        $data = $this->Home_model->get_recently_trip_list($limit = 10, $data);  /// Geka
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';

        $data['param'] = '';
        $data['vechicletype'] = $this->vechicle_model->getvechicletype_list();
        $data['vechiclecategory'] = $this->category_model->getcategory_list();
        $data['advertisement_search_image'] = $this->home_model->getsearchad_image();
       

        if ($_GET) {
            $param = array('SOURCE' => $this->input->get('source', true), 'DESTINATION' => $this->input->get('destination', true), 'fromlatlng' => $this->input->get('formlatlng', true), 'tolatlng' => $this->input->get('tolatlng', true), 'frequency' => date('w', strtotime(str_replace("/", "-", $this->input->get('journey_date', true)))), 'date' => $this->input->get('journey_date', true), 'vechiclecategory' => $this->input->get('VECHICATEGORY_FILTER', true), 'vechicletype' => $this->input->get('VECHITYPE_FILTER', true), 'amenities' => $this->input->get('AMENITIES_FILTER', true), 'traveltype' => $this->input->get('TRAVELTYPE_FILTER', true), 'allowtype' => $this->input->get('TRAVELALLOW_FILTER', true), 'frquencytype' => $this->input->post('FREQUENCY_FILTER', true), 'return' => $this->input->get('Return_Type', true), 'gender' => $this->input->get('GenderFilter', true),'comfort'=>$this->input->post('ComfortFilter', true));
        } else {

            $param = array('SOURCE' => $this->input->get('source', true), 'DESTINATION' => $this->input->get('destination', true), 'fromlatlng' => $this->input->get('formlatlng', true), 'tolatlng' => $this->input->get('tolatlng', true), 'frequency' => date('w', strtotime(str_replace("/", "-", $this->input->get('journey_date', true)))), 'date' => $this->input->get('journey_date', true), 'vechiclecategory' => $this->input->get('VECHICATEGORY_FILTER', true), 'vechicletype' => $this->input->get('VECHITYPE_FILTER', true), 'amenities' => $this->input->get('AMENITIES_FILTER', true), 'traveltype' => $this->input->get('TRAVELTYPE_FILTER', true), 'frquencytype' => $this->input->get('FREQUENCY_FILTER', true), 'allowtype' => $this->input->get('TRAVELALLOW_FILTER', true), 'return' => $this->input->get('Return_Type', true), 'gender' => $this->input->get('GenderFilter', true),'comfort'=>$this->input->post('ComfortFilter', true));
        }

        if (!empty($param['fromlatlng']) && !empty($param['tolatlng']) && !empty($param['date'])) {
            
            $this->session->set_userdata('journeyDate', $param['date']);            
            $data['selparam'] = $param;
            $data = $this->search_model->getSearchResults($param, $offset = null, $data);
            $data = $this->search_model->SearchResults_count($param, $data);
            if ($data['count'] == 0) {
                $data['alert'] = 1;
            }
        } else {

            $data['selparam'] = $param;
            $data['count'] = '';
            $data['search_results'] = '';
            $data['error'] = 'Correct source,desination address and date required';
        }
        if (!empty($this->travel)) {
            $data['travel'] = $this->travel;
        }



        $this->load->view('join_community', $data);
    }




}

?>
