<?php 
 include('header_stepsintro.php'); 
 ?>


<style> 

    .modal-backdrop {
        background-color: #0081c8;
        opacity:0.4 !important;
    }

    .modal-body {
        min-height: 160px;
    }


    .modal-header {
        min-height: 20px;
        padding: 5px;
        border-bottom: 1px solid #e5e5e5;
    }

    .modal-footer {
        padding: 5px 5px 15px 5px;
        text-align: center;
        border-top: 1px solid #e5e5e5;
    }    

    .modal-open .btn-warning, .modal-open .btn-success {
        width: 100px;
        background-color: #009aee;
        border: none;
        background-image: none;
    }


    .modal-open .btn-warning:hover, .modal-open .btn-success:hover {
        background-color: #0081c8;
        border: none;
    }

    .label-success {
        background-color: #ccc;
    }

    .js-title-step {
        font-size: 14px;
    }

    .jumbotron1 {
        font-size: 16px;
    }

    .modal-footer {
        text-align: center;
    }

    .cir {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #eee;
        border-radius: 8px;
        border: 1px #aaa solid;
        margin: 0 2px;
    }

    .ciractive {
        background: #0081c8;
        border-color: #0081c8; 
    }

    .cirnormal {
        background: #eee;
        border-color: #aaa; 
    }

    html {
        background: url(<?php echo base_url('/'); ?>spcp/images/londonmap.jpg) center top;
        margin: 0px;
    }

    body {
        background: none;
    }

    .page-header {
        display: none;
    }

.modal {
  text-align: center;
}


.stepbox {
    padding: 0 30px;
}

.stepbox h2 {
    padding-left: 20px;
    margin: 0px;
    margin-bottom: 10px;
}

.stepbox p {
    padding-left: 20px;
}

.stepbox img {
    margin-bottom: 10px;
    border-radius: 5px;
}

.stepbox .scol1 {
    float: left;
    width: 35%;
}

.stepbox .scol2 {
    float: left;
    width: 65%;
}

@media (max-width: 768px) {

    .stepbox .scol1 {
        width: 38%;
    }

    .stepbox .scol2 {
        width: 62%;
    }

    .stepbox h2, .stepbox p {
        padding-left: 10px;
    }

}

@media (max-width: 567px) {

    .stepbox .scol1 {
        width: 100%;
        text-align: center;
    }

    .stepbox .scol2 {
        width: 100%;
        text-align: center;
    }

    .stepbox h2, .stepbox p {
        padding: 0px;
    }

}




@media screen and (min-width: 768px) { 
    .modal-dialog {
    width: 600px;
    margin: 30px auto;
}
  .modal:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}

</style>

<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">





 <div class="container-fluid">
        <div class="col-md-12">
            <div class="page-header">

            </div>

            <div class="row">
                

                <div class="col-md-4">
                    <div id="modal-sample-6" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="js-title-step"></h4>
                                </div>
                                <div class="modal-body ">
                                    <div class="row hide" data-step="1" data-title="<img src='<?php echo base_url('/'); ?>spcp/images/logo-small-18.png'>">
                                        <div class="margin stepbox">
                                            <div class="scol1"><img src='<?php echo base_url('/'); ?>spcp/images/step-ride-map.png'></div>
                                            <div class="scol2">
                                            <h2>Meet Sparrow</h2>
                                            <p>Enabling your travel to and from your community, the most efficient way!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row hide" data-step="2" data-title="<img src='<?php echo base_url('/'); ?>spcp/images/logo-small-18.png'>">
                                        <div class="margin stepbox">
                                            <div class="scol1"><img src='<?php echo base_url('/'); ?>spcp/images/step-ride-save.png'></div>
                                            <div class="scol2">
                                            <h2>Earn Relevant Rewards</h2>
                                            <p>Save time and money by ridesharing with others along the way</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row hide" data-step="3" data-title="<img src='<?php echo base_url('/'); ?>spcp/images/logo-small-18.png'>">
                                        <div class="margin stepbox">
                                            <div class="scol1"><img src='<?php echo base_url('/'); ?>spcp/images/step-ride-community.png'></div>
                                            <div class="scol2">
                                            <h2>Share Your Journey</h2>
                                            <p>You'll need to join your selected community to start connecting today</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12 text-center marginbot20"><div class="cir cir1 ciractive"> </div><div class="cir cir2"> </div><div class="cir cir3"> </div></div>
                                    <button style="display:none;" type="button" class="btn btn-default js-btn-step pull-left" data-orientation="cancel" data-dismiss="modal"></button>
                                    <button type="button" class="btn btn-warning js-btn-step" data-orientation="previous"></button>
                                    <button type="button" class="btn btn-success js-btn-step" data-orientation="next"></button>
                                    <div class="marginbot10"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default" style="display:none;">
                        <div class="panel-body">
                            A modal with a callback when the modal is hidded
                        </div>
                        <div class="panel-footer">
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-sample-6" id="stepsintro1" data-backdrop="static">
                                <span class="glyphicon glyphicon-flash"></span> Open modal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('/'); ?>spcp/js/jquery-bootstrap-modal-steps.js"></script>
    <script type="text/javascript">

        $('#modal-sample-6').modalSteps({
            btnCancelHtml: '<span class="glyphicon glyphicon-remove"></span>',
            btnPreviousHtml: '<span class="glyphicon glyphicon-chevron-left"></span> Previous',
            btnNextHtml: 'Next <span class="glyphicon glyphicon-chevron-right"></span>',
            btnLastStepHtml: '<span class="glyphicon glyphicon-ok-sign"></span> JOIN',
            'completeCallback': function(){ window.location.replace("community?nf=1"); }
        });

        document.getElementById('stepsintro1').click();
    </script>









            
        </div>
        <!-- End -->
    </div>
</div>

<?php //include('footer.php'); ?>
</body>
</html>