<h3>Vehicle Information</h3>
<div class="add_trip_enquery_tbl">
    <?php if ($enquiries) { ?>         	
        <table valign="center" cellpadding="0" cellspacing="0"  width="100%">
            <tbody><tr bgcolor="#01acf1">
                    <th> <?php echo lang('enquiry_date'); ?></th> 
                    <th> <?php echo lang('trip_date'); ?></th>  
                    <th> <?php echo lang('vehicle_number'); ?> </th>                            
                    <th> <?php echo lang('passenger_name'); ?> </th>
                    <th> <?php echo lang('passenger_number'); ?> </th>
                    <th> <?php echo lang('passenger_email'); ?> </th>
                    <th> <?php echo lang('enquiry_status'); ?></th>
                </tr>  

                <?php foreach ($enquiries as $enquiry) { ?>

                    <tr>                        	
                        <td> <?= date('d, M Y', strtotime($enquiry->enquiry_date_time)) ?> </td>
                        <td> <?= date('d, M Y', strtotime($enquiry->enquiry_trip_date)) ?> </td>
                        <td> <?= $enquiry->vechicle_number ?> </td>
                        <td> <?= $enquiry->user_first_name . '.' . $enquiry->user_last_name ?> </td> 
                        <td> <?= $enquiry->user_mobile ?> </td>                           
                        <td class="lst"> <?= $enquiry->user_email ?></td>
                        <td><input type="button" name="accept" value="<?php echo lang('accept'); ?>">
                            <input type="button" name="reject" value="<?php echo lang('reject'); ?>"></td>
                    </tr>   
                <?php } ?>
            </tbody></table>
        <?php } else{

        echo lang('no_enquiry');

    }?>