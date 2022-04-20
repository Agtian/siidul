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

        <div class="x_title">
            <h4>Tabel Data Tahunan <?php echo $tahun; ?></h4>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="table-responsive">
                <table id="" class="table table-striped table-bordered">
                    <thead>
                        <tr class="bg-primary">
                            <th rowspan="2" width="30"><center>NO</center></th>
                            <th rowspan="2" width="200"><center>INDIKATOR</center></th>
                            <th rowspan="2" width="300"><center>SUB INDIKATOR</center></th>
                            <th colspan="12"><center>BULAN</center></th>
                            <th rowspan="2"><center>TOTAL</center></th>
                            <th rowspan="2"><center>PERSEN</center></th>
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
                            foreach ($tahunan_i->result() as $row) {
                        ?>
                        <tr>
                            <td rowspan="2" align="center"><?php echo $no++; ?></td>
                            <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                            <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_JAN == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_JAN / $tt_hari_jan;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_JAN;
                                        }
                                    }
                                ?> 
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_FEB == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_FEB / $tt_hari_feb;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_FEB;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_MAR == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_MAR / $tt_hari_mar;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_MAR;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_APR == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_APR / $tt_hari_apr;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_APR;
                                        }
                                    }
                                ?> 
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_MEI == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_MEI / $tt_hari_mei;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_MEI;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_JUN == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_JUN / $tt_hari_jun;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_JUN;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_JUL == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_JUL / $tt_hari_jul;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_JUL;
                                        }
                                    }
                                ?> 
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_AGT == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_AGT / $tt_hari_agt;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_AGT;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_SEP == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_SEP / $tt_hari_sep;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_SEP;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_OKT == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_OKT / $tt_hari_okt;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_OKT;
                                        }
                                    }
                                ?> 
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_NOV == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_NOV / $tt_hari_nov;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_NOV;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center"> 
                                <?php
                                    if ($no == 6)
                                    {
                                        if ($row->NUM_DES == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            $average = $row->NUM_DES / $tt_hari_des;
                                            echo round($average, 4);
                                        }
                                    } else {
                                        if ($row->TOTAL_NUM == 0) 
                                        {
                                            echo "0";
                                        } else {
                                            echo $row->NUM_DES;
                                        }
                                    }
                                ?>
                            </td>
                            <td align="center">
                                <b> 
                                    <?php
                                        if ($no == 6)
                                        {
                                            if ($row->TOTAL_NUM == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                $average = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) + ($row->NUM_DES / $tt_hari_des);
                                                echo round($average, 2);
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo $row->TOTAL_NUM;
                                            }
                                        }
                                    ?> 
                                </b>
                            </td>
                            <td rowspan="2" align="center">
                                <b> 
                                    <?php 
                                        if ($no == 3)
                                        {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->TOTAL_NUM / $row->TOTAL_DEN), 2);
                                            }
                                        } else if ($no == 5) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->TOTAL_NUM / $row->TOTAL_DEN), 2);
                                            }
                                        } else if ($no == 6) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                            {
                                                echo "00:00:00";
                                            } else {
                                                $tt_average = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) + ($row->NUM_DES / $tt_hari_des);
                                                $time       = $tt_average / $row->TOTAL_DEN;
                                                echo gmdate('H:i:s', floor($time * 86400));
                                            }
                                        } else if ($no == 8) {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0)
                                            {
                                                echo "0";
                                            } else {
                                                echo round(($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000, 1);
                                            }
                                        } else {
                                            if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                            {
                                                echo "0 %";
                                            } else {
                                                echo round(($row->TOTAL_NUM / $row->TOTAL_DEN) * 100, 2)." %";
                                            }
                                        }
                                    ?> 
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td height="50"><?php echo $row->DETAIL_DEN; ?></td>
                            <td align="center"> <?php echo $row->DEN_JAN; ?> </td>
                            <td align="center"> <?php echo $row->DEN_FEB; ?> </td>
                            <td align="center"> <?php echo $row->DEN_MAR; ?> </td>
                            <td align="center"> <?php echo $row->DEN_APR; ?> </td>
                            <td align="center"> <?php echo $row->DEN_MEI; ?> </td>
                            <td align="center"> <?php echo $row->DEN_JUN; ?> </td>
                            <td align="center"> <?php echo $row->DEN_JUL; ?> </td>
                            <td align="center"> <?php echo $row->DEN_AGT; ?> </td>
                            <td align="center"> <?php echo $row->DEN_SEP; ?> </td>
                            <td align="center"> <?php echo $row->DEN_OKT; ?> </td>
                            <td align="center"> <?php echo $row->DEN_NOV; ?> </td>
                            <td align="center"> <?php echo $row->DEN_DES; ?> </td>
                            <td align="center"><b> <?php echo $row->TOTAL_DEN; ?> </b></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
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