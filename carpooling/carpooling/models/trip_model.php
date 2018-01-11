<?php

Class Trip_model extends CI_Model {

    //this is the expiration for a non-remember session
    var $session_expire = 7200;

     var $redlinetime = 3600; /// time before cards will 

    function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->library('carpooling_mgt');
    }

    /*     * ******************************************************************

     * ****************************************************************** */

    function get_recent_trip($limit = '', $order_by = 'trip_id', $direction = 'DESC') {
        if ($limit != '') {
            $this->db->limit($limit);
        }
        $this->db->order_by($order_by, $direction);
        $query = $this->db->get('tbl_trips');
        $result = $query->result_array();
        return $result;
    }


    /*  Geka */
    function get_trips_community ($commid="", $order_by='trip_unix_time', $by_time='', $user_id='', $limit='') {
        /*     
        $by_time = future | past      
        $order_by='trip_unix_time'  |  trip_id ///////    order_by  do not work!!!!!!!!!
        */
        
        if ($commid!="") { $this->db->where('tbl_trips.trip_community',$commid); }
        if ($by_time!="") { 
            if ($by_time=='future') {
                $this->db->where('tbl_trips.trip_unix_time > '.(time()+$this->redlinetime));
            } else if ($by_time=='past') {
                $this->db->where('tbl_trips.trip_unix_time < '.time()); 
            }
        }
        if ($user_id!="") { $this->db->where('tbl_trips.trip_user_id',$user_id); }
        if ($limit != '') { $this->db->limit($limit); }
        $this->db->where('tbl_trips.trip_status','1');
        //$this->db->where('tbl_trips.trip_unix_time > '.(time()+$this->redlinetime));
        $query = $this->db->get('tbl_trips');      
        $result = $query->result_array();

            


        if (isset($result)) {
            usort($result, function ($item1, $item2) {
                if ($item1['trip_unix_time'] == $item2['trip_unix_time']) return 0;
                return $item1['trip_unix_time'] < $item2['trip_unix_time'] ? -1 : 1;
            });
            //var_dump($result);
            return $result;
        }





    }



    function get_requests_community($commid="", $order_by='trip_unix_time', $by_time='', $user_id='') {
        if ($commid!="") { $this->db->where('tbl_request_trips.trip_community',$commid); }
        if ($user_id!="") { $this->db->where('tbl_request_trips.trip_user_id',$user_id); }

         if ($by_time!="") { 
            if ($by_time=='future') {
                $this->db->where('tbl_request_trips.trip_unix_time > '.(time()+$this->redlinetime));
            } else if ($by_time=='past') {
                $this->db->where('tbl_request_trips.trip_unix_time < '.time()); 
            }
        }       
        $this->db->where('tbl_request_trips.trip_unix_time > '.(time()+$this->redlinetime));
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_request_trips.trip_user_id');
        $query = $this->db->get('tbl_request_trips');      
        $result_pre = $query->result_array();
        $result = $query->result_array();
        if (isset($result)) {
            usort($result, function ($item1, $item2) {
                if ($item1['trip_unix_time'] == $item2['trip_unix_time']) return 0;
                return $item1['trip_unix_time'] < $item2['trip_unix_time'] ? -1 : 1;
            });
            //var_dump($result);
            return $result;
        }
    }



    function get_leg_details($trip_id) {
        //$this->db->select('trip_return');
        $this->db->where('tbl_t_trip_legs.trip_id', $trip_id);
        $result = $this->db->get('tbl_t_trip_legs');
        $result = $result->result_array();
        return $result;
    }




    function get_trips($uid = 0, $data) {
        $cdate = date('Y/m/d');
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->where('tbl_trips.trip_user_id', $uid);       
        $query_val = "(tbl_trips.trip_frequncy != '' OR tbl_trips.trip_casual_date >='" . $cdate . "')";
        $this->db->where($query_val);
        $query = $this->db->get('tbl_trips');
        $result = $query->result_array();       
        $temp = array();
        if ($result) {

            foreach ($result as $key => $row) {

                if ($row['trip_routes']) {

                    $trip_route_ids = explode('~', $row['trip_routes']);
                    array_shift($trip_route_ids);
                    array_pop($trip_route_ids);
                    $ids = array();
                    foreach ($trip_route_ids as $route) {
                        $ids[] = $route;
                    }

                    $temp['route_' . $row['trip_id']] = $ids;
                }
                $temp['leg_' . $row['trip_id']] = $this->db->order_by('trip_led_id', 'ASC')->get_where('tbl_t_trip_legs', array('trip_id' => $row['trip_id']))->result_array();
            }
        }

        $data['legdetails'] = $temp;

        $data['trip_details'] = $result;

        return $data;
    }

    function get_trips_geka($uid = 0, $data) {
        $cdate = date('Y/m/d');
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->where('tbl_trips.trip_user_id', $uid);       
        //$query_val = "(tbl_trips.trip_frequncy != '' OR tbl_trips.trip_casual_date >='" . $cdate . "')";
        //$this->db->where($query_val);
        $query = $this->db->get('tbl_trips');
        //$result = $query->result_array();  


        $by_time = "";
        $order_by = "trip_unix_time";


        $result_pre = $query->result_array();
            /*
            for ($i=0;$i<sizeof($result_pre);$i++) {
                $trip_date = str_replace('/', '-', $result_pre[$i]['trip_casual_date']);
                $trip_datetime = $trip_date.' '.$result_pre[$i]['trip_depature_time'];
                //echo date("jS F, Y - H:i", strtotime($trip_datetime)).' - '.strtotime($trip_datetime).'<br>';
                $result_pre[$i]['unix_time'] = strtotime($trip_datetime);
                
                $result_pre[$i]['order_by'] = $order_by;

                    if ($by_time=="future" && $result_pre[$i]['unix_time']>=strtotime("now")) {
                        $result[] = $result_pre[$i];
                    } elseif ($by_time=="past" && $result_pre[$i]['unix_time']<strtotime("now")) {
                        $result[] = $result_pre[$i];
                    } elseif ($by_time=="") {
                        $result[] = $result_pre[$i];
                    }

            } 
            */
            $result = $result_pre;

        $temp = array();
        
        if (isset($result)) {
            usort($result, function ($item1, $item2) {
                if ($item1['trip_unix_time'] == $item2['trip_unix_time']) return 0;
                return $item1['trip_unix_time'] < $item2['trip_unix_time'] ? -1 : 1;
            });
            


            foreach ($result as $key => $row) {

                if ($row['trip_routes']) {

                    $trip_route_ids = explode('~', $row['trip_routes']);
                    array_shift($trip_route_ids);
                    array_pop($trip_route_ids);
                    $ids = array();
                    foreach ($trip_route_ids as $route) {
                        $ids[] = $route;
                    }

                    $temp['route_' . $row['trip_id']] = $ids;
                }
                $temp['leg_' . $row['trip_id']] = $this->db->order_by('trip_led_id', 'ASC')->get_where('tbl_t_trip_legs', array('trip_id' => $row['trip_id']))->result_array();
            }
        

        $data['legdetails'] = $temp;
        $data['trip_details'] = $result;
        }
        return $data;

    }







    function get_trip($pid = 0) {

        $this->db->select('*');

        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');

        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');

        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');

        $this->db->where('tbl_trips.trip_id', $pid);


        return $this->db->get('tbl_trips')->row();

        /* echo $this->db->last_query();

          die;
         */
    }

    function get_tripdetail($id) {
        $this->db->select('*');
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_t_trip_legs.trip_id', 'inner');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id', 'inner');
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id', 'inner');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id', 'inner');
        $this->db->where('tbl_t_trip_legs.trip_led_id', $id);
        return $this->db->get('tbl_t_trip_legs')->row_array();
    }




    function get_vehicle($vid) {
        $result = $this->db->get_where('tbl_vehicle', array('vechicle_id' => $vid));
        return $result->row();
    }

    function get_triped($userid) {
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $result = $this->db->get_where('tbl_trips', array('trip_id' => $userid));
        return $result->row();
    }

    function get_trip_single($userid) {
        $result = $this->db->get_where('tbl_trips', array('trip_id' => $userid));
        return $result->row();
    }

    function get_city_list() {
        return $this->db->order_by('cityname', 'ASC')->get('tbl_city')->result();
    }

    function get_alltrips($limit = 0, $offset = 0, $order_by = 'trip_id', $direction = 'DESC', $data) {
        $this->db->order_by($order_by, $direction);
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $query = $this->db->get('tbl_trips');
        $result = $query->result_array();
        $temp = array();
        if ($result) {


            foreach ($result as $key => $row) {
                $temp['leg_' . $row['trip_id']] = $this->db->get_where('tbl_t_trip_legs', array('trip_id' => $row['trip_id']))->result_array();
            }
        }

        $data['legdetails'] = $temp;

        $data['trip_details'] = $result;

        return $data;
    }

    function count_trips() {

        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        return $this->db->count_all_results('tbl_trips');
    }

    function save($trip) {
        if ($trip['trip_id']) {
            $this->db->where('trip_id', $trip['trip_id']);
            $this->db->update('tbl_trips', $trip);
            return $trip['trip_id'];
        } else {
            $dats['trip_created_date'] = date('Y-m-d H:i:s', now());
            $this->db->insert('tbl_trips', $trip);
            return $this->db->insert_id();
        }
    }

    function check_trip($param) {

        $querycon = '( "' . $param['time'] . '" BETWEEN `trip_depature_time` AND `trip_return_time`)';
        $this->db->where($querycon);
        $this->db->where('trip_vehicle_id', $param['vechicle_id']);
        if (!empty($param['tripid'])) {
            $querycon = 'trip_id != ' . $param['tripid'];
            $this->db->where($querycon);
        }

        $frequency = $param['frequency'];
        if ($frequency != "") {

            $str = explode(',', $frequency);
            $querycon = "(";
            foreach ($str as $k => $tmpdept) {
                if ($querycon != "(") {
                    $querycon .=" OR ";
                }
                $querycon .="tbl_trips.trip_frequncy like '%" . $tmpdept . "%'";
            }
            $querycon .= ")";
            $this->db->where($querycon);
        }

        if (!empty($param['date'])) {

            $freq = $param['date_frequency'];
            if ($freq != "") {

                $str = explode(',', $freq);
                $querycon = "(";
                foreach ($str as $k => $tmpdept) {
                    if ($querycon != "(") {
                        $querycon .=" OR ";
                    }
                    $querycon .="tbl_trips.trip_frequncy like '%~" . $tmpdept . "~%'";
                }
                //$querycon .= ")";
                //$this->db->where($querycon);
                //$querycon = "(";
                $querycon .=" OR ";
                $querycon .="tbl_trips.trip_casual_date = '" . $param['date'] . "'";
                $querycon .= ")";
                $this->db->where($querycon);
            }
        }



        $query = $this->db->get('tbl_trips');
        /*  echo $this->db->last_query();
          die; */

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getmap_details($tripid, $data = '') {
        $temp = array();
        $this->db->where('tbl_trips.trip_id', $tripid);
        $result = $this->db->get('tbl_trips')->row();
        //print_r($data->trip_routes_lat_lan);
        /* $temp['latlong']=explode(',',str_replace('~','',$data->trip_routes_lat_lan));
          array_shift($$temp['latlong']);
          array_pop($temp['latlong']);
          $route = $temp['latlong']; */

        if (!empty($result)) {
            $lanlat = explode('~,', rtrim($result->trip_routes_lat_lan, '~'));
            $data['last'] = sizeof($lanlat);
            foreach ($lanlat as $lat) {

                $latlong[] = ltrim($lat, '~');
            }
            $data['latlong'] = $latlong;
            $route_lanlat = explode('~,', $result->trip_routes_lat_lan);
            array_shift($route_lanlat);
            array_pop($route_lanlat);
            $latlan = array();
            foreach ($route_lanlat as $route) {

                $latlan[] = ltrim($route, '~');
            }
            $data['route'] = $latlan;
            $source = ltrim($result->trip_from_latlan, '~');
            $source = rtrim($source, '~');
            $data['origin'] = $source;
            $destination = ltrim($result->trip_to_latlan, '~');
            $destination = rtrim($destination, '~');
            $data['destination'] = $destination;

            return $data;
        } else {
            return false;
        }
    }

    function delete($userid) {

        $this->db->where('user_id', $userid);
        $this->db->delete('tbl_users');
    }

    function check_email($str, $id = false) {

        $this->CI->db->select('user_email');
        $this->CI->db->from('tbl_users');
        $this->CI->db->where('user_email', $str);
        if ($id) {
            $this->CI->db->where('user_id !=', $id);
        }
        $count = $this->CI->db->count_all_results();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    function save_address($data) {
        $this->db->insert('tbl_address', $data);
        return $this->db->insert_id();
    }

    function save_tripleg($data) {
        if ($data['trip_led_id']) {
            $this->db->where('trip_led_id', $data['trip_led_id']);
            $this->db->update('tbl_t_trip_legs', $data);
            return $data['trip_led_id'];
        } else {
            $data['created_time'] = date('Y-m-d H:i:s', now());
            $this->db->insert('tbl_t_trip_legs', $data);
            return $this->db->insert_id();
        }
    }

    function delete_legdetils($trip_id) {
        $this->db->where('trip_id', $trip_id);
        $this->db->delete('tbl_t_trip_legs');
    }

    function get_legdetails($id) {
        return $this->db->where('trip_led_id', $id)->get('tbl_t_trip_legs')->row();
    }

    function get_user($tripid) {
        return $this->db->where('trip_id', $tripid)->get('tbl_trips')->row();
    }

    function check_legdetils($trip_id) {
        $this->db->select('trip_return');
        $this->db->where('trip_id', $trip_id);
        $result = $this->db->get('tbl_t_trip_legs');
        $result = $result->result_array();
        return $result;
    }

    function delete_trip_by_edit($trip_id) {

        $this->db->where('trip_id', $trip_id);
        $query = $this->db->get('tbl_trips');
        if ($query->num_rows > 0) {
            $row = $query->row_array();

            $this->delete_legdetils($row['trip_id']);
            $this->db->where('trip_id', $row['trip_id']);
            $this->db->delete('tbl_trips');

            return $trip_id;
        } else {

            return $trip_id;
        }
    }


/*
    function delete_trip_geka($trip_id) {  /// Geka // delete: 1. trip, 2. legs, 3. enquery, ???  4. bank
        $this->db->where('trip_id', $trip_id);
        $query = $this->db->get('tbl_trips');
        if ($query->num_rows > 0) {
            $row = $query->row_array();

            $this->delete_legdetils($row['trip_id']);
            $this->db->where('trip_id', $row['trip_id']);
            $this->db->delete('tbl_trips');

            $this->db->where('enquiry_trip_id', $trip_id);
            $this->db->delete('tbl_enquires');
        } 
    }
*/

    function delete_trip($trip_id) {

        $this->db->where('trip_user_id', $trip_id);
        $query = $this->db->get('tbl_trips');
        if ($query->num_rows > 0) {
            $query = $query->result_array();
            if ($query) {

                foreach ($query as $key => $row) {
                    $this->delete_legdetils($row['trip_id']);
                    $this->db->where('trip_id', $row['trip_id']);
                    $this->db->delete('tbl_trips');
                }
            }
            return $trip_id;
        } else {

            return $trip_id;
        }
    }

    function tsave($param) {
        $this->db->where('trip_user_id', $param['trip_user_id']);
        $query = $this->db->get('tbl_trips');
        if ($query->num_rows > 0) {
            $this->db->where('trip_user_id', $param['trip_user_id']);
            $this->db->update('tbl_trips', $param);
            return $param['trip_user_id'];
        } else {

            return $param['trip_user_id'];
        }
    }

    function past_trip($uid = 0, $data) {
        $cdate = date('Y/m/d');
        // echo $cdate;
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->where('tbl_trips.trip_user_id', $uid);
        $this->db->where('tbl_trips.trip_frequncy', '');
        $this->db->where('tbl_trips.trip_casual_date < "' . $cdate . '"');
        $query = $this->db->get('tbl_trips');
        $result = $query->result_array();
        /* echo $this->db->last_query();
          die; */
        $temp = array();
        if ($result) {


            foreach ($result as $key => $row) {

                if ($row['trip_routes']) {

                    $trip_route_ids = explode('~', $row['trip_routes']);
                    array_shift($trip_route_ids);
                    array_pop($trip_route_ids);
                    $ids = array();
                    foreach ($trip_route_ids as $route) {
                        $ids[] = $route;
                    }

                    $temp['route_' . $row['trip_id']] = $ids;
                }
                $temp['leg_' . $row['trip_id']] = $this->db->order_by('trip_led_id', 'ASC')->get_where('tbl_t_trip_legs', array('trip_id' => $row['trip_id']))->result_array();
            }
        }

        $data['legdetails'] = $temp;

        $data['trip_details'] = $result;

        return $data;
    }

    function past_trip_passenger($uid = 0, $data) {
        $cdate = date('Y/m/d');
        // echo $cdate;	    
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_enquires.enquiry_trip_id');
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->where('tbl_enquires.enquiry_passanger_id', $uid);
        //$this->db->where('tbl_trips.trip_frequncy','');
        $this->db->where('tbl_enquires.enquiry_trip_status', 1);
        $this->db->where('tbl_enquires.enquiry_trip_date < "' . $cdate . '"');
        $query = $this->db->get('tbl_enquires');
        $result = $query->result_array();
        /* echo $this->db->last_query();
          die; */
        $temp = array();
        if ($result) {


            foreach ($result as $key => $row) {

                if ($row['trip_routes']) {

                    $trip_route_ids = explode('~', $row['trip_routes']);
                    array_shift($trip_route_ids);
                    array_pop($trip_route_ids);
                    $ids = array();
                    foreach ($trip_route_ids as $route) {
                        $ids[] = $route;
                    }

                    $temp['route_' . $row['trip_id']] = $ids;
                }
                $temp['leg_' . $row['trip_id']] = $this->db->order_by('trip_led_id', 'ASC')->get_where('tbl_t_trip_legs', array('trip_id' => $row['trip_id']))->result_array();
            }
        }

        $data['legdetails'] = $temp;

        $data['trip_details'] = $result;

        return $data;
    }

    function get_trips_passenger($uid = 0, $data) {
        $cdate = date('Y/m/d');

        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_enquires.enquiry_trip_id');
        $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
        $this->db->where('tbl_enquires.enquiry_passanger_id', $uid);
        $this->db->where('tbl_enquires.enquiry_trip_status', 1);
        $this->db->where('tbl_enquires.enquiry_trip_date >= "' . $cdate . '"');
        $query = $this->db->get('tbl_enquires');
        $result = $query->result_array();
        //echo $this->db->last_query(); die;
        $temp = array();
        if ($result) {

            foreach ($result as $key => $row) {

                if ($row['trip_routes']) {

                    $trip_route_ids = explode('~', $row['trip_routes']);
                    array_shift($trip_route_ids);
                    array_pop($trip_route_ids);
                    $ids = array();
                    foreach ($trip_route_ids as $route) {
                        $ids[] = $route;
                    }

                    $temp['route_' . $row['trip_id']] = $ids;
                }
                $temp['leg_' . $row['trip_id']] = $this->db->order_by('trip_led_id', 'ASC')->get_where('tbl_t_trip_legs', array('trip_id' => $row['trip_id']))->result_array();
            }
        }

        $data['legdetails'] = $temp;

        $data['trip_details'] = $result;

        return $data;
    }

    function getad_image() {

        $this->db->select('image,advertisement_url,ad_nav_link');
        $this->db->where('advertisement_url', 'trip_detail');
        $result = $this->db->get('tbl_advertisement');
        $result = $result->row_array();
        return $result;
    }

    function feedback($save) {

        $save['create_date'] = date('Y-m-d H:i:s', now());
        $this->db->insert('tbl_feedback', $save);
        return $this->db->insert_id();
    }

    function feedbackdetails($id) {

        $this->db->select('*');
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_t_trip_legs.trip_id', 'inner');
        $this->db->join('tbl_feedback', 'tbl_feedback.trip_user_id = tbl_trips.trip_user_id', 'inner');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_feedback.enquiry_passanger_id', 'inner');
        $this->db->where('tbl_t_trip_legs.trip_led_id', $id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(5);
        return $this->db->get('tbl_t_trip_legs')->result();
    }

    function ask_questions($save) {

        $save['create_date'] = date('Y-m-d H:i:s', now());
        $this->db->insert('tbl_client_questions', $save);
        return $this->db->insert_id();
    }

    function get_tripdetails($id) {

        $this->db->select('*');
        $this->db->join('tbl_t_trip_legs', 'tbl_t_trip_legs.trip_led_id = tbl_client_questions.trip_led_id');
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_t_trip_legs.trip_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->where('tbl_client_questions.id', $id);
        return $this->db->get('tbl_client_questions')->row_array();
    }

    function passanger_ques($uid) {

        $this->db->select('*');
        $this->db->join('tbl_t_trip_legs', 'tbl_t_trip_legs.trip_led_id = tbl_client_questions.trip_led_id');
        $this->db->join('tbl_trips', 'tbl_trips.trip_id = tbl_t_trip_legs.trip_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->where('tbl_users.user_id', $uid);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(10);
        return $this->db->get('tbl_client_questions')->result();
    }
    
    function get_overall_info($user_id)
    {
        $this->db->select('*');               
        $this->db->where('tbl_users.user_id',$user_id);
        $results = $this->db->get('tbl_users')->row_array();        
        return $results;
    }
    
    function get_userscomments($user_id){
        
        $this->db->select('*');
        $this->db->join('tbl_feedback','tbl_feedback.trip_user_id = tbl_users.user_id');        
        $this->db->where('tbl_users.user_id',$user_id);
        $results = $this->db->get('tbl_users')->row_array();        
        return $results; 
    }
    
    function get_comduser_image($user_id){
        
        $this->db->select('*');
        $this->db->join('tbl_feedback','tbl_feedback.enquiry_passanger_id = tbl_users.user_id');         
        $results = $this->db->get('tbl_users')->row_array();        
        return $results;
    }
    
    function getcomport_list() {
        return $result = $this->db->get('tbl_comport')->result();
    }
    
     function get_legid($trip_id) {

        $this->db->select('trip_led_id');
        $this->db->where('trip_id', $trip_id);
        $this->db->order_by('trip_led_id',"ASC");
        $result = $this->db->get('tbl_t_trip_legs');
        $result = $result->result_array();
        return $result;
    }
    
    function delete_triprote($trip_id){
        
        $this->db->where('trip_id', $trip_id);
        $this->db->delete('tbl_t_trip_legs');
        return $trip_id;
    }
    
    
    function get_all_trip($limit = 0, $offset = 0, $order_by = 'trip_id', $direction = 'ASC', $cond = array(), $count = false, $likeArray = '', $dateField = 'created_date') {

        $this->db->order_by($order_by, $direction);

        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }


        if (isset($cond['search']) && $cond['search'] != '') {
            if (isset($likeArray) && $likeArray != '') {
                $likeArrayFields = $likeArray;
            } else {
                $likeArrayFields = array('tbl_trips.source','tbl_trips.destination','tbl_users.user_first_name','tbl_users.user_email','tbl_vechicle_types.vechicle_type_name','tbl_vehicle.vechicle_number');
            }
            $this->carpooling_mgt->backend_search($cond['search'], $dateField, $likeArrayFields); //search
        }


        if (isset($cond['select']) && $cond['select'] != '') {
            $this->db->select($cond['select'], false);
        }

        if (!$count) {
            
           $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
            $result = $this->db->get("tbl_trips");
            $result = $result->result();
        } else {
            $this->db->join('tbl_vehicle', 'tbl_vehicle.vechicle_id = tbl_trips.trip_vehicle_id');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_trips.trip_user_id');
        $this->db->join('tbl_vechicle_types', 'tbl_vechicle_types.vechicle_type_id = tbl_vehicle.vechicle_type_id ');
            $result = $this->db->get("tbl_trips");
            $result = $result->num_rows();
        }

        return $result;
    }
    
    function get_allocated_trip($user_id){
        
        $this->db->select('enquiry_trip_id');
        $this->db->where('enquire_travel_id',$user_id);
        $result = $this->db->get('tbl_enquires')->result_array();       
        return $result;
    }
    
    function get_booked_trip($user_id){
        
        $this->db->select('order_trip_id');
        $this->db->where('order_travel_id',$user_id);
        $result = $this->db->get('tbl_orders')->result_array();       
        return $result;
    }
    function get_traveller_email($user_id){
        
        $this->db->select('user_email');
        $this->db->where('user_id',$user_id);
        $result = $this->db->get('tbl_users')->row();
        return $result;
    }
    

}
