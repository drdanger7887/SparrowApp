<?php include('header.php'); ?>
<?php echo theme_js('jquery-ui.js', true); ?>
<?php echo theme_js('popup.js', true); ?>
<?php echo theme_css('themes/base/jquery.ui.all.css', true); ?>
<script type="text/javascript" src="<?php echo theme_js('jquery.validate.js'); ?>"></script>
<?php echo theme_js('pager.js', true); ?>
<script>
    $(document).ready(function () {


    });
</script> 
<script type="text/javascript">
    var baseurl = "<?php print base_url(); ?>";
    var tickicon = "<?php echo theme_img('enquiry_tick.png'); ?>";
</script>



<div class="container-fluid margintop20">
    <div class="container">
        <div class="row">
            

            <div class="col-lg-3 col-md-3 col-sm-3 padding0"> </div>
            <div class="col-lg-6 col-md-6 col-sm-6 padding0">

                <?php 
                    if (isset($rwrdshow)) {
                        $showonereward = $this->Money_model->show_onereward($rwrdshow);
                            echo '<h1 class="upper center margin">Reward "'.$showonereward[0]['reward_name'].'"</h1><div class="clear width100 center margintop20"><img src="'.base_url().'/spcp/images/'.$showonereward[0]['reward_image'].'"><p class="size14 margin10 center">'.$showonereward[0]['reward_descr'].'</p> </div>
                             <div class="line4 margintop40"> </div>
                            ';
                        }
                    
                        if (!isset($purchase))
                    { 
                        echo '<h1 class="upper center marginbot20">My rewards</h1>';
                        $myrwrds = $this->Money_model->show_user_rewards($carpool_session['carpool_session']['user_id']);
                        //var_dump($myrwrds);
                        if (sizeof($myrwrds)>0) {
                            for ($ii=0; $ii<sizeof($myrwrds); $ii++) {
                                $onereward = $this->Money_model->show_onereward($myrwrds[$ii]['ureward_rewardid']);
                                //var_dump($onereward);
                                $cols = 'col-lg-6 col-md-6 col-sm-6';
                                if (sizeof($myrwrds)==1) {$cols = 'col-lg-12 col-md-12 col-sm-12';}
                                echo '<div class="'.$cols.' rewardlist"><div class="center margintop20 bold"><a href="'.base_url('rewards').'/show/'.$onereward[0]['reward_id'].'"><img style="height: 32px; width: auto; margin-right: 10px;" src="'.base_url().'/spcp/images/'.$onereward[0]['reward_image'].'">'.$onereward[0]['reward_name'].'</a></div>
                                <div class=" center size14">Purchased: '.$myrwrds[$ii]['ureward_date'].'</div>
                                <div class="size14 center">Voucher code: &nbsp; <span class="urewardcode">'.$myrwrds[$ii]['ureward_code'].'</span></div>
                                </div>';
                            }
                            echo '<div class="clear margin"> </div><div class="line4 margintop40"> </div>';
                        } else {
                            echo '<p class="center margin">You have no purchased rewards yet</p>';
                        }

                    } 






                    $rwrds = $this->Money_model->show_rewards();
                   
                    $str = $strp = '';
                    for ($i=0; $i<sizeof($rwrds); $i++) {
                        
                        if (isset($purchase) && $rwrds[$i]['reward_id']==$purchase) {
                            $fprognoz = round($usermoney[0]['money_count']) - round($rwrds[$i]['reward_price']);
                            if ($fprognoz<0) {
                                $finalpurchase = '<h3 class="center margin">you have not enough coins to purchase this rewards</h3>';
                            }
                            else {
                                $finalpurchase = '
                                <div class="center margin">
                                <span class="coins">'.round($usermoney[0]['money_count']).'</span> - <span class="coins">'.round($rwrds[$i]['reward_price']).'</span> = <span class="coins">'.$fprognoz.'</span>
                                </div>
                                <h3 class="center margin upper">Are you sure you want to redeem?</h3>
                            <div class="center"><a href="'.base_url('rewards').'/purchase/'.$rwrds[$i]['reward_id'].'?redeem=1" class="alinkbtn1 alinkbtn upper marginbot20">redeem</a></div>';
                            }

                            $strp = '<h1 class="upper center margin">Purchase reward "'.$rwrds[$i]['reward_name'].'"</h1><div class="clear width100 center margintop20"><img src="'.base_url().'/spcp/images/'.$rwrds[$i]['reward_image'].'"><p class="size14 margin10 center">'.$rwrds[$i]['reward_descr'].'</p> </div>
                                '.$finalpurchase.'
                            <div class="line4 margintop40"> </div>
                            ';
                        }  else {

                        }

                        $str .= ' <div class="col-lg-6 col-md-6 col-sm-6 reward" > <img src="'.base_url().'/spcp/images/'.$rwrds[$i]['reward_image'].'"> <p>'.$rwrds[$i]['reward_descr'].'</p>  
                            <div class="rpurch"><div class="rpurchprice">'.round($rwrds[$i]['reward_price']).'</div>
                                <div class="rpurchbtn"><a href="'.base_url('rewards').'/purchase/'.$rwrds[$i]['reward_id'].'" class="alinkbtn">purchase</a></div>
                                
                            </div>
                        </div>';
                    }
                    echo $strp;
                    echo '<h2 class="margin margintop40 center upper">Rewards to Purchase</h2>'.$str;
                 ?>

            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 padding0"> </div>
        <div class="clear marginbot40"> </div>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>
