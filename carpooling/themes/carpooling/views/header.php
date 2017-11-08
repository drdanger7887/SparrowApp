<?php 
    $this->CI = & get_instance();
    $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');

    $id = $carpool_session['carpool_session']['user_id'];
    $profile = $this->auth_travel->get_travel($id);

    if ($this->auth_travel->is_logged_in(false, false)) {
        //echo $profile->user_notfirst;
        //$zz['user_notfirst'] = true;
        //$this->db->update('tbl_users', $zz);
        //$newlocation = ;
        //echo $newlocation;
        if(!$profile->user_notfirst) {header('Location: '.base_url("steps_intro")); }
    }
    else {
       // header('Location: '.base_url("login")); 
    }


?>




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
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customspcp.css?ver=21" type="text/css" media="all">
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customspcp-21.css" type="text/css" media="all">


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


                                    <div class="container-fluid pull-top topbg paddingtopbot10">
                                        <div class="container">
                                            <div class="logo">
                                                <a href="<?php echo base_url('/'); ?>"id="logo" class="navbar-brand-g">
                                                    <img src="<?php echo base_url('/'); ?>spcp/images/sparrow-logo.png"> 
                                                </a>
                                                 </div>

                                            <div class="head-rht">  

                                                <?php
//echo date("H:i:s");
                                                if ($this->auth_travel->is_logged_in(false, false)):
                                                 ?>	

                                                    <ul class="top-nav new-top-nav">
                                                        <!-- <li> <a href="<?php echo base_url('search'); ?>" class="button-sp2 iconfind"> GET A RIDE </a> </li>
                                                        <li> <a href="<?php echo base_url('addtrip/form'); ?>" class="button-sp2 iconpost"> POST A RIDE </a> </li> -->
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
                                                                    <span> <?= $profile->user_first_name . ' ' . $profile->user_last_name ?> </span> <div title="Sparrow Coins" class="moneypoints">
                                                                        <?php
                                                                        $usermoney = $this->auth_travel->show_usermoney($profile->user_id);
                                                                        echo round($usermoney[0]['money_count']);

                                                                        ?>
                                                                    </div><p>
                                                                        <img src="<?php echo theme_img('drop.png') ?>">  </p> 
                                                                </div>
                                                                <div class="my-account-details" style="display: none">
                                                                    <ul class="nav-set">
                                                                        <li><a href="<?php echo base_url('profile'); ?>"> <img src="<?php echo theme_img('driver-ico.png') ?>" style=" width: 17px"> <?php echo lang('profile'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile#settings'); ?>"> <img src="<?php echo theme_img('settings-ico.png') ?>" style=" width: 17px"> <?php echo lang('pro_settings'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile#my-cars-info'); ?>"> <img src="<?php echo theme_img('vehicle.png') ?>"style=" width: 17px"> <?php echo lang('my_vehicles'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('addtrip'); ?>"> <img src="<?php echo theme_img('trip.png') ?>" style=" width: 17px"> <?php echo lang('pro_my_trips'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('rating'); ?>"> <img src="<?php echo theme_img('star-ico.png') ?>"style=" width: 17px"> <?php echo lang('my_ratings'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('addtrip/enquery_list'); ?>"> <img src="<?php echo theme_img('enquiry.png') ?>" style=" width: 17px"> <?php echo lang('my_enquiries'); ?> </a></li>
                                                                        <li class="hidden"><a href="<?php echo base_url('addtrip/payments_list'); ?>"> <img src="<?php echo theme_img('money.png') ?>" style=" width: 17px"> <?php echo lang('my_payments'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('trip/passanger_questions'); ?>"> <img src="<?php echo theme_img('people .png') ?>" style=" width: 17px"> <?php echo lang('passangeres_questions'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('profile/changepwd_form'); ?>"> <img src="<?php echo theme_img('people .png') ?>" style=" width: 17px"> <?php echo lang('my_change_password'); ?> </a></li>
                                                                        <li><a href="<?php echo base_url('rewards'); ?>"> <img src="<?php echo theme_img('logout-ico.png') ?>" style=" width: 17px"> My rewards</a></li>
                                                                        <li><a href="<?php echo base_url('login/logout'); ?>"> <img src="<?php echo theme_img('logout-ico.png') ?>" style=" width: 17px"> <?php echo lang('logout'); ?> </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    <?php else: ?>
                                                        <ul class="top-nav new-top-nav">

                                                            <li> <a href="<?php echo base_url('login'); ?>" class="button-sp2 alinkbtn"> <?php echo lang('login'); ?> </a> </li>
                                                            <li> <a href="<?php echo base_url('register'); ?>" class="button-sp2 alinkbtn"> <?php echo lang('register'); ?> </a> </li>
                                                        </ul>
                                                    <?php endif; ?>

                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        var baseurl = "<?php print base_url(); ?>";
                                    </script>
