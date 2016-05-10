
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add class");?>
                    </div>
                </div>
                <div class="panel-body"> 

<div class="box-content">     
                                <div class="">
                                   <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                               </div>                                    
<?php echo form_open(base_url() . 'index.php?admin/division/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmclass', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("class name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="class_name" id="class_name"/>
                                            </div>
                                        </div>												
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green" ><?php echo ucwords("add");?></button>
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
        $.validator.setDefaults({
            submitHandler: function (form) {
                form.submit();
            }
        });

   
        $().ready(function () {
             
            $("#frmclass").validate({
                rules: {                  
                     class_name: 
                        {
                            required:true,
//                            remote: {
//                              url: "<?php echo base_url().'index.php?admin/check_degree'; ?>",
//                              type: "post",
//                              data: {
//                                course: function() {
//                                  return $( "#d_name" ).val();
//                                },
//                              }
//                            }
                        },
                },
                messages: {
                    class_name:
                    {
                         required:"Enter class name",
                    },
                }
            });
        });
    </script>