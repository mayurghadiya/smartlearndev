
<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="#"><?php echo ucwords("home"); ?></a> </li>
                        <li><a href="#"><?php echo ucwords("pages"); ?></a> </li>
                        <li class="active"><?php echo ucwords("charity fund"); ?></li>
                    </ul>                  
                </div>
            </div>
            <div class="vd_title-section clearfix">
                <div class="vd_panel-header no-subtitle">
                    <h1><?php echo ucwords("charity fund"); ?></h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    <?php echo ucwords(" charity fund list"); ?>
                                </a></li>
                            <li>
                                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                                    <?php echo ucwords("add charity fund"); ?> 
                                </a></li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-responsive" id="data-tables">
                                        <thead>
                                            <tr>
                                                <th><div>#</div></th>
                                                <th><?php echo ucwords("course name"); ?></th>
                                                <th><?php echo ucwords("status"); ?></th>
                                                <th><?php echo ucwords("action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>						
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!----TABLE LISTING ENDS--->


                            <!----CREATION FORM STARTS---->
                            <div class="tab-pane box" id="add" style="padding: 5px">
                                <div class="box-content">     
                                    <div class="">
                                        <span style="color:red">* <?php echo ucwords("is mandatory field"); ?></span> 
                                    </div>                                    
                                    <?php echo form_open(base_url() . 'index.php?admin/charity_fund/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'chartiyfund', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("donor name"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="donor_name" id="donor_name"/>
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("donor mobile"); ?></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="donor_mobile"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("donor email"); ?></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="donor_email"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("amount"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="amount"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("donation method"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="donation_type" id="donation_type">
                                                    <option value="">Select</option>
                                                    <option value="cheque">Cheque</option>
                                                    <option value="dd">DD</option>
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group cheque-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("cheque nomber"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control cheque-details-fields" name="cheque_cheque_number"/>
                                            </div>	
                                        </div>                                        
                                        <div class="form-group cheque-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("account number"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control cheque-details-fields" name="cheque_account_number"/>
                                            </div>	
                                        </div>
                                        <div class="form-group cheque-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("account holder name"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control cheque-details-fields" name="cheque_account_holder_name"/>
                                            </div>	
                                        </div>
                                        <div class="form-group cheque-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("branch code"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control cheque-details-fields" name="cheque_branch_code"/>
                                            </div>	
                                        </div>
                                        <div class="form-group cheque-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("bank name"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control cheque-details-fields" name="cheque_bank_name"/>
                                            </div>	
                                        </div>
                                        <div class="form-group dd-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("account number"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control dd-details-fields" name="dd_account_number"/>
                                            </div>	
                                        </div>
                                        <div class="form-group dd-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("account holder name"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control dd-details-fields" name="dd_account_holder_name"/>
                                            </div>	
                                        </div>
                                        <div class="form-group dd-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("branch code"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control dd-details-fields" name="dd_branch_code"/>
                                            </div>	
                                        </div>
                                        <div class="form-group dd-details hidden">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("bank name"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control dd-details-fields" name="dd_bank_name"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("date"); ?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input class="form-control datepicker-normal" readonly="" required="" type="text" name="date"/>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("description"); ?></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"></textarea>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green" ><?php echo ucwords("add"); ?></button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                                <!----CREATION FORM ENDS-->
                            </div>
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

            $("#chartiyfund").validate({
                rules: {
                    donor_name: "required",
                    amount: "required",
                    donation_type: "required"
                },
                messages: {
                    donor_name: "Please enter donor name",
                    amount: "Please enter amount",
                    donation_type: "Please select donation type"
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#donation_type').on('change', function () {
                var donation_type = $(this).val();
                if (donation_type) {
                    show_hide_information(donation_type);
                } else {
                    hide_cheque_details();
                    hide_dd_details();
                }
            });

            function show_hide_information(donation_type) {
                if (donation_type == 'cheque') {
                    hide_dd_details();
                    show_cheque_details();
                } else if (donation_type == 'dd') {
                    hide_cheque_details();
                    show_dd_details();

                }
            }

            function show_cheque_details() {
                $('.cheque-details').attr('class', 'form-group cheque-details');
                $('.cheque-details-fields').attr('required', 'required');
            }

            function hide_cheque_details() {
                $('.cheque-details').attr('class', 'form-group cheque-details hidden');
                $('.cheque-details-fields').removeAttr('required');
            }

            function show_dd_details() {
                $('.dd-details').attr('class', 'form-group dd-details');
                $('.dd-details-fields').attr('required', 'required');
            }

            function hide_dd_details() {
                $('.dd-details').attr('class', 'form-group dd-details hidden');
                $('.dd-details-fields').removeAttr('required');
            }
        });

        $(window).load(function () {
            $('.datepicker-normal').datepicker({
               dateFormat: 'dd M yy',
                changeMonth: true,
                changeYear: true,
                minDate: new Date(), 
            });
        })
    </script>