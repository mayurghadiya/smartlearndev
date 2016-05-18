
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
                            {type: "week", selected: true},
                            "month",
                            "agenda"
                        ],
                        editable: false,
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
                                    url: base_url + "professor/class_routine_data",
                                    dataType: "json"
                                },
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

                });
            </script>



    </body>
</html>
