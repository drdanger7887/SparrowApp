<?php

Class Advertisement_model extends CI_Model {

    //this is the expiration for a non-remember session
    var $session_expire = 7200;

    function __construct() {
        parent::__construct();
    }

    /*     * ******************************************************************

     * ****************************************************************** */

    function all_advertisement($limit = 0, $offset = 0, $order_by = 'ad_title', $direction = 'ASC') {
        $this->db->order_by($order_by, $direction);
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }

        $result = $this->db->get('tbl_advertisement');

        return $result->result_array();
    }

    function count_advertisement() {
        return $this->db->count_all_results('tbl_advertisement');
    }

    function get_testimonial($ad_id) {

        $result = $this->db->get_where('tbl_advertisement', array('ad_id' => $ad_id));
        return $result->row();
    }

    function save($save) {
        if ($save['ad_id']) {
            $this->db->where('ad_id', $save['ad_id']);
            $this->db->update('tbl_advertisement', $save);
            return $save['ad_id'];
        } else {
            $this->db->insert('tbl_advertisement', $save);
            return $this->db->insert_id();
        }
    }

    function delete($ad_id) {
        /*
          deleting a provider will remove all their orders from the system
          this will alter any report numbers that reflect total sales
          deleting a provider is not recommended, deactivation is preferred
         */

        //this deletes the providers record
        $this->db->where('ad_id', $ad_id);
        $this->db->delete('tbl_advertisement');
    }

    function delete_image($img_name) {
        $image = $this->get_image_by_name($img_name);
        if ($image) {

            $image['image'] = '';
            $this->save($image);
            return true;
        }
    }

    function get_image_by_name($img_name) {

        $this->db->where('image', $img_name);
        $result = $this->db->get('tbl_advertisement');
        $result = $result->row_array();
        return $result;
    }

    function advertisement_url() {
        $result = $this->db->get('tbl_default_url');
        return $result->result_array();
    }

}
