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
                        <?php echo form_open('lap_rekap/bulanan', 'class="form-horizontal "'); ?>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">BULAN</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="bulan" required>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
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
                                    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('lap_rekap/export_bulanan/').$id_ruang_sub.'/'.$bulan.'/'.$tahun; ?>">Export PDF</a>
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
                        <h2>Tabel Data : <?php echo formatNamaBulan($bulan).' '.$tahun; ?></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-primary">
                                        <th rowspan="2" width="5"><center>NO</center></th>
                                        <th rowspan="2"><center>INDIKATOR</center></th>
                                        <th rowspan="2"><center>SUB INDIKATOR</center></th>
                                        <th colspan="<?php echo $total_hari; ?>" ><center>TANGGAL</center></th>
                                        <th rowspan="2"><center>TOTAL</center></th>
                                        <th rowspan="2"><center>PERSEN</center></th>
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
                                        foreach ($data_indikator->result() as $row) {
                                    ?>
                                    <tr>
                                        <td rowspan="2"><?php echo $no++; ?></td>
                                        <td rowspan="2"><?php echo $row->DETAIL_INDIKATOR; ?></td>
                                        <td rowspan="1"><?php echo $row->DETAIL_NUM; ?></td>


                                        <?php 
                                            // gmdate('H:i:s', floor($num_3 * 86400))

                                            $tanggal    = $total_hari;
                                            $total_num  = 0; 
                                            $total_den  = 0;
                                            $data       = $this->Rekap_model->get_data_bulanan($row->ID, $bulan, $tahun);
                                            if ($total_hari == $total_hari) {
                                                foreach ($data->result() as $key) 
                                                {
                                                    if ($no == 4) {
                                                        echo '<td align="center"> '.round($key->NUM, 2).' </td>';
                                                        $total_num += $key->NUM;
                                                        $average_3 = $total_num / $total_hari;
                                                    } else if ($no == 5) {
                                                        echo '<td align="center"> '.round($key->NUM, 2).' </td>';
                                                        $total_num += $key->NUM;
                                                        $average_4 = $total_num / $total_hari;
                                                    } else {
                                                        echo '<td align="center"> '.$key->NUM.' </td>';
                                                        $total_num += $key->NUM;
                                                        $total_den += $key->DEN;
                                                    }                                                
                                                }

                                            } else {

                                                $data = $this->Rekap_model->get_data_bulanan($row->ID, $bulan, $tahun);
                                                foreach ($data->result() as $key) 
                                                {
                                                    echo '<td align="center">  </td>'; // .$key->NUM.
                                                    $total_num += $key->NUM;
                                                    $total_den += $key->DEN;
                                                }
                                            } 
                                        ?>
                                        <td align="center"> 
                                            <b>
                                                <?php 
                                                    if ($no == 4) 
                                                    {
                                                        if (empty($average_3))
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo round($average_3, 4);
                                                        }
                                                    } else if ($no == 5) {
                                                        if (empty($average_4))
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo round($average_4, 4);
                                                        }
                                                    } else {
                                                        echo $total_num; 
                                                    }
                                                ?>
                                            </b> 
                                        </td>
                                        <td rowspan="2"> 
                                            <b><center>
                                                <?php
                                                    $data = $this->Rekap_model->get_data_bulanan($row->ID, $bulan, $tahun);
                                                    foreach ($data->result() as $key) 
                                                    {
                                                        if ($no == 4) {
                                                            $total_num += $key->NUM;
                                                            $total_den += $key->DEN;
                                                            $average_3 = $total_num / $total_den;
                                                        } else if ($no == 5) {
                                                            $total_num += $key->NUM;
                                                            $total_den += $key->DEN;
                                                            $average_4 = $total_num / $total_den;
                                                        } else {
                                                            $total_num += $key->NUM;
                                                            $total_den += $key->DEN;
                                                        }                                                
                                                    }

                                                    if ($no == 4) {
                                                        if ($total_den == 0)
                                                        {
                                                            echo "0";
                                                            // echo $average_3;
                                                        } else {
                                                            $x      = $total_num / $total_hari / 2;
                                                            $persen = $x / $total_den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));
                                                        }
                                                    } else if ($no == 5) {
                                                        if ($total_den == 0)
                                                        {
                                                            echo "0";
                                                        } else {
                                                            $x      = $total_num / $total_hari / 2;
                                                            $persen = $x / $total_den;
                                                            echo gmdate('H:i:s', floor($persen * 86400));
                                                        }
                                                    } else {
                                                        if ($total_num == 0 || $total_den == 0)
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo round($total_num / $total_den * 100, 2);
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
                                            $data = $this->Rekap_model->get_data_bulanan($row->ID, $bulan, $tahun);
                                            foreach ($data->result() as $key) 
                                            {
                                                echo '<td align="center"> '.$key->DEN.' </td>';
                                                $total_num += $key->NUM;
                                                $total_den += $key->DEN;
                                            }
                                        } else { 
                                            $data = $this->Rekap_model->get_data_bulanan($row->ID, $bulan, $tahun);
                                            foreach ($data->result() as $key) 
                                            {
                                                echo '<td align="center"> '.$key->DEN.' </td>';
                                                $total_num += $key->NUM;
                                                $total_den += $key->DEN;
                                            }
                                        } ?>
                                        <td align="center"> 
                                            <b>
                                                <?php
                                                    // echo $total_den / 2; 

                                                    if ($no == 4) 
                                                    {
                                                        if (empty($total_den))
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo $total_den / 2;
                                                        }
                                                    } else if ($no == 5) {
                                                        if (empty($total_den))
                                                        {
                                                            echo "0";
                                                        } else {
                                                            echo $total_den / 2;
                                                        }
                                                    } else {
                                                        echo $total_den / 3; 
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