<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                     <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo ucwords("subject");?></li>
                    </ul>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Subject Management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Subject List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("Add Subject");?>
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
                                                <th><div><?php echo ucwords("Subject Name");?></div></th>											
                                                <th><div><?php echo ucwords("Subject Code");?></div></th>											
                                                <th><div><?php echo ucwords("Branch");?></div></th>											
                                                <th><div><?php echo ucwords("Semester");?></div></th>									
                                                <th><div><?php echo ucwords("Action");?></div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($subject as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->subject_name; ?></td>												
                                                    <td><?php echo $row->subject_code; ?></td>
                                                    <td>
                                                        <?php
                                                        foreach ($course as $crs) {
                                                            if ($crs->course_id == $row->sm_course_id) {
                                                                echo $crs->c_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->sm_sem_id) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        ?>

                                                    </td>												
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_subject/<?php echo $row->sm_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/subject/delete/<?php echo $row->sm_id; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
                                <div class="">
                                   <span style="color:red">* <?php echo ucwords("is mandatory field");?></span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/subject/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmsubject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Subject Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="subname" id="subname" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Subject Code");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="subcode" id="subcode" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select branch</option>
                                                    <?php
                                                    $course = $this->db->get_where('course', array('course_status' => 1))->result();
                                                    foreach ($course as $crs) {
                                                        ?>
                                                        <option value="<?= $crs->course_id ?>"><?= $crs->c_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester">
                                                    <option value="">Select semester</option>
                                                    
                                                </select>
                                                 <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add ");?></button>
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
        
         $( "#frmsubject" ).submit(function( event ) {
          if($("#subname").val()!=null & $("#semester").val()!=null & $("#subcode").val()!=null & $("#course").val()!=null )
          { 
         $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/checksubjects'; ?>",
                    dataType:'json',
                   data:
                        {
                            'subname':$("#subname").val(),
                            'semester':$("#semester").val(),
                            'subcode':$("#subcode").val(),
                            'course':$("#course").val()
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                         $("#error_lable_exist").html('');
                                    $('#frmsubject').attr('validated',true);
                                    $('#frmsubject').submit();
                                     } else
                                         {
                                             $("#error_lable_exist").html('Record is already present in the system');
                                         return false;
                                     }
                    }
                });
                    return false; 
                    }
        event.preventDefault();
      });
       $("#course").change(function () {
        var course = $(this).val();
        var degree = $("#degree").val();
        var dataString = "course=" + course;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'index.php?admin/get_semester'; ?>",
            data: dataString,
            success: function (response) {
                $("#semester").html(response);
            }
        });
    });
        
        $(document).ready(function(){
        $("#subname").change(function(){ 
           $('#semester').val($("#semester option:eq(0)").val());
        });
        $("#course").change(function(){
             $('#semester').val($("#semester option:eq(0)").val());
        });
        $("#subcode").change(function(){
              $('#semester').val($("#semester option:eq(0)").val());
        });
        });
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {

            $("#frmsubject").validate({
                rules: {

                      subname:"required",                                                                  
                    subcode:"required",
                    course:"required",
                    semester:"required"
                },
                messages: {

                subname: "Enter subject name",
                 subcode: "Enter subject code",                                                                  
                    course: "Select branch",
                    semester: "Select semester",
                }
            });
        });
    </script>
<?php include('plus_icon.php'); ?>