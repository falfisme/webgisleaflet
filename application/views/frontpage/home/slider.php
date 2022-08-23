<!-- Slide1 -->
<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">

			<?php foreach ($carousel as $c) { ?>
				<div class="item-slick1 item1-slick1" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(<?= base_url('assets/upload/image/' . $c->gambar) ?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?= $c->text_atas ?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?= $c->text_tengah ?>

						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="<?= $c->link ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								<?= $c->text_button ?>

							</a>
						</div>
					</div>
				</div>

			<?php }; ?>
		</div>
	</div>
</section>