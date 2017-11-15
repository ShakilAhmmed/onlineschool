<?php
$content=new Content;
if(isset($_GET['action']))
{
	$action=base64_decode($_GET['action']);
}
?>
<div class="gallery" id="gallery">
		<div class="container">
			<div class="agileits_w3layouts_head">
			<h3>Our Gallery</h3>
			</div>
			<div class="w3layouts_gallery_grids">	
			<?php 
             $content_data=$content->content_list_user();
             if($content_data)
             {
             	while ($content_data_value=$content_data->fetch_assoc()) {
			?>
				<div class="col-md-4 w3layouts_gallery_grid">
						<div class="w3layouts_news_grid">
							   <video width="320" height="240" controls >
								  <source src="../Admin_panel/<?=$content_data_value['video']?>" type="video/mp4">
								  <source src="../Admin_panel/<?=$content_data_value['video']?>" type="video/ogg">
								  Your browser does not support the video tag.
								</video>
						   </div>
							<div>
					           <h2 class="text-center" style="color:#e74c3c" ><?=$content_data_value['content_title']?></h2>
					           <p>
					       <span style="color:#2980b9">Catagory : <?=$content_data_value['content_catagory']?></span>&nbsp; 
					       <span style="color:#2980b9">Author : <?=$content_data_value['content_author']?></span>&nbsp;
					       <a href="?action=<?=base64_encode($content_data_value['email'])?>">
					       <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>
					       </a>
					           </p>
							</div>
						</div>
				</div>
				<?php
			}
		 }
		?>

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#like").unbind().click(function(){
				alert("working");
			});
		});
	</script>