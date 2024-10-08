<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title id="titleWeb">SI IDUL | RSUD dr. Rehatta Provinsi Jawa Tengah</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/font-awesome/css/font-awesome.min.css">
    <!-- NProgress -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/nprogress/nprogress.css">
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css">
    <!-- logo -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/rehatta.png" />
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/build/css/custom.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/css/bootstrap-datepicker3.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/iCheck/skins/flat/green.css">


    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">

    <!-- Bootstrap Colorpicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Chart.js/dist/Chart.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables-new/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables-new/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables-new/vfs-font.min.js"></script>

    <!-- Helper.js -->
    <script src="<?php echo base_url() ?>js/helper.js"></script>

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-book"></i> <span>SI IDUL</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <span>Selamat Datang,</span>
                            <h2><?php echo $this->session->userdata("user_nama"); ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <hr>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">

                            <?php if ($this->session->userdata("user_id_akses") == 1) { ?>
                                <h3> GENERAL </h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> HOME <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('home'); ?>">Dashboard</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> DATA <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('data/input_data'); ?>">Input Data</a></li>
                                            <li><a href="<?php echo base_url('data/ubah_data'); ?>">Ubah Data</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> REKAP DATA <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('rekap/bulanan'); ?>">Rekap Bulanan</a></li>
                                            <li><a href="<?php echo base_url('rekap/triwulan'); ?>">Rekap Triwulan</a></li>
                                            <li><a href="<?php echo base_url('rekap/semester'); ?>">Rekap Semester</a></li>
                                            <li><a href="<?php echo base_url('rekap/tahunan'); ?>">Rekap Tahunan</a></li>
                                            <li><a href="<?php echo base_url('rekap/capaian'); ?>">Rekap Capaian</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-line-chart"></i> GRAFIK CAPAIAN <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('rekap/grafik'); ?>">Grafik Capaian</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> EVALUASI <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('data/evaluasi'); ?>">Faktor</a></li>
                                            <li><a href="<?php echo base_url('data/evaluasi_hasil'); ?>">Hasil</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-book"></i> PROFIL INDIKATOR<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="https://drive.google.com/file/d/1VCoshE77tRlirvSgXejCPPKMNmD4KWo6/view" target="_blank">SPM</a></li>
                                            <li><a href="https://drive.google.com/file/d/1jtvBlByZ5DGkpHXc8QfHdUsRgch9JVdI/view" target="_blank">INM</a></li>
                                            <li><a href="https://drive.google.com/file/d/17Qcljua-ldJCBUmiE9aNbGlEW1PqJqgx/view" target="_blank">IMP-RS dan IMP-UNIT</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <h3> GENERAL </h3>
                                <ul class="nav side-menu">
                                    <li><a href="<?php echo base_url('administrator'); ?>"><i class="fa fa-home"></i> HOME </a></li>
                                    <li><a><i class="fa fa-desktop"></i> REKAP DATA INM<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('data_inm/rekap_bulanan'); ?>">Rekap Bulanan</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> REKAP DATA IMP-RS<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('data_imp/rekap_imp_rs'); ?>">Rekap Capaian</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> REKAP DATA IMP-UNIT<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('data_imp/rekap_imp_unit'); ?>">Rekap Capaian</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i> REKAP DATA <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('lap_rekap/bulanan'); ?>">Rekap Bulanan</a></li>
                                            <li><a href="<?php echo base_url('lap_rekap/triwulan'); ?>">Rekap Triwulan</a></li>
                                            <li><a href="<?php echo base_url('lap_rekap/triwulan_iii_dewas'); ?>">Rekap Triwulan III (Dewas)</a></li>
                                            <li><a href="<?php echo base_url('lap_rekap/semester'); ?>">Rekap Semester</a></li>
                                            <li><a href="<?php echo base_url('lap_rekap/tahunan'); ?>">Rekap Tahunan</a></li>
                                            <li><a href="<?php echo base_url('lap_rekap/capaian'); ?>">Rekap Capaian</a></li>
                                            <li><a href="<?php echo base_url('lap_rekap/capaian_ranap'); ?>">Rekap Capaian Rawat Inap</a></li>
                                        </ul>
                                    </li>
                                </ul>

                                <hr>

                                <ul class="nav side-menu">
                                    <h3> PENGATURAN </h3>
                                    <li><a><i class="fa fa-users"></i> MASTER USER <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('master_user/add'); ?>">Tambah User</a></li>
                                            <li><a href="<?php echo base_url('master_user/data_user'); ?>">Tabel Data User</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-users"></i> MASTER INDIKATOR <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('master_indikator/add'); ?>">Tambah Indikator</a></li>
                                            <li><a href="<?php echo base_url('master_indikator/data_indikator'); ?>">Tabel Data Indikator</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-users"></i> MASTER RUANG <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo base_url('master_ruang/add'); ?>">Tambah Ruangan</a></li>
                                            <li><a href="<?php echo base_url('master_ruang/data_ruang'); ?>">Tabel Data Ruangan</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $this->session->userdata("user_nama"); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="<?php echo base_url('profile'); ?>"> Profile</a></li>
                                    <li><a href="<?php echo base_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <?php echo $contents; ?>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    RSUD dr.Rehatta Provinsi Jawa Tengah - <?php echo date("Y"); ?></a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/nprogress/nprogress.js"></script>

    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/dashboard/build/js/custom.min.js"></script>

    <!-- NProgress -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/iCheck/icheck.min.js"></script>

    <!-- DatePicker -->
    <script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datepicker/locales/bootstrap-datepicker.id.min.js') ?>"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url('assets/dashboard/vendors/moment/min/moment.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

    <!-- bootstrap-datetimepicker -->
    <script src="<?php echo base_url('assets/dashboard/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/js/jquery.chained.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/dashboard/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') ?>"></script>

    <script type="text/javascript">
        $(function() {
            $(".datepicker").datepicker({
                language: 'id',
                locale: "id",
                // daysOfWeekHighlighted: "[0.6]",
                // daysOfWeekDisabled: "0,6",
                orientation: "bottom",
                format: 'yyyy-mm-dd',
                weekStart: '1',
                autoclose: true,
                todayHighlight: true,
                // datesDisabled: [
                //  '11 September 2018','20 November 2018'
                //],
            });
        });
    </script>

    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
    </script>

    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
</body>

</html>