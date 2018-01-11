<?php

/**
 * The base controller which is used by the Front and the Admin controllers
 */
class Base_Controller extends CI_Controller {

    var $Facebook_link;
    var $Twitter_link;
    var $Google_link;
    var $Linkedin_link;
    var $language_name;
    var $aleray_add_lang;
    var $user_language = array();

    public function __construct() {

        parent::__construct();
        $language = $this->config->item('site_language');
        $language_prfix = $this->config->item('site_language_prefix');  
        $this->load->model(array('Language_model', 'Customer_model'));       
        $this->user_session_lang = $this->session->userdata('lanCode');
        $this->set_lang = $this->user_session_lang;
        $carpool_session['carpool_session'] = $this->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];   
        
        if($this->user_id != ''){
        $this->userdefine_lang = $this->Customer_model->get_customer($this->user_id);          
        $this->aleray_add_lang = $this->userdefine_lang->language; 
        }        
        if($this->aleray_add_lang != ''){           
        if ($this->user_session_lang == "" & $this->user_id != '') {
            
            $lang_exp = (explode(',', $this->aleray_add_lang));
            $language_prfix = $lang_exp['0'];
            $language = $lang_exp['1'];
            $lang = $this->lang->load($language_prfix, $language);
        }
        }
        
        if ($this->user_session_lang != "") {           
            $lang_exp = (explode(',', $this->user_session_lang));
            $language_prfix = $lang_exp['0'];
            $language = $lang_exp['1'];
            $this->language_name = $language;
            $lang = $this->lang->load($language_prfix, $language);
        } elseif ($language != '' && $language_prfix != '') {

            $lang = $this->lang->load($language_prfix, $language);
        } else {
            
            $this->lang->load('en');
        }

        $user_lang = (explode(',', $this->config->item('user_language')));        
        $this->user_language = $this->Language_model->get_userlang($user_lang);
        
    }

//end __construct()
}

//end Base_Controller

class Front_Controller extends Base_Controller {

    function __construct() {

        parent::__construct();

        $this->load->library('Carpooling');

        //load the theme package
        $this->load->add_package_path(APPPATH . 'themes/' . $this->config->item('theme') . '/');
        $this->load->model(array('logo_model', 'social_model'));
        $this->logo = $this->logo_model->get_logo(1);
        $this->facebook_link = $this->social_model->get_social_link('Facebook');
        $this->twitter_link = $this->social_model->get_social_link('Twitter');
        $this->google_link = $this->social_model->get_social_link('Google+');
        $this->linkedin_link = $this->social_model->get_social_link('Linkedin');
    }

}

class Admin_Controller extends Base_Controller {

    var $trips = array();

    function __construct() {

        parent::__construct();

        $this->load->library('auth');
        $this->load->helper('form');
        $this->auth->is_logged_in(uri_string());

        //load the base language file
        $this->lang->load('admin_common');
        $this->load->model(array('trip_model', 'logo_model'));
        $this->trips = $this->trip_model->get_recent_trip(6);
        $this->logo = $this->logo_model->get_logo(1);
    }

}

class Traveller_Controller extends Base_Controller {

    var $Facebook_link;
    var $Twitter_link;
    var $Google_link;
    var $Linkedin_link;

    function __construct() {

        parent::__construct();

        $this->load->library('auth_travel');
        $this->load->library('Carpooling');
        $this->load->model(array('Customer_model'));
        $this->load->add_package_path(APPPATH . 'themes/' . $this->config->item('theme') . '/');
        $this->auth_travel->is_logged_in(uri_string());

        //load the base language file
        $this->lang->load('provider_common');
        $this->load->model(array('logo_model', 'social_model'));
        $this->logo = $this->logo_model->get_logo(1);
        $this->facebook_link = $this->social_model->get_social_link('Facebook');
        $this->twitter_link = $this->social_model->get_social_link('Twitter');
        $this->google_link = $this->social_model->get_social_link('Google+');
        $this->linkedin_link = $this->social_model->get_social_link('Linkedin');

        $this->load->model(array('Language_model', 'Customer_model'));
        $this->load->model('Language_model');
        $this->user_session_lang = $this->session->userdata('lanCode');
        $language = $this->config->item('site_language');
        $language_prfix = $this->config->item('site_language_prefix');
        $carpool_session['carpool_session'] = $this->carpool_session->userdata('carpool');
        $this->user_id = $carpool_session['carpool_session']['user_id'];  
        
        if($this->user_id != ''){
        $this->userdefine_lang = $this->Customer_model->get_customer($this->user_id);
        $this->aleray_add_lang = $this->userdefine_lang->language;        
        }
        
        if($this->aleray_add_lang != ''){
        if ($this->user_session_lang == "" & $this->user_id != '') {
            
            $lang_exp = (explode(',', $this->aleray_add_lang));
            $language_prfix = $lang_exp['0'];
            $language = $lang_exp['1'];
            $lang = $this->lang->load($language_prfix, $language);
        }
        }
        
        if ($this->user_session_lang != "") {
            $lang_exp = (explode(',', $this->user_session_lang));
            $language_prfix = $lang_exp['0'];
            $language = $lang_exp['1'];
            $this->language_name = $language;
            $lang = $this->lang->load($language_prfix, $language);
        } elseif ($language != '' && $language_prfix != '') {

            $lang = $this->lang->load($language_prfix, $language);
        } else {
            $this->lang->load('en');
        }
    }

}
