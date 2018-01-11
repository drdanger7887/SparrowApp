<?php include('header.php'); ?>
<?php include('left.php'); ?>

<script type="text/javascript" language="javascript">

    var baseurl = "<?php print base_url(); ?>";
    function success_ajax(url) {

        $.ajax({
            type: "POST",
            url: baseurl + "admin/payments/success_ajax/" + url,
            success: function (html) {
                var message = $('<div />').append(html).find('#splitresult').html();
                $("#pageresult").html(message);
                $('body').find('.bacis a').popover();
            }
        });
    }

    
</script>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Success Payments</span></li>
            </ol>

            <div class="clearfix">
                <h1 class="pull-left">All Success Payments</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                        <div id="pageresult">
                            <div class="table-responsive">                                             
                                <table class="table user-list table-hover">
                                    <thead>
                                        <tr>
                                            <th><span>Order No</span></th>
                                            <th><span>Payment Date</span></th>
                                            <th><span>Payment Amount</span></th>
                                            <th><span>TXD - ID</span></th>
                                            <th><span>Trip Name</span></th>
                                            <th><span>User Amount</span></th>
                                            <th><span>Site Commission</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payments as $payment): 
                                            $row = json_decode($payment['payment_fields'], true)
                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $payment['order_number'] ?>
                                                </td>
                                                <td>
                                                    <?= date('d, M Y', strtotime($payment['order_date_time'])) ?>
                                                </td>															
                                                <td>
                                                    <?= $payment['order_amount'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['txn_id'] ?>
                                                </td>
                                                <td>
                                                    <?= $row['item_name'] ?>
                                                </td>
                                                <?php $commissionAmount = ( $payment['order_amount'] * $payment['order_commission'] ) / 100 ;
                                                ?>
                                                <td>
                                                    <?= $payment['order_amount'] - $commissionAmount?>
                                                </td>	
                                                <td>
                                                    <?php echo $commissionAmount;?>
                                                </td>
                                                
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $pagination ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        $(document).ready(function () {
            $('body').find('.bacis a').popover();
        });
    </script>


    <?php include('footer.php'); ?>
