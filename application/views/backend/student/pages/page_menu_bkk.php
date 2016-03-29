<div class="blog">
<div id="blog_text">
<?php echo @$blog_text;?>
</div>
</div>
<div id="sidebar" class="sidebar">
    <!--Sidebar-->
    <div class="sidebar-page">     
        <div class="feature-menu">
		<ul>
		<?php foreach($news as $row):?>	
			<li><a href="<?php echo base_url(); ?>index.php?/student/view/<?php echo $row['c_slug']; ?>"><?php echo $row['c_title']; ?></a></li>
			<?php endforeach;?>
		</ul>
            <!--<ul><li><a href="php">php</a></li>
                <li><a href="css">css</a></li>
                <li><a href="javascript">Javascript</a></li>
                <li><a href="codeigniter">CodeIgniter</a></li>
                <li><a href="html5">HTML5</a></li>
                <li><a href="mysql">mysql</a></li>
                <li><a href="mailget">mailget</a></li>
                <li><a href="others">Others</a></li>
            </ul>-->
        </div>
    </div>
    <!--/Sidebar-->
</div>


