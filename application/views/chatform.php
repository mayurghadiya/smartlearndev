<!--
| CHAT HEADER SECTION
-->
<h2 class="chat-header">
<?php  ?>
    <i class="fa fa-comment"></i> 
    <span class="btn btn-xs btn-<?php 

	echo $cur_user[0]['online']== 1 ? 'success' : 'danger'; ?>" id="current_status" style="display:none;"><?php echo $cur_user[0]['online']== 1 ? 'Online' : 'Offline'; ?></span>

    <a href="javascript:;" class="chat-form-close pull-right"><i class="fa fa-remove"></i></a>
    <span class="dropdown user-dropdown">
    <a href="javascript:;" class="pull-right chat-config" class="dropdown-toggle" style="display: none;" data-toggle="dropdown">
        <i class="fa fa-cog"></i>
    </a>
    
    </span>
</h2>
<!--
| CHAT CONTACTS LIST SECTION
-->
<div class="chat-inner" id="chat-inner" style="position:relative;">
<div class="chat-group">
 <strong>Friends</strong>
 <?php foreach ($users as $user) { 


// if($user->id != $cur_user[0]['id'] ){ 

if($user['online']=='1')
{
?> 
    <a href="javascript: void(0)" data-toggle="popover" >
    <div class="contact-wrap">
      <input type="hidden" value="<?php echo $user['std_id']; ?>" name="user_id" />
       <div class="contact-profile-img">
           <div class="profile-img">
            <?php  $avatar = $user['avatar'] != '' ? $user['avatar'] : 'no-image.jpg' ; ?>
            <img src="<?php if(file_exists(FCPATH.'uploads/student_image/'.$user['std_id'].'.jpg')){ echo base_url().'uploads/student_image/'.$user['std_id'].'.jpg'; }else{  echo base_url().'uploads/user.jpg'; } ?>" class="img-responsive">
           </div>
       </div>
       
       
        <span class="contact-name">
            <small class="user-name"><?php echo ucwords($user['std_first_name'].' '.$user['std_last_name']); ?></small>
            (<?php echo $user['std_roll']; ?>)
            <?php $admin_id = $this->session->userdata('admin_id');
			$count  =  $this->db->where('to', $admin_id)
							->where('from', $user['std_id'])							
							->where('is_read', '0')
							->where('rec_type', '1')
							->count_all_results('messages');
							?>
						 
							<?php
		if($count > 0){
			 ?>
           <script type="text/javascript">
		   var from = "<?php echo $user['std_id']; ?>";           
            $(".chat-group").find('span[rel="'+from+'"]').text('<?php echo $count; ?>');
            </script>
         <?php }else{ ?>
			<script type="text/javascript">
		   var from = "<?php echo $user['std_id']; ?>";           
            $(".chat-group").find('span[rel="'+from+'"]').text('');
            </script>
			<?php  } ?>
	
            <span class="badge progress-bar-danger notifyid" rel="<?php echo $user['std_id']; ?>">
			<?php //echo $user['unread']; 
			
		 
		
			
			?></span>
           
        </span>
        <span style="display: table-cell;vertical-align: middle;" class="user_status">
            <?php $status = $user['online'] == 1 ? 'is-online' : 'is-offline'; ?> 
            <span class="user-status <?php echo $status; ?>"></span>
        </span>
    </div>
    </a>
    
 <?php   }
 ?>
 
 <?php } ?>
 
 
 <a class="btn btn-primary " data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   <span class="menu-badge">
<span class="badge vd_bg-black-30">
<i class="fa fa-angle-down"/>
</span>
</span>
    Offline Students
  </a>
  
  <div class="collapse" id="collapseExample">

 <?php foreach ($users as $user) { 


// if($user->id != $cur_user[0]['id'] ){ 

if($user['online']=='0')
{
?> 
    <a href="javascript: void(0)" data-toggle="popover" >
    <div class="contact-wrap">
      <input type="hidden" value="<?php echo $user['std_id']; ?>" name="user_id" />
       <div class="contact-profile-img">
           <div class="profile-img">
            <?php  $avatar = $user['avatar'] != '' ? $user['avatar'] : 'no-image.jpg' ; ?>
            <img src="<?php if(file_exists(FCPATH.'uploads/student_image/'.$user['std_id'].'.jpg')){ echo base_url().'uploads/student_image/'.$user['std_id'].'.jpg'; }else{  echo base_url().'uploads/user.jpg'; } ?>" class="img-responsive">
           </div>
       </div>
        <span class="contact-name">
            <small class="user-name"><?php echo ucwords($user['std_first_name'].' '.$user['std_last_name']); ?></small>
            (<?php echo $user['std_roll']; ?>)
            <?php $admin_id = $this->session->userdata('admin_id');
			$count  =  $this->db->where('to', $admin_id)
							->where('from', $user['std_id'])							
							->where('is_read', '0')
							->where('rec_type', '1')
							->count_all_results('messages');
							?>
						 
							<?php
		if($count > 0){
			 ?>
           <script type="text/javascript">
		   var from = "<?php echo $user['std_id']; ?>";           
            $(".chat-group").find('span[rel="'+from+'"]').text('<?php echo $count; ?>');
            </script>
         <?php }else{ ?>
			<script type="text/javascript">
		   var from = "<?php echo $user['std_id']; ?>";           
            $(".chat-group").find('span[rel="'+from+'"]').text('');
            </script>
			<?php  } ?>
	
            <span class="badge progress-bar-danger notifyid" rel="<?php echo $user['std_id']; ?>">
			<?php //echo $user['unread']; 
			
		 
		
			
			?></span>
           
        </span>
        <span style="display: table-cell;vertical-align: middle;" class="user_status">
            <?php $status = $user['online'] == 1 ? 'is-online' : 'is-offline'; ?> 
            <span class="user-status <?php echo $status; ?>"></span>
        </span>
    </div>
    </a>
    
 <?php   } 
 ?>
 <?php } ?>
   
</div>
</div>
</div>
<!--
| CHAT CONTACT HOVER SECTION
-->
<div class="popover" id="popover-content">
    <div id="contact-image"></div>
    <div class="contact-user-info">
        <div id="contact-user-name"></div>
        <div id="contact-user-status" class="online-status"></div>
    </div>
</div>
<!--
| INDIVIDUAL CHAT SECTION
-->
<div id="chat-box" style="top: 400px">
<div class="chat-box-header">
    <a href="javascript: void(0);" class="chat-box-close pull-right">
        <i class="fa fa-remove"></i>
    </a>
    <span class="user-status is-online"></span>
    <span class="display-name"></span>
    <small></small>
</div>

<div class="chat-container" >
    <div class="chat-content">
        <input type="hidden" name="chat_buddy_id" id="chat_buddy_id"/>
        <ul class="chat-box-body"></ul>
    </div>
    <div class="chat-textarea">
        <input placeholder="Type your message" class="form-control" />
       
    </div>
    
</div>
</div>
