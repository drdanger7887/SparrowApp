<?php include('header.php'); 
include('title_mytrips.php');
?>

<?php echo theme_js('tab.js', true); ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<script>
    var baseurl = "<?php print base_url(); ?>";
    $(document).ready(function () {

        /* Slider Expand Click */
        $('body').on("click", '.slider', function ()
        {
            var ID = $(this).attr("rel");
            if ($('#slide' + ID).is(':visible'))
            {
                close()
            } else
            {
                close()

                $('#slide' + ID).addClass('open').removeClass('close');
                $('#slide' + ID).slideToggle('slow');

                return false;
            }
        });

        function close() {
            opened = $(document).find('.open');
            $.each(opened, function () {
                //give the proper class to the linked element
                $(this).addClass('close').removeClass('open');
                $(this).slideToggle('slow');
            });
        }


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
<?php echo theme_js('common.js', true); ?>

<h2 class="margintop40 upper center">
as a car owner
</h2>
<div class="container-fluid margintop40 mapbg">
    <div class="container">
        <div class="row">


                            <?php

                            if (isset($trip_details) && $trip_details) {
                               // var_dump($trip_details);
                                $i = 1;
                                foreach ($trip_details as $trip) {
                                    ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 colon">
                                    <div class="coloncard2">
                                        <div class="padding10 size16"> 
                                            <?php 
                                            $trip['source'] = str_replace('United Kingdom','UK',$trip['source']);
                                            $trip['destination'] = str_replace('United Kingdom','UK',$trip['destination']);

                                            echo '  <div class="bold">
                                                        <img src="'.base_url('/').'spcp/images/icon-from.png"> &nbsp; '.$trip['source'].'
                                                    </div>';
                                            if (!empty($legdetails['route_' . $trip['trip_id']])) {
                                                foreach ($legdetails['route_' . $trip['trip_id']] as $trip_routes) {
                                                            $trip_routes = str_replace('United Kingdom','UK',$trip_routes);
                                                            
                                                            echo '<div class="size14 margin5"> &nbsp;  &nbsp; <img src="'.base_url('/').'spcp/images/icon-dest.png">  &nbsp; '.$trip_routes.' </div> ';
                                                            
                                                 }
                                            }                                                    
                                            echo '  <div class="bold">
                                                        <img src="'.base_url('/').'spcp/images/icon-to.png"> &nbsp; '.$trip['destination'].'
                                                    </div>';


                                            if (!empty($trip['trip_casual_date'])) {
                                                        $cardtime = date("d-m-Y", strtotime($trip['trip_casual_date']));

                                                        $trip_unix_time = strtotime($trip['trip_casual_date'].' '.$trip['trip_depature_time']);
                            
                                                        $trip_depature_time = date('h:i a', strtotime($trip['trip_depature_time']));

                                            echo '  <div class="cardtime center margin10"><img src="'.base_url('/').'spcp/images/icon-date.png">'.$cardtime.' <img src="'.base_url('/').'spcp/images/icon-time.png">'.$trip_depature_time.     '</div>';

                                            echo '  <div class="editbtn">';


                                                if ($trip_unix_time<strtotime("now")) { 
                                                    echo '<span class="editpast">EXPIRED</span>';
                                                } 
                                                    echo '<a class="editview" href="'.base_url('trip/tripdetails/' . $legdetails['leg_' . $trip['trip_id']][0]['trip_led_id']).'">VIEW</a>';
                                                

                                            } else {
                                                    echo 'Regular';
                                            }
                                            
                                                ?>
                                                  
                                                <?php $enq = checkenquery($trip['trip_id'],$trip['user_id']);
                                                 //$enq = checkorder($trip['trip_id'],$trip['user_id']);
                                                    if($enq){
                                                    ?> 
                                                    <a class="editdel" onclick="return myTripDel();" href="<?= base_url('addtrip/delete/' . $trip['trip_id']); ?>"> Delete </a> 
                                                    

                                                    <?php /* ?>
                                                    <a class="alinkbtn" style="display: block; margin: 5px 0;" href="<?= base_url('addtrip/update_trip/' . $trip['trip_id']); ?>"> <img src="<?php echo theme_img('edit-ico.png') ?>"><?php echo lang('edit_trips'); ?></a>
                                                    <?php */ ?>


                                                    
                                                <?php   } else{  /*?>
                                                        <a id="myLink" class="red-bg" href="javascript:void(0)" onclick="myTripdelete(<?php echo $trip['trip_id']; ?>);"><?php echo lang('delete_all_trips'); ?></a><div class="clear"> </div>
                                                        <a id="mytripLink"  href="javascript:void(0)"  onclick="myTripedit(<?php echo $trip['trip_id']; ?>);"><?php echo lang('edit_trips'); ?></a> <div class="clear"> </div>                                               
                                                <?php */} 
                                            echo '<div class="clearfix"> </div>
                                                    ';

                                                ?>

                                                </div> 
                                            <div class="clearfix"> </div>
                                        </div>


                                        
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                    <?php
                                    $i++;

                                if ($i%2) {echo '<div class="clearfix row"> </div>';}
                                }
                            } else {
                                echo '<h4 class="center bold upper">You have not yet created any trips</h4>';
                            }
                            ?>
                            <!--  Trip -->

        </div>
    </div>
</div>

<?php include('footer.php'); ?>

    <script>
        function myTripdelete(id) {
            var result = confirm("Do not delete this trip because already allocated this trip for passangers");
        }
        function myTripedit() {
            var result = confirm("Do not edit this trip because already allocated this trip for passangers");
        }

        function myTripDel() {
            if (confirm("Want to delete?")) {
                return true;
            } else {
                return false;
            }
        }     
    </script>