<?php include('header.php'); ?>
<?php echo theme_css('font-awesome.css', true) ?>

<script type="text/javascript">

    var baseurl = "<?php print base_url(); ?>";
    function viewPopcontact(pmId)
    {

        if ($('#tripDate').val()) {
            var pmQueryString = 'pmId=' + pmId + '&tripDate=' + $('#tripDate').val();
            $.ajax({
                type: "POST",
                url: baseurl + "communication/sendenquiry/true",
                dataType: "json",
                data: pmQueryString,
                success: function (json) {

                    if (json.result == 0) {
                        $('#enquiry_' + pmId).addClass(".book-active-success");
                        $('#enquiry_' + pmId).removeClass("book-button");
                        $('#enquiry_' + pmId).text('Your request already sent. You may call if required')
                        
                        return false;

                    } else if (json.result == 1) {
                        $('#enquiry_' + pmId).addClass(".book-active-success");
                        $('#enquiry_' + pmId).removeClass("book-button");
                        $('#enquiry_' + pmId).text('Your Enquiry has been submitted successfully!');
                        location.reload();
                    }
                 // alert(json);  
                },
                error: function () {
    alert('error');
}
            });
        } else {
            alert('please enter trip date');
            return false;
        }
    }
    function bookSeat(pmId)
    {

        if ($('#tripBookDate').val()) {
            var pmQueryString = 'tripId=' + pmId + '&tripDate=' + $('#tripBookDate').val();
            $.ajax({
                type: "POST",
                url: baseurl + "trip/readyBooking/true",
                dataType: "json",
                data: pmQueryString,
                success: function (json) {
                    if (json.result == 1) {
                        window.location = baseurl + 'trip/book'
                    }
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

<?= theme_js('rate.js', true) ?>

<div class="container-fluid margintop20">
    <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3 padding0"> </div>
          <div class="col-lg-6 col-md-6 col-sm-6 padding0">

            <!-- Trip Start -->
            <div class="" style="border: 0px #00f solid;">                
                            <div class="center upper bold margin0">Trip details</div>
                            <div class="rowrec tripinfo margin">
                                <div class="center">
                               <img class="u-rounded" src="<?php echo ($tripdetails['user_profile_img']) ? theme_profile_img($tripdetails['user_profile_img']) : theme_img('default.png'); ?>"s aria-hidden="true" height="36" width="36"> 

                                <span class="bold"><?= $tripdetails['user_first_name'] . ' ' . $tripdetails['user_last_name'] ?></span> <p class="size14 margin5">is offering a ride</p>
                                <div class="line44"> </div>
                                </div>
                                


                                                    <div class="row center">
                                                        <div class="colmd6">
                                                                From :<br>
                                                                <span class="size16"><span><img src="<?php echo theme_img('cal-14-14.png'); ?>"></span> <span class="bold"><?= $tripdetails['source_leg'] ?></span>
                                                                </span><br><br>Departure:<br>
                                                                 <span class="bold size16">
                                                             <?php if ($tripdetails['trip_casual_date']) {    
                                                                 echo date('d/m/Y', strtotime($tripdetails['trip_casual_date'])).' - ';
                                                              } 
                                                                echo $tripdetails['expected_time'];
                                                              ?> 
                                                                </span>
                                                        </div>
                                                        <div class="colmd6 noborder">
                                                            To :<br>
                                                            <span class="size16 bold"><?php
                                                            echo $tripdetails['destination_leg']; 

                                                            $communityid = $tripdetails['trip_community'];
                                                            $comm = $this->community_model->get_community($communityid);
                                                            echo '<br> <a href="'.base_url('community').'/'.$comm[0]->comm_slug.'"><img style="height: 40px; width: auto; margin-top: 8px;" src="'.base_url('/').'spcp/images/'.$comm[0]->comm_image.'"></a>';
/*                                                               
                                                               echo '
                                                               
                                                            <div class="selcomlist margin0 padding0">
                                                              <div class="commprofile1 comm'.$comm[0]->comm_id.'">
                                                                <img src="'.base_url('/').'spcp/images/'.$comm[0]->comm_image.'">
                                                              </div>                        
                                                              <div class="commprofile2 comm'.$comm[0]->comm_id.'">
                                                                <p><strong>'.$comm[0]->comm_name.'</strong></p>
                                                                '.$comm[0]->comm_address.'
                                                              </div>
                                                              <div class="clear"> </div>
                                                            </div>'; 
*/

                                                            ?></span>
                                                        </div><div class="clear"> </div>
                                                    </div>
                        
                            </div>

                <div class="share-post hidden">
                    <ul>
                        <li><a href="javascript:void(0)" class="twitter share-tooltip share-tooltip-top social_icon" rel="nofollow" data_action="twitter"><i class="fa fa-twitter"></i>Twitter</a></li>
                        <li><a href="javascript:void(0)" class="facebook share-tooltip share-tooltip-top social_icon" rel="nofollow" data_action="facebook"><i class="fa fa-facebook" data_action="facebook"></i>Facebook</a></li>
                        <li><a href="javascript:void(0)" class="gplus share-tooltip share-tooltip-top social_icon"  rel="nofollow"  data_action="google"><i class="fa fa-google-plus"></i>Google</a></li>
                        <li><a href="javascript:void(0)" class="tumblr share-tooltip share-tooltip-top social_icon" rel="nofollow" data_action="tumblr"><i class="fa fa-tumblr"></i>Tumblr</a></li>
                        <li><a href="javascript:void(0)" class="pinterest share-tooltip share-tooltip-top social_icon" rel="nofollow"  data_action="pinterest"><i class="fa fa-pinterest"></i>Pinterest</a></li>
                    </ul>
                </div>

                <div class="rowrec">
                    <div class="margin">

                        <div class="rowrec view-map"><?php
                            echo $map['js'];
                            echo $map['html'];
                            ?>
                            <div id="directionsDiv"></div></div>

                        <div class="hidden row margin0">
                            <div class="view-col1"><br>
                                <h4><?php echo lang('trip_detail'); ?> </h4><small class=""><?php echo lang('published_at'); ?> <?php echo date('d/m/Y', strtotime($tripdetails['trip_created_date'])); ?></small>
                            </div>

                        </div>
                        <div class="hidden rowrec line4"></div>



                        <div class="hidden sea-city-city cs-blue-text padding10"> <b><?= $tripdetails['source_leg'] ?> 
                                <span> <img src="<?php echo theme_img('search-arrow-right-grey.png'); ?>"> </span>
                                <?= $tripdetails['destination_leg'] ?> </b> </div>

                        <div class="hidden rowrec line4"></div>


                    </div></div>



            <div class="clear"> </div>    
            </div>
            
            <!-- Trip End -->

            <!-- Order Start --> 
            <div class="" style="border: 0px #0f0 solid;">	

                                                    <div class="hidden rowrec trp-top padding10">
                                                        <strong class="cs-blue-text"><?= $tripdetails['user_first_name'] . ' ' . $tripdetails['user_last_name'] ?></strong> <span><?php echo lang('offer'); ?> </span>
                                                        <h4 class="paddingtop10 cs-blue-text">
                                                            <?php
                                                            $source = explode(",", $tripdetails['source_leg']);
                                                            echo $source[0];
                                                            ?>  <span class="paddinglr10"> <img src="<?php echo theme_img('search-arrow-right-grey.png'); ?>"> </span>
                                                            <?php
                                                            $destination = explode(",", $tripdetails['destination_leg']);
                                                            echo $destination[0];
                                                            ?>
                                                        </h4>
                                                    </div>

                                                    <div class="hidden rowrec line4"></div>

                                                    <div class="hidden padding10">          
                                                        <h3 class="size22">  <?php echo lang('total_no_seats'); ?> <?= $tripdetails['trip_avilable_seat'] ?></h3><br>
                                                        <h3 class="size22"> <?php echo lang('passenger_type'); ?> 
                                                            <?php if ($tripdetails['passenger_type'] == '1') { ?>
                                                                <?php echo lang('female_only'); ?>
                                                            <?php } ?>
                                                            <?php if ($tripdetails['passenger_type'] == '2') { ?>
                                                                <?php echo lang('male_only'); ?>
                                                            <?php } ?> 
                                                            <?php if ($tripdetails['passenger_type'] == '3') { ?>
                                                                <?php echo lang('both'); ?>
                                                            <?php } ?>
                                                            <?php if ($tripdetails['passenger_type'] == '0') { ?>
                                                                <?php echo lang('both'); ?>
                                                            <?php } ?>
                                                            <?php if ($tripdetails['passenger_type'] == '') { ?>
                                                                <?php echo lang('both'); ?>
                                                            <?php } ?>   

                                                        </h3>
                                                    </div> 

                                                    <div class="hidden rowrec line4"></div>

                                                    <div class="hidden row">
                                                        <?php if ($tripdetails['trip_casual_date']) { ?>
                                                            <div class="colmd6">
                                                                <?php echo lang('departure_date'); ?><br>
                                                                <span class="size20"><span><img src="<?php echo theme_img('cal-14-14.png'); ?>"></span> <?php echo date('d/m/Y', strtotime($tripdetails['trip_casual_date'])); ?>
                                                                </span><br>
                                                                <small> <?php echo date('M', strtotime($tripdetails['trip_casual_date'])); ?> </small>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="colmd6 noborder">
                                                            <?php echo lang('departure_time'); ?><br>
                                                            <span class="size20"><span><img src="<?php echo theme_img('time-ico.png'); ?>"></span> <?= $tripdetails['expected_time'] ?>
                                                            </span><br>
                                                        </div>
                                                    </div>


                                                    <div class="hidden rowrec line4"></div>

                                                    <div class="Booking Booking--green Block1 margin">
                                                        
                                                        <div class="u-table">
                                                            <div class="Booking-details Block-section Block-section--adjacent u-cell">
                                                                Points: 
                                                                <span class="Booking-price u-block">
                                                                    3
                                                                </span>
                                                                <?php //echo lang('per_passenger'); ?>per ride
                                                            </div>
                                                            <div class="Booking-details Block-section Block-section--adjacent u-cell">
                                                                <?php echo lang('available_seat'); ?>
                                                                <span class="Booking-price u-block">
                                                                    
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
                                                                        //echo"L";
                                                                        ?>  
                                                                </span>  </div>
                                                        </div>
                                                        <?php

                                                        if ((($tripdetails['trip_casual_date'] && ($tripdetails['trip_casual_date'] >= date('Y/m/d'))) || $tripdetails['trip_frequncy']) && $AvailableSeat > 0) {

                                                            if ($tripdetails['route_rate']) {

                                                                if ($this->config->item('payment_status') == 'payment' || $this->config->item('payment_status') == 'both') {
                                                                    ?>
                                                                    <?php
                                                                    if ($islogin) {
                                                                        if ($tripdetails['trip_user_id'] == $user['user_id']) {
                                                                            ?>
                                                                                                  <div class="Booking-request Block-section u-lightestGray-bg">
                                                                                                        <p class="Booking-info u-gray">For Book</p>
                                                                        
                                                                                                        <div class="Booking-requestButton Button Button--large u-yellow-bg js-link" >
                                                                                                            <a href="#">Book now</a>
                                                                                                        </div>
                                                                                                    </div>
                                                                            <?php
                                                                        } else if ($paymentStatus == 1) {
                                                                            if ($tripdetails['trip_casual_date']) {
                                                                                ?>
                                                                                <div class="Booking-request Block-section u-lightestGray-bg">
                                                                                    <p class="Booking-info u-gray"><?php echo lang('for_book'); ?></p>

                                                                                    <div class="Booking-requestButton Button Button--large u-yellow-bg js-link" >
                                                                                        <input type="hidden" name="tripBookDate" id="tripBookDate" value="<?= date('d/m/Y', strtotime($tripdetails['trip_casual_date'])); ?>"/> 
                                                                                        <a href="javascript:void(0)" id="book_<?= $tripdetails['trip_led_id'] ?>"onclick="bookSeat(<?= $tripdetails['trip_led_id'] ?>)"><?php echo lang('book_now'); ?></a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="Booking-request Block-section u-lightestGray-bg">
                                                                                    <p class="Booking-info u-gray"><?php echo lang('for_book'); ?></p>
                                                                                    <div class="rowrec line4"></div>
                                                                                    <div class="date">
                                                                                        <input type="text" name="tripBookDate" id="tripBookDate" value="<?= $journeyDate ?>"/>
                                                                                    </div>
                                                                                    <div class="rowrec line4"></div>
                                                                                    <div class="Booking-requestButton Button Button--large u-yellow-bg js-link" >
                                                                                        <a href="javascript:void(0)" id="book_<?= $tripdetails['trip_led_id'] ?>"onclick="bookSeat(<?= $tripdetails['trip_led_id'] ?>)"><?php echo lang('book_now'); ?></a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>    
                                                                        <?php } else { ?>
                                                                            <div class="Booking-request Block-section u-lightestGray-bg">
                                                                                <p class="Booking-info u-gray"><?php echo lang('for_book'); ?></p>

                                                                                <div class="Booking-requestButton Button Button--large u-yellow-bg js-link" >
                                                                                    <a href="javascript:void(0)"><?php echo lang('already_booked'); ?></a>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <div class="Booking-request Block-section u-lightestGray-bg">
                                                                            <p class="Booking-info u-gray"><?php echo lang('for_book'); ?></p>

                                                                            <div class="Booking-requestButton Button Button--large u-yellow-bg js-link" >
                                                                                <a href="javascript:void(0);" class="pop_login_form"><?php echo lang('book_now'); ?></a>
                                    <!--                                            <a href="<?= base_url('login') ?>"><?php echo lang('book_now'); ?></a>-->
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                        <?php } ?>        
                                                    </div>

                                                    <?php

                                                    if ((($tripdetails['trip_casual_date'] && ($tripdetails['trip_casual_date'] >= date('Y/m/d'))) || $tripdetails['trip_frequncy']) && $AvailableSeat > 0) {

                                                        if ($this->config->item('payment_status') == 'enquiry' || $this->config->item('payment_status') == 'both') {
                                                            ?>
                                                            <div class="Booking-request Block-sec center">                    

                                                                <?php

                                                                if ($islogin) {

                                                                    if ($tripdetails['trip_user_id'] == $user['user_id']) {
                                                                        ?>
                                                                       <p class="padding10 row">  <?php echo lang('your_trip'); ?> </p>

                                                                        <?php
                                                                    } else if ($status == 1) {
                                                                        if ($tripdetails['trip_casual_date']) {
                                                                            ?>
                                                                            <p class="hidden Booking-info u-gray"><?php echo lang('for_enquiry'); ?></p>
                                                                            <input type="hidden" name="tripDate" id="tripDate" value="<?= date('d/m/Y', strtotime($tripdetails['trip_casual_date'])); ?>"/>
                                                                            <div class="" >
                                                                                <a class="bookbtn alinkbtn" href="javascript:void(0)" id="enquiry_<?= $tripdetails['trip_id'] ?>"onclick="viewPopcontact(<?= $tripdetails['trip_id'] ?>)"><?php echo lang('get_enquiry'); ?></a> 
                                                                            </div>

                                                                        <?php } else { ?>
                                                                            <p class="hidden Booking-info u-gray"><?php echo lang('for_enquiry'); ?></p>
                                                                            <div class="rowrec line4"></div>
                                                                            <div class="date">
                                                                                <input type="text" name="tripDate" id="tripDate" value="<?= $journeyDate ?>"/>
                                                                            </div>
                                                                            <div class="rowrec line4"></div>
                                                                            <div class="" >
                                                                                <a class="bookbtn alinkbtn" href="javascript:void(0)"  id="enquiry_<?= $tripdetails['trip_id'] ?>"onclick="viewPopcontact(<?= $tripdetails['trip_id'] ?>)"><?php echo lang('get_enquiry'); ?></a>
                                                                            </div>


                                                                            <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <p class="hidden Booking-info u-gray"><?php echo lang('for_enquiry'); ?></p>
                                                                        <div class="Booking-requestButton Button Button--large u-blue-bg js-link" >
                                                                            <a href="javascript:void(0)">  <?php echo lang('already'); ?> </a>
                                                                        </div>    


                                                                        <?php
                                                                    }
                                                                } else {
                                                                    ?>
                                                                    <p class="hidden Booking-info u-gray"><?php echo lang('for_enquiry'); ?></p>
                                                                    <div class="Booking-requestButton Button Button--large u-blue-bg js-link" >
                                                                    <a href="javascript:void(0);" class="pop_login"><?php echo lang('get_enquiry'); ?></a>
                                    <!--  <a href="<?= base_url('login') ?>"> <?php echo lang('get_enquiry'); ?> </a> -->
                                                                    </div>

                                                                    <?php
                                                                }
                                                                ?>

                                                            </div>

                                                        <?php } ?>
                                                    <?php } ?>



                <div class="trip-lft margintop40" style=" width: 100%">

                    <div class="RideDetails-comment">
                        <div class="Speech">
                            <div class="Speech-memberPhoto">
                                <img class="u-rounded" src="<?php echo ($tripdetails['user_profile_img']) ? theme_profile_img($tripdetails['user_profile_img']) : theme_img('default.png'); ?>"s aria-hidden="true" height="36" width="36">
                            </div>
                            <div class="Speech-content showmore">
                                <h3 class="RideDetails-commentUsername"><?= $tripdetails['user_first_name'] . ' ' . $tripdetails['user_last_name'] ?></h3>
                                <?= $tripdetails['trip_comments'] ?>

                                <p  class="ask-trip"style=" margin-left: 84%;">
                                    <input type="button" name="ask_questions" class="ask_questions" rel="<?php echo $tripdetails['trip_led_id'] ?>"  value="<?php echo lang('ask_question'); ?>" /> </p>

                            </div>
                        </div>
                    </div>
                    <?php if ($feedback) { ?>
                        <div class="comments-content">
                            <div id="comment-holder"><br>
                                <b><h4><?php echo lang('passengers_comments'); ?></h4></b><br>
                                <?php foreach ($feedback as $value) { ?>  
                                    <div id="bc_0_96C" >                                    
                                        <div id="bc_0_96CT">
                                            <div id="bc_0_95T" class="comment-thread">
                                                <ol id="bc_0_95TB">                                                
                                                    <li id="bc_0_0B" class="comment">                                                   


                                                        <div class="avatar-image-container">
                                                            <img src="<?= theme_profile_img($value->user_profile_img) ?>">
                                                        </div>
                                                        <div id="c7016086569795689367" class="comment-block"><div id="bc_0_0M" class="comment-header" >

                                                                <cite class="user"><a rel="nofollow" href="#"><?php echo $value->name; ?></a></cite>
                                                                <span class="icon user"></span><span class="datetime secondary-text">
                                                                    <a rel="nofollow" href="#"><?php echo date("d-m-Y", strtotime($value->create_date)); ?></a></span></div>
                                                            <p id="bc_0_0MC" class="comment-content"><?php echo $value->feedback; ?></p>                                                   

                                                            <span id="bc_0_0MN" class="comment-actions secondary-text">
                                                                <a  href="#" ></a>
                                                                <span class="item-control blog-admin pid-341383209">
                                                                    <a  href="#">Delete</a></span></span></div></div>

                                                        </div></div>
                                                    <?php } ?>
                                                    </div></div>

                                                <?php } ?>

                </div>
                <div class="clear"> </div>                                                    <!-- End Right -->
                
            </div>
            
            <!-- Order End -->                                    

            <!-- Person Start -->
            <div class="margin" style="border: px #f00 solid;">
                                                    <div class="rowrec line4"></div>
                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> <span> <img src="<?php echo theme_img('driver-ico.png'); ?>"> </span> <?php echo lang('driver'); ?> </h3>

                                                    <div class="rowrec line4" style=" margin-top: 6px;"></div>

                                                    <div class="rowrec">

                                                        <div class="fleft paddingright10">
                                                            <a href="javascript:void(0)"> 
                                                                <img src="<?php echo ($tripdetails['user_profile_img']) ? theme_profile_img($tripdetails['user_profile_img']) : theme_img('default.png'); ?>" class="search-thumb search-user-thumb"> </a>
                                                        </div>
                                                        <div class="fleft paddingtop10">
                                                            <strong class="size16">
                                                                <a href="<?= base_url('trip/public_profile/' . $tripdetails['trip_user_id']); ?> " class="cs-blue-text"><?= $tripdetails['user_first_name'] . ' ' . $tripdetails['user_last_name'] ?></a>
                                                            </strong><br>

                                                            <small class="size13" > 

                                                                <?php


                                                                if (!empty($tripdetails['user_dob'])) {
                                                                    echo lang('dob') . ':' . date("d-m-Y", strtotime($tripdetails['user_dob']));
                                                                } else {
                                                                    echo lang('user_is_not_specified');
                                                                }
                                                                ?>
                                                            </small><br>
                                                            <small class="size14" >
                                                                <?php echo lang('age'); ?>:                                                                
                                                                <?php
                                                                if (!empty($tripdetails['user_dob'])) {                                                                    
                                                                    $from = new DateTime($tripdetails['user_dob']);
                                                                    $to = new DateTime('today');
                                                                    echo $from->diff($to)->y;
                                                                } else {
                                                                    echo lang('user_is_not_specified');
                                                                }
                                                                ?>
                                                            </small>

                                                            <span class="rowrec size14"> 
                                                                <span class="fleft"> <?php echo lang('ratings'); ?>: </span>
                                                                <div class="starrow fleft marginleft10">
                                                                    <script>rate(<?= getOverallRating($tripdetails['trip_user_id']) ?>);</script>                
                                                                </div>
                                                            </span>                                                            
                                                        </div>
                                                        


                                                    </div>
                                                   
                                                    <div class="rowrec line4"></div>
                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> 
                                                        <span>
                                                            <img src="<?php echo theme_img('suitcase-ico.png'); ?>">
                                                            <?php echo lang('id_proof'); ?> 
                                                        </span>
                                                    </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;"></div>

                                                    <span class="trp-imge paddingtop5"><i class="fa fa-credit-card" aria-hidden="true" style=" color: #01acf1;"></i></span> <strong class="size14 paddingleft8"><?php echo $tripdetails['licence_number'] ?> </strong>

                                                    <div class="rowrec line4" style=" margin-top: 6px;"></div>

                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> 
                                                        <span> 
                                                            <img src="<?php echo theme_img('suitcase-ico.png'); ?>"> 
                                                        </span> 
                                                        <?php echo lang('trip_allowed_settings'); ?>                                                         
                                                    </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;"></div>

                                                    <ul class="rowrec trp-cont-rht">
                                                        
                                                            
                                                            
                                                    <?php  $comport =  explode(',',$tripdetails['comport_level']); ?> 
                                                    <?php foreach($comport_levels as $clevel){?> 
                                                      
                                                    <li>    
                                                        <?php if (in_array($clevel->comport_id,$comport)) {?>  
                                                            <?php  $img  =  comportImg($clevel->comport_id); ?>
                                                    <img src="<?= theme_comport_img($img, 'small') ?>" style="padding:0px 8px;" />
                                                    <?php if($clevel->comport_level != 'Show Phone Number'){ ?>
                                                    <?php echo $clevel->comport_level; ?>
                                                    <?php } ?>
                                                    <?php if($clevel->comport_level == 'Show Phone Number'){ ?>
                                                    <?php echo lang('verified_phone_number') ?>
                                                    <?php } ?>
                                                        <?php } ?>
                                                    </li>
                                                   <?php  } ?>
                                                       
                                                    </ul>


                                                    <div class="rowrec line4"></div>

                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> <span> <img src="<?php echo theme_img('suitcase-ico.png'); ?>"> </span> <?php echo lang('activity'); ?> </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;"></div>

                                                    <ul class="size14 row trp-cont-rht">           
                                                        <li><span class="trp-imge paddingtop5"><img src="<?php echo theme_img('cal-14-14.png'); ?>" width="12" height="12"></span> <strong class="paddingleft8"><?php echo lang('since'); ?></strong>: <?php echo date('d/m/Y', strtotime($tripdetails['user_created_date'])); ?></li>
                                                        <li><span class="trp-imge paddingtop5"><img src="<?php echo theme_img('time-ico.png'); ?>"></span> <strong class="paddingleft8"><?php echo lang('last_visit'); ?></strong>: <?php echo date('d/m/Y', strtotime($tripdetails['user_lost_login'])); ?></li>

                                                    </ul>

                                                    <div class="rowrec line4"></div>

                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> <span> <img src="<?php echo theme_img('suitcase-ico.png'); ?>"> </span> <?php echo lang('car'); ?> </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;" ></div>

                                                    <div class="rowrec center">
                                                        <span class=" rowrec cs-blue-text"><b><?php echo lang('car_type'); ?> : <?= $tripdetails['vechicle_type_name'] ?></b><br>
                                                            <b><?php echo lang('car_comfort'); ?> : 

                                                                <?php if ($tripdetails['vechiclecomfort'] == '1') { ?>
                                                                    <?php echo lang('normal'); ?>
                                                                <?php } ?>
                                                                <?php if ($tripdetails['vechiclecomfort'] == '2') { ?>
                                                                    <?php echo lang('basic'); ?>
                                                                <?php } ?>
                                                                <?php if ($tripdetails['vechiclecomfort'] == '3') { ?>
                                                                    <?php echo lang('comfortable') ?>
                                                                <?php } ?>
                                                                <?php if ($tripdetails['vechiclecomfort'] == '4') { ?>
                                                                    <?php echo lang('luxury'); ?>
                                                                <?php } ?></b></span>

                                                        <img class="search-thumb search-user-thumb " style="margin: 15px 0 15px 7px;" src="<?php
                                                        if (!empty($tripdetails['vechicle_logo'])) {
                                                            echo base_url('uploads/vehicle/thumbnails/' . $tripdetails['vechicle_logo']);
                                                        } else {
                                                            echo theme_img('no_car.png');
                                                        }
                                                        ?>">

                                                    </div>
                                                
                <div class="clear"> </div>
            </div>
            
            <!-- Person End -->
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 padding0"> </div>                                        
        </div>
    </div>
</div>
                                                <div id="loginformContainer"></div>
                                                <div id="pop_login_formformContainer"></div>
                                                <div id="ask_questionsformContainer"></div>
                                                <link rel="stylesheet" type="text/css" href="<?php echo theme_js('jquery.datepick/redmond.datepick.css'); ?>">

                                                <?php echo theme_js('jquery.datepick/jquery.plugin.js', true); ?> 
                                                <?php echo theme_js('jquery.datepick/jquery.datepick.js', true); ?>
                                                <script type="text/javascript">
                                                    $('#tripDate').datepick({
                                                        changeMonth: false, autoSize: true, minDate: 0, dateFormat: 'dd/mm/yyyy'
                                                    });

                                                    $('#tripBookDate').datepick({
                                                        changeMonth: false, autoSize: true, minDate: 0, dateFormat: 'dd/mm/yyyy'
                                                    });




                                                    var baseurl = "<?php print base_url(); ?>";
                                                    $(document).ready(function () {

                                                        /* Slider Expand Click */
                                                        $('body').on("click", '.social_icon', function ()
                                                        {
                                                            var action = $(this).attr("data_action");
                                                            var url = window.location.href;
                                                            if (action == 'facebook') {
                                                                window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, '_blank');
                                                            }
                                                            if (action == 'twitter') {
                                                                window.open("https://twitter.com/intent/tweet?url=" + url, '_blank');
                                                            }
                                                            if (action == 'google') {
                                                                window.open("https://plus.google.com/share?url=" + url, '_blank');
                                                            }
                                                            if (action == 'tumblr') {
                                                                window.open("http://www.tumblr.com/share=" + url, '_blank');
                                                            }
                                                            if (action == 'pinterest') {
                                                                window.open("http://pinterest.com/pin/create/button/?url=" + url, '_blank');
                                                            }
                                                        });
                                                    });

                                                </script>
                                                <?php include('footer.php'); ?>
