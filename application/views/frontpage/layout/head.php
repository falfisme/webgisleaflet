<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<!-- icon diambil dari konfigurasi website -->
	<!-- <link rel="icon" type="image/png" href="<?= base_url('assets/upload/image/'.$site->icon) ?>"/> -->

	<!-- SEO google -->
	<!-- <meta name="keywords" content="<?= $site->keywords?>"> -->
	<!-- <meta name="description" content="<?= $title?>, <?= $site->deskripsi?>"> -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/user/css/main.css">
<!--===============================================================================================-->

<!-- LEAFLET-->
<link rel="stylesheet" href="<?= base_url() ?>leaflet/leaflet.css" />
  <!-- CUSTOM SCRIPTS -->
  <!-- <script src="<?= base_url() ?>template/assets/js/custom.js"></script>  -->
  <script src="<?= base_url() ?>leaflet/leaflet.js"></script>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <!-- <script src="<?=base_url()?>template/assets/js/jquery-1.10.2.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style type="text/css" media="screen">
	ul.pagination {
		padding: 0 10px;
		background-color: black;
		border-radius: 10px;
	}
	.pagination a, .pagination b{
		padding: 10px 20px;
		background-color: black;
		color: white;
		text-decoration: none;
		float: right;
	}
	.pagination a:hover{
		background-color: gray;
	}
	
</style>
</head>