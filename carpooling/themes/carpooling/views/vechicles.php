<h4> <?php echo lang('my_cars'); ?> </h4>
<div class="row margintop20">
    <div class="margintop20">
        
        <?php
        if ($vechicletypes) {
            foreach ($vechicletypes as $vechicletype) {
                ?>	
            <div class="marginbot40">
                <div class="col-lg-3 col-md-3 col-sm-3"><?php echo lang('photo'); ?>: <img class="search-thumb my-car-photo search-user-thumb" style="" src=" <?php if (!empty($vechicletype->vechicle_logo)) {
                    echo base_url('uploads/vehicle/thumbnails/' . $vechicletype->vechicle_logo);
                } else {
                    echo theme_img('no_car.png');
                } ?>"></div>
                <div class="col-lg-3 col-md-3 col-sm-3"><?php echo lang('model'); ?>: <br><strong><?= $vechicletype->category_name ?> </strong></div>
                <div class="col-lg-3 col-md-3 col-sm-3"><?php echo lang('vehicle_name'); ?>: <br><strong><?= $vechicletype->vechicle_type_name ?></strong> </div>
                <div class="col-lg-3 col-md-3 col-sm-3"><?php echo lang('vehicle_number'); ?>: <br><strong><?= $vechicletype->vechicle_number ?></strong></div>
                <div class="clear"> </div>
                <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: right; background: #999; padding: 5px;">
                    <a style="padding: 5px 10px" href="javascript:void(0)" class="edit" rel="<?= $vechicletype->vechicle_id ?>"> <img src="<?php echo theme_img('edit-ico.png') ?>"> </a>
                    <a style="padding: 5px 10px" href="<?= base_url('vechicle/delete/' . $vechicletype->vechicle_id); ?>" class="red-bg delete"> <img src="<?php echo theme_img('delete-ico.png') ?>"> </a>

                </div>
                <div class="clear"> </div>
            </div>

    <?php } ?>
        </div>
<?php } else { ?>
     </div>
    <p class="margintop20 bold"> You need to add your vehicle first </p>
<?php } ?>
<p class="margintop20 fright ed-can-trp"> <a href="javascript:void(0)" class="new"> <img src="<?php echo theme_img('add-ico.png') ?>"> <?php echo lang('add_new_car'); ?> </a> </p>
</div>