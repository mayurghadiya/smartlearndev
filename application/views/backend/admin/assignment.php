<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Assignment Management</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Assignment Management</h1>                    
                </div>
            </div>
           
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Assignment List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Assignment
                                </a></li>
                                
                                 <li>
                                <a href="#submitedlist" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Submitted assignment list
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">		
                                
                                 <div class="form-group col-sm-2">
                                    <label>Course</label>
                                    <select class="form-control filter-rows" id="filter2" data-filter="2" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Branch</label>
                                    <select id="filter3" name="branch" data-filter="3" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Batch</label>
                                    <select id="filter4" name="batch" data-filter="4" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> Semester</label>
                                    <select id="filter5" name="semester" data-filter="5" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                 <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                               <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="assignment-list">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>												
                                                <th><div>Assignment Name</div></th>
                                                <th><div>Course</div></th>
                                                <th><div>Branch</div></th>												
                                                <th><div>Batch</div></th>												
                                                <th><div>Semester</div></th>
                                                <th><div>Description</div></th>
                                                <th><div>File</div></th>
                                                <th><div>Date of submission</div></th>												
                                                <th><div>Action</div></th>											
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
                                                     <td><?php echo  wordwrap($row->assign_desc,30,"<br>\n");?></td>
                                                    <td id="downloadedfile"><a href="<?php echo $row->assign_url; ?>" download="" title="<?php echo $row->assign_title; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo date_formats($row->assign_dos); ?></td>	
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_assignment/<?php echo $row->assign_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn  menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/assignment/delete/<?php echo $row->assign_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
                                <div class="box-content">  
<div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>                                       
<?php echo form_open(base_url() . 'index.php?admin/assignment/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Assignment Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                             <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Course</option>
                                                    <?php
                                                    $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                        <option value="<?= $dgr->d_id ?>"><?= $dgr->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Branch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select Branch</option>
                                                    <?php
                                                   /* $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                        <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch">
                                                    <option value="">Select Batch</option>
                                                    <?php
                                                  /*  $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select Semester</option>
                                                    <?php
                                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                    foreach ($datasem as $rowsem) {
                                                        ?>
                                                        <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                      <!--  <div class="form-group">
                                            <label class="col-sm-3 control-label">Assignment URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="assignmenturl" id="assignmenturl" />
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Submission Date<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" readonly="" name="submissiondate" id="submissiondate" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Upload<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="assignmentfile" id="assignmentfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add Assignment</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
                            
                            
                            
                                 <div class="tab-pane box" id="submitedlist">	
                                        <div class="form-group col-sm-2">
                                    <label>Course</label>
                                    <select class="form-control sfilter-rows" id="sfilter3" data-filter="3" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Branch</label>
                                    <select id="sfilter4" name="branch" data-filter="4" class="form-control sfilter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Batch</label>
                                    <select id="sfilter5" name="batch" data-filter="5" class="form-control sfilter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> Semester</label>
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
                                            <th><div>Assignment Name</div></th>
                                            <th><div>Student Name</div></th>
                                             <th><div>Course</div></th>
                                            <th><div>Branch</div></th>												
                                            <th><div>Batch</div></th>												
                                            <th><div>Sem</div></th>	
                                            <th><div>Submitted date</div></th>	
                                            <th><div>Comment</div></th>
                                            <th><div>File</div></th>												                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($submitedassignment->result() as $rowsub):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $rowsub->assign_title; ?></td>
                                                    <td><?php echo $rowsub->name; ?></td>
                                                    <td><?php foreach($degree as $dgr): 
                                                        if($dgr->d_id==$rowsub->assign_degree):
                                                            
                                                            echo $dgr->d_name;
                                                        endif;
                                                        
                                                    
                                                        endforeach;
                                                    ?></td>
                                                    <td>
                                                    <?php 
                                                            foreach($course as $crs)
                                                            {
                                                                    if($crs->course_id==$rowsub->course_id)
                                                                    {
                                                                            echo $crs->c_name;
                                                                    }
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                            foreach($batch as $bch)
                                                            {
                                                                    if($bch->b_id==$rowsub->assign_batch)
                                                                    {
                                                                            echo $bch->b_name;
                                                                    }
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                            foreach($semester as $sem)
                                                            {
                                                                    if($sem->s_id==$rowsub->assign_sem)
                                                                    {
                                                                            echo $sem->s_name;
                                                                    }
                                                            }														
                                                    ?>													
                                                    </td>	
                                                    <td><?php echo date_formats($rowsub->submited_date); ?></td>	
                                                    <td><?php echo $rowsub->comment; ?></td>
                                                    <td id="downloadedfile"><a href="uploads/project_file/<?php echo $rowsub->document_file;?>" download="" title="<?php echo  $rowsub->document_file;?>"><i class="fa fa-download"></i></a></td>                      	
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
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript"> 
         $( "#frmassignment" ).submit(function( event ) {
          if($("#title").val()!=null & $("#degree").val()!=null & $("#batch").val()!=null & $("#semester").val()!=null & $("#course").val()!=null )
          { 
         $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/checkassignments'; ?>",
                    dataType:'json',
                   data:
                        {
                            'title':$("#title").val(),
                            'semester':$("#semester").val(),
                            'degree':$("#degree").val(),
                            'batch':$("#batch").val(),
                            'course':$("#course").val()
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                         $("#error_lable_exist").html('');
                                    $('#frmassignment').attr('validated',true);
                                    $('#frmassignment').submit();
                                     } else
                                         {
                                             $("#error_lable_exist").html('Record is already present in the system');
                                         return false;
                                     }
                    }
                });
                    return false; 
                    }
        event.preventDefault();
      });
        
         $("#sub_searchform").validate({
                rules: {
                    degree:"required",
                    course:"required",
                    batch:"required",
                    semester:"required",
                },
                messages:{
                    degree:"select course",
                    course:"select branch",
                    batch:"select batch",
                    semester:"select semester",
                }
            });
            $("#searchform").validate({
             rules: {
                 degree:"required",
                 course:"required",
                 batch:"required",
                 semester:"required",
             },
             messages:{
                 degree:"select course",
                 course:"select branch",
                 batch:"select batch",
                 semester:"select semester",
             }
         });
                        
         $("#sub_courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#sub_branches").html(response);
                    }
                });
        });
         $("#sub_branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#sub_courses").val();
                var course = $("#sub_branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#sub_batches").html(response);
                        
                            $.ajax({
                               type: "POST",
                               url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                               data: dataString,
                               success: function (response1) {
                                   $("#sub_semesters").html(response1);
                               }
                           });
                    }
                });
        });
        $("#sub_searchform").submit(function(){
            var degree =  $("#sub_courses").val();
           var course =  $("#sub_branches").val();
           var batch =  $("#sub_batches").val();
            var semester = $("#sub_semesters").val();
             if($("#sub_courses").val()!="" & $("#sub_branches").val()!="" & $("#sub_batches").val()!="" & $("#sub_semesters").val()!="")
            {
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getsubmitted/submitted",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getsubmit").html(response);
                }
                
                
            });
            }
            else{
                    $("#sub_searchform").validate({
                      rules: {
                          degree:"required",
                          course:"required",
                          batch:"required",
                          semester:"required",

                      },
                      messages:{
                          degree:"select course",
                          course:"select branch",
                          batch:"select batch",
                          semester:"select semester",
                      }
                  });
            }
             return false;
        });
        
         $("#searchform").submit(function(){
           var degree =  $("#courses").val();
           var course =  $("#branches").val();
           var batch =  $("#batches").val();
            var semester = $("#semesters").val();
            if($("#courses").val()!="" & $("#branches").val()!="" & $("#batches").val()!="" & $("#semesters").val()!="")
            {
                
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getassignment/allassignment",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
            }else{
                    $("#searchform").validate({
                          rules: {
                              degree:"required",
                              course:"required",
                              batch:"required",
                              semester:"required",
                          },
                          messages:{
                              degree:"select course",
                              course:"select branch",
                              batch:"select batch",
                              semester:"select semester",
                          }
                      });
            }
             return false;
         });
        $("#degree").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course").html(response);
                    }
                });
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
                        
                        $.ajax({
                           type: "POST",
                           url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                           data: dataString,
                           success: function (response1) {
                               $("#semesters").html(response1);
                           }
                       });
                    }
                });
        });
        
         $("#course").change(function(){
                var course = $(this).val();
                 var degree = $("#degree").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch").html(response);
                        
                        $.ajax({
                           type: "POST",
                           url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                           data: dataString,
                           success: function (response1) {
                               $("#semester").html(response1);
                           }
                       });
                    }
                });
        });
        
       
        
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#submissiondate").datepicker({
            dateFormat: ' MM dd, yy',
            minDate: 0
        });

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmassignment").validate({
            rules: {
                degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                submissiondate: "required",
                assignmenturl:
                        {
                            required: true,
                            url: true,
                        },
                assignmentfile: {
                            required:true,
                            extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|txt',  

                    },
                title:
                        {
                            required: true,                                                                              
                        },

            },
            messages: {
                degree:"Select Course",
                course: "Select Branch",
                batch: "Select Batch",
                semester: "Select Semester",
                submissiondate: "Select date of submission",
                assignmenturl:
                        {
                            required: "Enter page url",
                        },
                assignmentfile: {
                    required: "Upload file",
                        extension:'Upload valid file',  
                    },
                title:
                        {
                            required: "Enter title",
                        },
            }
        });
    });
    </script>

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
            "use strict";
            $('#assignment-list').dataTable({
                "order": [[7, "desc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.filter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#assignment-list').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #assignment-list_filter{
            margin-top: -50px;
        }
    </style>
    
 <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#sub-tables').dataTable({
                "order": [[7, "desc"]],
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
   
        