<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                          <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo ucwords("chancellor");?></li>
                    </ul>
                    </ul>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("chancellor Management");?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                     <?php echo ucwords("chancellor List");?>
                                </a></li>
                            
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">

                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">	
                                <div class="panel-body table-responsive" >
                                      <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("chancellor name");?></th>
                                                <th><?php echo ucwords("image");?></th>
                                                <th><?php echo ucwords("contact no");?></th>
                                                <th><?php echo ucwords("email");?></th>
                                                <th><?php echo ucwords("designation");?></th>
                                                <th><?php echo ucwords("description");?></th>
                                                <th><?php echo ucwords("action");?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($chancellor as $row):
                                                ?>
                                            <tr>
                                                <td><?php echo $count++; ?></td>
                                                <td><?php echo $row['people_name']; ?></td>    
                                                <td> <img src="<?= base_url() ?>/uploads/system_image/<?= $row['people_photo']; ?>" height="70" width="70" id="blah"  /></td>
                                               <td><?php echo $row['people_phone']; ?></td> 
                                                <td><?php echo $row['people_email']; ?></td> 
                                                 <td><?php echo $row['people_designation']; ?></td> 
                                                 <td><?php echo $row['people_description']; ?></td> 
                                                <td class="menu-action">
                                                     <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_chancellor/<?php echo $row['university_people_id'];?>');" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"><i class="fa fa-pencil"></i></a>        
                                                    <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/chancellor/delete/<?php echo $row['university_people_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>						
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>

                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                
                                <!----CREATION FORM ENDS-->
                            </div>
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

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addchanceller/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>

