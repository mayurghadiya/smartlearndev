<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Participate Management</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Participate Management</h1>
                </div>
            </div>
            
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                       
                        
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Participate List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Participate
                                </a></li>
                                <li>
                            <a href="#survey" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                Survey List
                            </a></li>  
                                <li>
                                   
                                <a href="#listing" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Activity List
                                </a></li> 
                                <li>
                                <a href="#uploads" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Upload List
                                </a></li>
                                
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">								
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Participate Title </div></th>											
                                                <th><div>Degree</div></th>											
                                                <th><div>Course</div></th>
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>											
                                                <th><div>Downloadable File</div></th>											
                                                <th><div>Date of submission</div></th>									
                                                <th><div>Operation</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($participate as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->pp_title; ?></td>	
                                                    <td>
                                                        <?php
                                                        if($row->pp_degree=="All")
                                                            {
                                                                echo "All";
                                                            }
                                                            else{
                                                        foreach ($degree as $deg) {
                                                            
                                                            if ($deg->d_id == $row->pp_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                    }
                                                        ?>
                                                    </td>	
                                                     <td>
                                                        <?php
                                                         if($row->pp_course=="All")
                                                            {
                                                                echo "All";
                                                            }else{
                                                        foreach ($course as $crs) {
                                                            
                                                            if ($crs->course_id == $row->pp_course) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                    }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if($row->pp_batch=="All")
                                                            {
                                                                echo "All";
                                                            }
                                                        else{
                                                        foreach ($batch as $bch) {
                                                            
                                                            if ($bch->b_id == $row->pp_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                    }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                         if($row->pp_semester=="All")
                                                            {
                                                                echo "All";
                                                            }else{
                                                        foreach ($semester as $sem) {

                                                            if ($sem->s_id == $row->pp_semester) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                    }
                                                        ?>

                                                    </td>	
                                                    <td><a href="<?php echo $row->pp_url; ?>" download="" title="<?php echo $row->pp_filename; ?>" ><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo  date('F d Y',strtotime($row->pp_dos)); ?></td>	

                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_participate/<?php echo $row->pp_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/participate/delete/<?php echo $row->pp_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
                                    <?php echo form_open(base_url() . 'index.php?admin/participate/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmparticipate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Degree *</label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select degree</option>
                                                     <option value="All">All</option>
                                                    <?php
                                                    $datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($datadegree as $rowdegree) {
                                                        ?>
                                                        <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Course *</label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select course</option>
                                                    <option value="All">All</option>
                                                    <?php
                                                    $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                        <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch *</label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch" onchange="get_student2(this.value);" >
                                                    <option value="">Select batch</option>
                                                    <option value="All">All</option>
                                                    <?php
                                                    $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester *</label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester" onchange="get_students2(this.value);">
                                                   <option value="">Select Semester</option>
                                                   <option value="All">All</option>
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
                                       <div class="form-group">
                                            <label class="col-sm-3 control-label">Participate Title *</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date  *</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="dateofsubmission" id="dateofsubmission" />
                                            </div>
                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Upload *</label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="participatefile" id="participatefile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Participate</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
                            
                             <div class="tab-pane box" id="survey">		
                                 <div class="tab-pane box active" id="list">								
                                <div class="panel-body table-responsive">
                                     <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>                                           
                                                <th><div>Student Name</div></th>       
                                                <th><div>Degree</div></th>
                                                <th><div>Course</div></th>
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>	
                                                <th><div>Academic quality</div></th>                                            
                                                <th><div>Facilities</div></th>                                          
                                                <th><div>Value of degree</div></th>                                 
                                                <th><div>Action</div></th>                                          
                                            </tr>
                                        </thead>
                                         <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($survey->result() as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>    
                                                    <td><?php 
                                                    foreach($student as $stu)
                                                    {
                                                        if($stu->std_id == $row->student_id)
                                                        {
                                                            echo $stu->name;
                                                        }                                                        
                                                    }
                                                    ?></td>
                                                    <td>
                                                        <?php
                                                        foreach ($degree as $deg) {
                                                            if ($deg->d_id == $row->std_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
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
                                                            if ($bch->b_id == $row->std_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->semester_id) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        ?>

                                                    </td>
                                                    <td><?php echo $row->academicquality; ?></td>   
                                                    <td><?php echo $row->facilities; ?></td>
                                                    <td><?php echo $row->valueofdegree; ?></td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_survey_detal/<?php echo $row->survey_id; ?>');" data-original-title="View Detail" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                     </td>  
                                                </tr>
                                            <?php endforeach; ?>                        
                                        </tbody>
                                    </table>
                                </div>
                               </div>
                        </div>
                            
                            
                            <div class="tab-pane box" id="listing">								
                                <div class="panel-body table-responsive">
                                   <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                               <th><div>#</div></th>											
                                                <th><div>Student Name</div></th>	
                                                <th><div>Participate Title</div></th>
                                                <th><div>Comment</div></th>
                                                <th><div>Degree</div></th>											
                                                <th><div>Course</div></th>
                                                <th><div>Batch</div></th>
                                                
                                                <th><div>Semester</div></th>											
                                                <th><div>Participate Status (Yes/No)</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counts = 1;
                                            
                                            foreach ($volunteer as $rows):
                                                $std_id = $rows['student_id'];
                                             $pp_id =  $rows['pp_id'];
                                                $this->db->join('degree','degree.d_id=student.std_degree');
                                                $this->db->join('semester','semester.s_id=student.semester_id');
                                                 $this->db->join('batch','batch.b_id=student.std_batch');
                                                $this->db->join('course','course.course_id=student.course_id');
                                                
                                                $user =  $this->db->get_where('student',array('std_id'=>$std_id))->result_array();
                                              $part = $this->db->get_where('participate_manager',array('pp_id'=>$pp_id))->result_array();
                                             
                                                ?>
                                                <tr>
                                                    <td><?php echo $counts++; ?></td>	
                                                     <td><?php echo $user[0]['name']; ?></td>	
                                                     <td><?php echo $part[0]['pp_title']; ?></td>
                                                     <td><?php echo wordwrap($rows['comment'],40,"<br>\n",true); ?></td>
                                                      <td><?php if(isset($user[0]['d_name'])){ echo $user[0]['d_name'];} ?></td>
                                                    
                                                       <td><?php if(isset($user[0]['c_name'])){ echo $user[0]['c_name']; } ?></td>	
                                                         <td><?php if(isset($user[0]['b_name'])){ echo $user[0]['b_name']; } ?></td>
                                                        <td><?php if(isset($user[0]['s_name'])){ echo $user[0]['s_name']; } ?></td>	
                                                         <td><?php if($rows['p_status']=="1"){ echo "Yes"; }else{ echo "No"; } ?></td>	
                                                    
                                                </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane box" id="uploads">								
                                <div class="panel-body table-responsive">
                                   <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                               <th><div>#</div></th>											
                                                <th><div>Student Name</div></th>	                                               
                                                <th><div>Degree</div></th>											
                                                <th><div>Course</div></th>
                                                <th><div>Batch</div></th>
                                                
                                                <th><div>Semester</div></th>											
                                                <th><div>Download</div></th>											                                                
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $countsu = 1;
                                            
                                            
                                             
                                            foreach ($uploads as $rowsupl):
                                                $std_id = $rowsupl['std_id'];
                                              //   $pp_id =  $rowsupl['pp_id'];
                                           // if()
                                                $this->db->join('degree','degree.d_id=student.std_degree');
                                                $this->db->join('semester','semester.s_id=student.semester_id');
                                                 $this->db->join('batch','batch.b_id=student.std_batch');
                                                $this->db->join('course','course.course_id=student.course_id');
                                                
                                                $user1 =  $this->db->get_where('student',array('std_id'=>$std_id))->result_array();
                                             
                                             
                                                ?>
                                                <tr>
                                                    <td><?php echo $countsu++; ?></td>	
                                                     <td><?php echo $user1[0]['name']; ?></td>	
                                                     
                                                      <td><?php if(isset($user1[0]['d_name'])) { echo $user1[0]['d_name']; } ?></td>
                                                    
                                                       <td><?php if(isset($user1[0]['c_name'])) { echo $user1[0]['c_name']; } ?></td>	
                                                         <td><?php if(isset($user1[0]['b_name'])) { echo $user1[0]['b_name']; } ?></td>
                                                        <td><?php if(isset($user1[0]['s_name'])) { echo $user1[0]['s_name']; } ?></td>	
                                                        <td><a href="<?php echo $rowsupl['upload_url']; ?>" download=""><i class="fa fa-download" title="<?php echo $rowsupl['upload_file_name']; ?>"></i></a></td>	
                                                    
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
        
        
         $("#degree").change(function(){
                var degree = $(this).val();
             
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        if(degree=="All")
                        {
                             $("#batch").val($("#batch option:eq(1)").val());
                             $("#course").val($("#course option:eq(1)").val());
                              $("#semester").val($("#semester option:eq(1)").val());
                           //  $("#course")..val($("#semester option:second").val());
                            // $("#semester").prepend(response);
                            // $('#semester option:selected').text();
                           

                        }
                        else{


                        $("#course").html(response);
                        }
                    }

                });
            
        });
        
         $("#course").change(function(){
                var course = $(this).val();
                 var degree = $("#degree").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch").html(response);
                    }
                });
        });
        
        
        
        function get_student2(batch, semester = '') {
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
           type: 'POST',
           data: {'batch':batch},
           success: function(content){
               $("#student").html(content);
           }
        });
    }
    
    function get_students2(sem)
    {
        var batch = $("#batch").val();
        var course = $("#course").val();
         var degree = $("#degree").val();
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
           type: 'POST',
           data: {'batch':batch,'sem':sem,'course':course,'degree':degree},
           success: function(content){
               //alert(content);
               $("#student").html(content);
           }
        });
        
        
    }
    
   
    
    
    
    
        
        
                                                            $.validator.setDefaults({
                                                                submitHandler: function (form) {
                                                                    form.submit();
                                                                }
                                                            });

                                                            $().ready(function () {

                                                                $("#dateofsubmission").datepicker({
                                                                    minDate:0
                                                                });
                                                                jQuery.validator.addMethod("character", function (value, element) {
                                                                    return this.optional(element) || /^[A-z]+$/.test(value);
                                                                }, 'Please enter a valid character.');

                                                                jQuery.validator.addMethod("url", function (value, element) {
                                                                    return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
                                                                }, 'Please enter a valid URL.');

                                                                $("#frmparticipate").validate({
                                                                    rules: {
                                                                        degree: "required",
                                                                        course:"required",
                                                                        batch: "required",
                                                                        semester: "required",     
                                                                        dateofsubmission: "required",                                                                      
                                                                        participatefile: {
                                                                           required: true,
                                                                            extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',  
                                                                            
                                                                        },
                                                                        title:
                                                                                {
                                                                                    required: true,                                                                                 
                                                                                },
                                                                    },
                                                                    messages: {
                                                                        degree: "Please select degree",
                                                                        course:"Please select course",
                                                                        batch: "Please select batch",
                                                                        semester: "Please select semester",       
                                                                        dateofsubmission: "Please select date of submission",
                                                                       
                                                                        participatefile:{
                                                                            required: "Please select participate file",
                                                                            extension:'Please upload valid file',  
                                                                            
                                                                        },
                                                                        title:
                                                                                {
                                                                                    required: "Please enter title",                                                                       
                                                                                },
                                                                    },
                                                                });
                                                            });
                                                            
                                                            
                
                                             
                                                            
    </script>
