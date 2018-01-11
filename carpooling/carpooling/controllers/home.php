<?php

class Home extends Front_Controller 
{

    function __construct() 
	{
        parent::__construct();
        $this->load->model('Home_model');
     
    }

    function index() 
	{
        
        $data['seo_title'] = 'Sparrow | Connecting communities together';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';
        
        $this->load->helper('form');
        $this->load->helper('text');
        $data['testimonials'] = $this->Home_model->get_testimonials($limit = 3);
        $data = $this->Home_model->get_recently_trip_list($limit = 10, $data);
        $data['advertisement_image'] = $this->Home_model->getad_image();
        $data['top_rating'] = $this->Home_model->top_ratinguser();
       

        $this->load->view('home', $data);
    }
    
    function feedbacks($last_segment)
    {
        $data['seo_title'] = 'User Feedbacks';
        $data['seo_description'] = '';
        $data['seo_keyword'] = '';  
        $data['feedbacks'] = $this->Home_model->get_feedbacks($last_segment);
        $get_user_id = $data['feedbacks']; 
        
        if(empty($get_user_id)){
           $this->load->view('nofeedbacks',$data);
        }       
          $data['feedback_user'] = $this->Home_model->get_feedbackuser($last_segment); 
          $data['last_segment'] = $last_segment;
          
          if($get_user_id !=''){
           $this->load->view('nofeedbacks',$data);
        }
          
    }
    
    function changeLanguage() {
        
        $key = $this->input->post('key');        
        $this->load->library('session');
        $this->session->unset_userdata('lanCode');
        if($this->aleray_add_lang != ""){
            
            $this->session->set_flashdata('message', lang('change_language_option'));
        }
        $this->session->set_userdata(array(
            'lanCode' => $key
        ));
        
        $lanCode = $this->session->userdata('lanCode');
        if($lanCode){
            
            die(json_encode(array('result'=>true)));            
        }else{
           
            die(json_encode(array('result'=>false)));  
        }
    }
}

?>
