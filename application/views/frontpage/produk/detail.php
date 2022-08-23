<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
	<a href="<?php echo base_url() ?>" class="s-text16">
		Home
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a href="<?php echo base_url('produk') ?>" class="s-text16">
		Produk
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<span class="s-text17">
		<?php echo $title; ?>
	</span>
</div>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">
				<div class="wrap-slick3-dots"></div>

				<div class="slick3">
					<!-- <div class="item-slick3" data-thumb="<?php // echo base_url('assets/upload/image/thumbs/'.$produk->gambar) 
																?>">
					<div class="wrap-pic-w">
						<img src="<?php //echo base_url('assets/upload/image/'.$produk->gambar) 
									?>" alt="<?php echo $produk->nama_produk ?>">
					</div>
				</div> -->

					<?php if ($gambar) {
						foreach ($gambar as $gambar) { ?>
							<div class="item-slick3" data-thumb="<?php echo base_url('assets/upload/image/thumbs/' . $this->m_produk->detail_gambar_satu($produk->id_produk)->gambar) ?>">
								<div class="wrap-pic-w">
									<img src="<?php echo base_url('assets/upload/image/' . $this->m_produk->detail_gambar_satu($produk->id_produk)->gambar) ?>" alt="<?php echo $gambar->judul_gambar ?>">
								</div>
							</div>

					<?php }
					}; ?>
				</div>
			</div>
		</div>

		<div class="w-size14 p-t-30 respon5 p-b-8">
			<?php if (!$produk->promo == '') { ?>
				<span class="badge badge-danger ">% PROMO</span>
			<?php }; ?>

			<h4 class="product-detail-name m-text20 p-b-8">
				<?php echo $title ?>
			</h4>

			<?php if (!$produk->promo == '') { ?>
				<h4 class="m-text11 p-b-5" style="color:red; text-decoration: line-through;">
					Rp <?php echo number_format($produk->harga, '0', ',', '.') ?>,-
				</h4>

				<span class="m-text17">
					Rp <?php echo number_format($produk->promo, '0', ',', '.') ?>,-
				</span>
			<?php } else { ?>
				<span class="m-text17">
					Rp <?php echo number_format($produk->harga, '0', ',', '.') ?>,-
				</span>
			<?php }; ?>

			<p class="s-text8 p-t-10">
				<?php echo $produk->deskripsi_produk; ?>
			</p>

			<a href="https://wa.me/62<?= $usaha->hp ?>?text=Halo%20<?= $usaha->nama_usaha ?>%20saya%20mau%20order%20">
				<button type="button" class="btn btn-success btn btn-block m-t-30"><i class="fa fa-whatsapp"></i> Hubungi Whatsapp</button>
			</a>

			<section class="profil bgwhite p-t-45 p-b-138">
				<div class="">
					<!-- Slide2 -->
					<div class="card">
						<div class="card-header">
							Profil Usaha
						</div>
						<div class="card-body">
							<h5 class="card-title"><?= $usaha->nama_usaha ?></h5>
							<a href="<?= base_url('usahadetail/profil/' . $usaha->id_usaha) ?>" class="btn btn-primary btn-block">Lihat Profil Usaha</a>
						</div>
					</div>
				</div>
			</section>

		</div>
	</div>
</div>



<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				Related Products
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">

			<div class="slick2">
				<?php foreach ($produk_related as $produk_related) { ?>
					<?php $totalfoto = $this->m_produk->total_foto_produk($produk_related->id_produk); ?>
					<!-- Block2 -->
					<div class="block2 p-4">
						<div class="block2-img wrap-pic-w of-hidden pos-relative">
							<?php if ($totalfoto->total > 0) { ?>
								<img src="<?= base_url('assets/upload/image/' . $this->m_produk->detail_gambar_satu($produk_related->id_produk)->gambar) ?>" alt="<?php echo $produk_related->nama_produk ?>">
							<?php } else { ?>
								<img src="<?= base_url('assets/upload/image/thumbs/thumb.png') ?>" alt="<?php echo $produk_related->nama_produk ?>">
							<?php }; ?>
						</div>

						<div class="block2-txt p-t-20">
							<a href="<?php echo base_url('produk/detail/' . $produk_related->id_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
								<?php echo $produk_related->nama_produk ?>
							</a>

							<span class="block2-price m-text6 p-r-5">
								Rp <?php echo number_format($produk_related->harga, '0', ',', '.') ?>,-
							</span>
						</div>
						<?php
						//closing form
						echo form_close();
						?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>