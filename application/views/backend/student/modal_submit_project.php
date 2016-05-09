

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="entypo-plus-circled"></i>
                    Submit Project
                </div>
            </div>
            <div class="panel-body">
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">  

                        <?php echo form_open(base_url() . 'index.php?student/project/submit_project/', array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'edit_exam_center', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                        <div class="padded">
                            <input type="hidden" name="project_id" id="project_id" value="<?php echo $param2; ?>">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Project File</label>
                                <div class="col-sm-5">
                                 <input type="file" name="document_file" id="document_file" >
                                </div>
                            </div>	
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-5">
                                    <textarea id="comment" name="comment" ></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info vd_bg-green">Submit</button>
                                </div>
                            </div>

                        </div>  
                        </form>  
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
