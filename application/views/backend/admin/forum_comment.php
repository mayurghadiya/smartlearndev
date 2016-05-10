<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("basic management");?></li>
                         <li><?php echo ucwords("Forum Comment");?></li>
                    </ul>					
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Forum Comment</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Forum Comment
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
                                                <th>Forum Comments</th>
                                                <th>Status</th>
                                                <th  >Action</th>
                                                <th  ></th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $count = 1;
                                            foreach ($forum_comment as $row): ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                    <td><?php echo $row['forum_comments']; ?></td>                         
                                                    <td >
                                                        <?php if ($row['forum_comment_status'] == '1') { ?>
                                                            <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                            <span class="label label-default">InActive</span>
    <?php } ?>
                                                            
                                                    </td>
                                                    <td class="menu-action">                                                            
                                                        <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>forum/commentdelete/<?php echo $row['forum_comment_id']; ?>/<?php  echo $row['forum_topic_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                       
                                                    </td>
                                                    <td >
                                                        <?php if ($row['forum_comment_status'] == '0') { ?>
                                                        <a href="<?php echo base_url(); ?>index.php?forum/confirmcomment/<?php echo $row['forum_comment_id']; ?>/<?php  echo $row['forum_topic_id']; ?>" class="btn btn-info vd_bg-green">Approve</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                <?php endforeach; ?>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                           
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
    