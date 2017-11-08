<?php 
//include('header_home.php'); 


include('header_homelogin.php'); 
?>



<div class="container-fluid center margintop20" style="max-width: 800px"> 
    <div class="new-video-container">
        <iframe src="https://www.youtube-nocookie.com/embed/p3JZy3bUB4Y?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
</div>
<div class="container-fluid center marginbot20 margintop30"> 
<?php if (!$this->auth_travel->is_logged_in(false, false)) { ?>

    <ul class="top-nav new-top-nav" style="margin: 0;">
        <li> <a href="<?php echo base_url('login'); ?>" class="button-sp2 hlogin"> <?php echo lang('login'); ?> </a> </li>
        <li> <a href="<?php echo base_url('register'); ?>" class="button-sp2 hlogin"> <?php echo lang('register'); ?> </a> </li>
    </ul>
 
<?php } ?>
</div>  
<?php include('footer.php'); ?>