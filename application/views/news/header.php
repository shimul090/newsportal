<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<!--title-->
    <title>News Press | News & Blog Template</title>

	<!--CSS-->
	<link href="<?php echo base_url(); ?>assets/css/truenews.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/news/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/news/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/news/css/magnific-popup.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/news/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/news/css/subscribe-better.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/news/css/main.css" rel="stylesheet">
	<link id="preset" rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/news/css/presets/preset1.css">
	<link href="<?php echo base_url(); ?>assets/news/css/responsive.css" rel="stylesheet">

	<!--Google Fonts-->
	<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
	    <script src="js/html5shiv.js"></script>
	    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
	<div id="main-wrapper" class="homepage-two fixed-nav">
		<div class="topbar">
			<div class="container">
				<div id="date-time"></div>
				<div id="topbar-right">
					<div class="dropdown language-dropdown">
						<a data-toggle="dropdown" href="#"><span class="change-text">En</span> <i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu language-change">
							<li><a href="#">EN</a></li>
							<li><a href="#">FR</a></li>
							<li><a href="#">GR</a></li>
							<li><a href="#">ES</a></li>
						</ul>
					</div>
					<div id="weather"></div>
					<div class="searchNlogin">
						<ul>
							<li class="search-icon"><i class="fa fa-search"></i></li>
							<li ><a href="<?php echo site_url('users/login'); ?>"><i class="fa fa-user"></i></a></li>
						</ul>
						<div class="search">
							<form role="form">
								<input type="text" class="search-form" autocomplete="off" placeholder="Type & Press Enter">
							</form>
						</div> <!--/.search-->
					</div><!-- searchNlogin -->
				</div>
			</div>
		</div>
		<div id="navigation">
			<div class="navbar" role="banner">
				<div class="container">
					<div class="top-add">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

							<a class="navbar-brand" href="<?php echo site_url('news/index'); ?>">
								<img class="main-logo img-responsive" src="<?php echo base_url(); ?>assets/news/images/presets/preset1/logo.png" alt="logo">
							</a>
						</div>
						<div class="navbar-right">
							<a href="#"><img class="img-responsive" src="images/post/google-add.jpg" alt="" /></a>
						</div>
					</div>
				</div>
				<div id="menubar">
					<div class="container">
						<nav id="mainmenu" class="navbar-left collapse navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="home dropdown"><a href="<?php echo site_url('news/index'); ?>">Home</a></li>
							<?php
if (isset($categories) && !empty($categories)) {
	foreach ($categories as $category) {
		echo '<li class="home dropdown"><a href="' . site_url('news/news_category') . '/' . $category['id'] . '/' . $category['category_name'] . '">' . $category['category_name'] . '</a></li>';
	}
}
?>
						</ul>
						</nav>
					</div>
				</div><!--/#navigation-->
			</div><!--/#navigation-->
		</div><!--/#navigation-->