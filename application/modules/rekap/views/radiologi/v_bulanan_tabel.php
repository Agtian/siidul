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
                        <?php echo form_open('rekap/bulanan', 'class="form-horizontal "'); ?>
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
                                    <a class="btn btn-primary" target="_blank" href="<?php echo base_url('rekap/export_bulanan/').$id_ruang_sub.'/'.$bulan.'/'.$tahun; ?>">Export PDF</a>
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
                                        $tanggal    = $total_hari;
                                        $id_ruang_sub   = $this->session->userdata("user_id_ruang_sub");
                                        foreach ($data_indikator->result() as $row) {
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
                                                    echo '<td align="center"> '.$key->NUM.' </td>';
                                                    $total_num += $key->NUM;
                                                    $total_den += $key->DEN;                                      
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
                                                    if ($no == 2)
                                                    {
                                                        if (empty($total_num))
                                                        {
                                                            echo "0";
                                                        } else {
                                                            $average = $total_num / $total_hari;
                                                            echo round($average, 2);
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
                                                    if ($no == 2)
                                                    {
                                                        if ($total_num == 0 || $total_den == 0)
                                                        {
                                                            echo "0";
                                                        } else {
                                                            $average = $total_num / $total_hari;
                                                            $time    = $average / $total_den;
                                                            echo gmdate('H:i:s', floor($time * 86400));
                                                        }
                                                    } else {
                                                        if ($total_num == 0 || $total_den == 0)
                                                        {
                                                            echo "0  %";
                                                        } else {
                                                            echo substr($total_num / $total_den * 100, 0, 5)." %";
                                                        }
                                                    }
                                                ?>
                                            </center></b> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $row->DETAIL_DEN; ?></td>
                                        <?php  
                                            foreach ($data->result() as $key) 
                                            {
                                                echo '<td align="center"> '.$key->DEN.' </td>';
                                            }
                                        ?>
                                        <td align="center"> <b><?php echo $total_den; ?></b> </td>
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