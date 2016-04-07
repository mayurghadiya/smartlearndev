<?php
$edit_data = $this->db->get_where('cms_manager', array('c_id' => $param2))->result_array();
foreach ($edit_data as $row) {
    
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Edit CMS Page
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  
                         <div class="">
                                    <span style="color:red">* is mandatory field</span> 
                                </div>  
                        <?php echo form_open(base_url() . 'index.php?admin/cms/do_update/' . $row['c_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'editcmsform', 'target' => '_top')); ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page Title<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <input type="text" class="form-control" name="c_title" value="<?php echo $row['c_title']; ?>" id="c_title" required />
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page Slug<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <input type="text" class="form-control" required="" name="c_slug" value="<?php echo $row['c_slug']; ?>" id="c_slug"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="c_status">
                                    <option value="1" <?php
                                    if ($row['c_status'] == '1') {
                                        echo "selected";
                                    }
                                    ?>>Active</option>
                                    <option value="0" <?php
                                    if ($row['c_status'] == '0') {
                                        echo "selected";
                                    }
                                    ?>>Inactive</option>        
                                </select>	
                            </div>
                        </div>	
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page Content<span style="color:red">*</span></label>
                            <div class="col-sm-10 controls">
                                <textarea id="edit_content_data" required="" name="edit_content_data"  class="ckeditor" data-rel="ckeditor"  rows="3" ><?php echo $row['c_description']; ?></textarea>
                            </div>
                        </div>             
                        <div class="form-group form-actions">
                            <div class="col-sm-2"> </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn vd_btn vd_bg-green vd_white submit"><i class="icon-ok"></i> Edit</button>
                            </div>
                        </div>
                        </form>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>



<!-- Specific Page Scripts Put Here -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="<?= $this->config->item('js_path') ?>jquery.validate.min.js"></script>

<!-- Specific Page Scripts END -->
<!-- Specific Page Scripts END -->
<script type="text/javascript">
    $(window).ready(function ()
    {
        //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
        //$('.ckeditor').ckeditor();                                                                
    })
</script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        //CKEDITOR.replace( $('[data-rel^="ckeditor"]') );
        $('#edit_content_data').ckeditor();
        $('.submit').on('click', function () {
            for (instance in CKEDITOR.instances)
                CKEDITOR.instances[instance].updateElement();
            //$('#edit_cms_page').submit();
        });

    })
</script>

<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });

    $().ready(function () {
        $("#editcmsform").validate({
            ignore: [],
            rules: {
                content_data: {
                    required: function () {
                        CKEDITOR.instances.edit_content_data.updateElement();
                    }
                },
                c_title: "required",
                c_slug: "required",
                edit_content_data: "required",
            },
            messages: {
                c_title: "Please enter title",
                c_slug: "Please select slug",
                edit_content_data: "Please enter Page Content",
            }
        });
    });
</script>
