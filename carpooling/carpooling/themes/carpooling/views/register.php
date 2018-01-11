<?php include('header.php'); ?>
<?php $this->load->helper('html'); ?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<script type="text/javascript" src="<?php echo theme_js('travel-details-rules.js'); ?>"></script>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function () {

<?php if (empty($txtphone)) { ?>
      //      $('#txtphone').attr('readonly', false);
       //     $('#txtphone').removeClass('disable');
<?php } ?>

<?php
//lets have the flashdata overright "$message" if it exists
if ($this->session->flashdata('message')) {
    $message = $this->session->flashdata('message');
    ?>
            $.goNotification('<?= $message ?>', {
                type: 'success', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
<?php
}

if ($this->session->flashdata('error')) {
    $error = $this->session->flashdata('error');
    ?>
            $.goNotification("<?= trim($error) ?>", {
                type: 'error', // success | warning | error | info | loading
                position: 'top right', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}

if (function_exists('validation_errors') && validation_errors() != '') {
    $error = validation_errors();
    ?>
            $.goNotification('<?= trim($error) ?>', {
                type: 'error', // success | warning | error | info | loading
                position: 'top right', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 200000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}
?>


    });
</script> 
<?php include('title.php'); ?>

<div class="container-fluid margintop40">
    <div class="container">
        <div class="row"> 
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 reg-main">
                <p class="center marginbot10 signin1"> Connecting Communities Together </p>
                <p class="center marginbot10 signin2"> JOIN SPARROW COMMUNITY WITH </p>
                <?php
                $attributes = array('id' => 'frmregister');
                echo form_open('register', $attributes);
                ?>
                <input type="hidden" name="submitted" value="submitted" />
                <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
                <div class="top-nav reg-nav">
                    <p class="socicon1 col-lg-6 col-md-6 col-sm-6"> <a href="<?php echo base_url('login/facebooklogin'); ?>" class="flogin"> &nbsp; via Facebook </a> </p>
                    <p class="socicon1 col-lg-6 col-md-6 col-sm-6"> <a href="<?php echo base_url('login/googlelogin'); ?>" class="gplogin"> &nbsp; via Google+ </a> </p>
                </div>
                <div class="clear"></div>
                <p class="center margintop20 signin2"> or sign up with email </p>

                <div class="rowrec reg-inp">
                    <p class="formitem">
                        <span><?php echo lang('first_name'); ?></span> 
                        <input type="text" placeholder="<?php echo lang('first_name'); ?>" name="txtfirstname" id="txtfirstname" value="<?= $txtfirstname ?>"/> 
                    </p><p class="formitem">
                         <span><?php echo lang('last_name'); ?></span> 
                        <input type="text" placeholder="<?php echo lang('last_name'); ?>"  name="txtlastname" id="txtlastname" value="<?= $txtlastname ?>" />                    
                    </p><p class="formitem">
                          <span>Email</span> 
                        <input type="text" placeholder="Email" name="txtemail" id="txtemail" value="<?= $txtemail ?>" />
                    </p><p class="formitem">
                          <span><?php echo lang('mobile_no'); ?></span>
                        <input type="text" placeholder="<?php echo lang('mobile_no'); ?>" name="txtphone" id="txtphone" value="<?= $txtphone ?>"/>
                    </p>
                    <p class="formitem">
                          <span><?php echo lang('password'); ?></span> 
                        <input type="password" placeholder="<?php echo lang('password'); ?>" name="txtpassword" id="txtpassword" value="<?= $txtpassword ?>" />
                    </p>
                    <p class="pidsmall">By clicking REGISTER you agree to the <a href="<?php echo base_url('terms-and-conditions'); ?>">Terms and Conditions</a>
                    </p>
                    
                </div>
                
                <input type="submit" value="<?php echo lang('register'); ?>" class="reg-sbmt">
 
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3"></div>
            <!-- Right -->
        </div>
    </div>
</div>
<div class="container-fluid cs-blue-bg margintop40">
</div>
    <?php include('footer.php'); ?>
