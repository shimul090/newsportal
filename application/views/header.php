<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/true_news.css'); ?>">
	<!--<link rel="stylesheet" href="<?php //echo base_url('assets/css/bbwebsite.css'); ?>">-->

	<!-- JS -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/js_collection.js'); ?>"></script>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

  	<title><?php echo isset($title) ? $title : 'Always in search of truth'; ?></title>

</head>
<body>
<div class="container">
	<div class="row mt-3">
		<div class="col-sm-10">
			<div id="mySidenav" class="sidenav">
		    	<a href="javascript:void(0)" class="closebtn" onclick="close_nav()">&times;</a>
		    	<a href="<?php echo base_url(); ?>">Home</a>
		    	<a href="<?php echo site_url('news/national'); ?>">National</a>
		    	<a href="#">International</a>
		    	<a href="#">Sports</a>
		  	</div>
		  	<span style="font-size:30px;cursor:pointer" onclick="open_nav()">&#9776;</span>
		</div>
  		<div class="col-sm-2">
			<?php
if ($this->session->userdata('userId') == "") {
	echo '<span>';
	echo '<a id="login_button" href="' . site_url('users/login') . '">
						<b>Login</b>
					</a>';
	echo '</span>';
} else {
	echo '<span>';
	echo '<a id="login_button" href="' . site_url('users/logout') . '">
						<b>Logout</b>
					</a>';
	echo '</span>';
}
?>
		</div>
	</div>
	<img src="<?php echo base_url(); ?>assets/img/true_news.png" class="img-responsive img_center" alt="TrueNews">
</div>

<nav class="navbar navbar-expand-md bg-light justify-content-center">
  		<ul class="navbar-nav">
  			<li class="nav-item">
      			<a class="nav-link" href="<?php echo base_url('econdata/index'); ?>">Home</a>
    		</li>
    		<li class="nav-item">
      			<a class="nav-link" href="<?php echo site_url('news/national'); ?>">National</a>
    		</li>
		    <li class="nav-item">
		      <a class="nav-link" href="#">International</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?php echo site_url('econdata/w_avg_interest'); ?>">Interest Rate Spread</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?php echo site_url('econdata/inflation'); ?>">Inflation</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?php echo site_url('econdata/nationalincome'); ?>">Nationalincome</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?php echo site_url('econdata/moneysupply'); ?>">Money Supply</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?php echo site_url('econdata/bankdeposit'); ?>">Bank Credit and Deposit</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="<?php echo site_url('econdata/press_lcimport_timesr'); ?>">Import Lc</a>
		    </li>
  		</ul>
</nav>


