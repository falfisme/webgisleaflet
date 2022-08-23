<?php 

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('produk/tambah/'.$user->id_user . '/' . $usaha->id_usaha),' class="form-horizontal"');
?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id User</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="<?=$user->id_user ?>" name="id_user" value="<?= $user->id_user ?>" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Id Usaha</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="<?=$usaha->id_usaha ?>" name="id_usaha" value="<?= $usaha->id_usaha ?>" readonly>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Produk" name="nama_produk" value="<?= set_value('nama_produk') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Deskripsi Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Deskripsi Produk" name="deskripsi_produk" value="<?= set_value('deskripsi_produk') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Foto Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Foto Produk" name="foto" value="<?= set_value('foto') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Call To Action Produk</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="cta" value="<?= set_value('cta') ?>" required>
        <option selected>Pilih CTA</option>
        <option value="wa">Whatsapp</option>
        <option value="fb">Facebook</option>
        <option value="ig">Instagram</option>
        <option value="tiktok">Tiktok</option>
        <option value="web">Website</option>
    </select>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-la bel">Harga</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Harga" name="harga" value="<?= set_value('harga') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Promo</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Promo Produk" name="promo" value="<?= set_value('promo') ?>" required>
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



