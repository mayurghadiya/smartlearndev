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
                                
                                <div class="panel-body">
                                    <form action="#" method="post" id="searchform">
                                            <div class="form-group col-sm-2 validating">
                                                <label>Course</label>
                                                <select id="courses" name="degree" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2 validating">
                                                <label>Branch</label>
                                                <select id="branches" name="course" class="form-control">

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2 validating">
                                                <label>Batch</label>
                                                <select id="batches" name="batch" class="form-control">

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
                                     
                                <div class="form-group col-sm-2">
                                    <div class="form-group">
                                    <button type="submit" class="submit btn btn-info">Search</button>
                                    </div>
                                </div>
                                    </form>
                            </div>
                                            
                                        </div>
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
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">                	
<?php echo form_open(base_url() . 'index.php?admin/assignment/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Assignment Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
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
                                                <input type="text" class="form-control" name="submissiondate" id="submissiondate" />
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
                                                <button type="submit" class="btn btn-info">Add Assignment</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
                            
                            
                            
                                 <div class="tab-pane box" id="submitedlist">	
                               <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                        <tr>
                                            <th><div>#</div></th>												
                                            <th><div>Assignment Name</div></th>
                                            <th><div>Student Name</div></th>
                                             <th><div>Degree</div></th>
                                            <th><div>Course</div></th>												
                                            <th><div>Batch</div></th>												
                                            <th><div>Sem</div></th>	
                                            <th><div>Submitted date</div></th>	
                                            <th><div>Comment</div></th>
                                            <th><div>Action</div></th>												                                            
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
                                                    <td><?php echo date('F d, Y',strtotime($rowsub->submited_date)); ?></td>	
                                                    <td><?php echo $rowsub->comment; ?></td>
                                                   <td><a href="uploads/project_file/<?php echo $rowsub->document_file;?>" download="" title="<?php echo  $rowsub->document_file;?>"><i class="fa fa-download"></i></a></td>                      	
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
         $("#searchform").submit(function(){
           var degree =  $("#courses").val();
           var course =  $("#branches").val();
           var batch =  $("#batches").val();
            var semester = $("#semesters").val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getassignment/allassignment",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
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
