<?php

Class Money_model extends CI_Model {

    //this is the expiration for a non-remember session
    //var $session_expire = 7200;


    var $money_for_journey = 3; // points
    var $money_for_reward = 3; // points
    var $money_for_fees = 10; // %

    function __construct() {
        parent::__construct();
    }

    /*     * ******************************************************************

     * ****************************************************************** */

    function set_usermoney($uid) {
            $this->db->where('tbl_money.money_user',$uid);
            $query = $this->db->get('tbl_money');
            $result = $query->result_array();       
                if (!$result) {
                $tblmoney['money_user'] = $uid;
                $tblmoney['money_count'] = 50;  // Starting capital
                $this->db->insert('tbl_money', $tblmoney);
                return true;
                }  else {return false;}          
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

                $logdata['user']=$uid;
                $logdata['action']='change money: '.$result[0]['money_count'].' +'.$plus.' = '.$total;
                logAll($logdata);

                return $total;
            }
    }


    function reserve_usermoney($uid,$count,$transfer_id,$transfer="trip") {
            if (!empty($uid) && !empty($count) && !empty($transfer)) {
                $bank['bank_user_id'] = $uid;
                $bank['bank_count'] = $count;
                $bank['bank_transfer_id'] = $transfer_id;
                $bank['bank_transfer'] = $transfer;
                $this->db->insert('tbl_bank', $bank); 
            }
    }


    function tobank_usermoney($uid,$transfer_id) {
            $this->db->where(array('bank_user_id' => $uid, 'bank_transfer_id' => $transfer_id));
            $query = $this->db->get('tbl_bank');
            $result = $query->result_array(); 
            if ($result) {
                $tobank = $result[0]['bank_count']*($this->money_for_fees/100);
                $this->db->where(array('bank_user_id' => $uid, 'bank_transfer_id' => $transfer_id));
                $this->db->delete('tbl_bank');
                
                $this->db->where('settings.code','bank');
                $query = $this->db->get('settings');
                $resultbank = $query->result_array();
                $money_count['count'] = $resultbank[0]['count'] + $tobank;
                $this->db->where('settings.code','bank');
                $this->db->update('settings', $money_count); 
                return ($result[0]['bank_count']-$tobank);
            }
    }    


    function show_rewards($pid="",$rid="") {
        // $pid - partner_id
        // $rid - one reward_id
            $this->db->join('tbl_partners', 'partner_id = tbl_rewards.reward_partner_id');
            if ($pid!="") {$this->db->where('tbl_partners.partner_id',$pid);}
            if ($rid!="") {$this->db->where('tbl_rewards.reward_id',$rid);}
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
            $this->db->join('tbl_rewards', 'reward_id = tbl_user_rewards.ureward_rewardid');
            $this->db->join('tbl_partners', 'partner_id = tbl_rewards.reward_partner_id');
            $this->db->where('tbl_user_rewards.ureward_userid',$uid);
            $query = $this->db->get('tbl_user_rewards');
            $result = $query->result_array(); 
            return $result;
    }

    function show_partners($pid="") {
            if ($pid!="") {$this->db->where('tbl_partners.partner_id',$pid);}
            $query = $this->db->get('tbl_partners');
            $result = $query->result_array(); 
            return $result;
    }  



    function save_payments($pid,$uid,$amount) {
            $tbl['payments_charge_id'] = $pid;
            $tbl['payments_user_id'] = $uid;
            $tbl['payments_amount'] = $amount;
            $this->db->insert('tbl_payments', $tbl);
            $this->Money_model->change_usermoney($uid,$amount);
    }  



}
