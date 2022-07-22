<?php 

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('roleuser/tambah'),' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Role User</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Role User" name="role_name" value="<?= set_value('role_name') ?>" required>
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