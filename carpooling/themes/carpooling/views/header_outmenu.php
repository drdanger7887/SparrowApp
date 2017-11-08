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
                    <link rel="stylesheet" href="<?php echo base_url('/'); ?>spcp/customspcp.css?ver=15" type="text/css" media="all">
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

                                            
                                        </div>
                                    </div>

                                    <script type="text/javascript">
                                        var baseurl = "<?php print base_url(); ?>";
                                    </script>
