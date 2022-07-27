<?php 

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('usaha/edit/'.$usaha->id_usaha),' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Pelaku Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Pelaku Usaha" name="pelaku usaha" value="<?= $this->m_user->detail($usaha->id_user)->name ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nomor Induk Kependudukan</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="nik" name="nik" value="<?= $usaha->nik ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat Pribadi</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="alamat" name="alamat" value="<?= $usaha->alamat ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Alamat Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="alamat" name="alamat2" value="<?= $usaha->alamat2 ?>" required>
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
        <input type="text" class="form-control"  placeholder="hp" name="hp" value="<?= $usaha->hp ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Usaha" name="nama_usaha" value="<?= $usaha->nama_usaha ?>" required>
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
        <option <?php echo ($usaha->jenis_usaha == 'Sabun') ? 'selected' : ''; ?> value="Sabun">Sabun</option>
    </select>
    </div>
    
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Produk" name="nama_produk" value="<?= $usaha->nama_produk ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Harga</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Harga" name="harga" value="<?= $usaha->harga ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Titik Koordinat Alamat</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Latitude dan Longitude" name="lat_lng" value="<?= $usaha->lat_lng ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Link Google Maps</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Google Maps" name="link_gmaps" value="<?= $usaha->link_gmaps ?>" required>
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