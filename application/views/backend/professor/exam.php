<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js'></script>
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home"); ?></a> </li>
                        <li><?php echo ucwords("examinations"); ?></li>
                        <li><?php echo ucwords("exam"); ?></li>
                    </ul> 
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo $page_title; ?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Exam List"); ?>
                                </a></li>

                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">                            
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">   
                                <form id="exam-search" action="#" class="form-groups-bordered validate">
                                    <div class="form-group col-sm-3">
                                        <label><?php echo ucwords("Course"); ?></label>
                                        <select class="form-control" id="search-degree"name="degree">
                                            <option value="">Select</option>
                                            <?php foreach ($degree as $row) { ?>
                                                <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label><?php echo ucwords("Branch"); ?></label>
                                        <select id="search-course" name="course" data-filter="4" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label><?php echo ucwords("Batch"); ?></label>
                                        <select id="search-batch" name="batch" data-filter="5" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>                                
                                    <div class="form-group col-sm-2">
                                        <label> <?php echo ucwords("Semester"); ?></label>
                                        <select id="search-semester" name="semester" data-filter="6" class="form-control">
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <label>&nbsp;</label>
                                        <input id="search-exam-data" type="button" value="Go" class="btn btn-info vd_bg-green"/>
                                    </div>
                                </form>

                                <div id="all-exam-result">
                                    <table class="table table-striped table-responsive" id="exam-data-table">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("Exam Name"); ?></th>
                                                <th><?php echo ucwords("Course"); ?></th>
                                                <th width="14%"><?php echo ucwords("Branch"); ?></th>
                                                <th><?php echo ucwords("Batch"); ?></th>
                                                <th width="10%"><?php echo ucwords("Semester"); ?></th>
                                                <th width="10%"><?php echo ucwords("Date"); ?></th>
                                                <th><?php echo ucwords("Action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            foreach ($exams as $row) {
                                                $counter++;
                                                $cenlist = array();
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row->em_name; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>

                                                    <td><?php echo date('F d, Y', strtotime($row->em_date)); ?></td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_exam/<?php echo $row->em_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?professor/exam/delete/<?php echo $row->em_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        "use strict";
                                        $('#exam-data-table').dataTable({
                                            "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                                                    "<'row'<'col-sm-12'tr>>" +
                                                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                                        });
                                        $('.filter-rows').on('change', function () {
                                            var filter_id = $(this).attr('data-filter');
                                            filter_column(filter_id);
                                        });

                                        function filter_column(filter_id) {
                                            $('#exam-data-tables').DataTable().column(filter_id).search(
                                                    $('#filter' + filter_id).val()
                                                    ).draw();
                                        }
                                    });
                                </script>

                                <div class="panel-body" id="exam-filter-result"></div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->

                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

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

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addexam/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

    <script>
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {

            var form = $('#exam-search');

            $('#search-exam-data').on('click', function () {
                $("#exam-search").validate({
                    rules: {
                        degree: "required",
                        course: "required",
                        batch: "required",
                        semester: "required"
                    },
                    messages: {
                        degree: "Select course",
                        course: "Select branch",
                        batch: "Select batch",
                        semester: "Select semester"
                    }
                });

                if (form.valid() == true)
                {
                    $('#all-exam-result').hide();
                    var degree = $("#search-degree").val();
                    var course = $("#search-course").val();
                    var batch = $("#search-batch").val();
                    var semester = $("#search-semester").val();
                    $.ajax({
                        url: '<?php echo base_url(); ?>index.php?professor/get_exam_filter/' + degree + '/'
                                + course + '/' + batch + '/' + semester,
                        type: 'get',
                        success: function (content) {
                            $("#exam-filter-result").html(content);
                            // $("#dtbl").hide();
                            $('#exam-data-tables').DataTable();
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            //course by degree
            $('#search-degree').on('change', function () {
                var course_id = $('#search-course').val();
                var degree_id = $(this).val();
                //remove all present element
                $('#search-course').find('option').remove().end();
                $('#search-course').append('<option value="">Select</option>');
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?professor/course_list_from_degree/' + degree_id,
                    type: 'get',
                    success: function (content) {
                        var course = jQuery.parseJSON(content);
                        $.each(course, function (key, value) {
                            $('#search-course').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                        })
                    }
                })
                batch_from_degree_and_course(degree_id, course_id);
            });
            //batch from course and degree
            $('#search-course').on('change', function () {
                var degree_id = $('#search-degree').val();
                var course_id = $(this).val();
                batch_from_degree_and_course(degree_id, course_id);
                get_semester_from_branch(course_id);
            })

            //find batch from degree and course
            function batch_from_degree_and_course(degree_id, course_id) {
                //remove all element from batch
                $('#search-batch').find('option').remove().end();
                $('#search-batch').append('<option value="">Select</option>');
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?professor/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
                    type: 'get',
                    success: function (content) {
                        var batch = jQuery.parseJSON(content);
                        console.log(batch);
                        $.each(batch, function (key, value) {
                            $('#search-batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                        })
                    }
                })
            }

            //get semester from brach
            function get_semester_from_branch(branch_id) {
                $('#search-semester').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?professor/get_semesters_of_branch/' + branch_id,
                    type: 'get',
                    success: function (content) {
                        $('#search-semester').append('<option value="">Select</option>');
                        var semester = jQuery.parseJSON(content);
                        $.each(semester, function (key, value) {
                            $('#search-semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                        })
                    }
                })
            }

        })
    </script>
