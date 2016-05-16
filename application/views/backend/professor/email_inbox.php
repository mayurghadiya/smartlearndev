<!-- Middle Content Start -->

<div class="vd_content-wrapper">
    <div class="vd_container" style="margin-right:0px !important;">
        <div class="vd_content clearfix">

            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?professor/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("email management");?></li>
                         <li><?php echo ucwords("email inbox");?></li>
                    </ul>  
                </div>
                <!-- vd_panel-header -->
            </div>
            <!-- vd_panel-head-section -->

            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1><?php echo ucwords("Email");?></h1>
                    <small class="subtitle"><?php echo ucwords("Email Inbox");?></small> 
                    <div class="vd_panel-menu  hidden-xs">  
                        
                        <!-- menu --> 
                    </div>
                    <!-- vd_panel-menu -->   
                </div>
            </div>
            <!-- vd_title-section -->

            <div class="vd_content-section clearfix">
                <div class="panel widget light-widget">

                    <div class="panel-heading no-title">
                        <div class="vd_panel-menu">
                            <div data-action="refresh" class="menu entypo-icon smaller-font" data-placement="bottom" data-toggle="tooltip" data-original-title="Refresh"> <i class="icon-cycle"></i> </div>

                        </div>
                        <!-- vd_panel-menu --> 
                    </div>
                    <!-- vd_panel-heading -->

                    <div class="panel-body">
                        <h2 class="mgtp--10"><?php echo ucwords("Inbox");?></h2>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> <div class="vd_checkbox">
                                            <input type="checkbox" id="checkbox-0">
                                            <label for="checkbox-0" ></label>
                                        </div>
                                    </th>
                                    <th><?php echo ucwords("From");?></th>
                                    <th><?php echo ucwords("Subject");?></th>
                                    <th><?php echo ucwords("Date");?></th>
                                    <th><?php echo ucwords("Action");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                if (count($inbox)) {

                                    foreach ($inbox as $row) {
                                        $counter++;
                                        ?>
                                        <tr class="<?php if($row->read == 0) echo 'info'; ?>">
                                            <td style="width:20px"><div class="vd_checkbox">
                                                    <input type="checkbox" id="checkbox-<?php echo $counter; ?>" class="checkbox-group">
                                                    <label for="checkbox-<?php echo $counter; ?>" ></label>
                                                </div>
                                            </td>
                                            <td><?php echo $row->email_from; ?></td>
                                            <td>
                                                <span class="label vd_bg-green append-icon"><?php echo $row->subject; ?></span> 
                                            </td>
                                            <td><?php echo date('d-m-Y h:m A', strtotime($row->created_at)); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('index.php?professor/inbox_email/' . $row->email_id); ?>" title="view"><span class="fa fa-desktop"></span></a>&nbsp;
                                                <a href="<?php echo base_url('index.php?professor/delete_email/' . $row->email_id); ?>" title="delete" 
                                                   onclick="return confirm('Are you sure to delete this email?');"><span class="fa fa-times"></span></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3">No email found in your inbox</td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- panel-body  -->

                </div>
                <!-- panel --> 

            </div>
            <!-- .vd_content-section --> 

        </div>
        <!-- .vd_content --> 
    </div>
    <!-- .vd_container --> 
</div>
<!-- .vd_content-wrapper --> 

<!-- Middle Content End --> 
