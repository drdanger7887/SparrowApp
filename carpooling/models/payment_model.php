<?php

class Payment_model extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->helper('date');
    }

    /*     * ******************************************************************

     * ****************************************************************** */
	
	
    public function get_all_payment()
    {

         $query = $this->db->get('tbl_payment');

         return $query->result();

    }
    
    public function getPayment($type)
    {
        $this->db->where('payment_type',$type);
        $query = $this->db->get('tbl_payment');
        return $query->row();
    }
    
    function save($data)
    {
            if($data['id'])
            {
                    $this->db->where('id', $data['id']);
                    $this->db->update('tbl_payment', $data);
                    return $data['id'];
            }
            else
            {
                    $this->db->insert('tbl_payment', $data);
                    return $this->db->insert_id();
            }
    }
    
    function get_order($order_number){
        $this->db->where('order_number',$order_number);
        $query = $this->db->get('tbl_orders');
        return $query->row();        
    }
    
    function save_order($data){
        if($data['order_id'])
        {
            $this->db->where('order_id', $data['order_id']);
            $this->db->update('tbl_orders', $data);
            return $data['order_id'];
        }
        else
        {
            date_default_timezone_set("Asia/Kolkata");
            $data['order_date_time'] = date('Y-m-d h:i:s', now());
            $this->db->insert('tbl_orders', $data);
            return $this->db->insert_id();
        }
    }
    
    function get_payment_list($user_id){
        $this->db->select('tbl_orders.*,tbl_t_trip_legs.*,tbl_orders.*,TUP.*,tbl_vehicle.*,tbl_vechicle_types.*');
        $this->db->join('tbl_t_trip_legs', 'tbl_t_trip_legs.trip_led_id = tbl_orders.order_trip_leg_id');
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_t_trip_legs.trip_id');
        $this->db->join('tbl_vehicle','tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_vechicle_types','tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->join('tbl_users as TUO', 'TUO.user_id = tbl_trips.trip_user_id');  
        $this->db->join('tbl_users as TUP', 'TUP.user_id = tbl_orders.order_passenger_id');  
        $this->db->where('tbl_orders.order_flg', '1');
        $this->db->where('tbl_orders.payment_flg', '1');
        $this->db->where('TUO.user_id', $user_id);
        return $this->db->get('tbl_orders')->result();
    }
    
    function get_payment_list_as_passenger($user_id){
        $this->db->select('tbl_orders.*,tbl_t_trip_legs.*,tbl_orders.*,TUO.*,tbl_vehicle.*,tbl_vechicle_types.*');
        $this->db->join('tbl_t_trip_legs', 'tbl_t_trip_legs.trip_led_id = tbl_orders.order_trip_leg_id');
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_t_trip_legs.trip_id');
        $this->db->join('tbl_vehicle','tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_vechicle_types','tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->join('tbl_users as TUO', 'TUO.user_id = tbl_trips.trip_user_id');  
        $this->db->where('tbl_orders.order_flg', '1');
        $this->db->where('tbl_orders.payment_flg', '1');
        $this->db->where('tbl_orders.order_passenger_id', $user_id);
        return $this->db->get('tbl_orders')->result();
    }
    
    function get_payment_list_admin($limit=0, $offset=0,$status = false,$count=false,$id = false){
        $this->db->select('tbl_orders.*'); 
        if($limit>0)
        {
                $this->db->limit($limit, $offset);
        }
        if($status){
            $this->db->where('tbl_orders.order_flg', '1');
            $this->db->where('tbl_orders.payment_flg', '1');
        }else{
            $status = array('0','2');
            $this->db->where('(tbl_orders.order_flg = "0" OR tbl_orders.order_flg = "2")');;
            $this->db->where('tbl_orders.payment_flg', '0');
        }
        if($id){
            $this->db->where('tbl_orders.order_travel_id',$id);
        }
        if($count){
            return $this->db->get('tbl_orders')->result_array();
            //echo $this->db->last_query();exit;
        }else{
            $query = $this->db->get('tbl_orders');
            return $query->num_rows();
        }
    }
    
    function total_payment_amount(){
        $this->db->select('sum(order_amount) as totalAmount');
        $this->db->where('tbl_orders.order_flg', '1');
        $this->db->where('tbl_orders.payment_flg', '1');
        $query = $this->db->get('tbl_orders')->row_array();
        if($query){
            return $query['totalAmount'];
        }else{
            return 0;
        }
    }
    
    
	

}

?>
