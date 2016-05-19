
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                  <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo $page_title;?></li>
                    </ul>               
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("vocational course");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("vocational course list");?>
                                </a></li>
                          <li class="">
                                <a href="#registerlist" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("registered student list");?>
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
                                                <th><?php echo ucwords("course name");?></th>
                                                 <th><?php echo ucwords("course category");?></th>
                                                <th><?php echo ucwords("course start date");?></th>
                                                <th><?php echo ucwords("course end date");?></th>
                                                <th><?php echo ucwords("course fee");?></th>
                                                <th><?php echo ucwords("professor name");?></th>
                                                <th><?php echo ucwords("status");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php $count = 1;
                                            foreach ($vocationalcourse as $row):
                                                ?><tr>
                                            <td><?php echo $count++; ?></td>
                                              <td><?php echo $row['course_name']; ?></td>    
                                              <td><?php foreach($category as $cat){
                                                  if($cat->category_id==$row['category_id']){
                                                      echo $cat->category_name;
                                                  }
                                              } ?></td>
                                              <td><?php echo date('F d, Y', strtotime($row['course_startdate'])); ?></td>    
                                              <td><?php echo date('F d, Y', strtotime($row['course_enddate'])); ?></td>    
                                              <td><?php echo $row['course_fee']; ?></td>   
                                              <td><?php 
                                               $professor = $this->db->get('professor')->result_array();
                                               foreach($professor as $pro)
                                               {
                                                   if($pro['professor_id']==$row['professor_id'])
                                                   {
                                                       echo $pro['name'];
                                                   }
                                               }
                                               ?></td>   
                                              <td>
                                                <?php if ($row['status'] == '1') { ?>
                                                <span class="label label-success">Active</span>
                                                    <?php } else { ?>	
                                                <span class="label label-default">InActive</span>
                                                <?php } ?>
                                                </td>
                                                <td class="menu-action">
                                                    <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_vocational/<?php echo $row['vocational_course_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/vocationalcourse/delete/<?php echo $row['vocational_course_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane box" id="registerlist" >
                                 <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="data-tables1">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("course name");?></th>
                                                <th><?php echo ucwords("student name");?></th>
                                                <th><?php echo ucwords("paid amount");?></th>
                                                <th><?php echo ucwords("paid date");?></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php $count = 1;
                                            foreach ($vocationalcoursefee as $row):
                                                ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $row['course_name']; ?></td>  
                                                <td><?php echo $row['name']; ?></td>  
                                                <td><?php echo $row['pay_amount']; ?></td>  
                                                <td><?php echo $row['pay_date']; ?></td>  
                                            </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <!----TABLE LISTING ENDS--->
                            
                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
     <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){
         $('#data-tables1').dataTable();
    });
    </script>
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
        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addvocationalcourse/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>
  