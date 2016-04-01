<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Student Fees Record</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">

                    <!------CONTROL TABS START------>
                    <ul class="nav nav-tabs bordered">
                        <li class="active">
                            <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                Fees Record
                            </a></li>
                    </ul>
                    <!------CONTROL TABS END------>
                    <div class="tab-content">
                        <!----TABLE LISTING STARTS-->
                        <div class="tab-pane box active" id="list">

                            <br/>
                            <table  class="table table-bordered datatable" id="table_export">
                                <thead>
                                    <tr>
                                        <th><div>ID</div></th>
                                        <th><div>Title</div></th>
                                        <th><div>Paid</div></th>
                                        <th><div>Status</div></th>
                                        <th><div>Date</div></th>
                                        <th><div>Options</div></th>
                                    </tr>
                                </thead>
                                <tbody>                   
                                    <?php
                                    $counter = 1;
                                    foreach ($fees_record as $row) {
                                        ?>
                                        <tr>
                                            <td><?php echo $counter++; ?></td>
                                            <td><?php echo $row->title; ?></td>
                                            <td>
                                                <?php echo $row->paid_amount; ?>
                                            </td>
                                            <td>Paid</td>
                                            <td><?php echo date('F d, Y h:m A', strtotime($row->paid_created_at)); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                        Action <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                        <!-- VIEWING LINK -->
                                                        <li>
                                                            <a href="<?php echo base_url('index.php?student/invoice/' . $row->student_fees_id); ?>" >

                                                                View Invoice
                                                            </a>
                                                        </li> 
                                                        <li>
                                                            <a href="<?php echo base_url('index.php?student/invoice_print/' . $row->student_fees_id); ?>" >

                                                                Download Invoice
                                                            </a>
                                                        </li> 
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!----TABLE LISTING ENDS--->

                    </div>
                </div>
            </div>


            <!-- Panel Widget --> 
        </div>
        <!-- col-sm-12--> 
    </div>
    <!-- row --> 
</div>