<?php
// var_dump($_POST);
// var_dump($map);

?>

<!-- Content page -->
<section class="bgwhite">
	<div class="">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-5">
				<div class="leftbar">
					<!--  -->
					<h4 class="m-text14">
						Filter
					</h4>

					<ul class="p-b-54">
						<li class="p-t-4">
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Kategori Usaha</label>
									<select class="form-control" name="kategori" id="exampleFormControlSelect1">
										<option selected value="semua">Semua Kategori</option>	
										<option value="Kuliner">Kuliner</option>
										<option value="Kerajinan Tangan">Kerajinan Tangan</option>
										<option value="Pakaian">Pakaian</option>
										<option value="Otomotif">Otomotif</option>
										<option value="Sabun">Sabun</option>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Kecamatan Usaha</label>
									<select class="form-control" name="kecamatan" id="exampleFormControlSelect1">
										<option selected value="semua">Semua Kecamatan</option>
										<option value="Cengkareng">Cengkareng</option>
										<option value="Grogol Petamburan">Grogol Petamburan</option>
										<option value="Kalideres">Kalideres</option>
										<option value="Kebon Jeruk">Kebon Jeruk</option>
										<option value="Kembangan">Kembangan</option>
										<option value="Palmerah">Palmerah</option>
										<option value="Taman Sari">Taman Sari</option>
										<option value="Tambora">Tambora</option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</li>
					</ul>

				</div>
			</div>



			<div class="col-sm-6 col-md-8 col-lg-9">
				<div id="map" style="height: 800px"></div>
			</div>
		</div>
</section>

<?php

?>

<script type="text/javascript">
	
	var map = L.map('map').setView([-6.192765241338265, 106.77146137979217], 12);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

	var icon1 = L.icon({
		iconUrl: '<?= base_url('icon/mapicon.png') ?>',
		iconSize: [80, 80], // size of the icon
		iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
		popupAnchor: [17, -70] // point from which the popup should open relative to the iconAnchor
	});

	$.getJSON("<?= base_url('icon/jakbar.geojson') ?>", function(data) {
		geoLayer = L.geoJson(data, {
			style: function(feature) {
				return {
					fillOpacity: 0.1,
					opacity: 1,
				}
			}
		}).addTo(map);

		geoLayer.eachLayer(function(layer) {
			layer.bindPopup('Jakarta Barat')
		});
	})

		<?php foreach ($map as $key => $u) { ?>
			L.marker([<?= $u->lat_lng ?>]).bindPopup(`<?= $u->nama_usaha ?>`).addTo(map);
		<?php } ?>
	//bindPopup untuk menambahkan popup pada peta, openPopup untuk membuka popup otomatis
	//var marker = L.marker([-6.185591, 106.737608], {icon: icon1}).bindPopup(`Walikota Jakarta Barat <br> Halo gais <br> <button type="button">Click Me!</button> `).addTo(map);
	//var marker2 = L.marker([-6.184650, 106.736283]).bindPopup(`Rumah Siapa`).addTo(map);
</script>