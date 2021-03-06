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
                        <?php echo ucwords("Add Batch");?>
                    </div>
                </div>
                <div class="panel-body"> 

<div class="box-content">  
  
                                <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>                             
<?php echo form_open(base_url() . 'index.php?admin/batch/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmassignment', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
<div class="padded">
        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("batch name");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="b_name" id="b_name"/>
                                            </div>
                                        </div>	
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("department");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="degree" name="degree[]" class="form-control" multiple>
                                                    <option value="default">Select department</option>
                                                        <?php foreach ($degree as $srow) { ?>
                                                        <option value="<?php echo $srow['d_id']; ?>"><?php echo $srow['d_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                </select>
                                            </div>	
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("branch");?><span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select id="course" name="course[]" class="form-control" multiple>
                                                                                                        
                                                </select>
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                            <div class="col-sm-5">
                                                <select name="batch_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>	
                                                </select>
                                                <lable class="error" id="error_lable_exist" style="color:red"></lable>
                                            	
                                            </div>
                                             
                                        </div>	
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <button type="submit" id="btnadd" class="btn btn-info vd_bg-green"><?php echo ucwords("Add "); ?></button>
        </div>
    </div>

</div>             
</form>               
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
    
      $( "#btnadd" ).click(function( event ) {
      
       if($("#degree").val()!=null & $("#course").val()!=null & $("#b_name").val()!=null )
          {
               $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/check_batch'; ?>",
                    dataType:'json',
                    async: false,
                   data:
                        {
                            'degree':$("#degree").val(),
                            'course':$("#course").val(),
                            'batch':$("#b_name").val(),
                        }, 
                                success:function(response){
                                    if(response.length == 0){
                                    $('#frmassignment').attr('validated',true);
                                    $('#frmassignment').submit();
                                     } else
                                         {
                                             $("#error_lable_exist").html('Record is already present in the system');
                                         return false;
                                     }
                    }
                });
                    return false; 
    }
       $('#frmassignment').submit();
        event.preventDefault();
      });

    

    $("#degree").change(function(){
                var degree = $(this).val();
                  if(degree!="default")
                  {
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url().'index.php?admin/get_cource_multiple/'; ?>",
                   data:
                        {
                            'degree':degree,
                        },                  
                    success:function(response){
                        $("#course").html(response);
                    }
                });
                }
        });
        
    $().ready(function () {
       
            $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Value must not equal arg.");

        $("#frmassignment").validate({
             rules: {
                    b_name: "required",
                    'degree[]': 
                            {
                                 valueNotEquals: "default",
                                 required:true,
                            },
                    'course[]': 
                    {
                         valueNotEquals: "default",
                         required:true,
                    },
                    batch_status: "required",
                },
            messages: {
                    b_name: "Enter batch name",
                    'degree[]': 
                            {
                                 valueNotEquals: "Select department",
                                 required:"Select department",
                            },
                    'course[]': 
                    {
                         valueNotEquals: "Select branch",
                         required:"Select branch",
                    },
                    batch_status: "Select status",
                }
        });


    });
</script>