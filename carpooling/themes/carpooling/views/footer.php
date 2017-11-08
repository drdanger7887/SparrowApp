<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<?= theme_js('subscribe.js', TRUE); ?> 
 <style>
        input.error{border: 1px solid #d9534f;}
    </style>
<div class="container-fluid footerbg paddingtopbot40">
    <div class="container">
        <div class="row footer">


            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 footernp">
                <div class="colorwhite size18">Subscribe to Newsletter</div>
                <div class="ftr-subs marginbot10">
                    <form id="subscribe">   
                        <input type="text" placeholder="<?php echo lang('email_address'); ?>" id="email_id" name="email_id" class="emaddr">
                        <div id="send">
                            <input type="submit" value="<?php echo lang('singn_up'); ?>" class="blue-bg white-text subs-brd">
                        </div>
                    </form>
                </div>
                <div class="clear"></div>
                <p class="colorwhite margintop20 size14"><?php echo lang('newsletter_content'); ?></p>

                <div class="footerlogo margintop40"><a href="<?php echo base_url('home'); ?>" > <img src="<?php echo base_url('/'); ?>spcp/images/cp-logo.png" > </a> </div>

               <p class="colorwhite margintop20 size14 center"><a style="color: #b2e1fa; display: block; padding: 10px; margin-top: 10px;" href="<?php echo base_url('steps_intro'); ?>">Start</a></p>
              

            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-0"></div>

        </div>
    </div>
</div>

<div class="container-fluid ftrbg padding10">
    <div class="container">
        <div class="row footer colorwhite">
            <p class="size14 fleft">SparrowApp &copy; All rights reserved</p>
            <div class="fright">
                <ul class="fleft soc-ico">
                    <li> <a href="<?php echo $this->facebook_link ?>"><img src="<?php echo theme_img('fb-ico.png') ?>"> </a> </li>
                    <li> <a href="<?php echo $this->twitter_link ?>"> <img src="<?php echo theme_img('tw-ico.png') ?>"> </a> </li>
                    <li> <a href="<?php echo $this->google_link ?>"> <img src="<?php echo theme_img('gp-ico.png') ?>"> </a> </li>
                    <li> <a href="<?php echo $this->linkedin_link ?>"> <img src="<?php echo theme_img('in-ico.png') ?>"> </a> </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>