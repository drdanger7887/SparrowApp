<?php

class Payments extends Front_Controller {

    var $travel;
    var $id;

    function __construct() {
        require_once('Stripe/init.php');
        parent::__construct();
        if (!$this->auth_travel->is_logged_in(false, false)){
            redirect('login');}
        $this->load->model('Money_model');
    }

    function index() {
        //var_dump($_POST);
        $ppost = $this->input->post(); 
        $data['ppostget']=$ppost;
        $data['seo_title'] = 'Payments';
        $data['seo_keyword'] = '';
        $data['seo_description'] = '';
        $term = false;
        $data['error'] = '';
        $data['alert'] = 0;
        $data['email'] = '';
        
        $data['bodyclass'] = "payments";


        //$this->session->set_userdata('charge_payments', 'none');
        //$data['bodyclass'] = $this->session->userdata('charge_payments');
        //$this->session->unset_userdata('charge_payments');
        if (isset($_POST['stripeToken']) && isset($_POST['pamount'])) {
            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_IKCe2LywUQRnG3KEZmP7wpYM");

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];

            $oldcount = $_POST['oldcount'];
            $fullname = $_POST['fullname'];
            $puserid = $_POST['puserid'];

            $pamountfinal = $_POST['pamount']*100;

            // Charge the user's card:
            $charge = \Stripe\Charge::create(array(
              "amount" => $pamountfinal,
              "currency" => "gbp",
              "description" => "Charge on SparrowwApp",
              "source" => $token,
              "metadata" => array("user_id" => $puserid),
            ));
            if ($charge['paid']) {
                $this->Money_model->save_payments($charge['id'],$puserid,($charge['amount']/100));
                $this->session->set_userdata('charge_payments', 'success');
                redirect('payments');
            }

        }



        $this->load->view('payments', $data);
    }




 }

?>
