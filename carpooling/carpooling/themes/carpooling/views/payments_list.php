<?php include('header.php'); ?>

<?php echo theme_js('tab.js', true); ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
            $(document).ready(function() {
    
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

  });</script>
<?php echo theme_js('common.js', true); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('my_payments'); ?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">

                        <h2 class="pst-trip-tit"><?php echo lang('my_payments'); ?></h2>
                    </div>
                </div>
            </div>


            <div class="fleft width100 margin">
                <div class="p_top">
                    <a id="a_tab" class="b_t_1  active" onclick="tab_tab(this, 'p_block_bottom'), height_right()"><?php echo lang('my_payments'); ?></a>
                    <div class="cr">
                    </div>
                </div>

                <div class="obj_cont p_block_bottom rowrec" style="display: block;">
                    <div class="my-trp-tab row">
                        <div class="my-trp-main">
                            <a href="#" class="trp-main-active"><?php echo lang('rides_offered');?> </a>
                            <a href="<?=base_url('addtrip/payments_list_passenger')?>"><?php echo lang('enquiry');?> </a>
                        </div>
                        <div class="my-trp-content rowrec" id="pageresult">
                            <h3><?php echo lang('payment_information'); ?></h3><br/>
                            <div class="add_trip_enquery_tbl">
                                <?php if ($payments) { ?>         	
                                    <table valign="center" cellpadding="0" cellspacing="0"  width="100%">
                                        <tbody><tr class="table-front">
                                                <th> <?php echo lang('payment_date'); ?></th>
                                                <th> <?php echo lang('trip_source'); ?></th>
                                                <th> <?php echo lang('trip_date'); ?></th>  
                                                <th> <?php echo lang('vehicle_number'); ?> </th>                            
                                                <th> <?php echo lang('passenger_name'); ?> </th>
                                                <th> <?php echo lang('passenger_number'); ?> </th>
                                                <th> <?php echo lang('passenger_email'); ?> </th>
                                                <th> <?php echo lang('payment_amount'); ?> </th>
                                            </tr>  

                                            <?php foreach ($payments as $payment) { 
                                                    $row = json_decode($payment->payment_fields,true)
                                                ?>

                                                <tr>                        	
                                                    <td> <?= date('d, M Y', strtotime($payment->order_date_time)) ?> </td>
                                                    <td><?=$row['item_name']?></td>
                                                    <td> <?= date('d, M Y', strtotime($payment->order_trip_date)) ?> </td>
                                                    <td> <?= $payment->vechicle_number ?> </td>
                                                    <td> <?= $payment->user_first_name . '.' . $payment->user_last_name ?> </td> 
                                                    <td> <?= $payment->user_mobile ?> </td>  
                                                    <td> <?= $payment->user_email ?> </td>  
                                                    <td class="lst"> <?= $payment->order_amount ?></td>                                                                               
                                                </tr>   
                                            <?php } ?>
                                        </tbody></table>
                                <?php
                                } else {

                                    echo lang('no_payments');
                                }
                                ?>

                            </div>
                        </div>
                        <!-- end tab1 -->



                    </div>
                </div>
                <!-- end tab2 -->

            </div>

        </div>
        <!-- End -->

    </div>


</div>

<?php include('footer.php'); ?>
