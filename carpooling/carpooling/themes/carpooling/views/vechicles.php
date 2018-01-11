
<h2 class="center upper margintop40"> My Vehicles </h2>
<div class="row margintop20">
    <div class="margintop20">
        
        <?php
        if ($vechicletypes) {
           // var_dump($vechicletypes);
            foreach ($vechicletypes as $vechicletype) {
                ?>	
            <div class="marginbot40 divinput">
                <div class="col-lg-3 col-md-3 col-sm-3"><img class="search-thumb my-car-photo search-user-thumb" style="" src="<?php if (!empty($vechicletype->vechicle_logo)) {
                    echo base_url('uploads/vehicle/thumbnails/' . $vechicletype->vechicle_logo);
                } else {
                    echo theme_img('no_car.png');
                } ?>"></div>

                <div class="col-lg-3 col-md-3 col-sm-3">Vehicle Model: <br><strong><?php
                
                if ($vechicletype->vehicle_type) {
                    echo $vechicletype->vehicle_type;
                } else {
                    echo $vechicletype->vechicle_type_name;
                }

                ?></strong> </div>
                <div class="col-lg-3 col-md-3 col-sm-3"><?php echo lang('vehicle_number'); ?>: <br><strong><?= $vechicletype->vechicle_number ?></strong></div>
                <div class="clear"> </div>
                <div class="col-lg-12 col-md-12 col-sm-12 editbtn marginbot20" >
                    <a style="padding: 5px 10px" href="javascript:void(0)" class="edit editview" rel="<?= $vechicletype->vechicle_id ?>"> Edit </a>
                    <a style="padding: 5px 10px" href="<?= base_url('vechicle/delete/' . $vechicletype->vechicle_id); ?>" class="delete editdel"> Delete </a>

                </div>
                <div class="clear"> </div>
            </div>

    <?php } ?>
        </div>
<?php } else { ?>
     </div>
    <p class="margintop20 bold center"> You need to add your vehicle first </p>
<?php } ?>
<p class="margintop20 marginbot40 ed-can-trp center"> <a href="javascript:void(0)" class="new alinkbtn alinkbtn1"> <img src="<?php echo theme_img('add-ico.png') ?>"> <?php echo lang('add_new_car'); ?> </a> </p>
</div>