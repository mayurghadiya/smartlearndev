<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Library Management</li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Library Management</h1>

                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Library List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Library
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
                                    <table class="table table-striped" id="library-data">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>											
                                                <th><div>Library Name</div></th>											
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
                                            foreach ($library as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->lm_title; ?></td>	
                                                    <td>
                                                        <?php
                                                        if ($row->lm_degree == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($degree as $deg) {

                                                                if ($deg->d_id == $row->lm_degree) {
                                                                    echo $deg->d_name;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->lm_course == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($course as $crs) {

                                                                if ($crs->course_id == $row->lm_course) {
                                                                    echo $crs->c_name;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->lm_batch == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($batch as $bch) {
                                                                if ($bch->b_id == $row->lm_batch) {
                                                                    echo $bch->b_name;
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        if ($row->lm_semester == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($semester as $sem) {
                                                                if ($sem->s_id == $row->lm_semester) {
                                                                    echo $sem->s_name;
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                    </td>	
                                                    <td><a href="<?php echo $row->lm_url; ?>" download="" target="_blank" title="<?php echo $row->lm_filename; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo date_formats($row->lm_dos); ?></td>	

                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_library/<?php echo $row->lm_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/library/delete/<?php echo $row->lm_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
<?php echo form_open(base_url() . 'index.php?admin/library/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmlibrary', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Course <span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label">Branch <span style="color:red">*</span></label>
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
                                                      } */
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch <span style="color:red">*</span></label>
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
                                                      } */
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester <span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label">Title <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Date  <span style="color:red">*</span></label>
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
                                            <label class="col-sm-3 control-label">File Upload <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="libraryfile" id="libraryfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add Library</button>
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
                } else {
                    $("#course").html(response);
                }
            }
        });
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
                url:"<?php echo base_url(); ?>index.php?admin/getlibrary/",
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
         $("#courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/course_filter/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        if(degree=='All')
                        {
                             $("#branches").html(response);
                             $("#batches").val($("#batches option:eq(1)").val());
                             $("#branches").val($("#branches option:eq(1)").val());
                             $("#semesters").val($("#semesters option:eq(1)").val());
                           // $("#branches").append(response);
                        }
                        else{
                            $("#branches").append(response);
                            
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
                        type:"POST",
                        url:"<?php echo base_url().'index.php?admin/get_semesterall/'; ?>",
                        data:{'course':course},                   
                        success:function(response1){
                            $("#semester").html(response1);
                             $("#semester").val($("#semester option:eq(1)").val());
                        }
                        });
                //$("#semester").val($("#semester option:eq(1)").val());
                $("#batch").html(response);
            }
        });
    });


    function get_student2(batch, semester = '') {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
            type: 'POST',
            data: {'batch': batch},
            success: function (content) {
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
            data: {'batch': batch, 'sem': sem, 'course': course, 'degree': degree},
            success: function (content) {
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
            dateFormat: ' MM dd, yy',
            minDate: 0
        });
        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("url", function (value, element) {
            return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
        }, 'Please enter a valid URL.');

        $("#frmlibrary").validate({
            rules: {
                degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                student: "required",
                dateofsubmission: "required",
                libraryfile: {
                    required: true,
                  extension: 'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',
                },
                title:
                        {
                            required: true,
                        },
                libraryfile: {
                    required: true,
                    extension: 'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt|jpeg',
                }
            },
            messages: {
                degree: "Please select Course",
                course: "Please select Branch",
                batch: "Please select Batch",
                semester: "Please select Semester",
                student: "Please select Student",
                dateofsubmission: "Please select date",
                libraryfile: {
                    required: "Please upload file",
                  extension: 'Please upload valid file',
                },
                title:
                        {
                            required: "Please enter title",
                        },
            }
        });
    });

    </script>


<script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#library-data').dataTable({
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
                $('#library-data').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #library-data_filter{
            margin-top: -50px;
        }
    </style>
