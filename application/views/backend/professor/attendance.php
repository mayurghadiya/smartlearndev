<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?professor/dashboard'); ?>"><?php echo ucwords("home"); ?></a> </li>
                        <li><?php echo ucwords("attendance"); ?></li>
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
                                    <?php echo ucwords("Attendance"); ?>
                                </a></li>

                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">                            
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">   
                                <form id="exam-search" action="#" class="form-groups-bordered validate">
                                    <div class="form-group col-sm-3">
                                        <label><?php echo ucwords("department"); ?></label>
                                        <select class="form-control" id="department" name="department">
                                            <option value="">Select</option>
                                            <?php foreach ($degree as $row) { ?>
                                                <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label><?php echo ucwords("Branch"); ?></label>
                                        <select id="branch" name="branch" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label><?php echo ucwords("Batch"); ?></label>
                                        <select id="batch" name="batch" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>                                
                                    <div class="form-group col-sm-3">
                                        <label> <?php echo ucwords("Semester"); ?></label>
                                        <select id="semester" name="semester" data-filter="6" class="form-control">
                                            <option value="">Select</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label> <?php echo ucwords("class"); ?></label>
                                        <select id="class" name="class" class="form-control">
                                            <option value="">Select</option>
                                            <?php
                                            foreach($class as $row) { ?>
                                            <option value="<?php echo $row->class_id; ?>"><?php echo $row->class_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label> <?php echo ucwords("date"); ?></label>
                                        <input type="date" class="form-control" name="date"/>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <label> <?php echo ucwords("class routine"); ?></label>
                                        <select id="class_routine" name="class_routine" data-filter="6" class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <label>&nbsp;</label>
                                        <input id="search-exam-data" type="button" value="Go" class="btn btn-info vd_bg-green"/>
                                    </div>
                                </form>

                                <div id="all-exam-result">

                                </div>
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

    <script type="text/javascript">
        $(document).ready(function () {
            "use strict";
            $('#exam-data-table').dataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            });

            // branch from department
            $('#department').on('change', function () {
                var department_id = $(this).val();
                branch_from_department(department_id);
            });

            $('#branch').on('change', function () {
                var department_id = $('#department').val();
                var branch_id = $(this).val();
                batch_from_department_and_branch(department_id, branch_id);
                semester_list_from_branch(branch_id);
            });

            function branch_from_department(department_id) {
                $('#branch').find('option').remove().end();
                $('#branch').append('<option value="">Select</option>');
                $.ajax({
                    url: '<?php echo base_url(); ?>professor/course_list_from_degree/' + department_id,
                    type: 'get',
                    success: function (content) {
                        var branch = jQuery.parseJSON(content);
                        $.each(branch, function (key, value) {
                            $('#branch').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                        });
                    }
                });
            }

            function batch_from_department_and_branch(department, branch) {
                $('#batch').find('option').remove().end();
                $('#batch').append('<option value="">Select</option>');
                $.ajax({
                    url: '<?php echo base_url(); ?>professor/batch_list_from_degree_and_course/' + department + '/' + branch,
                    type: 'get',
                    success: function (content) {
                        var batch = jQuery.parseJSON(content);
                        $.each(batch, function (key, value) {
                            $('#batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                        });
                    }
                });
            }

            function semester_list_from_branch(branch_id) {
                $('#semester').find('option').remove().end();
                $('#semester').append('<option value="">Select</option>');
                $.ajax({
                    url: '<?php echo base_url(); ?>professor/get_semesters_of_branch/' + branch_id,
                    type: 'get',
                    success: function (content) {
                        var semester = jQuery.parseJSON(content);
                        $.each(semester, function (key, value) {
                            $('#semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                        });
                    }
                });
            }
        });
    </script>
