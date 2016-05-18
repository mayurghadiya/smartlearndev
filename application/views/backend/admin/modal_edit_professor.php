<?php
$professor = $this->db->get_where('professor', ['professor_id' => $param2])->row();
$degree_list = $this->db->get('degree')->result();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    <?php echo ucwords("add professor"); ?>
                </div>
            </div>
            <div class="panel-body"> 

                <div class="box-content"> 
                    <div class="">
                        <span style="color:red">* <?php echo "is " . ucwords("mandatory field"); ?></span> 
                    </div>                                    
                    <?php echo form_open(base_url() . 'index.php?admin/professor/update/' . $professor->professor_id, array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'professor-form', 'enctype' => 'multipart/form-data', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("professor name"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="professor-name" class="form-control" type="text" name="professor_name" required=""
                                       value="<?php echo $professor->name; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("email"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="email" class="form-control" type="email" name="email" required=""
                                       value="<?php echo $professor->email; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("password"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="password" class="form-control" type="password" name="password" required=""
                                       value="<?php echo $professor->real_pass; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("mobile"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="mobile" class="form-control" type="text" name="mobile" required=""
                                       value="<?php echo $professor->mobile; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("address"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <textarea id="address" class="form-control" name="address" required=""><?php echo $professor->address; ?></textarea>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("city"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="city" class="form-control" type="text" name="city" required=""
                                       value="<?php echo $professor->city; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("zip code"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="zip-code" class="form-control" type="text" name="zip_code" required=""
                                       value="<?php echo $professor->zip; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("date of birth"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="date-of-birth" class="form-control datepicker-normal" type="text" name="dob" required=""
                                       value="<?php echo $professor->dob; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("occupation"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="occupation" class="form-control" type="text" name="occupation" required=""
                                       value="<?php echo $professor->occupation; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("designation"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <input id="designation" class="form-control" type="text" name="designation" required=""
                                       value="<?php echo $professor->designation; ?>"/>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("department"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select id="degree" name="degree" class="form-control" required="">
                                    <option value="">Select</option>
                                    <?php foreach ($degree_list as $degree) { ?>
                                        <option value="<?php echo $degree->d_id; ?>"
                                                <?php if ($professor->department == $degree->d_id) echo 'selected'; ?>><?php echo $degree->d_name; ?></option>
                                            <?php } ?>
                                </select>
                            </div>	
                        </div>                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("branch"); ?><span style="color:red">*</span></label>
                            <div class="col-sm-5">
                                <select id="branch" name="branch" class="form-control" required="">
                                    <option value="">Select</option>                                   
                                </select>
                            </div>	
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("photo"); ?></label>
                            <div class="col-sm-5">
                                <input id="photo" class="form-control coverimage2" type="file" name="userfile" accept="image/*"/>
                            </div>	
                            <div id="image_container1"><img class='img-thumbnail' style='width:200px;margin-left:50px;' src='<?php echo base_url('uploads/professor/' . $professor->image_path) ?>' ></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo ucwords("about"); ?></label>
                            <div class="col-sm-5">
                                <textarea id="about" class="form-control" name="about"></textarea>
                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info vd_bg-green"><?php echo ucwords("add"); ?></button>
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

    $(document).ready(function () {

        $("#professor-form").validate({
            rules: {
            },
            messages: {
            },
        });

        $(".datepicker-normal").datepicker({
            dateFormat: 'dd M yy',
            changeMonth: true,
            changeYear: true,
            mixDate: new Date()
        });

        $('#branch').find('option').remove().end();
        var degree_id = $('#degree').val();
        $.ajax({
            url: '<?php echo base_url(); ?>admin/course_list_from_degree/' + degree_id,
            type: 'get',
            success: function (content) {
                var branch = jQuery.parseJSON(content);
                $('#branch').append('<option>Select</option>');
                $.each(branch, function (key, value) {
                    $('#branch').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                });
                $('#branch').val('<?php echo $professor->branch; ?>');
            }
        });

        //get branch from courses
        $('#degree').on('change', function () {
            $('#branch').find('option').remove().end();
            var degree_id = $(this).val();
            $.ajax({
                url: '<?php echo base_url(); ?>admin/course_list_from_degree/' + degree_id,
                type: 'get',
                success: function (content) {
                    var branch = jQuery.parseJSON(content);
                    $('#branch').append('<option>Select</option>');
                    $.each(branch, function (key, value) {
                        $('#branch').append('<option value=' + value.course_id + '>' + value.c_name + '</option>');
                    });
                }
            });
        });

    });
</script>

<script language="javascript" type="text/javascript">

    $(document).ready(function ($) {
        images = new Array();
        $(document).on('change', '.coverimage2', function () {
            files = this.files;

            $.each(files, function () {
                file = $(this)[0];
                if (!!file.type.match(/image.*/)) {
                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onloadend = function (e) {
                        img_src = e.target.result;
                        html = "<img class='img-thumbnail' style='width:300px;margin:20px;' src='" + img_src + "'>";
                        $('#image_container1').html(html);
                    };
                }
            });
        });
    });
</script>