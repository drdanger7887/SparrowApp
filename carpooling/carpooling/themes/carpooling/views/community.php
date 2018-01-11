<?php include('header.php'); ?>


<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<script>
    $(document).ready(function () {


<?php


//lets have the flashdata overright "$message" if it exists
if ($this->session->flashdata('message')) {
    $message = $this->session->flashdata('message');
    ?>
            $.goNotification('<?= $message ?>', {
                type: 'success', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 4000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'fast', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}

if ($this->session->flashdata('error')) {
    $error = $this->session->flashdata('error');
    ?>
            $.goNotification("<?= trim($error) ?>", {
                type: 'error', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 4000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'fast', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}

if (function_exists('validation_errors') && validation_errors() != '') {
    $error = validation_errors();
    ?>
            $.goNotification('<?= trim($error) ?>', {
                type: 'error', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 20000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}
?>



    });

</script>




<?php 

if (!isset($communityid)) {  // List of communities
    include('title.php'); 
?>

<div class="container-fluid margintop40 mapbg">
    <div class="container">
        <div class="row">

        <script type="text/javascript">
        $(document).ready(function () {
            $("div.link").click(function(){
                document.location.href = $(this).attr("rel");
            });
        });
        </script>

<?php
    $comm = $this->community_model->get_communitylist();   
    for ($i=0; $i<sizeof($comm); $i++) {
?>
            
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 colon">
            <div class="coloncard cardcomm link" rel="<?php echo base_url('community').'/site/'.$comm[$i]->comm_slug; ?>">
<?php
            echo '<a class="cardcommimg" href="'.base_url('community').'/site/'.$comm[$i]->comm_slug.'"><img src="'.base_url('/').'spcp/images/community/'.$comm[$i]->comm_slug.'.jpg"></a>
            <a href="'.base_url('community').'/site/'.$comm[$i]->comm_slug.'"><h3>'.$comm[$i]->comm_name.'</h3></a>
            ';
            //echo '<p>'.$comm[$i]->comm_descr.'</p><img class="cardfade" src="'.base_url('/').'spcp/images/cardfade.png">';
?>                
            </div> 
        </div>

<?php 
    } 
    echo '
        </div>
    </div>
</div>
    ';
} else {

include('title_community.php'); 
    $g_requesttripcommlist = $this->trip_model->get_requests_community($communityid,'','future');
    $g_normaltripcommlist = $this->trip_model->get_trips_community($communityid,'','future');  //  3 - future

    $g_tripcommlist = array_merge($g_normaltripcommlist, $g_requesttripcommlist);
    //var_dump($g_tripcommlist);


    usort($g_tripcommlist, function ($item1, $item2) {
        if ($item1['trip_unix_time'] == $item2['trip_unix_time']) return 0;
        return $item1['trip_unix_time'] < $item2['trip_unix_time'] ? -1 : 1;
    });

//$g_tripcommlist = $g_normaltripcommlist;
    if (sizeof($g_tripcommlist>0)) {
?>
        <script type="text/javascript">
        $(document).ready(function () {
            $("div.link").click(function(){
                document.location.href = $(this).attr("rel");
            });
        });
        </script>
        
<div class="container-fluid margintop40 mapbg">
    <div class="container">
        <div class="row">
<?php 
        //for ($i=0;$i<sizeof($g_tripcommlist);$i++) {
    for ($i=0;$i<sizeof($g_tripcommlist);$i++) {
        if(isset($g_tripcommlist[$i]['trip_vehicle_id'])){
            $g_legdetail = $this->trip_model->get_leg_details($g_tripcommlist[$i]['trip_id']); 
                if (sizeof($g_legdetail)>0) {
                   $trip = $this->trip_model->get_tripdetail($g_legdetail[0]['trip_led_id']);

                    $source = explode(',', $trip['source']);
                    if (empty($source[0])) {
                        $source_str = $source[1];
                    } else {
                        $source_str = $source[0];
                    }
                    $destination = explode(',', $trip['destination']);
                    if (empty($destination[0])) {
                        $destination_str = $destination[1];
                    } else {
                        $destination_str = $destination[0];
                   	}  

                   	if ($g_tripcommlist[$i]['trip_unix_time']<(time()+$this->trip_model->redlinetime)) { 
                    	$cardlink = "coloncard cardride tpast "; 
                   	} else {
                    	$cardlink = "coloncard cardride link"; 
                   	}
 					
                   	if ($comm[0]->comm_address==$trip['destination']) {$directionclass = "tocomm";} else {$directionclass = "fromcomm";}
					$cardlink .= ' '.$directionclass;

                   	echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 colon"> 
                    	    <div class="'.$cardlink.'" rel="'.base_url('trip/tripdetails/' . $trip['trip_led_id']).'">
                   	    		<div class="topcardride">';

                    if ($trip['user_profile_img']) {
                        $imgsrc = theme_profile_img($trip['user_profile_img']);
                    } else {
                        $imgsrc = theme_img('default.png');
                    }
                    
                    echo '<img class="cardride-userimg" src="'.$imgsrc.'">';
                    echo '<h3>'.$trip['user_first_name'] . ' ' . $trip['user_last_name'].'</h3>';

                    echo '  </div>
                            <div class="botcardride">
                            	<div class="cardfrom"><img src="'.base_url('/').'spcp/images/icon-from.png">'.$source_str.'
                                </div>
                                <div class="cardto"><img src="'.base_url('/').'spcp/images/icon-to.png">'.$destination_str.'
                                </div>
                                <div class="cardline"> </div>';
                    
                    if ($trip['trip_casual_date'] != '') { 
                    $cardtime = date("d.m.Y", strtotime($trip['trip_casual_date']));
                    } else {
                    $cardtime = '';
                    }
                            $trip_depature_time = date('h:i a', strtotime($trip['trip_depature_time']));

                            echo '  <div class="cardtime"><img src="'.base_url('/').'spcp/images/icon-date.png">'.$cardtime.' <img src="'.base_url('/').'spcp/images/icon-time.png">'.$trip_depature_time.'</div>';
                             if ($g_tripcommlist[$i]['trip_unix_time']<(time()+$this->trip_model->redlinetime)) { 
                                //echo '<a class="adisabled" href="#">EXPIRED</a>';
                                echo '<a href="'.base_url('trip/tripdetails/' . $trip['trip_led_id']).'">EXPIRED</a>';
                            } else {
                                echo '<a href="'.base_url('trip/tripdetails/' . $trip['trip_led_id']).'">READ MORE</a>';
                            }


                    echo '      </div>
                            </div>
                        </div>';
                }
        
        } else {
                    $cardlink = "coloncard cardride link";
                    if ($comm[0]->comm_address==$g_tripcommlist[$i]['trip_destination']) {$directionclass = "tocomm";} else {$directionclass = "fromcomm";}
                    $cardlink .= ' '.$directionclass;                    
                    echo '<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 colon"> <div class="requestmark rq-'.$directionclass.'" title="request a journey"> </div>
                            <div class="'.$cardlink.'" rel="'.base_url('addtrip/form?commid='.$communityid.'&r='.$g_tripcommlist[$i]['trip_id']).'">
                                <div class="topcardride">';
                    if ($g_tripcommlist[$i]['user_profile_img']) {
                        $imgsrc = theme_profile_img($g_tripcommlist[$i]['user_profile_img']);
                    } else {
                        $imgsrc = theme_img('default.png');
                    }                                
                    echo '<img class="cardride-userimg" src="'.$imgsrc.'">';
                    echo '<h3>'.$g_tripcommlist[$i]['user_first_name'] . ' ' . $g_tripcommlist[$i]['user_last_name'].'</h3>';

                    $source = explode(',', $g_tripcommlist[$i]['trip_source']);
                    if (empty($source[0])) {
                        $source_str = $source[1];
                    } else {
                        $source_str = $source[0];
                    }
                    $destination = explode(',', $g_tripcommlist[$i]['trip_destination']);
                    if (empty($destination[0])) {
                        $destination_str = $destination[1];
                    } else {
                        $destination_str = $destination[0];
                    }                      
                    echo '  </div>
                            <div class="botcardride">
                                <div class="cardfrom"><img src="'.base_url('/').'spcp/images/icon-from.png">'.$source_str.'
                                </div>
                                <div class="cardto"><img src="'.base_url('/').'spcp/images/icon-to.png">'.$destination_str.'
                                </div>
                                <div class="cardline"> </div>';  
                    $cardtime = date("d.m.Y", $g_tripcommlist[$i]['trip_unix_time']);
                    $trip_depature_time = date('h:i a', $g_tripcommlist[$i]['trip_unix_time']);
                    echo '  <div class="cardtime"><img src="'.base_url('/').'spcp/images/icon-date.png">'.$cardtime.' <img src="'.base_url('/').'spcp/images/icon-time.png">'.$trip_depature_time.'</div>';

                     echo '<a href="'.base_url('addtrip/form?commid='.$communityid.'&r='.$g_tripcommlist[$i]['trip_id']).'">READ MORE</a>';
                     
                    echo '      </div>
                            </div>
                        </div>';                                
        }
    }



?>
        </div>
    </div>
</div>
<?php
    }
}
?>




<?php include('footer.php'); ?>
