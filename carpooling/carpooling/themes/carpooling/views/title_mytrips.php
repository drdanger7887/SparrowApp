<?php   

 echo '
    <div class="container-fluid pagetitle pagetrip">
        <h1><img src="'.base_url('/').'spcp/images/icon-trip.png">&nbsp; '.$seo_title.'</h1>
        <div class="titleline"> </div>

        <div class=""><a id="menulink1" class="pagealink" href="'.base_url("addtrip").'">As a car owner</a> <a id="menulink2" class="pagealink" href="'.base_url("addtrip").'/upcoming_trip_passenger">As a passenger</a> <a id="menulink3" class="pagealink" href="'.base_url("addtrip").'/upcoming_trip_requests">My Requests</a>
        </div>
    </div>
    '; 
    if(isset($menuactive)) {
        
        echo '<script>
                $("#menulink'.$menuactive.'").addClass("menuactive"); 
            </script>
            ';
        
    }
?>    

