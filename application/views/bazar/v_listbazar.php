<?php
// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}

?>

Status Bazar :

<?php if ($bazar->status == 1) { ?>
    <a href="<?= base_url('bazar/bazarmati') ?>" class="btn btn-success  btn-xl" onclick="return confirm('Yakin ingin mematikan bazar?')"><i class="fa fa-check"></i> Bazar Sedang Aktif</a>
<?php } else { ?>
    <a href="<?= base_url('bazar/bazarnyala') ?>" class="btn btn-danger  btn-xl" onclick="return confirm('Yakin ingin menyalakan bazar?')"><i class="fa fa-close"></i> Bazar Sedang Tidak Aktif</a>
<?php }; ?>

<small><br>Ketuk pada tombol untuk merubah status</small>

<br>
<br>

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
                                        <?php if ($produk->bazar == 1) { ?>
                                            <a href="<?= base_url('bazar/hapusdaribazar/' . $produk->id_produk) ?>" class="btn btn-danger  btn-xl" onclick="return confirm('Yakin ingin menghapus produk ini dari bazar?')"><i class="fa fa-minus"></i> Hapus Dari Bazar</a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('bazar/tambahbazar/' . $produk->id_produk) ?>" class="btn btn-primary  btn-xl" onclick="return confirm('Yakin ingin menambah produk ini ke bazar?')"><i class="fa fa-plus"></i> Tambah Ke Bazar</a>
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