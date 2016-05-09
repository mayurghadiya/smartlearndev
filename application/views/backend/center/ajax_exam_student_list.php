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
<?php
if($param=="exam")
{
?>
<table class="table table-striped" id="data-tables">
<thead>
    <tr>
        <th><div>#</div></th>
        <th>Exam Name</th>
        <th>student name</th>
          <th>Roll No</th>
        <th>Exam start date</th>
        <th>Exam end date</th>
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
        <td><?php echo $row->std_roll; ?></td>  
         <td><?php echo $row->em_start_time; ?></td> 
          <td><?php echo $row->em_end_time; ?></td> 
    </tr>
<?php endforeach; ?>						
</tbody>
</table>
<?php
}
if($param=="timetable")
{
?>
    <input type="hidden" id="presentaction" name="presentaction" value="<?php echo $action?>">
    <input type="hidden" id="stdcount" name="stdcount" value="<?php echo count($studentlist)?>">
    <table class="table table-striped" id="data-tables">
<thead>
    <tr>
        <th><div>#</div></th>
        <th>Exam Name</th>
        <th>Roll No</th>
        <th>student name</th>
        <th><input type="checkbox" name="selecctall" id="selecctall"  /> Select all</th>
    </tr>
</thead>
<tbody>
    <?php $count = 0;
    foreach ($studentlist as $row):
        $count++;
        ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $row->em_name; ?> </td> 
        <td><?php echo $row->std_roll; ?></td>                         
        <td><?php echo $row->name; ?></td> 
        <td>
        <?php
        $is_present = $this->db->get_where('exam_attendance', array('student_exam_center_id'=>$row->student_exam_center_id,
            'exam_time_table_id'=>$timetableid))->result();
        $chkaction="";
        if(!empty($is_present))
        {
            if($is_present[0]->is_present=='present')
            {
                $chkaction="checked";
            }
        ?>
             <input type="hidden" id="attendanceid" name="attendanceid<?php echo $count; ?>" value="<?php echo $is_present[0]->exam_attendance_id;?>">
             <?php
        }
             ?>
            <input type="checkbox" class="multiselect" name="attend<?php echo $count; ?>" value="1" <?php echo $chkaction?> />Is Present?
            <input type="hidden" name="student_exam_center<?php echo $count; ?>" value="<?php echo $row->student_exam_center_id; ?>" />
            
        </td> 
    </tr>
<?php endforeach; ?>
  
</tbody>
        <tr ><td> <input type="submit" name="submit" value="Submit"/> </td> </tr>
</table>
 
<?php
}
?>


<script>
	$(document).ready(function() {
		$('#selecctall').click(function(event) {  
			if(this.checked) { 
				$('.multiselect').each(function() { 
					this.checked = true;          
				});
				}else{
				$('.multiselect').each(function() { 
					this.checked = false;               
				});         
			}
		});
		
		$(".multiselect").click(function(){
			if($(".multiselect").length == $(".multiselect:checked").length) {
				$("#selecctall").prop("checked",true);
				} else {
				$("#selecctall").prop("checked",false);
			}
			
		}); 
		
	});
</script>