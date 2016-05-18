
<!DOCTYPE html>
<html>
    <head>
        <title>Class Routine</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url(); ?>assets/kendo/css/examples-offline.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/kendo/css/kendo.common.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/kendo/css/kendo.rtl.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/kendo/css/kendo.default.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/kendo/css/kendo.dataviz.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/kendo/css/kendo.dataviz.default.min.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/kendo/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/kendo/js/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/kendo/js/kendo.all.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/kendo/js/console.js"></script>
        <script>

        </script>


    </head>
    <body>
        <h2>Filter</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Department</td>
                    <td>
                        <select id="department_search" required="" name="department">
                            <option value="">Select</option>
                            <?php foreach ($department as $row) { ?>
                                <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Branch</td>
                    <td>
                        <select id="branch_search" name="branch">
                            <option value="">Select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Batch</td>
                    <td>
                        <select id="batch_search" name="batch">
                            <option value="">Select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                        <select id="semester_search" name="semester">
                            <option value="">Select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Professor</td>
                    <td>
                        <select id="professor_search" name="professor">
                            <option value="">Select</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Search"/></td>
                </tr>
            </table>
        </form>

        <script>
            $(document).ready(function () {
                $('#department_search').val('<?php echo $this->session->userdata('filter_data')['DepartmentID']; ?>');
                branch_from_department('<?php echo $this->session->userdata('filter_data')['DepartmentID']; ?>');
                batch_from_department_and_branch('<?php echo $this->session->userdata('filter_data')['DepartmentID']; ?>', '<?php echo $this->session->userdata('filter_data')['BranchID']; ?>');
                semester_list('<?php echo $this->session->userdata('filter_data')['BranchID']; ?>');
                professor_list('<?php echo $this->session->userdata('filter_data')['DepartmentID']; ?>', '<?php echo $this->session->userdata('filter_data')['BranchID']; ?>');
                //alert(<?php echo $this->session->userdata('filter_data')['BatchID']; ?>);
                setTimeout(function () {
                    $('#batch_search').val('<?php echo $this->session->userdata('filter_data')['BatchID']; ?>');
                    $('#branch_search').val('<?php echo $this->session->userdata('filter_data')['BranchID']; ?>');
                    $('#semester_search').val('<?php echo $this->session->userdata('filter_data')['SemesterID']; ?>');
                    $('#professor_search').val('<?php echo $this->session->userdata('filter_data')['ProfessorID']; ?>');
                }, 500);

                $('#department_search').on('change', function () {
                    branch_from_department($(this).val());
                });

                $('#branch_search').on('change', function () {
                    var department_id = $('#department_search').val();
                    batch_from_department_and_branch(department_id, $(this).val());
                    semester_list($(this).val());
                    professor_list(department_id, $(this).val());
                });

                function branch_from_department(department_id) {
                    $('#branch_search').find('option').remove().end();
                    $('#branch_search').append('<option value="">Select</option>');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/course_list_from_degree/' + department_id,
                        type: 'get',
                        success: function (content) {
                            var branch = jQuery.parseJSON(content);
                            $.each(branch, function (key, value) {
                                $('#branch_search').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                            });
                        }
                    });
                }

                function batch_from_department_and_branch(department_id, branch_id) {
                    $('#batch_search').find('option').remove().end();
                    $('#batch_search').append('<option value="">Select</option>');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/batch_list_from_degree_and_course/' + department_id + '/' + branch_id,
                        type: 'get',
                        success: function (content) {
                            var batch = jQuery.parseJSON(content);
                            $.each(batch, function (key, value) {
                                $('#batch_search').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                            })
                        }
                    });
                }

                function semester_list(branch_id) {
                    $('#semester_search').find('option').remove().end();
                    $('#semester_search').append('<option value="">Select</option>');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/semesters_list_from_branch/' + branch_id,
                        type: 'get',
                        success: function (content) {
                            var semester = jQuery.parseJSON(content);
                            $.each(semester, function (key, value) {
                                $('#semester_search').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                            });
                        }
                    });
                }

                function professor_list(department, branch) {
                    $('#professor_search').find('option').remove().end();
                    $('#professor_search').append('<option value="">Select</option>');
                    $.ajax({
                        url: '<?php echo base_url(); ?>admin/professor_by_department_and_branch/' + department + '/' + branch,
                        type: 'get',
                        success: function (content) {
                            var professor = jQuery.parseJSON(content);
                            $.each(professor, function (key, value) {
                                $('#professor_search').append('<option value=' + value.professor_id + '>' + value.name + '</option>');
                            });
                        }
                    });
                }
            });
        </script>
        <div id="example">
            <div id="example">
                <div id="scheduler"></div>
            </div>
            <script id="event-template" type="text/x-kendo-template">
                <div class="movie-template">
                <p>
                #: kendo.toString(start, "hh:mm") # - #: kendo.toString(end, "hh:mm") #
                </p>
                <h3>#: title #</h3>
                <p>#: description #</p>
                </div>
            </script>
            <script>

                $('#scheduler').on('dblclick', function () {
                    var remove_option = new Array('Monthly', 'Yearly');
                    $('.k-reset li').each(function () {
                        if (remove_option.indexOf($(this).text()) > -1) {
                            $(this).hide();
                        }
                    });
                    var department_id = $('#department').val();
                    var branch_id = $('#branch').val();
                    var batch_id = $('#batch').val();
                    var semester_id = $('#semester').val();
                    var subject_id = $('#subject').val();
                    var professor_id = $('#ownerId').val();
                    console.log(department_id + '-' + branch_id + '-' + batch_id + '-' + semester_id + '-' + subject_id + '-' + professor_id);

                    branch_list_from_department(department_id);
                    batch_from_department_and_branch(department_id, branch_id);
                    semesters_list_from_branch(branch_id);
                    subject_list_from_branch_and_semester(branch_id, semester_id);
                    professor_list(subject_id);
                    // branch list from department
                    $('#department').on('change', function () {
                        var department_id = $(this).val();
                        branch_list_from_department(department_id);
                    });

                    // batch list from branch and department
                    $('#branch').on('change', function () {
                        var department_id = $('#department').val();
                        var branch_id = $(this).val();
                        batch_from_department_and_branch(department_id, branch_id);
                        semesters_list_from_branch(branch_id);
                    });

                    $('#semester').on('change', function () {
                        var branch_id = $('#branch').val();
                        var semester_id = $(this).val();
                        subject_list_from_branch_and_semester(branch_id, semester_id);
                    });

                    $('#subject').on('change', function () {
                        var subject_id = $(this).val();
                        professor_list(subject_id);
                    });

                    function branch_list_from_department(department_id) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/course_list_from_degree/' + department_id,
                            type: 'get',
                            success: function (content) {
                                var branch = jQuery.parseJSON(content);
                                var avail_branch = new Array();
                                $.each(branch, function (key, value) {
                                    avail_branch.push(value.c_name);
                                });
                                $('#branch_listbox li').each(function () {
                                    if (avail_branch.indexOf($(this).text()) > -1) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            }
                        });
                    }

                    function batch_from_department_and_branch(department_id, branch_id) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/batch_list_from_degree_and_course/' + department_id + '/' + branch_id,
                            type: 'get',
                            success: function (content) {
                                var batch_list = jQuery.parseJSON(content);
                                var avail_batch = new Array();
                                $.each(batch_list, function (key, value) {
                                    avail_batch.push(value.b_name);
                                });
                                $('#batch_listbox li').each(function () {
                                    if (avail_batch.indexOf($(this).text()) > -1) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            }
                        });
                    }

                    function semesters_list_from_branch(branch_id) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/semesters_list_from_branch/' + branch_id,
                            type: 'get',
                            success: function (content) {
                                var semester_list = jQuery.parseJSON(content);
                                var avail_semester = new Array();
                                $.each(semester_list, function (key, value) {
                                    avail_semester.push(value.s_name);
                                });
                                $('#semester_listbox li').each(function () {
                                    if (avail_semester.indexOf($(this).text()) > -1) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            }
                        });
                    }

                    function subject_list_from_branch_and_semester(branch_id, semester_id) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/subject_list_from_course_and_semester/' + branch_id + '/' + semester_id,
                            type: 'get',
                            success: function (content) {
                                var subject_list = jQuery.parseJSON(content);
                                var avail_subject = new Array();
                                $.each(subject_list, function (key, value) {
                                    avail_subject.push(value.subject_name);
                                });
                                $('#subject_listbox li').each(function () {
                                    if (avail_subject.indexOf($(this).text()) > -1) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            }
                        });
                    }

                    function professor_list(subject_id) {
                        $.ajax({
                            url: '<?php echo base_url(); ?>admin/class_routine_professor/' + subject_id,
                            type: 'get',
                            success: function (content) {
                                var subject_list = jQuery.parseJSON(content);
                                var avail_subject = new Array();
                                $.each(subject_list, function (key, value) {
                                    avail_subject.push(value.name);
                                });
                                $('#ownerId_listbox li').each(function () {
                                    if (avail_subject.indexOf($(this).text()) > -1) {
                                        $(this).show();
                                    } else {
                                        $(this).hide();
                                    }
                                });
                            }
                        });
                    }
                    $('.k-window-title').html('Class Routine');
                });
            </script>
            <?php
            $department = $this->db->get('degree')->result();
            ?>
            <script id="customEditorTemplate" type="text/x-kendo-template">

                <div class="k-edit-label"><label for="title">Title</label></div>
                <div data-container-for="title" class="k-edit-field">
                <input type="text" class="k-input k-textbox" name="title" required="required" data-bind="value:title">
                </div>

                <div class="k-edit-label"><label for="Department">Department</label></div>
                <div data-container-for="departmentId" class="k-edit-field">
                <select style="width: 70%;" id="department" style="width: 50%" name="department" data-bind="value:department" data-role="dropdownlist"
                data-value-field="value" data-text-field="text" required="required">
                <option value="">Select</option>
                <?php foreach ($department as $dept) { ?>
                    <option data-id="<?php echo $dept->d_id; ?>" value="<?php echo $dept->d_id; ?>"><?php echo $dept->d_name; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="k-edit-label">
                <label for="branch">Branch</label></div>
                <div id="branch_container" data-container-for="branchId" class="k-edit-field">
                <select style="width: 70%;" id="branch" style="width: 50%" name="branch" data-bind="value:branch" data-role="dropdownlist"
                data-value-field="value" data-text-field="text" required="required">
                <option value="">Select</option>  
                <?php
                $course = $this->db->get('course')->result();
                foreach ($course as $row) {
                    ?>
                    <option value="<?php echo $row->course_id; ?>"><?php echo $row->c_name; ?></option>
                <?php } ?>
                </select>                
                </div>

                <div class="k-edit-label">
                <label for="batch">Batch</label></div>
                <div id="batch_container" data-container-for="batchId" class="k-edit-field">
                <select class="batch" style="width: 70%;" id="batch" style="width: 50%" name="batch" data-bind="value:batch" data-role="dropdownlist"
                data-value-field="value" data-text-field="text" required="required">
                <option value="">Select</option>  
                <?php
                $batch = $this->db->get('batch')->result();
                foreach ($batch as $row) {
                    ?>
                    <option value="<?php echo $row->b_id; ?>"><?php echo $row->b_name; ?></option>
                <?php } ?>
                </select>                
                </div>

                <div class="k-edit-label">
                <label for="semeter">Semester</label></div>
                <div id="semester_container" data-container-for="semesterId" class="k-edit-field">
                <select class="batch" style="width: 70%;" id="semester" style="width: 50%" name="semester" data-bind="value:semester" data-role="dropdownlist"
                data-value-field="value" data-text-field="text" required="required">
                <option value="">Select</option>  
                <?php
                $semester = $this->db->get('semester')->result();
                foreach ($semester as $row) {
                    ?>
                    <option value="<?php echo $row->s_id; ?>"><?php echo $row->s_name; ?></option>
                <?php } ?>
                </select>                
                </div>

                <div class="k-edit-label">
                <label for="class">Class</label></div>
                <div id="class_container" data-container-for="classId" class="k-edit-field">
                <select class="class" style="width: 70%;" id="class" style="width: 50%" name="class" data-bind="value:class" data-role="dropdownlist"
                data-value-field="value" data-text-field="text" required="required">
                <option value="">Select</option>
                <?php
                $class = $this->db->get('class')->result();
                foreach ($class as $row) {
                    ?>
                    <option value="<?php echo $row->class_id; ?>"><?php echo $row->class_name; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="k-edit-label">
                <label for="subject">Subject</label></div>
                <div id="subject_container" data-container-for="subjectId" class="k-edit-field">
                <select style="width: 70%;" id="subject" style="width: 50%" name="subject" data-bind="value:subject" data-role="dropdownlist"
                data-value-field="value" data-text-field="text" required="required">
                <option value="">Select</option>
                <?php
                $subject = $this->db->get('subject_manager')->result();
                foreach ($subject as $row) {
                    ?>
                    <option value="<?php echo $row->sm_id; ?>"><?php echo $row->subject_name; ?></option>
                <?php } ?>
                </select>                
                </div>

                <div class="k-edit-label"><label for="ownerId">Professor</label></div>
                <div data-container-for="ownerId" class="k-edit-field">
                <select style="width: 70%;" id="ownerId" data-bind="value:ownerId" data-role="dropdownlist"
                data-value-field="value" data-text-field="text">
                <option value="">Select</option>
                <?php
                $professor = $this->db->get('professor')->result();
                foreach ($professor as $row) {
                    ?>
                    <option value="<?php echo $row->professor_id; ?>"><?php echo $row->name; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="k-edit-label">
                <label for="start">Start</label>
                </div>
                <div data-container-for="start" class="k-edit-field">
                <input type="text"
                data-role="datetimepicker"
                data-interval="15"
                data-type="date"
                data-bind="value:start,invisible:isAllDay"
                name="start"/>
                <input type="text" data-type="date" data-role="datepicker" data-bind="value:start,visible:isAllDay" name="start" />
                <span data-bind="text: startTimezone"></span>
                <span data-for="start" class="k-invalid-msg" style="display: none;"></span>
                </div>
                <div class="k-edit-label"><label for="end">End</label></div>
                <div data-container-for="end" class="k-edit-field">
                <input type="text" data-type="date" data-role="datetimepicker" data-bind="value:end,invisible:isAllDay" name="end" data-datecompare-msg="End date should be greater than or equal to the start date" />
                <input type="text" data-type="date" data-role="datepicker" data-bind="value:end,visible:isAllDay" name="end" data-datecompare-msg="End date should be greater than or equal to the start date" />
                <span data-bind="text: endTimezone"></span>
                <span data-bind="text: startTimezone, invisible: endTimezone"></span>
                <span data-for="end" class="k-invalid-msg" style="display: none;"></span>
                </div>
                <div class="k-edit-label"><label for="isAllDay">All day event</label></div>
                <div data-container-for="isAllDay" class="k-edit-field">
                <input type="checkbox" name="isAllDay" data-type="boolean" data-bind="checked:isAllDay">
                </div>
                <div class="k-edit-label"><label for="recurrenceRule">Repeat</label></div>
                <div data-container-for="recurrenceRule" class="k-edit-field">
                <div data-bind="value:recurrenceRule" name="recurrenceRule" data-role="recurrenceeditor"></div>
                </div>
                <div class="k-edit-label"><label for="description">Description</label></div>
                <div data-container-for="description" class="k-edit-field">
                <textarea name="description" class="k-textbox" data-bind="value:description" placeholder="Description"></textarea>
                </div>                
            </script>
            <script>
                $(function () {
                    var base_url = '<?php echo base_url(); ?>';
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth();
                    var yyyy = today.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd
                    }
                    if (mm < 10) {
                        mm = '0' + mm
                    }
                    $("#scheduler").kendoScheduler({
                        date: today,
                        startTime: new Date(yyyy + '/' + mm + '/' + dd + ' 07:00 AM'),
                        endTime: new Date(yyyy + '/' + mm + '/' + dd + ' 07:00 PM'),
                        height: 600,
                        views: [
                            "day",
                            {type: "workWeek", selected: true},
                            "week",
                            "month",
                            "agenda"
                        ],
                        editable: {
                            template: $("#customEditorTemplate").html(),
                        },
                        eventTemplate: $("#event-template").html(),
                        edit: function (e) {
                            var recurrenceEditor = e.container.find("[data-role=recurrenceeditor]").data("kendoRecurrenceEditor");

                            //set start option value, used to define the week 'Repeat on' selected checkboxes
                            recurrenceEditor.setOptions({
                                start: new Date(e.event.start)
                            });
                        },
                        timezone: "Etc/UTC",
                        dataSource: {
                            batch: true,
                            transport: {
                                read: {
                                    url: base_url + "admin/telerik_read",
                                    dataType: "json"
                                },
                                update: {
                                    url: base_url + "admin/telerik_update",
                                    type: 'post',
                                    dataType: "json",
                                },
                                create: {
                                    url: base_url + "admin/telerik_create",
                                    type: 'post',
                                    dataType: "json"
                                },
                                destroy: {
                                    url: base_url + "admin/telerik_delete",
                                    type: 'post',
                                    dataType: "json"
                                },
                                editable: false,
                                parameterMap: function (options, operation) {
                                    $("#scheduler").data("kendoScheduler").refresh();
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            schema: {
                                model: {
                                    id: "taskId",
                                    fields: {
                                        taskId: {from: "ClassRoutineId", type: "number"},
                                        title: {from: "Title", defaultValue: "", validation: {required: true}},
                                        department: {from: "DepartmentID", defaultValue: '', validation: {required: true}},
                                        branch: {from: "BranchID", defaultValue: '', validation: {required: true}},
                                        batch: {from: "BatchID", defaulevalue: '', validation: {required: true}},
                                        semester: {from: "SemesterID", defaultValue: '', validation: {required: true}},
                                        class: {from: "ClassID", defaultValue: '', validation: {required: true}},
                                        subject: {from: "SubjectID", defaultValue: '', validation: {required: true}},
                                        //professor: {from: "ProfessorID", defaultValue: '', validation: {required: true}},
                                        start: {type: "date", from: "Start"},
                                        end: {type: "date", from: "End"},
                                        startTimezone: {from: "StartTimezone"},
                                        endTimezone: {from: "EndTimezone"},
                                        description: {from: "Description"},
                                        recurrenceId: {from: "RecurrenceID"},
                                        recurrenceRule: {from: "RecurrenceRule"},
                                        recurrenceException: {from: "RecurrenceException"},
                                        ownerId: {from: "ProfessorID", defaultValue: '', validation: {required: true}},
                                        isAllDay: {type: "boolean", from: "IsAllDay"}
                                    }
                                }
                            }
                        },
                        resources: [
                            {
                                field: "ownerId",
                                title: "Owner",
                                dataSource: [
                                    {text: "Alex", value: 1, color: "#f8a398"},
                                    {text: "Bob", value: 2, color: "#51a0ed"},
                                    {text: "Charlie", value: 3, color: "#56ca85"}
                                ]
                            }
                        ]
                    });

                    $("#people :checkbox").change(function (e) {
                        var checked = $.map($("#people :checked"), function (checkbox) {
                            return parseInt($(checkbox).val());
                        });

                        var scheduler = $("#scheduler").data("kendoScheduler");

                        scheduler.dataSource.filter({
                            operator: function (task) {
                                return $.inArray(task.ownerId, checked) >= 0;
                            }
                        });
                    });
                });
            </script>

            <style scoped>

                .k-nav-current > .k-link span + span {
                    max-width: 200px;
                    display: inline-block;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    overflow: hidden;
                    vertical-align: top;
                }

                #team-schedule {
                    background: url('<?php echo base_url(); ?>assets/kendo/scheduler/team-schedule.png') transparent no-repeat;
                    height: 115px;
                    position: relative;
                }

            </style>


    </body>
</html>
