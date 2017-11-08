<div class="rowrec">
    <div class="inner-trip-det marginbot10">
        <?php
        $attributes = array('id' => 'change_password');
        echo form_open('profile/changepwd_form/' . $id, $attributes);
        ?>
        <div class="sea-city-city topbgg colorwhite padding10 cs-blue-text size16"> 
            <?php echo lang('change_password'); ?>
        </div>
        <div class="padding20 rowrec">
            <h5><?php echo lang('old_password'); ?></h5>
            <div class="fleft pro-tab-cont full-width paddingtop10">
                <?php
                $data = array('name' => 'txtoldpwd', 'placeholder' => lang('old_password'), 'id' => 'txtoldpwd');
                echo form_password($data);
                ?>

            </div>                   
        </div>

        <div class="padding20 rowrec">
            <h5><?php echo lang('new_password'); ?></h5>
            <div class="fleft pro-tab-cont full-width paddingtop10">
                <?php
                $data = array('name' => 'txtnewpwd', 'placeholder'=>lang('new_password'), 'id' => 'txtnewpwd');
                echo form_password($data);
                ?>

            </div>                  
        </div>

        <div class="padding20 rowrec">
            <h5><?php echo lang('confirm_new_pass'); ?></h5>
            <div class="fleft pro-tab-cont full-width paddingtop10">

                <?php
                $data = array('name' => 'txtcnewpwd', 'placeholder' => lang('confirm_new_pass'), 'id' => 'txtcnewpwd');
                echo form_password($data);
                ?>
            </div>                  
        </div>    




        <div class="width53 fleft margintop20 size14 sea-trp-view"> 
            <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
            <input type="hidden" value="1" name="submitted" />
            <input type="Submit" value="<?php echo lang('save_button'); ?>" class="alinkbtn padchg margintop20">                        
        </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate-rules.js'); ?>"></script>

<style>
    .error{
        color: red;
    }
    .green-bg{
        margin-bottom: 40px;
    }
</style>