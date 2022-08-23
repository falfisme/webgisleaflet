<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>/assets/upload/image/produk.jpg);">
	<h2 class="l-text2 t-center">
		<?php echo $title; ?>
	</h2>
	<p class="m-text13 t-center">
		Dinas PPKUKM Jakarta Barat
	</p>
</section>

<?php
//var_dump($_POST);
?>
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="form-group">
							<input type="text" class="form-control border" id="cari" name="keyword" value="<?= set_value('keyword') ?>" aria-describedby="cari" placeholder="<?php echo ($_POST == '') ? $_POST['keyword'] : 'Cari Produk ...'; ?>">
							<button type="submit" name="cari" class="btn btn-primary m-t-10"><i class="fa fa-search"></i> Cari</button>
						</div>
					</form>

					<hr>

					<h4 class="m-text14 p-b-7">
						Filter
					</h4>

					<form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Kategori Usaha</label>
							<select class="form-control" name="kategori" id="exampleFormControlSelect1">
								<?php if ($_POST['kategori']) { ?>
									<option <?php echo ($_POST['kategori'] == 'semua') ? 'selected' : ''; ?> value="semua">Semua Kategori</option>
									<option <?php echo ($_POST['kategori'] == 'Kuliner') ? 'selected' : ''; ?> value="Kuliner">Kuliner</option>
									<option <?php echo ($_POST['kategori'] == 'Kerajinan Tangan') ? 'selected' : ''; ?> value="Kerajinan Tangan">Kerajinan Tangan</option>
									<option <?php echo ($_POST['kategori'] == 'Pakaian') ? 'selected' : ''; ?> value="Pakaian">Pakaian</option>
									<option <?php echo ($_POST['kategori'] == 'Otomotif') ? 'selected' : ''; ?> value="Otomotif">Otomotif</option>
									<option <?php echo ($_POST['kategori'] == 'Sabun') ? 'selected' : ''; ?> value="Sabun">Sabun</option>
								<?php } else { ?>
									<option selected value="semua">Semua Kategori</option>
									<option value="Kuliner">Kuliner</option>
									<option value="Kerajinan Tangan">Kerajinan Tangan</option>
									<option value="Pakaian">Pakaian</option>
									<option value="Otomotif">Otomotif</option>
									<option value="Sabun">Sabun</option>
								<?php }; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Kecamatan Usaha</label>
							<select class="form-control" name="kecamatan" id="exampleFormControlSelect1">
								<?php if ($_POST['kecamatan']) { ?>
									<option <?php echo ($_POST['kecamatan'] == 'semua') ? 'selected' : ''; ?> value="semua">Semua Kecamatan</option>
									<option <?php echo ($_POST['kecamatan'] == 'Cengkareng') ? 'selected' : ''; ?> value="Cengkareng">Cengkareng</option>
									<option <?php echo ($_POST['kecamatan'] == 'Grogol Petamburan') ? 'selected' : ''; ?> value="Grogol Petamburan">Grogol Petamburan</option>
									<option <?php echo ($_POST['kecamatan'] == 'Kalideres') ? 'selected' : ''; ?> value="Kalideres">Kalideres</option>
									<option <?php echo ($_POST['kecamatan'] == 'Kebon Jeruk') ? 'selected' : ''; ?> value="Kebon Jeruk">Kebon Jeruk</option>
									<option <?php echo ($_POST['kecamatan'] == 'Kembangan') ? 'selected' : ''; ?> value="Kembangan">Kembangan</option>
									<option <?php echo ($_POST['kecamatan'] == 'Palmerah') ? 'selected' : ''; ?> value="Palmerah">Palmerah</option>
									<option <?php echo ($_POST['kecamatan'] == 'Taman Sari') ? 'selected' : ''; ?> value="Taman Sari">Taman Sari</option>
									<option <?php echo ($_POST['kecamatan'] == 'Tambora') ? 'selected' : ''; ?> value="Tambora">Tambora</option>
								<?php } else { ?>
									<option selected value="semua">Semua Kecamatan</option>
									<option value="Cengkareng">Cengkareng</option>
									<option value="Grogol Petamburan">Grogol Petamburan</option>
									<option value="Kalideres">Kalideres</option>
									<option value="Kebon Jeruk">Kebon Jeruk</option>
									<option value="Kembangan">Kembangan</option>
									<option value="Palmerah">Palmerah</option>
									<option value="Taman Sari">Taman Sari</option>
									<option value="Tambora">Tambora</option>
								<?php }; ?>
							</select>
						</div>
						<button type="submit" name="filter" class="btn btn-success"><i class="fa fa-search"></i> Filter</button>
					</form>
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

				<!-- Product -->
				<div class="row">
					<?php foreach ($produk as $produk) {
						$totalfoto = $this->m_produk->total_foto_produk($produk->id_produk);
					?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

							<!-- Block2 -->
							<div class="block2"><a href="<?php echo base_url('produk/detail/' . $produk->id_produk) ?>">
									<div class="block2-img wrap-pic-w of-hidden pos-relative">
										<?php if ($totalfoto->total > 0) { ?>
											<img src="<?php echo base_url('assets/upload/image/thumbs/' . $this->m_produk->detail_gambar_satu($produk->id_produk)->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">
										<?php } else { ?>
											<img src="<?php echo base_url('assets/upload/image/thumbs/thumb.png') ?>" alt="<?php echo $produk->nama_produk ?>">
										<?php }; ?>

									</div>
								</a>

								<div class="block2-txt p-t-20">
									<a href="<?php echo base_url('produk/detail/' . $produk->id_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $produk->nama_produk ?>
										<?php if (!$produk->promo == '') { ?>
											<span class="badge badge-danger ">%</span>
									</a>
									<small style="color:red; text-decoration: line-through;">
										Rp <?php echo number_format($produk->harga, '0', ',', '.') ?>,-
										<br>
									</small>
									<span class="block2-price m-text6 p-r-5">
										Rp <?php echo number_format($produk->promo, '0', ',', '.') ?>,-
									</span>

								<?php } else { ?>
									</a>
									<span class="block2-price m-text6 p-r-5">
										Rp <?php echo number_format($produk->harga, '0', ',', '.') ?>,-
									</span>
								<?php }; ?>
								</div>
							</div>

						</div>
					<?php }; ?>
				</div>

				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26">
					<?php echo $pagin; ?>
				</div>
			</div>
		</div>
	</div>
</section>