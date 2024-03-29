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
        <div class="x_panel">

            <a class="hiddenanchor" id="signup"></a>
            <div class="x_title">
                <h4>Tabel Data Triwulan I : <?php echo $tahun; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th rowspan="2" width="30"><center>NO</center></th>
                                <th rowspan="2" width="200"><center>INDIKATOR</center></th>
                                <th rowspan="2" width="250"><center>SUB INDIKATOR</center></th>
                                <th colspan="3"><center>BULAN</center></th>
                                <th rowspan="2"><center>TOTAL</center></th>
                                <th rowspan="2"><center>PERSEN</center></th>
                            </tr>
                            <tr class="bg-primary">
                                <th align="center">JAN</th>
                                <th align="center">FEB</th>
                                <th align="center">MAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($triwulan_i->result() as $row) {
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
                                            echo substr($row->NUM_MAR / $tt_hari_mar, 0, 5); 
                                        } else {
                                            echo $row->NUM_MAR;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_JAN) && empty($row->NUM_FEB) && empty($row->NUM_MAR)) 
                                                {
                                                    $persen = ($row->NUM_JAN / $tt_hari_jan) / 1;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && empty($row->NUM_MAR)) {
                                                    $persen = (($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb)) / 2;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($row->NUM_MAR)){
                                                    $persen = (($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->NUM_JAN) && empty($row->NUM_FEB) && empty($row->NUM_MAR)){
                                                    echo "0";
                                                } else {
                                                    echo "";
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
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_JAN) && empty($row->NUM_FEB) && empty($row->NUM_MAR)) 
                                                {
                                                    $num    = ($row->NUM_JAN / $tt_hari_jan) / 1;
                                                    $den    = ($row->DEN_JAN / $tt_hari_jan) / 1;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && empty($row->NUM_MAR)) {
                                                    $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) / 2;
                                                    $den    = ($row->DEN_JAN / $tt_hari_jan) + ($row->DEN_FEB / $tt_hari_feb) / 2;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($row->NUM_MAR)){
                                                    $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) / 3;
                                                    $den    = ($row->DEN_JAN / $tt_hari_jan) + ($row->DEN_FEB / $tt_hari_feb) + ($row->DEN_MAR / $tt_hari_mar) / 3;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else {
                                                    echo "0 %";
                                                }
                                            } else {
                                                if ($row->TOTAL_NUM == 0 && $row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0 %";
                                                } else {
                                                    $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
                                                    echo substr($persen, 0, 4).' %';
                                                }
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
                                        } else  if ($no == 4) {
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
                                        } else  if ($no == 4) {
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
                                        } else  if ($no == 4) {
                                            echo substr($row->DEN_MAR / $tt_hari_mar, 0, 6); 
                                        } else {
                                            echo $row->DEN_MAR;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3' || $no == '4')
                                            {
                                                if (!empty($row->DEN_JAN) && empty($row->DEN_FEB) && empty($row->DEN_MAR)) 
                                                {
                                                    $persen = ($row->DEN_JAN / $tt_hari_jan) / 1;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_JAN) && !empty($row->DEN_FEB) && empty($row->DEN_MAR)) {
                                                    $persen = (($row->DEN_JAN / $tt_hari_jan) + ($row->DEN_FEB / $tt_hari_feb)) / 2;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_JAN) && !empty($row->DEN_FEB) && !empty($row->DEN_MAR)){
                                                    $persen = (($row->DEN_JAN / $tt_hari_jan) + ($row->DEN_FEB / $tt_hari_feb) + ($row->DEN_MAR / $tt_hari_mar)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->DEN_JAN) && empty($row->DEN_FEB) && empty($row->DEN_MAR)){
                                                    echo "0";
                                                } else {
                                                    echo "";
                                                }
                                            } else {
                                                if ($row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0";
                                                } else {
                                                    echo $row->TOTAL_DEN;
                                                }
                                            }
                                        ?> 
                                    </b>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="x_title">
                <h4>Tabel Data Triwulan II : <?php echo $tahun; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th rowspan="2" width="30"><center>NO</center></th>
                                <th rowspan="2" width="200"><center>INDIKATOR</center></th>
                                <th rowspan="2" width="250"><center>SUB INDIKATOR</center></th>
                                <th colspan="3"><center>BULAN</center></th>
                                <th rowspan="2"><center>TOTAL</center></th>
                                <th rowspan="2"><center>PERSEN</center></th>
                            </tr>
                            <tr class="bg-primary">
                                <th align="center">APR</th>
                                <th align="center">MEI</th>
                                <th align="center">JUN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($triwulan_ii->result() as $row) {
                            ?>
                            <tr>
                                <td rowspan="2" align="center"><?php echo $no++; ?></td>
                                <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
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
                                            echo substr($row->NUM_JUN / $tt_hari_jun, 0, 5); 
                                        } else {
                                            echo $row->NUM_JUN;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_APR) && empty($row->NUM_MEI) && empty($row->NUM_JUN)) 
                                                {
                                                    $persen = ($row->NUM_APR / $tt_hari_apr) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_APR) && !empty($row->NUM_MEI) && empty($row->NUM_JUN)) {
                                                    $persen = (($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei)) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_APR) && !empty($row->NUM_MEI) && !empty($NUM_JUN)){
                                                    $persen = (($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->NUM_APR) && empty($row->NUM_MEI) && empty($NUM_JUN)){
                                                    echo "0";
                                                } else {
                                                    echo "";
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
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_APR) && empty($row->NUM_MEI) && empty($row->NUM_JUN)) 
                                                {
                                                    $num    = ($row->NUM_APR / $tt_hari_apr) / 1;
                                                    $den    = ($row->DEN_APR / $tt_hari_apr) / 1;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_APR) && !empty($row->NUM_MEI) && empty($row->NUM_JUN)) {
                                                    $num    = ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) / 2;
                                                    $den    = ($row->DEN_APR / $tt_hari_apr) + ($row->DEN_MEI / $tt_hari_mei) / 2;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_APR) && !empty($row->NUM_MEI) && !empty($row->NUM_JUN)){
                                                    $num    = ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) / 3;
                                                    $den    = ($row->DEN_APR / $tt_hari_apr) + ($row->DEN_MEI / $tt_hari_mei) + ($row->DEN_JUN / $tt_hari_jun) / 3;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else {
                                                    echo "0 %";
                                                }
                                            } else {
                                                if ($row->TOTAL_NUM == 0 && $row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0 %";
                                                } else {
                                                    $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
                                                    echo substr($persen, 0, 4).' %';
                                                }
                                            }
                                        ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row->DETAIL_DEN; ?></td>
                                <td align="center"> 
                                    <?php
                                        if ($row->DEN_APR == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->DEN_APR / $tt_hari_apr, 0, 6); 
                                        } else  if ($no == 4) {
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
                                        } else  if ($no == 4) {
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
                                        } else  if ($no == 4) {
                                            echo substr($row->DEN_JUN / $tt_hari_jun, 0, 6); 
                                        } else {
                                            echo $row->DEN_JUN;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3' || $no == '4')
                                            {
                                                if (!empty($row->DEN_APR) && empty($row->DEN_MEI) && empty($row->DEN_JUN)) 
                                                {
                                                    $persen = ($row->DEN_APR / $tt_hari_apr) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_APR) && !empty($row->DEN_MEI) && empty($row->DEN_JUN)) {
                                                    $persen = (($row->DEN_APR / $tt_hari_apr) + ($row->DEN_MEI / $tt_hari_mei)) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_APR) && !empty($row->DEN_MEI) && !empty($row->DEN_JUN)){
                                                    $persen = (($row->DEN_APR / $tt_hari_apr) + ($row->DEN_MEI / $tt_hari_mei) + ($row->DEN_JUN / $tt_hari_jun)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->DEN_APR) && empty($row->DEN_MEI) && empty($row->DEN_JUN)){
                                                    echo "0";
                                                } else {
                                                    echo "";
                                                }
                                            } else {
                                                if ($row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0";
                                                } else {
                                                    echo $row->TOTAL_DEN;
                                                }
                                            }
                                        ?> 
                                    </b>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="x_title">
                <h4>Tabel Data Triwulan III : <?php echo $tahun; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th rowspan="2" width="30"><center>NO</center></th>
                                <th rowspan="2" width="200"><center>INDIKATOR</center></th>
                                <th rowspan="2" width="250"><center>SUB INDIKATOR</center></th>
                                <th colspan="3"><center>BULAN</center></th>
                                <th rowspan="2"><center>TOTAL</center></th>
                                <th rowspan="2"><center>PERSEN</center></th>
                            </tr>
                            <tr class="bg-primary">
                                <th align="center">JUL</th>
                                <th align="center">AGT</th>
                                <th align="center">SEP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($triwulan_iii->result() as $row) {
                            ?>
                            <tr>
                                <td rowspan="2" align="center"><?php echo $no++; ?></td>
                                <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
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
                                            echo substr($row->NUM_SEP / $tt_hari_sep, 0, 5); 
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
                                                if (!empty($row->NUM_JUL) && empty($row->NUM_AGT) && empty($row->NUM_SEP)) 
                                                {
                                                    $persen = ($row->NUM_JUL / $tt_hari_jul) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_JUL) && !empty($row->NUM_AGT) && empty($row->NUM_SEP)) {
                                                    $persen = (($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt)) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_JUL) && !empty($row->NUM_AGT) && !empty($row->NUM_SEP)){
                                                    $persen = (($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->NUM_JUL) && empty($row->NUM_AGT) && empty($row->NUM_SEP)){
                                                    echo "0";
                                                } else {
                                                    echo "";
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
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_JUL) && empty($row->NUM_AGT) && empty($row->NUM_SEP)) 
                                                {
                                                    $num    = ($row->NUM_JUL / $tt_hari_jul) / 1;
                                                    $den    = ($row->DEN_JUL / $tt_hari_jul) / 1;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_JUL) && !empty($row->NUM_AGT) && empty($row->NUM_SEP)) {
                                                    $num    = ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) / 2;
                                                    $den    = ($row->DEN_JUL / $tt_hari_jul) + ($row->DEN_AGT / $tt_hari_agt) / 2;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_JUL) && !empty($row->NUM_AGT) && !empty($row->NUM_SEP)){
                                                    $num    = ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) / 3;
                                                    $den    = ($row->DEN_JUL / $tt_hari_jul) + ($row->DEN_AGT / $tt_hari_agt) + ($row->DEN_SEP / $tt_hari_sep) / 3;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else {
                                                    echo "0 %";
                                                }
                                            } else {
                                                if ($row->TOTAL_NUM == 0 && $row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0 %";
                                                } else {
                                                    $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
                                                    echo substr($persen, 0, 4).' %';
                                                }
                                            }
                                        ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row->DETAIL_DEN; ?></td>
                                <td align="center"> 
                                    <?php
                                        if ($row->DEN_JUL == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->DEN_JUL / $tt_hari_jul, 0, 6); 
                                        } else  if ($no == 4) {
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
                                        } else  if ($no == 4) {
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
                                            echo substr($row->DEN_SEP / $tt_hari_jun, 0, 6); 
                                        } else  if ($no == 4) {
                                            echo substr($row->DEN_SEP / $tt_hari_jun, 0, 6); 
                                        } else {
                                            echo $row->DEN_SEP;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3' || $no == '4')
                                            {
                                                if (!empty($row->DEN_JUL) && empty($row->DEN_AGT) && empty($row->DEN_SEP)) 
                                                {
                                                    $persen = ($row->DEN_JUL / $tt_hari_jul) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_JUL) && !empty($row->DEN_AGT) && empty($row->DEN_SEP)) {
                                                    $persen = (($row->DEN_JUL / $tt_hari_jul) + ($row->DEN_AGT / $tt_hari_agt)) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_JUL) && !empty($row->DEN_AGT) && !empty($row->DEN_SEP)){
                                                    $persen = (($row->DEN_JUL / $tt_hari_jul) + ($row->DEN_AGT / $tt_hari_agt) + ($row->DEN_SEP / $tt_hari_jun)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->DEN_JUL) && empty($row->DEN_AGT) && empty($row->DEN_SEP)){
                                                    echo "0";
                                                } else {
                                                    echo "";
                                                }
                                            } else {
                                                if ($row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0";
                                                } else {
                                                    echo $row->TOTAL_DEN;
                                                }
                                            }
                                        ?> 
                                    </b>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="x_title">
                <h4>Tabel Data Triwulan IV : <?php echo $tahun; ?></h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="" class="table table-striped table-bordered">
                        <thead>
                            <tr class="bg-primary">
                                <th rowspan="2" width="30"><center>NO</center></th>
                                <th rowspan="2" width="200"><center>INDIKATOR</center></th>
                                <th rowspan="2" width="250"><center>SUB INDIKATOR</center></th>
                                <th colspan="3"><center>BULAN</center></th>
                                <th rowspan="2"><center>TOTAL</center></th>
                                <th rowspan="2"><center>PERSEN</center></th>
                            </tr>
                            <tr class="bg-primary">
                                <th align="center">OKT</th>
                                <th align="center">NOV</th>
                                <th align="center">DES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach ($triwulan_iv->result() as $row) {
                            ?>
                            <tr>
                                <td rowspan="2" align="center"><?php echo $no++; ?></td>
                                <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
                                <td align="center"> 
                                    <?php
                                        if ($row->NUM_OKT == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->NUM_OKT / $tt_hari_okt, 0, 6); 
                                        } else {
                                            echo $row->NUM_OKT;
                                        }
                                    ?> 
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($row->NUM_NOV == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->NUM_NOV / $tt_hari_nov, 0, 6); 
                                        } else {
                                            echo $row->NUM_NOV;
                                        }
                                    ?> 
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($row->NUM_DES == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->NUM_DES / $tt_hari_des, 0, 5); 
                                        } else {
                                            echo $row->NUM_DES;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($row->NUM_DES)) 
                                                {
                                                    $persen = ($row->NUM_OKT / $tt_hari_okt) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_OKT) && !empty($row->NUM_NOV) && empty($row->NUM_DES)) {
                                                    $persen = (($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov)) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->NUM_OKT) && !empty($row->NUM_NOV) && !empty($row->NUM_DES)){
                                                    $persen = (($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) + ($row->NUM_DES / $tt_hari_des)) / 3;
                                                    echo round($persen, 5);
                                                } else if (empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($row->NUM_DES)){
                                                    echo "0";
                                                } else {
                                                    echo "";
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
                                            if ($no == '3')
                                            {
                                                if (!empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($row->NUM_DES)) 
                                                {
                                                    $num    = ($row->NUM_OKT / $tt_hari_okt) / 1;
                                                    $den    = ($row->DEN_OKT / $tt_hari_okt) / 1;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_OKT) && !empty($row->NUM_NOV) && empty($row->NUM_DES)) {
                                                    $num    = ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) / 2;
                                                    $den    = ($row->DEN_OKT / $tt_hari_okt) + ($row->DEN_AGT / $tt_hari_nov) / 2;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else if (!empty($row->NUM_OKT) && !empty($row->NUM_NOV) && !empty($row->NUM_DES)){
                                                    $num    = ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) + ($row->NUM_DES / $tt_hari_des) / 3;
                                                    $den    = ($row->DEN_OKT / $tt_hari_okt) + ($row->DEN_AGT / $tt_hari_nov) + ($row->DEN_SEP / $tt_hari_des) / 3;
                                                    $persen = $num / $den * 100;
                                                    echo round($persen, 2);
                                                } else {
                                                    echo "0 %";
                                                }
                                            } else {
                                                if ($row->TOTAL_NUM == 0 && $row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0 %";
                                                } else {
                                                    $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
                                                    echo substr($persen, 0, 4).' %';
                                                }
                                            }
                                        ?>
                                    </b>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row->DETAIL_DEN; ?></td>
                                <td align="center"> 
                                    <?php
                                        if ($row->DEN_OKT == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->DEN_OKT / $tt_hari_okt, 0, 6); 
                                        } else  if ($no == 4) {
                                            echo substr($row->DEN_OKT / $tt_hari_okt, 0, 6); 
                                        } else {
                                            echo $row->DEN_OKT;
                                        }
                                    ?> 
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($row->DEN_NOV == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->DEN_NOV / $tt_hari_nov, 0, 6); 
                                        } else  if ($no == 4) {
                                            echo substr($row->DEN_NOV / $tt_hari_nov, 0, 6); 
                                        } else {
                                            echo $row->DEN_NOV;
                                        }
                                    ?> 
                                </td>
                                <td align="center"> 
                                    <?php
                                        if ($row->DEN_DES == 0)
                                        {
                                            echo "0";
                                        } else if ($no == 3) {
                                            echo substr($row->DEN_DES / $tt_hari_des, 0, 6); 
                                        } else  if ($no == 4) {
                                            echo substr($row->DEN_DES / $tt_hari_des, 0, 6); 
                                        } else {
                                            echo $row->DEN_DES;
                                        }
                                    ?> 
                                </td>
                                <td align="center">
                                    <b> 
                                        <?php 
                                            if ($no == '3' || $no == '4')
                                            {
                                                if (!empty($row->DEN_OKT) && empty($row->DEN_NOV) && empty($row->DEN_DES)) 
                                                {
                                                    $persen = ($row->DEN_OKT / $tt_hari_okt) / 3;
                                                    // echo round($persen, 5);
                                                } else if (!empty($row->DEN_OKT) && !empty($row->DEN_NOV) && empty($row->DEN_DES)) {
                                                    $persen = (($row->DEN_OKT / $tt_hari_okt) + ($row->DEN_NOV / $tt_hari_nov)) / 3;
                                                    echo round($persen, 5);
                                                } else if (!empty($row->DEN_OKT) && !empty($row->DEN_NOV) && !empty($row->DEN_DES)){
                                                    $persen = (($row->DEN_OKT / $tt_hari_okt) + ($row->DEN_NOV / $tt_hari_nov) + ($row->DEN_DES / $tt_hari_des)) / 3;
                                                    // echo round($persen, 5);
                                                } else if (empty($row->DEN_OKT) && empty($row->DEN_NOV) && empty($row->DEN_DES)){
                                                    echo "0";
                                                } else {
                                                    echo "";
                                                }
                                            } else {
                                                if ($row->TOTAL_DEN == 0) 
                                                {
                                                    echo "0";
                                                } else {
                                                    echo $row->TOTAL_DEN;
                                                }
                                            }
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