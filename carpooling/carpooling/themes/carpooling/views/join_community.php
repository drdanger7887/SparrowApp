<?php 
 include('header_outmenu.php'); 
 ?>





 <div class="container-fluid margintop30">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                
<p class="center upper blue bold">Join your community</p>
    
    
<table class="comm margintop20 marginbot20" cellspacing="0">
   <thead>
      <tr>
         <th> </th>
         <th>Name</th>
         <th>Location</th>
      </tr>
   </thead>

   <tbody>
       <tr id="comm1">
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-sweat.jpg"></td>
           <td>SWEAT</td>
           <td>E14 4AS</td>
       </tr>
       <tr id="comm2">
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-bisley.jpg"></td>
           <td>Bisley Shooting Ground</td>
           <td>GU24 0NY</td>

       </tr>
       <tr id="comm3">
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-epsom.jpg"></td>
           <td>Epsom Golf Club</td>
           <td>KT17 3PT</td>
       </tr>
       <tr id="comm4">
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-fencing.jpg"></td>
           <td>London Fencing Club</td>
           <td>EC1V 3PU</td>
       </tr>       
</table>
<script> 
$(document).ready(function (){
  $( "#comm1" ).on( "click", function() {
    window.location = "<?php echo base_url('community'); ?>";
  });
  $( "#comm2" ).on( "click", function() {
    alert('Bisley Shooting Ground');
  });
  $( "#comm3" ).on( "click", function() {
    alert('Epsom Golf Club');
  });
  $( "#comm4" ).on( "click", function() {
    alert('London Fencing Club');
  });    
})
</script>
        
<div class="clear"> </div> 
        <p class="signin2 center margintop40 marginbot40"> Community not listed? <a href="#">Create one here</a> </p>
        </div>
        <!-- End -->
    </div>
</div>

<?php include('footer.php'); ?>
