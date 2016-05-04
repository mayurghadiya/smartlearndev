  <?php 
   $degree = $this->db->get('degree')->result_array();
        $courses = $this->db->get('course')->result_array();
        $semesters = $this->db->get('semester')->result_array();?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Cms");?>
                    </div>
                </div>
                <div class="panel-body"> 

                    <div class="box-content">
 <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>                                      
<?php echo form_open(base_url() . 'index.php?admin/cms/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'cmsform', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Page Name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="c_title" id="c_title" required="" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Page Slug");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" required="" name="c_slug" id="c_slug"/>
                                            </div>
                                        </div>
                                        <div class="form-group" id="ck-editor">					
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Page Content");?><span style="color:red">*</span></label>
                                            <div class="col-sm-7">		
                                                <textarea name="c_description" required="" class="ckeditor" data-rel="ckeditor" rows="3" required></textarea>
                                            </div>														
                                        </div> 
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Status");?></label>
                                            <div class="col-sm-5">
                                                <select name="c_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>		
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("Add");?></button>
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
<script type="text/javascript">
         $.validator.setDefaults({
                submitHandler: function (form) {
                form.submit();
                }
         });
$().ready(function () {
        $("#cmsform").validate({
        ignore: [],
        rules: {
        content_data: {
        required: function () {
        CKEDITOR.instances.content_data.updateElement();
        }
        },
        c_title: "required",
        c_slug: "required",
        c_description: "required",
        },
        messages: {
         c_title: "Please enter title",
        c_slug: "Please select slug",
         c_description: "Please enter page content",
          }
         });
 });
    </script>