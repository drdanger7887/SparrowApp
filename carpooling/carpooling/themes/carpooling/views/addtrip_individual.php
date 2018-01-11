<?php include('header.php'); 
include('title_community.php');


    $attrdest = '';
    $attrsource = '';
    $attrdate = '';
    if ($comm[0]->comm_location != "" && $destination_ids=="") {
        $destination_ids = $comm[0]->comm_location;
    }
    if ($comm[0]->comm_address != "" && $txtdestination=="") {
        $txtdestination = $comm[0]->comm_address;
    }

    if ($txtdestination != "") {
        $attrdest = 'readonly ';
    }    
    if ($txtsource != "") {
        $attrsource = 'readonly ';
    }
    if ($rpt_from_date!="") {
        $attrdate = 'readonly ';
    }

    $classcardfull='cardfulltop-to';
    if ($comm[0]->comm_address == $txtsource) {$classcardfull='cardfulltop-from';}

?>

<script type="text/javascript" src="<?php echo theme_js('travel-details-rules.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('jquery.datepick/redmond.datepick.css'); ?>"> 
<?php 
    if (!isset($request)) {
        echo theme_js('jquery.datepick/jquery.plugin.js', true);
        echo theme_js('jquery.datepick/jquery.datepick.js', true); 
    }
?>

<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<script>
    $(document).ready(function () {

<?php  if ($rpt_from_date=="") {  ?>
        $('#rpt_from_date').datepick({
            changeMonth: false, autoSize: true, minDate: 0, dateFormat: 'dd/mm/yyyy'});
<?php  } ?>

        change_trip(1);
<?php if ($return == 'yes') { ?>
            change_trip(2);
<?php } ?>

        $('#tzone').attr('selectedIndex', 0);


<?php if ($rpt_from_date == '') { ?>
            $('#regu').attr('checked', false);
            $('#casu').attr('checked', true);
            change_type(2);
<?php } else { ?>
           // $('#regu').attr('checked', true);
           // $('#casu').attr('checked', false);
           // change_type(1);
<?php } ?>
        $('#<?= $return ?>').attr('checked', true);
        var initValues = <?= $frequency_values ?>;
        $('#frmtrip').find(':checkbox[name^="frequency[]"]').each(function () {
            $(this).attr("checked", ($.inArray($(this).val(), initValues) != -1));
        });
<?php


//lets have the flashdata overright "$message" if it exists
if ($this->session->flashdata('message')) {
    $message = $this->session->flashdata('message');
    ?>
            $.goNotification('<?= $message ?>', {
                type: 'success', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
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
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
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
                timeout: 200000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}
?>



    });

</script>
<?php echo theme_css('jquery.tagbox.css', true); ?>
<?php echo theme_js('jquery.tagbox.js', true); ?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>

<script type="text/javascript">
<?php                    
      echo 'var commslug = "'.$comm[0]->comm_slug.'";';
?>

    var configcountry = "<?php print ($this->config->item('country_code') != '') ? $this->config->item('country_code') : ''; ?>";   
    var expcountry = configcountry.split(",");
</script>
<?php if ($this->config->item('google_api_key') != '') { ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('google_api_key'); ?>&libraries=places&language=en"></script>
<?php } ?>
<?php if ($this->config->item('google_api_key') == '') { ?>
    <script src="https://maps.googleapis.com/maps/api/js?&libraries=places&language=en"></script>
<?php } ?>

<?php echo theme_js('trip.js', true); ?>




<div class="container-fluid margintop40 mapbg tripform">
    <div class="container posrelative"> 
        <?php 
            if ($this->input->get('r', true)) {
                echo '<div id="requestmark" class="requestmark rq-'.$classcardfull.'" title="request a journey"> </div>';
            }
        ?>
        <div class="row padding20">
            <div class="cardfull">


                <div id="cardfulltop" class="cardfulltop <?php echo $classcardfull; ?>">
                    <h2>post a journey</h2>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop1">
                            <img src="<?php echo ($profile->user_profile_img) ? theme_profile_img($profile->user_profile_img) : theme_img('default.png'); ?>">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop2"> 
            <?php
                        echo '<span>'.$profile->user_first_name. ' ' .$profile->user_last_name.'</span>';
                       
            ?>   
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop1">
                        <?php 
                            if (!$vehicle) {redirect('profile'.'#my-cars-info');}
                            foreach ($vehicle as $parent) {
                                $data[$parent->vechicle_id] = strtoupper($parent->vehicle_type) . ' - ' . $parent->vechicle_number;
                                $vechicle_id = $parent->vechicle_id;
                                $vehnum = $parent->vehicle_type.' - '.$parent->vechicle_number;
                                $vehlogo = $parent->vechicle_logo;
                            }
                        ?>


                            <img src="<?php if (!empty($vehlogo)) {
                            echo base_url('uploads/vehicle/thumbnails/' .$vehlogo);
                        } else {
                            echo theme_img('no_car.png');
                        } ?>">
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 cardfulltop2">    
                            Vehicle: <span><?= $vehnum ?></span>            
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div>
                <?php if(!isset($request)) { ?>
                <div class="margintop40 center">
                	<button id="fromclc" class="btnactive">Going From</button> <img class="imgchange" src="<?php echo base_url('/'); ?>spcp/images/icon-change.png"> <button id="toclc">Leaving To</button>
            	</div>
                <?php } ?>

                <form class="bbq" id="frmtrip">
                            <input type="hidden" name="vechicletype" id="vechicletype" value="<?= $vechicle_id ?>">
                            <input type="hidden" name="communityid" id="communityid" value="<?php echo $communityid; ?>" />
                            <input type="hidden" name="tripid" id="tripid" value="<?= $tripid ?>" />
                            <input type="hidden" name="submitted" id="route-map" value="submitted" />
                            <input type="hidden" name="edited" id="edited" value="" />
                            <input type="hidden" name="checktrip" id="checktrip" value="1" />
                            <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" /> 
                    
                               


                    <div class="divinput divinputfrom col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                        <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-from.png"> From: <span class="mandatory">*</span></h3>
                        <p id="pdescrfrom"></p>
                        <input <?php echo $attrsource; ?>  type="text" placeholder="" name="txtsource" id="txtsource" class="" value="<?= $txtsource ?>" >
                        <input type="hidden" name="source_ids" id="source_ids"  value="<?= $source_ids ?>"/>
                    </div>
                    <div class="clear"> </div> 




                    <div class="divinput divinputfrom col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-to.png"> To: <span class="mandatory">*</span></h3>
                        <p id="pdescrto"></p>
                        <input <?php echo $attrdest; ?> type="text" class="" placeholder="" name="txtdestination" id="txtdestination"  value="<?= $txtdestination ?>"/>
                        <input type="hidden" name="destination_ids" id="destination_ids"  value="<?= $destination_ids ?>"/>
                    </div>





                    <div id="destination" class="margintop40 divinput destination">
                        <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-dest.png"> Add Destination :</h3>
                        <p>your passing through point</p>
                        <input  type="text" id="jquerytagboxtext" class="fleft padding10 width51" name="jquerytagboxtext"  value="<?= $jquerytagboxtext ?>"/>
                        <input type="hidden" name="routes" id="routes" value="<?= $routes ?>" />
                        <input type="hidden" name="routesdata" id="routesdata" value="<?= $routesdata ?>" />
                        <input type="hidden" name="route_lanlat" id="route_lanlat" value="<?= $route_lanlat ?>" />

                    </div> 
                    <div class="clearfix"> </div>


                    <div id="route-map-data" class="clearfix margintop30"> </div> 



                    <script type="text/javascript">  
<?php 

    if(isset($request)) {
   
?>
    var param = 'route=' + $('#jquerytagboxtext').val() + '&source=' + $('#txtsource').val() + '&desti=' + $('#txtdestination').val()
    $.ajax({
        type: "POST",
        url: baseurl + "addtrip/route_map/true",
        //dataType:"json",              
        data: param,
        success: function (html) {

            if (html) {
                $('#route-map-data').html(html)
                initialize_map();
            }
        }
    });
<?php } else { ?>    
                        $("#txtsource").change(function(){
                            $("#destination").addClass("shawd");
                        });
                        $("#txtdestination").change(function(){
                            $("#destination").addClass("shawd");
                        });                        

                        //$("#destination").addClass("shawd");

						var pdescr = "Start typing an address and auto-complete will do the rest";
						$("#pdescrfrom").text(pdescr);
						$("#txtdestination").prop("readonly", true);

						$( "#toclc" ).click(function() {
							$("#destination").removeClass("shawd");

						 	$("#txtdestination").val("");
						 	$("#txtdestination").removeProp("readonly");
						 	$("#destination_ids").val("");
						 	$("#pdescrfrom").text("");

						 	$("#txtsource").val("<?= $comm[0]->comm_address ?>");
						 	$("#txtsource").prop("readonly", true);
						 	$("#source_ids").val("<?= $comm[0]->comm_location ?>");
							$("#pdescrto").text(pdescr);

							$( "#fromclc" ).removeClass("btnactive");
							$( "#toclc" ).addClass("btnactive");

							$( "#cardfulltop" ).removeClass("cardfulltop-to");
							$( "#cardfulltop" ).addClass("cardfulltop-from");

                            $( "#requestmark" ).removeClass("rq-cardfulltop-to");
                            $( "#requestmark" ).addClass("rq-cardfulltop-from");
		
							$(this).blur();
						});


						$( "#fromclc" ).click(function() {
							$("#destination").removeClass("shawd");

						 	$("#txtsource").val("");
						 	$("#txtsource").removeProp("readonly");
							$("#source_ids").val("");
							$("#pdescrto").text("");

							$("#txtdestination").val("<?= $comm[0]->comm_address ?>");
							$("#txtdestination").prop("readonly", true);
							$("#destination_ids").val("<?= $comm[0]->comm_location ?>");
							$("#pdescrfrom").text(pdescr);

							$( "#toclc" ).removeClass("btnactive");
							$( "#fromclc" ).addClass("btnactive");

							$( "#cardfulltop" ).removeClass("cardfulltop-from");
							$( "#cardfulltop" ).addClass("cardfulltop-to");	

                            $( "#requestmark" ).removeClass("rq-cardfulltop-from");
                            $( "#requestmark" ).addClass("rq-cardfulltop-to");                             						

							$(this).blur();
						});	

<?php }  ?> 

                    </script>



            </div>
            <div class="clear margintop20"> </div>
            <div class="cardfull">
                                           
                    <div class="hidden">
                        <span class="size14 bold row"><span class="mandatory">*</span><?php echo lang('passenger_type'); ?></span>
                        <p class="row bold paddingtop10"> 

                                                <?php 
                                                    $passenger_type_ch1 = $passenger_type_ch2 = $passenger_type_ch3 = '';
                                                    if ($passenger_type==1){ $passenger_type_ch1 = 'checked';} 
                                                    else if ($passenger_type==2){ $passenger_type_ch2 = 'checked';} 
                                                    else {$passenger_type_ch3 = 'checked'; }
                                                ?>
                                                    <span class="fleft size14"> 
                                                    <input type="radio" name="passenger_type" id="female" value="1" <?php echo $passenger_type_ch1; ?> /> <?php echo lang('female'); ?> </span>
                                                    <span class="fleft size14 marginleft30"> <input type="radio" name="passenger_type" id="male" value="2" <?php echo $passenger_type_ch2; ?> /> <?php echo lang('male');; ?> </span>
                                                    <span class="fleft size14 marginleft30"> <input type="radio" name="passenger_type" id="both" value="3" <?php echo $passenger_type_ch3; ?> /> <?php echo lang('both'); ?>  
                                                    </span>
                                                </p>
                    </div>


                    <div class="hidden">

                        <div class=" divinput col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden">
                        
                            <h3 class="marginbot20"><img src="<?php echo base_url('/'); ?>spcp/images/icon-frq.png"> <?php echo lang('frequency'); ?> </h3>
                                <div class="size14"> 
                                    <input type="radio" name="trip_type" id="casu" onclick="change_type(2)" />  
                                    <label for="casu"><?php echo lang('one_time'); ?></label> 
                                </div>
                                <div class="size14"> 
                                    <input disabled type="radio" name="trip_type" id="regu" onclick="change_type_disable(1)"/> 
                                    <label style="color: #999; font-size: 90%;" for="regu"><?php echo lang('recurring'); ?> (Coming soon)</label>  
                                </div>

                                <p class="row paddingtop10 bold" id="regular"> 
                                    <span class="fleft size14"><input type="checkbox" name="frequency[]" value="0" onchange="filter_result()" /> <?php echo lang('sun'); ?>  </span>
                                    <span class="fleft size14 marginleft30"> <input type="checkbox" name="frequency[]" value="1" onchange="filter_result()"/> <?php echo lang('mon'); ?>  </span>
                                    <span class="fleft size14 marginleft30"> <input type="checkbox" name="frequency[]" value="2" onchange="filter_result()"/> <?php echo lang('tue'); ?> </span>
                                    <span class="fleft size14 marginleft30"> <input type="checkbox" name="frequency[]" value="3" onchange="filter_result()"/> <?php echo lang('wed'); ?> </span>
                                    <span class="fleft size14 marginleft30"> <input type="checkbox" name="frequency[]" value="4" onchange="filter_result()"/> <?php echo lang('thu'); ?> </span>
                                    <span class="fleft size14 marginleft30"> <input type="checkbox" name="frequency[]" value="5" onchange="filter_result()"/> <?php echo lang('fri'); ?>  </span>
                                    <span class="fleft size14 marginleft30"> <input type="checkbox" name="frequency[]" value="6" onchange="filter_result()"/> <?php echo lang('sat'); ?>  </span>
                                    <input type="hidden" name="frequency_ids" id="frequency_ids" value="<?= $frequency_ids ?>" />
                                </p>

                        </div>

                        <div class="divinput col-lg-6 col-md-6 col-sm-6 col-xs-12 hidden">
                            <div class="size14">
                                <input name="return" type="radio" value="no" id="no" onclick="change_trip(1)"> 
                                <label for="no"><?php echo lang('one_way_trip'); ?> </label>
                            </div>
                            <div class="size14">
                                <input disabled name="return" type="radio" value="yes" id="yes" onclick="change_trip_disabled(2)"> 
                                <label style="color: #999; font-size: 90%;" for="yes"><?php echo lang('return_trip'); ?> (Coming soon)</label>
                            </div>            
                           
                        
                        </div>

      
                    </div>




                    <div class="">


                        <div class="divinput divinputdate col-lg-6 col-md-6 col-sm-6 col-xs-12 margintop20">
                                    <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-date.png"> <?php echo lang('date_of_journey'); ?> <span class="mandatory">*</span></h3>                    
                                    <span class="size14 bold"> </span> 


                                    <input <?= $attrdate ?> type="text" id="rpt_from_date" placeholder="" class="fleft width100 padding10 row" name="rpt_from_date" onchange="clearnow();" value="<?= $rpt_from_date ?>"> 

                                                      
                        </div>
                        


                        <div class="divinput divinputtime col-lg-6 col-md-6 col-sm-6 col-xs-12 margintop40 marginbot20">
                            <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-time.png"> <?php echo lang('departure_time'); ?> <span class="mandatory">*</span></h3>
                            <p class="margin5 size12">HH : MM : AM/PM</p>
                            <ul class="trp-step ">
                                                    <li id="departure"> 
                                                                   
                                                <?php
                                                    if (isset($request)) {
                                                        echo '<input readonly  type="text" id="fhh" class="fleft padding10 row" name="fhh" value="'.$fhh.'" style=""> <input readonly  type="text" id="fmm" class="fleft padding10 row" name="fmm" value="'.$fmm.'"> <input readonly  type="text" id="fzone" class="fleft padding10 row" name="fzone" value="'.$fzone.'"> 
';
                                                    } else {

                                                        $options = array(
                                                          
                                                            '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');
                                                        echo form_dropdown('fhh', $options, set_value('fhh', $fhh), ' id="fhh" class="fleft padding10" onchange="clearnow();"  placeholder="hh"');
                                                        ?>
                                                        
                                                        <?php
                                                        $options = array(
                                                             '00' => '00',
                                                            '15' => '15', '30' => '30', '45' => '45');
                                                        echo form_dropdown('fmm', $options, set_value('fmm', $fmm), ' id="fmm" class="fleft padding10 marginleft10" onchange="clearnow();" ');
                                                        ?>
                                                        
                                                        <?php
                                                        $options = array(
                                                           
                                                            'am' => 'AM', 'pm' => 'PM');
                                                        echo form_dropdown('fzone', $options, set_value('fzone', $fzone), ' id="fzone" class="fleft padding10 marginleft10" onchange="clearnow();" ');
                                                    }        
                                                ?>            
                                                    </li>
                                                    <li id="return" class="hidden" style="dispaly: block; clear: both; margin-top: 20px;"> 
                                                        <span class="row size14 bold"><?php echo lang('return_time'); ?> (return trip)</span>
                                                        <?php
                                                        $options = array(
                                                            '' => 'HH',
                                                            '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12');
                                                        echo form_dropdown('thh', $options, set_value('thh', $thh), ' id="thh" class="fleft padding5 " onchange="clearnow();"  placeholder="hh"');
                                                        ?>
                                                         <p class="paddingtop6 size14 fleft" style="margin-left: 5px;">:</p>
                                                        <?php
                                                        $options = array(
                                                            '' => 'MM', '00' => '00',
                                                            '15' => '15', '30' => '30', '45' => '45');
                                                        echo form_dropdown('tmm', $options, set_value('tmm', $tmm), 'id="tmm" class="fleft padding5 marginleft10" onchange="clearnow();" ');
                                                        ?>
                                                        <p class="marginleft10 paddingtop6 size16 fleft"> </p>
                                                        <?php
                                                        $options = array(
                                                            '' => 'AM/PM',
                                                            'am' => 'AM', 'pm' => 'PM');
                                                        echo form_dropdown('tzone', $options, '1', '  id="tzone" class="fleft padding5 marginleft10"');
                                                        ?>


                                                    </li>
                                                    <input type="hidden" name="depature_time" id="depature_time" value="<?= $depature_time ?>" />
                                                    <input type="hidden" name="arrival_time" id="arrival_time" value="<?= $arrival_time ?>" />
                            </ul>
                            
                        </div>  
                    <div class="clearfix center margin"> you can only post a journey up to one hour of scheduled time</div>
                    </div>






                    <div class=""> 

                        <div class="divinput divinputcar col-lg-6 col-md-6 col-sm-6 col-xs-12 margintop40 marginbot20">
                            <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-car.png"> <?php echo lang('available_seat'); ?> <span class="mandatory">*</span></h3>
	                        <?php
	                        /*
	                        $data = array('name' => 'avail_seats', 'id' => 'avail_seats', 'class' => 'fleft width100 padding10 row', 'placeholder' => ' ', 'value' => set_value('avail_seats', $avail_seats));
	                        echo form_input($data);
	                        */
	                        ?>
	                        <input type="hidden" name="avail_seats" value="1" id="avail_seats" class="fleft width100 padding10 row" placeholder=" ">

	                        <div class="clear margintop20">
								<a class="seatsbtn alinkbtn alinkbtn1 btnactive">1</a> <a class="seatsbtn alinkbtn alinkbtn1">2</a> <a class="seatsbtn alinkbtn alinkbtn1">3</a> <a class="seatsbtn alinkbtn alinkbtn1">4</a> <a class="seatsbtn alinkbtn alinkbtn1">5</a> <a class="seatsbtn alinkbtn alinkbtn1">6</a> <a class="seatsbtn alinkbtn alinkbtn1">7</a>
							</div>
	                   		<script type="text/javascript">  



								$( ".seatsbtn" ).click(function() {

									$( ".seatsbtn" ).removeClass("btnactive");
									$(this).addClass("btnactive");
									$("#avail_seats").val($(this).text());

								});

	                    	</script>

                        </div>

                        <div class="hidden divinput divinputphone col-lg-6 col-md-6 col-sm-6 col-xs-12 margintop40 marginbot40">

                            <h3><img src="<?php echo base_url('/'); ?>spcp/images/icon-phone.png"> <?php echo lang('phone_number'); ?> <span class="mandatory">*</span></h3>
                            <?php
                            $data = array('name' => 'number', 'id' => 'number', 'class' => 'fleft width100 padding10 row', 'placeholder' => lang('contact_number'), 'value' => set_value('number', $number));
                            echo form_input($data);
                                            ?>
                        </div>
                        <div class="clearfix marginbot40"> </div>
                    </div>
                    



            </div>
            <div class="clear margintop20"> </div>
            <div class="cardfull">




                    <div class="hidden divinput margintop20">
                        <h3 class="marginbot20"><img src="<?php echo base_url('/'); ?>spcp/images/icon-comment.png"> <?php echo lang('comments'); ?></h3>
                        <?php
                            $data = array('name' => 'comments', 'class' => 'fleft width100 padding10 rows', 'rows' => '4', 'id' => 'comments','placeholder' => lang('comments'), 'value' => set_value('comments', $comments));
                            echo form_textarea($data);
                        ?> 

                    </div>
                    <div class="clear"> </div>


                    <div class="divinput divinputmoney center marginbot20">
                        <h3> Your points </h3>
                        <div class="center trippoints">
                            <?php 
                                $percentagepoints = $this->Money_model->money_for_fees;
                                $totalpoints = $this->Money_model->money_for_journey;
                                $new_points = $totalpoints - ($percentagepoints / 100) * $totalpoints;
                                echo '<img src="'.base_url('/').'spcp/images/icon-coin.png"> '.$this->Money_model->money_for_journey.' points - '.$this->Money_model->money_for_fees.'% fees = <img src="'.base_url('/').'spcp/images/icon-coin.png"> +'.$new_points.' points per passenger';
                            ?>
                        </div> 



                    </div>



                    <div class="divinput margintop20 center marginbot40">
                        
                        <?php 

                            if(isset($requester_id)) {
                                if($profile->user_id == $requester_id) {
                                    echo 'Your Request';
                                } else {
                                    echo '
                                    <input type="submit" value="POST for REQUEST" class="padding10  alinkbtn alinkbtn1 trp-cont-but size16 bold">
                                    <input type="hidden" id="requester_id" name="requester_id" value="'.$requester_id.'">
                                    <input type="hidden" id="request_id" name="request_id" value="'.$request.'">
                                    ';
                                }
                            } else {
                                echo '<input type="submit" value="POST A JOURNEY" class="padding10  alinkbtn alinkbtn1 trp-cont-but size16 bold">';
                            }
                        ?>
                        
                    </div>


                                
                   </form>




            <div class="clear"> </div>
            </div>
        </div>
    </div>
</div>






<?php include('footer.php'); ?> 
