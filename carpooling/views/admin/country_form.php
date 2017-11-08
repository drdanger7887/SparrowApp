<?php include('header.php'); ?>
<?php include('left.php'); ?>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"><span>Add New Country</span></li>
                    </ol>


                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="main-box">
                        <header class="main-box-header clearfix">
                            <h2>Add Country</h2>
                        </header>
                        <?php echo form_open($this->config->item('admin_folder') . '/country/form/' . $countryid, ' id="req-form"'); ?>
                        <div class="main-box-body clearfix">
                            <div class="row">
                                <div class="form-group col-xs-5">
                                    <label><b>Country Name</b></label>
                                        <?php
                                        $data = array('name' => 'countryname', 'value' => set_value('name', $countryname), 'class' => 'form-control col-xs-9');
                                        echo form_input($data);
                                        ?>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-5">
                                    <label><b>Country ShortName(Example:India->IN (ISO 3166-1 alpha-2))</b></label>
                                        <?php
                                        $data = array('name' => 'countrycode', 'value' => set_value('name', $countrycode), 'class' => 'form-control col-xs-9');
                                        echo form_input($data);
                                        ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-xs-5">
                                    <label><b>Country Status</b></label>
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
                            </div>
                          
                            <br/><br/>
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
            window.location = baseurl + 'admin/country'
        }
    </script> 

    <?php include('footer.php'); ?>
