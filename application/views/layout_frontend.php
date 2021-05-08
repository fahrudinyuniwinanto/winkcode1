<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=data_app()?></title>

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/ustora/css/bootstrap.min.css">
	<link href="<?=base_url()?>assets/vendor/adminlte/css/AdminLTE.min.css" rel="stylesheet">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/ustora/css/font-awesome.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/ustora/css/owl.carousel.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/ustora/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/ustora/css/responsive.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/inspinia/css/style.css">
	
	<!-- Latest jQuery form server -->
	<script src="<?=base_url()?>assets/js/jquery-1.11.2.min.js"></script>
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>

	<!-- Bootstrap JS form CDN -->
	<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
</head>
<!-- overflow: hidden; => make window not scrollable -->
<body style="overflow: hidden;">


	<div class="wrapper">
		<?php
		// print_r($pengumuman);
		 $this->load->view($content); ?>
	</div>


	<!-- jQuery sticky menu -->
	<script src="<?=base_url()?>assets/vendor/ustora/js/owl.carousel.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/ustora/js/jquery.sticky.js"></script>

	<!-- jQuery easing -->
	<script src="<?=base_url()?>assets/vendor/ustora/js/jquery.easing.1.3.min.js"></script>

	<!-- Main Script -->
	<script src="<?=base_url()?>assets/vendor/ustora/js/main.js"></script>

	<!-- Slider -->
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/ustora/js/bxslider.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/vendor/ustora/js/script.slider.js"></script>
</body>
</html>