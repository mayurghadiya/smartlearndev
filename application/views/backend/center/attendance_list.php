<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1>Attendance List</h1>            
                        </div>
                    </div>
                    <div class="vd_content-section clearfix">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel widget light-widget">
                                    <?php echo form_open(base_url() . 'index.php?center_user/attendance/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmattendance', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Exam</label>
                                            <div class="col-sm-5">
                                                <select name="exam" id="exam">
                                                    <option value="">Select exam</option>
                                                    <?php
                                                    foreach ($exam_list as $row) {
                                                        ?>
                                                        <option value="<?= $row->em_id ?>"><?= $row->em_name . '&nbsp[' . $row->em_date . ']' ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Timetable</label>
                                            <div class="col-sm-5">
                                                <select name="timetable" id="timetable">

                                                </select>
                                            </div>
                                        </div>	
                                        <div class="col-sm-">
                                            <div class="panel-body table-responsive">
                                                <div class="panel">				
                                                    <div id="stdlist">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    </form>  
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {

        $("#exam").change(function () {
            var examid = $(this).val();
            if (examid != '')
            {
                var dataString = "examid=" + examid;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php?center_user/get_timetable'; ?>",
                    data: dataString,
                    success: function (response) {
                        $("#timetable").html(response);
                    }
                });
            }
        });
        $("#timetable").change(function () {
            var examid = $("#exam").val();
            var exam_timetableid = $(this).val();

            if (exam_timetableid != '')
            {
                var dataString = "examid=" + examid;
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php?center_user/get_attendance'; ?>",
                    data: {
                        examid: examid,
                        timetabeleid: exam_timetableid,
                    },
                    success: function (response) {
                        $("#stdlist").html(response);
                    }
                });
            }
        });
    });
</script>
