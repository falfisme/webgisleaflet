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
echo form_open_multipart(base_url('frontpage/carousel'),' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Judul Carousel</label>
    <div class="col-md-8">
        <input type="text" class="form-control"  placeholder="Judul Carousel" name="text_tengah" value="<?= set_value('text_tengah') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Text Atas</label>
    <div class="col-md-8">
        <input type="text" class="form-control"  placeholder="Text Atas" name="text_atas" value="<?= set_value('text_atas') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Text Tombol</label>
    <div class="col-md-8">
        <input type="text" class="form-control"  placeholder="Text Tombol" name="text_button" value="<?= set_value('text_button') ?>" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-md-2 col-form-label">Link</label>
    <div class="col-md-8">
        <input type="text" class="form-control"  placeholder="link" name="link" value="<?= set_value('link') ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Unggah Gambar</label>
    <div class="col-md-3">
        <input type="file" class="form-control"  placeholder="Gambar Carousel" name="gambar" value="<?= set_value('gambar') ?>" required>
    </div>
    <div class="col-md-5">
    	<button class="btn btn-success btn-lg" name="submit" type="submit">
           <i class="fa fa-save"></i> Simpan dan Unggah Carousel
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
            <th>Text Atas</th>
            <th>Text Tombol</th>
            <th>Link</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    <?php //var_dump($gambar) ?>
        <?php $no=1; foreach($gambar as $gambar) { ?>
        <tr>
            <td><?= $no?></td>
            <td>
                <img src="<?= base_url('assets/upload/image/'.$gambar->gambar)?>" class="img img-responsive img-thumbnail" width="60"  >
            </td>
            <td><?= $gambar->text_tengah ?></td>
            <td><?= $gambar->text_atas ?></td>
            <td><?= $gambar->text_button ?></td>
            <td><?= $gambar->link ?></td>
            <td>
                <a href="<?= base_url('frontpage/delete_carousel/'.$gambar->id_carousel) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus gambar ini?')"><i class="fa fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php $no = $no+1;?>
        <?php } ?>
    </tbody>
</table>