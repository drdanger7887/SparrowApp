
<style>
    .modal-body {
        position: relative;
        padding: 15px;
        overflow: auto;
    }
</style>

<div class="modal" id="my-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h3><?php echo lang('feed_back'); ?></h3>
            </div>
            <fieldset>
                <div class="modal-body">
                    <div class="alert allert-error" id="form-error" style="display:none; color: red;">
                        <a class="close" data-dismiss="alert"><span aria-hidden="true">×</span></a>
                    </div>		


                    <div class="item form-group col-md-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo lang('name'); ?> : </label>

                        <div class="col-md-9 col-sm-9 col-xs-6">
                            <?php
                            $data = array('name' => 'name', 'value' => set_value('name', $name), 'id' => "name", 'placeholder' => lang('name'), 'class' => 'form-control col-md-7 col-xs-6', 'style' => 'padding:12px 12px');
                            echo form_input($data);
                            ?>
                            <input type="hidden" id="trip_user_id" value="<?php echo $trip_user_id; ?>"/>
                            <input type="hidden" id="enquiry_passanger_id" value="<?php echo $enquiry_passanger_id; ?>"/>
                        </div>
                    </div>

                    <div class="item form-group col-md-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reference"><?php echo lang('user_feedback'); ?></label>


                        <div class="col-md-9 col-sm-9 col-xs-6">
                            <?php
                            $data = array('name' => 'feedback', 'value' => set_value('feedback', $feedback), 'id' => "feedback", 'placeholder' => lang('your_feed_here'), 'class' => 'form-control col-md-7 col-xs-6', 'style' => 'padding:12px 12px');
                            echo form_textarea($data);
                            ?>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal"><?php echo lang('close'); ?></a>
                    <a href="#" class="btn btn-primary" type="button" onclick="save_feedback(); return false;"><?php echo lang('form_submit'); ?></a>
                </div>
            </fieldset>
        </div></div>
</div>
<script type="text/javascript">


    function save_feedback()
    {
        $.post("<?php echo site_url('addtrip/feedback_form'); ?>/" + $('#trip_user_id').val(), {
            name: $('#name').val(),
            feedback: $('#feedback').val(),
            uid: $('#trip_user_id').val(),
            enquiry_passanger_id: $('#enquiry_passanger_id').val(),
        },
                function (data) {
                    if (data == 1)
                    {
                        window.location = "<?php echo site_url('addtrip/past_trip_passenger'); ?>";
                    }
                    else
                    {
                        $('#form-error').html(data).show();
                    }
                });
    }
</script>