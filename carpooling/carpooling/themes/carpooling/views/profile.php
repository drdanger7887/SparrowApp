<?php include('header.php'); 
include('title_profile.php');

?>
<?php echo theme_js('jquery_tab.min.js', true) ?>
<?php echo theme_js('jquery.ba-hashchange.js', true) ?>
<?php echo theme_js('tab_script.js', true) ?>
<?php echo theme_js('jquery.wallform.js', true) ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<?php echo theme_css('checkbox.css', true) ?>

<script>
    $(document).ready(function () {

<?php if (empty($txtphone)) { ?>
            $('#txtphone').attr('readonly', false);
            $('#txtphone').removeClass('disable');
<?php } ?>

<?php
//lets have the flashdata overright "$message" if it exists
if ($this->session->flashdata('message')) {
    $message = $this->session->flashdata('message');
    ?>
            $.goNotification('<?= $message ?>', {
                type: 'success', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
<?php
}

if ($this->session->flashdata('error')) {
    $error = $this->session->flashdata('error');
    ?>
            $.goNotification("<?= trim($error) ?>", {
                type: 'error', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 5000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}

if (function_exists('validation_errors') && validation_errors() != '') {
    $error = validation_errors();
    ?>
            $.goNotification('<?= trim($error) ?>', {
                type: 'error', // success | warning | error | info | loading
                position: 'top center', // bottom left | bottom right | bottom center | top left | top right | top center
                timeout: 200000, // time in milliseconds to self-close; false for disable 4000 | false
                animation: 'fade', // fade | slide
                animationSpeed: 'slow', // slow | normal | fast
                allowClose: true, // display shadow?true | false
            });
    <?php
}
?>


    });


<?php /* ?>function areyousure()
  {
  //return confirm('<?php echo 'Are you want to delete this Vehicle';?>');
  Boxy.confirm("Please confirm:", function() { return true; }, {title: 'Message'});
  //return false;

  } <?php */ ?>


    var baseurl = "<?php print base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<?php echo theme_js('profile.js', true) ?>
<style>
    .size14 {
        font-size: 14px;
        margin-left: 20px;
    }
</style>

<div class="container-fluid margintop40 mapbg">
    <div class="container">
        <div class="row padding10">

            <div id="v-nav" >


                <ul class="hidden">
                    <li tab="personal-info" class="first current vtab">  <?php echo lang('personal_info'); ?></li>
                    <li class="hidden" tab="settings" class="second vtab">  <?php echo lang('settings'); ?></li>
                    <li tab="my-cars-info" class="third vtab">  My Vehicles </li>
                    <li tab="changepwd_form" class="last vtab">  <?php echo lang('change_password'); ?></li>
                </ul>

                <?php
                    $attributes = array('id' => 'profileimageform');
                    echo form_open_multipart(base_url('profile/profile_image_upload'), $attributes);
                ?>
                <div  class="uploadFile timelineUploadImg" style="display:none">
                    <input type="file"  name="profileimg" id="profileimg">
                </div>            
                </form>

                <div class="tab-content" style="display: block;">
                <?php
                    $attributes = array('id' => 'changepwd');
                    echo form_open('profile/edit/' . $id, $attributes);
                ?>


                    <div class="rowrec cardfull">
                        <div class="divinput center upper">
                            <h2>Personal information</h2>
                        </div>


                        <div class="profile-pic1 divinput center" id="ProfilePic"> 




                            <img src="<?php if ($customer->user_profile_img) {
                        echo theme_profile_img($customer->user_profile_img);
                    } else {
                        echo theme_img('default.png');
                    } ?>" id="old-image" > </div>

                        <div class="profile-hd-tit1 margin center"> <a href="javascript:void(0)" id="edit-profile"> <?php echo lang('edit_proimage'); ?> </a> </div>
                        <div id='imageloadstatus' style="display:none; text-align: center;">
                            <img src='<?php echo theme_img('ajaxloader.gif'); ?>'/> Uploading please wait ....
                        </div>
                        <div class="rowrec line4"></div>
                        <div class="margintop20 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-trip-det divinput">
                                <h3><?php echo lang('first_name'); ?></h3>
                                <div class="row margin10">
                                    <input type="text" placeholder="<?php echo lang('first_name'); ?>" name="txtfirstname" id="txtfirstname" value="<?= $txtfirstname ?>"/>
                                </div>                 
                            </div>
                        </div>
                        <div class="margintop20 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-trip-det divinput">
                                <h3><?php echo lang('last_name'); ?></h3>
                                <div class="row margin10">
                                    <input type="text" placeholder="<?php echo lang('last_name'); ?>"  name="txtlastname" id="txtlastname" value="<?= $txtlastname ?>" />                 
                                </div>
                            </div>
                        </div>
                        <div class="rowrec line4"></div>
                        <div class="margintop20 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-trip-det divinput">
                                <h3>Drivers License</h3>
                                <div class="row margin10">
                                    <input type="text" placeholder="<?php echo lang('license_no'); ?>" class="disable" name="licence_number" id="licence_number"  value="<?= $licence_number ?>"/> 
                                </div>                 
                            </div>
                        </div>
                        <div class="margintop20 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="inner-trip-det divinput">
                                <h3>Mobile</h3>
                                <div class="row margin10">
                                    <input type="text" placeholder="<?php echo lang('mobile_no'); ?>" class="disable" name="txtphone" id="txtphone"  value="<?= $txtphone ?>"/>                  
                                </div>
                            </div>
                        </div>
                        <!-- End1 -->


                        <div class="rowrec line4"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margintop20">
                            <div class="inner-trip-det divinput">


                                    <h3><?php echo lang('birthdate'); ?></h3>
                                        <div class="sea-city-city rowrec perso-inf fright cs-grey-text size14 ed-tme margintop20"> 
                                            <div>
                                                <span><?php echo lang('day'); ?></span>
                                                <?php
                                                $days = array();
                                                for ($day = 1; $day <= 31; $day++):
                                                    $days[$day] = $day;
                                                endfor;
                                                echo form_dropdown('day', $days, $selday, ' id="day" ');
                                                ?>
                                                
                                            </div>
                                            <div>
                                                <span><?php echo lang('month'); ?></span>
                                                <?php
                                                $data = array(
                                                '' => 'Month',
                                                'January' => 'January',
                                                'February' => 'February',
                                                'March' => 'March',
                                                'April' => 'April',
                                                'May' => 'May',
                                                'June' => 'June',
                                                'August' => 'August',
                                                'September' => 'September',
                                                'October' => 'October',
                                                'November' => 'November',
                                                'December' => 'December');
                                                echo form_dropdown('month', $data, $month, ' id="month" ');
                                                ?>
                                                
                                            </div>
                                            <div>
                                                <span><?php echo lang('year'); ?></span>
                                                <?php
                                                $years = array();
                                                for ($iYear = date('Y'); $iYear >= date('Y') - 70; $iYear--):
                                                    $years[$iYear] = $iYear;
                                                endfor;
                                                echo form_dropdown('year', $years, $year, ' id="year" ');
                                                ?> 
                                            </div>  

                                        </div>






                            </div>



                            <div class="rowrec line4"></div>
                            <div class="hidden inner-trip-det divinput pro-tab-cont">
                                <div class="rowrec margintop20"></div>
                                <h3> <?php echo lang('about_you'); ?> </h3>
                                <div class="rowrec margin5"></div>
                                        <textarea rows="4" name="txtaboutus" placeholder="<?php echo lang('about_you'); ?>"><?= $txtaboutus ?></textarea>
                            </div>  
                            <div class="rowrec margin"></div>
                            <div class="inner-trip-det divinput center">
                                 <input type="hidden" value="<?php echo $redirect; ?>" name="redirect"/>
                                            <input type="hidden" value="1" name="submitted" />
                                            <input type="Submit" value="<?php echo lang('submit'); ?>" class="alinkbtn alinkbtn1">
                            </div> 
                            <div class="rowrec margin"></div>  


                            <div class="hidden fleft pro-tab-cont">
                                            <h5><?php echo lang('user_language'); ?></h5>                                        
                                            <?php
                                            $data = array('' => lang('select_language'));
                                            foreach ($languages as $cat) {
                                                $data[$cat->language_code . ',' . $cat->language_name] = $cat->language_name;
                                            }
                                            echo form_dropdown('language', $data, $language, 'class = "form-control user_lang"');
                                            ?>
                            </div>

                        </div>
                    </div>
                    <!-- End3 -->
                    </form>
                </div>

                <div class="tab-content" style="display: none;">
                <?php include('settings.php'); ?>
                </div>

                <div class="tab-content" style="display: none;">
                    <div id="vehicle-list" class="cardfull">
                    <?php include('vechicles.php'); ?>
                    </div>   
                    <div id="vehicle-from-content" style="display:none"></div>   
                </div>

                <div class="tab-content" style="display: none;">
                <?php include('change_password.php'); ?>
                </div>

            </div>
            <!-- End V Tab -->
        </div>
        <!-- End -->
    </div>
</div>
</div>
<div class="modal"></div>
<?php include('footer.php'); ?>