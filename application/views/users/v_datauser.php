<!-- <p>
    <a href="<?= base_url('user/add') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Baru
    </a>
</p> -->

<?php
// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel Data Pengguna
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $user) { ?>
                                <tr class="odd gradeX">
                                    <td><?= $no;
                                        $no = $no + 1; ?></td>
                                    <td><?= $user->name ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->username  ?></td>
                                    <td><?php echo json_decode(json_encode($this->m_roleuser->detail($user->role)->role_name), true); ?></td>
                                    <td>
                                        <a href="<?= base_url('user/edit/' . $user->id_user) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                        <a href="<?= base_url('user/delete/' . $user->id_user) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>