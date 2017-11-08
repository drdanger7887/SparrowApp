<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <head>






                <?php
                if (!empty($description)) {
                    ?>
                    <meta name="description" content="<?= $description ?>">
                        <?php
                    }
                    ?>
                    <title><?= $seo_title; ?></title>
                    <meta name="description" content="<?= $seo_description; ?>" />
                    <meta name="keywords" content="<?= $seo_keyword; ?>" />
                    <!-- must have -->
                    <?php //echo theme_css('bootstrap.css', true); ?>
                    <?php echo theme_css('bootstrap.min.css', true); ?>
                    <?php echo theme_css('bootstrap-theme.css', true); ?>
                    <?php echo theme_css('style.css', true); ?>  




                    <?php //echo theme_css('custom.css', true); ?> 
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customspcp.css?ver=12" type="text/css" media="all">
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customslider.css?ver=11" type="text/css" media="all">

                  
                    <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
                        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,700italic' rel='stylesheet' type='text/css'>

                            <script type="text/javascript" src="<?= theme_url('assets/js/jquery-1.12.2.min.js'); ?>"></script>                           
                            <script type="text/javascript" src="<?= theme_url('assets/js/bootstrap.min.js'); ?>"></script>
                            <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>

                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $(".my-account-button").click(function () {
                                        $(".my-account-details").fadeToggle("fast", function () {
                                            if ($(".my-account-details").css('display') == "none")
                                                $(".my-account-button").removeClass("active");
                                            else
                                                $(".my-account-button").addClass("active");
                                        });
                                    });
                                });
                            </script>


    <!--  Desktop Favicons  -->
    <link rel="icon" type="image/png" href="<?php echo base_url('/'); ?>spcp/images/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url('/'); ?>spcp/images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url('/'); ?>spcp/images/favicon-96x96.png" sizes="96x96">




                                </head>

                                <body>
                                    <div id="fb-root"></div>
                                    <script>(function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id))
                                                return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1618861935012037";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));</script>
                                    <script>!function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                            if (!d.getElementById(id)) {
                                                js = d.createElement(s);
                                                js.id = id;
                                                js.src = p + "://platform.twitter.com/widgets.js";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }
                                        }(document, "script", "twitter-wjs");</script> 
                                    <style type="text/css"> iframe[id^='twitter-widget-0']{ width:280px !important;} </style>


                                    <div class="container-fluid pull-top topbg paddingtopbot10">
                                        <div class="container">
                                            <div class="logo">
                                                <a href="<?php echo base_url('/'); ?>"id="logo" class="navbar-brand-g">
                                                    <img src="<?php echo base_url('/'); ?>spcp/images/sparrow-logo.png"> 
                                                </a>
                                                 </div>

                                            <div class="head-rht">  

                                                <?php

                                                $this->CI = & get_instance();
                                                $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');

                                                $id = $carpool_session['carpool_session']['user_id'];
                                                $profile = $this->auth_travel->get_travel($id);
                                                if ($this->auth_travel->is_logged_in(false, false)):
                                                    ?>	

                                                    <ul class="top-nav new-top-nav">
                                                        <li> <a href="<?php echo base_url('community'); ?>" class="button-sp2 iconpost alinkbtn"> COMMUNITIES </a> </li>
                                                        <li>
                                                            <div id="my-account">
                                                                <div class="my-account-button">  <div class="profile-img"> <img src="<?php
                                                                        if ($profile->user_profile_img) {
                                                                            echo theme_profile_img($profile->user_profile_img);
                                                                        } else {
                                                                            echo theme_img('default.png');
                                                                        }
                                                                        ?>" width="40" height="40"> 
                                                                    </div> 
                                                                    <span> <?= $profile->user_first_name . ' ' . $profile->user_last_name ?> </span> <p>
                                                                        <img src="<?php echo theme_img('drop.png') ?>"> </p> 
                                                                </div>
                                                                <div class="my-account-details" style="display: none">
                                                                    <ul class="nav-set">
                                                                        <li><a href="<?php echo base_url('profile'); ?>"> <img src="<?php echo theme_img('driver-ico.png') ?>" style=" width: 17px"> <?php echo lang('profile'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile#settings'); ?>"> <img src="<?php echo theme_img('settings-ico.png') ?>" style=" width: 17px"> <?php echo lang('pro_settings'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile#my-cars-info'); ?>"> <img src="<?php echo theme_img('vehicle.png') ?>"style=" width: 17px"> <?php echo lang('my_vehicles'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('addtrip'); ?>"> <img src="<?php echo theme_img('trip.png') ?>" style=" width: 17px"> <?php echo lang('pro_my_trips'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('rating'); ?>"> <img src="<?php echo theme_img('star-ico.png') ?>"style=" width: 17px"> <?php echo lang('my_ratings'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('addtrip/enquery_list'); ?>"> <img src="<?php echo theme_img('enquiry.png') ?>" style=" width: 17px"> <?php echo lang('my_enquiries'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('addtrip/payments_list'); ?>"> <img src="<?php echo theme_img('money.png') ?>" style=" width: 17px"> <?php echo lang('my_payments'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('trip/passanger_questions'); ?>"> <img src="<?php echo theme_img('people .png') ?>" style=" width: 17px"> <?php echo lang('passangeres_questions'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile/changepwd_form'); ?>"> <img src="<?php echo theme_img('people .png') ?>" style=" width: 17px"> <?php echo lang('my_change_password'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('login/logout'); ?>"> <img src="<?php echo theme_img('logout-ico.png') ?>" style=" width: 17px"> <?php echo lang('logout'); ?> </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    <?php else: /* ?>
                                                        <ul class="top-nav new-top-nav">
                                                            <li>  <a href="<?php echo base_url('search'); ?>" class="button-sp2 iconfind"> FIND A RIDE </a> </li>
                                                            <li>  <a href="<?php echo base_url('addtrip/form'); ?>" class="button-sp2 iconpost"> <?php echo lang('post_a_trip'); ?> </a> </li>
                                                            <li> <a href="<?php echo base_url('login'); ?>" class="button-sp1"> <?php echo lang('login'); ?> </a> </li>
                                                            <li> <a href="<?php echo base_url('register'); ?>" class="button-sp1"> <?php echo lang('register'); ?> </a> </li>
                                                        </ul>
                                                    <?php */ endif; ?>

                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        var baseurl = "<?php print base_url(); ?>";
                                    </script>
