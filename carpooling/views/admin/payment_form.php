<?php include('header.php'); ?>
<?php include('left.php'); ?>

<div id="content-wrapper">
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active"><span>Payment Settings</span></li>
                    </ol>


                </div>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <div class="main-box">
                        <header class="main-box-header clearfix">
                            <!--<h2><b>Paypal</b></h2>-->
                        </header>
                        <?php echo form_open($this->config->item('admin_folder') . '/admin/payment/', ' id="req-form"'); ?>
                        <div class="main-box-body clearfix">
                            <h2><b><!--<?= $payment->payment_type; ?>--></b></h2>
                            <?php foreach ($payments as $payment): ?>
                                <h2><b><?= ucfirst(strtolower($payment->payment_type)); ?></b></h2>
                                <h3 style="border:none;"><b><!--<?= $payment->payment_type; ?>--></b></h3>	
                                <div class="row">								
                                    <div class="form-group col-xs-4">
                                        <label><b><?= ucfirst(strtolower($payment->payment_type)); ?> Id</b></label>
                                        <input type="text" name="payment[<?= $payment->id ?>][paymentID]" value="<?= $payment->payment_id ?>" class="form-control col-xs-6"/>

                                    </div>                           


                                    <div class="form-group col-xs-6">
                                        <label><b><?= ucfirst(strtolower($payment->payment_type)); ?> Status</b></label>
                                        <div class="checkbox-nice">

                                            <input type="checkbox" name="payment[<?= $payment->id ?>][paymentActive]" value="1" id="checkbox-1" <?= ($payment->is_active == 1) ? 'checked="checked"' : '' ?>/>


                                            <label for="checkbox-1">
                                                <?= lang('active'); ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>        
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label><b><?= ucfirst(strtolower($payment->payment_type)); ?> Method</b></label>
                                        <div class="radio">
                                            <input type="radio" name="payment[<?= $payment->id ?>][paymentMethod]" id="optionsRadios1" value="1" <?= ($payment->is_method == 1) ? 'checked="checked"' : '' ?>>
                                            <label for="optionsRadios1">
                                                Live
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="payment[<?= $payment->id ?>][paymentMethod]" id="optionsRadios2" value="2" <?= ($payment->is_method == 2) ? 'checked="checked"' : '' ?>>
                                            <label for="optionsRadios2">
                                                Testing
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <br/><br/>
                            <?php endforeach; ?>	
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
                                        window.location = baseurl + 'admin/payment'
                                    }
    </script> 

    <?php include('footer.php'); ?>
