<!-- /. ROW  -->
<?php //var_dump($_SESSION['role']);	
?>

<?php if ($_SESSION['role'] == '1') { ?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary text-center no-boder bg-color-green">
				<div class="panel-body">
					<i class="fa fa-bar-chart-o fa-5x"></i>
					<h3><?= count($usaha) ?> </h3>
				</div>
				<div class="panel-footer back-footer-green">
					Jumlah Usaha
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary text-center no-boder bg-color-red">
				<div class="panel-body">
					<i class="fa fa-users fa-5x"></i>
					<h3><?= count($role) ?> </h3>
				</div>
				<div class="panel-footer back-footer-red">
					Jumlah Pelaku Usaha
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-primary text-center no-boder bg-color-red">
				<div class="panel-body">
					<i class="fa fa-th fa-5x"></i>
					<h3><?= count($produk) ?> </h3>
				</div>
				<div class="panel-footer back-footer-red">
					Jumlah Produk
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary text-center no-boder bg-color-red">
				<div class="panel-body">
					<i class="fa fa-eye fa-5x"></i>
					<h3><?php echo $total ?> </h3>
				</div>
				<div class="panel-footer back-footer-red">
					Jumlah Produk Tampil
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary text-center no-boder bg-color-red">
				<div class="panel-body">
					<i class="fa fa-check fa-5x"></i>
					<h3><?= count($belumverif) ?> </h3>
				</div>
				<div class="panel-footer back-footer-red">
					Jumlah Produk Belum Terverifikasi
				</div>
			</div>
		</div>
	</div>

	<!-- /. ROW  -->
	<!-- <div id="map" style="height: 500px"></div> -->
<?php } else { ?>
	<!-- <div class="row">
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-red set-icon">
					<i class="fa fa-envelope-o"></i>
				</span>
				<div class="text-box">
					<p class="main-text">120 New</p>
					<p class="text-muted">Messages</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon">
					<i class="fa fa-bars"></i>
				</span>
				<div class="text-box">
					<p class="main-text">30 Tasks</p>
					<p class="text-muted">Remaining</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-blue set-icon">
					<i class="fa fa-bell-o"></i>
				</span>
				<div class="text-box">
					<p class="main-text">240 New</p>
					<p class="text-muted">Notifications</p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-brown set-icon">
					<i class="fa fa-rocket"></i>
				</span>
				<div class="text-box">
					<p class="main-text">3 Orders</p>
					<p class="text-muted">Pending</p>
				</div>
			</div>
		</div>
	</div>
	<hr> -->
	<div class="row">
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon">
				</span>
				<div class="text-box">
					<p class="main-text">Pelaku Usaha</p>
				</div>

			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="panel panel-back noti-box">
				<h3><b>Usaha</b></h3>
				<h4>Jumlah Usaha Anda: <?= count($this->m_produk->detailtiga($_SESSION['id_user'])); ?></h4>
				<hr>
				<a href="<?= base_url('usaha/listusaha/' . $_SESSION['id_user']) ?>" class="btn btn-success  btn-block"><i class="fa fa-eye"></i> Lihat Semua Usaha Anda</a>
				<a href="<?= base_url('usaha/listusaha/' . $_SESSION['id_user']) ?>" class="btn btn-success  btn-block"><i class="fa fa-pencil"></i> Edit Usaha dan Map</a>
				<a href="<?= base_url('usaha/tambah/' . $_SESSION['id_user']) ?>" class="btn btn-success  btn-block"><i class="fa fa-plus"></i> Tambah Usaha</a>

			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<div class="panel panel-back noti-box">
				<h3><b>Produk</b></h3>
				<h4>Jumlah Produk Anda: <?= count($this->m_usaha->detailtiga($_SESSION['id_user'])); ?> </h4>

				<hr>
				<a href="<?= base_url('produk/listproduks/' . $_SESSION['id_user']) ?>" class="btn btn-danger btn-block"><i class="fa fa-eye"></i> Lihat Semua Produk Anda</a>
				<a href="<?= base_url('produk/tambahproduks/' . $_SESSION['id_user']) ?>" class="btn btn-danger btn-block"><i class="fa fa-plus"></i> Tambah Produk Anda</a>
			</div>
		</div>


	</div>

<?php }; ?>
<script type="text/javascript">
	var map = L.map('map').setView([-6.169139233154642, 106.74304494775798], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);
</script>