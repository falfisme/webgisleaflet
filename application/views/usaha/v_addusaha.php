<?php 

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('usaha/tambah/'.$user->id_user),' class="form-horizontal"');
?>

<!-- <div class="form-group row">
    <label class="col-md-2 col-form-label">Nomor Induk Kependudukan</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="NIK" name="nik" value="" required>
    </div>
</div> -->
<!-- <div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat Pribadi</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Alamat" name="alamat" value="" required>
    </div>
</div> -->

<div class="form-group row">
    <label class="col-md-2 col-form-label">Id User</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="<?=$user->id_user ?>" name="id_user" value="<?= $user->id_user ?>" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Usaha" name="nama_usaha" value="<?= set_value('nama_usaha') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Jenis Usaha</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="jenis_usaha" value="<?= set_value('jenis_usaha') ?>" required>
        <option selected>Pilih Jenis Usaha</option>
        <option value="Kuliner">Kuliner</option>
        <option value="Kerajinan Tangan">Kerajinan Tangan</option>
        <option value="Pakaian">Pakaian</option>
        <option value="Otomotif">Otomotif</option>
        <option value="Sabun">Sabun</option>
    </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Alamat" name="alamat2" value="<?= set_value('alamat2') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Kecamatan Usaha</label>
    <div class="col-md-5">
    <select class="form-select form-control" aria-label="Default select example" name="kecamatan" value="<?= set_value('kecamatan') ?>" required>
        <option selected>Pilih Kecamatan</option>
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
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">No. Whatsapp</label>
        <div class="col-md-5">
        <!-- <div class="col" style="display: inline; margin-top: 10px;">+62</div> -->
        <input type="text" class="form-control col" style="display: inline; width:12%; text-align:center; right: 0px; float: left;"  placeholder="+62" readonly>
        <input type="text" class="form-control col" style="display: inline; width:88%; right: 0px; float: right;"  placeholder="812 1212 2222" name="hp" value="<?= set_value('hp') ?>" required>
        </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Produk" name="nama_produk" value="<?= set_value('nama_produk') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Harga</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Harga" name="harga" value="<?= set_value('harga') ?>" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-7">
        <div id="map" style="height: 300px"></div>
    </div>
</div>
<div class="form-group row">
    <label for="longitude" class="col-md-2 col-form-label">Longitude</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="Longitude" name="longitude" placeholder="longitude" value="<?= set_value('longitude') ?>">
    </div>
</div>
<div class="form-group row">
    <label for="latitude" class="col-md-2 col-form-label">Latitude</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="Latitude" name="latitude" placeholder="latitude" value="<?= set_value('latitude') ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Link Google Maps</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Google Maps" name="link_gmaps" value="<?= set_value('link_gmaps') ?>" >
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"></label>
    <div class="col-md-5">
       <button class="btn btn-success btn-lg" name="submit" type="submit">
           <i class="fa fa-save"></i> Simpan
       </button>
       <button class="btn btn-primary btn-lg" name="reset" type="reset">
           <i class="fa fa-times"></i> Reset
       </button>
    </div>
</div>
<?php echo form_close(); ?>




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