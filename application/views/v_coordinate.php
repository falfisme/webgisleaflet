<div class="form-group">
    <label for="longitude">Longitude</label>
    <input type="text" class="form-control" id="Longitude" name="longitude" placeholder="longitude">
</div>
<div class="form-group">
    <label for="latitude">Latitude</label>
    <input type="text" class="form-control" id="Latitude" name="latitude" placeholder="latitude">
</div>


<div id="map" style="height: 500px"></div>

<?php

var_dump(uri_string());

?>

<script type="text/javascript">
	var curLocation = [0, 0];
	if (curLocation[0]==[0] && curLocation[1]==[0]){
		curLocation = [-6.169139233154642, 106.74304494775798];
	}

	var map = L.map('map').setView([-6.169139233154642, 106.74304494775798], 13);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

	map.attributionControl.setPrefix(false);

	var marker = new L.marker(curLocation,{
		draggable:'true'
	});

	marker.on('dragend', function(event){
		var position = marker.getLatLng();
		marker.setLatLng(position, {
			draggable : 'true'
		}).bindPopup(position).update();

		$("#Latitude").val(position.lat);
		$("#Longitude").val(position.lng).keyup();
	});

	$("#Latitude, #Longitude").change(function(){
		var position = [parseInt($("#Latitude").val()),parseInt($("#Longitude").val())];
		marker.settLatLng(position, {
			draggable : 'true'
		}).bindPopup(position).update();
		map.panTo(position);
	});

	map.addLayer(marker);

</script>