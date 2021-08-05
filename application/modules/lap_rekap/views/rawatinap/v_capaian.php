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
                        <?php echo form_open('lap_rekap/capaian', 'class="form-horizontal "'); ?>
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
                                    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('lap_rekap/export_capaian/').$id_ruang_sub.'/'.$tahun; ?>">Export PDF</a>
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
                        <h2>Tabel Data Capaian Tahunan <?php echo $tahun; ?></h2>
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
                                                        $persen = $row->NUM_JAN / $tt_hari_jan;
                                                        echo $persen;
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_FEB / $tt_hari_feb;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_MAR / $tt_hari_mar;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_APR / $tt_hari_apr;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_MEI / $tt_hari_mei;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_JUN / $tt_hari_jun;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_JUL / $tt_hari_jul;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_AGT / $tt_hari_agt;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_SEP / $tt_hari_sep;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_OKT / $tt_hari_okt;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_NOV / $tt_hari_nov;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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
                                                        $persen = $row->NUM_DES / $tt_hari_des;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '6') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        $persen = $row->TOTAL_NUM / $row->TOTAL_DEN;
                                                        echo $persen;
                                                        echo " %";
                                                    }
                                                } else if ($no == '9') {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                    } else {
                                                        $persen = ($row->TOTAL_NUM / $row->TOTAL_DEN) * 1000;
                                                        echo $persen;
                                                    }
                                                } else if ($no == '10') {
                                                    if ($row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * (1 / 100);
                                                        echo " %";
                                                    }
                                                } else {
                                                    if ($row->TOTAL_NUM == 0 || $row->TOTAL_DEN == 0) 
                                                    {
                                                        echo "0";
                                                        echo " %";
                                                    } else {
                                                        echo ($row->TOTAL_NUM / $row->TOTAL_DEN) * 100;
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