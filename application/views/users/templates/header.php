<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?= $title; ?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Edulearn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

        function AutoRefresh(t) {
            setTimeout("location.reload(true);", t);
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--// Meta tag Keywords -->

    <!-- Custom-Files -->
    <!-- Bootstrap-Core-Css -->
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/custom.css">
    <!-- Style-Css -->
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/style.css" type="text/css" media="all" />
    <!-- Font-Awesome-Icons-Css -->
    <link rel="stylesheet" href="<?= base_url('assets/users/'); ?>css/fontawesome-all.css">
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //Web-Fonts -->

    <style>
        @media screen and (max-width: 640px) {
            .cek {
                margin-left: 150px;
            }
        }
    </style>

</head>

<body>
    <!-- header -->
    <header>
        <!-- top header -->
        <div style="background-color:#1D244F" class="top-head-w3ls py-2">
            <div class="container">
                <div class="row">
                    <h1 class="text-capitalize text-white col-7">
                        <i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>e-learning</h1>
                    <!-- social icons -->
                    <a style="margin-left:265px" class="btn btn-primary dropdown-toggle text-right" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo base_url(); ?>assets/users/images/user.png ">
                        <?php
                        $nip = $this->session->userdata('nip');
                        $nis = $this->session->userdata('nis');
                        if ($nip) {
                            $guru = "SELECT * FROM guru WHERE nip=$nip";
                            $nama = $this->db->query($guru)->row();
                            echo $nama->nama;
                        } else if ($nis) {
                            $siswa = "SELECT * FROM siswa WHERE nis=$nis";
                            $nama = $this->db->query($siswa)->row();
                            echo $nama->nama;
                        } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="btn btn-primary dropdown-item" href="<?= base_url('Auth/logout/'); ?>">Edit Password</a>
                        <a class="btn btn-primary dropdown-item" href="<?= base_url('Auth/logout/'); ?>">Logout</a>
                    </div>
                    <!-- //social icons -->
                </div>
            </div>
        </div>
        <!-- //top header -->
        <!-- middle header -->
        <div style="background-color:#182A6E" class="middle-w3ls-nav py-2">
            <div class="container">
                <div class="row">
                    <img class="cek" src="<?php echo base_url(); ?>assets/users/images/LOGOBRO.png" alt="Image" height="100" width="100">
                    <a class="logo  font-weight-bold col-lg-4 text-lg-left text-center" href="index.html">SMAN 1 Bondowoso</a>

                </div>
            </div>
        </div>
        <!-- //middle header -->
    </header>

    <!-- //header -->