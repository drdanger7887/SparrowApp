<?php include('header.php'); ?>

<?php echo theme_css('font-awesome.css', true) ?>

<div class="container-fluid margintop40">
    <div class="container">
        <div class="row margintop40">
            <div class="address-details">     
                <div class="address">
                    <h3><?php echo lang('member'); ?></h3>
                    <p style="color:#D70000; font-size:16px; font-weight:bold;"><?php echo lang('sorry_message');?></p>                    
                    <h4><a href="<?php echo base_url('profile#personal-info')?>">Back</a> <i class="fa fa-arrow-left"></i></h4>
                </div>
            </div>           
        </div>
    </div>
</div>
<?php include('footer.php'); ?>    
