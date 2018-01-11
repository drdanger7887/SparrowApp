<div id="splitresult">
    <div class="table-responsive">                                             
        <table class="table user-list table-hover">
            <thead>
                <tr>
                    <th><span>Id</span></th>
                    <th><span>Payment Name</span></th>
                    <th><span>Payment Id</span></th>
                    <th class="text-center"><span>Status</span></th>															
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
           <tbody>
                <?php foreach ($payments as $payment): ?>
                    <tr>
                        <td>
                            <?=  $payment->id; ?>
                        </td>
                        <td>
                            <?= $payment->payment_type; ?>
                        </td>
                        <td>
                            <?= $payment->payment_id; ?>
                        </td>
                        
                        <td class="text-center">
                            <?php if ($payment->is_active == 0) { ?>
                                <span class="label label-default" id="label-<?= $payment->id; ?>">Inactive</span>
                            <?php } else { ?>
                                <span class="label label-success" id="label-<?= $payment->id; ?>">Active</span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" id="btn-<?= $payment->id; ?>">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    Change Status <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if ($payment->is_active == 0) { ?>
                                        <li style="border:0px; height:auto; padding:0px;"><a href="#" id="enable-<?= $payment->id; ?>" class="change-status-country" rel="<?= $payment['id'] ?>">Enable</a></li>
                                    <?php } else { ?>
                                        <li style="border:0px; height:auto; padding:0px;"><a href="#" id="disable-<?= $payment->id; ?>" class="change-status-country" rel="<?= $payment['id'] ?>">Disable</a></li>
                                    <?php } ?>

                                    <li class="divider"></li>
                                </ul>

                            </div>
                        </td>
                        <td style="width: 20%;" class="bacis">
                            <a href="#" class="table-link">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="<?php echo base_url('admin/payment/form/' . $payment->id); ?>" class="table-link">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="<?php echo base_url('admin/payment/delete/' . $paymengt->id); ?>"  onclick="return areyousure();" class="table-link danger">
                                            <span class="fa-stack">
                                                            <i class="fa fa-square fa-stack-2x"></i>
                                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                        </span>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php echo $pagination ?>

</div>    
                      
               