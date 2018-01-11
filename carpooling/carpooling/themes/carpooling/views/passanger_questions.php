<?php include('header.php'); ?>

<?php echo theme_js('tab.js', true); ?>
<?php echo theme_js('notification/goNotification.js', true) ?>
<link href="<?php echo theme_js('notification/goNotification.css') ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo theme_js('popup/css/jquery-confirm.css') ?>" />

<link rel="stylesheet" href="<?php echo theme_js('popup/boxy.css') ?>">
<?php echo theme_js('popup/jquery.boxy.js', true) ?>
<?php echo theme_js('common.js', true); ?>
<div class="container-fluid margintop40">
    <div class="container">
        <div class="row">
            <ul class="brd-crmb">
                <li><a href="#"> <img src="<?php echo theme_img('home-ico.png') ?>"> </a></li>
                <li> / </li>
                <li><a href="#"><?php echo lang('passengers_questions');?></a></li>
            </ul>
            <div class="container-fluid">
                <div class="container">
                    <div class="fleft width100 margin">

                        <h2 class="pst-trip-tit"><?php echo lang('passengers_questions');?></h2>
                    </div>
                </div>
            </div>


            <div class="fleft width100 margin">
                <div class="p_top">
                    <a id="a_tab" class="b_t_1  active" onclick="tab_tab(this, 'p_block_bottom'), height_right()"><?php echo lang('passengers_questions');?></a>
                    <div class="cr">
                    </div>
                </div>

                <div class="obj_cont p_block_bottom rowrec" style="display: block;">
                    <div class="my-trp-tab row">
                        
                            <h3><?php echo lang('passengers_questions');?></h3><br/>
                            <div class="add_trip_enquery_tbl">
                                     	
                                    <table valign="center" border='1' cellpadding="5" cellspacing="5"  width="100%">
                                        <tbody>
                                            <tr class="table-front">
                                                           
                                                <th style="padding:7px;"> <?php echo lang('passenger_name'); ?> </th>
                                                <th style="padding:7px;"> <?php echo lang('passenger_email'); ?> </th>
                                                <th style="padding:7px;"> <?php echo lang('passengers_questions');?> </th>                                               
                                            </tr>  

                                           <?php foreach ($passanger_ques as $questions) { ?>
                                           
                                                <tr id="enquiry">   
                                                    <td style="padding:7px;"> <?= $questions->name ?> </td>                           
                                                    <td class="lst"  style="padding:7px;"> <?= $questions->user_email ?></td>
                                                    <td class="lst" style="padding:7px;"> <?= $questions->questions ?></td>                                                                                
                                                </tr>   
                                            <?php } ?>
                                        </tbody>
                                    </table> 
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
