  <?php 
   $degree = $this->db->get('degree')->result_array();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Student");?>
                    </div>
                </div>
                <div class="panel-body"> 
                    <div class="box-content">
                    <div class="">
                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                    </div >                                    
                    <?php echo form_open(base_url() . 'index.php?admin/student/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmstudent', 'target' => '_top', "enctype" => "multipart/form-data")); ?>
                    <div class="padded">

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("First Name");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="f_name" id="f_name" />
                            </div>
                        </div>												
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Last Name");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="l_name" id="l_name" />
                            </div>
                        </div>												
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Email Id");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email_id" id="email_id"  />
                                <span id="emailerror" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Password");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" id="password" readonly value="1234"/>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Gender");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="radio" name="gen" value="male" >Male
                                <input type="radio" name="gen" value="female" >Female
                            </div>
                            <div class="col-sm-5">
                                <label for="gen" class="error"></label></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Parent Name");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parentname" id="parentname"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Parent Contact No");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parentcontact" id="parentcontact"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Parent Email Id");?><span style="color:red"></span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="parent_email_id" id="parent_email_id"  />
                                <span id="emailerror" style="color: red"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Address");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="address" id="address" ></textarea>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("City");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="city" id="city" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Zip");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="zip" id="zip" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Birth Date");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="birthdate" id="birthdate" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Marital Status");?></label>
                            <div class="col-sm-5">
                                <select name="maritalstatus" id="maritalstatus">
                                    <option value="">Select marital status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="separated">Separated</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="degree" id="degree">
                                    <option value="">Select department</option>
                                    <?php
                                    $degree = $this->db->get_where('degree', array('d_status' => 1))->result();
                                    foreach ($degree as $dgr) {
                                        ?>
                                        <option value="<?= $dgr->d_id ?>"><?= $dgr->d_name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="course" id="course">
                                    <option value="">Select Branch</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="batch" id="batch">
                                    <option value="">Select Batch</option>
                                </select>
                            </div>
                        </div>	

                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="semester" id="semester">
                                    <option value="">Select semester</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("class");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="class" id="class">
                                    <option value="">Select class</option>
                                    <?php 
                                    $class=$this->db->get('class')->result_array();
                                    
                                    foreach($class as $c)
                                    {
                                    ?>
                                    <option value="<?php echo $c['class_id']?>"><?php echo $c['class_name']?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Mobile No");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="mobileno" id="mobileno" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Facebook URL");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="facebook" id="facebook" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Twitter URL");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="twitter" id="twitter" />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Group");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("User Type");?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly />
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Admission Type");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select name="admissiontype" id="admissiontype">
                                    <option value="">Select admission type</option>
                                    <?php
                                    $admissiontype = $this->db->get_where('admission_type', array('at_status' => 1))->result();
                                    foreach ($admissiontype as $rowtype) {
                                        ?>
                                        <option value="<?= $rowtype->at_id ?>"><?= $rowtype->at_name ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Profile Photo");?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" name="profilefile" id="profilefile" onchange="return filecheck(this.value);" />
                                <span id="imgerror" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("Description");?></label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="std_about" id="std_about" ></textarea>
                            </div>
                        </div>	
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
                            </div>
                        </div>
                        </form>               
                    </div>                
                            </div>

                      </div>
            </div>
        </div>
</div>
    <script type="text/javascript">
         $("#degree").change(function () {
        var degree = $(this).val();
        var dataString = "degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_cource/student'; ?>",
            data: dataString,
            success: function (response) {
                $("#course").html(response);
            }
        });
    });
      $("#course").change(function () {
        var course = $(this).val();
        var degree = $("#degree").val();
        var dataString = "course=" + course + "&degree=" + degree;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_batchs/student'; ?>",
            data: dataString,
            success: function (response) {
                $("#batch").html(response);

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
                    data: dataString,
                    success: function (response1) {
                        $("#semester").html(response1);
                    }
                });
            }
        });
    });
    
    $.validator.setDefaults({
        submitHandler: function (form) {

            //  filecheck(img);
            form.submit();

        }
    });
     $(document).ready(function () {
      $("#birthdate").datepicker({
            maxDate: 0
        });

        jQuery.validator.addMethod("mobile_no", function (value, element) {
            return this.optional(element) || /^[0-9-+]+$/.test(value);
        }, 'Please enter a valid contact no.');
        jQuery.validator.addMethod("email_id", function (value, element) {
            return this.optional(element) || /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test(value);
        }, 'Please enter a valid email address.');

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z ]+$/.test(value);
        }, 'Please enter a valid character.');

        jQuery.validator.addMethod("zip_code", function (value, element) {
            return this.optional(element) || /^[0-9]+$/.test(value);
        }, 'Please enter a valid zip code.');

        $("#frmstudent").validate({
            rules: {
                name:
                        {
                            required: true,
                            character: true,
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
                            email_id: true,
                            remote: {
                                url: "<?= base_url() ?>index.php?admin/getstudentemail",
                                type: "post",
                                data: {
                                    eid: function () {
                                        return $("#email_id").val();
                                    }
                                }
                            }
                        },
                password: "required",
                gen: "required",
                birthdate: "required",
                mobileno:
                        {
                            required: true,
                            maxlength: 11,
                            mobile_no: true,
                            minlength: 10,
                        },
                parentname: {
                            required: true,
                            character: true,
                        },
                parentcontact: {
                            required: true,
                            maxlength: 11,
                            mobile_no: true,
                            minlength: 10,
                        },
                parent_email_id: {
                           
                            email_id: true,
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
                address: "required",
                degree: "required",
                course: "required",
                batch: "required",
                semester: "required",
                class: "required",
                facebook:
                        {
                            url2: true,
                        },
                twitter:
                        {
                            url2: true,
                        },
                admissiontype: "required",
                profilefile: {
                    required: true,
                    extension: 'gif|png|jpg|jpeg',
                }
            },
            messages: {
                name:
                        {
                            required: "Enter name",
                            character: "Enter valid name",
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
                    email_id: "Enter valid email id",
                    remote: "Email id already exists",
                },
                password: "Enter password",
                gen: "Slect gender",
                birthdate: "Select birthdate",
                mobileno:
                        {
                            required: "Enter mobile no",
                            maxlength: "Enter maximum 10 digit number",
                            mobile_no: "Enter valid mobile number",
                            minlength: "Enter minimum 10 digit number",
                        },
                         parentname: {
                            required: "Enter parent name",
                            character: "Enter valid name",
                        },
                parentcontact: {
                           required: "Enter mobile no",
                            maxlength: "Enter maximum 10 digit number",
                            mobile_no: "Enter valid mobile number",
                            minlength: "Enter minimum 10 digit number",
                        },
                parent_email_id: {
                          
                    email_id: "Enter valid email id",
                            },
                city:
                        {
                            required: "Enter city",
                            character: "Enter valid city name",
                        },
                address: "Enter address",
                zip:
                        {
                            required: "Enter zip code",
                        },
                degree: "Select course",
                course: "Select branch",
                batch: "Select batch",
                semester: "Select semester",
                class: "Select class",
                admissiontype: "Select admission type",
                profilefile: {
                    required: "Upload image",
                    extension: "Upload valid file",
                }
            }
        });
        });
    </script>
