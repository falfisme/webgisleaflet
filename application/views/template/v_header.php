<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?= base_url('home') ?>" class="logo">
                    <img src="<?= base_url('icon/logo.png') ?>" width="50%" style="padding:7px;" alt="IMG-LOGO">
                </a>
                <!-- <a class="navbar-brand" href="<?= base_url('home') ?>">SIG Jakbar</a>  -->
            </div>
            <div style="color: black;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Halo, <?= $this->m_user->detail($_SESSION['id_user'])->name  ?> &nbsp; <a href="<?= base_url('login/logout') ?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>