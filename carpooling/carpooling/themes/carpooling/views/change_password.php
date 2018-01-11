
<div class="rowrec cardfull">

    <div class="inner-trip-det">
        <?php
        $attributes = array('id' => 'change_password');
        echo form_open('profile/changepwd_form/' . $id, $attributes);
        ?>
        <div class="sea-city-city margintop40 upper center"> 
            <h2><?php echo lang('change_password'); ?></h2>
        </div>
        <div class="padding20 rowrec divinput">
            <h3><?php echo lang('old_password'); ?></h3>
            <div class="fleft pro-tab-cont full-width paddingtop10">
                <?php
                $data = array('name' => 'txtoldpwd', 'placeholder' => lang(' '), 'id' => 'txtoldpwd');
                echo form_password($data);
                ?>

            </div>                   
        </div>

        <div class="padding20 rowrec divinput">
            <h3><?php echo lang('new_password'); ?></h3>
            <div class="fleft pro-tab-cont full-width paddingtop10">
                <?php
                $data = array('name' => 'txtnewpwd', 'placeholder'=>lang(' '), 'id' => 'txtnewpwd');
                echo form_password($data);
                ?>

            </div>                  
        </div>

        <div class="padding20 rowrec divinput">
            <h3><?php echo lang('confirm_new_pass'); ?></h3>
            <div class="fleft pro-tab-cont full-width paddingtop10">

                <?php
                $data = array('name' => 'txtcnewpwd', 'placeholder' => lang(' '), 'id' => 'txtcnewpwd');
                echo form_password($data);
                ?>
            </div>                  
        </div>    


        <div class="rowrec center margintop20 marginbot40 sea-trp-view1"> 
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