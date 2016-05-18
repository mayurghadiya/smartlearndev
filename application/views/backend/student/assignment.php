<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="">
        <div class="vd_content clearfix">
            <div class="vd_title-section clearfix">

                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                          <li><?php echo set_breadcrumb(); ?></li>
                    </ul>

                </div>

                <div class="vd_panel-header">
                    <h1><?php echo $page_title ?></h1>            
                </div>

            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Assignment List
                                </a></li>
                            <li>
                                <a href="#submittedlist" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    Submitted Assignment List
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
                                                <th><div>Assignment Name</div></th>											
                                                <th><div>Date of submission</div></th>
                                                <th><div>Description</div></th>
                                                <th><div>File</div></th>                                                    
                                                <th><div>Action</div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($assignment as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row->assign_title; ?></td>	                                                    	                                                   
                                                    <td><?php echo date("F d, Y", strtotime($row->assign_dos)); ?></td>		

                                                    <td><?php echo wordwrap($row->assign_desc, 30, "<br>\n"); ?></td>
                                                    <td> <a href="uploads/project_file/<?php echo $row->assign_filename; ?>" download="" title="<?php echo $row->assign_filename; ?>"><i class="fa fa-download"></i></a></td>
                                                    <td> 
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_submit_assignment/<?php echo $row->assign_id; ?>');" data-original-title="Submit Assignment" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-plus"></i></a>
                                                    </td>
                                                </tr>
<?php endforeach; ?>							
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="submittedlist" style="padding: 5px">
                                <?php
                                $this->db->select('s.*,a.*');
                                $this->db->from('assignment_submission s');
                                $this->db->join('assignment_manager a', 'a.assign_id=s.assign_id');
                                $this->db->where('s.student_id', $this->session->userdata('std_id'));
                                $submitassignment = $this->db->get();
                                ?> 
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel-body table-responsive">
                                            <div class="panel">
                                                <table class="table table-striped" id="data-tables1">
                                                    <thead>
                                                        <tr>
                                                            <th><div>#</div></th>
                                                            <th><div>Assignment Name</div></th>												
                                                            <th><div>Submitted Date</div></th>												
                                                            <th><div>Document Name</div></th>	
                                                            <th><div>File</div></th>                                                               
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $count = 1;
                                                        foreach ($submitassignment->result() as $srow): ?>
                                                            <tr>
                                                                <td><?php echo $count++; ?></td>
                                                                <td><?php echo $srow->assign_title; ?></td>	
                                                                <td><?php echo date("F d, Y", strtotime($srow->submited_date)); ?></td>	
                                                                <td><?php echo $srow->document_file; ?></td>
                                                                <td > 
                                                                    <a href="uploads/project_file/<?php echo $srow->assign_filename; ?>" download="" title="<?php echo $srow->document_file; ?>"><i class="fa fa-download"></i></a>
                                                                </td>
                                                            </tr>
<?php endforeach; ?>						
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                  <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
  
                <script>
                $(document).ready(function () {
                    $('#data-tables1').dataTable();
                })

                </script>