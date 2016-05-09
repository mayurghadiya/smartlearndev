<script language="javascript" type="text/javascript">
     
        $(document).ready(function($){
	images = new Array();
	$(document).on('change','.coverimage',function(){
		 files = this.files;
		 $.each( files, function(){
			 file = $(this)[0];
			 if (!!file.type.match(/image.*/)) {
	        	 var reader = new FileReader();
	             reader.readAsDataURL(file);
	             reader.onloadend = function(e) {
	            	img_src = e.target.result; 
	            	html = "<img class='img-thumbnail' style='width:300px;margin:20px;' src='"+img_src+"'>";
	            	$('#image_container').html( html );
	             };
        	 } 
		});
	});
});
    </script> 
<?php 

   $degree = $this->db->get('degree')->result();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Toppers Graduate");?>
                    </div>
                </div>
                <div class="panel-body"> 
                    
                    <div class="box-content">     
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                    </div>                                    
                                    <?php echo form_open(base_url() . 'index.php?admin/graduate/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'graduatesform', 'enctype' => 'multipart/form-data', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" id="degree" name="degree">
                                                    <option value="">Select</option>
                                                    <?php foreach ($degree as $row) { ?>
                                                        <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="course" id="course">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Batch"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="batch" id="batch">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="semester" id="semester">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Student"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="student" id="student">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"> Student Image <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input id="main_img" class="form-control coverimage" type="file" name="main_img"  />
                                            </div>
                                            <div id="image_container"></div>
                                        </div>      
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("graduation year"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" name="year" id="year" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("description"); ?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                                
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green" ><?php echo ucwords("add"); ?></button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                  </div>
              </div>
      </div>
               </div> <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });


        $().ready(function () {

            $("#graduatesform").validate({
                rules: {
                    degree: "required",
                    course: "required",
                    batch: "required",
                    semester: "required",
                    student: "required",
                     main_img:{ 
                        required:true,
                        extension:"gif|jpg|png|jpeg"
                    },
                    year: "required"
                   
                },
                messages: {
                    degree: "Please select course",
                    course: "Please select branch",
                    batch: "Please select batch",
                    semester: "Please select semester",
                    student: "Please select student",                    
                    main_img:{ 
                        required:"Please upload slide image",
                        extension:"Only gif,jpg,png file is allowed!"
                    },
                    year: "Please enter year"
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            //course by degree
            $('#degree').on('change', function () {
                var course_id = $('#course').val();
                var degree_id = $(this).val();
                //remove all present element
                $('#course').find('option').remove().end();
                $('#course').append('<option value="">Select</option>');
                var degree_id = $(this).val();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/course_list_from_degree/' + degree_id,
                    type: 'get',
                    success: function (content) {
                        var course = jQuery.parseJSON(content);
                        $.each(course, function (key, value) {
                            $('#course').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                        })
                    }
                })
                batch_from_degree_and_course(degree_id, course_id);
            });
            //batch from course and degree
            $('#course').on('change', function () {
                var degree_id = $('#degree').val();
                var course_id = $(this).val();
                batch_from_degree_and_course(degree_id, course_id);
                get_semester_from_branch(course_id);
            });

            $('#semester').on('change', function () {
                var degree = $('#degree').val();
                var course = $('#course').val();
                var batch = $('#batch').val();
                var semester = $('#semester').val();
                student_list_from_degree_course_batch_semester(degree, course, batch, semester);
            });

            //find batch from degree and course
            function batch_from_degree_and_course(degree_id, course_id) {
                //remove all element from batch
                $('#batch').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/batch_list_from_degree_and_course/' + degree_id + '/' + course_id,
                    type: 'get',
                    success: function (content) {
                        $('#batch').append('<option value="">Select</option>');
                        var batch = jQuery.parseJSON(content);
                        console.log(batch);
                        $.each(batch, function (key, value) {
                            $('#batch').append('<option value=' + value.b_id + '>' + value.b_name + '</option>');
                        })
                    }
                })
            }

            //get semester from brach
            function get_semester_from_branch(branch_id) {
                $('#semester').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/get_semesters_of_branch/' + branch_id,
                    type: 'get',
                    success: function (content) {
                        $('#semester').append('<option value="">Select</option>');
                        var semester = jQuery.parseJSON(content);
                        $.each(semester, function (key, value) {
                            $('#semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                        })
                    }
                })
            }

            //student list from degree, course, batch and semester
            function student_list_from_degree_course_batch_semester(degree, courese, batch, semester) {
                $('#student').find('option').remove().end();
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?admin/student_list_from_degree_course_batch_semester/' + degree + '/'
                            + courese + '/' + batch + '/' + semester,
                    type: 'get',
                    success: function (content) {
                        $('#student').append('<option value="">Select</option>');
                        var student = jQuery.parseJSON(content);
                        $.each(student, function (key, value) {
                            $('#student').append('<option value=' + value.std_id + '>' + value.std_first_name + ' ' + value.std_last_name + '</option>');
                        });
                    }
                });
            }

        })
    </script>