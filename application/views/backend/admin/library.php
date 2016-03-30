<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Library Management</li>
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
                    <h1>Library Management</h1>
                   
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Library List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Library
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
                                                <th><div>Title</div></th>											
                                                <th><div>Degree</div></th>											
                                                <th><div>Batch</div></th>											
                                                <th><div>Semester</div></th>											
                                                <th><div>Downloadable File</div></th>											
                                                <th><div>Date</div></th>									
                                                <th><div>Operation</div></th>											
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($library as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>	
                                                    <td><?php echo $row->lm_title; ?></td>	
                                                    <td>
                                                        <?php
                                                        foreach ($degree as $deg) {
                                                            if ($deg->d_id == $row->lm_degree) {
                                                                echo $deg->d_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        foreach ($batch as $bch) {
                                                            if ($bch->b_id == $row->lm_batch) {
                                                                echo $bch->b_name;
                                                            }
                                                        }
                                                        ?>
                                                    </td>	
                                                    <td>
                                                        <?php
                                                        foreach ($semester as $sem) {
                                                            if ($sem->s_id == $row->lm_semester) {
                                                                echo $sem->s_name;
                                                            }
                                                        }
                                                        ?>

                                                    </td>	
                                                    <td><a href="<?php echo $row->lm_url; ?>" download="" title="<?php echo $row->lm_filename; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo date('F d, Y',strtotime($row->lm_dos)); ?></td>	

                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_library/<?php echo $row->lm_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/library/delete/<?php echo $row->lm_id; ?>');" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i></a>	
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
<?php echo form_open(base_url() . 'index.php?admin/library/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmlibrary', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Degree *</label>
                                            <div class="col-sm-5">
                                                <select name="degree" id="degree">
                                                    <option value="">Select degree</option>
<?php
$datadegree = $this->db->get_where('degree', array('d_status' => 1))->result();
foreach ($datadegree as $rowdegree) {
    ?>
                                                        <option value="<?= $rowdegree->d_id ?>"><?= $rowdegree->d_name ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Course *</label>
                                            <div class="col-sm-5">
                                                <select name="course" id="course">
                                                    <option value="">Select course</option>
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
                                            <label class="col-sm-3 control-label">Batch *</label>
                                            <div class="col-sm-5">
                                                <select name="batch" id="batch" onchange="get_student2(this.value);">
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
                                            <label class="col-sm-3 control-label">Semester *</label>
                                            <div class="col-sm-5">
                                                <select name="semester" id="semester"  onchange="get_students2(this.value);">
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
                                            <label class="col-sm-3 control-label">Title *</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" id="title" />
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Date  *</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="dateofsubmission" id="dateofsubmission" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Upload *</label>
                                            <div class="col-sm-5">
                                                <input type="file" class="form-control" name="libraryfile" id="libraryfile" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Library</button>
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
        
          $("#degree").change(function(){
                var degree = $(this).val();
                var dataString = "degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource/library'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#course").html(response);
                    }
                });
        });
        
         $("#course").change(function(){
                var course = $(this).val();
                 var degree = $("#degree").val();
                var dataString = "course="+course+"&degree="+degree;
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_batchs/library'; ?>",
                    data:dataString,                   
                    success:function(response){
                        $("#batch").html(response);
                    }
                });
        });
        
        
        function get_student2(batch, semester = '') {
        $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/batchwisestudent/',
           type: 'POST',
           data: {'batch':batch},
           success: function(content){
               $("#student").html(content);
           }
        });
    }
    
    function get_students2(sem)
    {
         var batch = $("#batch").val();
        var course = $("#course").val();
         var degree = $("#degree").val();
         $.ajax({
           url: '<?php echo base_url(); ?>index.php?admin/semwisestudent/',
           type: 'POST',
           data: {'batch':batch,'sem':sem,'course':course,'degree':degree},
           success: function(content){
               //alert(content);
               $("#student").html(content);
           }
        });
        
        
    }
    
   
    
                                                        $.validator.setDefaults({
                                                            submitHandler: function (form) {
                                                                form.submit();
                                                            }
                                                        });

                                                        $().ready(function () {
                                                            $("#dateofsubmission").datepicker({
                                                                minDate: 0
                                                            });
                                                            jQuery.validator.addMethod("character", function (value, element) {
                                                                return this.optional(element) || /^[A-z]+$/.test(value);
                                                            }, 'Please enter a valid character.');

                                                            jQuery.validator.addMethod("url", function (value, element) {
                                                                return this.optional(element) || /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(value);
                                                            }, 'Please enter a valid URL.');

                                                            $("#frmlibrary").validate({
                                                                rules: {
                                                                    degree: "required",
                                                                    course:"required",
                                                                    batch: "required",
                                                                    semester: "required",
                                                                    student: "required",
                                                                    dateofsubmission: "required",                                                                    
                                                                    libraryfile:{
                                                                         required: true,
                                                                            extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt',  
                                                                            
                                                                    },
                                                                    title:
                                                                            {
                                                                                required: true,
                                                                              
                                                                            },
                                                                             libraryfile: {
                                                                    
                                                                    required: true,
                                                                    extension:'gif|jpg|png|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt|jpeg',  
                                                                }
                                                                },
                                                                messages: {
                                                                    degree: "Please select degree",
                                                                    course:"Please select course",
                                                                    batch: "Please select batch",
                                                                    semester: "Please select semester",
                                                                    student: "Please select student",
                                                                    dateofsubmission: "Please select date",                                                                   
                                                                    libraryfile: {
                                                                          required: "Please upload file",
                                                                            extension:'Please upload valid file',  
                                                                           
                                                                    },
                                                                    title:
                                                                            {
                                                                                required: "Please enter title",
                                                                               
                                                                            },
                                                                }
                                                            });
                                                        });
    </script>
