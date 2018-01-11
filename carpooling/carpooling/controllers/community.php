<?php

class Community extends Front_Controller {

    var $travel;
    var $id;
    

    function __construct() {
        parent::__construct();
        $this->load->model('vechicle_model');
        $this->load->model('category_model');
        $this->load->model('trip_model');
        $this->load->model('community_model');
        $this->load->model('Money_model');

        if (!$this->auth_travel->is_logged_in(false, false)){

$absolute_url = $this->full_url( $_SERVER );
//echo $absolute_url;

            $this->session->set_flashdata('redirect', $absolute_url);
            redirect('login');
            //die();
        }
    }


    function url_origin( $s, $use_forwarded_host = false )
    {
        $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
        $sp       = strtolower( $s['SERVER_PROTOCOL'] );
        $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
        $port     = $s['SERVER_PORT'];
        $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
        $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
        $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
        return $protocol . '://' . $host;
    }

    function full_url( $s, $use_forwarded_host = false )
    {
        return $this->url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
    }




    function index() {
        
//        $this->load->helper('form');
        if ($this->input->get('commid', true)) {   ///  Geka
            $communityslug = $this->community_model->get_community($this->input->get('commid'));
            if (!$communityslug) {

                redirect('community');
            } else {
                redirect('community/site/'.$communityslug[0]->comm_slug);
            }
        }


        $data['seo_title'] = 'SELECT COMMUNITY';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';
        

        $data['bodyclass'] = "bodycomm";

        $nf = $this->input->get('nf'); 

        if ($nf) {
            $notfirst['user_notfirst'] = true;
            $this->db->update('tbl_users', $notfirst);
            $this->CI = & get_instance();
            $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');
            $uid = $carpool_session['carpool_session']['user_id'];

            redirect('community');


        }

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
            $data['seo_title'] = 'COMMUNITY';
            $data['seo_keyword'] = '';
            $data['seo_description'] = '';
            $term = false;
            $data['error'] = '';
            $data['alert'] = 0;
            $data['email'] = '';

            $data['menuactive'] = 1;
            $data['bodyclass'] = "bodycomm comm-".$item;

            $this->load->view('community', $data);
        } else {
            redirect('community');  
        }
    }


    function trip($trip_id='') {

            if ($trip_id=='') {
               redirect('community'); 
            } else {
            $leg_details = $this->trip_model->get_leg_details($trip_id);
                if($leg_details){
                   redirect('trip/tripdetails/'.$leg_details[0]['trip_led_id']); 
                } else {
                   redirect('community'); 
                }
            }
    }


}

?>
