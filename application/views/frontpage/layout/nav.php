<?php
// Ambil data nav menu dari konfigurasi
// $nav_produk = $this->konfigurasi_model->nav_produk();
// $nav_produk_mobile = $this->konfigurasi_model->nav_produk();
?>

<div class="wrap_header">
	<!-- Logo -->
	<a href="<?= base_url('') ?>" class="logo">
		<img src="<?= base_url('icon/logo.png') ?>" alt="IMG-LOGO">
	</a>

	<!-- Menu -->
	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">

				<!-- BERANDA -->
				<li class="<?php echo (uri_string() == '') ? 'sale-noti' : '' ?> ">
					<a href="<?php echo base_url(); ?>">Beranda</a>
				</li>
				<li class="<?php echo (uri_string() == 'maps') ? 'sale-noti' : '' ?> ">
					<a href="<?php echo base_url('maps'); ?>">Maps</a>
				</li>
				<li class="<?php echo (uri_string() == 'bazar') ? 'sale-noti' : '' ?> ">
					<a href="<?php echo base_url('bazar'); ?>">Bazar</a>
				</li>
				<li class="<?php echo (uri_string() == 'produk') ? 'sale-noti' : '' ?> ">
					<a href="<?php echo base_url('produk'); ?>">Produk</a>
				</li>


				<!-- MENU PRODUK -->
				<!-- <li>
				<a href="<?php echo base_url('produk'); ?>">Produk &amp; Belanja</a>
				<ul class="sub_menu">
					<?php //foreach ($nav_produk as $nav_produk) : 
					?>
						<li><a href="<?php //echo base_url('produk/kategori/'.$nav_produk->slug_kategori) 
										?>"><?php // echo $nav_produk->nama_kategori 
											?>
						</a></li>
					<?php //endforeach; 
					?>
				</ul>
			</li> -->
			</ul>
		</nav>
	</div>

	<!-- Header Icon -->
	<div class="header-icons">

		<?php if ($this->session->userdata('nama_pelanggan')) { ?>
			<a href="<?php echo base_url('dasbor') ?>" class="header-wrapicon1 dis-block">
				<img src="<?= base_url() ?>assets/user/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> <?php echo $this->session->userdata('nama_pelanggan'); ?>&nbsp;
			</a>
			<a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
				<i class="fa fa-sign-out"></i> Log Out
			</a>
		<?php } else { ?>
			<a href="<?php echo base_url('login') ?>" class="header-wrapicon1 dis-block">
				<img src="<?= base_url() ?>assets/user/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>
		<?php } ?>


	</div>
</div>


<!-- Header Mobile -->
<div class="wrap_header_mobile">
	<!-- Logo moblie -->
	<a href="<?= base_url() ?>" class="logo-mobile">
		<img src="<?= base_url('icon/logo.png') ?>" alt="IMG-LOGO">
	</a>

	<!-- Button show menu -->
	<div class="btn-show-menu">
		<!-- Header Icon mobile -->
		<div class="header-icons-mobile">
			<a href="#" class="header-wrapicon1 dis-block">
				<!-- <img src="<?= base_url() ?>assets/user/images/icons/icon-header-01.png" class="header-icon1" alt="ICON"> -->
			</a>

		</div>
	</div>

	<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
		<span class="hamburger-box">
			<span class="hamburger-inner"></span>
		</span>
	</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu">
	<nav class="side-menu">
		<ul class="main-menu">
			<!-- <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<span class="topbar-child1">
					<?php //echo $site->alamat 
					?>
				</span>
			</li>

			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<div class="topbar-child2-mobile">
					<span class="topbar-email">
						<?php // echo $site->email 
						?>
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option><?php //echo $site->telepon 
									?></option>
							<option><?php //echo $site->email 
									?></option>
						</select>
					</div>
				</div>
			</li> -->

			<!-- <li class="item-topbar-mobile p-l-10">
				<div class="topbar-social-mobile">
					<a href="http://facebook.com/<?php //echo $site->facebook 
													?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="http://instagram.com/<?php //echo $site->instagram 
													?>" class="topbar-social-item fa fa-instagram"></a>
				</div>
			</li> -->

			<!-- Menu mobile homepage -->

			<!-- <li class="item-menu-mobile">
				<a href="<?php //echo base_url('beranda') 
							?>">Beranda</a>
			</li> -->
			<li class="item-menu-mobile">
				<a href="<?php echo base_url(); ?>">Beranda</a>
			</li>
			<li class="item-menu-mobile">
				<a href="<?php echo base_url('maps'); ?>">Maps</a>
			</li>
			<li class="item-menu-mobile">
				<a href="<?php echo base_url('bazar'); ?>">Bazar</a>
			</li>
			<li class="item-menu-mobile">
				<a href="<?php echo base_url('produk'); ?>">Produk</a>
			</li>
			<li class="item-menu-mobile">
				<a href="<?php echo base_url('login'); ?>">Login/Registrasi</a>
			</li>


			<!-- <li class="item-menu-mobile">
				<a href="<?php //echo base_url('beranda') 
							?>">Produk &amp; Belanja</a>
				<ul class="sub-menu">
					<?php //foreach ($nav_produk_mobile as $nav_produk_mobile) : 
					?>
					<li><a href="<?php // echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori) 
									?>"><?php //echo $nav_produk_mobile->nama_kategori 
										?>
						</a></li>
					<?php //endforeach; 
					?>
				</ul>
				<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
			</li> -->

		</ul>
	</nav>
</div>
</header>