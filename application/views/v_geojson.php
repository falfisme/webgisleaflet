<div id="map" style="height: 500px"></div>

<script type="text/javascript">
	var map = L.map('map').setView([-6.169139233154642, 106.74304494775798], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

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

</script>