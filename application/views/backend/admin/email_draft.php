<!-- Middle Content Start -->

<div class="vd_content-wrapper">
    <div class="vd_container" style="margin-right:0px !important;">
        <div class="vd_content clearfix">

            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                     <li><?php echo set_breadcrumb(); ?></li>
                    </ul>
                    
                </div>
                <!-- vd_panel-header -->
            </div>
            <!-- vd_panel-head-section -->

            <div class="vd_title-section clearfix">
                <div class="vd_panel-header">
                    <h1>Email</h1>
                    <small class="subtitle">Email templates</small> 
                    <div class="vd_panel-menu  hidden-xs">  
                        <div class="menu">
                            <div data-action="click-trigger"> Go To <i class="fa fa-angle-down"></i> </div>
                            <div class="vd_mega-menu-content width-xs-2 left-xs" data-action="click-target">
                                <div class="child-menu">
                                    <div class="content-list content-menu">
                                        <ul class="list-wrapper pd-lr-10">
                                            <li> <a href="email.html"> <div class="menu-icon"><i class=" fa fa-envelope"></i></div> <div class="menu-text">Email List</div> </a> </li>
                                            <li> <a href="email-compose.html"> <div class="menu-icon"><i class=" icon-feather"></i></div> <div class="menu-text">Compose</div> </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <h2 class="mgtp--10"> Draft </h2>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th> <div class="vd_checkbox">
                                            <input type="checkbox" id="checkbox-0">
                                            <label for="checkbox-0" ></label>
                                        </div>
                                    </th>
                                    <th>From</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                if (count($draft)) {

                                    foreach ($draft as $row) {
                                        $counter++;
                                        ?>
                                        <tr>
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
                                                <a href="<?php echo base_url('index.php?admin/draft_email/' . $row->email_id); ?>" title="view"><span class="fa fa-desktop"></span></a>&nbsp;
                                                <a href="<?php echo base_url('index.php?admin/delete_email/' . $row->email_id); ?>" title="delete" 
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
