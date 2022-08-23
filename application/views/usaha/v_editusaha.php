<?php

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form Open
echo form_open(base_url('usaha/edit/' . $usaha->id_usaha), ' class="form-horizontal"');

?>
<div class="panel panel-info">
    <div class="panel-heading ">
        <i class="fa fa-list" aria-hidden="true"></i>
        1. Informasi Umum
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Pelaku Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Pelaku Usaha" name="pelaku usaha" value="<?= $this->m_user->detail($usaha->id_user)->name ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Usaha" name="nama_usaha" value="<?= $usaha->nama_usaha ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="alamat" name="alamat_usaha" value="<?= $usaha->alamat_usaha ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Kecamatan Usaha</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="kecamatan" value="<?= set_value('kecamatan') ?>" required>
            <option>Pilih Kecamatan</option>
            <option <?php echo ($usaha->kecamatan == 'Cengkareng') ? 'selected' : ''; ?> value="Cengkareng">Cengkareng</option>
            <option <?php echo ($usaha->kecamatan == 'Grogol Petamburan') ? 'selected' : ''; ?> value="Grogol Petamburan">Grogol Petamburan</option>
            <option <?php echo ($usaha->kecamatan == 'Kalideres') ? 'selected' : ''; ?> value="Kalideres">Kalideres</option>
            <option <?php echo ($usaha->kecamatan == 'Kebon Jeruk') ? 'selected' : ''; ?> value="Kebon Jeruk">Kebon Jeruk</option>
            <option <?php echo ($usaha->kecamatan == 'Kembangan') ? 'selected' : ''; ?> value="Kembangan">Kembangan</option>
            <option <?php echo ($usaha->kecamatan == 'Palmerah') ? 'selected' : ''; ?> value="Palmerah">Palmerah</option>
            <option <?php echo ($usaha->kecamatan == 'Taman Sari') ? 'selected' : ''; ?> value="Taman Sari">Taman Sari</option>
            <option <?php echo ($usaha->kecamatan == 'Tambora') ? 'selected' : ''; ?> value="Tambora">Tambora</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">No. Whatsapp</label>
    <div class="col-md-5">
        <!-- <div class="col" style="display: inline; margin-top: 10px;">+62</div> -->
        <input type="text" class="form-control col" style="display: inline; width:12%; text-align:center; right: 0px; float: left;" placeholder="+62" readonly>
        <input type="text" class="form-control col" style="display: inline; width:88%; right: 0px; float: right;" placeholder="812 1212 2222" name="hp" value="<?= $usaha->hp ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Jenis Usaha</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="jenis_usaha" value="<?= set_value('jenis_usaha') ?>" required>
            <option>Pilih Jenis Usaha</option>
            <option <?php echo ($usaha->jenis_usaha == 'Kuliner') ? 'selected' : ''; ?> value="Kuliner">Kuliner</option>
            <option <?php echo ($usaha->jenis_usaha == 'Kerajinan Tangan') ? 'selected' : ''; ?> value="Kerajinan Tangan">Kerajinan Tangan</option>
            <option <?php echo ($usaha->jenis_usaha == 'Pakaian') ? 'selected' : ''; ?> value="Pakaian">Pakaian</option>
            <option <?php echo ($usaha->jenis_usaha == 'Otomotif') ? 'selected' : ''; ?> value="Otomotif">Otomotif</option>
            <option <?php echo ($usaha->jenis_usaha == 'Kimia') ? 'selected' : ''; ?> value="Kimia">Kimia</option>
        </select>
    </div>

</div>
<?php
// memecah lat dan lng
$latlng = explode(',', $usaha->lat_lng);
?>
<div class="form-group row">
    <div class="col-md-7">
        <div id="map" style="height: 300px"></div>
    </div>
</div>
<div class="form-group row">
    <label for="Latitude" class="col-md-2 col-form-label">Latitude</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="Latitude" name="latitude" placeholder="latitude" value="<?= $latlng[0] ?>">
    </div>
</div>
<div class="form-group row">
    <label for="longitude" class="col-md-2 col-form-label">Longitude</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="Longitude" name="longitude" placeholder="longitude" value="<?= $latlng[1] ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Link Google Maps</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Google Maps" name="link_gmaps" value="<?= $usaha->link_gmaps ?>">
    </div>
</div>
<hr>
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-list" aria-hidden="true"></i>
        2. Marketplace dan Sosial Media Toko
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Instagram</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="@username tanpa @" name="ig" value="<?= $usaha->ig ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Facebook</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Pengguna Facebook" name="fb" value="<?= $usaha->fb ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Tiktok</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="@username tanpa @" name="tiktok" value="<?= $usaha->tiktok ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Shopee</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Link Toko Shopee" name="shopee" value="<?= $usaha->shopee ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Tokopedia</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Link Toko Tokopedia" name="tokopedia" value="<?= $usaha->tokopedia ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Gofood</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Link Toko Gofood" name="gofood" value="<?= $usaha->gofood ?>">
    </div>
</div>

<hr>
<div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-list" aria-hidden="true"></i>
        3. Nomor Perizinan
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">No. Izin Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nomor Izin Usaha" name="no_izinusaha" value="<?= $usaha->no_izinusaha ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">No. Izin Halal MUI</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nomor Izin Halal" name="no_izinhalal" value="<?= $usaha->no_izinhalal ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">No. PIRT</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nomor Izin PIRT" name="no_pirt" value="<?= $usaha->no_pirt ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan Data
        </button>
    </div>
</div>
<?php echo form_close(); ?>


<script type="text/javascript">
    var curLocation = [0, 0];
    if (curLocation[0] == [0] && curLocation[1] == [0]) {
        curLocation = [<?= $usaha->lat_lng ?>];
    }

    var map = L.map('map').setView([<?= $usaha->lat_lng ?>], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();

        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });

    $("#Latitude, #Longitude").change(function() {
        var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
        marker.settLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });

    map.addLayer(marker);
</script>