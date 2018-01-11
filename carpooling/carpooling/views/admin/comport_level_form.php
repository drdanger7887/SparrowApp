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
                        <li class="active"><span>Add New Comport level</span></li>
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
                        <?php echo form_open($this->config->item('admin_folder') . '/comport_level/form/' . $comport_id, ' id="req-form"'); ?>
                        <div class="main-box-body clearfix"> 
                            <div class="row">
                                <div class="form-group col-xs-3">
                                    <label><b><?php echo ('Comport level name'); ?></b></label>
                                    <?php
                                    $data = array('name' => 'comport_level', 'value' => set_value('comport_level', $comport_level), 'class' => "form-control");
                                    echo form_input($data);
                                    ?> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-5">
                                    <label><b>Comport Status</b></label>
                                    <div class="checkbox-nice">
                                        <?php
                                        $data = array('name' => 'is_active', 'value' => 1, 'id' => 'checkbox-1', 'checked' => $is_active);
                                        echo form_checkbox($data)
                                        ?>

                                        <label for="checkbox-1">
                                            <?= lang('active'); ?>
                                        </label>
                                    </div>
                                </div> 
                                
                                <div class="form-group col-xs-5">
                                    <label><b>Comport level Image</b></label>
                                    <div id='preview' class="img-preview">
                                        <?php
                                        if (!empty($comport_id)) {
                                            if (!empty($uploadvalues)) {
                                                ?>
                                                <div id="gallery-photos-wrapper" class="comportimage">
                                                    <ul id="gallery-photos" class="clearfix gallery-photos gallery-photos-hover ui-sortable">
                                                        <li id="recordsArray_1" class="col-md-2 col-sm-3 col-xs-6" style="width:45%">								
                                                            <div class="photo-box" style="background-image: url('<?= theme_comport_img($uploadvalues) ?>');"></div>
                                                            <a href="javascript:void(0);" class="remove-photo-link" id="comport-img-remove">
                                                                <span class="fa-stack fa-lg">
                                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                                    <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>                                                
                                                    <img src="'<?= theme_comport_img($uploadvalues) ?>" style="display:none;">
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
                                        <p>Note</p>
                                        <p>For upload icons use with <a href="http://www.flaticon.com" target="_blank">flaticon.com(Click here)</a>.Icons type should be a png format and size is 24,color black.</p>                                        
                                        <a href="javascript:void(0);" class="btn btn-link" id="cameracomport" title="Upload Image">
                                            upload image
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>                       
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
            $attributes = array('id' => 'comportimageform');
            echo form_open_multipart(base_url('admin/comport_level/comport_image_upload'), $attributes);
            ?>
            <input type="file" name="comportimg" id="comportimg"/>
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
            window.location = baseurl + 'admin/comport_level'
        }
    </script> 
    
    <?php include('footer.php'); ?>