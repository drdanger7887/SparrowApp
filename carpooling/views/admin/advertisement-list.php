<div id="splitresult">
    <div class="table-responsive">                                             
        <table class="table user-list table-hover">
            <thead>
                <tr>
                    <th><span>Id</span></th>
                    <th><span>Advertisement Title</span></th>
                    <th><span>Image</span></th>
                    <th><span>Navigation Link</span></th>
                    <th class="text-center"><span>Status</span></th>															
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($advertisement as $ad): ?>

                    <tr>
                        <td>
                            <?= $ad['ad_id'] ?>
                        </td>
                        <td>
                            <?= $ad['ad_title'] ?>
                        </td>
                        <td class="gc_cell_left"><?php if (!empty($ad['image'])) { ?>
                                <img src="<?= theme_advertisement_img($ad['image'], 'small') ?>" height="50px" width="100px"/>
                            <?php } else { ?>
                                <img src="<?= theme_img('No_image_available.png'); ?>" height="50px" width="100px"/>
                            <?php } ?>
                        </td>
                        <td>
                            <?= $ad['ad_nav_link'] ?>
                        </td>            

                        <td class="text-center">
                            <?php if ($ad['isactive'] == 0) { ?>
                                <span class="label label-default" id="label-<?= $ad['ad_id'] ?>">Inactive</span>
                            <?php } else { ?>
                                <span class="label label-success" id="label-<?= $ad['ad_id'] ?>">Active</span>
                            <?php } ?>
                        </td>

                        <td style="width: 20%;" class="bacis">																
                            <a href="<?php echo base_url('admin/advertisement/form/' . $ad['ad_id']); ?>" class="table-link">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="<?php echo base_url('admin/advertisement/delete/' . $ad['ad_id']); ?>" onclick="return areyousure();" class="table-link danger">
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