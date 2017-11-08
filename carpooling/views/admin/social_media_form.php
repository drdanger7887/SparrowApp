<?php include('header.php'); ?>
<?php include('left.php'); ?>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"><span>Social Media Page Share</span></li>
                    </ol>


                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="main-box">
                        <header class="main-box-header clearfix">
                            <!--<h2><b>Paypal</b></h2>-->
                        </header>

                        <?php echo form_open($this->config->item('admin_folder') . '/admin/social_media/', ' id="req-form"'); ?>

                        <div class="main-box-body clearfix">

                            <h2><b><!--<?= $payment->social_media; ?>--></b></h2>
                            <div class="row">
                                <?php foreach ($socialmedias as $payment): ?>

                                    <div class="form-group col-xs-6">
                                        <h2><b><?= ucfirst(strtolower($payment->social_media)); ?></b></h2>
                                        <h3 style="border:none;"><b><!--<?= $payment->social_media; ?>--></b></h3>	
                                        <div class="row">								
                                            <div class="form-group col-xs-10">
                                                <label><b><?= ucfirst(strtolower($payment->social_media)); ?>    Page URL</b></label>
                                                <input type="text" name="social_media[<?= $payment->id ?>][page_url]" value="<?= $payment->page_url ?>" class="form-control col-xs-6"/>

                                            </div>                           

                                        </div>  
                                    </div>


                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>	

                <div class="col-lg-12">
                    <div style="padding:15px;overflow: hidden;" class="main-box">
                        <div class="row">
                            <div class="row actions">
                                <div class="col-md-3">&nbsp;</div>
                                <input type="hidden" value="submitted" name="submitted"/>	
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
                                        window.location.reload();
                                    }
    </script> 

    <?php include('footer.php'); ?>
