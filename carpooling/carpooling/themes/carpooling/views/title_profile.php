<?php   

 echo '
    <div class="container-fluid pagetitle pagetrip">
        <h1><img src="'.base_url('/').'spcp/images/icon-profile.png">&nbsp; '.$seo_title.'</h1>
        <div class="titleline"> </div>

        <div><a class="pagealink personal-info menuactive" href="'.base_url("profile#personal-info").'">Personal Info</a> <a class="pagealink my-cars-info" href="'.base_url("profile#my-cars-info").'">My Vehicles</a> <a class="pagealink changepwd_form" href="'.base_url("profile#changepwd_form").'">Change Password</a>
        </div>
    </div>

    <script>
    	$(document).ready(function(){
    		var menuactive = window.location.hash.replace("#",".");
    		if (menuactive!="") {
    			$(".pagealink").removeClass("menuactive");
    		}
    		$(menuactive).addClass("menuactive");
    		$(".pagealink").click(function(){
		    	$(".pagealink").removeClass("menuactive");
    			$(this).addClass("menuactive");
	    	});
	    });
    </script>
	';
        

?>    