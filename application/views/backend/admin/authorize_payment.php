<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Authorize.net Payment Process</li>
                    </ul>
                    <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
                        <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
                        <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
                        <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
                    </div>
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1>Authorize.net Payment Process</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Authorize.net Payment Process
                                </a></li>
                            <li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body">
                                    <form id="process_payment" class="form-horizontal form-groups-bordered validate" role="form" method="post" action="<?php echo base_url('index.php?admin/authorize_net_make_payment'); ?>">                                    


                                        <input type="hidden" name="amount" value="<?php echo $this->session->userdata('payment_data')['fees']; ?>" />
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
                                                <input type="password" id="cvv" name="cvv" class="form-control" parsley-trigger="change" maxlength="3" required>
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
                            <!----TABLE LISTING ENDS--->

                        </div>
                    </div>
                </div>
            </div>              
        </div>
        <!-- row --> 
    </div>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
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
                    url: '<?php echo base_url(); ?>index.php?admin/verify_card_detail/' + card_number,
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