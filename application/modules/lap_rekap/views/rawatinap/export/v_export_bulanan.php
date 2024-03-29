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
        <h2>Tabel Data : <?php echo formatNamaBulan($bulan).' '.$tahun; ?></h2>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
                <tr class="bg-primary">
                    <th rowspan="2" width="5"><center>NO</center></th>
                    <th rowspan="2" width="150"><center>INDIKATOR</center></th>
                    <th rowspan="2" width="250"><center>SUB INDIKATOR</center></th>
                    <th colspan="<?php echo $total_hari; ?>" ><center>TANGGAL</center></th>
                    <th rowspan="2"><center>TOTAL</center></th>
                    <th rowspan="2" width="65"><center>PERSEN</center></th>
                </tr>
                <tr class="bg-primary">
                    <?php 
                        foreach ($get_date->result() as $date) {
                            echo '<th><center> '.$date->DATE.' </center></th>';
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    $tanggal    = $total_hari;
                    foreach ($data_indikator->result() as $row) {
                        $id_indikator = $row->ID;

                ?>
                <tr>
                    <td rowspan="2" align="center"><?php echo $no++; ?></td>
                    <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                    <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>


                    <?php 
                        $total_num  = 0; 
                        $total_den  = 0;
                        $data       = $this->Rekap_model->get_data_bulanan($row->ID, $id_ruang_sub, $bulan, $tahun);
                        if ($total_hari == $total_hari) {
                            foreach ($data->result() as $key) 
                            {
                                if ($id_indikator == 10) {
                                    $total_num += $key->NUM;
                                    $total_den += $key->DEN;
                                    echo '<td align="center"> '.$key->NUM.' </td>';
                                } else if ($id_indikator == 12) {
                                    $total_num += $key->NUM;
                                    $total_den += $key->DEN;
                                    echo '<td align="center"> '.$key->NUM.' </td>';
                                } else {
                                    echo '<td align="center"> '.$key->NUM.' </td>';
                                    $total_num += $key->NUM;
                                    $total_den += $key->DEN;
                                }                                                
                            }

                        } else {

                            $data = $this->Rekap_model->get_data_bulanan($row->ID, $id_ruang_sub, $bulan, $tahun);
                            foreach ($data->result() as $key) 
                            {
                                echo '<td align="center"> '.$key->NUM.' </td>';
                            }
                        } 
                    ?>
                    <td align="center"> 
                        <b>
                            <?php 
                                $average_3 = $total_num / $total_hari;
                                if ($id_indikator == 10) 
                                {
                                    if (empty($average_3))
                                    {
                                        echo "0";
                                    } else {
                                        echo $average_3;
                                    }
                                } else {
                                    if (empty($total_num))
                                    {
                                        echo "0";
                                    } else {
                                        echo $total_num;
                                    }
                                }
                            ?>
                        </b> 
                    </td>
                    <td rowspan="2"> 
                        <b><center>
                            <?php
                                if ($id_indikator == 10) {
                                    if ($total_num == 0)
                                    {
                                        echo "0";
                                    } else {
                                        $average_3 = $total_num / $total_hari;
                                        echo $average_3;
                                    }
                                } else if ($id_indikator == 12) {
                                    if ($total_num == 0 || $total_den == 0)
                                    {
                                        echo "0";
                                        echo " %";
                                    } else {
                                        $persen = $total_num / $total_den;
                                        echo round($persen, 2);
                                        echo " %";
                                    }
                                } else if ($id_indikator == 15) {
                                    if ($total_num == 0 || $total_den == 0)
                                    {
                                        echo "0";
                                    } else {
                                        $persen = ($total_num / $total_den) * 1000;
                                        echo round($persen, 2);
                                    }
                                } else if ($id_indikator == 16) {
                                    if ($total_den == 0)
                                    {
                                        echo "0";
                                        echo " %";
                                    } else {
                                        $persen = ($total_num / $total_den) *  100;
                                        echo round($persen, 2);
                                        echo " %";
                                    }
                                } else {
                                    if ($total_num == 0 || $total_den == 0)
                                    {
                                        echo "0";
                                        echo " %";
                                    } else {
                                        $persen = $total_num / $total_den * 100;
                                        echo round($persen, 2);
                                        echo " %";
                                    }
                                }
                            ?>
                        </center></b> 
                    </td>
                </tr>
                <tr>
                    <td><?php echo $row->DETAIL_DEN; ?></td>
                    <?php if ($total_hari == $total_hari) {
                        $tanggal    = $total_hari;
                        foreach ($data->result() as $key) 
                        {
                            echo '<td align="center"> '.$key->DEN.' </td>';
                        }
                        while($total_hari < $total_hari) 
                        {
                            $tanggal++;
                            echo '<td align="center"> N/A </td>';
                        }
                    } else { 
                        foreach ($data->result() as $key) 
                        {
                            echo '<td align="center"> '.$key->DEN.' </td>';
                        }
                    } ?>
                    <td align="center"> <b><?php echo $total_den; ?></b> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
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