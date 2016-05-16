<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<style>
    
    .select2-container-multi .select2-choices .select2-search-field input{
        padding: 0px;
    }
</style>
<!-- Middle Content Start -->

<div class="vd_content-wrapper">
    <div class="vd_container" style="margin-right:0px !important;">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("email management");?></li>
                         <li><?php echo ucwords("email compose");?></li>
                    </ul>  
                </div>
                <!-- vd_panel-header --> 
            </div>
            <!-- vd_panel-head-section -->

            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1><?php echo ucwords("Email Compose");?></h1>
                    <small class="subtitle">Compose email page with address book filter</small>

                    <!-- vd_panel-menu -->            </div>
            </div>
            <!-- vd_title-section -->

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel widget light-widget">
                            <div class="panel-heading no-title"> </div>
                            <!-- vd_panel-heading -->

                            <div class="panel-body">
                                <h2 class="mgtp--10"><i class="icon-feather mgr-10 vd_green"></i> <?php echo ucwords("Compose New Email");?> </h2>
                                <br/>
                                <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>admin/email_compose" method="post" 
                                      enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Course");?></label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="degree" name="degree" required="">
                                                <option value="">Select</option>
                                                <?php foreach ($degree as $row) { ?>
                                                    <option value="<?php echo $row->d_id; ?>"><?php echo $row->d_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?></label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="course" name="course" required="">

                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Batch");?></label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="batch" name="batch" required="">

                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" id="main_semester" style="display: none;">
                                        <label class="col-sm-3 control-label">Semester</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="semester" name="semester">
                                                <option value="all">All</option>   
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group" id="main_student" style="display: none;">
                                        <label class="col-sm-3 control-label">Student</label>
                                        <div class="col-sm-5">                                            
                                            <select class="student-multiple" multiple="" id="student" name="student[]">                                                
                                                <option value="all">All Student</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Teacher Email");?></label>
                                        <div class="col-sm-5">
                                            <select id="teacheremail" class="form-control" name="teacheremail[]" multiple="">
                                                <?php foreach ($teacher as $row) { ?> 
                                                    <option value="<?php echo $row->email; ?>"><?php echo $row->name . ' (' . $row->email . ')'; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Subject");?></label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" name="subject" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Cc");?></label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" name="cc"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Message");?></label>
                                        <div class="col-sm-9">
                                            <textarea id="message" name="message" class="width-100 form-control"  rows="15" placeholder="Write your message here"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><?php echo ucwords("Attachment");?></label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" name="userfile[]" multiple/>
                                        </div>
                                    </div>

                                    <div class="form-group form-actions">
                                        <div class="col-sm-12 col-md-offset-3">
                                            <button type="submit" class="btn vd_btn vd_bg-green vd_white"><i class="fa fa-envelope append-icon"></i> <?php echo ucwords("Send");?></button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- panel-body  --> 

                        </div>
                        <!-- panel --> 
                    </div>
                    <!-- col-md-8 -->

                    <div class="col-md-3" style="display: none;">
                        <div class="panel widget">
                            <div class="panel-heading vd_bg-yellow">
                                <h3 class="panel-title"> <span class="menu-icon"> <i class="glyphicon glyphicon-book"></i> </span> Address Book </h3>
                            </div>
                            <!-- vd_panel-heading -->

                            <div class="panel-body">
                                <div class="form-group clearfix mgtp-10">
                                    <div class="vd_input-wrapper light-theme"> <span class="menu-icon"> <i class="fa fa-filter"></i> </span>
                                        <input type="text" id="filter-text" placeholder="Name Filter">
                                    </div>
                                </div>
                                <br/>
                                <form class="form-horizontal" role="form" action="#">



                                    <a href="#" id="check-all">Check All</a> <span class="mgl-10 mgr-10">/</span> <a href="#" id="uncheck-all">Uncheck All</a>  

                                    <hr class="mgtp-5"/>                   
                                    <div class="form-group clearfix" style="height: 250px; overflow-y:scroll;">
                                        <div class="col-md-12">
                                            <div class="content-list content-menu" id="email-list">
                                                <div class="list-wrapper wrap-25 isotope">
                                                    <div class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-1" value="brad@pitt.com">
                                                            <label class="filter-name" for="checkbox-1"> Brad Pitt - <em class="font-normal">brad@pitt.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div  class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-2" value="angelina@jolie.com">
                                                            <label class="filter-name" for="checkbox-2"> Angelina Jolie - <em class="font-normal">angelina@jolie.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div class="email-item">
                                                        <div class="vd_checkbox checkbox-success"> <input type="checkbox" id="checkbox-3" value="adam@sandler.com">

                                                            <label class="filter-name" for="checkbox-3"> Adam Sandler - <em class="font-normal">adam@sandler.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div  class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-4" value="christina@aguilera.com">
                                                            <label class="filter-name" for="checkbox-4"> Chirstina Aguilera - <em class="font-normal">christina@aguilera.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-5" value="tom@cruise.com">
                                                            <label class="filter-name" for="checkbox-5"> Tom Cruise - <em class="font-normal">tom@cruise.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div  class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-6" value="dominicus@soddley.com">
                                                            <label class="filter-name" for="checkbox-6"> Dominicus Soddley - <em class="font-normal">dominicus@soddley.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-7" value="web@designer.com">
                                                            <label class="filter-name" for="checkbox-7"> Web Designer - <em class="font-normal">web@designer.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div  class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-8" value="web@templatecompany.com">
                                                            <label class="filter-name" for="checkbox-8"> Web Template Company - <em class="font-normal">web@templatecompany.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-9" value="round@live.com">
                                                            <label class="filter-name" for="checkbox-9"> Round Live - <em class="font-normal">round@live.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div  class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-10" value="chrisitan@bautista.com">
                                                            <label class="filter-name" for="checkbox-10"> Chrisitan Bautista - <em class="font-normal">chrisitan@bautista.com</em> </label>
                                                        </div>
                                                    </div>
                                                    <div  class="email-item">
                                                        <div class="vd_checkbox checkbox-success">
                                                            <input type="checkbox" id="checkbox-11" value="admin@template.com">
                                                            <label class="filter-name" for="checkbox-11"> Admin Template - <em class="font-normal">admin@template.com</em> </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- list-wrapper --> 
                                            </div>
                                            <!-- content-list --> 
                                        </div>
                                        <!-- col-md-12 --> 
                                    </div>
                                    <!-- form-group -->


                                    <hr/>
                                    <div class="form-group form-actions">
                                        <div class="col-sm-12">
                                            <button type="button" id="insert-email-btn" class="btn vd_btn vd_bg-blue vd_white"><i class="fa fa-angle-double-left append-icon"></i> INSERT ADDRESS</button>
                                            <button type="button" class="btn vd_btn vd_bg-grey vd_white"><i class="fa fa-plus append-icon"></i> ADD NEW</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- panel-body  --> 

                        </div>
                        <!-- panel --> 
                    </div>
                    <!-- col-md-8 --> 
                </div>
                <!-- row --> 

            </div>
            <!-- .vd_content-section --> 

        </div>
        <!-- .vd_content --> 
    </div>
    <!-- .vd_container --> 
</div>
<!-- .vd_content-wrapper --> 

<!-- Middle Content End --> 

<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysiwyg/js/wysihtml5-0.3.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/plugins/isotope/isotope.pkgd.min.js"></script>

<script>
    $(document).ready(function () {
        $('#message').wysihtml5();
    })
    $("#students").select2({closeOnSelect: false});
    $("#checkbox").click(function () {
        if ($("#checkbox").is(':checked')) {
            $("#students > option").prop("selected", "selected");
            $("#students").trigger("change");
        } else {
            $("#students > option").removeAttr("selected");
            $("#students").trigger("change");
        }
    });
</script>

<script>
    $(document).ready(function () {
        $('#semester').on('change', function () {
            var semester_id = $(this).val();
            var course_id = $('#course').val();
            if (semester_id != '') {
                if (semester_id == 'all') {
                    hide_student();
                } else {
                    show_student();
                    course_semester_student(course_id, semester_id);
                }
            }
        });

        $('#course').on('change', function () {
            var course_id = $(this).val();
            var semester_id = $('#semester').val();
            if (course_id != '') {
                if (course_id == 'all') {
                    hide_semester();
                    hide_student();
                } else {
                    show_semester();
                    course_semester_student(course_id, semester_id);
                }
            }
        })
    });

    function course_semester_student(course_id, semester_id) {
        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/course_semester_student/' + course_id + '/' + semester_id,
            type: 'get',
            success: function (content) {
                $('#student').html(content);
                $('#student').prepend('<option value="all">All Students</option>');
            }
        })
    }

    function hide_semester() {
        $('#main_semester').css('display', 'none');
    }

    function hide_student() {
        $('#main_student').css('display', 'none');
    }

    function show_semester() {
        $('#main_semester').css('display', 'block');
    }

    function show_student() {
        $('#main_student').css('display', 'block');
    }
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
                    });
                    $('#course').append('<option value="all">All Course</option>');
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
        })

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
                url: '<?php echo base_url(); ?>index.php?admin/semesters_list_from_branch/' + branch_id,
                type: 'get',
                success: function (content) {
                    console.log(content);
                    $('#semester').append('<option value="all">All</option>');
                    var semester = jQuery.parseJSON(content);
                    $.each(semester, function (key, value) {
                        $('#semester').append('<option value=' + value.s_id + '>' + value.s_name + '</option>');
                    })
                }
            })
        }

    })
</script>

<script type="text/javascript">
    $(".student-multiple").select2();
    $('.student-multiple').css('width', '100%');
</script>

<script>
$(document).ready(function(){
    $('#student').on('change',function(){
        var student_id = $(this).val();
        if(student_id == 'all') {
            $(this).empty();
            $(this).append('<option value="all" selected>All Student</option>');
        }else {
            var degree_id = $('#degree').val();
            var course = $('#course').val();
            var batch = $('#batch').val();
            var semester = $('#semester').val();
            course_semester_student(course, semester);
        }
    })
})
</script>