<?php include('header.php'); ?>
<?php include('left.php'); ?>
<script type="text/javascript" language="javascript">

    var baseurl = "<?php print base_url(); ?>";
    function comport_ajax(url) {

        $.ajax({
            type: "POST",
            url: baseurl + "admin/comport_level/comport_ajax/" + url,
            success: function (html) {
                var message = $('<div />').append(html).find('#splitresult').html();
                $("#pageresult").html(message);
            }
        });
    }

    function areyousure()
    {
        return confirm('<?php echo 'Are you want to delete this'; ?>');
    }

    $('body').on("click", '.change-status', function (e) {

        var mid = $(this).attr("rel");
        var ID = $(this).attr("id");
        var temp = ID.split("-");
        var status = temp[0];
        var dataString = 'mid=' + mid + '&status=' + status;
        $.ajax({
            type: "POST",
            url: baseurl + "admin/comport_level/change_status",
            data: dataString,
            cache: false,
            success: function (html) {
                if (html) {

                    if (status == 'enable')
                    {

                        $('#label-' + mid).addClass('label-success').removeClass('label-default');
                        $('#label-' + mid).html('Active')
                        $('#btn-' + mid).removeClass('open')
                        $('#' + status + '-' + mid).html('Disable').attr("id", "disable-" + mid);

                    } else if (status == 'disable')
                    {
                        $('#label-' + mid).addClass('label-default').removeClass('label-success');
                        $('#label-' + mid).html('Inactive')
                        $('#btn-' + mid).removeClass('open')
                        $('#' + status + '-' + mid).html('Enable').attr('id', 'enable-' + mid);
                    }
                }
            }
        });

        return false;

    });

</script> 
<script src="<?php echo base_url('assets/js/plugins/datatable/jquery.dataTables.min.js'); ?>"></script>
<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Comport level</span></li>
            </ol>
            <div class="clearfix">
                <h1 class="pull-left">
                    <?php if (!empty($page_title)): ?>
                        <?php echo $page_title; ?>
                    <?php endif; ?>
                </h1>
                <div class="pull-right top-page-ui"> <a href="<?php echo base_url('admin/comport_level/form'); ?>" class="btn btn-primary pull-right"> <i class="fa fa-plus-circle fa-lg"></i> Add New Comport level </a> </div>
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
                            <?php echo $pagination; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.bacis a').popover();
        });
    </script>
    <?php include('footer.php'); ?>