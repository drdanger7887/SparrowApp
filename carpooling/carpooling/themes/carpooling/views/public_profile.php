<?php include('header.php'); ?>
<?php echo theme_css('font-awesome.css', true) ?>
<?= theme_js('rate.js', true) ?>
<style type="text/css">
    .user_image{
        height: 100px;
        width: 100px;
    }
    .profile_info{ padding-left: 60px;}
    .profile-left{ margin-top: 0px;    margin-left: 920px;
                   margin-top: -38%;}
    .profile-right{ width: 95%;}
    .bio_text{ color: #000;}
    .profile-bottom{margin-bottom: 100px;}
</style>

<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">	
            <div class="col-lg-8 col-md-8 col-sm-9 profile-bottom ">  
                <div class="rowrec margin">
                    <div class="trip-lft profile-right">
                        <div class="Speech-memberPhoto">
                            <img class="u-rounded user_image" src="<?php echo ($public_profile['user_profile_img']) ? theme_profile_img($public_profile['user_profile_img']) : theme_img('default.png'); ?>"s aria-hidden="true" height="36" width="36">
                        </div>
                        <div class="fleft paddingtop10 profile_info">
                            <strong class="size16">
                                <a href="javascript:void(0)" class="cs-blue-text"><?= $public_profile['user_first_name'] . ' ' . $public_profile['user_last_name'] ?></a>
                            </strong><br>

                            <small class="size13" > 

                                <?php
                                if (!empty($public_profile['user_dob'])) {
                                    echo lang('dob') . ':' . date("d-m-Y", strtotime($public_profile['user_dob']));
                                } else {
                                    echo lang('user_is_not_specified');
                                }
                                ?>
                            </small><br>
                            <small class="size14" >
                                <?php echo lang('age'); ?>:  
                                <?php
                                if (!empty($public_profile['user_dob'])) {
                                    $from = new DateTime($public_profile['user_dob']);
                                    $to = new DateTime('today');
                                    echo $from->diff($to)->y;
                                } else {
                                    echo lang('user_is_not_specified');
                                }
                                ?>
                            </small>                                                         

                        </div>
                        <div class="rowrec line4"></div>
                        <div class="sea-city-city cs-blue-text padding10"><b>
                                <span class="rowrec size14"> 
                                    <span class="fleft"> <?php echo lang('ratings'); ?>: </span>
                                    <div class="starrow fleft marginleft10">
                                        <script>rate(<?= getOverallRating($public_profile['user_id']) ?>);</script>                
                                    </div>
                                </span> </b> 
                        </div>

                        <div class="rowrec line4"></div>

                        <div class="sea-city-city cs-blue-text padding10"><b>
                                <span class="rowrec size14">                                 

                                    <span class="fleft"> <?php echo lang('about_me'); ?>: </span>
                                    <div class="starrow fleft marginleft10 bio_text">
                                        <?php
                                        if (!empty($public_profile['user_about_us'])) {

                                            echo ($public_profile['user_about_us']);
                                        } else {
                                            echo lang('no_bio');
                                        }
                                        ?>
                                    </div>

                                </span>
                            </b>
                        </div>
                        <div class="rowrec line4"></div>
                    </div></div>

                <div class="trip-lft" style=" width: 100%">
                    <?php if (!empty($comment_user)) { ?>
                    <?php //echo'<pre>'; print_r($comment_user); die; ?>
                        <div class="comments-content">
                            <div id="comment-holder"><br>
                                <b><h4><?php echo lang('passengers_comments'); ?></h4></b><br>
                                
                                <div id="bc_0_96C" >                                    
                                    <div id="bc_0_96CT">
                                        <div id="bc_0_95T" class="comment-thread">
                                            <ol id="bc_0_95TB">                                                
                                                <li id="bc_0_0B" class="comment">                                                   


                                                    <div class="avatar-image-container">
                                                        <img src="<?= theme_profile_img($comment_user['user_profile_img']) ?>">
                                                    </div>
                                                    <div id="c7016086569795689367" class="comment-block">
                                                        <div id="bc_0_0M" class="comment-header" >

                                                            <cite class="user"><a rel="nofollow" href="#"><?php echo $comment_user['user_first_name'] . '' . $comment_user['user_first_name']; ?></a></cite>
                                                            <span class="icon user"></span>

                                                            <span class="datetime secondary-text">
                                                                <a rel="nofollow" href="#"><?php echo date("d-m-Y", strtotime($comment_user['create_date'])); ?></a>
                                                            </span>
                                                        </div>
                                                        <p id="bc_0_0MC" class="comment-content"><?php echo $comment_user['feedback']; ?></p>                                                   

                                                        <span id="bc_0_0MN" class="comment-actions secondary-text">
                                                            <a  href="#" ></a>
                                                            <span class="item-control blog-admin pid-341383209">
                                                                <a  href="#">Delete</a></span></span></div></div>

                                                    </div></div>

                                                    </div></div>

                                                <?php } ?>

                                                </div>
                                                </div>



                                                </div>

                                                </div>
                                                <!-- End Left -->

                                                <div class="col-lg-4 col-md-3 col-sm-3 cs-lgrey-bg fleft top-left profile-left" style=" margin-top: -400px;">
                                                    <!-- End -->





                                                    <div class="rowrec line4"></div>
                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> 
                                                        <span>
                                                            <img src="<?php echo theme_img('suitcase-ico.png'); ?>">
                                                            <?php echo lang('id_proof'); ?> 
                                                        </span>
                                                    </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;"></div>

                                                    <span class="trp-imge paddingtop5"><i class="fa fa-credit-card" aria-hidden="true" style=" color: #01acf1;"></i></span> <strong class="size14 paddingleft8"><?php echo $public_profile['licence_number'] ?> </strong>

                                                    <div class="rowrec line4" style=" margin-top: 6px;"></div>

                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> 
                                                        <span> 
                                                            <img src="<?php echo theme_img('suitcase-ico.png'); ?>"> 
                                                        </span> 
                                                        <?php echo lang('my_verifications'); ?>                                                         
                                                    </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;"></div>

                                                    <ul class="rowrec trp-cont-rht">
                                                        <li>
                                                            <span class="trp-imge paddingtop5"><img src="<?php echo theme_img('mobile-ico.png'); ?>"></span> <strong class="size14 paddingleft8"><?php echo lang('phone'); ?> </strong>

                                                            <?php if ($public_profile['show_number'] == 1) {
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



                                                    <div class="rowrec line4"></div>

                                                    <h3 class="rowrec cs-lgrey-bg padding10" style=" margin-top: -10px;"> <span> <img src="<?php echo theme_img('suitcase-ico.png'); ?>"> </span> <?php echo lang('activity'); ?> </h3>

                                                    <div class="rowrec line4" style=" margin-top: 5px;"></div>

                                                    <ul class="size14 row trp-cont-rht">           
                                                        <li><span class="trp-imge paddingtop5"><img src="<?php echo theme_img('cal-14-14.png'); ?>" width="12" height="12"></span> <strong class="paddingleft8"><?php echo('since'); ?></strong>: <?php echo date('d/m/Y', strtotime($public_profile['user_created_date'])); ?></li>
                                                        <li><span class="trp-imge paddingtop5"><img src="<?php echo theme_img('time-ico.png'); ?>"></span> <strong class="paddingleft8"><?php echo lang('last_visit'); ?></strong>: <?php echo date('d/m/Y', strtotime($public_profile['user_lost_login'])); ?></li>

                                                    </ul>

                                                    <div class="rowrec line4"></div>


                                                    <!-- End 2  right row -->

                                                </div>


                                                </div>
                                                </div>


                                                <?php include('footer.php'); ?>