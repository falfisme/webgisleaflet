<?php

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form Open
echo form_open(base_url('produk/edit/' . $produk->id_produk), ' class="form-horizontal"');

?>

<input type="hidden" class="form-control" placeholder="ID User>" name="id_user" value="<?= $produk->id_user ?>" readonly>
<input type="hidden" class="form-control" placeholder="ID Usaha" name="id_usaha" value="<?= $produk->id_usaha ?>" readonly>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Produk</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Produk" name="nama_produk" value="<?= $produk->nama_produk ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Deskripsi Produk</label>
    <div class="col-md-5">
        <textarea type="text" class="form-control" placeholder="Deskripsi Produk" name="deskripsi_produk" value="<?= $produk->deskripsi_produk ?>" required><?= $produk->deskripsi_produk ?></textarea>
    </div>
</div>

<!-- <div class="form-group row">
    <label class="col-md-2 col-form-label">Call To Action Produk</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="cta" value="<?= $produk->cta ?>" required>
            <option>Pilih CTA</option>
            <option <?php echo ($produk->cta == 'wa') ? 'selected' : ''; ?> value="wa">Whatsapp</option>
            <option <?php echo ($produk->cta == 'fb') ? 'selected' : ''; ?> value="fb">Facebook</option>
            <option <?php echo ($produk->cta == 'ig') ? 'selected' : ''; ?> value="ig">Instagram</option>
            <option <?php echo ($produk->cta == 'tiktok') ? 'selected' : ''; ?> value="tiktok">Tiktok</option>
            <option <?php echo ($produk->cta == 'web') ? 'selected' : ''; ?> value="web">Website</option>
        </select>
    </div>
</div> -->
<div class="form-group row">
    <label class="col-md-2 col-form-la bel">Harga</label>
    <div class="col-md-5">
        <input type="number" class="form-control" placeholder="Harga" name="harga" value="<?= $produk->harga ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-la bel">Harga Promo</label>
    <small>Jika ada</small>

    <div class="col-md-5">
        <input type="number" class="form-control" placeholder="Harga Promo" name="promo" value="<?= $produk->promo ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Status Produk</label>
    <div class="col-md-5">
        <select class="form-select form-control" aria-label="Default select example" name="status_produk" value="<?= $produk->status_produk ?>" required>
            <option>Pilih Status</option>
            <option <?php echo ($produk->status_produk == 'Publish') ? 'selected' : ''; ?> value="Publish">Tampil</option>
            <option <?php echo ($produk->status_produk == 'Draft') ? 'selected' : ''; ?> value="Draft">Tidak Tampil</option>
        </select>
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