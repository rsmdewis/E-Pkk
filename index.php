<?php
session_start();
include 'konek.php';
$level = "pemohon";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pelayanan Surat Keterangan Online Kabupaten Malang</title>
    <!-- core CSS -->
    <link href="main/css/bootstrap.min.css" rel="stylesheet">
    <link href="main/css/font-awesome.min.css" rel="stylesheet">
    <link href="main/css/animate.min.css" rel="stylesheet">
    <link href="main/css/owl.carousel.css" rel="stylesheet">
    <link href="main/css/owl.transitions.css" rel="stylesheet">
    <link href="main/css/prettyPhoto.css" rel="stylesheet">
    <link href="main/css/main.css" rel="stylesheet">
    <link href="main/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>
<!--/head-->

<body id="home" class="homepage">

    <header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="main/img/kabmalang.png" width="55" height="55" alt="logo"></a>
                    <h3 class="wow fadeInUp"><a href="#home">PEMERINTAH KABUPATEN MALANG</a></h3>

                </div>
                <style type="text/css">
                    body {
                        background-image: url('demo');
                    }
                </style>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Beranda</a></li>
                        <li class="scroll"><a href="#features">Jadwal</a></li>
                        <li class="scroll"><a href="#services">Informasi</a></li>
                        <!-- <li class="scroll"><a href="pegawai.php">Pegawai</a></li> -->
                        <li class="scroll"><a href="#get-in-touch">Lokasi</a></li>
                    </ul>
                </div>
            </div>
            <!--/.container-->
        </nav>
        <!--/nav-->
    </header>
    <!--/header-->

    <section id="cta2">
        <div class="container">
            <div class="text-center">
                <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><span>PELAYANAN ADMINISTRASI</span> DESA<br> KABUPATEN MALANG</h2>
                <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">KLIK LOGIN UNTUK REQUEST PEMBUATAN SURAT KETERANGAN
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                            <!-- Button trigger modal -->
                            <a href=" login.php" type="submit" class="btn btn-primary">Login</a>
                            <a href="register.php" type="submit" class="btn btn-primary">Daftar</a>
                        </div>
                        <br>
                    </div>
                </div>
                <img class="img-responsive wow fadeIn" src="main/images/cta2.png" alt="" data-wow-duration="300ms" data-wow-delay="300ms">
            </div>
        </div>
    </section>

    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Waktu Pelayanan</h2>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="main/img/attendance.png" alt="" width="400" height="400">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="main/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SENIN - JUM'AT</h4>
                            <p>00.00 - 00.00 WIB</p>
                        </div>
                    </div>


                    <div class="media service-box wow fadeInRight">
                        <div class="pull-left">
                            <img src="main/img/clock.png" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">SABTU - MINGGU</h4>
                            <p>LIBUR</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Prosedur Permohonan Surat</h2>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Login</h4>
                                <p>Pemohon Surat melakukan login, melalui halaman Login.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number2.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Menginput Data</h4>
                                <p>Input data pemohon dengan sebelumnya melakukan Login dengan username dan password.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number3.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Mengajukan Surat Permohonan</h4>
                                <p>Setelah input data pemohon dengan lengkap dan benar, Pemohon memilih Surat yang mau direquest serta melengkapi data request, Kemudian Dikirim dan Menunggu persetujuan dari KepalaDesa.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box">
                            <div class="pull-left">
                                <img src="main/img/number4.png" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Permohonan Disetujui</h4>
                                <p>Permohonan di setujui oleh KEPALA DESA, kemudian admin desa akan mencetak surat sesuai request surat yang diajukan, pemohon mengambil surat yang sudah dicetak dan bertandatangan di Kantor Desa.</p>
                            </div>
                        </div>
                    </div>
                    <!--/.col-md-4-->

                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </section>
    <!--/#services-->

    <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h3 class="section-title text-center wow fadeInDown" style="color:white">LOKASI</h3>
            </div>
            <i class='fas fa-map-marker-alt' style='font-size:20px;color:#E6E6FA' href=" https://goo.gl/maps/aE9ouZm9Tqns9pN57/">&nbsp;&nbsp;&nbsp;Jl. Panji, Penarukan, Kec. Kepanjen, Kabupaten Malang, Jawa Timur 65163</i>
            <br>
            <br>
            <i class='fas fa-phone' style='font-size:20px;color:#E6E6FA'>&nbsp;&nbsp;&nbsp;Telp. 0341-392029</i>
            <br>
            <br>
            <i class='fas fa-envelope' style='font-size:20px;color:#E6E6FA'>&nbsp;&nbsp;&nbsp;@malangkab.go.id</i>
            <br>
            <br>
            <i class='fa fa-globe' style='font-size:20px;color:#E6E6FA'>&nbsp;&nbsp;&nbsp;https://malangkab.go.id </i>
            <br>
            <br>
        </div>


    </section>

    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <!--Get your own code at fontawesome.com-->
    </head>

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    </head>


    <body>

        <br>

</html>
<!--/#get-in-touch-->


<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; <?php echo date('Y'); ?> PEMERINTAH KABUPATEN MALANG
            </div>
            <div class="col-sm-6">
                <ul class="social-icons wow fadeInUp">
                    <a class="social-media-icon" style='font-size:50px;color:white;' href="https://m.facebook.com/Diskominfo.Malangkab/"><span class="fab fa-facebook"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="social-media-icon" style='font-size:50px;color:white;' href="https://link_social_mendia_anda"><span class="fab fa-twitter"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="social-media-icon" style='font-size:50px;color:white;' href="https://www.instagram.com/kominfokabmlg/"><span class="fab fa-instagram"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="social-media-icon" style='font-size:50px;color:white;' href="https://link_social_mendia_anda"><span class="fab fa-youtube"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="social-media-icon" style='font-size:50px;color:white;' href="https://link_social_mendia_anda"><span class="fab fa-linkedin"></span></a>

                </ul>
            </div>
        </div>
    </div>
</footer>
<!--/#footer-->

<script src="main/js/jquery.js"></script>
<script src="main/js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="main/js/owl.carousel.min.js"></script>
<script src="main/js/mousescroll.js"></script>
<script src="main/js/smoothscroll.js"></script>
<script src="main/js/jquery.prettyPhoto.js"></script>
<script src="main/js/jquery.isotope.min.js"></script>
<script src="main/js/jquery.inview.min.js"></script>
<script src="main/js/wow.min.js"></script>
<script src="main/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>

</html>