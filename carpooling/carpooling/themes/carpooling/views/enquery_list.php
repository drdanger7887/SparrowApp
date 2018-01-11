<?php include('header.php'); ?>

<?php echo theme_js('tab.js', true); ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
            $(document).ready(function() {
    
    $('body').on("click", '.enquiryAction', function(){
        var id = $(this).attr('data-id');
        var action = $(this).attr('data-action');
        var pmQueryString = 'enquiryId='+id+'&action='+action;
        $.ajax({
            type: "POST", 
            url: baseurl + "addtrip/enquiryaction/true",  
            dataType: "json", 
            data:pmQueryString,
            success: function(json) {
                if (json.result == 0){   
                    
                    alert(json.message);
                    return false;
                } else if (json.result == 1) {                      
                    if(action == 'accept'){                        
                        $('#enquirySuccess-'+id).html('<p> Accepted </p>');
                    }else if(action == 'reject'){                        
                        $('#enquiry-'+id).fadeOut().remove();
                    }                    
                }
            }
        });
    });
    /* Slider Expand Click */
    $('body').on("click", '.slider', function()
    {
    var ID = $(this).attr("rel");
            if ($('#slide' + ID).is(':visible'))
    {
    close()
    }
    else
    {
    close()

            $('#slide' + ID).addClass('open').removeClass('close');
            $('#slide' + ID).slideToggle('slow');
            return false;
    }
    });
            function close() {
            opened = $(document).find('.open');
                    $.each(opened, function() {
                    //give the proper class to the linked element
                    $(this).addClass('close').removeClass('open');
                            $(this).slideToggle('slow');
                    });
            }


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

  });</script>
<?php echo theme_js('common.js', true); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('my_enquiry'); ?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">

                        <h2 class="pst-trip-tit"><?php echo lang('my_enquiry'); ?></h2>
                    </div>
                </div>
            </div>


            <div class="fleft width100 margin">
                <div class="p_top">
                    <a id="a_tab" class="b_t_1  active" onclick="tab_tab(this, 'p_block_bottom'), height_right()"><?php echo lang('my_enquiry'); ?></a>
                    <div class="cr">
                    </div>
                </div>

                <div class="obj_cont p_block_bottom rowrec" style="display: block;">
                    <div class="my-trp-tab row">
                        <div class="my-trp-main">
                            <a href="#" class="trp-main-active"><?php echo lang('rides_offered');?> </a>
                            <a href="<?=base_url('addtrip/enquery_list_passenger')?>"><?php echo lang('enquiry');?> </a>
                        </div>
                        <div class="my-trp-content rowrec" id="pageresult">
                            <h3><?php echo lang('enquery_information'); ?></h3><br/>
                            <div class="add_trip_enquery_tbl">
                                <?php if ($enquiries) { ?>         	
                                    <table valign="center" cellpadding="0" cellspacing="0"  width="100%">
                                        <tbody><tr class="table-front">
                                                <th> <?php echo lang('enquiry_date'); ?></th> 
                                                <th> <?php echo lang('trip_date'); ?></th>  
                                                <th> <?php echo lang('vehicle_number'); ?> </th>                            
                                                <th> <?php echo lang('passenger_name'); ?> </th>
                                                <th> <?php echo lang('passenger_number'); ?> </th>
                                                <th> <?php echo lang('passenger_email'); ?> </th>
                                                <th> <?php echo lang('enquniry_status'); ?></th>
                                            </tr>  

                                            <?php foreach ($enquiries as $enquiry) { ?>

                                                <tr id="enquiry-<?=$enquiry->enquiry_id?>">                        	
                                                    <td> <?= date('d-m-Y', strtotime($enquiry->enquiry_date_time)) ?> </td>
                                                    <td> <?= date('d-m-Y', strtotime($enquiry->enquiry_trip_date)) ?> </td>
                                                    <td> <?= $enquiry->vechicle_number ?> </td>
                                                    <td> <?= $enquiry->user_first_name . '.' . $enquiry->user_last_name ?> </td> 
                                                    <td> <?= $enquiry->user_mobile ?> </td>                           
                                                    <td class="lst"> <?= $enquiry->user_email ?></td>
                                                    <td id="enquirySuccess-<?=$enquiry->enquiry_id?>">
                                                        <?php if ($enquiry->enquiry_trip_status == 0){ ?>
                                                        <a href="javascript:void(0)" class="enquiryAction" data-action="accept" data-id="<?=$enquiry->enquiry_id?>"><?php echo lang('accept'); ?></a>
                                                        <a href="javascript:void(0)" class="enquiryAction" data-action="reject" data-id="<?=$enquiry->enquiry_id?>"><?php echo lang('reject'); ?></a>
                                                        <?php } else {?>                                                        
                                                        <p> <?php echo lang('accepted'); ?> </p>
                                                        <?php } ?>
                                                    </td>                             
                                                </tr>   
                                            <?php } ?>
                                        </tbody></table>
                                <?php
                                } else {

                                    echo lang('no_enquiry');
                                }
                                ?>

                            </div>
                        </div>
                        <!-- end tab1 -->



                    </div>
                </div>
                <!-- end tab2 -->

            </div>

        </div>
        <!-- End -->

    </div>


</div>

<?php include('footer.php'); ?>
