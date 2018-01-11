<?php include('header.php'); ?>
<style>
    .feedback{width:5%;float:left;}
    .back_lamp{width:92%;float:right;margin-bottom: 30px;}
    .lamp-kg{width: 100%;
             float: left;
             margin-bottom: 20px;
             border: solid thin #ddd;
             padding: 5px;}
    .lamp-kg h2{margin-bottom: -15px;}
    .lamp{margin-top: 20px;}
</style>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('user_feedback'); ?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">

                        <h2 class="pst-trip-tit"><?php echo lang('my_feedback'); ?></h2>
                    </div>
                </div>
            </div>


            <div class="fleft width100 margin">


                <div class="obj_cont p_block_bottom" style="display: none;">
                </div>	
                <!-- end tab1 -->

                <div class="obj_cont p_block_bottom" style="display: block;">
                    <div class="my-trp-tab row">


                        <?php
                        if ($feedback_user) {
                            foreach ($feedback_user as $feedback) {
                                ?>

                                <?php if ($feedback['trip_user_id'] == $last_segment) { ?>
                                    <ul>
                                        <li class="feedback"><img src="<?php echo theme_profile_img($feedback['user_profile_img']) ?>" style=" height: 70px; width: 70px; border-radius: 100%;"></li>
                                        <li class="back_lamp"><h3><?php echo $feedback['user_first_name'] . '' . $feedback['user_last_name']; ?></h3>
                                            <p><?php echo $feedback['user_email']; ?></p></li>
                                    </ul>
                                    <br>
                                    <h3><?php lang('comments'); ?></h3><br>
                                    <li class="lamp-kg">
                                        <?php
                                        if ($feedbacks) {
                                            foreach ($feedbacks as $user_feedback) {
                                                ?>

                                                <b><span><?php echo $user_feedback['feedback'] ?></span></b>
                                                <?php
                                            }
                                        }
                                        ?>
                                    <?php } ?>
                                </li>

                                <?php
                            }
                        }
                        ?>                        <!-- Ena Main Trip -->



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