<?php
// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<script>


</script>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Tabel Usaha
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
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
                                    <td><?= $this->m_user->detail($usaha->id_user)->name ?></td>
                                    <td><?= $usaha->kecamatan ?></td>
                                    <td><?= $usaha->jenis_usaha ?></td>
                                    <td>
                                        <a id="set_dtl" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-namausaha="<?= $usaha->nama_usaha ?>" data-namapengusaha="<?= $this->m_user->detail($usaha->id_user)->name ?>" data-nik="<?= $usaha->nik ?>" data-alamat="<?= $usaha->alamat ?>" data-kecamatan="<?= $usaha->kecamatan ?>" data-email="<?= $this->m_user->detail($usaha->id_user)->email ?>" data-hp="<?= $usaha->hp ?>" data-hp="<?= $usaha->hp ?>" data-jenisusaha="<?= $usaha->jenis_usaha ?>" data-namaproduk="<?= $usaha->nama_produk ?>" data-harga="<?= $usaha->harga ?>" data-latlng="<?= $usaha->lat_lng ?>">
                                            Lihat Detail
                                        </a>

                                        <a href="<?= base_url('usaha/edit/' . $usaha->id_usaha) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

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

<script>

    $(document).ready(function() {
        $(document).on('click', '#set_dtl', function() {
            var namausaha = $(this).attr('data-namausaha');
            var namapengusaha = $(this).attr('data-namapengusaha');
            var nik = $(this).attr('data-nik');
            var alamat = $(this).attr('data-alamat');
            var kecamatan = $(this).attr('data-kecamatan');
            var email = $(this).attr('data-email');
            var hp = $(this).attr('data-hp');
            var jenisusaha = $(this).attr('data-jenisusaha');
            var namaproduk = $(this).attr('data-namaproduk');
            var harga = $(this).attr('data-harga');
            var latlng = $(this).attr('data-latlng');
            let latlngsplit = latlng.split(',');
            let lat = latlngsplit[0];
            let lng = latlngsplit[1];

            console.log(lat);

            $('.nama_usaha').text(namausaha);
            $('#nama_pengusaha').text(namapengusaha);
            $('#nik').text(nik);
            $('#alamat').text(alamat);
            $('#kecamatan').text(kecamatan);
            $('#email').text(email);
            $('#hp').text(hp);
            $('#jenisusaha').text(jenisusaha);
            $('#namaproduk').text(namaproduk);
            $('#harga').text(harga);
            // $('.latlng').text(latlng);

            
        });
    });

</script>