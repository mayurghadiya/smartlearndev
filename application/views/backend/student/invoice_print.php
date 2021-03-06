<?php
@require_once 'includes/includes_top.php';
?>
<!-- Middle Content Start -->

<div class="vd_content clearfix">

    <div class="vd_content-section clearfix">
        <div class="row">
            <div class="col-sm-10">
                <div class="panel widget light-widget">
                    <div class="panel-body" style="padding:40px;">
                        <div class="pull-right text-right">
                            <h3 class="font-semibold mgbt-xs-20">INVOICE</h3>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Invoice No.</th>
                                    <th>Date</th>
                                </tr>
                                <tr>
                                    <td><?php echo 'INV-' . date('dmYhis', strtotime($invoice->paid_created_at)); ?></td>
                                    <td><?php echo date('d-M-Y', strtotime($invoice->paid_created_at)); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="mgbt-xs-20"><img alt="logo" src="<?php echo base_url(); ?>assets/img/logo.png" /></div>
                        <address>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890<br />
                            <br />
                            info@venmond.com
                        </address>
                        <hr/>
                        <br/>
                        <div class="pd-25">
                            <div class="row">
                                <div class="col-xs-3">
                                    <address>
                                        <strong>Bill To:</strong><br>
                                        <?php echo $invoice->std_first_name . ' ' . $invoice->std_last_name; ?><br>
                                        <?php echo $invoice->email; ?><br>
                                        <?php echo $invoice->std_mobile; ?>
                                    </address>
                                </div>
                                <div class="col-xs-4">
                                    <address>
                                        <strong>Bill To:</strong><br>
                                        <?php echo $invoice->std_first_name . ' ' . $invoice->std_last_name; ?><br>
                                        <?php echo $invoice->email; ?><br>
                                        <?php echo $invoice->std_mobile; ?>
                                    </address>
                                </div>
                                <div class="col-xs-2">
                                    <address>
                                        <strong>Invoice Date:</strong><br>
                                        <?php echo date('d-M-Y', strtotime($invoice->paid_created_at)); ?>
                                    </address>
                                </div>
                                <div class="col-xs-3">
                                    <div class="text-right">
                                        <strong>Due Balance(After Invoice):</strong><br>
                                        <span class="mgtp-5 vd_red font-md">$<?php echo $due_amount; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:20px;">SR</th>
                                    <th>TITLE</th>
                                    <th>TOTAL PRICE</th>
                                    <th>PREVIOUS TOTAL PAID</th>
                                    <th class="text-right" style="width:120px;">CURRENT PAY</th>
                                    <th class="text-right" style="width:120px;">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>                                               
                                <tr>
                                    <td class="text-center">1</td>
                                    <td><?php echo $invoice->title; ?></td>
                                    <td>$<?php echo $invoice->total_fee; ?></td>
                                    <td class="text-left">$<?php echo $total_paid - $invoice->paid_amount; ?></td>
                                    <td class="text-left">$<?php echo $invoice->paid_amount; ?></td>
                                    <td class="text-right">$<?php echo $invoice->paid_amount; ?></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" rowspan="3" class="bdr">Note:
                                        <p class="font-normal"></p></th>
                                    <th class="text-right pd-10">Sub Total</th>
                                    <th class="text-right pd-10">$<?php echo $invoice->paid_amount; ?></th>
                                </tr>
                                <tr>
                                    <th class="text-right  pd-10 no-bd">Discount</th>
                                    <th class="text-right  pd-10 vd_red no-bd">($0)</th>
                                </tr>
                                <tr>
                                    <th class="text-right  pd-10 no-bd">Shipping Cost</th>
                                    <th class="text-right  pd-10 no-bd">$0</th>
                                </tr>
                                <tr>
                                    <th colspan="4">Thank you for your business.</th>
                                    <th class="text-right  pd-10">Total</th>
                                    <th class="text-right  pd-10 "><span class="vd_green font-sm font-normal">$<?php echo $invoice->paid_amount; ?></span></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- panel-body --> 

                </div>
                <!-- Panel Widget --> 
            </div>
        </div>
        <!-- row --> 

    </div>
    <!-- .vd_content-section --> 

</div>
<!-- .vd_content --> 

<!-- Middle Content End --> 

<?php
@require_once 'includes/footer.php';
?>
