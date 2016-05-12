
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<style>    
    .select2-container-multi .select2-choices .select2-search-field input{
        padding: 0px;
    }
</style>

<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                         <li><a href="<?php echo base_url('index.php?admin/dashboard'); ?>"><?php echo ucwords("home");?></a> </li>
                         <li><?php echo ucwords("payment management");?></li>
                         <li><?php echo ucwords("make payment");?></li>
                    </ul> 
                    
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Make Payment</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Payment List
                                </a></li>                           
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th>Student Name</th>
                                                <th>Department</th>
                                                <th>Branch</th>
                                                <th>Batch</th>
                                                <th>Semester</th>
                                                <th>Paid Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter = 1; ?>
                                            <?php foreach ($student_fees as $row) { ?>
                                                <tr>
                                                    <td><?php echo $counter++; ?></td>
                                                    <td><?php echo $row->std_first_name . ' ' . $row->std_last_name; ?></td>
                                                    <td><?php echo $row->d_name; ?></td>
                                                    <td><?php echo $row->c_name; ?></td>
                                                    <td><?php echo $row->b_name; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>
                                                    <td><?php echo $row->paid_amount; ?></td>
                                                    <td><?php echo date('F d, Y', strtotime(strtotime($row->paid_created_at))); ?></td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                Action <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                                                <!-- VIEWING LINK -->
                                                                <li>
                                                                    <a target="_blank" href="<?php echo base_url('index.php?admin/invoice/' . $row->fees_structure_id); ?>" >

                                                                        View Invoice
                                                                    </a>
                                                                </li> 
                                                                <li>
                                                                    <a target="_blank" href="<?php echo base_url('index.php?admin/invoice_print/' . $row->student_fees_id); ?>" >

                                                                        Download Invoice
                                                                    </a>
                                                                </li> 
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </tfoot>
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

<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#example').DataTable();

        $("#example tfoot th").each(function (i) {
            var select = $('<select><option value=""></option></select>')
                    .appendTo($(this).empty())
                    .on('change', function () {
                        table.column(i)
                                .search($(this).val())
                                .draw();
                    });

            table.column(i).data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
            });
        });
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

        <a class="md-fab md-fab-success nav-fixed-a-tabs vd_bg-red"  onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/addpayment/');" href="#" id="navfixed" data-toggle="tab">
            <i class="material-icons">&#xE145;</i>
        </a>
    </div>