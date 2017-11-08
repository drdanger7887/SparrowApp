<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Carpooling_mgt {
    
    public function __construct() {
        
    }
    
    public function getPackageDuration(){
        
        return array('' => '-Select-','2'=>'1 year');
    }
    
    public function getPaymentMode(){
        
        return array('' => '-Select-','1'=>'DD','2'=>'Bank Transaction','3'=>'Cash');
    }
    
    public function backend_search($search , $createdOn , $likeArray = array()){
        
        $from = '';
        $to = '';
        
        $CI =   &get_instance();
         
        if(isset($search['datepickerDateFrom']) && $search['datepickerDateFrom'] != ''){
            $from = date('Y-m-d' , strtotime( str_replace('/', '-', $search['datepickerDateFrom']) ));
        }
        if(isset($search['datepickerDateTo']) && $search['datepickerDateTo'] != ''){
            $to = date('Y-m-d' , strtotime( str_replace('/', '-', $search['datepickerDateTo']) ));
        }
       

        if($from != '' && $to != ''){
            $f = $from.' 00:00:00';
            $t = $to.' 23:59:59';
            $CI->db->where($createdOn .' >=', $f );   
            $CI->db->where($createdOn .' <=', $t );

        }else if($from != ''){
            $f = $from.' 00:00:00';
            $t = $from.' 23:59:59';
            $CI->db->where($createdOn .' >=', $f );   
            $CI->db->where($createdOn .' <=', $t );

        }else if($to != ''){
            $f = $to.' 00:00:00';
            $t = $to.' 23:59:59';
            $CI->db->where($createdOn .' >=', $f );   
            $CI->db->where($createdOn .' <=', $t );
        }
        
       $like = '';
       if(isset($search['keyword']) && $search['keyword'] != '')
        {
           if(!empty($likeArray)){
               $flag = true;
               foreach ($likeArray as $value) {
                   if($flag){
                        $like .= $value ." LIKE '%".trim($search['keyword'])."%' ";
                   }else{
                       $like .= " OR ". $value ." LIKE '%".trim($search['keyword'])."%' ";
                   }
                   $flag = false;
                }
                $CI->db->where('('.$like.')');
           }
        }
    }
    
    
    public function createFolder($path){
        
        $dirPath = $path;
        
        if (!is_dir($dirPath)) {
            mkdir($dirPath, 0755);
        }
    }
    
    public function check_id($id,$childTabel,$find){
        $CI = get_instance();
        $CI->db->from($childTabel);
        $CI->db->where($find, $id);

        $count = $CI->db->count_all_results();

        if ($count > 0)
        {
         return true;
        }
        else
        {
         return false;
        }
    }
    
    public function get_count($id,$tabelName,$find){
        $CI = get_instance();
        $CI->db->from($tabelName);
        $CI->db->where($find, $id);

        $count = $CI->db->count_all_results();

        if ($count > 0)
        {
         return true;
        }
        else
        {
         return false;
        }
    }
    
    public function delete_row($id,$tabelName,$find){
        $CI = get_instance();
        $CI->db->where($find, $id);
        $CI->db->delete($tabelName);
    }
    
    public function getClassNumber($class){
        $class = strtolower($class);
        
        $classArr = $this->classNumberArray();
        
        return $classArr[$class];
    }
    
    public function classNumberArray(){
        return array(
                    'i'     => 1,
                    'ii'    => 2,
                    'iii'   => 3,
                    'iv'    => 4,
                    'v'     => 5,
                    'v1'    => 6,
                    'v11'   => 7,
                    'v111'  => 8,
                    '1x'    => 9,
                    'x'     => 10,
                    'x1'    => 11,
                    'x11'   => 12,
            
                    'vi'    => 6,
                    'vii'   => 7,
                    'viii'  => 8,
                    'ix'    => 9,
            
                    'xi'    => 11,
                    'xii'   => 12,
                );
    }
    
    public function classNameArray(){
        return array(
                    '1' => 'I',
                    '2' => 'II',
                    '3' => 'III',
                    '4' => 'IV',
                    '5' => 'V',
                    '6' => 'VI',
                    '7' => 'VII',
                    '8' => 'VIII',
                    '9' => 'IX',
                    '10'    => 'X',
                    '11'    => 'XI',
                    '12'    => 'XII'
                );
    }
    
    function dateList(){    
        
        $date = array();
        for($i =1; $i<= 31; $i++){
            
            $a = sprintf("%02d", $i);
            $date[$a] = $a;
        }
        
        return $date;
        
    }
    
    function monthList(){
        return array(
                    '01' => 'January',
                    '02' => 'February',
                    '03' => 'March',
                    '04' => 'April',
                    '05' => 'May',
                    '06' => 'June',
                    '07' => 'July',
                    '08' => 'August',
                    '09' => 'September',
                    '10'    => 'October',
                    '11'    => 'November',
                    '12'    => 'December'
                );
    }
    
    
    function yearList(){    
        
        $date = array();
        for($i = 1990; $i<= 2010; $i++){
            $date[$i] = $i;
        }
        
        return $date;
        
    }
}    
?>