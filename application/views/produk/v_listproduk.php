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
                Tabel produk
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Nama Usaha</th>
                                <th>Nama Pelaku Usaha</th>
                                <th>Harga</th>
                                <th>View</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($produk as $produk) {
                                //var_dump($this->m_usaha->detaildua($produk->id_user));
                            ?>
                                <tr class="odd gradeX">
                                    <td>
                                        <?= $no;
                                        $no = $no + 1; ?>
                                    </td>

                                    <td>
                                        <?php if ($produk->verif == 1) { ?>
                                            <?= $produk->nama_produk ?>
                                        <?php } else { ?>
                                            <?= $produk->nama_produk ?> <button class="btn btn-basic btn-xs">unverified</button>
                                        <?php } ?>
                                    </td>
                                    <td><?= $this->m_usaha->detaildua($produk->id_user)->nama_usaha ?></td>
                                    <td><?= $this->m_user->detail($produk->id_user)->name ?></td>
                                    <td><?= $produk->harga ?></td>
                                    <td>
                                        <?php if ($produk->status_produk == 'Publish') { ?>
                                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i> </button>
                                        <?php } else { ?>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-close"></i> </button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('produk/gambar/' . $produk->id_produk) ?>" class="btn btn-primary btn-xs"><i class="fa fa-image"></i> Gambar</a>

                                        <a href="<?= base_url('produk/edit/' . $produk->id_produk) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                                        <a href="<?= base_url('produk/delete/' . $produk->id_produk) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
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