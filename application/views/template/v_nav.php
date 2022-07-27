 <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?=base_url()?>template/assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
 
					
                    <!-- <li>
                        <a class="<?php echo (uri_string() == 'home') ?'active-menu':''?> btn-nav" href="<?=base_url('home')?>"><i class="fa fa-globe"></i> <p><?php echo $this->session->userdata('name');?></p></a>
                    </li> -->
                    <li>
                        <a class="<?php echo (uri_string() == 'home') ?'active-menu':''?> btn-nav" href="<?=base_url('home')?>"><i class="fa fa-globe"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a class="<?php echo (uri_string() == 'home/usaha') ?'active-menu':''?> btn-nav" href="<?=base_url('home/usaha')?>"><i class="fa fa-globe"></i> Pemetaan IKM</a>
                    </li>
                    <li>
                        <a class="<?php echo (uri_string() == 'home/coordinate') ?'active-menu':''?> btn-nav" href="<?=base_url('home/coordinate')?>"><i class="fa fa-globe"></i> Melihat Koordinat</a>
                    </li> -->
                    <li class="active">
                        <a href="#"><i class="fa fa-sitemap"></i> Manajemen User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" aria-expanded="false" style="">
                            <li>
                                <a href="<?=base_url('user')?>">Data User</a>
                            </li>
                            <li>
                                <a href="<?=base_url('user/add')?>">Tambah User</a>
                            </li>
                            <li>
                                <a href="<?=base_url('roleuser')?>">Kelola Role User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-sitemap"></i> Kelola Profil Usaha<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" aria-expanded="false" style="">
                            <li>
                                <a href="<?=base_url('usaha')?>">Kelola Usaha</a>
                            </li>
                            <li>
                                <a href="<?=base_url('usaha/tambahusaha')?>">Tambah Usaha</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-sitemap"></i> Kelola Produk<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                            <li>
                                <a href="<?=base_url('produk')?>">Data Produk</a>
                            </li>
                            <li>
                                <a href="#">Verifikasi Produk</a>
                            </li>
                            <li>
                                <a href="<?=base_url('produk/tambahproduk')?>">Tambah Produk</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-sitemap"></i> Kelola Tampilan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                            <li>
                                <a href="#">Kelola Carousel</a>
                            </li>
                            <li>
                                <a href="#">Kelola Logo</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-sitemap"></i> Kelola Bazar<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse in" aria-expanded="true" style="">
                            <li>
                                <a href="#">Data Bazar</a>
                            </li>
                            <li>
                                <a href="#">Tambah Bazar</a>
                            </li>
                        </ul>
                    </li>
                    
                   
                	
                </ul>
               
            </div>
            
        </nav>  

        <script>
            // Get the container element
            var btnContainer = document.getElementById("main-menu");

            // Get all buttons with class="btn" inside the container
            var btns = btnContainer.getElementsByClassName("btn-nav");

            // Loop through the buttons and add the active class to the current/clicked button
            for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName(" active-menu");
                current[0].className = current[0].className.replace(" active-menu", "");
                this.className += " active-menu";
            });
            }     
        </script>

        <!-- /. NAV SIDE  -->

          <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?= $title?></h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />