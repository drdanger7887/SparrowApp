<?php

class Social_model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    /*     * ******************************************************************

     * ****************************************************************** */
	
	
    public function get_all_social_media()
    {

         $query = $this->db->get('tbl_socialmedia');

         return $query->result();

    }
    
    function save($data)
    {
            if($data['id'])
            {
                    $this->db->where('id', $data['id']);
                    $this->db->update('tbl_socialmedia', $data);
                    return $data['id'];
            }
            else
            {
                    $this->db->insert('tbl_socialmedia', $data);
                    return $this->db->insert_id();
            }
    }
	
    
    function get_social_link($social_link)
    {
        $this->db->where('social_media',$social_link);
        $query = $this->db->get('tbl_socialmedia');
        $result = $query->row();
        
        if($result){
            return $result->page_url;
        }else{
            return '';
        }
    }

}

?>
