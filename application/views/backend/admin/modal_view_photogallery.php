<?php 
$edit_data		=	$this->db->get_where('photo_gallery' , array('gallery_id' => $param2) )->result_array();

foreach ( $edit_data as $row):

?>
<script type="text/javascript">
function removeimg(image , id , img )
{
    var datastring = "image="+image+"&id="+id;
    $.ajax({
        type:"POST",
        url:"<?php echo base_url().'index.php?media/removeimg'; ?>",
        data:datastring,
        success:function(response)
        {
            //alert("#"+img);
           $("#"+img).css({'display':'none'});

        }
        
        
    });
    
    return false;
    
}
</script>

    
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					 Photo Gallery
            	</div>
            </div>
			<div class="panel-body">
                            <div >
                                <h3><?php echo $row['gallery_title']; ?></h3>
                                <p><?php echo $row['gallery_desc']; ?></p>
                                
                            </div>
                            <div class="">
                                <img src="uploads/photogallery/<?php echo $row['main_img'] ?>" style='width:300px;margin:20px;' >
                            </div>
                            
				 <div class="">
                        <?php  if(!empty($row['gallery_img'])) { 
                            $images = explode(",",$row['gallery_img']);
                            for($i=0;$i<count($images);$i++)
                            {
                                $img = explode(".",$images[$i]);
                            ?>           
                                     <div class="gallery_img" id="<?php echo $img[0]; ?>">
                                         <a href="#" id="remove_gallery_img" data-toggle="tooltip" data-placement="top" class="removeimgbtn" onclick="removeimg('<?php echo $images[$i]; ?>','<?php echo $param2; ?>','<?php echo $img[0]; ?>')"  data-original-title="Remove Image"  ><i class="fa fa-times"></i></a>
                                         <img src="uploads/photogallery/<?php echo $images[$i]; ?>"  height="100" width="100"  ></div>
                            <?php } ?>
                                     
                        <?php } ?>
                                    
                                        
                                        
                                    
                                    
                                </div>
            </div>
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

        $().ready(function () {

            $("#frmgallery2").validate({
                rules: {
                    title:"required",                    
                    description: "required",
                    'galleryimg2[]':{
                        extension:'gif|jpg|png', 
                    }
                },
                messages: {
                    title: "Please enter title",
                    description: "Please enter description",                    
                    'galleryimg2[]':{
                         extension:'Upload valid file!',  
                    }
                         
                    
                },
            });
        });
    </script>
