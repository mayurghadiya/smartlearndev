<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Student Fees Payment</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <br/>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">Authorize.net Process Payment</div>
                        </div>
                        <div class="panel-body">
                            <form id="process_payment" class="form-horizontal form-groups-bordered validate" role="form" method="post" action="<?php echo base_url('index.php?student/authorize_net_make_payment'); ?>">

                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Card Number</label>
                                    <div class="col-md-4">
                                        <input type="text" id="card_number" class="form-control" name="card_number" required="">
                                        <p id="card_status_details" class="hidden-md hidden-sm hidden-xs hidden-lg"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Card Holder Name</label>
                                    <div class="col-md-4">
                                        <input type="text" id="card_holder_name" name="card_holder_name" class="form-control" parsley-trigger="change" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="example-email">Expiry Date</label>
                                    <div class="col-md-2">
                                        <select id="month" name="month" class="form-control" parsley-trigger="change" required>
                                            <option value="">Select month</option>
                                            <?php
                                            for ($i = 1; $i < 13; $i++)
                                                print("<option value=" . date('m', strtotime('01.' . $i . '.2001')) . ">" . date('M', strtotime('01.' . $i . '.2001')) . "(" . date('m', strtotime('01.' . $i . '.2001')) . ")</option>");
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select id="year" name="year" class="form-control" parsley-trigger="change" required>
                                            <option value="">Select Year</option>
                                            <?php
                                            $cur_year = date('Y');
                                            ?>
                                            <?php
                                            for ($i = $cur_year; $i <= 2050; $i++)
                                                print("<option val=" . $i . ">" . $i . "</option>");
                                            ?>
                                        </select>
                                    </div>	                                                
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="example-email">CVV</label>
                                    <div class="col-md-4">
                                        <input type="password" id="cvv" name="cvv" class="form-control" parsley-trigger="change" required>
                                    </div>
                                </div>
                                <div class="form-group">	 
                                    <label class="col-md-3 control-label"></label>                                               
                                    <div class="col-md-4">
                                        <input class="btn btn-success" value="Submit" type="submit"></input>
                                    </div>
                                </div>	                           
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Panel Widget --> 
        </div>
        <!-- col-sm-12--> 
    </div>
    <!-- row --> 
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

        $().ready(function () {
            $("#process_payment").validate({
                rules: {
                    card_number: "required",
                    card_holder_name: "required",
                    cvv: "required",
                    month: "required",
                    year: "required"
                },
                messages: {
                    card_number: "Please enter card number",
                    card_holder_name: "Please enter card holder name",
                    cvv: "Please enter cvv",
                    month: "Please select month",
                    year: "Please select year"
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#card_number').on('blur', function () {
                var card_number = $(this).val();
                if(card_number == '') {
                    $('#card_status_details').attr('class', 'hidden-xs hidden-sm hidden-md hidden-lg');
                }
                $.ajax({
                    url: '<?php echo base_url(); ?>index.php?student/verify_card_detail/' + card_number,
                    type: 'post',
                    success: function (content) {
                        var card_details = jQuery.parseJSON(content);
                        console.log(card_details.card_type);
                        if (card_details.status == 'false') {
                            $('#card_status_details').attr('class', 'visible-xs visible-sm	visible-md visible-lg error');
                            $('#card_status_details').html('Card: ' + card_details.card_type + '<br/>Invalid card number or details.');
                        } else if (card_details.status == 'true') {
                            $('#card_status_details').attr('class', 'visible-xs visible-sm	visible-md visible-lg warning');
                            $('#card_status_details').html('Card: ' + card_details.card_type);
                        }
                        //$('#card_status_details').attr('class', 'visible-xs visible-sm	visible-md visible-lg');
                        //$('#card_status_details').html('Card: ' + card_details.card_type);        				
                    }
                })
            })
        })
    </script>
