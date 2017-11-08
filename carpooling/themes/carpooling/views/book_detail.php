<?php include('header.php'); ?>

<?php echo theme_css('font-awesome.css', true) ?>

<?= theme_js('rate.js', true) ?>

<div class="container-fluid margintop40">
    <div class="container">
        <div class="row margintop40">       
            <div class="fleft padding20 white-bg left-main">
                <h2 class="left-side"> <?php echo lang('booking_information'); ?></h2>
                <div class="rowrec line4"></div>

                <div class="sea-city-city cs-blue-text size16">
                    <?php
                    $source = explode(",", $tripdetails['source_leg']);
                    echo '<b>' . $source[0] . '</b>';
                    ?>  <span> <img src="<?= theme_img('search-arrow-right-grey.png') ?>"> </span>
                    <?php
                    $destination = explode(",", $tripdetails['destination_leg']);
                    echo '<b>' . $destination[0] . '</b>';
                    ?>                    
                </div>

                <div class="rowrec line4"></div>
                <div class="rowrec line4"></div>

                <div class="rowrec">

                    <div class="colmd6">
                        <?php echo lang('departure_date'); ?><br>
                        <span class="size20"><span><img src="<?= theme_img('cal-14-14.png') ?>"></span> <?php echo $journeyDate; ?>
                        </span><br>
                        <small> <?php echo date('D', strtotime(str_replace('/', '-', $journeyDate))); ?> </small>
                    </div>

                    <div class="colmd6 noborder">
                        <?php echo lang('departure_time'); ?><br>
                        <span class="size20"><span><img src="<?= theme_img('time-ico.png') ?>"></span> <?= $tripdetails['expected_time'] ?>
                        </span><br>
                    </div>

                </div>

                <div class="rowrec line4"></div>

                <div class="rowrec line4"></div>

                <div class="rowrec size20 cs-blue-text center" style="font-size: 25px; font-weight: 600;"><?= format_currency($tripdetails['route_rate']); ?></div> 

                <div class="rowrec line4"></div>
                <div class="paypal-book">
                    <h4><?php echo lang('booking_confirmation'); ?></h4>
                    <input type="radio" value="paypal" checked="checked"><span><img src="<?= theme_img('PayPal_2014_logo.svg.png') ?>" style="width: 100px;"></span>
                </div>
                <div class="booking">
                    <input type="hidden" name="tripDate" id="tripDate" value="<?= $journeyDate ?>"/>
                    <input type="hidden" name="tripLegId" id="tripLegId" value="<?= $tripdetails['trip_led_id'] ?>"/>
                    <input type="button" value="Book" class="bookNow"><i class="fa fa-check-circle"></i>
                </div>
            </div>


            <div class="col-lg-4 col-md-3 col-sm-3 fleft car-owner"> 


                <h3 class="cs-lgrey-bg padding10" style="margin-top: 40px;"> <span> <img src="<?= theme_img('driver-ico.png') ?>"> </span><?php echo lang('driver'); ?> </h3>

                <div class="rowrec line4"></div>

                <div class="rowrec">

                    <div class="fleft paddingright10">
                        <a href="#"> <img src="<?php echo ($tripdetails['user_profile_img']) ? theme_profile_img($tripdetails['user_profile_img']) : theme_img('default.png'); ?>" class="search-thumb search-user-thumb"> </a>
                    </div>
                    <div class="fleft paddingtop10">
                        <strong class="size16">
                            <a href="#" class="cs-blue-text"><?= $tripdetails['user_first_name'] . ' ' . $tripdetails['user_last_name'] ?></a>
                        </strong><br>
                        <small class="size13" >  <?php
                            if (!empty($tripdetails['user_dob'])) {
                                $from = new DateTime($tripdetails['user_dob']);
                                $to = new DateTime('today');
                                echo $from->diff($to)->y . ' Years Old';
                            } else {
                                echo lang('user_is_not_specified');
                            }
                            ?>
                        </small>
                        <span class="rowrec size14"> 
                            <span class="fleft"> <?php echo lang('ratings'); ?>: </span>
                            <div class="starrow fleft marginleft10">
                                <script>rate(<?= getOverallRating($tripdetails['user_id']) ?>);</script>                     
                            </div>
                        </span>
                    </div>

                </div>

                <!--<--------------new------------->

                <ul class="rowrec trp-cont-rht">
                    <li>
                        <span class="trp-imge paddingtop5"><img src="<?php echo theme_img('mobile-ico.png'); ?>"></span> <strong class="size14 paddingleft8"><?php echo lang('phone'); ?> </strong>

                        <?php if ($tripdetails['show_number'] == 1) {
                            ?>  
                            <span class="fright paddingtop5"><img src="<?php echo theme_img('verified-ico-green.png '); ?>"></span>

                            <?php
                        } else {
                            ?>
                            <span class="fright paddingtop5"><img src="<?php echo theme_img('verified-ico-red.png '); ?>"></span>
                        <?php } ?>
                    </li>
                    <li>
                        <span class="trp-imge paddingtop5"><img src="<?php echo theme_img('mail-ico.png'); ?>"></span> <strong class="size14 paddingleft8"><?php echo lang('email'); ?> </strong>            
                        <span class="fright paddingtop5"><img src="<?php echo theme_img('verified-ico-green.png'); ?>"></span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('body').on('click', '.bookNow', function () {
        var baseurl = "<?php print base_url(); ?>";
        var pmQueryString = 'tripId=' + $('#tripLegId').val() + '&tripDate=' + $('#tripDate').val();
        $.ajax({
            type: "POST",
            url: baseurl + "trip/readyBooking/true",
            dataType: "json",
            data: pmQueryString,
            success: function (json) {
                if (json.result == 1) {
                    window.location = baseurl + 'booking/pay';
                }
            }
        });
    });
</script>
<?php include('footer.php'); ?>
