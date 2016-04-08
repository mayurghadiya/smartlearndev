<?php
$edit_data = $this->db->get_where('student', array('std_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        Edit Student
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                             <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>
                            <form name="frmstudentedit" id="frmstudentedit" method="post" action="<?=base_url()?>index.php?admin/student/do_update/<?php echo $row['std_id']?>" enctype="multipart/form-data" class="form-horizontal form-groups-bordered validate"> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Name<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>"  />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Name<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="f_name" id="f_name" value="<?php echo $row['std_first_name']; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="l_name" id="l_name" value="<?php echo $row['std_last_name'] ?>"/>
                                    </div>
                                </div>												
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email Id<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="email_id" id="email_id" value="<?php echo $row['email'] ?>"/>
                                    </div>
                                </div>
                                 <div class="form-group">
                                            <label class="col-sm-3 control-label">Password<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" name="password" id="password"  value="<?php echo $row['real_pass'] ?>" />
                                            </div>
                                        </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gender<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <?php
                                        $male = "";
                                        $female = "";
                                        if ($row['std_gender'] == 'Male') {
                                            $male = 'checked';
                                        } else {
                                            $female = 'checked';
                                        }
                                        ?>
                                        <input type="radio" name="gen" value="male" <?php echo $male; ?> >Male
                                        <input type="radio" name="gen" value="female" <?php echo $female; ?>>Female
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" name="address" id="address"><?php echo $row['address'] ?></textarea>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">City<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city'] ?>"/>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Zip<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="zip" id="zip" value="<?php echo $row['zip'] ?>"/>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Birth Date<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="birthdate1" id="birthdate1" value="<?php echo $row['std_birthdate'] ?>" />
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Marital Status</label>
                                    <div class="col-sm-5">
                                        <?php
                                        $single = "";
                                        $married = "";
                                        $separated = "";
                                        $widowed = "";
                                        if ($row['std_marital'] == 'Single') {
                                            $single = "selected";
                                        } elseif ($row['std_marital'] == 'Married') {
                                            $married = "selected";
                                        } elseif ($row['std_marital'] == 'Separated') {
                                            $separated = "selected";
                                        } elseif ($row['std_marital'] == 'Widowed') {
                                            $widowed = "selected";
                                        }
                                        ?>
                                        <select name="maritalstatus" id="maritalstatus">
                                            <option value="">Select marital status</option>
                                            <option value="single" <?= $single; ?>>Single</option>
                                            <option value="married" <?= $married; ?>>Married</option>
                                            <option value="separated" <?= $separated; ?>>Separated</option>
                                            <option value="widowed" <?= $widowed; ?>>Widowed</option>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group">
                                            <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree2">
                                                    <option value="">Select course</option>
                                                    <?php
                                                    $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                                    foreach ($degree as $dgr) {
                                                        ?>
                                                    <option value="<?= $dgr->d_id ?>" <?php if($row['std_degree']==$dgr->d_id){  echo "selected=selected"; } ?>><?= $dgr->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Branch<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <select name="course" id="course2">
                                            <option value="">Select branch</option>
                                            <?php
                                            $datacourse = $this->db->get_where('course', array('course_status' => 1))->result();
                                            foreach ($datacourse as $rowcourse) {
                                                if ($rowcourse->course_id == $row['course_id']) {
                                                    ?>
                                                    <option value="<?= $rowcourse->course_id ?>" selected><?= $rowcourse->c_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?= $rowcourse->course_id ?>"><?= $rowcourse->c_name ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <select name="batch" id="batch2">
                                            <option value="">Select batch</option>
                                            <?php
                                            $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                            foreach ($databatch as $row1) {
                                                if ($row1->b_id == $row['std_batch']) {
                                                    ?>
                                                    <option value="<?= $row1->b_id ?>" selected><?= $row1->b_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?= $row1->b_id ?>"><?= $row1->b_name ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <select name="semester" id="semester1">
                                            <option value="">Select semester</option>
                                            <?php
                                            $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                            foreach ($datasem as $rowsem) {
                                                if ($rowsem->s_id == $row['semester_id']) {
                                                    ?>
                                                    <option value="<?= $rowsem->s_id ?>" selected><?= $rowsem->s_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mobile No<span style="color:red">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="mobileno" id="mobileno"  value="<?php echo $row['std_mobile'] ?>"/>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Facebook URL</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $row['std_fb'] ?>"/>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Twitter URL</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $row['std_twitter'] ?>"/>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Group </label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly value="<?php echo $row['group_id'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">User Type</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly value="<?php echo $row['user_type'] ?>" />
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Admission Type<span style="color:red">*</span></label>
                                    <div class="col-sm-5">

                                        <select name="admissiontype" id="admissiontype">
                                            <option value="">Select admission type</option>

                                            <?php
                                            $admissiontype = $this->db->get_where('admission_type', array('at_status' => 1))->result();
                                            foreach ($admissiontype as $rowtype) {
                                                if ($rowtype->at_id == $row['admission_type_id']) {
                                                    ?>
                                                    <option value="<?= $rowtype->at_id ?>" selected><?= $rowtype->at_name ?></option>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <option value="<?= $rowtype->at_id ?>"><?= $rowtype->at_name ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">File Upload</label>
                                    <div class="col-sm-5">
                                        <input type="hidden" name="txtoldfile" id="txtoldfile" value="<?php echo $row['profile_photo']; ?>" />
                                        <input type="file" class="form-control" name="profilefile" id="profilefile" />

                                        <img src="<?= base_url() ?>/uploads/student_image/<?= $row['profile_photo']; ?>" height="100px" width="100px" id="blah"  />

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" name="std_about" id="std_about" ><?php echo $row['std_about'] ?></textarea>
                                    </div>
                                </div>	
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <button type="submit" class="submit btn btn-info">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div> </div> </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>
<script type="text/javascript">
    
      $("#degree2").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/student'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course2").html(response);
                    }
                });
        });
        
         $("#course2").change(function(){
                var course = $(this).val();
                 var degree = $("#degree2").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/student'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch2").html(response);
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                                data: dataString,
                                success: function (response1) {
                                    $("#semester1").html(response1);
                                }
                            });
                    }
                });
        });

    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {

        $("#birthdate1").datepicker({
            maxDate: 0
        });


        $("#frmstudentedit").validate({
            rules: {
                name: {
                    required: true,
                   
                },
                f_name:
                        {
				required: true,
                            character: true, 
                        },
                l_name:
                        {
required: true,
                            character: true,
                        },
                email_id:
                        {
                            required: true,
                            email: true,
                        },
                password: "required",
                gen: "required",
                birthdate1: "required",
                address: "required",
                mobileno:
                        {
                            required: true,
                            maxlength: 11,
                            mobile_no: true,
                            minlength: 10,
                        },
                city:
                        {
                            required: true,
                            character: true,
                        },
                zip:
                        {
                            required: true,
                            zip_code: true,
                        },
                        address:"required",
                        degree:"required",
                        course:"required",
                        batch:"required",
                        semester:"required",
                        facebook:
                            {
                                url2: true,
                            },
                         twitter:
                            {
                                url2: true,
                            },
                profilefile:
                        {
                            extension: 'gif|jpg|png|jpeg',
                        },
                admissiontype: "required",
            },
            messages: {
                name: {
                    required: "Enter name",
                },
                f_name:
                        {
                            required: "Enter first name",
                            character: "Enter valid name",
                        },
                l_name:
                        {
                            required: "Enter last name",
                            character: "Enter valid name",
                        },
                email_id: {
                    required: "Enter email id",
                },
                password: "Enter password",
                gen: "Slect gender",
                birthdate1: "Select birthdate",
                address: "Enter address",
                mobileno:
                        {
                            required: "Enter mobile no",
                            maxlength: "Enter maximum 10 digit number",
                            mobile_no: "Enter valid mobile number",
                            minlength: "Enter minimum 10 digit number",
                        },
                city:
                        {
                            required: "Enter city",
                            character: "Enter valid city name",
                        },
                zip:
                        {
                            required: "Enter zip code",
                        },
                        degree:"Select degree",
                        course:"Select course",
                        batch:"Select batch",
                        semester:"Select semester",
                         
                profilefile:
                        {
                            extension: 'Upload valid file',
                        },
                admissiontype: "Select admission type",
            }
        });
    });
</script>
