<div class="right_col" role="main">
    <div class="page-title">
        <div class="clearfix"></div>

        <?php echo $this->session->userdata('message') ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <a class="hiddenanchor" id="signup"></a>
                    <div class="x_title">
                        <h2>Tabel Data Capaian Tahunan <?php echo $tahun; ?></h2> <a href="<?= base_url('lap_rekap/export_capaian_ranap'); ?>" class="btn btn-primary btn-sm pull-right" target="_blank">Download PDF</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="5"><center>NO</center></th>
                                        <th rowspan="2"><center>INDIKATOR</center></th>
                                        <th rowspan="2"><center>STANDAR</center></th>
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
                                        <td rowspan="1"><?php echo $no++; ?></td>
                                        <td rowspan="1"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                        <td align="center"><b> <?php echo $row->NILAI_STANDAR; ?> </b></td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_JAN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_JAN / $tt_hari_jan, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr(($row->NUM_JAN / $row->DEN_JAN) * 100, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_JAN / $row->DEN_JAN) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_JAN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_JAN / $row->DEN_JAN) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_JAN == 0 || $row->DEN_JAN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_JAN / $row->DEN_JAN) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_FEB == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_FEB / $tt_hari_feb, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr(($row->NUM_FEB / $row->DEN_FEB) * 100, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_FEB / $row->DEN_FEB) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_FEB == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_FEB / $row->DEN_FEB) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_FEB == 0 || $row->DEN_FEB == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_FEB / $row->DEN_FEB) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?>                                         
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_MAR == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_MAR / $tt_hari_mar, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_MAR == 0 || $row->DEN_MAR == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_MAR / $row->DEN_MAR, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_MAR == 0 || $row->DEN_MAR == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_MAR / $row->DEN_MAR) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_MAR == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_MAR / $row->DEN_MAR) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_MAR == 0 || $row->DEN_MAR == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_MAR / $row->DEN_MAR) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_APR == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_APR / $tt_hari_apr, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_APR == 0 || $row->DEN_APR == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_APR / $row->DEN_APR, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_APR == 0 || $row->DEN_APR == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_APR / $row->DEN_APR) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_APR == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_APR / $row->DEN_APR) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_APR == 0 || $row->DEN_APR == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_APR / $row->DEN_APR) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_MEI == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_MEI / $tt_hari_mei, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_MEI == 0 || $row->DEN_MEI == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_MEI / $row->DEN_MEI, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_MEI == 0 || $row->DEN_MEI == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_MEI / $row->DEN_MEI) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_MEI == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_MEI / $row->DEN_MEI) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_MEI == 0 || $row->DEN_MEI == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_MEI / $row->DEN_MEI) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_JUN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_JUN / $tt_hari_jun, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_JUN == 0 || $row->DEN_JUN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_JUN / $row->DEN_JUN, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_JUN == 0 || $row->DEN_JUN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_JUN / $row->DEN_JUN) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_JUN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_JUN / $row->DEN_JUN) * (1 / 100), 0 , 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_JUN == 0 || $row->DEN_JUN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_JUN / $row->DEN_JUN) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_JUL == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_JUL / $tt_hari_jul, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_JUL == 0 || $row->DEN_JUL == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_JUL / $row->DEN_JUL, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_JUL == 0 || $row->DEN_JUL == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_JUL / $row->DEN_JUL) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_JUL == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_JUL / $row->DEN_JUL) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_JUL == 0 || $row->DEN_JUL == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_JUL / $row->DEN_JUL) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_AGT == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_AGT / $tt_hari_agt, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_AGT == 0 || $row->DEN_AGT == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_AGT / $row->DEN_AGT, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_AGT == 0 || $row->DEN_AGT == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_AGT / $row->DEN_AGT) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_AGT == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_AGT / $row->DEN_AGT) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_AGT == 0 || $row->DEN_AGT == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_AGT / $row->DEN_AGT) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_SEP == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_SEP / $tt_hari_sep, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_SEP == 0 || $row->DEN_SEP == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_SEP / $row->DEN_SEP, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_SEP == 0 || $row->DEN_SEP == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_SEP / $row->DEN_SEP) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_SEP == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_SEP / $row->DEN_SEP) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_SEP == 0 || $row->DEN_SEP == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_SEP / $row->DEN_SEP) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_OKT == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_OKT / $tt_hari_okt, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_OKT == 0 || $row->DEN_OKT == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_OKT / $row->DEN_OKT, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_OKT == 0 || $row->DEN_OKT == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_OKT / $row->DEN_OKT) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_OKT == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_OKT / $row->DEN_OKT) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_OKT == 0 || $row->DEN_OKT == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_OKT / $row->DEN_OKT) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_NOV == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_NOV / $tt_hari_nov, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_NOV == 0 || $row->DEN_NOV == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_NOV / $row->DEN_NOV, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_NOV == 0 || $row->DEN_NOV == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_NOV / $row->DEN_NOV) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_NOV == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_NOV / $row->DEN_NOV) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_NOV == 0 || $row->DEN_NOV == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_NOV / $row->DEN_NOV) * 100, 0, 5);
                                                        echo " %";
                                                    }
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php 
                                                if ($no == '4')
                                                {
                                                    if ($row->NUM_DES == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr($row->NUM_DES / $tt_hari_des, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->NUM_DES == 0 || $row->DEN_DES == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = substr($row->NUM_DES / $row->DEN_DES, 0, 5);
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->NUM_DES == 0 || $row->DEN_DES == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = substr(($row->NUM_DES / $row->DEN_DES) * 1000, 0, 5);
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->DEN_DES == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_DES / $row->DEN_DES) * (1 / 100), 0, 5);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->NUM_DES == 0 || $row->DEN_DES == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo substr(($row->NUM_DES / $row->DEN_DES) * 100, 0, 5);
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
        </div>
    </div>
</div>