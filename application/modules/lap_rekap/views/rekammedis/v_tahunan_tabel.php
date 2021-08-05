<div class="right_col" role="main">
    <div class="page-title">
        <div class="clearfix"></div>

        <?php echo $this->session->userdata('message') ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Filter Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php echo form_open('lap_rekap/tahunan', 'class="form-horizontal "'); ?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">RUANG</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="id_sub_ruang" required>
                                        <?php foreach ($list_ruang->result() as $dd) { ?>
                                            <option value="<?php echo $dd->ID; ?>"> <?php echo $dd->NAMA_SUB_RUANG; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">TAHUN</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="tahun" required>
                                        <?php foreach ($list_tahun->result() as $dd) { ?>
                                            <option value="<?php echo $dd->TAHUN; ?>"> <?php echo $dd->TAHUN; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('lap_rekap/export_tahunan/').$id_ruang_sub.'/'.$tahun; ?>">Export PDF</a>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <a class="hiddenanchor" id="signup"></a>
                    <div class="x_title">
                        <h2>Tabel Data Tahunan <?php echo $tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="5"><center>NO</center></th>
                                        <th rowspan="2"><center>INDIKATOR</center></th>
                                        <th rowspan="2"><center>SUB INDIKATOR</center></th>
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
                                        <td rowspan="2"><?php echo $no++; ?></td>
                                        <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                        <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_JAN == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_JAN / $tt_hari_jan, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_JAN / $tt_hari_jan, 5); 
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
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_FEB / $tt_hari_feb, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_FEB / $tt_hari_feb, 5); 
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
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_MAR / $tt_hari_mar, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_MAR / $tt_hari_mar, 5); 
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
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_APR / $tt_hari_apr, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_APR / $tt_hari_apr, 5); 
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
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_MEI / $tt_hari_mei, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_MEI / $tt_hari_mei, 5); 
                                                } else {
                                                    echo $row->NUM_MEI;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->DEN_JUN == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 4) {
                                                    echo round($row->DEN_JUN / $tt_hari_jun, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->DEN_JUN / $tt_hari_jun, 5); 
                                                } else {
                                                    echo $row->DEN_JUN;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_JUL == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_JUL / $tt_hari_jul, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_JUL / $tt_hari_jul, 5); 
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
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_AGT / $tt_hari_agt, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_AGT / $tt_hari_agt, 5); 
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
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_SEP / $tt_hari_sep, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_SEP / $tt_hari_sep, 5); 
                                                } else {
                                                    echo $row->NUM_SEP;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_NOV == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_NOV / $tt_hari_nov, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_NOV / $tt_hari_nov, 5); 
                                                } else {
                                                    echo $row->NUM_NOV;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_OKT == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_OKT / $tt_hari_okt, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_OKT / $tt_hari_okt, 5); 
                                                } else {
                                                    echo $row->NUM_OKT;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center"> 
                                            <?php
                                                if ($row->NUM_DES == 0)
                                                {
                                                    echo "0";
                                                } else if ($no == 4) {
                                                    echo round($row->NUM_DES / $tt_hari_des, 5); 
                                                } else if ($no == 5) {
                                                    echo round($row->NUM_DES / $tt_hari_des, 5); 
                                                } else {
                                                    echo $row->NUM_DES;
                                                }
                                            ?> 
                                        </td>
                                        <td align="center">
                                            <b> 
                                                <?php 
                                                    if ($no == '4' || $no == '5')
                                                    {
                                                        if (!empty($row->NUM_JAN) && empty($row->NUM_FEB) && empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && !empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && !empty($row->NUM_OKT) && !empty($row->NUM_NOV) && empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov);
                                                            echo round($persen, 5);

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && !empty($row->NUM_OKT) && !empty($row->NUM_NOV) && !empty($NUM_DES)) {
                                                            
                                                            $persen = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) + ($row->NUM_DES / $tt_hari_des);
                                                            echo round($persen, 5);
                                                        } else if (empty($row->NUM_JAN) && empty($row->NUM_FEB) && empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

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
                                                    if ($no == '4' || $no == '5')
                                                    {
                                                        if (!empty($row->NUM_JAN) && empty($row->NUM_FEB) && empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan);
                                                            $den    = $row->DEN_JAN;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN + $row->DEN_JUL;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN + $row->DEN_JUL + $row->DEN_AGT;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN + $row->DEN_JUL + $row->DEN_AGT + $row->DEN_SEP;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && !empty($row->NUM_OKT) && empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN + $row->DEN_JUL + $row->DEN_AGT + $row->DEN_SEP + $row->DEN_OKT;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && !empty($row->NUM_OKT) && !empty($row->NUM_NOV) && empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN + $row->DEN_JUL + $row->DEN_AGT + $row->DEN_SEP + $row->DEN_OKT + $row->DEN_NOV;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));

                                                        } else if (!empty($row->NUM_JAN) && !empty($row->NUM_FEB) && !empty($NUM_MAR) && !empty($row->NUM_APR) && !empty($NUM_MEI) && !empty($row->NUM_JUN) && !empty($NUM_JUL) && !empty($row->NUM_AGT) && !empty($NUM_SEP) && !empty($row->NUM_OKT) && !empty($row->NUM_NOV) && !empty($NUM_DES)) {

                                                            $num    = ($row->NUM_JAN / $tt_hari_jan) + ($row->NUM_FEB / $tt_hari_feb) + ($row->NUM_MAR / $tt_hari_mar) + ($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun) + ($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt) + ($row->NUM_SEP / $tt_hari_sep) + ($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov) + ($row->NUM_DES / $tt_hari_des);
                                                            $den    = $row->DEN_JAN + $row->DEN_FEB + $row->DEN_MAR + $row->DEN_APR + $row->DEN_MEI + $row->DEN_JUN + $row->DEN_JUL + $row->DEN_AGT + $row->DEN_SEP + $row->DEN_OKT + $row->DEN_NOV + $row->DEN_DES;
                                                            $persen = $num / $den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));
                                                            
                                                        } else {
                                                            echo "00:00:00";
                                                        }
                                                    } else {
                                                        if ($row->TOTAL_NUM == 0 && $row->TOTAL_DEN == 0) 
                                                        {
                                                            echo "0";
                                                            echo " %";
                                                        } else {
                                                            $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
                                                            echo substr($persen, 0, 4);
                                                            echo " %";
                                                        }
                                                    }
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row->DETAIL_DEN; ?></td>
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
            </div>
        </div>
    </div>
</div>