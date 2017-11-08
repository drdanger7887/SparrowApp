<?php

class Community_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }



        public function get_community ($comm_id)
        {

            $this->db->where('comm_id', $comm_id);
            $query = $this->db->get('tbl_community');
            return $query->result();
        }

        public function get_community_byslug ($comm_slug)
        {
            $this->db->where('comm_slug', $comm_slug);
            $query = $this->db->get('tbl_community');
            return $query->result();
        }        

        public function get_communitylist ()
        {
            $query = $this->db->get('tbl_community');
            return $query->result();
        }




}

?>