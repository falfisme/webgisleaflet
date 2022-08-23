<?php


// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

?>


<div class="col-md-4 col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Foto Profil
        </div>
        <div class="panel-body">
            <?php if ($user->gambar == '') { ?>
                <img src="<?= base_url() ?>template/assets/img/find_user.png" class="user-image img-responsive" />
            <?php } else { ?>
                <img src="<?= base_url('assets/upload/image/' . $user->gambar) ?>" class="user-image img-responsive" />

            <?php } ?>
            <div class="panel-footer">
                <a href="<?= base_url('user/edit/' . $_SESSION['id_user']); ?>">
                    Edit Foto dan Data
                </a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-8 col-sm-8">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Data Saya
        </div>
        <div class="panel-body">

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Nama Saya</label>
                <div class="col-md-5">
                    <?= $user->name ?>
                    <!-- input type="text" class="form-control"  placeholder="Nama Pengguna" name="name" value="<?= $user->name ?>" required> -->
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Email</label>
                <div class="col-md-5">
                    <?= $user->email ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Username</label>
                <div class="col-md-5">
                    <?= $user->username ?>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-md-2 col-form-label">Level Hak Akses</label>
                <div class="col-md-5">
                    <?= ($user->role == 1) ? 'Admin' : 'Pelaku Usaha' ?>
                </div>
            </div>

            <hr>

            <?php if ($_SESSION['role'] == '1') { ?>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">NIP</label>
                    <div class="col-md-5">
                        <?= $user->niknip ?>
                        <!-- input type="text" class="form-control"  placeholder="Nama Pengguna" name="name" value="<?= $user->name ?>" required> -->
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">No. Hp</label>
                    <div class="col-md-5">
                        <?= $user->nohp ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Jabatan</label>
                    <div class="col-md-5">
                        <?= $user->jabatan ?>
                    </div>
                </div>

            <?php } else { ?>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">NIK</label>
                    <div class="col-md-5">
                        <?= $user->niknip ?>
                        <!-- input type="text" class="form-control"  placeholder="Nama Pengguna" name="name" value="<?= $user->name ?>" required> -->
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">No. Hp</label>
                    <div class="col-md-5">
                        <?= $user->nohp ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Alamat</label>
                    <div class="col-md-5">
                        <?= $user->alamat ?>
                    </div>
                </div>

            <?php }; ?>
        </div>
    </div>
</div>