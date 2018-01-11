<?php

class Rewards extends Front_Controller {

    var $travel;
    var $id;

    function __construct() {
        parent::__construct();

        $this->CI = & get_instance();
        $this->user = $this->CI->carpool_session->userdata('carpool');

        $this->load->library('pagination');
        $this->load->helper('text');
        $this->load->model('Home_model');
        $this->load->model('community_model');
        $this->load->model('Money_model');

        if (!$this->auth_travel->is_logged_in(false, false)){
            redirect('login');}
    }

    function index() {
        $this->load->helper('form');
        $data['seo_title'] = 'Rewards';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';

        $this->load->view('rewards', $data);
    }

    function purchase($item) {
        $this->load->helper('form');
        $data['seo_title'] = 'Purchase Reward';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';
        $data['purchase'] = $item;

        if ($_GET && $this->input->get('redeem', true)) {
                        /*  Geka accept money  */
               $rrwprice = $this->Money_model->show_rewards("",$item);
            if ($rrwprice && $this->Money_model->change_usermoney($this->user['user_id'],-$rrwprice[0]['reward_price'])>=0) {
            
                $this->Money_model->save_reward($this->user['user_id'],$item);
                redirect('rewards');

            }
            
        }


        $this->load->view('rewards', $data);
    }

    function show($item) {
        $this->load->helper('form');
        $data['seo_title'] = 'Purchase Reward';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';
        $data['rwrdshow'] = $item;
        $this->load->view('rewards', $data);
    }


    function myrewards() {
        $this->load->helper('form');
        $data['seo_title'] = 'My Rewards';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';

        $data['myrewards'] = '1';
        $this->load->view('rewards', $data);
    }

 
}

?>
