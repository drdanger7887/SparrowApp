<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php echo admin_js('admin.js', true); ?>
<script type="text/javascript" language="javascript">

    var baseurl = "<?php print base_url(); ?>";
    function trip_ajax(url) {

        $.ajax({
            type: "POST",
            url: baseurl + "admin/trip/trip_ajax/" + url,
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
</script>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Trips</span></li>
            </ol><br><br>

            <div class="clearfix">

                <?php
                $attributes = array('id' => 'search', 'method' => 'post');
                echo form_open($this->config->item('admin_folder') . '/trip', $attributes);
                ?>

                <div class=" col-md-8">
                    <div class="form-group">
                        <span class="desc"></span>
                        <div class="controls">
                            <?php
                            $element = array('name' => 'keyword', 'value' => set_value('keyword', $search['keyword']), 'class' => 'form-control keyword', 'id' => 'keyword', 'placeholder' => 'Enter Search Key Word');
                            echo form_input($element);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <span class="desc"></span>
                        <div class="controls">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
                </form>

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
                                            <th><span>Trip Date</span></th>
                                            <th><span>Trip User</span></th>
                                            <th><span>User Email</span></th>
                                            <th><span>Trip Vehicle</span></th>
                                            <th><span>Number</span></th>
                                            <th><span>Trip Type</span></th>
                                            <th><span>Source</span></th>
                                            <th><span>Destination</span></th>
                                            <th class="text-center"><span>Status</span></th>															

                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($admintrips as $trip_detail): ?>

                                            <tr>
                                                <td>
                                                    <?php echo date('d/m/Y', strtotime($trip_detail->trip_created_date)); ?> 
                                                </td>
                                                <td>
                                                    <?= $trip_detail->user_first_name; ?>
                                                </td>
                                                <td>
                                                    <?= $trip_detail->user_email; ?>
                                                </td>
                                                <td>
                                                    <?= $trip_detail->vechicle_type_name; ?>
                                                </td>
                                                <td>
                                                    <?= $trip_detail->vechicle_number; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($trip_detail->trip_casual_date)) {
                                                        echo 'Casual';
                                                    } else {
                                                        echo 'Regular';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?= $trip_detail->source; ?>
                                                </td>
                                                <td>
                                                    <?= $trip_detail->destination; ?>
                                                </td>															
                                                <td class="text-center">
                                                    <?php if ($trip_detail->trip_status == 0) { ?>
                                                        <span class="label label-default" id="label-<?= $trip_detail->trip_id; ?>">Inactive</span>
                                                    <?php } else { ?>
                                                        <span class="label label-success" id="label-<?= $trip_detail->trip_id; ?>">Active</span>
    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" id="btn-<?= $trip_detail->trip_id; ?>">
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                            Change Status <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <?php if ($trip_detail->trip_status == 0) { ?>
                                                                <li style="border:0px; height:auto; padding:0px;"><a href="#" id="enable-<?= $trip_detail->trip_id; ?>" class="change-status-trip" rel="<?= $trip_detail->trip_id; ?>">Enable</a></li>
                                                            <?php } else { ?>
                                                                <li style="border:0px; height:auto; padding:0px;"><a href="#" id="disable-<?= $trip_detail->trip_id; ?>" class="change-status-trip" rel="<?= $trip_detail->trip_id; ?>">Disable</a></li>
    <?php } ?>

                                                            <li class="divider"></li>
                                                        </ul>

                                                    </div>
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


<?php include('footer.php'); ?>
