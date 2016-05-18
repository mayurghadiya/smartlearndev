
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Course Category");?>
                    </div>
                </div>
                <div class="panel-body"> 

<div class="box-content">     
                                <div class="">
                                   <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/category/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmcategory', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("category name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="category_name" id="category_name" value="" />
                                            </div>
                                                <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                                        </div>	
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("Status");?></label>
                                            <div class="col-sm-5">
                                                <select name="category_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>		
                                                </select>
                                            </div>	
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" id="btnadd"  class="btn btn-info vd_bg-green" ><?php echo ucwords("add");?></button>
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
    
  
    </script>
    
<script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

   
        $().ready(function () {
             
            $("#frmcategory").validate({
                rules: {                  
                     category_name: 
                        {
                            required:true,
                        },
                        category_status:"required",
                },
                messages: {
                    category_name:
                    {
                         required:"Enter category name",
                    },
                    category_status:"Select Status",
                }
            });
        });
        
    </script>