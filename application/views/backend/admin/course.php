    
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("Home");?></a> </li>
                        <li><?php echo ucwords("basic management");?></li>
                        <li class="active"><?php echo ucwords("Branch Management");?></li>
                    </ul>
                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Branch Management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Branch List");?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                   <?php echo ucwords("Add Branch");?> 
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
                                                <th><?php echo ucwords("Branch Name");?></th>
                                                <th><?php echo ucwords("ID");?></th>
                                                <th><?php echo ucwords("Course");?></th>
                                                <th><?php echo ucwords("Semester");?></th>
                                                <th><?php echo ucwords("Status");?></th>
                                                <th><?php echo ucwords("Action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($courses as $row): ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $row['c_name']; ?></td>
                                                <td><?php echo $row['course_alias_id']; ?></td>     
                                                <td> <?php
                                                        foreach ($degree as $deg) {
                                                            if ($deg['d_id']==$row['degree_id']) {
                                                                echo $deg['d_name']."<br> ";
                                                            }
                                                        }
                                                        ?></td>
                                                <td>
                                                    <?php
                                                    $semexplode=explode(',',$row['semester_id']);
                                                        foreach ($semesters as $sem) {
                                                            if (in_array($sem['s_id'],$semexplode)) {
                                                                echo $sem['s_name']."<br> ";
                                                            }
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                        <?php if ($row['course_status'] == '1') { ?>
                                                    <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                    <span class="label label-default">InActive</span>
    <?php } ?>
                                                </td>
                                                <td class="menu-action">
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_course/<?php echo $row['course_id']; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>
                                                        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/courses/delete/<?php echo $row['course_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
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
                                   <span style="color:red">*<?php echo ucwords("is mandatory field");?> </span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/courses/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'courseform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("course");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="degree" name="degree" class="form-control">
                                                    <option value="">--- Select Course ---</option>
                                                        <?php foreach ($degree as $srow) { ?>
                                                        <option value="<?php echo $srow['d_id']; ?>"><?php echo $srow['d_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("branch name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="c_name" id="c_name"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("ID");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="course_alias_id" id="course_alias_id"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("semester");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="semester" name="semester[]" class="form-control" multiple>
                                                    <option value="">--- Select Semester ---</option>
                                                        <?php foreach ($semesters as $srow) { ?>
                                                        <option value="<?php echo $srow['s_id']; ?>"><?php echo $srow['s_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("description");?></label>
                                            <div class="col-sm-5">	
                                                <div class="chat-message-box">
                                                    <textarea name="c_description" id="c_description" rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="course_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                        
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("add");?></button>
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
    
        $(document).ready(function () {
         
            $("#courseform").validate({
                rules: {
                    degree:  "required",
                    c_name: 
                        {
                            required:true,
                            remote: {
                              url: "<?php echo base_url().'index.php?admin/check_course'; ?>",
                              type: "post",
                              data: {
                                course: function() {
                                  return $( "#c_name" ).val();
                                },
                                 degree: function() {
                                  return $( "#degree" ).val();
                                },
                              }
                            }
                        },
                    'semester[]':"required",
                    course_alias_id: "required",
                },
                messages: {
                    degree: "Select course",
                    c_name: 
                    {
                        required:"Enter branch name",
                        remote:"Record is already present in the system",
                    },
                    'semester[]':"Select semester",
                    course_alias_id: "Enter branch id",
                },
            });
        });
    </script>