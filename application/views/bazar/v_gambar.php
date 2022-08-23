<?php 
//error upload
if(isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
    
}

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open_multipart(base_url('produk/gambar/'.$produk->id_produk),' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Judul Gambar Produk</label>
    <div class="col-md-8">
        <input type="text" class="form-control"  placeholder="Judul Gambar" name="judul_gambar" value="<?= set_value('judul_gambar') ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Unggah Gambar</label>
    <div class="col-md-3">
        <input type="file" class="form-control"  placeholder="Gambar Produk" name="gambar" value="<?= set_value('gambar') ?>" required>
    </div>
    <div class="col-md-5">
    	<button class="btn btn-success btn-lg" name="submit" type="submit">
           <i class="fa fa-save"></i> Simpan dan Unggah Gambar
       	</button>
      	<button class="btn btn-primary btn-lg" name="reset" type="reset">
           <i class="fa fa-times"></i> Reset
      	</button>
    </div>
</div>


<?php echo form_close(); ?>

<?php 
// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    	<!-- <tr>
            <td><?= $no = 1;?></td>
            <td>
                <img src="<?php// base_url('assets/upload/image/thumbs/'.$produk->gambar)?>" class="img img-responsive img-thumbnail" width="60"  >
            </td>
            <td><?= $produk->nama_produk ?></td>
            <td>
            </td>
        </tr> -->
        <?php $no=1; foreach($gambar as $gambar) { ?>
        <tr>
            <td><?= $no?></td>
            <td>
                <img src="<?= base_url('assets/upload/image/thumbs/'.$gambar->gambar)?>" class="img img-responsive img-thumbnail" width="60"  >
            </td>
            <td><?= $gambar->judul_gambar ?></td>
            <td>
                <a href="<?= base_url('produk/delete_gambar/'.$produk->id_produk.'/'.$gambar->id_gambar) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php $no = $no+1;?>
        <?php } ?>
    </tbody>
</table>