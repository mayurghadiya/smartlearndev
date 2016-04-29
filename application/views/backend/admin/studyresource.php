<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
           <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo ucwords("Home");?></a> </li>
                        <li><a href="#"><?php echo ucwords("Pages");?></a> </li>
                        <li class="active"><?php echo ucwords("Study Resource Management");?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Study Resource Management");?></h1>
                    
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Study Resource List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Study Resource");?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------> 

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">	
                                 <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Course");?></label>
                                    <select class="form-control filter-rows" id="filter2" data-filter="2" data-type="course">
                                        <option value="">All</option>
                                        <?php foreach ($degree as $row) { ?>
                                            <option value="<?php echo $row->d_name; ?>"
                                                    data-id="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Branch");?></label>
                                    <select id="filter3" name="branch" data-filter="3" class="form-control filter-rows" data-type="branch">
                                        <option value="">All</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label><?php echo ucwords("Batch");?></label>
                                    <select id="filter4" name="batch" data-filter="4" class="form-control filter-rows" data-type="batch">
                                        <option value="">All</option>
                                    </select>
                                </div>                                
                                <div class="form-group col-sm-2">
                                    <label> <?php echo ucwords("Semester");?></label>
                                    <select id="filter5" name="semester" data-filter="5" class="form-control filter-rows" data-type="semester">
                                        <option value="">All</option>

                                    </select>
                                </div>
                                <label style="margin-left: 40px; margin-top: 30px;">OR</label>
                                
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="studyresource-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div><?php echo ucwords("Title");?></div></th>											
                                                <th><div><?php echo ucwords("Course");?></div></th>
                                                <th><div><?php echo ucwords("Branch");?></div></th>
                                                <th><div><?php echo ucwords("Batch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>											                                                
                                                <th><div><?php echo ucwords("Date");?></div></th>									
                                                <th><div><?php echo ucwords("File");?></div></th>											
                                                <th><div><?php echo ucwords("Operation");?></div></th>											
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
                                                  
                                                    <td><?php echo date_formats($row->study_dos); ?></td>	
                                                    <td id="downloadedfile"><a href="<?php echo $row->study_url; ?>" download=""  title="<?php echo $row->study_filename; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_studyresource/<?php echo $row->study_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/studyresource/delete/<?php echo $row->study_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
<?php echo form_open(base_url() . 'index.php?admin/studyresource/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmstudyresource', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Course");?> <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Course</option>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch ");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select Branch</option>
                                                  <option value="All">All</option>
                                                    <?php
                                                    /*  
                                                     * $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                      <!--  <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>-->
                                                        <?php
                                                    }*/
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch ");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch" onchange="get_student2(this.value);" >
                                                    <option value="">Select batch</option>
                                                    <option value="All">All</option>
                                                    <?php
                                                   /* $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester ");?><span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Title ");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                        </div>   

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Date ");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" readonly="" name="dateofsubmission" id="dateofsubmission" />
                                            </div>
                                        </div>
                                       
                                      <!--  <div class="form-group">
                                            <label class="col-sm-3 control-label">Page URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="pageurl" id="pageurl" />
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("File Upload ");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="resourcefile" id="resourcefile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
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
    $("#searchform").submit(function(){
           var degree =  $("#courses").val();
           var course =  $("#branches").val();
           var batch =  $("#batches").val();
            var semester = $("#semesters").val();
            if($("#courses").val()!="" & $("#branches").val()!="" & $("#batches").val()!="" & $("#semesters").val()!="")
            {
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?admin/getstudyresource/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getresponse").html(response);
                }
                
                
            });
            }
            else{
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
                    url:"<?php echo base_url().'index.php?admin/searchallcourse/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        if(degree=='All')
                        {
                            $("#branches").html(response);
                             $("#batches").val($("#batches option:eq(1)").val());
                             $("#branches").val($("#branches option:eq(1)").val());
                             $("#semesters").val($("#semesters option:eq(1)").val());
                            
                        }
                        else{
                            $("#branches").html(response);
                            
                        }
                    }
                });
        });
        $("#batches").change(function(){
            var batches = $("#batches").val();
            if(batches=='All')
            {
                $("#semesters").val($("#semesters option:eq(1)").val());
            }
        });
         $("#branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#courses").val();
                var course = $("#branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/batch_filter/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_semesterall/'; ?>",
                    data:{'course':course},                   
                    success:function(response1){
                        $("#semesters").html(response1);
                         $("#semesters").val($("#semesters option:eq(1)").val());
                    }
                    });
                         if(course=='All')
                        {
                             $("#batches").html(response);
                             $("#batches").val($("#batches option:eq(1)").val());                            
                             $("#semesters").val($("#semesters option:eq(1)").val());
                           
                        }
                        else{
                           $("#batches").append(response);
                            
                        }
                        
                    }
                });
        });
        
                     $("#degree").change(function () {
                                                                    var degree = $(this).val();

                                                                    var dataString = "degree=" + degree;
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "<?php echo base_url() . 'index.php?admin/get_cource/'; ?>",
                                                                        data: dataString,
                                                                        success: function (response) {
                                                                            if (degree == "All")
                                                                            {
                                                                                $("#batch").val($("#batch option:eq(1)").val());
                                                                                $("#course").val($("#course option:eq(1)").val());
                                                                                $("#semester").val($("#semester option:eq(1)").val());
                                                                                //  $("#course")..val($("#semester option:second").val());
                                                                                // $("#semester").prepend(response);
                                                                                // $('#semester option:selected').text();


                                                                            } else {


                                                                                $("#course").html(response);
                                                                            }
                                                                        }

                                                                    });

                                                                });

                                                                $("#course").change(function () {
                                                                    var course = $(this).val();
                                                                    var degree = $("#degree").val();
                                                                    var dataString = "course=" + course + "&degree=" + degree;
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "<?php echo base_url() . 'index.php?admin/get_batchs/'; ?>",
                                                                        data: dataString,
                                                                        success: function (response) {
                                                                             $.ajax({
                                                                        type: "POST",
                                                                        url: "<?php echo base_url() . 'index.php?admin/get_semesterall/'; ?>",
                                                                        data: {'course':course},
                                                                        success: function (response1) {
                                                                            $("#semester").html(response1);
                                                                           
                                                                                  $("#semester").val($("#semester option:eq(1)").val());
                                                                           
                                                                        } 
                                                                        });
                                                                       
                                                                            
                                                                            
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
                                                             $("#dateofsubmission").datepicker({
                                                                dateFormat: ' MM dd, yy', 
                                                                minDate: 0
                                                            });
                                                           
                                                            jQuery.validator.addMethod("character", function (value, element) {
                                                                return this.optional(element) || /^[A-z]+$/.test(value);
                                                            }, 'Please enter a valid character.');

                                                            jQuery.validator.addMethod("url", function (value, element) {
                                                                return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
                                                            }, 'Please enter a valid URL.');


                                                            $("#frmstudyresource").validate({
                                                                rules: {
                                                                    degree: "required",
                                                                    course:"required",
                                                                    batch: "required",
                                                                    semester: "required",
                                                                    dateofsubmission: "required",
                                                                    pageurl:
                                                                            {
                                                                                required: true,
                                                                                url: true,
                                                                            },                                                                    
                                                                    title:
                                                                            {
                                                                                required: true,                                                                              
                                                                            },
                                                                    resourcefile:{
									required: true,
                                                                         extension:'gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',  
                                                                            
                                                                    },
                                                                },
                                                                messages: {
                                                                    
                                                                    degree: "Please select Course",
                                                                    course:"Please select Branch",
                                                                    batch: "Please select batch",
                                                                    semester: "Please select semester",
                                                                    dateofsubmission: "Please select date",
                                                                    pageurl:
                                                                            {
                                                                                required: "Please enter page url",
                                                                            },                                                                    
                                                                    title:
                                                                            {
                                                                                required: "Please enter title",                                                                               
                                                                            },
                                                                    resourcefile: {
required: 'please upload file',
                                   
                                                                                    extension:'Please upload valid file',  
                                                                             },
                                                                }
                                                            });
                                                        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#studyresource-tables').dataTable({
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
                $('#studyresource-tables').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #studyresource-tables_filter{
            margin-top: -50px;
        }
    </style>
<?php include('plus_icon.php'); ?>