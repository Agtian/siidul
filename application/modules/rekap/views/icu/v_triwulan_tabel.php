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
                        <?php echo form_open('rekap_'.$this->session->userdata("user_controllers").'/triwulan', 'class="form-horizontal "'); ?>
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
                                    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('rekap/export_triwulan/').$id_ruang_sub.'/'.$tahun; ?>">Export PDF</a>
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
                        <h2>Tabel Data Triwulan I : <?php echo $tahun; ?></h2>
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
                                        <td rowspan="2"><?php echo $no++; ?></td>
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
                        <h2>Tabel Data Triwulan II : <?php echo $tahun; ?></h2>
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
                                        <td rowspan="2"><?php echo $no++; ?></td>
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
                                                            $persen = ($row->NUM_APR / $tt_hari_apr) / 1;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->NUM_APR) && !empty($row->NUM_MEI) && empty($row->NUM_JUN)) {
                                                            $persen = (($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei)) / 2;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->NUM_APR) && !empty($row->NUM_MEI) && !empty($row->NUM_JUN)){
                                                            $persen = (($row->NUM_APR / $tt_hari_apr) + ($row->NUM_MEI / $tt_hari_mei) + ($row->NUM_JUN / $tt_hari_jun)) / 3;
                                                            echo round($persen, 5);
                                                        } else if (empty($row->NUM_APR) && empty($row->NUM_MEI) && empty($row->NUM_JUN)){
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
                                                            $persen = ($row->DEN_APR / $tt_hari_apr) / 1;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->DEN_APR) && !empty($row->DEN_MEI) && empty($row->DEN_JUN)) {
                                                            $persen = (($row->DEN_APR / $tt_hari_apr) + ($row->DEN_MEI / $tt_hari_mei)) / 2;
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
                        <h2>Tabel Data Triwulan III : <?php echo $tahun; ?></h2>
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
                                        <td rowspan="2"><?php echo $no++; ?></td>
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
                                                            $persen = ($row->NUM_JUL / $tt_hari_jul) / 1;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->NUM_JUL) && !empty($row->NUM_AGT) && empty($row->NUM_SEP)) {
                                                            $persen = (($row->NUM_JUL / $tt_hari_jul) + ($row->NUM_AGT / $tt_hari_agt)) / 2;
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
                                                            $persen = ($row->DEN_JUL / $tt_hari_jul) / 1;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->DEN_JUL) && !empty($row->DEN_AGT) && empty($row->DEN_SEP)) {
                                                            $persen = (($row->DEN_JUL / $tt_hari_jul) + ($row->DEN_AGT / $tt_hari_agt)) / 2;
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
                        <h2>Tabel Data Triwulan IV : <?php echo $tahun; ?></h2>
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
                                        <td rowspan="2"><?php echo $no++; ?></td>
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
                                                            $persen = ($row->NUM_OKT / $tt_hari_okt) / 1;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->NUM_OKT) && !empty($row->NUM_NOV) && empty($row->NUM_DES)) {
                                                            $persen = (($row->NUM_OKT / $tt_hari_okt) + ($row->NUM_NOV / $tt_hari_nov)) / 2;
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
                                                            $persen = ($row->DEN_OKT / $tt_hari_okt) / 1;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->DEN_OKT) && !empty($row->DEN_NOV) && empty($row->DEN_DES)) {
                                                            $persen = (($row->DEN_OKT / $tt_hari_okt) + ($row->DEN_NOV / $tt_hari_nov)) / 2;
                                                            echo round($persen, 5);
                                                        } else if (!empty($row->DEN_OKT) && !empty($row->DEN_NOV) && !empty($row->DEN_DES)){
                                                            $persen = (($row->DEN_OKT / $tt_hari_okt) + ($row->DEN_NOV / $tt_hari_nov) + ($row->DEN_DES / $tt_hari_des)) / 3;
                                                            echo round($persen, 5);
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
        </div>
    </div>
</div>