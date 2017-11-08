<?php

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getbanner() {
        $this->db->order_by('id', 'RANDOM');
        $this->db->where('count != 0');
        $this->db->where('isactive', 1);
        $this->db->limit(1);
        $query = $this->db->get('banners');
        
        $result = $query->result_array();
        if ($result) {
            $save['id'] = $result[0]['id'];
            $save['count'] = $result[0]['count'] - 1;
            $id = $this->save_banner($save);
            return $result;
        } else {
            return false;
        }
    }

    function save_banner($save) {
        if ($save['id']) {
            $this->db->where('id', $save['id']);
            $this->db->update('banners', $save);
            return $save['id'];
        } else {
            $this->db->insert('banners', $save);
            return $this->db->insert_id();
        }
    }

    function get_recently_trip_list($limit = 0, $data, $order_by = 'trip_id', $direction = 'DESC') {

        $temp = array();
        $result = $this->db->query("SELECT tbl_trips.trip_id, max(tbl_trips.`trip_id`) as MostRecentid,
			   substring_index(group_concat(tbl_users.user_id), ',', 1) as MostRecentUser
		FROM tbl_trips JOIN
			 tbl_users
			 ON tbl_users.user_id = tbl_trips.trip_user_id                         
		GROUP BY tbl_trips.trip_user_id		
		ORDER BY max(tbl_trips.`trip_id`) DESC LIMIT " . $limit);
        /* 	echo $this->db->last_query();
          die; */
        $result = $result->result_array();

        if ($result) {
            $i = 0;

            foreach ($result as $key => $row) {

                $rowSub = $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id')->join('tbl_t_trip_legs', 'tbl_t_trip_legs.trip_id = tbl_trips.trip_id')->where('tbl_trips.trip_id', $row['MostRecentid'])->group_by('tbl_t_trip_legs.trip_id')->get('tbl_trips')->row_array();

                if ($rowSub) {
                    $temp[] = $rowSub;
                }
            }
        }

        $data['recent_trips'] = $temp;
        
        return $data;
       
    }

    function get_testimonials($limit = 0, $order_by = 'id', $direction = 'RANDOM') {
        $this->db->order_by($order_by, $direction);
        if ($limit > 0) {
            $this->db->limit($limit);
        }
        $this->db->where('isactive', '1');
        $result = $this->db->get('tbl_testimonials');
        /* echo $this->db->last_query();
          die; */
        return $result->result_array();
    }

    function getad_image() {

        $this->db->select('image,advertisement_url,ad_nav_link');
        $this->db->where('advertisement_url', 'home');
        $result = $this->db->get('tbl_advertisement');
        $result = $result->row_array();
        return $result;
    }

    function getsearchad_image() {

        $this->db->select('image,advertisement_url,ad_nav_link');
        $this->db->where('advertisement_url', 'search');
        $result = $this->db->get('tbl_advertisement');
        $result = $result->row_array();
        return $result;
    }

    function top_ratinguser($limit = '5', $order_by = 'id', $direction = 'DESC') {

        $this->db->select('user_first_name,user_last_name,user_profile_img,user_id');
        $this->db->order_by($order_by, $direction);
        if ($limit > 0) {
            $this->db->limit($limit);
        }
        $this->db->where('rating', '5');
        $this->db->join('tbl_rating', 'tbl_rating.rating_receiver_id = tbl_users.user_id');
        $query = $this->db->get('tbl_users');
        $result = $query->result_array();
        
        return $result;
    }
    
    function get_feedbacks($feeduser_id, $order_by = 'id',$direction = 'DESC'){
       
        $this->db->select('feedback,enquiry_passanger_id');
        //$this->db->order_by($order_by,$direction);
        $this->db->join('tbl_feedback','tbl_feedback.trip_user_id = tbl_users.user_id');
        $this->db->join('tbl_rating','tbl_rating.rating_receiver_id = tbl_users.user_id');
        $this->db->where('user_id',$feeduser_id);
        $query = $this->db->get('tbl_users');
        $result = $query->result_array();
       
        return $result;
    }
    
    function get_feedbackuser($feedback_giver){
        
        $this->db->select('user_email,user_first_name,user_last_name,user_profile_img,trip_user_id');
        $this->db->join('tbl_feedback','tbl_feedback.enquiry_passanger_id = tbl_users.user_id'); 
        //$this->db->where('user_id',$feedback_giver);
        $query = $this->db->get('tbl_users');
        $result = $query->result_array();
        
        return $result;
    }
    
}

?>