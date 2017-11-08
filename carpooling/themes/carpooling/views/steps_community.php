<?php 
 include('header_stepsintro.php'); 
 ?>


<style> 

    html {
        background: url(<?php echo base_url('/'); ?>spcp/images/londonmap-dark.jpg) center top;
        margin: 0px;
    }

    body, .page-header {
        background: none;
    }


    table.dataTable.select tbody tr,
    table.dataTable thead th:first-child {
        cursor: pointer;
    }

    .dataTables_wrapper #example_length, 
    .dataTables_wrapper #example_filter,
    .dataTables_wrapper #example_info,
    .dataTables_wrapper #example_paginate
    {
        display: none;
    }

    table#example img {
        max-height: 32px;
    }


    .mainwindow {
        padding: 20px; 
        background: white !important;
        border-radius:5px;
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        box-shadow: 0 5px 5px rgba(0,0,0, 0.55);
        -moz-box-shadow: 0 5px 5px rgba(0,0,0, 0.55);
        -webkit-box-shadow: 0 5px 5px rgba(0,0,0, 0.55);
    }


</style>




 <div class="container-fluid">
    <div class="col-lg-3 col-md-3 col-sm-1 col-1" style=""> </div>
        <div class="col-lg-6 col-md-6 col-sm-10 col-10" style="padding: 20px;">
            <div class="row mainwindow">
                
<h4 class="center">SELECT COMMUNITIES</h4>
    
<form id="frm-example" action="<?php echo base_url('community'); ?>" method="POST">
    
<table id="example" class="display select" cellspacing="0" width="96%">
   <thead>
      <tr>
         <th class="center" style="width: 10px;"><input name="select_all" value="1" type="checkbox"></th>
         <th> </th>
         <th>Name</th>
         <th>Location</th>
      </tr>
   </thead>

   <tbody>
       <tr>
           <td style="width: 10px;">1</td>
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-sweat.jpg"></td>
           <td>SWEAT</td>
           <td>E14 4AS</td>
       </tr>
       <tr>
           <td>2</td>
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-bisley.jpg"></td>
           <td>Bisley Shooting Ground</td>
           <td>GU24 0NY</td>

       </tr>
       <tr>
           <td>3</td>
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-epsom.jpg"></td>
           <td>Epsom Golf Club</td>
           <td>KT17 3PT</td>
       </tr>
       <tr>
           <td>4</td>
           <td><img src="<?php echo base_url('/'); ?>spcp/images/cm-fencing.jpg"></td>
           <td>London Fencing Club</td>
           <td>EC1V 3PU</td>
       </tr>       
</table>
<hr>

<p class="center"><button>Submit</button></p>

</form>

<script> 


//
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}

$(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#example').DataTable({
      'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
      }],
      'order': [0, 'asc'],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });

   // Handle click on checkbox
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('tbody input[type="checkbox"]:not(:checked)', table.table().container()).trigger('click');
      } else {
         $('tbody input[type="checkbox"]:checked', table.table().container()).trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });
    
   // Handle form submission event 
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY     
      
      // Output form data to a console     
      //$('#example-console').text($(form).serialize());
      //console.log("Form submission", $(form).serialize());
       
      // Remove added elements
      //$('input[name="id\[\]"]', form).remove();
       
      // Prevent actual form submission
      //e.preventDefault();
   });
});





</script>







            
        </div>
        <!-- End -->
    </div>
   <div class="col-lg-3 col-md-3 col-sm-1 col-1"> </div>
</div>

<?php //include('footer.php'); ?>
</body>
</html>