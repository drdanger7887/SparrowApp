<?php include('header.php'); ?>
<script src="https://code.jquery.com/jquery-migrate-1.3.0.js"></script>
<?php echo theme_js('tab.js', true); ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php //echo theme_js('popup/css/jquery-confirm.css') ?>" />

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
            }
            else
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
        
        $('.feedback').click(function () {
        
            $.post('<?php echo site_url('addtrip/feedback_form'); ?>/' + $(this).attr('rel')+'/'+ $(this).attr('myrel'),
                    function (data) {
                        $('#feedbackformContainer').html(data).modal('show');
                        $('#feedbackformContainer .modal').show();
                    }
            );

        });

    });
    
    
    </script>
<?php echo theme_js('common.js', true); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('my_trips'); ?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">

                        <h2 class="pst-trip-tit"><?php echo lang('my_trips'); ?></h2>
                    </div>
                </div>
            </div>


            <div class="fleft width100 margin">
                <div class="p_top">
                    <a id="a_tab" class="b_t_1" href="<?= base_url('addtrip') ?>"><?php echo lang('rides_offered'); ?></a>
                    <a id="a_tab" class="b_t_1 active" onclick="tab_tab(this, 'p_block_bottom'), height_right()" ><?php echo lang('rides_passanger'); ?></a>
                    <div class="cr">
                    </div>
                </div>

                <div class="obj_cont p_block_bottom" style="display: none;">
                </div>	
                <!-- end tab1 -->

                <div class="obj_cont p_block_bottom" style="display: block;">
                    <div class="my-trp-tab row">
                        <div class="my-trp-main">
                            <a href="<?= base_url('addtrip/upcoming_trip_passenger') ?>" class=" up_trip"><?php echo lang('upcoming_trips'); ?> </a>
                            <a href="javascript:void(0)" class="trp-main-active past_trip"><?php echo lang('past_trips'); ?></a>
                        </div>
                        <div class="my-trp-content rowrec" id="pageresult">
                            <p class="para"><?php echo lang('past_this_page'); ?></p>
                            
                            
                            <?php 
                            if ($trip_details) {
                                $i = 1;
                                foreach ($trip_details as $trip) {
                                    
                                    ?>
                            
                                    <div class="inner-trip-det">
                                        <div class="sea-city-city topbgg colorwhite padding10 cs-blue-text size16"> 
                                            <b><?= $trip['source'] ?> <span> <img src="<?php echo theme_img('arrow-right-white.png') ?>"> </span> <?= $trip['destination'] ?> <span class="edit_option"></span></b>
                                            <span class="trp-para"><?php echo lang('trip_type'); ?> <?php
                                                if (!empty($trip['trip_casual_date'])) {
                                                    echo date("d-m-Y", strtotime($trip['trip_casual_date']));
                                                } else {
                                                    echo lang('regular');
                                                }
                                                ?></span>  
                                            
                                            <b><i class="fa fa-comments"></i>  <a href="javascript:void(0);" class="feedback" style=" color: #FFF;" rel="<?php echo $trip['trip_user_id'] ?>" myrel="<?php echo $trip['enquiry_passanger_id'] ?>"><?php echo lang('feedback_form'); ?></a></b>
                                            <a href="javascript:void(0)" class="fright trp-acc-arr slider" rel="<?= $i ?>"> <img src="<?php echo theme_img('arr-ver-down.png') ?>"> </a>
                                    
                                        </div>
                                        <div id="slide<?= $i ?>" style="display:none">
                                            <div class="row margintop20 padding20">
                                                <span class="fleft"> <img src="<?php echo theme_img('src-dest-ico.png') ?>"> </span>
                                                <div class="sea-city-city fleft cs-grey-text size14 mar-min fleftnon"> 
                                                    <b><?= $trip['source'] ?></b> 
                                                    <?php
                                                    if (!empty($legdetails['route_' . $trip['trip_id']])) {
                                                        foreach ($legdetails['route_' . $trip['trip_id']] as $trip_routes) {
                                                            ?>
                                                            <span> <img src="<?php echo theme_img('search-arrow-right-grey.png') ?>"> </span> <?= $trip_routes ?> <span> 
                                                             <?php }
                                                                }
                                                                ?>
                                                        <img src="<?php echo theme_img('search-arrow-right-grey.png') ?>"> </span> <b><?= $trip['destination'] ?> </b>

                                                    <span class="trp-para"><?php echo lang('trip_type'); ?> <?php
                                                        if (!empty($trip['trip_casual_date'])) {
                                                            echo date("d-m-Y", strtotime($trip['trip_casual_date']));
                                                        } else {
                                                            echo lang('regular');
                                                        }
                                                        ?></span> 
                                                </div>
                                            </div>
                                            <h5 class="fleft width100 inner-in-trp"> <img src="<?php echo theme_img('trip-icon.png') ?>"> <?php echo lang('trip_leg'); ?>: </h5>
                                            <?php
                                            if (!empty($legdetails['leg_' . $trip['trip_id']])) {
                                                foreach ($legdetails['leg_' . $trip['trip_id']] as $trip_leg) {
                                                    
                                                    ?>
                                                    <div class="fleft width100 inner-in-trp">
                                                        <div class="inner-trip-det marginbot10">
                                                            <div class="sea-city-city topbgg colorwhite padding5 cs-blue-text size14"> 
                                                                <span><?php echo lang('trip_leg'); ?></span> 
                                                                <b><?= $trip_leg['source_leg'] ?><span> <img src="<?php echo theme_img('arrow-right-white.png') ?>"> </span> <?= $trip_leg['destination_leg'] ?> </b> 
                                                            </div>
                                                            <div class="padding20 fleft width100">
                                                                <div class="inn-in-left fleft">
                                                                    <div class="sea-city-city row cs-grey-text size14"> 
                                                                        <img src="<?php echo theme_img('time-ico.png') ?>"> <b> <?php echo lang('expected_departure'); ?> </b> <span id="time_<?= $trip_leg['trip_led_id'] ?>"><?= $trip_leg['expected_time'] ?></span>
                                                                    </div>
                                                                    <div class="sea-city-city margintop30 row cs-grey-text size14"> 
                                                                        <img src="<?php echo theme_img('rs-ico-big.png') ?>"> <b> <?php echo lang('price'); ?> </b> <span class="grey" id="amount_<?= $trip_leg['trip_led_id'] ?>"> <?php
                                                            if (!empty($trip_leg['route_rate'])) {
                                                                echo format_currency($trip_leg['route_rate']);
                                                            } else {
                                                                echo '-';
                                                            }
                                                            ?> </span><span><?php echo lang('inr'); ?></span>
                                                                    </div>
                                                                    <h4 class="cs-blue-text size14"> <?php echo lang('available_seats'); ?> <?= $trip['trip_avilable_seat'] ?> </h4>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }
                                                    }
                                                    ?>                                            
                                        </div>
                                    </div>
                                                <?php
                                                $i++;
                                            }
                                        }
                                        ?>
                            <!-- Ena Main Trip -->

                        </div>                     

                    </div>
                </div>    
                <!-- end tab2 -->

            </div>

        </div>
        <!-- End -->
    </div>
</div>
    
    <div id="feedbackformContainer"></div>

<?php include('footer.php'); ?>
