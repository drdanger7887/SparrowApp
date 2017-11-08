<?php include('header.php'); ?>
<?php include('left.php'); ?>

<script type="text/javascript" language="javascript">

    var baseurl = "<?php print base_url(); ?>";
    function advertisement_ajax(url) {

        $.ajax({
            type: "POST",
            url: baseurl + "admin/advertisement/advertisement_ajax/" + url,
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
<?php echo admin_js('admin.js', true); ?>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Advertisement</span></li>
            </ol>

            <div class="clearfix">
                <h1 class="pull-left">Advertisement</h1>

                <div class="pull-right top-page-ui">
                    <a href="<?php echo base_url('admin/advertisement/form'); ?>" class="btn btn-primary pull-right">
                        <i class="fa fa-plus-circle fa-lg"></i> Add Advertisement
                    </a>
                </div>
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
