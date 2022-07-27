<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Produk Unggulan Kami
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				<?php foreach ($produk as $produk) { ?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2"><a href="<?php echo base_url('produk/detail/'.$produk->id_produk) ?>">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url('assets/upload/image/'. $this->m_produk->detail_gambar_satu($produk->id_produk)->gambar) ?>" alt="Gambar <?php echo $produk->nama_produk ?>">

								<div class="block2-overlay trans-0-4">
									
									
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="<?php echo base_url('produk/detail/'.$produk->id_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
								<?php echo $produk->nama_produk ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
								Rp <?php echo number_format($produk->harga, '0',',','.') ?>,-
								</span>
							</div>
						</div></a>
					</div>

					<?php }; ?>
				
				</div>
			</div>

		</div>
	</section>