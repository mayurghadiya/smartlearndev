<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("Home");?></a> </li>
                        <li><?php echo ucwords("asset management");?></li>
                        <li class="active"><?php echo ucwords("Project Management");?></li>
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
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Project List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Project");?>
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
                                   <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Course");?></label>
                                    <select class="form-control filter-rows" id="filter3" data-filter="3" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Branch");?></label>
                                    <select id="filter4" name="branch" data-filter="4" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Batch");?></label>
                                    <select id="filter5" name="batch" data-filter="5" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> <?php echo ucwords("Semester");?></label>
                                    <select id="filter6" name="semester" data-filter="6" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                                
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
                                <div class="box-content">  
<div class="">
                                    <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?admin/project/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmproject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Course</option>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select Branch</option>
                                                    <?php
                                                 /*   $course = $this->db->get_where('course', array('course_status' => 1))->result();
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch" onchange="get_student2(this.value);" >
                                                    <option value="">Select batch</option>
                                                    <?php
                                                    /*$databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                            <?php
                                                        }                                                    
                                                     */
                                                        ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester"  onchange="get_students2(this.value);">
                                                    <option value="">Select semester</option>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Project Title");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                            <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Student");?><span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                 <input type="checkbox" name="checkall" id="select_all"  >Check All<br>
                                                <div id="student"></div>
                                                <label class="error" for="student[]"></label>
                                                <!--<select name="student[]" id="student" multiple="">
                                                    <option value="">Select student</option>
                                                                                                  </select>-->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Date of Submission");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text"  readonly="" class="form-control" name="dateofsubmission" id="dateofsubmission" />
                                            </div>
                                        </div>
                                           <input type="hidden" class="form-control" name="pageurl" id="pageurl" />
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("File Upload");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="projectfile" id="projectfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
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
    $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
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
                url:"<?php echo base_url(); ?>index.php?admin/getprojects/submitted",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getsubmit").html(response);
                }
            });
            } else{
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
                url:"<?php echo base_url(); ?>index.php?admin/getprojects/allproject",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
            } else{
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
                                    type:"POST",
                                    url:"<?php echo base_url().'index.php?admin/get_semester/'; ?>",
                                    data:{'course':course},                   
                                    success:function(response){
                                        $("#semesters").html(response);
                                    }
                                });
                    }
                });
        });
        
          $("#degree").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/project'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course").html(response);
                    }
                });
        });
        
         $("#course").change(function(){
                var course = $(this).val();
                 var degree = $("#degree").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/project'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch").html(response);
                        $.ajax({
                                    type:"POST",
                                    url:"<?php echo base_url().'index.php?admin/get_semester/'; ?>",
                                    data:{'course':course},                   
                                    success:function(response){
                                        $("#semester").html(response);
                                    }
                                });
                    }
                });
        });
        
        function get_student2(batch, semester = '') {
         var batch = $("#batch").val();
        var course = $("#course").val();
         var degree = $("#degree").val();
         var semester = $("#semester").val();
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudentcheckbox/',
           type: 'POST',
          data:{'batch':batch,'sem':semester,'course':course,'degree':degree},
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
           url: '<?php echo base_url(); ?>index.php?admin/checkboxstudent/',
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

$( "#frmproject" ).submit(function( event ) {
          if($("#degree").val()!=null & $("#course").val()!=null & $("#batch").val()!=null & $("#semester").val()!=null & $("#title").val()!=null)
          { 
         $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/checkprjects'; ?>",
                    dataType:'json',
                   data:
                        {
                            'degree':$("#degree").val(),
                            'course':$("#course").val(),
                            'batch':$("#batch").val(),
                            'semester':$("#semester").val(),
                            'title':$("#title").val(),
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                         $("#error_lable_exist").html('');
                                    $('#frmproject').attr('validated',true);
                                    $('#frmproject').submit();
                                     } else
                                         {
                                             $("#error_lable_exist").html('Project is already present in the system');
                                         return false;
                                     }
                    }
                });
                    return false; 
                    }
        event.preventDefault();
      });
    $().ready(function () {
        $("#dateofsubmission").datepicker({
            dateFormat: ' MM dd, yy',
            minDate:0           
        });
        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmproject").validate({
            rules: {
                degree: "required",
                course:"required",
                batch: "required",
                semester: "required",
                'student[]': "required",
                dateofsubmission: "required",
                pageurl:
                        {
                            required: true,
                            url: true,
                        },
                projectfile: {
                    required:true,
                   extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt', 
                },
                title:
                        {
                            required: true,                                                                          },
            },
            messages: {                                                                  
                        degree: "Select Course",
                        course:"Select Branch",
                        batch: "Select Batch",
                        semester:"Select Semester",                                                                           
                        'student[]':"Select Student",
                        dateofsubmission: "Select date of submission",
                        projectfile: {
                            required:"Upload file!",
                           extension:'Upload valid file!',  
                        },
                        title:
                            {
                                required: "Enter project name",                                                                            
                            },
            }
        });
    });
    </script>
        </script>
 <script type="text/javascript">
    $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox1').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox1').each(function(){
                this.checked = false;
            });
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
            $('#project-data-tables').dataTable({
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
                $('#project-data-tables').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #project-data-tables_filter{
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
   