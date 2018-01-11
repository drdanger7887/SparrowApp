<?php include('header.php'); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('user_feedback');?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">
                        <h2 class="pst-trip-tit"><?php echo lang('my_feedback'); ?></h2>
                    </div>
                </div>
            </div>
            <div class="fleft width100 margin">              

                <div class="obj_cont p_block_bottom" style="display: none;"></div>
                <div class="obj_cont p_block_bottom" style="display: block;">
                    <div class="my-trp-tab row">
                        <p><?php echo lang('no_feedback'); ?></p>
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