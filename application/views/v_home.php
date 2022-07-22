<!-- /. ROW  -->
<div class="col">
	<div class="col-md-3 col-sm-12 col-xs-12">
		<div class="panel panel-primary text-center no-boder bg-color-green">
			<div class="panel-body">
				<i class="fa fa-bar-chart-o fa-5x"></i>
				<h3>120 GB </h3>
			</div>
			<div class="panel-footer back-footer-green">
				Disk Space Available
			</div>
		</div>
		<div class="panel panel-primary text-center no-boder bg-color-red">
			<div class="panel-body">
				<i class="fa fa-edit fa-5x"></i>
				<h3>20,000 </h3>
			</div>
			<div class="panel-footer back-footer-red">
				Articles Pending
			</div>
		</div>
	</div>
</div>
<!-- /. ROW  -->
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
</script>