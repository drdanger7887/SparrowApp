<?php   
   ///  The Community details
    if (!isset($communityid)) {
        redirect('community');
        die();
    }

    $comm = $this->community_model->get_community($communityid);
    if(!$comm) {
        redirect('community');
        die();
    }

 echo '
    <div class="container-fluid pagetitle pagecomm">
        <h1><img src="'.base_url('/').'spcp/images/icon-community.png">&nbsp; '.$seo_title.'</h1>
        <a href="'.base_url('community/site/'.$comm[0]->comm_slug).'"><img class="commlogo" src="'.base_url('/').'spcp/images/community/'.$comm[0]->comm_slug.'.jpg"></a>
        <h2>'.$comm[0]->comm_name.'</h2>
        <p>'.$comm[0]->comm_address.'</p>
        <div><a id="menulink1" class="pagealink" href="'.base_url('community/site/'.$comm[0]->comm_slug).'">View Journeys</a> <a id="menulink2" class="pagealink" href="'.base_url('addtrip/form?commid='.$comm[0]->comm_id).'">Post a Journey</a> <a id="menulink3" class="pagealink" href="'.base_url('addtrip/form_request?commid='.$comm[0]->comm_id).'">Request a Journey</a> </div>
    </div>
    '; 
    if(isset($menuactive)) {
        
        echo '<script>
                $("#menulink'.$menuactive.'").addClass("menuactive"); 
            </script>
            ';
        
    }

?>    