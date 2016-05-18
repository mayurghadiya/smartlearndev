 <script>
<?php
$message = $this->session->flashdata('flash_message');
if($message != '') { ?>
$.toaster({ 
	priority : 'success', 
	title : 'Success! ', 
	message : '<?php echo $message; ?>',
	timeOut: 5000
});
<?php } ?>
 </script> 
<div class="vd_title-section clearfix">
    <div class="">
        <h1><?php echo count($datastudent)." students found"?></h1>
    </div>
</div>
   <br>
<table class="table table-striped"  id="data-tables">
<thead>
    <tr>
        <th><div>#</div></th>												
        <th><div>Roll No</div></th>												
        <th><div>Full Name</div></th>												
        <th><div>Email</div></th>												
        <th><div>Mobile No</div></th>												
        <th><div>Operation</div></th>												
    </tr>
</thead>
<tbody>
    <?php
    $count = 1;
    foreach ($datastudent as $row):
        ?>
        <tr>
            <td><?php echo $count++; ?></td>											
           <!-- <td>
                <?php
                if($row->profile_photo != '') { ?>
                    <img src="<?= base_url() ?>uploads/student_image/<?= $row->profile_photo; ?>" height="70px" width="70px"/>
                <?php } else{
                    if($row->std_gender == 'Male') { ?>
                        <img src="<?= base_url() ?>uploads/student_image/male.jpg" height="70px" width="70px"/>
                    <?php } else { ?>
                        <img src="<?= base_url() ?>uploads/student_image/female.jpg" height="70px" width="70px"/>
                    <?php }
                }
                ?>
             </td>-->	
            <td><?php echo $row->std_roll?></td>
            <td><?php echo $row->std_first_name . " " . $row->std_last_name; ?></td>					
            <td><?php echo $row->email; ?></td>											
            <td><?php echo $row->std_mobile; ?></td>											
            <td class="menu-action">	
                <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_student/<?php echo $row->std_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

            </td>											
        </tr>
    <?php endforeach; ?>						
</tbody>
</table>
