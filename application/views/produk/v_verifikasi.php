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
                Produk yang Belum Terverifikasi
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
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($produk as $produk) { ?>
                                <tr class="odd gradeX">
                                    <td><?= $no;
                                        $no = $no + 1; ?></td>
                                    <td><?= $produk->nama_produk ?></td>
                                    <td><?= $produk->nama_usaha ?></td>
                                    <td><?= $this->m_user->detail($produk->id_user)->name ?></td>
                                    <td><?= $produk->harga ?></td>
                                    <td>
                                        <?php if ($produk->verif == 1) { ?>
                                            <a href="<?= base_url('produk/verifno/' . $produk->id_produk) ?>" class="btn btn-danger  btn-xl" onclick="return confirm('Yakin ingin menghapus verifikasi produk ini?')"><i class="fa fa-minus"></i> Hapus Verifikasi</a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('produk/edit/' . $produk->id_produk) ?>" class="btn btn-info btn-xl"><i class="fa fa-pencil"></i> Edit/Lihat Data</a>
                                            <a href="<?= base_url('produk/verifyes/' . $produk->id_produk) ?>" class="btn btn-primary  btn-xl" onclick="return confirm('Yakin ingin memverifikasi produk ini dan menampilkan produk?')"><i class="fa fa-plus"></i> Tambah Verifikasi</a>
                                        <?php }; ?>
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


<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Produk yang Sudah Terverifikasi
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
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($verified as $produk) { ?>
                                <tr class="odd gradeX">
                                    <td><?= $no;
                                        $no = $no + 1; ?></td>
                                    <td><?= $produk->nama_produk ?></td>
                                    <td><?= $produk->nama_usaha ?></td>
                                    <td><?= $this->m_user->detail($produk->id_user)->name ?></td>
                                    <td><?= $produk->harga ?></td>
                                    <td>
                                        <?php if ($produk->verif == 1) { ?>
                                            <a href="<?= base_url('produk/verifno/' . $produk->id_produk) ?>" class="btn btn-danger  btn-xl" onclick="return confirm('Yakin ingin menghapus verifikasi produk ini?')"><i class="fa fa-minus"></i> Hapus Verifikasi</a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('produk/verifyes/' . $produk->id_produk) ?>" class="btn btn-primary  btn-xl" onclick="return confirm('Yakin ingin memverifikasi produk ini?')"><i class="fa fa-plus"></i> Tambah Verifikasi</a>
                                        <?php }; ?>
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