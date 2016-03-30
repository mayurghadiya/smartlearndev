<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>dataTables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('custom_plugin')?>dataTables/dataTables.bootstrap.js"></script>
 <script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tables').dataTable();
	} );
</script>	
<div class="vd_title-section clearfix">
<div class="vd_panel-header">
    <h1>Student List</h1>            
</div>
</div>
<table class="table table-striped" id="data-tables">
<thead>
    <tr>
        <th><div>#</div></th>
        <th>Exam Name</th>
        <th>student name</th>
        <th>Exam start date</th>
        <th>Exam end date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php $count = 1;
    foreach ($studentlist as $row):
        ?>
    <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo $row->em_name; ?></td>                         
        <td><?php echo $row->name; ?></td> 
         <td><?php echo $row->em_start_time; ?></td> 
          <td><?php echo $row->em_end_time; ?></td> 
           <td><?php echo $row->is_present; ?></td> 
    </tr>
<?php endforeach; ?>						
</tbody>
</table>
