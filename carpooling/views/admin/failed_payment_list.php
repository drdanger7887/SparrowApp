<div id="splitresult">
<div class="table-responsive">                                             
<table class="table user-list table-hover">
    <thead>
        <tr>
            <th><span>Order No</span></th>
            <th><span>Payment Date</span></th>
            <th><span>Payment Amount</span></th>                                            
            <th><span>User Amount</span></th>
            <th><span>Site Commission</span></th>
            <th><span>Status</span></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($payments as $payment): 
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
                <?php $commissionAmount = ( $payment['order_amount'] * $payment['order_commission'] ) / 100 ;
                ?>
                <td>
                    <?= $payment['order_amount'] - $commissionAmount?>
                </td>	
                <td>
                    <?php echo $commissionAmount;?>
                </td>
                <td>
                    Failed
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php echo $pagination?>

</div>