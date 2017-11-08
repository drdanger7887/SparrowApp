<?php include('header.php'); ?>
<?php echo theme_js('jquery-ui.js', true); ?>
<?php echo theme_js('popup.js', true); ?>
<?php echo theme_css('themes/base/jquery.ui.all.css', true); ?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<?php echo theme_js('pager.js', true); ?>

<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
</script>

<div class="container-fluid margintop20">
    <div class="container">
        <div class="row">
            

            <div class="col-lg-3 col-md-3 col-sm-3 padding0"> </div>
            <div class="col-lg-6 col-md-6 col-sm-12 padding0">

                <div class="selcomm center">
                    
                    <?php 

                    if (!isset($communityid)) {
                        echo '<div class="center upper bold margin10">Select your community</div>';
                        $comm = $this->community_model->get_communitylist();
                        for ($i=0; $i<sizeof($comm); $i++) {
                           echo '

                            <div class="selcomlist margintop20">
                                <div class="commprofile1">
                                    <a href="'.base_url('community').'/site/'.$comm[$i]->comm_slug.'"><img src="'.base_url('/').'spcp/images/'.$comm[$i]->comm_image.'"></a>
                                </div>                        
                                <div class="commprofile2 comm'.$comm[$i]->comm_id.'">
                                    <a href="'.base_url('community').'/site/'.$comm[$i]->comm_slug.'">
                                    <h3 class="blue">'.$comm[$i]->comm_name.'</strong></h3>
                                    <p>'.$comm[$i]->comm_descr.'</p>
                                    </a>
                                </div>                          
                            </div>
                            <div class="clear"> </div>
                            <hr class="hrlist">
                           ';
                        }
                      
                    }
                    else {
                        $comm = $this->community_model->get_community($communityid);
                           echo '
                           <div class="center upper bold">List of members driving to</div>
                           <div class="selcomlist margintop20">
                           <div class="commprofile1 comm'.$comm[0]->comm_id.'">
                            <img src="'.base_url('/').'spcp/images/'.$comm[0]->comm_image.'">
                            </div>                        
                            <div class="commprofile2 comm'.$comm[0]->comm_id.'">
                            <h3>'.$comm[0]->comm_name.'</h3>
                            <p>
                            '.$comm[0]->comm_descr.'
                            </p></div>
                            <div class="clear"> </div>
                            </div>'; 
                            ?>
                       <!-- <div class="clear center margintop40"> 
                            <a href="<?php echo base_url('search'); ?>" class="button-sp2 iconfind"> GET A RIDE </a> &nbsp; 
                            <a href="<?php 
                            $commid = 'addtrip/form?commid='.$comm[0]->comm_id;
                            echo base_url($commid); 
                            ?>" class="button-sp2 iconpost"> POST A NEW JOURNEY HERE </a>
                        </div> -->
                            <?php 
                    }
 ?>
                </div>
                 <?php
if (isset($communityid)) {
$g_tripcommlist = $this->trip_model->get_trips_community($communityid);
//var_dump($g_tripcommlist);
 for ($i=0;$i<sizeof($g_tripcommlist);$i++) {
   // echo 'trip_id = '.$g_tripcommlist[$i]['trip_id'].'<hr>';
    $g_legdetail = $this->trip_model->get_leg_details($g_tripcommlist[$i]['trip_id']);
    //var_dump($g_legdetail);
    if (sizeof($g_legdetail)>0) 
    {
    //echo $g_legdetail[0]['trip_led_id'].' !!!<hr>';
    $trip = $this->trip_model->get_tripdetail($g_legdetail[0]['trip_led_id']);
   // var_dump($trip);
       
        ?>
        <div class="margintop20 marginbot20 padding20" style="background: #eee;">
            <div class="triplist">
                
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 center"> <img src="<?php
                    if ($trip['user_profile_img']) {
                    echo theme_profile_img($trip['user_profile_img']);
                    } else {
                    echo theme_img('default.png');
                    }
                    ?>" width="40">
                    <p class="bold margin5"><?= $trip['user_first_name'] . ' ' . $trip['user_last_name'] ?></p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 center">
                    travelling from:<br>
                    <a class="alinkbtn" href="<?php echo base_url('trip/tripdetails/' . $trip['trip_led_id']); ?>">
                    <?php
                    $source = explode(',', $trip['source']);
                    echo (!empty($source[0]) ? $source[0] : '') . (!empty($source[1]) ? ',' . $source[1] : '');
                    ?>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 center"> <span class="fright">         
                    <?php if ($trip['trip_casual_date'] != '') { ?>
                    <?= date("d-m-Y", strtotime($trip['trip_casual_date'])) ?>
                    </span> 
                    <?php } else { ?>            
                    <?php echo lang('regular_trip'); ?>
                    </span> 
                    <?php } ?>
                </div>
            </div>

            <div class="clear"> </div> <!-- <hr class="hrlist"> -->
        </div> 
                        <div class="clear"> </div>
                   
        <?php
    }
 }      ?>
                    <div class="center margintop40 marginbot40"> 
                            <a href="<?php 
                            $commid = 'addtrip/form?commid='.$comm[0]->comm_id;
                            echo base_url($commid); 
                            ?>" class="button-sp2 iconpost alinkbtn"> POST A NEW JOURNEY HERE </a>
                    </div> 
                    <div class="line4 margin marginbot40"> </div>
                    <h2 class="upper center marginbot20">PLATFORM REWARDS</h2> 

        <?php
         $rwrds = $this->Money_model->show_rewards();
         for ($i=0; $i<sizeof($rwrds); $i++) {
            echo '
            <div class="col-lg-6 col-md-6 col-sm-6 reward" > 
                <img src="'.base_url().'/spcp/images/'.$rwrds[$i]['reward_image'].'"> <p>'.$rwrds[$i]['reward_descr'].'</p>

                <div class="rpurch">
                    <div class="rpurchprice">'.round($rwrds[$i]['reward_price']).'</div>
                    <div class="rpurchbtn"><a href="'.base_url('rewards').'/purchase/'.$rwrds[$i]['reward_id'].'" class="alinkbtn">purchase</a></div>
                                
                </div>
            </div>

            ';
         }
         echo '<div class="clear"> </div><div class="line4 marginbot40"> </div>
            <h3 class="upper center marginbot40"><a href="'.base_url('rewards').'">My rewards</a></h3> ';
}
?>



            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 padding0"> </div>
            
        </div>
    </div>
</div>



<?php include('footer.php'); ?>
