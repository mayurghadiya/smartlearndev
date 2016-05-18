<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                   <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("asset management");?></li>
                         <li><?php echo ucwords("Participate Management");?></li>
                    </ul>                
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Participate Management");?></h1>
                </div>
            </div>

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								


                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Participate List");?>
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
                                                <th><div><?php echo ucwords("Parti. Title");?> </div></th>											
                                                <th><div><?php echo ucwords("Course");?></div></th>											
                                                <th><div><?php echo ucwords("Branch");?></div></th>
                                                <th><div><?php echo ucwords("Batch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>											                                              
                                                <th><div><?php echo ucwords("Date");?></div></th>									
                                            
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
                                                        if ($row->pp_degree == "All") {
                                                            echo "All";
                                                        } else {
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
                                                        if ($row->pp_course == "All") {
                                                            echo "All";
                                                        } else {
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
                                                        if ($row->pp_batch == "All") {
                                                            echo "All";
                                                        } else {
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
                                                        if ($row->pp_semester == "All") {
                                                            echo "All";
                                                        } else {
                                                            foreach ($semester as $sem) {

                                                                if ($sem->s_id == $row->pp_semester) {
                                                                    echo $sem->s_name;
                                                                }
                                                            }
                                                        }
                                                        ?>

                                                    </td>	
                                                  
                                                    <td><?php  echo date_formats($row->pp_dos); ?></td>	

                                                    	
                                                </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->



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
         $("#upd_searchform").validate({
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
    
    $("#upd_courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/get_course/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#upd_branches").html(response);
                    }
                });
        });
         $("#upd_branches").change(function(){
                //var course = $(this).val();
                // var degree = $("#degree").val();
                var degree = $("#upd_courses").val();
                var course = $("#upd_branches").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php?professor/get_semester'; ?>",
                            data: {'course':course},
                            success: function (response1) {
                                $("#upd_semesters").html(response1);
                            }
                        });
                        $("#upd_batches").html(response);
                    }
                });
        });
        $("#upd_searchform").submit(function(){
            var degree =  $("#upd_courses").val();
           var course =  $("#upd_branches").val();
           var batch =  $("#upd_batches").val();
            var semester = $("#upd_semesters").val();
            if($("#upd_courses").val()!="" & $("#upd_branches").val()!="" & $("#upd_batches").val()!="" & $("#upd_semesters").val()!="")
            {
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>index.php?professor/getuploads/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#upd_getsubmit").html(response);
                }
                
                
            });
            }else{
                $("#upd_searchform").validate({
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
         $("#sub_courses").change(function(){
                var degree = $(this).val();
                
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?professor/get_course/'; ?>",
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
                    url:"<?php echo base_url().'index.php?professor/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php?professor/get_semester'; ?>",
                            data: {'course':course},
                            success: function (response1) {
                                $("#sub_semesters").html(response1);
                            }
                        });
                        $("#sub_batches").html(response);
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
                url:"<?php echo base_url(); ?>index.php?professor/getactivity/",
                data:{'degree':degree,'course':course,'batch':batch,"semester":semester},
                success:function(response)
                {
                    $("#getsubmit").html(response);
                }
                
                
            });
            }else{
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
                url:"<?php echo base_url(); ?>index.php?professor/getsurvey/",
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
                    url:"<?php echo base_url().'index.php?professor/get_course/'; ?>",
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
                    url:"<?php echo base_url().'index.php?professor/get_batches/'; ?>",
                    data:dataString,                   
                    success:function(response){
                         $.ajax({
                            type: "POST",
                            url: "<?php echo base_url() . 'index.php?professor/get_semester'; ?>",
                            data: {'course':course},
                            success: function (response1) {
                                $("#semesters").html(response1);
                            }
                        });
                        $("#batches").html(response);
                    }
                });
        });
        $("#degree").change(function () {
            var degree = $(this).val();

            var dataString = "degree=" + degree;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php?professor/get_cource/'; ?>",
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
                url: "<?php echo base_url() . 'index.php?professor/get_batchs/'; ?>",
                data: dataString,
                success: function (response) {
                     $.ajax({
                        type:"POST",
                        url:"<?php echo base_url().'index.php?professor/get_semesterall/'; ?>",
                        data:{'course':course},                   
                        success:function(response1){
                            $("#semester").html(response1);
                             $("#semester").val($("#semester option:eq(1)").val());
                        }
                        });
                      $("#semester").val($("#semester option:eq(1)").val());
                    $("#batch").html(response);
                }
            });
        });



        function get_student2(batch, semester = '') {
            $.ajax({
                url: '<?php echo base_url(); ?>index.php?professor/batchwisestudent/',
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
                url: '<?php echo base_url(); ?>index.php?professor/semwisestudent/',
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

         $("#frmsurvey").validate({
            rules: {
                question: "required",
                description: "required",
                status: "required"
            },
            messages: {
                question: "enter question",
                description: "enter description",
                status: "select status"
            },
        });

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

            $("#frmparticipate").validate({
                rules: {
                    degree: "required",
                    course: "required",
                    batch: "required",
                    semester: "required",
                    dateofsubmission: "required",                   
                    title:
                            {
                                required: true,
                            },
                },
                messages: {
                    degree: "Please select course",
                    course: "Please select branch",
                    batch: "Please select batch",
                    semester: "Please select semester",
                    dateofsubmission: "Please select date of submission",
                    title:
                            {
                                required: "Please enter title",
                            },
                },
            });
        });

        $(document).ready(function () {
        "use strict";
        $('#data-tabless').dataTable();
        });


    </script>

<script type="text/javascript">
	$(document).ready(function() {
		"use strict";				
		$('#data-tablessearch').DataTable( {
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
	$(document).ready(function() {
		"use strict";				
		$('#data-tablesupd').DataTable( {
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
            $('#data-tables-activity').dataTable({
                "order": [[0, "desc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.filter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#data-tables-activity').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
    </script>

    <style>
        #data-tables-activity_filter{
            margin-top: -50px;
        }
    </style>
<script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#upload-data-table').dataTable({
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
                $('#upload-data-table').DataTable().column(filter_id).search(
                        $('#filter' + filter_id).val()
                        ).draw();
            }
        });
           $(document).ready(function() {
		"use strict";				
		$('#data-tablesupd').dataTable();
	});
    </script>

    <style>
        #upload-data-table_filter{
            margin-top: -50px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#survey-table').dataTable({
                "order": [[0, "asc"]],
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.pfilter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#survey-table').DataTable().column(filter_id).search(
                        $('#pfilter' + filter_id).val()
                        ).draw();
            }
        });
           $(document).ready(function() {
		"use strict";				
		$('#survey-table').dataTable();
	});
    </script>

    <style>
        #survey-table_filter{
            margin-top: -50px;
        }
    </style>
  <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#uploaded-table').dataTable({
                "dom": "<'row'<'col-sm-6'><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-4'l><'col-sm-4'i><'col-sm-4'p>>",
            });
            $('.ufilter-rows').on('change', function () {
                var filter_id = $(this).attr('data-filter');
                filter_column(filter_id);
            });

            function filter_column(filter_id) {
                $('#uploaded-table').DataTable().column(filter_id).search(
                        $('#ufilter' + filter_id).val()
                        ).draw();
            }
        });
           $(document).ready(function() {
		"use strict";				
		$('#uploaded-table').dataTable();
	});
    </script>

    <style>
        #uploaded-table_filter{
            margin-top: -50px;
        }
    </style>
    
