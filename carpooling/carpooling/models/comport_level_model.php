<?php

Class Comport_level_model extends CI_Model {

    //this is the expiration for a non-remember session
    var $session_expire = 7200;

    function __construct() {
        parent::__construct();
    }

    /*     * ******************************************************************

     * ****************************************************************** */

    function get_comport_levels($limit = 0, $offset = 0, $order_by = 'tbl_comport.comport_id', $direction = 'DESC') {

        $this->db->order_by($order_by, $direction);
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }        
        $result = $this->db->get('tbl_comport');
        return $result->result();
    }

    function getcity_list() {
        $this->db->order_by('vechicle_type_id', 'ASC');
        $this->db->select('tbl_vechicle_types.*,tbl_category.category_name');
        $this->db->join('tbl_category', 'tbl_category.category_id = tbl_vechicle_types.category_id');
        $data = $this->db->get('tbl_vechicle_types');
        return $data->result();
    }

    function getcomport($typeid) {

        $result = $this->db->get_where('tbl_comport', array('comport_id' => $typeid));
        return $result->row();
    }

    function count_comport() {        
        return $this->db->count_all_results('tbl_comport');
    }

    function check_comportlevel($id) {
        return $this->db->where('comport_id', $id)->get('tbl_comport')->result();
    }

    function check_vehicle($str, $id = false) {

        $this->db->select('vechicle_type_name');
        $this->db->from('tbl_vechicle_types');
        $this->db->where('vechicle_type_name', $str);
        if ($id) {
            $this->db->where('vechicle_type_id !=', $id);
        }
        $count = $this->db->count_all_results();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    function save($comport) {

        if ($comport['comport_id']) { 
            $this->db->where('comport_id', $comport['comport_id']);
            $this->db->update('tbl_comport', $comport);
            return $comport['comport_id'];
        } else {             
            $this->db->insert('tbl_comport', $comport);
            return $this->db->insert_id();
        }
    }

    function delete($comport_id) {
        $this->db->where('comport_id', $comport_id);
        $this->db->delete('tbl_comport');
    }
    
    function delete_image($img_name) {
        $image = $this->get_image_by_name($img_name);
        if ($image) {

            $image['comport_logo'] = '';
            $this->save($image);
            return true;
        }
    }

    function get_image_by_name($img_name) {

        $this->db->where('comport_logo', $img_name);
        $result = $this->db->get('tbl_comport');
        $result = $result->row_array();
        return $result;
    }
}
