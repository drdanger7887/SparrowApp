
<script type="text/javascript" src="<?= theme_url('assets/js/jquery.validate.js'); ?>"></script>
<script type="text/javascript" src="<?= theme_url('assets/js/jquery.validate-rules.js'); ?>"></script>
<style>
    .modal-body {
    position: relative;
    padding: 15px;
    overflow: auto;
}

.grey-bg {
    background: #FFF;
}
</style>
<div class="modal" id="my-modal">
    <div class="modal-dialog">
    <div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
		<h3><?php echo lang('sign_in_to_carpooling');?></h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 fleft padding20 grey-bg reg-main" id ="loginform" style=" width: 100%">
        
		<?php $attributes = array('id' => 'login_popup');
				 echo form_open('login',$attributes); ?>
           <input type="hidden" value="1" name="submitted" />
			<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
        <ul class="top-nav reg-nav">
          <li> <a href="<?php echo base_url('login/facebooklogin');?>" class="flogin regflogin"> <?php echo lang('login');?> </a> </li>
          <li class="reg-rht"> <a href="<?php echo base_url('login/googlelogin');?>" class="gplogin regglogin"> <?php echo lang('login');?> </a> </li>
        </ul>
        <ul class="rowrec reg-inp">
          <li>
            <span><?php echo lang('email_username');?></span>
            <input type="text" placeholder="<?php echo lang('email_username'); ?>" name="txtUserName" id="txtUserName"/>
          </li>
          <li>
            <span><?php echo lang('password'); ?></span>
            <input type="password" placeholder="<?php echo lang('password'); ?>" name="txtPassword" id="txtPassword" />
          </li>
          <li> <p> <a href="<?php echo base_url('login/forget_password'); ?>"><?php echo lang('forgot_password');?>?</a> </p> </li>
          <li>       
            <input type="Submit" value="<?php echo lang('sign_in');?>" class="fright reg-sbmt" >
          </li>
        </ul>
        </form>
      
             </div> </div>
    </div>
</div>



