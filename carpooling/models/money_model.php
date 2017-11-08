<?php

Class Money_model extends CI_Model {

    //this is the expiration for a non-remember session
    //var $session_expire = 7200;


    var $money_for_journey = 3;
    var $money_for_reward = 3;

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('carpooling_mgt');
    }

    /*     * ******************************************************************

     * ****************************************************************** */

    function set_usermoney($email) {
            $this->db->where('tbl_users.user_email',$email);
            $query = $this->db->get('tbl_users');      
            $result = $query->result_array();
            $uid = ($result[0]['user_id']);
            
            $this->db->where('tbl_money.money_user',$uid);
            $query = $this->db->get('tbl_money');
            $result = $query->result_array();       
                if (!$result) {
                $tblmoney['money_user'] = $uid;
                $tblmoney['money_count'] = 50;  // Starting capital
                $this->db->insert('tbl_money', $tblmoney);
                return $this->db->insert_id();
                }
            
    }


    function change_usermoney($uid,$plus) {
            $this->db->where('tbl_money.money_user',$uid);
            $query = $this->db->get('tbl_money');
            $result = $query->result_array();            
            $total = $result[0]['money_count'] + $plus;
            if ($total<0) { return false;} else {
                $money_count['money_count'] = $total;
                $this->db->where('tbl_money.money_user',$uid);
                $this->db->update('tbl_money', $money_count);    
                return $total;
            }
    }

    function show_rewards() {

            $query = $this->db->get('tbl_rewards');
            $result = $query->result_array(); 
            return $result;
    }

    function show_onereward($rid) {
            $this->db->where('tbl_rewards.reward_id',$rid);
            $query = $this->db->get('tbl_rewards');
            $result = $query->result_array(); 
            return $result;
    }    

    function save_reward($uid,$rid) {
                /* Coupon code generate */
                $lenght = 10;
                if (function_exists("random_bytes")) {
                    $bytes = random_bytes(ceil($lenght / 2));
                } elseif (function_exists("openssl_random_pseudo_bytes")) {
                    $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
                } else {
                throw new Exception("no cryptographically secure random function available");
                }
                $ccode = substr(bin2hex($bytes), 0, $lenght);
                //echo $ccode;
                $tblreward['ureward_userid'] = $uid;
                $tblreward['ureward_rewardid'] = $rid;
                $tblreward['ureward_code'] = $ccode;
                
                $this->db->insert('tbl_user_rewards', $tblreward);
                //var_dump($tblreward);
    }

     function show_user_rewards($uid) {
            $this->db->order_by('ureward_date', 'DESC');
            $this->db->where('tbl_user_rewards.ureward_userid',$uid);
            $query = $this->db->get('tbl_user_rewards');
            $result = $query->result_array(); 
            return $result;
    }




}
