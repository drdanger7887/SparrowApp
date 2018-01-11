
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
                <h3><?php echo lang('ques_form'); ?></h3>
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
                            $data = array('name' => 'name', 'value' => set_value('name', $name), 'id' =>"name" , 'placeholder' => lang('name'), 'class' => 'form-control col-md-7 col-xs-6', 'style' => 'padding:12px 12px');
                            echo form_input($data);
                            ?>
                            <input type="hidden" id="trip_led_id" value="<?php echo $trip_led_id; ?>"/>

                        </div>
                    </div>



                    <div class="item form-group col-md-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reference"><?php echo lang('email'); ?>: </label>


                        <div class="col-md-9 col-sm-9 col-xs-6">
                            <?php
                            $data = array('name' => 'email', 'value' => set_value('email', $email), 'id' => "email", 'placeholder' => lang('email'), 'class' => 'form-control col-md-7 col-xs-6', 'style' => 'padding:12px 12px');
                            echo form_input($data);
                            ?>
                        </div>
                    </div>

                    <div class="item form-group col-md-12">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reference"><?php echo lang('user_ques'); ?></label>


                        <div class="col-md-9 col-sm-9 col-xs-6">
                            <?php
                            $data = array('name' => 'questions', 'value' => set_value('questions', $questions), 'id' => "questions", 'placeholder' => lang('aks_ques_here'), 'class' => 'form-control col-md-7 col-xs-6', 'style' => 'padding:12px 12px');
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
        $.post("<?php echo site_url('trip/ask_question'); ?>/" + $('#trip_led_id').val(), {
            name: $('#name').val(),
            email: $('#email').val(),
            questions: $('#questions').val(),
            trip_led_id: $('#trip_led_id').val(),
        },
                function (data) {
                    if (data == 1)
                    {
                        window.location.reload();
                    } else
                    {
                        $('#form-error').html(data).show();
                    }
                });
    }
</script>