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
    <link rel="stylesheet" href="<?php echo base_url()?>assets/dashboard/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    
</head>

<body>
    <div class="row" style="line-height:24px; font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; color:#555;">

        <div class="">

            <a class="hiddenanchor" id="signup"></a>
            <div class="x_title">
                <h4>Tabel Data Capaian Tahunan <?php echo $tahun; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th rowspan="2" width="30"><center>NO</center></th>
                                <th rowspan="2" width="220"><center>INDIKATOR</center></th>
                                <th rowspan="2" width="100"><center>STANDAR</center></th>
                                <th colspan="12"><center>BULAN</center></th>
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
                            ?>
                            <tr>
                                <td rowspan="1" align="center" height="60"><?php echo $no++; ?></td>
                                <td rowspan="1"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                <td align="center"><b> <?php echo $row->NILAI_STANDAR; ?> </b></td>
                                <td align="center">
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_JAN / $row->DEN_JAN, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_JAN / $row->DEN_JAN, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_JAN / $tt_hari_jan;
                                                $time    = $average / $row->DEN_JAN;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_JAN / $row->$DEN_JAN) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_JAN / $row->DEN_JAN * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_FEB / $row->DEN_FEB, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_FEB / $row->DEN_FEB, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_FEB / $tt_hari_feb;
                                                $time    = $average / $row->DEN_FEB;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_FEB / $row->$DEN_FEB) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_FEB / $row->DEN_FEB * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_MAR / $row->NUM_MAR, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_MAR / $row->NUM_MAR, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_MAR / $tt_hari_mar;
                                                $time    = $average / $row->NUM_MAR;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_MAR / $row->$NUM_MAR) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_MAR == 0 || $row->NUM_MAR == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_MAR / $row->NUM_MAR * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_APR == 0 || $row->NUM_APR == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_APR / $row->NUM_APR, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_APR == 0 || $row->NUM_APR == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_APR / $row->NUM_APR, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_APR == 0 || $row->NUM_APR == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_APR / $tt_hari_apr;
                                                $time    = $average / $row->NUM_APR;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_APR == 0 || $row->NUM_APR == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_APR / $row->$NUM_APR) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_APR == 0 || $row->NUM_APR == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_APR / $row->NUM_APR * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_MEI / $row->NUM_MEI, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_MEI / $row->NUM_MEI, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_MEI / $tt_hari_mei;
                                                $time    = $average / $row->NUM_MEI;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_MEI / $row->$NUM_MEI) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_MEI == 0 || $row->NUM_MEI == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_MEI / $row->NUM_MEI * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_JUN / $row->NUM_JUN, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_JUN / $row->NUM_JUN, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_JUN / $tt_hari_jun;
                                                $time    = $average / $row->NUM_JUN;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_JUN / $row->$NUM_JUN) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_JUN == 0 || $row->NUM_JUN == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_JUN / $row->NUM_JUN * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_JUL / $row->NUM_JUL, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_JUL / $row->NUM_JUL, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_JUL / $tt_hari_jul;
                                                $time    = $average / $row->NUM_JUL;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_JUL / $row->$NUM_JUL) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_JUL == 0 || $row->NUM_JUL == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_JUL / $row->NUM_JUL * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_AGT / $row->NUM_AGT, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_AGT / $row->NUM_AGT, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_AGT / $tt_hari_agt;
                                                $time    = $average / $row->NUM_AGT;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_AGT / $row->$NUM_AGT) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_AGT == 0 || $row->NUM_AGT == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_AGT / $row->NUM_AGT * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_SEP / $row->NUM_SEP, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_SEP / $row->NUM_SEP, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_SEP / $tt_hari_sep;
                                                $time    = $average / $row->NUM_SEP;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_SEP / $row->$NUM_SEP) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_SEP == 0 || $row->NUM_SEP == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_SEP / $row->NUM_SEP * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_OKT / $row->NUM_OKT, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_OKT / $row->NUM_OKT, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_OKT / $tt_hari_okt;
                                                $time    = $average / $row->NUM_OKT;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_OKT / $row->$NUM_OKT) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_OKT == 0 || $row->NUM_OKT == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_OKT / $row->NUM_OKT * 100, 0, 5)." %";
                                            }
                                        }
                                    ?> 
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_NOV / $row->NUM_NOV, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_NOV / $row->NUM_NOV, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_NOV / $tt_hari_nov;
                                                $time    = $average / $row->NUM_NOV;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_NOV / $row->$NUM_NOV) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_NOV == 0 || $row->NUM_NOV == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_NOV / $row->NUM_NOV * 100, 0, 5)." %";
                                            }
                                        }
                                    ?>
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($no == 3)
                                        {
                                            if ($row->NUM_DES == 0 || $row->NUM_DES == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round($row->NUM_DES / $row->NUM_DES, 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->NUM_DES == 0 || $row->NUM_DES == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round($row->NUM_DES / $row->NUM_DES, 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->NUM_DES == 0 || $row->NUM_DES == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $average = $row->NUM_DES / $tt_hari_des;
                                                $time    = $average / $row->NUM_DES;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->NUM_DES == 0 || $row->NUM_DES == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->NUM_DES / $row->$NUM_DES) * 1000, 5);
                                            }
                                        } else {
                                            if ($row->NUM_DES == 0 || $row->NUM_DES == 0) 
                                            {
                                                echo "0  %";
                                            } else {
                                                echo substr($row->NUM_DES / $row->NUM_DES * 100, 0, 5)." %";
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