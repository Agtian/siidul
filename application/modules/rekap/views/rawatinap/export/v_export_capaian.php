<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/font-awesome/css/font-awesome.min.css">

    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap-datetimepicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">

    <!-- Bootstrap Colorpicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

</head>

<body>
    <div class="row" style="line-height:24px; font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color:#555;">

        <div class="">

            <a class="hiddenanchor" id="signup"></a>
            <div class="x_title">
                <h2>Tabel Data Capaian Tahunan <?php echo $tahun; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th rowspan="2" width="5">
                                    <center>NO</center>
                                </th>
                                <th rowspan="2" width="250">
                                    <center>INDIKATOR</center>
                                </th>
                                <th rowspan="2" width="200">
                                    <center>STANDAR</center>
                                </th>
                                <th colspan="12">
                                    <center>BULAN</center>
                                </th>
                            </tr>
                            <tr class="bg-primary">
                                <th align="center">JAN</th>
                                <th align="center">FEB</th>
                                <th align="center">MAR</th>
                                <th align="center">APR</th>
                                <th align="center">MEI</th>
                                <th align="center">JUN</th>
                                <th align="center">JUL</th>
                                <th align="center">AGT</th>
                                <th align="center">SEP</th>
                                <th align="center">OKT</th>
                                <th align="center">NOV</th>
                                <th align="center">DES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($capaian->result() as $row) {
                                $id_indikator = $row->ID;

                            ?>
                                <tr>
                                    <td rowspan="1" align="center" height="40"><?php echo $no++; ?></td>
                                    <td rowspan="1"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                    <td align="center"><b> <?php echo $row->NILAI_STANDAR; ?> </b></td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_JAN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_JAN / $tt_hari_jan;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_FEB == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_FEB / $tt_hari_feb;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_MAR == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_MAR / $tt_hari_mar;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_APR == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_APR / $tt_hari_apr;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_MEI == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_MEI / $tt_hari_mei;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_JUN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_JUN / $tt_hari_jun;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_JUL == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_JUL / $tt_hari_jul;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_AGT == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_AGT / $tt_hari_agt;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_SEP == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_SEP / $tt_hari_sep;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_OKT == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_OKT / $tt_hari_okt;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_NOV == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_NOV / $tt_hari_nov;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($id_indikator == 10) {
                                            if ($row->NUM_DES == 0) {
                                                echo "0";
                                            } else {
                                                $persen = $row->NUM_DES / $tt_hari_des;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 12) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else if ($id_indikator == 15) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                            } else {
                                                $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                echo round($persen, 2);
                                            }
                                        } else if ($id_indikator == 16) {
                                            if ($row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) {
                                                echo "0";
                                                echo " %";
                                            } else {
                                                $persen = $row->TOTAL_NUM / $row->TOTAL_DEN * 100;
                                                echo round($persen, 2);
                                                echo " %";
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/dashboard/build/js/custom.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/vendors/pdfmake/build/vfs_fonts.js"></script>

</html>