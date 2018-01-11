<?php include('header.php'); ?>

<?php echo theme_css('font-awesome.css', true) ?>

<div class="container-fluid margintop40">
    <div class="container">
        <div class="row margintop40">
            <div class="address-details">     
                <div class="address">
                    <h3><?php echo lang('member'); ?></h3>
                    <p><?php echo lang('sugsuss_message'); ?></p>
                    <label><?php echo lang('trip_name'); ?><span><?php echo $item_name; ?></span></label><br>
                    <label><?php echo lang('txn_id'); ?><span><?php echo $txn_id; ?></span></label><br>
                    <label><?php echo lang('amount_paid'); ?><span>$<?php echo $payment_amt.' '.$currency_code; ?></span></label><br>
                    <label><?php echo lang('payment_status'); ?><span><?php echo $status; ?></span></label><br>
                    <h4><a href="<?php echo base_url('profile#personal-info')?>"><?php echo lang('back'); ?></a> <i class="fa fa-arrow-left"></i></h4>
                </div>
            </div>            
        </div>
    </div>
</div>
<?php include('footer.php'); ?>