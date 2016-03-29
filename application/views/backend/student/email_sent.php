
<!-- Middle Content Start -->

<div class="vd_content-wrapper">
    <div class="vd_container" style="margin-right:0px !important;">
        <div class="vd_content clearfix">

            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li class="active">Email</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>

                    </div>

                </div>
                <!-- vd_panel-header -->
            </div>
            <!-- vd_panel-head-section -->

            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1>Sent Email</h1>                    
                    <!-- vd_panel-menu -->   
                </div>
            </div>
            <!-- vd_title-section -->

            <div class="vd_content-section clearfix">
                <div class="panel widget light-widget">

                    <div class="panel-heading no-title">
                        <div class="vd_panel-menu">
                            <div data-action="refresh" class="menu entypo-icon smaller-font" data-placement="bottom" data-toggle="tooltip" data-original-title="Refresh"> <i class="icon-cycle"></i> </div>
                            <!--<div class="menu entypo-icon smaller-font" data-placement="bottom" data-toggle="tooltip" data-original-title="Config">
                                  <div data-action="click-trigger" class="menu-trigger"> <i class="icon-cog"></i> </div>
                                  <div class="vd_mega-menu-content  width-xs-2  left-xs" data-action="click-target">
                                    <div class="child-menu">
                                          <div class="content-list content-menu">
                                            <ul class="list-wrapper pd-lr-10">
                                                  <li> <a href="#"> <div class="menu-icon"><i class=" fa fa-user"></i></div> <div class="menu-text">Panel Menu</div> </a> </li>
                                            </ul>
                                          </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="menu entypo-icon" data-placement="bottom" data-toggle="tooltip" data-original-title="Close" data-action="close"> <i class="icon-cross"></i> </div>-->
                        </div>
                        <!-- vd_panel-menu --> 
                    </div>
                    <!-- vd_panel-heading -->

                    <div class="panel-body">
                        <h2 class="mgtp--10"> Sent </h2>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> <div class="vd_checkbox">
                                            <input type="checkbox" id="checkbox-0">
                                            <label for="checkbox-0" ></label>
                                        </div>
                                    </th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0; // row counter
                                if(count($sent_mail)) {
                                    foreach($sent_mail as $row) { $counter++; ?> 
                            
                                <tr>
                                    <td style="width:5%">
                                        <div class="vd_checkbox">
                                            <input type="checkbox" id="checkbox-<?php echo $counter; ?>" class="checkbox-group">
                                            <label for="checkbox-<?php echo $counter; ?>" ></label>
                                        </div>
                                    </td>
                                    <td style="width: 20%">
                                        <?php
                                        $admin = $this->db->get_where('admin', array(
                                            'admin_id'  => $row->email_to
                                        ))->row();
                                        ?>
                                        <?php echo $admin->email; ?>
                                    </td>
                                    <td>
                                        <span class="label vd_bg-green append-icon"><?php echo $row->subject; ?></span> 
                                    </td>
                                    <td style="width:20%;text-align: left">
                                        <strong><?php echo date('d-m-Y h:m A', strtotime($row->created_at)); ?></strong>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url('index.php?student/email_view/' . $row->email_id); ?>" title="View">
                                            <span class="fa fa-desktop"></span></a>
                                        &nbsp;
                                        <a href="<?php echo base_url('index.php?admin/delete_email/' . $row->email_id) ?>" title="delete"
                                           onclick="return confirm('Are you sure to delete this email?');"><span class="fa fa-times"></span></a>
                                    </td>
                                </tr>
                                
                                    <?php }
                                } else { ?>
                                <tr>
                                    <td colspan="3">No sent mail found</td>
                                </tr>
                                <?php } ?>                                
                            </tbody>
                        </table>
                        <!--                        Pagination-->
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
