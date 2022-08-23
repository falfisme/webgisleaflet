<style>
    .tambahan {
        padding-top: .75rem;
        padding-bottom: .75rem;
        background-color: rgba(86, 61, 124, .15);
        border: 1px solid rgba(86, 61, 124, .2);
    }
</style>

<?php //var_dump($usaha) 
?>

<div id="map" style="height: 200px"></div>

<div class="container p-t-66 p-b-38 p-l-20 p-r-20">
    <div class="row">

        <div class="col-auto mr-auto">
            <h1>
                <?= $usaha->nama_usaha ?>
            </h1>
        </div>
        <div class="col-auto tambahan"> <?= $usaha->jenis_usaha ?></div>
    </div>

    <div class="row p-t-30">
        <div class="col-6 col-md-4"> <b>Alamat Usaha</b> </div>
        <div class="col-12 col-md-8">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $usaha->alamat_usaha ?><br><br>
                    <?php if (!$usaha->link_gmaps == '') { ?>
                        <a href="<?= $usaha->link_gmaps ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-location-arrow"></i> Arahkan Ke Lokasi</a>
                </li>
            <?php } else { ?>
                <a href="https://maps.google.com/?q=<?= $usaha->lat_lng ?>&z=8" type="button" class="btn btn-primary btn-sm"><i class="fa fa-location-arrow"></i> Arahkan Ke Lokasi</a></li>
                <!-- https://maps.google.com/?q=23.22,88.32&z=8 -->
            <?php }; ?>
            </ul>
        </div>
    </div>
    <div class="row p-t-10">
        <div class="col-6 col-md-4"> <b>Kontak </b></div>
        <div class="col-12 col-md-8 ">
            <table class="table">
                <tbody>
                    <?php if (!$usaha->hp == '') { ?>
                        <tr>
                            <th scope="row"><i class="fa fa-whatsapp"></th>
                            <td>Whatsapp</td>
                            <td>0<?= $usaha->hp ?></td>
                            <td><a href="https://wa.me/62<?= $usaha->hp ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i> Hubungi Whatsapp</a></td>
                        </tr>
                    <?php }; ?>
                    <?php if (!$usaha->ig == '') { ?>
                        <tr>
                            <th scope="row"><i class="fa fa-instagram"></i></th>
                            <td>Instagram</td>
                            <td>@<?= $usaha->ig ?></td>
                            <td><a href="https://instagram.com/<?= $usaha->ig ?>" type="button" class="btn btn-white btn-sm"><i class="fa fa-instagram"></i> Profil Instagram</a></td>
                        </tr>
                    <?php }; ?>
                    <?php if (!$usaha->fb == '') { ?>
                        <tr>
                            <th scope="row"><i class="fa fa-facebook"></i></th>
                            <td>Facebook</td>
                            <td>facebook.com/<?= $usaha->fb ?></td>
                            <td><a href="https://facebook.com/<?= $usaha->fb ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-facebook"></i> Profil Facebook</a></td>

                        </tr>
                    <?php }; ?>
                    <?php if (!$usaha->tiktok == '') { ?>
                        <tr>
                            <th scope="row"><i class="fa fa-music"></i></th>
                            <td>Tiktok</td>
                            <td>@<?= $usaha->tiktok ?></td>
                            <td><a href="https://tiktok.com/@<?= $usaha->tiktok ?>" type="button" class="btn btn-dark btn-sm"><i class="fa fa-music"></i> Profil Tiktok</a></td>

                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
            <!-- <ul class="list-group list-group-flush">
                <li class="list-group-item"></i>&ensp; Whatsapp</li>
                <li class="list-group-item"><i class="fa fa-facebook"></i>&ensp; Facebook</li>
                <li class="list-group-item"><i class="fa fa-instagram"></i>&ensp; Instagram</li>
                <li class="list-group-item"><i class="fa-brands fa-tiktok"></i>&ensp; Tiktok</li>
                <li class="list-group-item"><i class="fa fa-globe"></i>&ensp; Web</li>
            </ul> -->
        </div>
    </div>
    <?php if (!$usaha->shopee == '') { ?>
        <div class="row p-t-10">
            <div class="col-6 col-md-4"> <b>Online Shop </b></div>
            <div class="col-12 col-md-8 ">
                <table class="table">
                    <tbody>
                        <tr>
                            <td><a href="https://<?= $usaha->shopee ?>" type="button" class="btn btn-danger btn-sm">Shopee</a></td>
                            <td><a href="https://<?= $usaha->tokopedia ?>" type="button" class="btn btn-success btn-sm">Tokopedia</a></td>
                            <td><a href="https://<?= $usaha->gofood ?>" type="button" class="btn btn-success btn-sm">Gofood</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php }; ?>
    <div class="row p-t-10">
        <div class="col col-md-4"> <b>Produk</b> </div>
        <div class="col col-md-8">
            <div class="row">

                <?php foreach ($produk as $produk) {
                    $totalfoto = $this->m_produk->total_foto_produk($produk->id_produk);
                ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">

                        <!-- Block2 -->
                        <div class="block2"><a href="<?php echo base_url('produk/detail/' . $produk->id_produk) ?>">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                    <?php if ($totalfoto->total > 0) { ?>
                                        <img src="<?php echo base_url('assets/upload/image/thumbs/' . $this->m_produk->detail_gambar_satu($produk->id_produk)->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url('assets/upload/image/thumbs/thumb.png') ?>" alt="<?php echo $produk->nama_produk ?>">
                                    <?php }; ?>

                                </div>
                            </a>

                            <div class="block2-txt p-t-20">
                                <a href="<?php echo base_url('produk/detail/' . $produk->id_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
                                    <?php echo $produk->nama_produk ?>
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    Rp <?php echo number_format($produk->harga, '0', ',', '.') ?>,-
                                </span>
                            </div>
                        </div>
                    </div>

                <?php }; ?>
            </div>
        </div>
    </div>

</div>



<script type="text/javascript">
    var map = L.map('map').setView([<?= $usaha->lat_lng ?>], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    var icon1 = L.icon({
        iconUrl: '<?= base_url('icon/mapicon.png') ?>',
        iconSize: [80, 80], // size of the icon
        iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
        popupAnchor: [17, -70] // point from which the popup should open relative to the iconAnchor
    });

    //bindPopup untuk menambahkan popup pada peta, openPopup untuk membuka popup otomatis
    var marker = L.marker([<?= $usaha->lat_lng ?>]).bindPopup(`<?= $usaha->nama_usaha ?>`).addTo(map);
</script>