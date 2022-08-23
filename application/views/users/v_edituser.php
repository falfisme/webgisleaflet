<?php


// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">', '</div>');

// Form Open
echo form_open_multipart(base_url('user/edit/' . $user->id_user), ' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Lengkap</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama Pengguna" name="name" value="<?= $user->name ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Email</label>
    <div class="col-md-5">
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $user->email ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Username</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $user->username ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Password</label>
    <div class="col-md-5">
        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= $user->password ?>" readonly>
    </div>
</div>

<?php if ($_SESSION['role'] == '1') { ?>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Level Hak Akses</label>
        <div class="col-md-5">
            <select name="role" class="form-control">
                <?php
                $roleusers = $this->m_roleuser->listing();
                foreach ($roleusers as $results) { ?>
                    <option value="<?= $results->id_roleuser; ?>" <?php if ($user->role == $results->id_roleuser) {
                                                                        echo "selected";
                                                                    } ?>> <?= $results->role_name; ?> </option>

                <?php }; ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">NIP</label>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="NIP" name="niknip" value="<?= $user->niknip ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Jabatan</label>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="jabatan" name="jabatan" value="<?= $user->jabatan ?>">
        </div>
    </div>
<?php } else { ?>
    <input type="hidden" class="form-control" name="role" value="2" readonly>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">NIK</label>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="NIK" name="niknip" value="<?= $user->niknip ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Alamat</label>
        <div class="col-md-5">
            <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?= $user->alamat ?>">
        </div>
    </div>

<?php }; ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">No. Hp</label>
    <div class="col-md-5">
        <input type="text" class="form-control" placeholder="nomor hp" name="nohp" value="<?= $user->nohp ?>">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Upload Foto Anda</label>
    <div class="col-md-5">
        <input type="file" name="gambar" class="form-control">
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <?php if ($user->gambar == '') { ?>
            <img src="<?= base_url() ?>template/assets/img/find_user.png" class="user-image img-responsive" />
        <?php } else { ?>
            <img src="<?= base_url('assets/upload/image/' . $user->gambar) ?>" class="user-image img-responsive" />
        <?php } ?>
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