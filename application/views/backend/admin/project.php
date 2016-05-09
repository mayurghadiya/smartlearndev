<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                   <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("asset management");?></li>
                         <li><?php echo ucwords("Project Management");?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Project Management");?></h1>
                </div>
            </div>           
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered" id="changestab">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Project List");?>
                                </a></li>
                                <li>
                                <a href="#submitedassignment" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Submitted Project");?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">
                                <form action="#" method="post" id="searchform">
                                            <div class="form-group col-sm-3 validating">
                                                <label>Course</label>
                                                <select id="courses" name="degree" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3 validating">
                                                <label>Branch</label>
                                                <select id="branches" name="course" class="form-control">
                                                     <option value="">Select</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3 validating">
                                                <label>Batch</label>
                                                <select id="batches" name="batch" class="form-control">
                                                     <option value="">Select</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2 validating">
                                                <label>Select Semester</label>
                                                <select id="semesters" name="semester" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($semester as $row) { ?>
                                                        <option value="<?php echo $row->s_id; ?>"
                                                               ><?php echo $row->s_name; ?></option>
                                                            <?php } ?>
                                                </select>
                                            </div>
                                     
                                
                                    <div class="form-group col-sm-1">
                                        <label>&nbsp;</label>
                                    <button type="submit" class="submit btn btn-info vd_bg-green">Go</button>
                                    </div>
                                
                                    </form>
                                   
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="project-data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div><?php echo ucwords("Project Title");?></div></th>
                                                 <th><div><?php echo ucwords("Student Name");?></div></th>											
                                                <th><div><?php echo ucwords("Course");?></div></th>	
                                                <th><div><?php echo ucwords("Branch");?></div></th>
                                                <th><div><?php echo ucwords("Batch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>
                                                 <th><div><?php echo ucwords("File");?></div></th>
                                                <th><div><?php echo ucwords("Date of submission");?></div></th>						
                                                <th><div><?php echo ucwords("Action");?></div></th>											
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
                                                    <td id="downloadedfile"> <a href="<?php echo $row->pm_url; ?>" download=""><i class="fa fa-download"></i></a></td>
                                                    <td><?php echo date_formats($row->pm_dos); ?></td>	
                                                   
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_project/<?php echo $row->pm_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/project/delete/<?php echo $row->pm_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
                                                       
                                                    </td>	
                                                </tr>
                                                    <?php endforeach; ?>						
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                
                                <!----CREATION FORM ENDS-->
                            </div>
                            
                             <!----Project Detail Nikita patel 23-3-2016-->
                            <div class="tab-pane box" id="submitedassignment">	
                                       <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Course");?></label>
                                    <select class="form-control sfilter-rows" id="sfilter3" data-filter="3" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Branch");?></label>
                                    <select id="sfilter4" name="branch" data-filter="4" class="form-control sfilter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Batch");?></label>
                                    <select id="sfilter5" name="batch" data-filter="5" class="form-control sfilter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> <?php echo ucwords("Semester");?></label>
                                    <select id="sfilter6" name="semester" data-filter="6" class="form-control sfilter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                 <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                              
                                <div class="panel-body table-responsive" id="getsubmit">
                                    <table class="table table-striped" id="sub-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>												
                                                <th><div><?php echo ucwords("Project Name");?></div></th>
                                                <th><div><?php echo ucwords("Student Name");?></div></th>                                                											
                                                <th><div><?php echo ucwords("Course");?></div></th>	
                                                <th><div><?php echo ucwords("Branch");?></div></th>
                                                <th><div><?php echo ucwords("Batch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>
                                                <th><div><?php echo ucwords("Submitted date");?></div></th>
                                                <th><div><?php echo ucwords("Comment");?></div></th>
                                                <th><div><?php echo ucwords("File");?></div></th>												                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($submitedproject->result() as $rowsub):
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
                                                <td id="downloadedfile"><a href="uploads/project_file/<?php echo $rowsub->document_file; ?>" download="" title="<?php echo $rowsub->document_file; ?>"><i class="fa fa-download"></i></a></td>                                                    	
                                            </tr>
<?php endforeach; ?>			 			
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
  
       
 
<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tabless').DataTable( {
             aoColumnDefs: [
                {
                   bSortable: false,
                   aTargets: [ -1 ]
                }
              ]
        } );

	} );
</script>
<script type="text/javascript">
        $(document).ready(function () {
            
            $('#project-data-tables').dataTable();
        });
    </script>

  
 <script type="text/javascript">
       $("#searchform").submit(function(){
           var degree =  $("#courses").val();
           var course =  $("#branches").val();
           var batch =  $("#batches").val();
            var semester = $("#semesters").val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getprojects/allproject",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
             return false;
         });
         $("#courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#branches").html(response);
                    }
                });
        });
         $("#branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#courses").val();
                var course = $("#branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batches").html(response);
                    }
                });
        });
        
        $(document).ready(function () {
            "use strict";
            $('#sub-tables').dataTable({
                "order": [[0, "desc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.sfilter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#sub-tables').DataTable().column(filter_id).search(
                        $('#sfilter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #sub-tables_filter{
            margin-top: -50px;
        }
    </style>
   
   <style>
    .nav-fixedtabs {
    left: 86%;
    position: fixed;
    top: 25%;
    }
    #navfixed{
        cursor: pointer;
    }
    
    </style>
    
    <div class="md-fab-wrapper">

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addproject/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>