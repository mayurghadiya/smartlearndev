<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active"><?php echo $page_title ?></li>
                    </ul>
                    
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
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
                                                    <th><div>Course</div></th>												
                                                    <th><div>Batch</div></th>												
                                                    <th><div>Sem</div></th>												
                                                    <th><div>Date of submission</div></th>
                                                    <th><div>Description</div></th>
                                                    <th><div>Action</div></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1;foreach($assignment as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++;?></td>
                                                    <td><?php echo $row->assign_title;?></td>	
                                                    <td>
                                                    <?php 
                                                            foreach($course as $crs)
                                                            {
                                                                    if($crs->course_id==$row->course_id)
                                                                    {
                                                                            echo $crs->c_name;
                                                                    }
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                            foreach($batch as $bch)
                                                            {
                                                                    if($bch->b_id==$row->assign_batch)
                                                                    {
                                                                            echo $bch->b_name;
                                                                    }
                                                            }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                            foreach($semester as $sem)
                                                            {
                                                                    if($sem->s_id==$row->assign_sem)
                                                                    {
                                                                            echo $sem->s_name;
                                                                    }
                                                            }														
                                                    ?>													
                                                    </td>	                                                   
                                                    <td><?php echo  date("F d, Y",strtotime($row->assign_dos));?></td>		
                                                    	
                                                    <td><?php echo  $row->assign_desc;?></td>
                                                    <td> 
                                                        <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_submit_assignment/<?php echo $row->assign_id; ?>');" data-original-title="Submit Assignment" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-plus"></i></a>
                                                    <a href="uploads/project_file/<?php echo $row->assign_filename; ?>" download="" title="<?php echo  $row->assign_filename;?>"><i class="fa fa-download"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>						
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->
                                
                                
                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="submittedlist" style="padding: 5px">
                                <div class="box-content">                	
                                    <?php
                                 $this->db->select('s.*,a.*');
                                 $this->db->from('assignment_submission s');
                                 $this->db->join('assignment_manager a','a.assign_id=s.assign_id');
                                 $this->db->where('s.student_id',$this->session->userdata('std_id'));
                                    $submitassignment= $this->db->get();

                                ?>   
                                      <table class="table table-striped" id="data-tables">
                                            <thead>
                                                <tr>
                                                    <th><div>#</div></th>
                                                    <th><div>Assignment Name</div></th>												
                                                    <th><div>Submitted Date</div></th>												
                                                    <th><div>Document Name</div></th>	
                                                    <th><div>Action</div></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1;foreach($submitassignment->result() as $srow): ?>
                                                <tr>
                                                    <td><?php echo $count++;?></td>
                                                    <td><?php echo $srow->assign_title;?></td>	
                                                     <td><?php echo $srow->submited_date;?></td>	
                                                      <td><?php echo $srow->document_file;?></td>
                                                       <td> 
                                                      <a href="uploads/project_file/<?php echo $srow->assign_filename; ?>" download="" title="<?php echo  $srow->document_file;?>"><i class="fa fa-download"></i></a>
                                                    </td>
                                                   </tr>
                                                <?php endforeach;?>						
                                            </tbody>
                                        </table>
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

<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$this->config->item('js_path')?>jquery.validate.min.js"></script>
