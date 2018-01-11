<div id="pageresult">
    <div class="table-responsive">                                             
        <table class="table user-list table-hover">
            <thead>
                <tr>
                    <th><span>Distance From</span></th>
                    <th><span>Distance To</span></th>
                    <th><span>Radius</span></th>																													
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($radiuses as $radius): ?>
                    <tr>
                        <td>
                            <?= $radius['distance_from'] ?>
                        </td>
                        <td>
                            <?= $radius['distance_to'] ?>
                        </td>															
                        <td>
                            <?= $radius['radius'] ?>
                        </td>
                        <td style="width: 20%;" class="bacis">																
                            <a href="<?php echo base_url('admin/radius/form/' . $radius['id']); ?>" class="table-link">
                                <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="<?php //echo base_url('admin/radius/delete/' . $radius['id']);  ?>" onclick="return areyousure();" class="table-link danger">
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