<?php
$edit_data = $this->db->get_where('subject_manager', array('sm_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                         <?php echo ucwords("Update Subject");?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                             <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>
                            <?php echo form_open(base_url() . 'index.php?admin/subject/do_update/' . $row['sm_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'frmeditsubject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Subject Name");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="subname" id="subname" value="<?php echo $row['subject_name']; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Subject Code");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="subcode" id="subcode" value="<?php echo $row['subject_code']; ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="course" id="course1">
                                        <option value="">Select branch</option>
                                        <?php
                                        $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                        foreach ($course as $crs) {
                                            if ($crs->course_id == $row['sm_course_id']) {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" selected><?= $crs->c_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $crs->course_id ?>" ><?= $crs->c_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <select name="semester" id="semester1">
                                        <option value="">Select semester</option>
                                            <?php
                                            $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                            foreach ($datasem as $rowsem) {
                                                if ($rowsem->s_id == $row['sm_sem_id']) {
                                                    ?>
                                                <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?= $rowsem->s_id ?>" ><?= $rowsem->s_name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="submit btn btn-info vd_bg-green"><?php echo ucwords("Update");?></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            var form = document.getElementsByTagName("form");
            form.submit();
        }
    });
$("#course1").change(function () {
        var course = $(this).val();
        var degree = $("#degree").val();
        var dataString = "course=" + course;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
            data: dataString,
            success: function (response) {
                $("#semester1").html(response);
            }
        });
    });
    $().ready(function () {
        $("#frmeditsubject").validate({
            rules: {
                subname: "required",
                subcode: "required",
                course: "required",
                 semester: {
                        required:true,
                        remote: {
                                        url: "<?=base_url()?>index.php?admin/checksubject",
                                        type: "post",
                                        data: {
                                            subname: function() {

                                                return $( "#subname" ).val();
                                            },
                                            subcode: function() {

                                                return $( "#subcode" ).val();
                                            },
                                            course: function() {

                                                return $( "#course" ).val();
                                            },
                                            semester: function() {

                                                return $( "#semester" ).val();
                                            },
                                        }
                                    }

                    },
            },
            messages: {
                subname: "Enter subject name",
                subcode: "Enter subject code",
                course: "Select branch",
                semester: {
                        required:"Select semester",
                        remote:"subject already exists in this course and semester",
                    },
            }
        });
    });
</script>
