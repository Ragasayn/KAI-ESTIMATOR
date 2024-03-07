<style>
    a {
        color: white;
        /* font-family: 'Inter Regular';
        text-decoration: none; */
        font-size: medium;
        font-weight: normal;

    }

    .nav-item {
        padding-left: 10px;


    }

    .nav>li>a:focus,
    .nav>li>a:hover {
        text-decoration: none;
        font-weight: bold;
        color: white;
        background-color: transparent;
    }
</style>
<header>
    <!-- navbar -->
    <nav class="navbar navbar-default-menu" style="background-color: #1b68b0 ;height:75px;border-radius:0;">

        <div class="container" style="width: 100%;padding-right: 50px;padding-left: 50px;padding-top:10px;">
            <a class="navbar-brand hvr-wobble-horizontal" id="menu-home" style="align-content: center;" href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/logo.png') ?>" height="auto" width="65px" /></a>
            <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>



            </div>
            <div class="collapse navbar-collapse yamm p0" id="navigation" style="padding-top: 10px;">

                <ul class="main-nav nav navbar-nav navbar-right">

                    <!-- <li class="wow fadeInDown" id="menu-proyek" data-wow-delay="0.2s" style="display: none"> -->
                    <li class="wow fadeInDown nav-item" data-wow-delay="0.2s" style="visibility: visible;">
                        <a class="# hvr-float" id="link_manajemen_user" href="javascript:void(0);" onclick="buka_manajemen_user()">Manajemen User</a>
                    </li>
                    <li class="nav-item">
                        <a class="# hvr-float" href=" #">Master Card</a>
                    </li>
                    <li class="nav-item">
                        <a class="# hvr-float" href=" #">Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a class="# hvr-float" href=" #">Estimasi Anggaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="# hvr-float" href=" #">Laporan</a>
                    </li>
                    <li>
                        <div class="button navbar-right # hvr-float" style=" padding-left: 10px;">
                            <img src="<?= base_url('assets/profil.png') ?>" height="40" width="40" alt="profil" class="main-nav nav navbar-nav navbar-right" style="margin-top: -18px;" />
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <img src="<?= base_url('assets/banner.png') ?>" alt="banner" class="img-fluid" />
</header>