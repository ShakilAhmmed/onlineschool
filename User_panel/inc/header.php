<?php
   include_once '../Config/Config.php';
   include_once '../Database/Database.php';
   include_once '../Format/Format.php';
    spl_autoload_register(function($class){
      include '../Class/'.$class.".php";
   });
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Education</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Education portal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/carousel.css" type="text/css" rel="stylesheet" media="all"> 
<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
<!-- gallery -->
<link href="css/lsb.css" rel="stylesheet" type="text/css">
<!-- //gallery -->
<!-- /fonts -->
<link href="//fonts.googleapis.com/css?family=Montserrat+Alternates:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic" rel="stylesheet">
<!-- //fonts -->




<!-- //css files -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>

<!-- //js -->
</head>
<body>
<!--header-banner-section-starts-here -->
<section class="banner-header" id="home">
		<!--header-->
		<div class="header">
			<nav class="navbar navbar-default">
				<div class="container">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="w3_navigation_pos">
						<h1><a href="index.html">Education portal</i></a></h1>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="#catagory" class="scroll">Catagory</a></li>
							<li><a href="#gallery" class="scroll">gallery</a></li>
							<li><a href="#professor" class="scroll">professors</a></li>
							<li><a href="#contact" class="scroll">Contact</a></li>
						</ul>
					</nav>
				</div>
				</div>
			</nav>		
	</div>
		<!--//header-->
<!-- banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h2>Online Education</h2>
						<p>Educational technology is "the study and ethical practice of facilitating learning and improving performance by creating, using, and managing appropriate technological processes and resources".</p>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Online Education</h3>
						<p>Educational technology is "the study and ethical practice of facilitating learning and improving performance by creating, using, and managing appropriate technological processes and resources".</p>
						<button class="btn btn-primary" data-target="#myModal" data-toggle="modal">Now Open</button>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Online Education</h3>
						<p>Educational technology is "the study and ethical practice of facilitating learning and improving performance by creating, using, and managing appropriate technological processes and resources".</p>
						<button class="btn btn-primary" data-target="#myModal" data-toggle="modal">Now Open</button>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Online Education</h3>
						<p>Educational technology is "the study and ethical practice of facilitating learning and improving performance by creating, using, and managing appropriate technological processes and resources".</p>
						<button class="btn btn-primary" data-target="#myModal" data-toggle="modal">Now Open</button>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Online Education</h3>
						<p>Educational technology is "the study and ethical practice of facilitating learning and improving performance by creating, using, and managing appropriate technological processes and resources".</p>
						<button class="btn btn-primary" data-target="#myModal" data-toggle="modal">Now Open</button>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
		<div id="myModal" class="modal wthree-modal" tabindex="-1"> 
			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close" data-dismiss="modal" >&times;</span>
					<h3>Education portal</h3>
				</div>
				<div class="col-md-6 modal-img">
					<img src="images/ban1.jpg" class="img-responsive" alt="w3layouts" title="w3layouts">
				</div>
				<div class="col-md-6 modal-text">
					<p class="banner-p1">Educational technology is "the study and ethical practice of facilitating learning and improving performance by creating, using, and managing appropriate technological processes and resources".</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>		
		<div class="thim-click-to-bottom">
			<a href="#admission" class="scroll">
				<i class="fa  fa-chevron-down"></i>
			</a>
		</div>
    </div> 
	<!-- //banner -->
	
</section>	