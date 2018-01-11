<?php

class Refresh extends Front_Controller 
{

    function __construct() 
	{
        parent::__construct();
        $this->CI = & get_instance();
        //$this->load->model('Trip_model');

     
    }

    function index() {

        echo '<!DOCTYPE html>
              <html>
                  <head>
                    <meta charset="utf-8">
                    <title>SparrowApp</title>
                    
                    </head>
                    <body>';
                    
        echo date("Y-m-d H:i",time()).", unix time: ".time().'<br>';


/*  Delete old trips (and legs) without enquires  
        $this->db->join('tbl_enquires', 'tbl_enquires.enquiry_trip_id <> tbl_trips.trip_id');
        $this->db->where('tbl_trips.trip_unix_time < '.time());
        $query = $this->db->get('tbl_trips');
        if ($query->num_rows > 0) {
          $query = $query->result_array();
          if ($query) {
            foreach ($query as $key => $row) {
              $this->db->where('trip_id', $row['trip_id']);
              $this->db->delete('tbl_t_trip_legs');
              $this->db->where('trip_id', $row['trip_id']);
              $this->db->delete('tbl_trips');
            }
          }
        }     
        */ 
        
  /**/ 

/*  Check completed enquires confirmation. Send notification  */       
        $query_val =  "(tbl_enquires.payment_flg = '0' AND tbl_enquires.enquiry_trip_unix_time < ".(time()-3600)." AND (tbl_enquires.enquiry_cron_checked IS NULL OR tbl_enquires.enquiry_cron_checked='0'))";


        $this->db->where($query_val); 
        $query = $this->db->get('tbl_enquires');
        if ($query->num_rows > 0) {
          $result = $query->result_array();

         // var_dump($result);
          for($i=0;$i<sizeof($result);$i++) {

              $this->db->where('tbl_users.user_id',$result[$i]['enquiry_passanger_id']);
              $query_user = $this->db->get('tbl_users');      
              $result_user = $query_user->result_array();

              if ($_SERVER['SERVER_NAME']!="localhost") {
                $this->sendmail_enquires($result[$i],$result_user[0]);
              }
          }

       
          $this->db->where($query_val);   
          $params['enquiry_cron_checked'] = 1;
          $this->db->update('tbl_enquires', $params);
        }
  /**/ 







echo '</body>
</html>';


    }


    function sendmail_enquires($result,$result_user) {

        //file_put_contents('test.txt', time());

        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);
        $this->email->from($this->config->item('email'), $this->config->item('company_name'));
        $this->email->to('oohfiro@gmail.com,'.$result_user['user_email']);
        //$this->email->bcc($this->sparrowmail);
        $this->email->subject('Did your ride happen? - trip#'.$result['enquiry_trip_id']);
        $emailtxt = "
            <p>Hello <strong>".$result_user['user_first_name']." ".$result_user['user_last_name']."</strong></p>
            <p>According to our records you have not confirmed that your journey on ".$result['enquiry_trip_date']." happened.</p>
            <p>Please follow this link ".base_url('community/trip')."/".$result['enquiry_trip_id']."#confirm and press \"Confirm\" if all went well. </p>
            <p>If you have any queries, comments or complaints please contact us by writing to info@sparrowapp.co Sparrow Team.</p>
            <br><p>This is an automated email, please don't reply.</p>"
            ;
        $this->email->message(html_entity_decode($emailtxt));

        $this->email->send();
/*
            @$logdata['user']=$result_user['user_id'];
            @$logdata['action']='mail to confirm enquiry #'.$result['enquiry_trip_id'];
            @logAll($logdata);
*/
    }    
    
 
}

/*


$result
      'enquiry_id' => string '83' (length=2)
      'enquiry_passanger_id' => string '1' (length=1)
      'enquiry_trip_id' => string '106' (length=3)
      'enquire_travel_id' => string '2' (length=1)
      'enquiry_trip_date' => string '2017-12-23' (length=10)
      'enquiry_trip_status' => string '1' (length=1)
      'enquiry_date_time' => string '2017-12-22 19:01:24' (length=19)
      'payment_flg' => string '0' (length=1)
      'enquiry_trip_unix_time' => string '1513991700' (length=10)
      'enquiry_cron_checked' => null


$result_user
      'user_id' => string '1' (length=1)
      'user_email' => string 'demo1@gmail.com' (length=15)
      'user_password' => string '00b851a3aedf17351a5471b9392c5249d77d044c' (length=40)
      'user_type' => string '0' (length=1)
      'user_company_name' => null
      'user_first_name' => string 'demo1' (length=5)
      'user_last_name' => string 'user' (length=4)
      'user_about_us' => string 'good' (length=4)
      'user_profile_img' => string 'user1_profile_1479986763.png' (length=28)
      'user_mobile' => string '9843323380' (length=10)
      'user_secondary_phone' => null
      'user_secondary_mail' => string '' (length=0)
      'user_company_id' => null
      'user_url' => string '' (length=0)
      'user_street' => null
      'user_city' => null
      'postal_code' => null
      'user_occupation' => null
      'marital_status' => null
      'isverified' => string '0c13b1d8707279dd425f4bfbb27a1d4d15a71ee7' (length=40)
      'comport_level' => string '1,3,4,5,7,8,9,10' (length=16)
      'language' => string '' (length=0)
      'licence_number' => string 'TR8768987TY56' (length=13)
      'show_number' => string '1' (length=1)
      'send_sms' => string '1' (length=1)
      'allowed_food' => string '0' (length=1)
      'allowed_pet' => string '0' (length=1)
      'allowed_smoke' => string '0' (length=1)
      'allowed_chat' => string '1' (length=1)
      'allowed_music' => string '1' (length=1)
      'allowed_luggage' => string '1' (length=1)
      'user_gender' => string '0' (length=1)
      'user_country' => null
      'user_dob' => string '1992-08-16' (length=10)
      'communication_mobile' => string '0' (length=1)
      'communication_email' => string '0' (length=1)
      'login_type' => string '0' (length=1)
      'isactive' => string '1' (length=1)
      'user_admin_status' => string '1' (length=1)
      'user_created_date' => string '2015-07-28 04:14:10' (length=19)
      'user_lost_login' => string '2017-12-23 16:56:22' (length=19)
      'user_notfirst' => string '1' (length=1)


*/



?>
