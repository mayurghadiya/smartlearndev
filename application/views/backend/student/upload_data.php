<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                            <h1><?php echo $page_title ?></h1>            
                        </div>
                    </div>
                    <div class="vd_content-section clearfix">

                        <div class="row">
                            <div class="col-sm-12">	
                                <div class="">
                            <span style="color:red">* is mandatory field</span> 
                        </div>  
                                 <?php echo form_open(base_url() . 'index.php?student/uploads/', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmproject', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                        <div class="padded">											
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Upload <span style="color:red">* </span> </label>
                                                <div class="col-sm-5">
                                                    <input type="file" name="fileupload" />
                                                </div>
                                                 
                                            </div>
                                           
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-5">
                                                    <button type="submit" class="btn vd_bg-green">Upload File</button>
                                                </div>
                                            </div>
                                            </form>               
                                        </div>  
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
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {

        jQuery.validator.addMethod("character", function (value, element) {
            return this.optional(element) || /^[A-z]+$/.test(value);
        }, 'Please enter a valid character');

        $("#frmproject").validate({
            rules: {
               
                fileupload: { required:true,
                extension:"gif|jpg|png|jpeg|pdf|xlsx|xls|doc|docx|ppt|pptx|pdf|txt",  
                }
            },
            messages: {
               
                fileupload:{
                    required: "Please browse file.",
                    extension:"Please upload valid file"
                    
                }
            }
        });
    });
</script>