    
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a> </li>
                        <li><a href="#">Pages</a> </li>
                        <li class="active">Grade</li>
                    </ul>

                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Grade</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Grade List
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Add Grade
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
<<<<<<< HEAD
                                                <th>Grade Name</th>
                                                <th>From Marks</th>
                                                <th>To Marks</th>
=======
                                                <th>Grade</th>
                                                <th>From Mark</th>
                                                <th>To Mark</th>
                                                <th>Description</th>
>>>>>>> 127278cd9e666639d44ecc46d7e0abe506a18d57
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<<<<<<< HEAD
                                            <?php $counter = 1; ?>
                                            <?php foreach ($grade as $row) { ?>
                                                <tr>
                                                    <td><?php echo $counter++; ?></td>
                                                    <td><?php echo $row->grade_name; ?></td>
                                                    <td><?php echo $row->from_marks; ?></td>
                                                    <td><?php echo $row->to_marks; ?></td>
=======
                                            <?php
                                            $count = 1;
                                            foreach ($grade as $row):
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row->grade_name; ?></td>
                                                    <td><?php echo $row->from_marks; ?></td>     
                                                    <td><?php echo $row->to_marks; ?></td>
                                                    <td><?php echo $row->comment; ?></td>
>>>>>>> 127278cd9e666639d44ecc46d7e0abe506a18d57
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_grade/<?php echo $row->grade_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/grade/delete/<?php echo $row->grade_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
<<<<<<< HEAD
                                            <?php } ?>
=======
                                            <?php endforeach; ?>						
>>>>>>> 127278cd9e666639d44ecc46d7e0abe506a18d57
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content"> 
                                    <div class="">
                                        <span style="color:red">* is mandatory field</span> 
                                    </div>                                    
<<<<<<< HEAD
                                    <?php echo form_open(base_url() . 'index.php?admin/grade/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'grade-form', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Grade Name<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input id="grade_name" class="form-control" type="text" name="grade_name"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">From Marks<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="from_marks" id="from_marks"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">To Marks<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="to_marks" id="to_marks"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description</label>
                                            <div class="col-sm-5">	
                                                <div class="chat-message-box">
                                                    <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Add Grade</button>
                                            </div>
                                        </div>                                              
                                    </div>  
                                    </form>         
=======
                                    <?php echo form_open(base_url() . 'index.php?admin/grade/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'gradeform', 'target' => '_top')); ?>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Grade Name<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input id="grade_name" class="form-control" type="text" name="grade_name"/>
                                        </div>	
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">From Marks<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" name="from_marks" id="from_marks" min="0"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">To Marks<span style="color:red">*</span></label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" name="to_marks" id="to_marks"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-5">	
                                            <div class="chat-message-box">
                                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button type="submit" class="btn btn-info">Add Grade</button>
                                        </div>
                                    </div> 
                                    </form>
>>>>>>> 127278cd9e666639d44ecc46d7e0abe506a18d57
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

<<<<<<< HEAD
                                                            $("#grade-form").validate({
                                                                rules: {
                                                                    grade_name: "required",
                                                                    from_marks: "required",
                                                                    to_marks: "required",
                                                                },
                                                                messages: {
                                                                    grade_name: "Please enter grade name",
                                                                    from_marks: "Please enter from marks",
                                                                    to_marks: "Please enter to marks",
                                                                },
                                                            });
                                                        });
=======
                                                            $("#gradeform").validate({
                                                                rules: {
                                                                    grade_name: "required",
                                                                    from_marks: "required",
                                                                    to_marks: "required"
                                                                },
                                                                messages: {
                                                                    grade_name: "Please enter grade name",
                                                                    from_marks: "Please enter valid grade marks",
                                                                    to_marks: "Please enter valid grade marks"
                                                                },
                                                            });
                                                        });
    </script>
    
    <script>
    $(document).ready(function(){
        $('#from_marks').on('blur',function(){
            $('#to_marks').attr('min', $(this).val());
            $('#to_marks').attr('required', 'required');
        });
    })
>>>>>>> 127278cd9e666639d44ecc46d7e0abe506a18d57
    </script>