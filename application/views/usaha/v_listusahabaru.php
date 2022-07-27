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
                List Usaha
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id Usaha</th>
                                <th>Nama Usaha</th>
                                <th>Nama Pengusaha</th>
                                <th>Kecamatan</th>
                                <th>Jenis Usaha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($usaha as $usaha) { ?>
                                <tr class="odd gradeX">
                                    <td><?= $no;
                                        $no = $no + 1; ?></td>
                                    <td><?= $usaha->id_usaha ?></td>
                                    <td><?= $usaha->nama_usaha ?></td>
                                    <td><?= $this->m_user->detail($usaha->id_user)->name  ?></td>
                                    <td><?= $usaha->kecamatan  ?></td>
                                    <td><?= $usaha->jenis_usaha  ?></td>

                                    
                                    <td>
                                        <a href="<?= base_url('usaha/tambah/' . $usaha->id_usaha) ?>" class="btn btn-primary btn-xl"><i class="fa fa-plus"></i> Tambah Usaha</a>
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