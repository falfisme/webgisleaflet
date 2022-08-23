<?php

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form Open
echo form_open(base_url('usaha/tambah/' . $user->id_user), ' class="form-horizontal"');
?>


<div class="panel panel-info">
    <div class="panel-heading ">
        <i class="fa fa-list" aria-hidden="true"></i>
        1. Informasi Umum
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Usaha" name="nama_usaha" value="<?= set_value('nama_usaha') ?>" required>
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
            <option value="Kimia">Kimia</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Alamat" name="alamat_usaha" value="<?= set_value('alamat_usaha') ?>" required>
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
        <input type="text" class="form-control col" style="display: inline; width:12%; text-align:center; right: 0px; float: left;" placeholder="+62" readonly>
        <input type="text" class="form-control col" style="display: inline; width:88%; right: 0px; float: right;" placeholder="812 1212 2222" name="hp" value="<?= set_value('hp') ?>" required>
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
        <input type="text" class="form-control" placeholder="Google Maps" name="link_gmaps" value="<?= set_value('link_gmaps') ?>">
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
        <input type="text" class="form-control" placeholder="@username tanpa @" name="ig" value="<?= set_value('ig') ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Facebook</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Pengguna Fb" name="fb" value="<?= set_value('fb') ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Tiktok</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="@username tanpa @" name="tiktok" value="<?= set_value('tiktok') ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Shopee</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Link Toko Shopee" name="shopee" value="<?= set_value('shopee') ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Tokopedia</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Link Toko Tokopedia" name="tokopedia" value="<?= set_value('tokopedia') ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Akun Gofood</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Link Toko Gofood" name="gofood" value="<?= set_value('gofood') ?>">
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
        <input type="text" class="form-control" placeholder="Nomor Izin Usaha" name="no_izinusaha" value="<?= set_value('no_izinusaha') ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">No. Izin Halal MUI</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nomor Izin Halal" name="no_izinhalal" value="<?= set_value('no_izinhalal') ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">No. PIRT</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nomor Izin PIRT" name="no_pirt" value="<?= set_value('no_pirt') ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg btn-block" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan Data
        </button>

    </div>
</div>
<?php echo form_close(); ?>




<script type="text/javascript">
    var curLocation = [0, 0];
    if (curLocation[0] == [0] && curLocation[1] == [0]) {
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