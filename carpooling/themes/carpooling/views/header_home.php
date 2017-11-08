<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <head>
                <title><?= $seo_title; ?></title>
                <meta name="description" content="<?= $seo_description; ?>" />
                <meta name="keywords" content="<?= $seo_keyword; ?>" />
                <!-- must have -->
                <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>
                <?php echo theme_js('jquery-ui-1.8.23.min.js', true); ?>
                <?php echo theme_js('bootstrap.js', true); ?>

                <script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
                <script type="text/javascript">

                        var baseurl = "<?php print base_url(); ?>";
                        var configcountry = "<?php print ($this->config->item('country_code') != '') ? $this->config->item('country_code') : ''; ?>";                       
                        var expcountry = configcountry.split(",");
                        
                    </script>
                <?php if ($this->config->item('google_api_key') != '') { ?>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_MBODDldl3TOvh2oiE0CjL2oV78x8zAc&libraries=places&language=en"></script>
                <?php } ?>
                <?php if ($this->config->item('google_api_key') == '') { ?>
                    <script src="https://maps.googleapis.com/maps/api/js?&libraries=places&language=en"></script>
                <?php } ?>
                <?php echo theme_js('home.js', true); ?>
                <?php echo theme_css('style.css', true); ?>
                <?php echo theme_css('bannerscollection_kenburns.css', true); ?>
                <?php echo theme_css('bootstrap.css', true); ?>
                <?php //echo theme_css('bootstrap-theme.css', true);?>
                <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
                    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,700italic' rel='stylesheet' type='text/css'>


                        <?php echo theme_js('jquery.ui.touch-punch.min.js', true); ?>
                        <?php echo theme_js('bannerscollection_kenburns.js', true); ?>
<!--[if IE]><?php echo theme_js('excanvas.compiled', true); ?><![endif]-->
                        <!-- must have -->
                        <script>
                    jQuery(function () {
                        jQuery('#bannerscollection_kenburns_generous').bannerscollection_kenburns({
                            skin: 'generous',
                            responsive: true,
                            width: 1920,
                            height: 680,
                            width100Proc: true,
                            thumbsOnMarginTop: 14,
                            thumbsWrapperMarginTop: -110,
                            autoHideBottomNav: false,
                            showBottomNav: false,
                            showCircleTimer: false,
                            showCircleTimerIE8IE7: false,
                            showAllControllers: false
                        });
                    });
                        </script>
                        
                        <?php echo theme_js('jquery.ddslick.js', true); ?>
                        <?php echo theme_js('script.js', true); ?>

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
                        

                    <?php //echo theme_css('custom.css', true); ?> 
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customspcp.css?ver=11" type="text/css" media="all">
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customslider.css?ver=11" type="text/css" media="all">





	<!-- LOAD JQUERY LIBRARY -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

		<!-- LOADING FONTS AND ICONS -->
		<link href="http://fonts.googleapis.com/css?family=Raleway%3A500%2C800" rel="stylesheet" property="stylesheet" type="text/css" media="all" />

		<link rel="stylesheet" type="text/css" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">

		<!-- REVOLUTION STYLE SHEETS -->
		<link rel="stylesheet" type="text/css" href="css/settings.css">
		<!-- REVOLUTION LAYERS STYLES -->
		<style></style>
<style type="text/css">	#rev_slider_5_1_wrapper .tp-loader.spinner3{ background-color: #FFFFFF !important; } </style>

        
		<!-- REVOLUTION JS FILES -->
		<script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

		<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
		<script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.carousel.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
		<script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>



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
                                        <div class="row">  

                                            <div class="head-rht">        
                                                <?php
                                                $this->CI = & get_instance();
                                                $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');

                                                $id = $carpool_session['carpool_session']['user_id'];
                                                $profile = $this->auth_travel->get_travel($id);
                                                if ($this->auth_travel->is_logged_in(false, false)):
                                                    ?>	
                                                    <ul class="top-nav new-top-nav">
                                                        <li>  <a href="<?php echo base_url('community'); ?>" class="button-sp2 iconfind"> COMMUNITY </a> </li>

                                                            <div id="my-account">
                                                                <div class="my-account-button">  <div class="profile-img"> <img src="<?php
                                                                        if ($profile->user_profile_img) {
                                                                            echo theme_profile_img($profile->user_profile_img);
                                                                        } else {
                                                                            echo theme_img('default.png');
                                                                        }
                                                                        ?>" width="40" height="40"> 
                                                                    </div> 
                                                                    <span> <?= $profile->user_first_name . ' ' . $profile->user_last_name ?> </span> <p> <img src="<?php echo theme_img('drop.png') ?>"> </p>  </div>
                                                                <div class="my-account-details" style="display: none">
                                                                    <ul class="nav-set">
                                                                        <li><a href="<?php echo base_url('profile'); ?>"> <img src="<?php echo theme_img('driver-ico.png') ?>" style=" width: 17px"> <?php echo lang('profile'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile#settings'); ?>"> <img src="<?php echo theme_img('settings-ico.png') ?>" style=" width: 17px"> <?php echo lang('pro_settings'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile#my-cars-info'); ?>"> <img src="<?php echo theme_img('vehicle.png') ?>"style=" width: 17px"> <?php echo lang('my_vehicles'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('addtrip'); ?>"> <img src="<?php echo theme_img('trip.png') ?>" style=" width: 20px"> <?php echo lang('pro_my_trips'); ?> </a></li>
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

                                                    <?php else: ?>
                                                        <ul class="top-nav new-top-nav">
                                                            <li>  <a href="<?php echo base_url('search'); ?>" class="button-sp2 iconfind"> FIND A RIDE </a> </li>
                                                            <li>  <a href="<?php echo base_url('addtrip/form'); ?>" class="button-sp2 iconpost"> <?php echo lang('post_a_trip'); ?> </a> </li>
                                                            <li> <a href="<?php echo base_url('login'); ?>" class="button-sp1"> <?php echo lang('login'); ?> </a> </li>
                                                            <li> <a href="<?php echo base_url('register'); ?>" class="button-sp1"> <?php echo lang('register'); ?> </a> </li>
                                                        </ul>
                                                    <?php endif; ?>

                                                    <div class="margintop20">
                                                    </div> 
                                                </ul>                     
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container-fluid padding0 banner">

                                    <div id="bannerscollection_kenburns_generous">


<!--
                                        <div class="bottom-bar padding10">       
                                            <div class="search-bar">

                                                <h2> <?php echo lang('find_a_ride'); ?> </h2>

                                                <form method="get" id="searchform"  action="<?php echo base_url(); ?>search">
                                                    <input type="text" placeholder="<?php echo lang('form'); ?>"  name="source" id="source" class="srcdes marker-ico"> 
                                                        <input type="hidden" name="formlatlng" id="formlatlng"  value=""/>
                                                        <input type="text"  placeholder="<?php echo lang('to'); ?>"   name="destination" id="destination" class="srcdes marker-ico" />
                                                        <input type="hidden" name="tolatlng" id="tolatlng"  value=""/>
                                                        <input type="text" placeholder="DD/MM/YYYY" id="journey_date" class="srcdes cal-ico" onchange="getfrequency();"  name="journey_date" >

                                                            <input type="hidden" name="frequency" id="frequency"  value=""/>
                                                            <input type="submit"  value="<?php echo lang('search')?>"   class="ind-src-but"/>       
                                                            </form>
                                                            </div>      
                                                            </div>

                                                            </div>  
                                                            </div> 
-->
                                                            <script type="text/javascript">
                                                                var baseurl = "<?php print base_url(); ?>";
                                                            </script>
                                                            <script>
                                                                $(function () {
                                                                    $(".logo").click(function () {
                                                                        window.location = "/";
                                                                    });
                                                                });

                                                                $('body').on('change', '.languageChange', function () {
                                                                    var id = $(this).val();
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: baseurl + 'home/changeLanguage',
                                                                        dataType: "json",
                                                                        data: {key: id},
                                                                        success: function (status) {

                                                                            if (status.result == 1) {
                                                                                location.reload();

                                                                            }

                                                                        }
                                                                    });


                                                                });
                                                            </script>

