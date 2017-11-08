<?php
Class Rating_model extends CI_Model
{

	
	
	
	function __construct()
	{
            parent::__construct();
            $this->load->helper('date');
            date_default_timezone_set("Asia/Kolkata");
	}
	
	/********************************************************************

	********************************************************************/
	
        
        function get_pending_rating($userId){
            
            $this->db->join('tbl_users','tbl_users.user_id = tbl_enquires.enquire_travel_id');
            $this->db->group_by('tbl_enquires.enquire_travel_id');
            $this->db->where('`tbl_enquires`.`enquire_travel_id` NOT IN '
            . '(SELECT `rating_receiver_id` FROM `tbl_rating` WHERE `rating_giver_id` = "'.$userId.'")', NULL, FALSE);
            $this->db->where('tbl_enquires.enquiry_trip_status',1);
			$this->db->where('tbl_enquires.enquiry_passanger_id',$userId);
            $this->db->where('tbl_enquires.enquiry_trip_date < ',date('Y-m-d',now()));
            return $this->db->get('tbl_enquires')->result();            
            
        }
        
        function get_received_rating($userId){
            
            $this->db->join('tbl_users','tbl_users.user_id = tbl_rating.rating_giver_id');            
            $this->db->where('tbl_rating.rating_receiver_id',$userId);
            return $this->db->get('tbl_rating')->result();
            
        }
        
        function get_given_rating($userId){
            
            $this->db->join('tbl_users','tbl_users.user_id = tbl_rating.rating_receiver_id');            
            $this->db->where('tbl_rating.rating_giver_id',$userId);
            return $this->db->get('tbl_rating')->result();
            
        }
        
        function save_rating($save){
            
            $result  = $this->db->get_where('tbl_rating', array('rating_giver_id'=>$save['rating_giver_id'],'rating_receiver_id'=>$save['rating_receiver_id']));
            if($result->num_rows > 0)
            {
                $row = $result->row_array();
                $row['rating'] = $save['rating'];
                $this->db->where('id', $row['id'])->update('tbl_rating', $row);
                return $row['id'];

            }
            else
            {
                $this->db->insert('tbl_rating', $save);
                return $this->db->insert_id();
            }
            
        }
}