<div id="map" style="height: 500px"></div>

<script type="text/javascript">
	var map = L.map('map').setView([-6.192765241338265, 106.77146137979217], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

	var icon1 = L.icon({
    iconUrl: '<?=base_url('icon/mapicon.png')?>',
    iconSize:     [80, 80], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [17, -70] // point from which the popup should open relative to the iconAnchor
	});

	$.getJSON("<?=base_url('icon/jakbar.geojson') ?>", function(data){
		geoLayer = L.geoJson(data,{	
			style: function(feature){
				return {
					fillOpacity:0.1,
					opacity:1,
				}
			}
		}).addTo(map);

		geoLayer.eachLayer(function(layer){
			layer.bindPopup('Jakarta Barat')
		});
	})

	<?php foreach ($usaha as $key => $u) { ?>
		L.marker([<?= $u->lat_lng ?>], {icon: icon1}).bindPopup(`<?= $u->nama_usaha ?>`).addTo(map);
	<?php } ?>
	//bindPopup untuk menambahkan popup pada peta, openPopup untuk membuka popup otomatis
	//var marker = L.marker([-6.185591, 106.737608], {icon: icon1}).bindPopup(`Walikota Jakarta Barat <br> Halo gais <br> <button type="button">Click Me!</button> `).addTo(map);
	//var marker2 = L.marker([-6.184650, 106.736283]).bindPopup(`Rumah Siapa`).addTo(map);

	
	
</script>