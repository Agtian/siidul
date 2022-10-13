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

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <a class="hiddenanchor" id="signup"></a>
                <div class="x_title">
                    <h4>Tabel Data Indikator Mutu Ruang <?= $nama_ruang; ?> Triwulan III <?php echo $tahun; ?></h4>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th rowspan="2" width="30"><center>NO</center></th>
                                    <th rowspan="2" width="200"> <center>INDIKATOR</center></th>
                                    <th rowspan="2" width="250"><center>SUB INDIKATOR</center></th>
                                    <th colspan="9"><center>BULAN</center></th>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach ($triwulan->result() as $row) {
                                ?>
                                <tr>
                                    <td rowspan="2" align="center"><?php echo $no++; ?></td>
                                    <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                    <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_JAN == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_JAN / $tt_hari_jan, 0, 6); 
                                            } else {
                                                echo $row->NUM_JAN;
                                            }
                                        ?> 
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_FEB == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_FEB / $tt_hari_feb, 0, 6); 
                                            } else {
                                                echo $row->NUM_FEB;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_MAR == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_MAR / $tt_hari_mar, 0, 6); 
                                            } else {
                                                echo $row->NUM_MAR;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_APR == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_APR / $tt_hari_apr, 0, 6); 
                                            } else {
                                                echo $row->NUM_APR;
                                            }
                                        ?>
                                    </td>
                                    <td align="center"> 
                                        <?php
                                            if ($row->NUM_MEI == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_MEI / $tt_hari_mei, 0, 6); 
                                            } else {
                                                echo $row->NUM_MEI;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_JUN == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_JUN / $tt_hari_jun, 0, 6); 
                                            } else {
                                                echo $row->NUM_JUN;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_JUL == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_JUL / $tt_hari_jul, 0, 6); 
                                            } else {
                                                echo $row->NUM_JUL;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_AGT == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_AGT / $tt_hari_agt, 0, 6); 
                                            } else {
                                                echo $row->NUM_AGT;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->NUM_SEP == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->NUM_SEP / $tt_hari_sep, 0, 6); 
                                            } else {
                                                echo $row->NUM_SEP;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <b> 
                                        <?php 
                                                if ($no == '3')
                                                {
                                                    if ($row->TOTAL_NUM_TW_I == 0) 
                                                    {
                                                        echo " 0";
                                                    } else {
                                                        $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep);
                                                        $total = $num / 9;
                                                        echo substr($total, 0, 6); 
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM_TW_I == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $total = $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                        echo substr($total, 0, 6);
                                                    }
                                                }
                                            ?>
                                        </b>
                                    </td>
                                    <td rowspan="2" align="center">
                                        <b> 
                                            <?php 
                                                $total_row = $row->TOTAL_NUM_TW_I + $row->TOTAL_NUM_TW_II + $row->TOTAL_NUM_TW_III;
                                                $total_den = $row->TOTAL_DEN_TW_I + $row->TOTAL_DEN_TW_II + $row->TOTAL_DEN_TW_III;
                                                if ($total_row == 0) 
                                                {
                                                    echo "0 %";
                                                } else {
                                                    echo round(($total_row / $total_den) * 100, 2);
                                                    echo " %";
                                                }
                                            ?>  
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo $row->DETAIL_DEN; ?></td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_JAN == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_JAN / $tt_hari_jan, 0, 6); 
                                            } else {
                                                echo $row->DEN_JAN;
                                            }
                                        ?> 
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_FEB == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_FEB / $tt_hari_feb, 0, 6); 
                                            } else {
                                                echo $row->DEN_FEB;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_MAR == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_MAR / $tt_hari_mar, 0, 6); 
                                            } else {
                                                echo $row->DEN_MAR;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_APR == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_APR / $tt_hari_apr, 0, 6); 
                                            } else {
                                                echo $row->DEN_APR;
                                            }
                                        ?>
                                    </td>
                                    <td align="center"> 
                                        <?php
                                            if ($row->DEN_MEI == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_MEI / $tt_hari_mei, 0, 6); 
                                            } else {
                                                echo $row->DEN_MEI;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_JUN == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_JUN / $tt_hari_jun, 0, 6); 
                                            } else {
                                                echo $row->DEN_JUN;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_JUL == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_JUL / $tt_hari_jul, 0, 6); 
                                            } else {
                                                echo $row->DEN_JUL;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_AGT == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_AGT / $tt_hari_agt, 0, 6); 
                                            } else {
                                                echo $row->DEN_AGT;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                            if ($row->DEN_SEP == 0)
                                            {
                                                echo "0";
                                            } else if ($no == 3) {
                                                echo substr($row->DEN_SEP / $tt_hari_sep, 0, 6); 
                                            } else {
                                                echo $row->DEN_SEP;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <b> 
                                            <?php
                                                if ($row->TOTAL_DEN_TW_I == 0) 
                                                {
                                                    echo "0";
                                                } else {
                                                    $den    = ($row->DEN_JAN / $tt_hari_jan) + ($row->DEN_FEB / $tt_hari_feb) + ($row->DEN_MAR / $tt_hari_mar) + ($row->DEN_APR / $tt_hari_apr) + ($row->DEN_MEI / $tt_hari_mei) + ($row->DEN_JUN / $tt_hari_jun) + ($row->DEN_JUL / $tt_hari_jul) + ($row->DEN_AGT / $tt_hari_agt) + ($row->DEN_SEP / $tt_hari_sep);
                                                    $total = substr($den / 9, 0, 6);
                                                    echo $total;
                                                }                                                        ;
                                            ?>
                                        </b>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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