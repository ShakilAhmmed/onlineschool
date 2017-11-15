	<?php
     $user=new Setup;
	?>
	<div class="jarallax team" id="professor">
		<div class="team-dot">
			<div class="container">
				<div class="w3-agile-heading team-heading">
					<h3>Our professors</h3>
				</div>
				<div class="agileits-team-grids">
                   <?php
                   $user_list_data=$user->user_list();
                   if($user_list_data)
                   {
                   	while($user_list_data_value=$user_list_data->fetch_assoc())
                   	{
                   ?>
					<div class="col-md-3 agileits-team-grid">
						<div class="team-info">
					<img src="../Admin_panel/<?=$user_list_data_value['profile']?>" style="height:335px;" onerror="this.src='../Admin_panel/images/blankavatar.png';" alt="">
							<div class="team-caption"> 
			<h4><?=$user_list_data_value['first_name']."&nbsp;".$user_list_data_value['last_name']?></h4>
								<p>Associate Professor</p>
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-rss"></i></a></li>
								</ul>
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
	</div>