<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					Notification list
                    	</a></li>
			<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					Add Notification
                    	</a></li>
		</ul>
    	<!------CONTROL TABS END------>       
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div>From</div></th>
                    		<th><div>Details</div></th>
                    		<th><div>Time Stamp</div></th>
                    		<th><div>Action</div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($notices as $row):?>
						<tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['notice_name'];?></td>
							<td class="span5"><?php echo $row['notice'];?></td>
							<td><?php echo date('h:i A d/m/Y',strtotime($row['create_timestamp']));?></td>
							 <!--<td>date('h:i A d/m/Y');
							<div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Action <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                    
                                    <!-- EDITING LINK 
                                    <li>
                                        <a href="#" onclick="showAjaxModal('<?php //echo base_url();?>index.php?modal/popup/modal_edit_notice/<?php //echo $row['notice_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php //echo get_phrase('edit');?>
                                            </a>
                                                    </li>
                                    <li class="divider"></li>
                                    
                                    <!-- DELETION LINK 
                                    <li>
                                        <a href="#" onclick="confirm_modal('<?php //echo base_url();?>index.php?admin/noticeboard/delete/<?php //echo $row['notice_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php //echo get_phrase('delete');?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
        					</td>-->
						<td>						
							   <a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/model_notice_view/<?php echo $row['notice_id'];?>');">
							<i class="entypo-eye"  <?php if($row['notice_read'] == 0){ ?>style="color:red"<?php } ?>></i>
						</a></td>	
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/notification/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>                           
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('notice');?></label>
                                <div class="col-sm-5">
                                    <div class="box closable-chat-box">
                                        <div class="box-content padded">
                                                <div class="chat-message-box">
                                                <textarea name="notice" id="ttt" rows="5" placeholder="<?php echo get_phrase('add_notice');?>" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="create_timestamp"/>
                                </div>
                            </div>-->

                            <!--<div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('send_sms_to_all');?></label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="check_sms">
                                        <option value="1"><?php echo get_phrase('yes');?></option>
                                        <option value="2"><?php echo get_phrase('no');?></option>
                                    </select>
                                    <br>
                                    <span class="badge badge-primary">
                                        <?php 
                                            if ($active_sms_service == 'clickatell')
                                                echo 'Clickatell ' . get_phrase('activated');
                                            if ($active_sms_service == 'twilio')
                                                echo 'Twilio ' . get_phrase('activated');
                                            if ($active_sms_service == '' || $active_sms_service == 'disabled')
                                                echo get_phrase('sms_service_not_activated');
                                        ?>
                                    </span>
                                </div>
                            </div>-->

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_notice');?></button>
                            </div>
						</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>