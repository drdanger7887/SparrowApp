<?php include('header.php'); 
?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<script type="text/javascript" src="<?php echo theme_js('travel-details-rules.js'); ?>"></script>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function () {

<?php if (empty($txtphone)) { ?>
            $('#txtphone').attr('readonly', false);
            $('#txtphone').removeClass('disable');
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
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
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
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
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
                <p class="center marginbot10 signin1"> Connecting communities together </p>
                <p class="center marginbot10 signin2"> Enter the Sparrow Community with </p>
                <?php
                $attributes = array('id' => 'frmlogin');
                echo form_open('login', $attributes);
                ?>
                <input type="hidden" value="1" name="submitted" />
                <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
                <div class="top-nav reg-nav">
                    <p class="socicon1 col-lg-6 col-md-6 col-sm-6"> <a href="<?php echo base_url('login/facebooklogin'); ?>" class="flogin"> &nbsp; via Facebook </a> </p>
                    <p class="socicon1 col-lg-6 col-md-6 col-sm-6"> <a href="<?php echo base_url('login/googlelogin'); ?>" class="gplogin"> &nbsp; via Google+ </a> </p>
                </div>
                <div class="clear"></div>
                <p class="center margintop20 signin2"> or </p>
                <div class="rowrec reg-inp">

                    <p class="formitem">
                        <span><?php echo lang('email_username'); ?></span>
                        <input type="text" placeholder="<?php echo lang('email_username'); ?>" name="txtUserName" id="txtUserName"/>
                    </p>
                    <p class="formitem">
                        <span><?php echo lang('password'); ?></span>
                        <input type="password" placeholder="<?php echo lang('password'); ?>" name="txtPassword" id="txtPassword" />
                    </p>
                    
                         
                    <input type="Submit" value="<?php echo lang('sign_in'); ?>" class="reg-sbmt margintop20" >
                   


                </div>  <div class="clear"> </div>                  
                <p class="signin2 center margintop20"> Don't have Sparrow account? <a href="<?php echo base_url('register'); ?>">Sign Up here</a> </p>
                   <p class="signin2 center margintop0"> Forgot password? <a href="<?php echo base_url('login/forget_password'); ?>">Reset here</a> </p>
                </form>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3"></div>


        </div>
    </div>
</div>
<div class="container-fluid cs-blue-bg margintop40">
</div>

    <?php include('footer.php'); ?>
   