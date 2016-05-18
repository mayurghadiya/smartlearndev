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
                        <?php echo ucwords("Add Forum");?>
                    </div>
                </div>
                <div class="panel-body"> 

<div class="box-content">  
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                    </div>                                                                    
                                        <?php echo form_open(base_url() . 'forum/crud/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title<span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="forum_title" id="forum_title" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="forum_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>		
                                                </select>	

                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add forum</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div>                
                                </div>
                      </div>
            </div>
        </div>
</div>
    <script type="text/javascript">

    $().ready(function () {
        $("#frmadmission_type").validate({
            rules: {
                forum_title: "required",               
                forum_status: "required",
            },
            messages: {
                forum_title:
                        {
                            required: "Enter forum title",
                           
                        },
                forum_status: "Please select status",
            }
        });
    });
    </script>
