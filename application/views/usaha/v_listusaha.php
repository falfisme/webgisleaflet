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
                Tabel Usaha
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
                                <th>Action</th>

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
                                    <td><?= $this->m_user->detail($usaha->id_user)->name ?></td>
                                    <td><?= $usaha->kecamatan ?></td>
                                    <td><?= $usaha->jenis_usaha ?></td>
                                    <td>

                                        <a href="<?= base_url('usaha/edit/' . $usaha->id_usaha) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Lihat/Edit</a>

                                        <a href="<?= base_url('usaha/delete/' . $usaha->id_usaha) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><span class="nama_usaha"></span></h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Usaha</th>
                            <td><span class="nama_usaha"></span></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Alamat Usaha</th>
                            <td><span id="alamat"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Jenis Usaha</th>
                            <td><span id="jenisusaha"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">Kecamatan Usaha</th>
                            <td><span id="kecamatan"></td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Pemilik Usaha</th>
                            <td><span id="nama_pengusaha"></span></td>
                        </tr>
                        <tr>
                            <th scope="row">No. Whatsapp</th>
                            <td><span id="hp"></td>
                        </tr>
                        <tr>
                            <th scope="row">NIK</th>
                            <td><span id="nik"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>