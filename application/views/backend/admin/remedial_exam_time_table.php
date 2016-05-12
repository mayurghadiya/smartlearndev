<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_head-section clearfix">
                    <div class="vd_panel-header">
                       <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("examinations");?></li>
                         <li><?php echo ucwords("remedial exam schedule");?></li>
                    </ul>                   
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("Remedial Exam Schedule");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("Remedial Exam Schedule List");?>
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
                                                <th><?php echo ucwords("department");?></th>
                                                <th><?php echo ucwords("Branch");?></th>
                                                <th><?php echo ucwords("Batch");?></th>
                                                <th><?php echo ucwords("Semester");?></th>
                                                <th><?php echo ucwords("Exam");?></th>
                                                <th><?php echo ucwords("Subject");?></th>
                                                <th><?php echo ucwords("Date");?></th>
                                                <th><?php echo ucwords("Time");?></th>
                                                <th><?php echo ucwords("Action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 1;
                                            foreach ($time_table as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $counter; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>
                                                    <td><?php echo $row->em_name; ?></td>
                                                    <td><?php echo $row->subject_name; ?></td>
                                                    <td><?php echo date('F d, Y', strtotime($row->exam_date)); ?></td>
                                                    <td><?php echo date('h:i A', strtotime(date('Y-m-d') . $row->exam_start_time)) . ' to ' . date('h:i A', strtotime(date('Y-m-d') . $row->exam_end_time)); ?></td>
                                                    <td class="menu-action">
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_edit_exam_time_table/<?php echo $row->exam_time_table_id; ?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>

                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/exam_time_table/delete/<?php echo $row->exam_time_table_id; ?>');" data-original-title="remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $counter++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                
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
    <?php if ($validation_error != '') { ?> 
        <script>
                                                            $(document).ready(function () {
                                                                $('#add_time_table').click();
                                                            });
        </script>
    <?php } ?>

    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
 <style>
    .nav-fixedtabs {
    left: 86%;
    position: fixed;
    top: 25%;
    }
    #navfixed{
        cursor: pointer;
    }
    
    </style>
    
    <div class="md-fab-wrapper">

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addremedial_schedual/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>