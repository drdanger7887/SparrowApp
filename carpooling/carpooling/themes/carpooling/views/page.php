<?php include('header.php');
include('title.php');
?>
<div class="container-main margin">
  <div class="container">
   <div class="row margin">       
       
   </div>
 </div>
</div>
<div class="container-fluid">
  <div class="container">
      <div class="row pages">
          <?php echo html_entity_decode($page->content); ?> 
      </div>
    </div>
</div>
<?php include('footer_home.php');?>