<div id="splitresult">
    <div class="table-responsive">                                             
        <table class="table user-list table-hover">
        <thead>
            <tr>
                <th><span>First Name</span></th>
                <th><span>Last Name</span></th>
                <th><span>Phone</span></th>
                <th><span>Email</span></th>														
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($traveller as $travel): ?>
                <tr>
                    <td>
                        <?= $travel['user_first_name'] ?>
                    </td>
                    <td>
                        <?= $travel['user_last_name'] ?>
                    </td>
                    <td>
                        <?= $travel['user_mobile']; ?> 

                    </td>
                    <td>
                        <?= $travel['user_email'] ?>
                    </td>                                                                                               

                    <td style="width: 20%;" class="bacis">																
                        <a target="blank" href="<?php echo base_url('admin/payment/all_payments/' . $travel['user_id']); ?>" class="table-link">
                            <span class="fa-stack">                                                            
                                <i class="fa fa-pencil fa-stack-1x"></i>
                            </span>
                            View Payments
                        </a>                                                    
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <?php echo $pagination?>
</div>