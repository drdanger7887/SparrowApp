<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php echo theme_js('jquery.wallform.js', true); ?>
<?php echo admin_js('admin.js', true); ?>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"><span>Add New Advertisement</span></li>
                    </ol>


                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="main-box">
                        <header class="main-box-header clearfix">
                            <h2> <?php if (!empty($page_title)): ?>

                                    <?php /* ?><?php echo "Vehicle Type Form"; ?><?php */ ?>
                                <?php endif; ?></h2>
                        </header>
                        <?php echo form_open($this->config->item('admin_folder') . '/advertisement/form/' . $ad_id, ' id="req-form"'); ?>
                        <div class="main-box-body clearfix">
                            <div class="row">
                                <div class="form-group col-xs-3">
                                    <label><b><?php echo 'Advertisement Tiltle'; ?></b></label>
                                    <?php
                                    $data = array('name' => 'ad_title', 'value' => set_value('ad_title', $ad_title), 'class' => "form-control");
                                    echo form_input($data);
                                    ?> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-3">

                                    <label><b><?php echo ('Navigation Link '); ?></b></label>
                                    <?php
                                    $data = array('name' => 'ad_nav_link', 'value' => set_value('ad_nav_link', $ad_nav_link), 'class' => "form-control");
                                    echo form_input($data);
                                    ?> </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-xs-3">
                                    <label><b><?php echo 'Advertisement display page'; ?></b></label>
                                    <?php
                                    $options = array(
                                        '' => 'Select Here',
                                        'home' => 'Home page',
                                        'search' => 'Search page',
                                        'trip_detail' => 'Trip detail page'
                                    );
                                    echo form_dropdown('advertisement_url', $options, $advertisement_url, ' class = "form-control"');
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-5">
                                    <label><b>Advertisement Status</b></label>
                                    <div class="checkbox-nice">
                                        <?php
                                        $data = array('name' => 'isactive', 'value' => 1, 'id' => 'checkbox-1', 'checked' => $isactive);
                                        echo form_checkbox($data)
                                        ?>

                                        <label for="checkbox-1">
                                            <?= lang('active'); ?>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-xs-5">
                                    <label><b>Advertisement Banner</b></label><br>
                                    <b style=" color: red;">Search page</b>
                                    <p>Ensure that your image size is exactly 260px in width, and 500px in height</p>
                                    <b style=" color: red;">Home,Trip details page</b>
                                    <p>Ensure that your image size is exactly 730px in width, and 100px in height</p>
                                    <div id='preview' class="img-preview">
                                        <?php
                                        if (!empty($ad_id)) {
                                            if (!empty($uploadvalues)) {
                                                ?>
                                                <div id="gallery-photos-wrapper" class="advertisementimage">
                                                    <ul id="gallery-photos" class="clearfix gallery-photos gallery-photos-hover ui-sortable">
                                                        <li id="recordsArray_1" class="col-md-2 col-sm-3 col-xs-6" style="width:45%">								
                                                            <div class="photo-box" style="background-image: url('<?= theme_advertisement_img($uploadvalues) ?>');"></div>
                                                            <a href="javascript:void(0);" class="remove-photo-link" id="advertisement-img-remove">
                                                                <span class="fa-stack fa-lg">
                                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>                                                
                                                    <img src="'<?= theme_advertisement_img($uploadvalues) ?>" style="display:none;">
                                                    <input type="hidden" name="uploadvalues" value="<?= $uploadvalues ?>" />
                                                </div>


                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div id='imageloadstatus' style="display:none">
                                        <img src='<?php echo theme_img('loader.gif'); ?>'/> Uploading please wait ....
                                    </div>


                                    <div id="uploadlink" <?= !empty($uploadvalues) ? 'style="display: none"' : '' ?>>

                                        <a href="javascript:void(0);" class="btn btn-link" id="cameraad" title="Upload Image">
                                            upload image
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br/><br/>
                    </div>



                </div>
            </div>	
        </div>


        <div class="col-lg-12">
            <div style="padding:15px;overflow: hidden;" class="main-box">
                <div class="row">
                    <div class="row actions">
                        <div class="col-md-3">&nbsp;</div>
                        <div class="col-md-3"><button type="submit" style="margin-left: 35px;" class="col-md-9 btn btn-primary">Save</button></div>
                        <div class="col-md-3"><button type="button" onClick="redirect();" style="margin-left: 35px;" class="col-md-9 btn btn-default">Cancel</button></div>
                        <div class="col-md-3">&nbsp;</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div id='imageloadbutton' style="display:none">
            <?php
            $attributes = array('id' => 'advertisementimageform');
            echo form_open_multipart(base_url('admin/advertisement/advertisement_image_upload'), $attributes);
            ?>

            <input type="file" name="advertisementimg" id="advertisementimg"/>
            <input type='hidden'  name="imageType" />
            </form>  



        </div>
    </div>


    <script type="text/javascript" src="<?php echo admin_js('jquery.validate.js'); ?>"></script>
    <?php echo admin_js('jquery.validate-rules.js', true); ?>
    <script src="<?php echo admin_js('jquery.maskedinput.min.js'); ?>"></script>
    <script src="<?php echo admin_js('bootstrap-datepicker.js'); ?>"></script>

    <script>
                            var baseurl = "<?php print base_url(); ?>";
                            function redirect()
                            {
                                window.location = baseurl + 'admin/advertisement'
                            }
    </script> 

    <?php include('footer.php'); ?>