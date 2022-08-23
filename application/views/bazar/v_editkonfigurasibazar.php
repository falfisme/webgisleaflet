<?php
//error upload
if (isset($error)) {
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form Open
echo form_open_multipart(base_url('bazar/konfigurasi/'), ' class="form-horizontal"');

// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Status Bazar</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="status" value="<?= $bazar->status ?>" required>
            <option>Pilih Status</option>
            <option <?php echo ($bazar->status == '1') ? 'selected' : ''; ?> value="1">Aktif</option>
            <option <?php echo ($bazar->status == '0') ? 'selected' : ''; ?> value="0">Tidak Aktif</option>
        </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Bazar</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Bazar" name="nama_bazar" value="<?= $bazar->nama_bazar ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Deskripsi bazar</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Deskripsi bazar" name="deskripsi_bazar" value="<?= $bazar->deskripsi_bazar ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Tanggal Mulai</label>
    <div class="col-md-5">
        <input type="date" class="form-control" name="tanggal_mulai" value="<?= $bazar->tanggal_mulai ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Tanggal Berakhir</label>
    <div class="col-md-5">
        <input type="date" class="form-control" name="tanggal_berakhir" value="<?= $bazar->tanggal_berakhir ?>">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Gambar Bazar</label>
    <div class="col-md-5">
        <input type="file" class="form-control" placeholder="Gambar Bazar" name="gambar" value="<?= $bazar->gambar ?>">
        Gambar : <br><img src="<?php echo base_url('assets/upload/image/' . $bazar->gambar) ?>" class="img img-responsive img-thumbnail" width="200">
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