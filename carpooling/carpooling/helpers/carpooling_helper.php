<?php
function createFolder($path){
        
    $dirPath = $path;

    if (!is_dir($dirPath)) {
        mkdir($dirPath, 0777);
    }
}


function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    }else{
        return 0;
    }
}

function getExtension($str) 
{
         $i = strrpos($str,".");
         if (!$i) { return ""; } 

         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}

// Function to remove folders and files 
function rrmdir($dir) {
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file)
            if ($file != "." && $file != "..") rrmdir("$dir/$file");
        rmdir($dir);
    }
    else if (file_exists($dir)) unlink($dir);
}

// Function to Copy folders and files       
function rcopy($src, $dst) {
    if (file_exists ( $dst ))
        rrmdir ( $dst );
    if (is_dir ( $src )) {
        mkdir ( $dst );
        $files = scandir ( $src );
        foreach ( $files as $file )
            if ($file != "." && $file != "..")
                rcopy ( "$src/$file", "$dst/$file" );
    } else if (file_exists ( $src ))
        copy ( $src, $dst );
}

function getAvailableSeat($tripDate,$tripId){
    $CI = & get_instance();
    $CI->db->select("(SELECT trip_avilable_seat FROM tbl_trips WHERE trip_id=".$tripId.") - (SELECT IFNULL(COUNT(enquiry_id), 0) FROM tbl_enquires WHERE enquiry_trip_id=".$tripId
        . " AND enquiry_trip_date='".$tripDate. "' AND enquiry_trip_status= 1) as balanceSeat",FALSE);        
    $CI->db->where('tbl_trips.trip_id', $tripId);
    $result = $CI->db->get('tbl_trips')->row();
    
//    echo $CI->db->last_query();die;
    $balanceSeat = $result->balanceSeat;
    if($balanceSeat > 0){
        return $balanceSeat;
    }else{
        return '0';
    }
}

function getOverallRating($userId){
    $CI = & get_instance();
    $CI->db->select("count(id) as totalUser,(SELECT IFNULL(SUM(rating),0) FROM tbl_rating WHERE rating_receiver_id=".$userId.") as totalRating",FALSE);        
    $CI->db->where('tbl_rating.rating_receiver_id', $userId);
    $result = $CI->db->get('tbl_rating');
    //echo $CI->db->last_query();die;
    $percentage = 0;
    if($result->num_rows > 0 ){
        $result = $result->row_array();
        if($result['totalRating'] != 0 && $result['totalUser'] != 0){
            $percentage = round(($result['totalRating'] / ($result['totalUser'] * 5)) * 100);
        }
        return $percentage;
    }else{
        return $percentage;
    }
}

function getRating($rating){
    
    if ($rating<=1){
        $str_rating = "novice";
        $stars=' ★';
    } else if ($rating>=2 && $rating<=4) {
        $str_rating = "beginner";
        $stars=' ★★';
    } else if ($rating>=5 && $rating<=9) {
        $str_rating = "competent";
        $stars=' ★★★';
    } else if ($rating>=10 && $rating<=29) {
        $str_rating = "master";
        $stars=' ★★★★';
    } else if ($rating>=30) {
        $str_rating = "expert";
        $stars=' ★★★★★';
    } else {
        $str_rating = "";
        $stars='';
        return;
    }
    
    return '<div class="user-rating">skill level: <span>'.$str_rating.'</span>'.$stars.'</div>';
}

function comportImg($userId){
    $CI = & get_instance();
    $result = $CI->db->get_where('tbl_comport', array('comport_id' => $userId))->row();
    return $result->comport_logo;
    }

function checkenquery($tripID,$userId){
    $CI = & get_instance();        
    $CI->db->where('tbl_enquires.enquiry_trip_id', $tripID);
    $CI->db->where('tbl_enquires.enquire_travel_id', $userId);
    $result = $CI->db->get('tbl_enquires');
    
    if($result->num_rows > 0 ){
       return false;
    }else{
        return true;
    }
}

function checkorder($tripID,$userId){
    $CI = & get_instance();        
    $CI->db->where('tbl_orders.order_trip_id', $tripID);
    $CI->db->where('tbl_orders.order_travel_id', $userId);
    $result = $CI->db->get('tbl_orders');
    
    if($result->num_rows > 0 ){
       return false;
    }else{
        return true;
    }
}


///  Geka Log everything

function logAll($logdata){  /// user  action
    $thistime = date('d-m-Y, H:i',time());
    file_put_contents('sparrowlogs/log_'.date('Y-m',time()).'.txt', $thistime.' | user #'.$logdata['user'].' '.$logdata['action'].' | '.$_SERVER['REQUEST_URI'].' 
', FILE_APPEND);
}