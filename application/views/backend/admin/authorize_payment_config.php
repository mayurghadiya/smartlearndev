<!-- Middle Content Start -->    
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_head-section clearfix">
                <div class="vd_panel-header">
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="pages-custom-product.html">Pages</a> </li>
                        <li class="active">Authorize.net Payment Gateway Config</li>
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
                    <h1>Authorize.net Payment Gateway Config</h1>
                </div>
            </div>
            <div class="vd_content-section clearfix">
                <div class="row">
                    <div class="col-sm-12">								
                        <!------CONTROL TABS START------>
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                                    Configuration
                                </a></li>
                            <li>
                        </ul>
                        <!------CONTROL TABS END------>

                        <div class="tab-content">
                            <!----TABLE LISTING STARTS-->
                            <div class="tab-pane box active" id="list">

                                <div class="panel-body">
                                    <form id="authorizenetconfig" class="form-horizontal form-groups-bordered validate" method="post" action="" 
                                          role="form">
                                              <?php
                                              foreach ($authorize_net as $config) {
                                                  
                                              }
                                              ?>
                                        <input type="hidden" name="config_id" value="<?php if (isset($config)) echo $config->id; ?>" />
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Login ID</label>
                                            <div class="col-md-5">
                                                <input type="text" id="login_id" class="form-control" name="login_id"
                                                       value="<?php if (isset($config)) echo $config->login_id; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Trasaction Key</label>
                                            <div class="col-md-5">
                                                <input type="text" id="transaction_key" name="transaction_key" class="form-control"
                                                       value="<?php if (isset($config)) echo $config->transaction_key; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Success Url</label>
                                            <div class="col-md-5">
                                                <input type="text" id="success_url" name="success_url" class="form-control"
                                                       value="<?php if (isset($config)) echo $config->success_url; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Failure Url</label>
                                            <div class="col-md-5">
                                                <input type="text" id="failure_url" name="failure_url" class="form-control"
                                                       value="<?php if (isset($config)) echo $config->failure_url; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Cancel Url</label>
                                            <div class="col-md-5">
                                                <input type="text" id="cancel_url" name="cancel_url" class="form-control"
                                                       value="<?php if (isset($config)) echo $config->cancel_url; ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="example-email">Status</label>
                                            <div class="col-md-5">
                                                <?php
                                                if (isset($config))
                                                    $status = $config->status;
                                                else
                                                    $status = 0;
                                                ?>
                                                <select class="form-control" name="status">
                                                    <option value="1"
                                                            <?php if ($status == 1) echo 'selected'; ?>>Enable</option>
                                                    <option value="0"
<?php if ($status == 0) echo 'selected'; ?>>Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info">Submit</button>
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
            $("#authorizenetconfig").validate({
                rules: {
                    login_id: "required",
                    transaction_key: "required",
                    success_url: "required",
                    failure_url: "required",
                    cancel_url: "required"
                },
                messages: {
                    login_id: "Please enter login id",
                    transaction_key: "Please enter transaction key",
                    success_url: "Please enter success url",
                    failure_url: "Please enter failure url",
                    cancel_url: "Please enter cancel url"
                }
            });
        });
    </script>