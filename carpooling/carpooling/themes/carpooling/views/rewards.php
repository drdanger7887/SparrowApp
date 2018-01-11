<?php 
include('header.php'); 
include('title.php'); 



    function show_rewards($rwrds){
        $str = "";
        $rwclass = "col-lg-3 col-md-3 col-sm-4 col-xs-6";
        if ((sizeof($rwrds))==1) {$rwclass = "col-12";}

        for ($i=0; $i<sizeof($rwrds); $i++) {
            $offset = '';
            
            if ((sizeof($rwrds))==2 && $i==0) {$offset .= ' col-lg-offset-3 col-md-offset-3 col-sm-offset-2';}
            else if ((sizeof($rwrds))==3 && $i==0) {$offset .= ' col-lg-offset-1-5';}

            $rewardsicon = base_url().'/spcp/images/rewards/icon-'.$rwrds[$i]['reward_category'].'.png';

                        $str .= '
                        <div class="colon center '.$rwclass.$offset.'">
                            <div class="coloncard cardreward link1">
                                <img class="rewardimg" title="'.$rwrds[$i]['partner_name'].'" alt="'.$rwrds[$i]['partner_name'].'" src="'.$rewardsicon.'">
                            <h3><a href="'.base_url('rewards').'/purchase/'.$rwrds[$i]['reward_id'].'" class="">'.$rwrds[$i]['reward_name'].'</a></h3>
                            
                                <div class="rewardbtn">
                                    <div class="points">
                                        <img src="'.base_url('/').'spcp/images/icon-coin.png" title="points"> '.$rwrds[$i]['reward_price'].'
                                    </div>
                                    <a href="'.base_url('rewards').'/purchase/'.$rwrds[$i]['reward_id'].'" class="alinkbtn alinkbtn1">CLAIM</a>
                                </div>
                            </div>
                        </div>';

        }

        return($str);
    }

    function show_myrewards($rwrds) {
        $str = "";
        for ($i=0; $i<sizeof($rwrds); $i++) {
            $rewardsicon = base_url().'/spcp/images/rewards/icon-'.$rwrds[$i]['reward_category'].'.png';
            if ($i%2) {$newrow = '<div class="row clearfix"> </div>';} else {$newrow = '';}
                        $str .= '
                        <div class="colon center col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="coloncard2 cardreward2 row">
                                <div class="center col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <img class="" src="'.base_url().'/spcp/images/rewards/'.$rwrds[$i]['partner_slug'].'.jpg'.'">
                                </div>
                                <div class="center col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <img class="rewardimg" title="'.$rwrds[$i]['partner_name'].'" alt="'.$rwrds[$i]['partner_name'].'" src="'.$rewardsicon.'">
                                    <h3>'.$rwrds[$i]['reward_name'].'</h3>
                                    <div class="size14">Purchased: <span>'.$rwrds[$i]['ureward_date'].'</span></div>
                                    <div class="size14 center marginbot10">Voucher code: &nbsp; <span class="voucher">'.$rwrds[$i]['ureward_code'].'</span></div>
                                </div>
                            

                            </div>
                        </div>'.$newrow;

        }

        return($str);
    }




?>

<script type="text/javascript">
    $(document).ready(function () {


    });

</script> 



            

                <?php 
               

                    $rewards_str = "";
                    if (isset($purchase)) {


?>
<div class="container-fluid margintop20 mapbg">
    <div class="container">
        <div class="row padding20">
<?php


                        $onerwrd = ($this->Money_model->show_rewards("",$purchase));
                        //var_dump($onerwrd);
                        if (!$onerwrd) {redirect("rewards"); die();}
                        $pid = $this->Money_model->show_partners($onerwrd[0]['reward_partner_id']);
                        $rewardsicon = base_url().'/spcp/images/rewards/icon-'.$onerwrd[0]['reward_category'].'.png';
                        echo '
                        <div class="center">
                            <div class="purchase">
                                <img src="'.base_url().'/spcp/images/rewards/'.$pid[0]['partner_slug'].'.jpg" alt="'.$pid[0]['partner_name'].'"><br>
                                <div class="cardreward">
                                    <img class="rewardimg" title="'.$onerwrd[0]['partner_name'].'" alt="'.$onerwrd[0]['partner_name'].'" src="'.$rewardsicon.'">
                                    <h3>'.$onerwrd[0]['reward_name'].'</h3>
                            
                                    <div class="rewardbtn">';

                                        $totalprice = $usermoney[0]['money_count'] - $onerwrd[0]['reward_price'];
                                        if ($totalprice <0) {
                                            echo '
                                            <div class="points">
                                                <img src="'.base_url('/').'spcp/images/icon-coin.png" title="points"> '.$usermoney[0]['money_count'].' - '.$onerwrd[0]['reward_price'].'
                                            </div>                                        
                                            <p class="marginbot20">Sorry, you don&#39;t have enough points.<br>
                                            You can purchase points <a href="'.base_url('payments').'">here</a>.
                                            </p>
                                            <p class="marginbot10"><a href="#" class="alinkbtn alinkbtn1 adisabled">REDEEM</a></p>';
                                        
                                        } else {
                                            echo '
                                            <div class="points">
                                                <img src="'.base_url('/').'spcp/images/icon-coin.png" title="points"> '.$usermoney[0]['money_count'].' - '.$onerwrd[0]['reward_price'].' = <img src="'.base_url('/').'spcp/images/icon-coin.png" title="points"> '.$totalprice.'
                                            </div>                                        
                                            <p class="marginbot20">ARE YOU SURE YOU WANT TO REDEEM?</p>
                                            <p class="marginbot10"><a href="'.base_url('rewards').'/purchase/'.$onerwrd[0]['reward_id'].'?redeem=1" class="alinkbtn alinkbtn1">REDEEM</a></p>';
                                        }

                                    


                                        echo '
                                    <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           
        </div>
    </div>
</div>
                            ';
                    }


?>

<div class="container-fluid margintop20">
    <div class="container">
        <div class="row padding20">
<?php            




                    $pid = $this->Money_model->show_partners();


                            if ($profile->user_profile_img) {
                                $myimg = theme_profile_img($profile->user_profile_img);
                            } else {
                                $myimg = theme_img('default.png');
                            }
                            
                    if(isset($myrewards)) {

                            $myrwrds = $this->Money_model->show_user_rewards($carpool_session['carpool_session']['user_id']);
                            $rewards_str .= '
                            <div id="myrewards" class="row collapse1 mapbg">'.show_myrewards($myrwrds).'

                            </div>
                            <hr class="marginbot40">
                            <div class="clearfix"></div>';
                    } else {


                    $rewards_str .= '<h2 class="margintop40 marginbot40 center upper">Rewards to Purchase</h2><hr>';
                        for ($i=0; $i<sizeof($pid); $i++) {
                            /* 'partner_id' 'partner_name' 'partner_slug' 'partner_descr' */

                            /*   Old
                            $rewards_str .= '
                            <a class="collapsed row accordion" data-toggle="collapse" href="#partner-'.$pid[$i]['partner_id'].'" aria-expanded="false" aria-controls="collapseThree">
                            
                                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12 text-right">
                                    
                                        <img src="'.base_url().'/spcp/images/rewards/'.$pid[$i]['partner_slug'].'.jpg" alt="'.$pid[$i]['partner_name'].'">
                                </div> 
                                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 text-left">
                                        <h2 class="">'.$pid[$i]['partner_name'].' <img class="chevron" src="'.base_url().'/spcp/images/icon-chevron-up.png'.'"></h2>
                                        <p>'.$pid[$i]['partner_descr'].'</p>
                                    
                                
                                </div>
                                <div class="clearfix"> </div>
                            </a>
                            ';*/
                            $rewards_str .= '
                            <div class="collapsed1 row center accordion" href="#partner-'.$pid[$i]['partner_id'].'" >
                            
                                <div class="">                                    
                                        <img src="'.base_url().'/spcp/images/rewards/'.$pid[$i]['partner_slug'].'.jpg" alt="'.$pid[$i]['partner_name'].'">
                                </div> 

                                <div class="clearfix"> </div>
                            </div>
                            ';
                            $rwrd = $this->Money_model->show_rewards($pid[$i]['partner_id']);
                            $rewards_str .= '
                            <div id="partner-'.$pid[$i]['partner_id'].'" class="row collapse1  mapbg">'.show_rewards($rwrd).'
                            </div>
                            <hr class="marginbot40">';
                        }
                    }
                    
                    
                    echo $rewards_str;
                    
                    
                    //echo '<h2 class="margin margintop40 center upper">Rewards to Purchase</h2>'.show_rewards($rwrds);
 ?>




        <div class="clear marginbot40"> </div>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>
