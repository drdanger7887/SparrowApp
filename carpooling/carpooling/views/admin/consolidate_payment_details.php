<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php echo admin_js('admin.js', true); ?>
<script type="text/javascript" language="javascript">

    var baseurl = "<?php print base_url(); ?>";
    function consolidate_ajax(url) {

        $.ajax({
            type: "POST",
            url: baseurl + "admin/payments/consolidate_ajax/" + url,
            success: function (html) {
                var message = $('<div />').append(html).find('#splitresult').html();
                $("#pageresult").html(message);
                $('body').find('.bacis a').popover();
            }
        });
    }

    function areyousure()
    {
        return confirm('<?php echo 'Are you want to delete this'; ?>');
    }
</script>

<div id="content-wrapper">
    <div class="row">
            <div class="col-lg-12">

                    <div class="row">
                            <div class="col-lg-12">
                                    <ol class="breadcrumb">
                                            <li><a href="<?php echo base_url('admin');?>">Home</a></li>
                                            <li class="active"><span>Consolidate Payment Details</span></li>
                                    </ol>

                                    <h1>Consolidate Payment Details</h1>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-lg-12">
                                    <div class="main-box clearfix">                                            
                                            <div class="main-box-body clearfix">
                                                    <div id="invoice-companies" class="row">                                                            
                                                            <div class="col-sm-4 invoice-box invoice-box-dates">
                                                                    <div class="invoice-dates">
                                                                            <div class="invoice-date clearfix">
                                                                                    Traveller Name - <strong> <?=$traveller->user_first_name.' '.$traveller->user_last_name?></strong>
                                                                                    <span class="pull-right"></span>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                            <div class="col-sm-4 invoice-box invoice-box-dates">
                                                                    <div class="invoice-dates">                                                                           
                                                                            <div class="invoice-date clearfix">
                                                                                    Traveller Email - <strong><?=$traveller->user_email?></strong>
                                                                                    <span class="pull-right"></span>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>

                                                    <div class="table-responsive">
                                                            <table class="table">
                                                                    <thead>
                                                                            <tr>
                                                                                    <th class="text-center"><span>Order No</span></th>
                                                                                    <th class="text-center"><span>Payment Date</span></th>
                                                                                    <th class="text-center"><span>Trip Point</span></th>
                                                                                    <th class="text-center"><span>Traveller Amount</span></th>
                                                                                    <th class="text-center"><span>Site Commission</span></th>
                                                                                    <th class="text-center"><span>Total</span></th>
                                                                            </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                                        $totalAmount = 0;    
                                                                        foreach ($payments as $payment): 
                                                                            $commissionAmount = ( $payment['order_amount'] * $payment['order_commission'] ) / 100 ;
                                                                            $totalAmount = $totalAmount + $payment['order_amount'];
                                                                            $row = json_decode($payment['payment_fields'], true);
                                                                            ?>
                                                                            <tr>
                                                                                    <td class="text-center">
                                                                                            <?= $payment['order_number'] ?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                            <?= date('d, M Y', strtotime($payment['order_date_time'])) ?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                            <?=$row['item_name']?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                            &dollar;<?= $payment['order_amount'] - $commissionAmount?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                            &dollar;<?=$commissionAmount?>
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                            &dollar;<?= $payment['order_amount']?>
                                                                                    </td>                                                                                    
                                                                            </tr> 
                                                                         <?php endforeach; ?>   
                                                                    </tbody>
                                                            </table>
                                                    </div>

                                                    <div class="invoice-box-total clearfix">                                                            
                                                            <div class="row grand-total">
                                                                    <div class="col-sm-9 col-md-10 col-xs-6 text-right invoice-box-total-label">
                                                                            Grand total
                                                                    </div>
                                                                    <div class="col-sm-3 col-md-2 col-xs-6 text-right invoice-box-total-value">
                                                                            &dollar; <?=$totalAmount?>
                                                                    </div>
                                                            </div>
                                                    </div>

                                                    
                                            </div>
                                    </div>
                            </div>
                    </div>

            </div>
    </div>



    <?php include('footer.php'); ?>
