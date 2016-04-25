	<style>
		* {font-family: sans-serif;} 
		
		
	</style>

  
 
  <script type="text/javascript" src="assets/gal2/third.party/jquery-1.7.1.min.js"></script>
 
	<link href="assets/gal2/css/nanogallery.css" rel="stylesheet" type="text/css">

	<link href="assets/gal2/css/themes/clean/nanogallery_clean.css" rel="stylesheet" type="text/css">

	<link href="assets/gal2/css/themes/light/nanogallery_light.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="assets/gal2/jquery.nanogallery.js"></script>

	<script type="text/javascript" src="assets/gal2/jquery.nanogallerydemo.js"></script> 
	<script>
		$(document).ready(function () {
			var myColorScheme = {
				navigationbar : {
					background : '#000',
					border : '0px dotted #555',
					color : '#ccc',
					colorHover:'#fff'
				},
				thumbnail : {
					background:'#000',
					border:'1px solid #000',
					labelBackground:'transparent',
					labelOpacity:'0.8',
					titleColor:'#fff',
					descriptionColor:'#eee'
				}
			};
			var myColorSchemeViewer = {
				background:'rgba(1, 1, 1, 0.75)',
				imageBorder:'12px solid #f8f8f8',
				imageBoxShadow:'#888 0px 0px 20px',
				barBackground:'#222',
				barBorder:'2px solid #111',
				barColor:'#eee',
				barDescriptionColor:'#aaa'
			};

      // custom thumbnail hover effect
      function myThumbnailInit($elt, item) {
      }
      function myThumbnailHoverInit($elt, item, data) {
        //$elt.find('.labelDescription').css({'opacity':'0'});

        var $subCon=$elt.find('.subcontainer');
        var th=$elt.outerHeight(true);
        var $iC=$elt.find('.imgContainer');
        var w=$iC.outerWidth(true)/10;
        var h=$iC.outerHeight(true);
        for(var c=0; c<10; c++ ) {
          var s='rect(0px, '+w*(c+1)+'px, '+h+'px, '+w*c+'px)';
          //var $t=$lI.clone().appendTo($subCon).css({'bottom':-(h+c*4), 'clip':s});
          $iC.clone().appendTo($elt.find('.subcontainer')).css({'bottom':0, 'scale':1, 'clip':s, 'left':0, 'position':'absolute'});
          //$t.css({'top':c*2});
        }
        $iC.remove();
      }
      
      function myThumbnailHover($elt, item, data) {
        //$elt.find('.labelDescription').delay(150)[data.animationEngine]({'opacity':'1'},400);
        //$elt.find('.labelDescription').delay(150).animate({'opacity':'1'},400);
        var w=$elt.find('.imgContainer').outerWidth(true)/10;
        $elt.find('.imgContainer').each(function( index ) {
          $(this)[data.animationEngine]({ 'left':(-w*10)+w*index*3, 'scale':2},20000);
          console.log( index*w + ' ' + index+ '-'+w );
        });
      }
      function myThumbnailHoverOut($elt, item, data) {
        //$elt.find('.labelDescription').animate({'opacity':'0'},300);
        var h=$elt.find('.labelImage').outerHeight(true);
        var w=$elt.find('.labelImage').outerWidth(true)/10;
        $elt.find('.labelImage').each(function( index ) {
          $(this)[data.animationEngine]({'bottom':-(h+index*4)});
        });
      }
      
      // custom info button on viewer toolbar
      function myViewerInfo(item, data) {
        alert('Image URL: '+ item.thumbsrc);
      }

			jQuery("#nanoGallery1").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
			items: [
				{
					src: 'assets/gal2/demonstration/image_01.jpg',		// image url
					srct: 'assets/gal2/demonstration/image_01t.jpg',	// thumbnail url
					title: 'image 1', 						        // thumbnail title
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					title_FR: 'image 1 (fr)',
					description_FR : 'description image 1 (fr)'
				},
				{
					src: 'assets/gal2/demonstration/image_02.jpg',
					srct: 'assets/gal2/demonstration/image_02t.jpg',
					title: 'image 2' ,
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
					title_FR: 'image 2 (fr)',
					description_FR : 'description image 2 (fr)'
				},
				{
					src: 'assets/gal2/demonstration/image_03.jpg',
					srct: 'assets/gal2/demonstration/image_03t.jpg',
					title: 'image 3' ,
					
					title_FR: 'image 3 (fr)',
					description_FR : 'description image 3 (fr)'
				}
				],
				thumbnailHoverEffect:[{name:'imageScaleIn80'},{'name':'descriptionAppear','delay':300},{'name':'borderLighter'}],				
				thumbnailLabel:{display:true,position:'overImageOnBottom'},
        viewerDisplayLogo:true,
        theme:'light',
        fnViewerInfo:myViewerInfo
			});


      var contentGallery1a=[
				{
					src: 'assets/gal2/demonstration/image_01.jpg',		// image url
					srct: 'assets/gal2/demonstration/image_01ts.jpg',	// thumbnail url
					title: 'image 1' 						          // thumbnail title
				},
				{
					src: 'assets/gal2/demonstration/image_02.jpg',
					srct: 'assets/gal2/demonstration/image_02ts.jpg',
					title: 'image 2'
				},
				{
					src: 'assets/gal2/demonstration/image_03.jpg',
					srct: 'assets/gal2/demonstration/image_03ts.jpg',
					title: 'image 3'
				}];
			
			jQuery("#nanoGallery1a").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
				items:contentGallery1a,
				theme:'clean',
				thumbnailHoverEffect:{'name':'imageFlipHorizontal','duration':500},
				useTags:false,
        viewerDisplayLogo:true,
        theme:'clean',
        i18n:{'thumbnailImageDescription':'View Photo', 'thumbnailAlbumDescription':'Open Album'},
				thumbnailLabel:{display:true,position:'overImageOnMiddle', align:'center'},
        colorSchemeViewer:'default'
			});


 			jQuery("#nanoGallery2").nanoGallery({thumbnailWidth:160,thumbnailHeight:160,
				itemsBaseURL:'demonstration',
				thumbnailHoverEffect:[{'name':'scaleLabelOverImage','duration':300},{'name':'borderLighter'}],				
				colorScheme:'clean',
				thumbnailLabel:{display:true,position:'overImageOnTop', align:'center'},
        viewerDisplayLogo:true
			});

      
      // ##################################################################################################################
			// ##### Sample3 - Picasa/Google+ #####
      // ##################################################################################################################
			jQuery("#nanoGallery3").nanoGallery({
        //thumbnailWidth:'auto', thumbnailHeight:200,

        thumbnailL1Width:'140C XS100 SM100', thumbnailL1Height:'140C XS100 SM100',
        thumbnailWidth:'auto', thumbnailHeight:'200 XS80 SM150 LA250 XL290',

        userID: '111186676244625461692',
       
        kind: 'picasa',
	
        photoSorting: 'random',
        albumSorting: 'random',
        colorScheme: myColorScheme,
        galleryFullpageButton: true,
        
        viewerDisplayLogo: true,
        photoSorting: 'titleAsc',
  			thumbnailHoverEffect:[{'name':'labelOpacity50','duration':300, 'delay':500},{'name':'imageScaleIn80', 'duration':500}]
	
			});

      jQuery("#nanoGallery3a").nanoGallery({
        thumbnailWidth:200, thumbnailHeight:100,
        userID:'111186676244625461692',
        kind:'picasa',
        galleryFullpageButton:true,
        galleryFullpageBgColor : '#fff',
        colorScheme:'lightBackground',
        locationHash:false,
        viewerDisplayLogo:true,
			
				thumbnailHoverEffect:[{'name':'imageScaleIn80', 'duration':500}],
        theme:'light',
        i18n:{'thumbnailImageDescription':'View Photo', 'thumbnailAlbumDescription':'Open Album'},
				thumbnailLabel:{display:true,position:'onBottom'},
        colorSchemeViewer:'default'
			});
      
      

      function fnDemopProcessData(item, kind, sourceData) {
        if( kind == 'picasa' && item.kind == 'image' ) {
          console.dir(sourceData);
          item.customData.imgOriginalWidth = sourceData.gphoto$width.$t;
          item.customData.imgOriginalHeight = sourceData.gphoto$height.$t;
          var ex = { model: 'na', iso: 'na' }
          if (typeof sourceData.exif$tags !== "undefined"){
            if (typeof sourceData.exif$tags.exif$model !== "undefined" && typeof sourceData.exif$tags.exif$model.$t !== "undefined"){
              ex.model = sourceData.exif$tags.exif$model.$t;
            }
          }
          item.customData.exif = ex;
        }
      }
      
      function fnDemoViewerInfo( item, data ) {
        var s= 'camera: '+item.customData.exif.model + ' / width: '+item.customData.imgOriginalWidth+' / height: '+item.customData.imgOriginalHeight;
        alert(s);
      }


			jQuery("#nanoGallery4").nanoGallery({thumbnailWidth:'auto',thumbnailHeight:160,  //110,
        viewerDisplayLogo:true,
        locationHash:false,
				thumbnailHoverEffect:[{'name':'labelSlideUp','duration':300},{'name':'borderDarker'}],

				thumbnailLabel:{display:true,position:'overImageOnBottom',descriptionMaxLength:50},
        thumbnailLazyLoad:true,
        theme:'clean',
        colorScheme:'light',
        level1: { thumbnailWidth: 200, thumbnailHeight: 120 }
			});
			var contentGalleryMLN=[
                            <?php if(count($gallery)) ?>
				<?php foreach($gallery as $gal): ?>
				{ src: '<?php echo base_url().'uploads/photogallery/'.$gal->main_img; ?>',
                                    srct: '<?php echo base_url().'uploads/photogallery/'.$gal->main_img; ?>', title: '<?php echo $gal->gallery_title; ?>',
					ID:'<?php echo $gal->gallery_id; ?>',	kind:'album' },				
                                <?php endforeach; ?>
				<?php foreach($gallery as $gal2):
                                    $gal_img = explode(",",$gal2->gallery_img);
                                foreach($gal_img as  $gimg):
                                    ?>
				{	src: '<?php echo base_url().'uploads/photogallery/'.$gimg; ?>', 
                                        srct: '<?php echo base_url().'uploads/photogallery/'.$gimg; ?>',
					albumID:'<?php echo $gal2->gallery_id; ?>'	},
                                   <?php endforeach; ?>         
                                 <?php endforeach; ?>       ];
			
			jQuery("#nanoGalleryMLN").nanoGallery({thumbnailWidth:120,thumbnailHeight:120,
				items:contentGalleryMLN,
				//paginationMaxItemsPerPage:3,
				paginationMaxLinesPerPage:3,
				thumbnailHoverEffect:'imageInvisible,imageScale150',
        viewerDisplayLogo:true,
				useTags:false,
        locationHash:false,
        breadcrumbAutoHideTopLevel:true,
        maxItemsPerLine:5
			});
			
 			jQuery("#nanoGalleryAnimation1").nanoGalleryDemo({thumbnailWidth:120, thumbnailHeight:120, itemsBaseURL:'demonstration',
        viewerDisplayLogo:true
			});

	
		});
	</script>


<div class="content">
    <div class="container">
        <div class="vd_content-wrapper">
            <div class="">
                <div class="vd_content clearfix">
                    <div class="vd_title-section clearfix">
                        <div class="vd_panel-header">
                           <h1> OUR GALLERY </h1><br><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">	

	
        
	
                
                    
                
	<div id="nanoGalleryMLN"></div>
                        </div>
                    </div>
                </div>
                        
            </div>
                    
        </div>
                
    </div>
            
</div>
