<div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Title</div></th>											
                                                <th><div>Course</div></th>
                                                <th><div>Branch</div></th>
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>											                                                
                                                <th><div>Date</div></th>									
                                                <th><div>File</div></th>											
                                                <th><div>Action</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($studyresource as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->study_title; ?></td>	
                                                    <td>
                                                        <?php
                                                        if($row->study_degree!="All")
                                                        {
                                                        foreach ($degree as $deg) {
                                                            if ($deg->d_id == $row->study_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                        }
                                                        else{
                                                            echo "All";
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        if($row->study_course!="All")
                                                        {
                                                        foreach ($course as $crs) {
                                                            if ($crs->course_id == $row->study_course) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                        }else{
                                                            echo "All";
                                                            
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($row->study_batch!="All")
                                                        {
                                                        foreach ($batch as $bch) {
                                                            if ($bch->b_id == $row->study_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        }
                                                        else{
                                                            echo "All";
                                                            
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                         if($row->study_sem!="All")
                                                        {
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->study_sem) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        }else{
                                                            echo "All";
                                                        }
                                                        ?>

                                                    </td>	
                                                  
                                                    <td><?php echo date('F d, Y',strtotime($row->study_dos)); ?></td>	
  <td><a href="<?php echo $row->study_url; ?>" download=""  title="<?php echo $row->study_filename; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_studyresource/<?php echo $row->study_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/studyresource/delete/<?php echo $row->study_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
                                                    </td>	
                                                </tr>
<?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>

<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tables').dataTable();
	} );
        $(document).ready(function() {
		"use strict";				
		$('#data-tabless').dataTable();
	} );
</script>
            