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
                Tambah Usaha
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>NIK</th>
                                <!-- <th>Level</th> -->
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
                                    <td><?= $this->m_usaha->detaildua($user->id_user)->nik  ?></td>
                                    <!-- <td><?php echo json_decode(json_encode($this->m_roleuser->detail($user->role)->role_name), true); ?></td> -->
                                    <td>
                                        <a href="<?= base_url('usaha/tambah/' . $user->id_user) ?>" class="btn btn-primary btn-xl"><i class="fa fa-plus"></i> Tambah Usaha</a>
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