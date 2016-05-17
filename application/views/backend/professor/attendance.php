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
                                <form id="attendance-routine" action="#" method="post" class="form-groups-bordered validate">
                                    <div class="col-md-12">
                                        <div class="form-group col-sm-3">
                                            <label><?php echo ucwords("department"); ?></label>
                                            <select class="form-control" id="department" name="department" required="">
                                                <option value="">Select</option>
                                                <?php foreach ($degree as $row) { ?>
                                                    <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label><?php echo ucwords("Branch"); ?></label>
                                            <select id="branch" name="branch" class="form-control" required="">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label><?php echo ucwords("Batch"); ?></label>
                                            <select id="batch" name="batch" class="form-control" required="">
                                                <option value="">Select</option>
                                            </select>
                                        </div>    
                                        <div class="form-group col-sm-3">
                                            <label> <?php echo ucwords("Semester"); ?></label>
                                            <select id="semester" name="semester" data-filter="6" class="form-control" required="">
                                                <option value="">Select</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group col-sm-3">
                                            <label> <?php echo ucwords("class"); ?></label>
                                            <select id="class" name="class" class="form-control" required="">
                                                <option value="">Select</option>
                                                <?php foreach ($class as $row) { ?>
                                                    <option value="<?php echo $row->class_id; ?>"><?php echo $row->class_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label> <?php echo ucwords("date"); ?></label>
                                            <input id="date" required="" type="text" class="form-control datepicker-normal" name="date" placeholder="Select"/>
                                        </div>
                                        <div class="form-group col-sm-5">
                                            <label> <?php echo ucwords("class routine"); ?></label>
                                            <select id="class_routine" name="class_routine" class="form-control" required="">
                                                <option value="">Select</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-1">
                                            <label>&nbsp;</label>
                                            <input id="search-exam-data" type="submit" value="Go" class="btn btn-info vd_bg-green"/>
                                        </div>
                                    </div>
                                </form>

                                <div id="student-attendance-list">
                                    <div class="col-md-12">
                                        <?php if (count($student)) { ?>
                                            <?php
                                            $this->load->model('admin/Crud_model');
                                            ?>
                                            <br/>
                                            <form method="post" action="<?php echo base_url(); ?>professor/take_class_routine_attendance"
                                                  class="form-groups-bordered">
                                                <input type="hidden" name="department" value="<?php echo $department; ?>"/>
                                                <input type="hidden" name="branch" value="<?php echo $branch; ?>"/>
                                                <input type="hidden" name="batch" value="<?php echo $batch; ?>"/>
                                                <input type="hidden" name="semester" value="<?php echo $semester; ?>"/>
                                                <input type="hidden" name="class" value="<?php echo $class_name; ?>"/>
                                                <input type="hidden" name="professor" value="<?php echo $professor; ?>"/>
                                                <input type="hidden" name="class_routine" value="<?php echo $class_routine; ?>"/>
                                                <input type="hidden" name="date" value="<?php echo $date; ?>"/>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <div class="panel-title">Student List</div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table table-striped table-responsive" id="attendance-data-table-2">
                                                            <thead>
                                                            <th>SR</th>
                                                            <th>Roll No</th>
                                                            <th>Student Name</th>
                                                            <th>Action</th>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $counter = 1;
                                                                $date = date('Y-m-d', strtotime($date));
                                                                foreach ($student as $row) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $counter++; ?></td>
                                                                        <td><?php echo $row->std_roll; ?></td>
                                                                        <td><?php echo $row->std_first_name . ' ' . $row->std_last_name; ?></td>
                                                                        <?php
                                                                        $status = $this->Crud_model->check_attendance_status($department, $branch, $batch, $semester, $class_name, $class_routine, $date, $row->std_id);
                                                                        ?>
                                                                        <td>
                                                                            <?php if (isset($status)) { ?>
                                                                                <input type="checkbox" name="student_<?php echo $row->std_id; ?>" 
                                                                                       <?php if ($status->is_present == 1) echo 'checked=""'; ?>/>
                                                                                   <?php } else { ?>
                                                                                <input type="checkbox" name="student_<?php echo $row->std_id; ?>" checked=""/>
                                                                            <?php }
                                                                            ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-1">
                                                    <label>&nbsp;</label>
                                                    <input type="submit" value="Submit" class="btn btn-info vd_bg-green"/>
                                                </div>
                                            </form>

                                        <?php }
                                        ?>
                                    </div>
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

    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });
        $(document).ready(function () {
            "use strict";
            $('#attendance-data-table').dataTable({
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
            });
            $("#attendance-routine").validate({
                rules: {
                    //'department': "required",
                },
                messages: {
                    //'department': "Select department"
                }
            });
            $(".datepicker-normal").datepicker({
                dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                maxDate: 0
            });
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


            $('#date').on('change', function () {
                var class_date = $(this).val();
                var department_id = $('#department').val();
                var branch_id = $('#branch').val();
                var batch_id = $('#batch').val();
                var semester_id = $('#semester').val();
                var class_id = $('#semester').val();
                var professor_id = '<?php echo $this->session->userdata('login_user_id'); ?>';

                $.ajax({
                    url: '<?php echo base_url(); ?>professor/check_class_routine',
                    type: 'POST',
                    data: {
                        'class_date': class_date,
                        'professor_id': professor_id,
                        'department_id': department_id,
                        'branch_id': branch_id,
                        'semester_id': semester_id,
                        'class_id': class_id,
                        'professor_id': professor_id,
                        'batch_id': batch_id
                    },
                    success: function (content) {
                        $('#class_routine').html(content);
                    }
                });

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