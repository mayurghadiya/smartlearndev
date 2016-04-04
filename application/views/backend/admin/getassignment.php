
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>												
                                                <th><div>Assignment Name</div></th>
                                                <th><div>Course</div></th>
                                                <th><div>Branch</div></th>												
                                                <th><div>Batch</div></th>												
                                                <th><div>Semester</div></th>												
                                                <th><div>Downloadable File</div></th>
                                                <th><div>Date of submission</div></th>												
                                                <th><div>Operation</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($assignment as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                   	
                                                    <td><?php echo $row->assign_title; ?></td>	
                                                     <td><?php foreach($degree as $dgr): 
                                                        if($dgr->d_id==$row->assign_degree):
                                                            
                                                            echo $dgr->d_name;
                                                        endif;
                                                        
                                                    
                                                        endforeach;
                                                    ?></td>
                                                    <td>
                                                        <?php
                                                        foreach ($course as $crs) {
                                                            if ($crs->course_id == $row->course_id) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($batch as $bch) {
                                                            if ($bch->b_id == $row->assign_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->assign_sem) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        ?>													
                                                    </td>	
                                                    <td><a href="<?php echo $row->assign_url; ?>" download="" title="<?php echo $row->assign_title; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo date('F d, Y',strtotime($row->assign_dos)); ?></td>	
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_assignment/<?php echo $row->assign_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/assignment/delete/<?php echo $row->assign_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
</script>
                           