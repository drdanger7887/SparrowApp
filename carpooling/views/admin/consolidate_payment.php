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
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Consolidate</span></li>
            </ol>

            <div class="clearfix">
                <h1 class="pull-left">All Consolidate list</h1>

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
