<?php 

if (!$islogin) {
    redirect('login');
    die();
}

include('header.php');  

$communityid = $tripdetails['trip_community'];
include('title_community.php'); 

?>


<script type="text/javascript">

    var baseurl = "<?php print base_url(); ?>";
    function viewPopcontact(pmId)
    {

        if ($('#tripDate').val()) {
            $('#enquiry_' + pmId).addClass("adisabled"); 

             $('#enquiry_' + pmId).text('checking...');
             
            var pmQueryString = 'pmId=' + pmId + '&tripDate=' + $('#tripDate').val() + '&triplink=' + window.location.href + '&unixTime=' + <?php echo $tripdetails['trip_unix_time']?>;
            $.ajax({
                type: "POST",
                url: baseurl + "communication/sendenquiry/true",
                dataType: "json",
                data: pmQueryString,
                success: function (json) {
                    if (json.result == 1) {
                        $('#enquiry_' + pmId).text('Error - wrong journey!');                        
                        return false;
                    } else if (json.result == 2) {
                        $('#enquiry_' + pmId).text('Error - wrong enquiry!');                        
                        return false;
                    } else if (json.result == 3) {
                        $('#enquiry_' + pmId).text('Error - wrong money operation!');                        
                        return false;
                    } else if (json.result == 5) {
                        //$('#enquiry_' + pmId).text('Your request already sent');
                        location.reload();
                    }
                 // alert(json);  
                },
                error: function () {
    alert('A server error occurred. Please contact the administrator.'); 
}
            });
        } else {
            alert('please enter trip date');
            return false;
        }
    }



</script>



<script>
    var baseurl = "<?php print base_url(); ?>";
    $(document).ready(function () {

        $('.pop_login').click(function () {

            $.post('<?php echo site_url('trip/login_popup'); ?>/' + $(this).attr('rel'),
                    function (data) {
                        $('#loginformContainer').html(data).modal('show');
                        $('#loginformContainer .modal').show();
                    }
            );

        });

        $('.pop_login_form').click(function () {

            $.post('<?php echo site_url('trip/login_popup'); ?>/' + $(this).attr('rel'),
                    function (data) {
                        $('#pop_login_formformContainer').html(data).modal('show');
                        $('#pop_login_formformContainer .modal').show();
                    }
            );

        });


        $('.ask_questions').click(function () {

            $.post('<?php echo site_url('trip/ask_question'); ?>/' + $(this).attr('rel'),
                    function (data) {
                        $('#ask_questionsformContainer').html(data).modal('show');
                        $('#ask_questionsformContainer .modal').show();
                    }
            );

        });

    });
</script>


<?php 
//var_dump($tripdetails);
?>

<div class="container-fluid margintop40 mapbg">
    <div class="container">
        <div class="row padding20">
            <div class="cardfull cardfull-trip">

                <?php
                if ($comm[0]->comm_address==$tripdetails['source_leg']) {$directionclass = "cardfulltop-from";}
                else if ($comm[0]->comm_address==$tripdetails['destination']) {$directionclass = "cardfulltop-to";}
                else {$directionclass = "";}
                ?>

                <div class="cardfulltop <?php echo $directionclass; ?>">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop1">
                            <img src="<?php echo ($tripdetails['user_profile_img']) ? theme_profile_img($tripdetails['user_profile_img']) : theme_img('default.png'); ?>">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop2"> 
            <?php
                        echo '<span>'.$tripdetails['user_first_name'] . ' ' . $tripdetails['user_last_name'].'</span>';

                        echo '  <div class="margin5" title="'.$tripdetails['user_rating'].'">
                                    '.getRating($tripdetails['user_rating']).'
                                </div>';

                    if (!empty($tripdetails['user_dob'])) {                                                                    
                        $from = new DateTime($tripdetails['user_dob']);
                        $to = new DateTime('today');
                        echo 'Age: <span>'.$from->diff($to)->y.'</span>';                       
                    }

            ?>   
                                  
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop1">
                            <img src="<?php if (!empty($tripdetails['vechicle_logo'])) {
                            echo base_url('uploads/vehicle/thumbnails/' . $tripdetails['vechicle_logo']);
                        } else {
                            echo theme_img('no_car.png');
                        } ?>">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop2">    
                            Vehicle: <span><?= $tripdetails['vehicle_type'] ?></span>            
                        </div>

                    </div>
                    <div class="clear"> </div>
                </div>                    
                
                <div class="cardfullride">
                <?php
                    $trip_routes_str = "";
                    $colclass = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
                    $total_destination = $tripdetails['destination_leg'];
                    if($tripdetails['trip_routes']){
                        $trip_routes = explode('~',$tripdetails['trip_routes']);
                        array_shift($trip_routes);
                        array_pop($trip_routes);
                        //var_dump($trip_routes);
                        $trip_routes_str = '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 trip-routes">';
                        for($i=0;$i<sizeof($trip_routes);$i++) {
                            $trip_routes_strpre = str_replace('United Kingdom','UK',$trip_routes[$i]);
                            $trip_routes_strpre = str_replace(', London, UK','',$trip_routes_strpre);
                            $trip_routes_str .= '<div class=""><img src="'.base_url('/').'spcp/images/icon-dest.png"> '.$trip_routes_strpre.'</div>';
                        }
                        $trip_routes_str .= '</div>';
                        $colclass = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
                        $total_destination = $tripdetails['destination'];
                    }
                ?>                    
                    <div class="cfdiv <?= $colclass ?>">
                        From:
                        <div class="cardbold">
                            <?php 
                                echo '<img src="'.base_url('/').'spcp/images/icon-from.png"> '.str_replace('United Kingdom','UK',$tripdetails['source_leg']);
                            ?>
                        </div>
                    </div>
                <?= $trip_routes_str ?>
                    <div class="cfdiv <?= $colclass ?>">
                        To:
                        <div class="cardbold">
                            <?php 
                            echo '<img src="'.base_url('/').'spcp/images/icon-to.png"> '.str_replace('United Kingdom','UK',$total_destination); 
                            ?>
                        </div>
                    </div>                    
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>


                <div class="rowrec">
                    <div class="margin">
                        <div class="rowrec view-map"><?php
                            echo $map['js'];
                            echo $map['html'];
                            ?>
                            <div id="directionsDiv"></div>
                        </div>

                        <div class="hidden row margin0">
                            <div class="view-col1"><br>
                                <h4><?php echo lang('trip_detail'); ?> </h4><small class=""><?php echo lang('published_at'); ?> <?php echo date('d/m/Y', strtotime($tripdetails['trip_created_date'])); ?></small>
                            </div>
                        </div>
                        <div class="hidden rowrec line4">
                        </div>
                        <div class="hidden sea-city-city cs-blue-text padding10"> <b><?= $tripdetails['source_leg'] ?> 
                                <span> <img src="<?php echo theme_img('search-arrow-right-grey.png'); ?>"> </span>
                                <?= $tripdetails['destination_leg'] ?> </b> 
                        </div>
                        <div class="hidden rowrec line4"></div>
                    </div>
                </div>
                <div class="clear"> </div> 


                <div class="cardfulldep">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cfdiv">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Date:
                            <div class="cardbold"><?php echo date('d.m.Y', strtotime($tripdetails['trip_casual_date'])); ?></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Time:
                            <div class="cardbold"><?php echo $tripdetails['expected_time']; ?></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cfdiv">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Available Seat:
                            <div class="cardbold">
                            <?php

                                if ($tripdetails['trip_casual_date']) {
                                    $AvailableSeat = getAvailableSeat($tripdetails['trip_casual_date'], $tripdetails['trip_id']);
                                    echo $AvailableSeat;
                                } else {
                                    if ($journeyDate == '') {
                                        $journeyDate = date('d/m/Y', now());
                                    }
                                    $journeyFrequency = date('w', strtotime(str_replace('/', '-', $journeyDate)));
                                    $frequency = explode(',', str_replace('~', '', $tripdetails['trip_frequncy']));
                                    if (in_array($journeyFrequency, $frequency)) {
                                        $AvailableSeat = getAvailableSeat(date('Y-m-d', strtotime(str_replace('/', '-', $journeyDate))), $tripdetails['trip_id']);
                                        echo $AvailableSeat;
                                    } else {
                                        $AvailableSeat = 0;
                                        echo '0';
                                        }
                                    }

                                echo ' <span>of '.$tripdetails['trip_avilable_seat'].'</span>';
                            ?>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">Points:
                            <div class="cardbold">
                        <?php
                            echo $money_for_journey.' <span>per ride</span>';
                        ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cfdiv">
                        Your Points:
                        <div class="trippoints">
                        <?php
                            if (!isset($usermoney[0]['money_count'])) {redirect('community');}
                            $aftertripmoney = $usermoney[0]['money_count'] - $money_for_journey;
                            if ($aftertripmoney >= 0) {
                                echo '<img src="'.base_url('/').'spcp/images/icon-coin.png"> '.$usermoney[0]['money_count'].' -  '.$money_for_journey.' = <img src="'.base_url('/').'spcp/images/icon-coin.png"> '.$aftertripmoney;
                            } else {
                                echo '<img src="'.base_url('/').'spcp/images/icon-coin.png"> '.$usermoney[0]['money_count'].' -  '.$money_for_journey;
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="clear"> </div>
                <div>
                    

            <?php

                //var_dump($tripdetails);
                //echo '<hr>'.gmdate("Y-m-d H:i:s", $tripdetails['trip_unix_time']).' ___ now: '.gmdate("Y-m-d H:i:s", strtotime("now")).'<hr>';
            $tripstr = '';


            if ($tripdetails['trip_unix_time']<time()) {  // EXPIRED
                $tripstr = '<h3 class="center">COMPLETED</h3>';
                if ($already && $already!=2) {  //  2 - payed
                    $tripstr .= '<a name="confirm"></a><div class="margin" ><a class="bookbtn alinkbtn" href="'.base_url('trip/tripconfirm/'.$linkledid).'" > Confirm Journey </a></div>';
                } 
            }
            else 
            {


            
                
                if ($tripdetails['trip_user_id'] == $user['user_id']) {
                        $tripstr = '<p class="row"> Your Trip </p>';
                } 
                else
                {

                   /* if ((($tripdetails['trip_casual_date'] && ($tripdetails['trip_casual_date'] >= date('Y/m/d'))) || $tripdetails['trip_frequncy'])) {

                        if ($this->config->item('payment_status') == 'enquiry' || $this->config->item('payment_status') == 'both') {*/

                            if ($already) {
                                if ($already==2) {
                                    $tripstr = '<p class="row">COMPLETED</p>
                                    ';
                                } else {
                                    $tripstr = '<p class="row"> Your request already sent. <br>A Sparrow will be in touch to organise your journey.</p>
                                    ';
                                }
                            } 
                            else  if ($AvailableSeat <= 0) {
                                $tripstr = '<p class="row">Sorry, not enough seats</p>';
                            } 
                            else if ($status == 1) 
                            {
                                if ($tripdetails['trip_casual_date']) {
                                    
                                    if (!isset($usermoney[0]['money_count'])) {redirect('community');}
                                    $aftertripmoney = $usermoney[0]['money_count'] - $money_for_journey;
                                    if ($aftertripmoney >= 0) {
                                        $tripstr = '<input type="hidden" name="tripDate" id="tripDate" value="'.date("d/m/Y", strtotime($tripdetails["trip_casual_date"])).'"/>
                                        <div class="" >
                                            <a class="bookbtn alinkbtn" href="javascript:void(0)" id="enquiry_'.$tripdetails["trip_id"].'" onclick="viewPopcontact('.$tripdetails['trip_id'].')">Select Journey</a> 
                                        </div>';
                                    } else {
                                        $tripstr =  '<p class="marginbot20">Sorry, you don&#39;t have enough points.<br>
                                            You can purchase points <a href="'.base_url('payments').'">here</a>.
                                            </p>';
                                    } 
                                    


                                } else { 
                                    /* ?>
                                        <p class="hidden Booking-info u-gray"><?php echo lang('for_enquiry'); ?></p>
                                        <div class="rowrec line4"></div>
                                        <div class="date">
                                        <input type="text" name="tripDate" id="tripDate" value="<?= $journeyDate ?>"/>
                                        </div>
                                        <div class="rowrec line4"></div>
                                        <div class="" >
                                        <a class="bookbtn alinkbtn" href="javascript:void(0)"  id="enquiry_<?= $tripdetails['trip_id'] ?>"onclick="viewPopcontact(<?= $tripdetails['trip_id'] ?>)"><?php echo lang('get_enquiry'); ?></a>
                                        </div>

                                    <?php */    
                                    $tripstr = "(Coming soon)";
                                }
                            } else {
                               /* ?>
                                    <p class="hidden Booking-info u-gray"><?php echo lang('for_enquiry'); ?></p>
                                    <div class="Booking-requestButton Button Button--large u-blue-bg js-link" >
                                        <a href="javascript:void(0)">  <?php echo lang('already'); ?> </a>
                                    </div>    


                            <?php */
                                  $tripstr = "NOT READY";  
                            }
    /*
                        } 
                 } */
                } 
            }
                ?>

                <div class="Booking-request Block-sec center">
                    <?php echo $tripstr; ?>
                </div>



                </div>
             </div>
        </div>
    </div>
</div>
 <?php include('footer.php'); ?>
