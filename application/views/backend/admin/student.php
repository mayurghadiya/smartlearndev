<!-- Middle Content Start -->    


<div class="vd_content-wrapper">

    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Student Managment</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Student Management</h1>


                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Student List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Student
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
                                                <th><div>Name</div></th>												
                                                <th><div></div></th>												
                                                <th><div>Full Name</div></th>												
                                                <th><div>Email</div></th>												
                                                <th><div>Mobile No</div></th>												
                                                <th><div>Operation</div></th>												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($student as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>											
                                                    <td><?php echo $row->name; ?></td>											
                                                    <td><img src="<?= base_url() ?>/uploads/student_image/<?= $row->profile_photo; ?>" height="100px" width="100px"/></td>											
                                                    <td><?php echo $row->std_first_name . " " . $row->std_last_name; ?></td>					
                                                    <td><?php echo $row->email; ?></td>											
                                                    <td><?php echo $row->std_mobile; ?></td>											
                                                    <td class="menu-action">	
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_student/<?php echo $row->std_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/student/delete/<?php echo $row->std_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>											
                                                </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">                	
                                    <?php echo form_open(base_url() . 'index.php?admin/student/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmstudent', 'target' => '_top', "enctype" => "multipart/form-data")); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="name" id="name" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">First Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="f_name" id="f_name" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Last Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="l_name" id="l_name" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email Id<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email_id" id="email_id" onblur="return checkemail(this.value);"  />
                                                <span id="emailerror" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" name="password" id="password" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="radio" name="gen" value="male" >Male
                                                <input type="radio" name="gen" value="female" >Female
                                            </div>
                                            <div class="col-sm-5">
                                            <label for="gen" class="error"></label></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="address" id="address" ></textarea>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">City<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="city" id="city" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Zip<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="zip" id="zip" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Birth Date<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="birthdate" id="birthdate" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Marital Status</label>
                                            <div class="col-sm-5">
                                                <select name="maritalstatus" id="maritalstatus">
                                                    <option value="">Select marital status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="separated">Separated</option>
                                                    <option value="widowed">Widowed</option>

<!-- Middle Content Start -->    
                                                <select name="degree" id="degree">
                                                    <option value="">Select Degree</option>
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
                                            <label class="col-sm-3 control-label">Course</label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select course</option>
                                                    <?php
                                                    $datacourse = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($datacourse as $rowcourse) {
                                                        ?>
                                                        <option value="<?= $rowcourse->course_id ?>"><?= $rowcourse->c_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch">
                                                    <option value="">Select batch</option>
                                                    <?php
                                                    $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select semester</option>
                                                    <?php
                                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                    foreach ($datasem as $rowsem) {
                                                        ?>
                                                        <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mobile No<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="mobileno" id="mobileno" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Facebook URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="facebook" id="facebook" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Twitter URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="twitter" id="twitter" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Group </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">User Type</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly />
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
                                                        ?>
                                                        <option value="<?= $rowtype->at_id ?>"><?= $rowtype->at_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Profile Photo<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="profilefile" id="profilefile" onchange="return filecheck(this.value);" />
                                                <span id="imgerror" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="std_about" id="std_about" ></textarea>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Student</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
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
                                                            }
                                                        });
                                                    });


                                                    $.validator.setDefaults({
                                                        submitHandler: function (form) {

                                                            //  filecheck(img);
                                                            form.submit();

                                                        }
                                                    });

                                                    $().ready(function () {
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
                                                            return this.optional(element) || /^[0-9]{6}$/.test(value);
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
=======
                                                <select name="course" id="course">
                                                    <option value="">Select course</option>
                                                    <?php
                                                    $datacourse = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($datacourse as $rowcourse) {
                                                        ?>
                                                        <option value="<?= $rowcourse->course_id ?>"><?= $rowcourse->c_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch">
                                                    <option value="">Select batch</option>
                                                    <?php
                                                    $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select semester</option>
                                                    <?php
                                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                    foreach ($datasem as $rowsem) {
                                                        ?>
                                                        <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mobile No<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="mobileno" id="mobileno" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Facebook URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="facebook" id="facebook" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Twitter URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="twitter" id="twitter" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Group </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">User Type</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly />
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
                                                        ?>
                                                        <option value="<?= $rowtype->at_id ?>"><?= $rowtype->at_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Profile Photo<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="profilefile" id="profilefile" onchange="return filecheck(this.value);" />
                                                <span id="imgerror" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="std_about" id="std_about" ></textarea>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Student</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
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
                                                            }
                                                        });
                                                    });


                                                    $.validator.setDefaults({
                                                        submitHandler: function (form) {

                                                            //  filecheck(img);
                                                            form.submit();

                                                        }
                                                    });

                                                    $().ready(function () {
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
                                                            return this.optional(element) || /^[0-9]{6}$/.test(value);
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
>>>>>>> origin/master
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Student Managment</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Student Management</h1>


                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Student List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Student
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
                                                <th><div>Name</div></th>												
                                                <th><div></div></th>												
                                                <th><div>Full Name</div></th>												
                                                <th><div>Email</div></th>												
                                                <th><div>Mobile No</div></th>												
                                                <th><div>Operation</div></th>												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 1;
                                            foreach ($student as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>											
                                                    <td><?php echo $row->name; ?></td>											
                                                    <td><img src="<?= base_url() ?>/uploads/student_image/<?= $row->profile_photo; ?>" height="100px" width="100px"/></td>											
                                                    <td><?php echo $row->std_first_name . " " . $row->std_last_name; ?></td>					
                                                    <td><?php echo $row->email; ?></td>											
                                                    <td><?php echo $row->std_mobile; ?></td>											
                                                    <td class="menu-action">	
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_student/<?php echo $row->std_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/student/delete/<?php echo $row->std_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>											
                                                </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">                	
                                    <?php echo form_open(base_url() . 'index.php?admin/student/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmstudent', 'target' => '_top', "enctype" => "multipart/form-data")); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="name" id="name" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">First Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="f_name" id="f_name" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Last Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="l_name" id="l_name" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email Id<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="email_id" id="email_id" onblur="return checkemail(this.value);"  />
                                                <span id="emailerror" style="color: red"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Password<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" name="password" id="password" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Gender<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="radio" name="gen" value="male" >Male
                                                <input type="radio" name="gen" value="female" >Female
                                            </div>
                                            <div class="col-sm-5">
                                            <label for="gen" class="error"></label></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Address<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="address" id="address" ></textarea>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">City<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="city" id="city" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Zip<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="zip" id="zip" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Birth Date<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="birthdate" id="birthdate" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Marital Status</label>
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
                                            <label class="col-sm-3 control-label">Degree<span style="color:red">*</span></label>
=======
=======
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select Degree</option>
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
                                            <label class="col-sm-3 control-label">Course<span style="color:red">*</span></label>
=======
=======
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select course</option>
                                                    <?php
                                                    $datacourse = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($datacourse as $rowcourse) {
                                                        ?>
                                                        <option value="<?= $rowcourse->course_id ?>"><?= $rowcourse->c_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Batch<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch">
                                                    <option value="">Select batch</option>
                                                    <?php
                                                    $databatch = $this->db->get_where('batch', array('b_status' => 1))->result();
                                                    foreach ($databatch as $row) {
                                                        ?>
                                                        <option value="<?= $row->b_id ?>"><?= $row->b_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Semester<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select semester</option>
                                                    <?php
                                                    $datasem = $this->db->get_where('semester', array('s_status' => 1))->result();
                                                    foreach ($datasem as $rowsem) {
                                                        ?>
                                                        <option value="<?= $rowsem->s_id ?>"><?= $rowsem->s_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Mobile No<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="mobileno" id="mobileno" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Facebook URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="facebook" id="facebook" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Twitter URL</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="twitter" id="twitter" />
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Group </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="group" id="group" placeholder="readonly" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">User Type</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="usertype" id="usertype" placeholder="readonly" readonly />
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
                                                        ?>
                                                        <option value="<?= $rowtype->at_id ?>"><?= $rowtype->at_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Profile Photo<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="profilefile" id="profilefile" onchange="return filecheck(this.value);" />
                                                <span id="imgerror" style="color:red;"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="std_about" id="std_about" ></textarea>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Student</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
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
                                                    $("#degree").change(function () {
                                                        var degree = $(this).val();
                                                        var dataString = "degree=" + degree;
                                                        $.ajax({
                                                            type: "POST",
                                                            url: "<?php echo base_url() . 'index.php?admin/get_cource/student'; ?>",
                                                            data: dataString,
                                                            success: function (response) {
                                                                $("#course").html(response);
=======
                                                                    required: "Please enter email id",
                                                                    email_id: "Please enter valid email id",
                                                                    remote: "Email id already exists",
                                                                },
                                                                password: "Please enter password",
                                                                gen: "Please slect gender",
                                                                birthdate: "Please select birthdate",
                                                                mobileno:
                                                                        {
                                                                            required: "Please enter mobile no",
                                                                            maxlength: "Please enter maximum 10 digit number",
                                                                            mobile_no: "Please enter valid mobile number",
                                                                            minlength: "Please enter minimum 10 digit number",
                                                                        },
                                                                city:
                                                                        {
                                                                            required: "Please enter city",
                                                                            character: "Please enter valid city name",
                                                                        },
                                                                zip:
                                                                        {
                                                                            required: "Please enter zip code",
                                                                        },
                                                                admissiontype: "Plese select admission type",
                                                                profilefile: {
                                                                    required: "Plese upload image",
                                                                    extension: "Invalid File",
                                                                }


<<<<<<< HEAD
=======

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Course</label>
>>>>>>> origin/master

<<<<<<< HEAD
                                                                    required: "Please enter email id",
                                                                    email_id: "Please enter valid email id",
                                                                    remote: "Email id already exists",

=======
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
                                                            }
                                                        });
                                                    });


                                                    $.validator.setDefaults({
                                                        submitHandler: function (form) {

                                                            //  filecheck(img);
                                                            form.submit();

                                                        }
                                                    });

                                                    $().ready(function () {
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
                                                            return this.optional(element) || /^[0-9]{6}$/.test(value);
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
                                                                    remote:"Email id already exists",
                                                                    
                                                                    
>>>>>>> origin/master
