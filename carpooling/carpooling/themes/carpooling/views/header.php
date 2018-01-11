<?php 
    $this->CI = & get_instance();
    $carpool_session['carpool_session'] = $this->CI->carpool_session->userdata('carpool');

    $id = $carpool_session['carpool_session']['user_id'];
    $profile = $this->auth_travel->get_travel($id);

    if ($this->auth_travel->is_logged_in(false, false)) {
        if(!$profile->user_notfirst) {header('Location: '.base_url("steps_intro")); }
            //redirect();
    } 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title><?= $seo_title; ?></title>
    <meta name="description" content="<?= $seo_description; ?>" />
    <meta name="keywords" content="<?= $seo_keyword; ?>" />

    <?php echo theme_css('bootstrap.min.css', true); ?>

    <?php echo theme_css('bootstrap-theme.css', true); ?>

    <?php echo theme_css('style.css', true); ?>

    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customspcp.css?ver=58" type="text/css" media="all">




    <script type="text/javascript" src="<?= theme_url('assets/js/jquery-1.12.2.min.js'); ?>"></script>                           
    <script type="text/javascript" src="<?= theme_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.1.0.js"></script>

    <script type="text/javascript">
        
        var baseurl = "<?php print base_url(); ?>";

        $(document).ready(function () {
            
            $(".my-account-button").click(function () {
                $(".my-account-details").fadeToggle("fast", function () {
                    if ($(".my-account-details").css('display') == "none")
                    {
                      //  $(".my-account-button").removeClass("active");
                        $("#dropimg").html('<img src="<?php echo base_url('/'); ?>spcp/images/icon-down.png">');

                    } else {
                        $("#dropimg").html('<img src="<?php echo base_url('/'); ?>spcp/images/icon-up.png">');
                       // $(".my-account-button").addClass("active");
                    }
                });
            });
            
        });
    </script>

    <!--  Desktop Favicons  -->
    <link rel="icon" type="image/png" href="<?php echo base_url('/'); ?>spcp/images/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo base_url('/'); ?>spcp/images/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo base_url('/'); ?>spcp/images/favicon-96x96.png" sizes="96x96">

    </head>

    <body class="<?php if(isset($bodyclass)) echo $bodyclass; ?>">


    <div class="container-fluid topheader">
        <div class="container">
            <div class="logo">
                <a  title="Sparrow App" href="<?php echo base_url('/'); ?>">
                <img src="<?php echo base_url('/'); ?>spcp/images/sparrow-logo-header.png" alt="Sparrow App"> 
                </a>
            </div>

            <div class="head-rht"> 
                <?php
                if ($this->auth_travel->is_logged_in(false, false)) { ?>	

                <ul class="top-nav">
                    <li><a href="<?php echo base_url('community'); ?>" class="">COMMUNITIES</a></li>
                    <li><a href="<?php echo base_url('rewards'); ?>" class="">REWARDS</a></li>
                    <li class="lprofile">
                        <div id="myaccount">
                            <div class="my-account-button">
                                <a>Profile</a><span id="dropimg"><img src="<?php echo base_url('/'); ?>spcp/images/icon-down.png"></span> 

                            </div>                                
                            <div class="my-account-details" style="display: none">
                                <ul class="nav-set">
                                    <li><a href="<?php echo base_url('profile'); ?>"> <img src="<?php echo base_url('/'); ?>spcp/images/icon-menu-profile.png"> PROFILE SETTINGS </a></li>
                                    <li><a href="<?php echo base_url('addtrip'); ?>"><img src="<?php echo base_url('/'); ?>spcp/images/icon-menu-ride.png" style="" > <?php echo lang('pro_my_trips'); ?> </a></li>
                                    <li class="hidden"><a href="<?php echo base_url('rating'); ?>"> <img src="<?php echo theme_img('star-ico.png') ?>"style=" width: 17px"> <?php echo lang('my_ratings'); ?> </a></li>
                                    <li class="hidden"><a href="<?php echo base_url('addtrip/payments_list'); ?>"> <img src="<?php echo theme_img('money.png') ?>" style=" width: 17px"> <?php echo lang('my_payments'); ?> </a></li>
                                    <li class="hidden"><a href="<?php echo base_url('trip/passanger_questions'); ?>"> <img src="<?php echo theme_img('people .png') ?>" style=" width: 17px"> <?php echo lang('passangeres_questions'); ?> </a></li>
                                    <li class=""><a href="<?php echo base_url('rewards/myrewards'); ?>"> <img src="<?php echo base_url('/'); ?>spcp/images/icon-menu-reward.png" > My Rewards </a></li>
                                    <li class=""><a href="<?php echo base_url('payments'); ?>"> <img src="<?php echo base_url('/'); ?>spcp/images/icon-menu-payments.png" > My Payments </a></li>
                                    <li><a class="noborder" href="<?php echo base_url('login/logout'); ?>"> <img src="<?php echo base_url('/'); ?>spcp/images/icon-menu-logout.png"> <?php echo lang('logout'); ?> </a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li><a href="<?php echo base_url('payments'); ?>" class="moneypoints" title="My payments"><img src="<?php echo base_url('/'); ?>spcp/images/icon-coin.png">
                                    <?php $usermoney = $this->auth_travel->show_usermoney($profile->user_id);
                                    echo $usermoney[0]['money_count']; ?>
                        </a>
                    </li>
                </ul>
                <?php } else { ?>
                <div class="logreg">
                    <ul class="top-nav">
                        <li> <a href="<?php echo base_url('login'); ?>" class=""> <?php echo lang('login'); ?> </a> </li>
                        <li> <a href="<?php echo base_url('register'); ?>" class=""> <?php echo lang('register'); ?> </a> </li>
                    </ul>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>




