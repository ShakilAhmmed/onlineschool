<?php 
  include 'inc/header.php';
  $catagory=new Catagory;
 ?>
<div class="gallery" id="gallery">
		<div class="container">
			<div class="agileits_w3layouts_head">
			<h3><?php echo  base64_decode($_GET['action']); ?></h3>
			</div>
			<div class="w3layouts_gallery_grids">
			<?php 
             if(isset($_GET['action']))
			  {
			  	 $catagory_name=base64_decode($_GET['action']);
			  	 $catagory_name=preg_replace('/[^-a-zA-Z0-9_]/', '',$catagory_name);
			    $content=$catagory->catagory_gallery($catagory_name);
			    if($content)
			    {
			    	while ($content_value=$content->fetch_assoc())
			     {
			?>	
				<div class="col-md-4 w3layouts_gallery_grid">
						<div class="w3layouts_news_grid">
							   <video width="320" height="240" controls >
								  <source src="../Admin_panel/<?=$content_value['video']?>" type="video/mp4">
								  <source src="../Admin_panel/<?=$content_value['video']?>" type="video/ogg">
								  Your browser does not support the video tag.
								</video>
						   </div>
							<div>
					           <h2 class="text-center" style="color:#e74c3c" ><?=$content_value['content_title']?></h2>
					           <p>
					       <span style="color:#2980b9">Author : <?=$content_value['content_author']?></span>&nbsp; 
					           </p>
							</div>
						</div>
						<?php
					}
				}
				else
				{
				?>
				<div class="panel">
				<div class="alert alert-danger text-center">
					  <strong>Sorry!</strong> No Content Available
				</div>
				</div>
				
				<?php	
				}
			}
					?>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>














  <?php
  include'inc/footer.php'; 
  ?>