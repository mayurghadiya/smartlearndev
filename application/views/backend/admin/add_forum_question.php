  <?php 
  
  ?>
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <i class="entypo-plus-circled"></i>
                        <?php echo ucwords("Add Forum Topic");?>
                    </div>
                </div>
                <div class="panel-body"> 

<div class="box-content">  
                                    <div class="">
                                        <span style="color:red">* <?php echo "is ".ucwords("mandatory field");?></span> 
                                    </div>                                                                    
                                        <?php echo form_open(base_url() . 'forum/questioncrud/create', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmadmission_type', 'target' => '_top')); ?>
                                    <div class="padded">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Forum <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="forum_id">
                                                    <option value="">Select Forum</option>
                                                    <?php foreach($forum  as $form): ?>
                                                    <option value="<?php  echo $form['forum_id']; ?>"><?php  echo $form['forum_title']; ?></option>
                                                    <?php endforeach; ?>                                                    
                                                </select>	

                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Forum Topic <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="forum_topic_id">
                                                    <option value="">Select Forum</option>
                                                    <?php foreach($forum_topic  as $form_topic): ?>
                                                    <option value="<?php  echo $form_topic['forum_topic_id']; ?>"><?php  echo $form['forum_topic_title']; ?></option>
                                                    <?php endforeach; ?>                                                    
                                                </select>	
                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Question <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="question" id="question" />
                                            </div>
                                        </div>												
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Status <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <select name="question_status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>		
                                                </select>	

                                            </div>	
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Add forum Topic</button>
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
                forum_id:"required",
                forum_topic_id:"required",
                question: "required",               
                question_status: "required",
            },
            messages: {
                forum_id:"Select forum",
                forum_topic_id:"Select forum topic",
                question:
                        {
                            required: "Enter question",
                           
                        },
                question_status: "Please select status",
            }
        });
    });
    </script>
