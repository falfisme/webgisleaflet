 <!-- /. NAV TOP  -->
 <nav class="navbar-default navbar-side" role="navigation">
     <div class="sidebar-collapse">
         <ul class="nav" id="main-menu">
             <li class="text-center">
                 <a href="<?= base_url('user/profil/' . $_SESSION['id_user']) ?>">
                     <?php $user =  $this->m_user->detail($_SESSION['id_user']); ?>
                     <?php if ($user->gambar == '') { ?>
                         <img src="<?= base_url() ?>template/assets/img/find_user.png" class="user-image img-responsive" />
                     <?php } else { ?>
                         <img src="<?= base_url('assets/upload/image/' . $user->gambar) ?>" class="user-image img-responsive" />
                     <?php } ?>
                 </a>
             </li>


             <li>
                 <a class="<?php echo (uri_string() == 'home') ? 'active-menu' : '' ?> btn-nav" href="<?= base_url('home') ?>"><i class="fa fa-globe"></i> Dashboard</a>
             </li>

             <?php if ($_SESSION['role'] == '1') { ?>
                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Manajemen User<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class="<?php echo (uri_string() == 'user') ? 'active-menu' : '' ?>" href="<?= base_url('user') ?>">Data User</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'user/add') ? 'active-menu' : '' ?>" href="<?= base_url('user/add') ?>">Tambah User</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'roleuser') ? 'active-menu' : '' ?>" href="<?= base_url('roleuser') ?>">Kelola Role User</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Kelola Profil Usaha<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class=" <?php echo (uri_string() == 'usaha') ? 'active-menu' : '' ?>" href="<?= base_url('usaha') ?>">Kelola Usaha</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'usaha/tambahusaha') ? 'active-menu' : '' ?>" href="<?= base_url('usaha/tambahusaha') ?>">Tambah Usaha</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Kelola Produk<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class="<?php echo (uri_string() == 'produk/listproduk') ? 'active-menu' : '' ?>" href="<?= base_url('produk/listproduk') ?>">Data Produk</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'produk/verifikasi') ? 'active-menu' : '' ?>" href="<?= base_url('produk/verifikasi') ?>">Verifikasi Produk</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'produk/tambahproduk') ? 'active-menu' : '' ?>" href="<?= base_url('produk/tambahproduk') ?>">Tambah Produk</a>
                         </li>
                     </ul>
                 </li>
                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Kelola Tampilan<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class="<?php echo (uri_string() == 'frontpage/carousel') ? 'active-menu' : '' ?>" href="<?= base_url('frontpage/carousel') ?>">Kelola Carousel</a>
                         </li>

                     </ul>
                 </li>
                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Kelola Bazar<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class="<?php echo (uri_string() == 'bazar/listbazar') ? 'active-menu' : '' ?>" href="<?= base_url('bazar/listbazar') ?>">Kelola Produk Bazar</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'bazar/konfigurasi') ? 'active-menu' : '' ?>" href="<?= base_url('bazar/konfigurasi') ?>">Konfigurasi Bazar</a>
                         </li>
                     </ul>
                 </li>

             <?php } else { ?>


                 <li>
                     <a class="<?php echo (uri_string() == ('user/edit/' . $_SESSION['id_user'])) ? 'active-menu' : '' ?> btn-nav" href="<?= base_url('user/edit/' . $_SESSION['id_user']) ?>"><i class="fa fa-globe"></i> Edit Profil</a>
                 </li>

                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Kelola Profil Usaha<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class=" <?php echo (uri_string() == 'usaha/listusaha/' . $_SESSION['id_user']) ? 'active-menu' : '' ?>" href="<?= base_url('usaha/listusaha/' . $_SESSION['id_user']) ?>">Kelola Usaha</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'usaha/tambah/' . $_SESSION['id_user']) ? 'active-menu' : '' ?>" href="<?= base_url('usaha/tambah/' . $_SESSION['id_user']) ?>">Tambah Usaha</a>
                         </li>
                     </ul>
                 </li>

                 <li>
                     <a href="#"><i class="fa fa-sitemap"></i> Kelola Produk<span class="fa arrow"></span></a>
                     <ul class="nav nav-second-level">
                         <li>
                             <a class="<?php echo (uri_string() == 'produk/listproduks/' . $_SESSION['id_user']) ? 'active-menu' : '' ?>" href="<?= base_url('produk/listproduks/' . $_SESSION['id_user']) ?>">Data Produk</a>
                         </li>
                         <li>
                             <a class="<?php echo (uri_string() == 'produk/tambahproduks/' . $_SESSION['id_user']) ? 'active-menu' : '' ?>" href="<?= base_url('produk/tambahproduks/' . $_SESSION['id_user']) ?>">Tambah Produk</a>
                         </li>
                     </ul>
                 </li>






             <?php }; ?>
         </ul>
     </div>

 </nav>

 <!-- /. NAV SIDE  -->

 <div id="page-wrapper">
     <div id="page-inner">
         <div class="row">
             <div class="col-md-12">
                 <h2><?= $title ?></h2>
             </div>
         </div>
         <!-- /. ROW  -->
         <hr />