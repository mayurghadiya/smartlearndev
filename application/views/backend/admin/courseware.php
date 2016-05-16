<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home"); ?></a> </li>
                        <li><?php echo ucwords("asset management"); ?></li>
                        <li><?php echo ucwords("courseware Management"); ?></li>
                    </ul>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("courseware Management"); ?></h1>                    
                </div>
            </div>

            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered" id="changestab">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords("courseware List"); ?>
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">
                                <div class="panel-body table-responsive" id="getresponse">
                                    <table class="table table-striped" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>			
                                                <th><div><?php echo ucwords("topic name"); ?></div></th>
                                                <th><div><?php echo ucwords("branch"); ?></div></th>
                                                <th><div><?php echo ucwords("attachment"); ?></div></th>
                                                <th><div><?php echo ucwords("description"); ?></div></th>
                                                <th><div><?php echo ucwords("status"); ?></div></th>
                                                <th><div><?php echo ucwords("action"); ?></div></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $count = 1;
                                            foreach ($courseware as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $count++; ?></td>
                                                     <td><?php echo $row['topic']; ?></td>
                                                     <td><?php echo $row['c_name']; ?></td>
                                                    <td id="downloadedfile"><a href="<?=base_url()?>uploads/courseware/<?php echo $row['attachment']; ?>" download="" title="<?php echo $row['attachment']; ?>"><i class="fa fa-download"></i></a></td>	
                                                    <td><?php echo $row['description']; ?></td>
                                                     <td>
                                                        <?php if ($row['status'] == '1') { ?>
                                                    <span class="label label-success">Active</span>
                                                        <?php } else { ?>	
                                                    <span class="label label-default">InActive</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="menu-action">
                                                         <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>index.php?admin/courseware/delete/<?php echo $row['courseware_id']; ?>');" data-original-title="Remove" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"><i class="fa fa-times"></i> </a>
                                                    </td>
                                                </tr>
                                            <?php                                                
                                            }
                                            ?>
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
    <!-- row --> 
</div>