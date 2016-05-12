<?php if($param=='allproject'){ ?>
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Project Title</div></th>
                                                 <th><div>Student Name</div></th>											
                                                <th><div>Course</div></th>	
                                                <th><div>Branch</div></th>
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>
                                                 <th><div><?php echo ucwords("class");?></div></th>
                                                 <th><div>File</div></th>
                                                <th><div>Date of submission</div></th>											
                                               											
                                                <th><div>Action</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($project as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->pm_title; ?></td>	
                                                     <td>
                                                        <?php
                                                          $stu=explode(',',$row->pm_student_id);
                                                        
                                                        foreach ($student as $std) {
                                                            if(in_array($std->std_id,$stu))
                                                            {
                                                                 echo $std->std_first_name.'&nbsp'.$std->std_last_name. ', ';
                                                            }
                                                        }

                                                        ?>
                                                    </td>   
                                                    <td>
                                                        <?php
                                                        foreach ($degree as $deg) {
                                                            if ($deg->d_id == $row->pm_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                     <td>
                                                        <?php
                                                        foreach ($course as $crs) {
                                                            if ($crs->course_id == $row->pm_course) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($batch as $bch) {
                                                            if ($bch->b_id == $row->pm_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->pm_semester) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                     <td>
                                                        <?php 
                                                        foreach($class as $c)
                                                        {
                                                             if($c->class_id== $row->class_id)
                                                            {
                                                                echo $c->class_name;
                                                            }
                                                        }
                                                            
                                                        ?>
                                                    </td>
                                                    <td> <a href="<?php echo $row->pm_url; ?>" download=""><i class="fa fa-download"></i></a></td>
                                                    <td><?php echo date("F d, Y",strtotime($row->pm_dos)); ?></td>	
                                                   
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_project/<?php echo $row->pm_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/project/delete/<?php echo $row->pm_id; ?>');" title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
                                                       
                                                    </td>	
                                                </tr>
                                                    <?php endforeach; ?>						
                                        </tbody> 
                                    </table>
                                </div>
<?php }
if($param=='submitted'){?>
<div class="panel-body table-responsive" id="getsubmit">
                                    <table class="table table-striped" id="data-tabless">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>												
                                                <th><div>Project Name</div></th>
                                                <th><div>Student Name</div></th>                                                											
                                                <th><div>Course</div></th>	
                                                <th><div>Branch</div></th>
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>
                                               
                                                <th><div>Submitted date</div></th>
                                                <th><div>Comment</div></th>
                                                <th><div>Action</div></th>												                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($submitedproject as $rowsub):
                                                ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $rowsub->pm_title; ?></td>
                                                <td><?php  echo $rowsub->std_first_name.'&nbsp'.$rowsub->std_last_name. ', '; ?></td>	
                                              <td>
                                                        <?php
                                                        foreach ($degree as $deg) {
                                                            if ($deg->d_id == $rowsub->pm_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                     <td>
                                                        <?php
                                                        foreach ($course as $crs) {
                                                            if ($crs->course_id == $rowsub->pm_course) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($batch as $bch) {
                                                            if ($bch->b_id == $rowsub->pm_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $rowsub->pm_semester) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        ?>

                                                    </td>	
                                                <td><?php echo date_formats($rowsub->dos); ?></td>	
                                                <td><?php echo $rowsub->description; ?></td>
                                                <td><a href="uploads/project_file/<?php echo $rowsub->document_file; ?>" download="" title="<?php echo $rowsub->document_file; ?>"><i class="fa fa-download"></i></a></td>                                                    	
                                            </tr>
<?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
<?php } ?>
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
                           