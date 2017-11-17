<?php
$catagory=new Catagory;
?>

<div id="catagory" class="about all_pad w3ls">
	<div class="container">
		<h3 class="w3-about-title">Our Catagory</h3>
		<div class="ser-top-grids">
            <?php
            $catagory_list_user_data=$catagory->catagory_list_user();
            if($catagory_list_user_data)
            {
            	while($catagory_list_user_data_value=$catagory_list_user_data->fetch_assoc()) {
            ?>
            <a href="catagory_gallery.php?action=<?=base64_encode($catagory_list_user_data_value['catagory_title'])?>">
			<div class="col-md-4 ser-grid wow flipInY" data-wow-duration="1.5s" data-wow-delay="0s">
				<div class="con-left text-center">
				<div class="spa-ico"><span><i class="fa fa-book" aria-hidden="true"></i></span></div>
					<h5><?=$catagory_list_user_data_value['catagory_title']?></h5>
					<p><?=$catagory_list_user_data_value['catagory_slug']?></p>
				</div>
			</div>
			</a>
			<?php
		}
	 }
	?>


			<div class="clearfix"></div>
		</div>
	</div>
</div>