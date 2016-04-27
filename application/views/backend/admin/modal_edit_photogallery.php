<?php 
$edit_data		=	$this->db->get_where('photo_gallery' , array('gallery_id' => $param2) )->result_array();

foreach ( $edit_data as $row):

?>


    <script language="javascript" type="text/javascript">
        $(function () {
            $("#fileupload2").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#dvPreview3");
                    dvPreview.html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("style", "height:100px;width: 100px");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });
        
        $(document).ready(function($){
	images = new Array();
	$(document).on('change','.coverimage2',function(){
		 files = this.files;
               
		 $.each( files, function(){
			 file = $(this)[0];
			 if (!!file.type.match(/image.*/)) {
	        	 var reader = new FileReader();
	             reader.readAsDataURL(file);
	             reader.onloadend = function(e) {
	            	img_src = e.target.result; 
	            	html = "<img class='img-thumbnail' style='width:300px;margin:20px;' src='"+img_src+"'>";
	            	$('#image_container1').html( html );
	             };
        	 } 
		});
	});
});
    </script>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					 Update Photo Gallery
            	</div>
            </div>
			<div class="panel-body">
				 <div class="">
                                    <span style="color:red">* Is Mandatory Field</span> 
                                    
                                                                    
<?php echo form_open(base_url() . 'index.php?media/photogallery/do_update/'.$row['gallery_id'], array('class' => 'form-horizontal form-groups-bordered validate', 'role' => 'form', 'id' => 'frmgallery2', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                                    <div class="padded">											
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Title <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="title" value="<?php echo $row['gallery_title']; ?>" id="title" />
                                            </div>
                                        </div>
                               

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Description <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <textarea class="form-control" name="description" id="description"><?php echo $row['gallery_desc']; ?></textarea>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-sm-3 control-label">Main Image <span style="color:red">*</span></label>
                                            <div class="col-sm-5">
                                                <input id="main_img" class="form-control coverimage2" type="file" name="main_img" />
                                            </div>
                                            <div id="image_container1"><img class='img-thumbnail' style='width:300px;margin:20px;' src='<?php echo "uploads/photogallery/".$row['main_img']; ?>' ></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">File Upload <span style="color:red"></span></label>
                                            <div class="col-sm-5">
                                                <input id="fileupload2" class="form-control" type="file" name="galleryimg2[]" multiple="multiple" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                    <label class="col-sm-3 control-label">Status <span style="color:red"> *</span></label>
                                                    <div class="col-sm-5">
                                                        <select name="status" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="1" <?php if($row['gal_status']=="1"){ echo "selected=selected"; } ?>>Active</option>
                                                            <option value="0" <?php if($row['gal_status']=="0"){ echo "selected=selected"; } ?>>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-5">
                                                <button type="submit" class="btn btn-info vd_bg-green">Update Photo Gallery</button>
                                            </div>
                                        </div>
                                        </form>               
                                    </div> 
                                    <div id="dvPreview3">
                                  </div>
                                     <div id="dvPreview2">
                                         <?php 
                                         $galleryimg = explode(",",$row['gallery_img']);
                                         for($i=0;$i<count($galleryimg);$i++){ ?>
                                         <img src="uploads/photogallery/<?php echo $galleryimg[$i]; ?>" height="100" width="100" />
                                         <?php } ?>
                                  </div>
                                    
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
                    main_img:{
                        extension:'gif|jpg|png|jpeg', 
                    },
                    status:"required",
                    'galleryimg2[]':{
                        extension:'gif|jpg|png|jpeg', 
                    }
                },
                messages: {
                    title: "Please enter title",
                    description: "Please enter description",                    
                    main_img:{
                        extension:'Upload valid file!',  
                    },
                    status:"Select Status",
                    'galleryimg2[]':{
                         extension:'Upload valid file!',  
                    }
                         
                    
                },
            });
        });
    </script>
