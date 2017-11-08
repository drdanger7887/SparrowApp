<?php
$attributes = array('id' => 'settings');
echo form_open('profile/settings/' . $id, $attributes);
?>

<h4> <?php echo lang('settings'); ?> </h4>
<ul class="pref-tab row margintop20 marginleft20"> 
    
    <?php foreach ($comport_levels as $comport) {      
        if(in_array($comport['comport_id'],$comport_level)){
            $checked = 'checked=checked';
        } else {
            $checked = '';
        }
        ?>

        <li class="width55"> <label for="settings-<?php echo $comport['comport_id']; ?>" class="swith_class"><?php echo $comport['comport_level']; ?></label>
            <div class="ios-input">
                <label>
                    <input type="checkbox" id="checkbox-<?php echo $comport['comport_id']; ?>" class="ios-switch"  name="comport_level[]" value="<?php echo $comport['comport_id']; ?>" <?php echo $checked;?>/> 
                </label>
            </div>
        </li>
    <?php } ?>
</ul>
<h4> <?php echo lang('luggage'); ?> </h4>
<ul class="pref-tab row margintop20 marginleft20">
    <li class="width55"> <label class="swith_class" ><?php echo lang('luggage'); ?></label>
        <div class="ios-input">
            <label>
                <?php
                $luggage_size = array('1' => lang('small'), '2' => lang('medium'), '3' => lang('large'));
                echo form_dropdown('allowed_luggage', $luggage_size, $allowed_luggage, 'id="allowed_luggage"');
                ?>
            </label>
        </div>     
    </li>
</ul>
<div class="width53 fleft margintop20 size14 sea-trp-view"> 
    <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
    <input type="hidden" value="1" name="submitted" />
    <input type="Submit" value="<?php echo lang('save_button'); ?>" class="alinkbtn padchg margintop20">                        
</div>
</form>



