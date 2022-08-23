<!-- Title Page -->

<?php if ($bazar->status == '1') { ?>

	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/upload/image/' . $bazar->gambar) ?>">
		<!-- <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>/assets/user/images/heading-pages-02.jpg);"> -->

		<h2 class="l-text2 t-center">
			<?php echo $bazar->nama_bazar; ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $bazar->deskripsi_bazar . ' <br> Periode Bazar : ' . date("d-m-Y", strtotime($bazar->tanggal_mulai))  . ' hingga ' . date("d-m-Y", strtotime($bazar->tanggal_mulai)); ?>
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">


				<div class="col-sm-9 col-md-8 col-lg-9 p-b-50">

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
								<?php

								//closing form
								echo form_close();

								?>
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

<?php } else { ?>
	<section class="bg-title-page p-t-200 p-b-200 flex-col-c-m" style="background-image: url(<?php echo base_url('assets/upload/image/' . $bazar->gambar) ?>">
		<!-- <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>/assets/user/images/heading-pages-02.jpg);"> -->

		<h2 class="l-text2 t-center">
			Bazar Sedang Tidak Aktif
		</h2>
		<p class="m-text13 t-center">
			<a href="<?= base_url('produk') ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
				---- Menuju Produk ----
			</a>
		</p>
	</section>
<?php }; ?>