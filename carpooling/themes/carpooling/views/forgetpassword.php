<?php include 'header.php'; ?>
<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<script type="text/javascript">

    function showdiv(id) {
        $("#resend").hide();
        $("#resendsuccess").show();
    }
    function notRecive(id) {
        $("#resendsuccess").hide();
        $("#resend").show();
    }
    $(document).ready(function () {
        $("#resendForm").validate({
            errorElement: "div",
            //set the rules for the fild names
            rules: {
                email: {
                    required: true,
                    email: true
                }

            },
            //set messages to appear inline
            messages: {
                email: "",
            },
            submitHandler: function (form) {
                $('#resendStatus').html('Please wait...');
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('login/send_password/true'); ?>',
                    dataType: "json",
                    data: $('#resendForm').serialize(),
                    success: function (json) {

                        if (json.result == 0) {
                            $('#resendStatus').html(json.message);
                            return false;
                        } else if (json.result == 1) {
                            $('#resendStatus').html('');
                            $('#statusmsg').html(json.message);
                            showdiv('login');

                        }
                    }
                });

            },
            errorPlacement: function (error, element) {
                error.appendTo(element.parent());
            }

        });
    });
</script>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row margintop40">   
            <div class="col-lg-6 col-md-6 col-sm-6 fleft padding20 grey-bg reg-main">
                <h2 class="center "><?php echo lang('trouble_singn'); ?> </h2>
                <form id="resendForm">
                    <div id="resend">
                        <ul class="row reg-inp">
                            <li> <p class="fleft regp"><?php echo lang('forget_message'); ?></p> </li> <br>
                            <li>
                                <span><?php echo lang('email_username'); ?></span>
                                <input type="text" placeholder="<?php echo lang('email'); ?>" name="email" id="email">
                            </li>
                            <li>
                                <input type="submit" value="<?php echo lang('submit'); ?>"  class="fright reg-sbmt">
                            </li>

                            <input type="hidden" value="1" name="submitted" />
                            <input type="hidden" value="" name="redirect"/>
                            <span id="resendStatus"></span>
                            </form>
                            <li> <hr class="hr-ccc"> </li> 
                        </ul>
                    </div>
                    <div id="resendsuccess" style="display:none">
                        <ul class="row reg-inp">
                            <div id="statusmsg"></div>
                            <li> <p class="fgt_para"> <a href="javascript:void(0)" onclick="notRecive('login');"><?php echo lang('forget_pass_messages'); ?></a> </p> </li> 
                        </ul>
                    </div>
            </div>

            <!-- End Left -->

        </div>
    </div>
</div>

<div class="container-fluid margintop40 cs-blue-bg paddingtopbot50">
    <div class="container">
        <div class="row margintop20 got-ques">  
            <h2 class="colorwhite"><?php echo lang('got_a_question'); ?></h2>
            <p class="padding20 row colorwhite"><?php echo lang('help_line'); ?></p>

        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
