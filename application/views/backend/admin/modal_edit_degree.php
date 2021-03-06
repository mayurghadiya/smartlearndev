<?php
$edit_data = $this->db->get_where('degree', array('d_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                       <?php echo ucwords(" Update department");?>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-pane box" id="add" style="padding: 5px">
                        <div class="box-content">  
                             <div class="">
                                    <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                </div>
                            <?php echo form_open(base_url() . 'index.php?admin/degree/do_update/' . $row['d_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'id' => 'degreeformedit', 'target' => '_top')); ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("department name");?><span style="color:red">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="d_name" id="d_name" value="<?php echo $row['d_name']; ?>"   />
                                </div>
                                  <lable class="error" id="error_lable_exist" style="color:#f85d2c"></lable>
                            </div>                   
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo ucwords("status");?></label>
                                <div class="col-sm-5">
                                    <select name="degree_status">
                                        <option value="1" <?php if ($row['d_status'] == '1') {
                            echo "selected";
                        } ?>>Active</option>
                                        <option value="0" <?php if ($row['d_status'] == '0') {
                            echo "selected";
                        } ?>>Inactive</option>		
                                    </select>
                                </div>	
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" id="btnupd" class="submit btn btn-info vd_bg-green"><?php echo ucwords("update");?></button>
                                </div>
                            </div>
                            </form>
                        </div> </div> </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>
<script type="text/javascript">
    $.validator.setDefaults({
        submitHandler: function (form) {
            form.submit();
        }
    });
    $("#btnupd").click(function (event) {
        if ($("#d_name").val() != null)
        {   
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'index.php?admin/check_duplicate_department/'.$param2; ?>",
                dataType: 'json',
                async: false,
                data:
                        {
                            'd_name': $("#d_name").val()
                        },
                success: function (response) {

                   
                    if (response.length == 0) {
                        $("#error_lable_exist").html('');
                        $('#degreeformedit').attr('validated', true);
                        $('#degreeformedit').submit();
                    } else
                    {                         
                        $("#error_lable_exist").html('Record is already present in the system');
                        return false;
                    }
                }
            });
            return false;
        }
        event.preventDefault();

    });

    $().ready(function () {
        $("#degreeformedit").validate({
            rules: {
                d_name: "required",
                degree_status: "required",
            },
            messages: {
                d_name: "Enter department name",
                degree_status: "Select status",
            }
        });
    });
</script>

