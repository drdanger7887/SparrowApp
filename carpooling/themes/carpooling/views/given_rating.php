<?php include('header.php'); ?>

<?php echo theme_js('tab.js', true); ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>

<script>
    var baseurl = "<?php print base_url(); ?>";
    $(document).ready(function () {

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



</script>
<link rel="stylesheet" href="<?php echo theme_js('rating/rating.css') ?>">
<?php echo theme_js('rating/jquery.rating.js', true) ?>
<?php echo theme_js('common.js', true); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('my_ratings'); ?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">

                        <h2 class="pst-trip-tit"><?php echo lang('my_ratings'); ?></h2>
                    </div>
                </div>
            </div>


            <div class="fleft width100 margin">
                <div class="p_top">
                    <a id="a_tab" class="b_t_1" href="<?php echo base_url('rating');?>"><?php echo  lang('ratings_pending'); ?></a>      
                    <a id="a_tab" class="b_t_1" href="<?php echo base_url('rating/received_rating');?>"><?php echo  lang('received_ratings'); ?></a>
                    <a id="a_tab" class="b_t_1 active"><?php echo lang('rating_given'); ?></a>	
                    <div class="cr">
                    </div>
                </div>
                <!-- end tab1 -->

                    <!-- end tab2 -->

                    <div class="obj_cont p_block_bottom" style="display: block;">
                    <div class="my-trp-tab row">

                        <div class="my-trp-content rowrec" id="pageresult">
                             <?php if ($given_rating) { ?> 
                            <div class="add_trip_enquery_tbl">                                       	
                                    <table valign="center" class="rating-table" cellpadding="0" cellspacing="0"  width="100%">
                                        <tbody>
                                            <tr bgcolor="#01acf1">
                                                <th> <?php echo lang('user_image'); ?></th> 
                                                <th> <?php echo lang('user_name'); ?></th>  
                                                <th> <?php echo lang('rating'); ?> </th>                                                                           
                                            </tr>  

                                            <?php foreach ($given_rating as $rating) { ?>

                                                <tr>                        	
                                                    <td> 
                                                        <div class="profile-img"> 
                                                            <img src="<?php if($rating->user_profile_img) { echo theme_profile_img($rating->user_profile_img); } else { echo theme_img('default.png');  }?>" width="30" height="30"> 
                                                        </div>
                                                    </td>
                                                    <td> <?=$rating->user_first_name.' '.$rating->user_last_name ?></td>
                                                    <td> 
                                                        <div id="rating-<?php echo $rating->user_id; ?>">                                                                                                                   
                                                            <ul>
                                                              <?php
                                                              for($i=1;$i<=5;$i++) {
                                                                $selected = "";
                                                                if(!empty($rating->rating) && $i<=$rating->rating) {
                                                                    $selected = "selected";
                                                                }
                                                              ?>
                                                              <li class='<?php echo $selected; ?>'>&#9733;</li>  
                                                              <?php }  ?>
                                                            <ul>
                                                        </div>
                                                    </td>
                                                                                
                                                </tr>   
                                            <?php } ?>
                                        </tbody></table>
                                <?php
                                } else { ?>

                                    <p class="para"><?php echo lang('no_ratings'); ?></p>
                                <?php    
                                }
                                ?>

                            </div>  
                        </div>
                    </div>
                </div>          
                <!-- End -->

            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
