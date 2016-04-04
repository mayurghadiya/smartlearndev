<div class="vd_content-wrapper" style="min-height: 8px;">
    <div class="vd_head-section clearfix"></div>
    <!--<hr/>-->
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1><?php echo $page_title; ?></h1>
        </div>
    </div>
    <div class="vd_banner vd_bg-white clearfix pd-20">
        <div class="container">
            <div class="vd_content clearfix">
                <div class="row">  
                   <?php echo form_open(base_url() . 'index.php?student/change_password/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmchangepassword', 'target' => '_top', "enctype" => "multipart/form-data")); ?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Current Password<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="current_password" id="current_password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">New Password<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="new_password" id="new_password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password<span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Change Password</button>
                                </div>
                            </div>
                        </div>	
                </div>
            </div>
        </div>
    </div>
</div>

 <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.js"></script>
    <script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>
    <script type="text/javascript">

    $("#frmchangepassword").validate({
        rules: {
            current_password:
                {
                    required: true,
                },
            new_password:
                {
                   required: true,
                },
            confirm_password:
                {
                   required: true,
                },
        },
        messages: {
            current_password:
                {
                    required: "Enter current password",
                },
                new_password:
                {
                    required: "Enter new password",
                },
                confirm_password:
                {
                   required: "Enter confirm password",
                },
        }
    });
    </script>
