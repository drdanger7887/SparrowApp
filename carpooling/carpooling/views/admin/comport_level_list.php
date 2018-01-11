<div id="splitresult">
    <div class="table-responsive">
        <table class="table user-list table-hover">
            <thead>
                <tr>
                    <th><?php echo 'Comport Id'; ?></th>
                    <th><?php echo 'Comport level name'; ?></th>
                    <th><?php echo 'Comport level logo'; ?></th>
                    <th><?php echo 'Status'; ?></th>                                            
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comport_level as $comport): ?>
                    <tr>                                               
                        <td class="gc_cell_left"><?php echo $comport->comport_id; ?></td>
                        <td class="gc_cell_left"><?php echo $comport->comport_level; ?></td>    
                        <td class="gc_cell_left"><?php if (!empty($comport->comport_logo)) { ?>
                                <img src="<?= theme_comport_img($comport->comport_logo, 'small') ?>"/>
                            <?php } else { ?>
                                <img src="<?= theme_img('no-photos.png'); ?>"/>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if ($comport->is_active == 0) { ?>
                                <span class="label label-default" id="label-<?= $comport->comport_id; ?>">Inactive</span>
                            <?php } else { ?>
                                <span class="label label-success" id="label-<?= $comport->comport_id; ?>">Active</span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <div class="btn-group" id="btn-<?= $comport->comport_id; ?>">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    Change Status <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if ($comport->is_active == 0) { ?>
                                        <li style="border:0px; height:auto; padding:0px;"><a href="#" id="enable-<?= $comport->comport_id; ?>" class="change-status" rel="<?= $comport->comport_id; ?>">Enable</a></li>
                                    <?php } else { ?>
                                        <li style="border:0px; height:auto; padding:0px;"><a href="#" id="disable-<?= $comport->comport_id; ?>" class="change-status" rel="<?= $comport->comport_id; ?>">Disable</a></li>
                                    <?php } ?>

                                    <li class="divider"></li>
                                </ul>

                            </div>
                        </td>
                        <td style="width: 20%;" >
                            <a href="<?php echo base_url('admin/comport_level/form/' . $comport->comport_id); ?>" class="table-link">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="<?php echo base_url('admin/comport_level/delete/' . $comport->comport_id); ?>"  onclick="return areyousure();" class="table-link danger"> <span class="fa-stack"> <i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i> </span> </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
    <?php echo $pagination ?>

</div>