<div class="right_col" role="main">
    <div class="page-title">
        <div class="clearfix"></div>

        <?php echo $this->session->userdata('message') ?>

        <div class="x_content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-body">
                        <div class="x_title">
                            <h4> Filter Kelengkapan Data </h4>
                        </div>
                        <div class="x_content">
                            <br>
                            <?php echo form_open('administrator/filter', 'data-parsley-validate class="form-horizontal form-label-left"'); ?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_ruang">Ruang <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="id_ruang_sub" name="id_ruang_sub">
                                            <?php foreach ($data_ruang as $key) { ?>
                                                <option value="<?= $key->ID ?>"><?= $key->NAMA_SUB_RUANG ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tahun <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select class="form-control" id="tahun" name="tahun">
                                            <?php foreach ($data_tahun as $key) { ?>
                                                <option value="<?= $key->TAHUN ?>"><?= $key->TAHUN ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <button class="btn btn-danger" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-body">
                        <div class="x_title">
                            <h3>Chart tahun <?= date('Y'); ?> | Ruang : <?= $nama_ruang->NAMA_SUB_RUANG; ?></h4>
                        </div>

                        <p>Chart progres inputan data SIIDUL tiap bulannya di tahun  <?= date('Y'); ?>.</p>
                        <div class="row">
                            <div class="col-xs-2">
                                <p><center><b>Januari</b></center></p>
                                  <center>
                                    <span class="chart" data-percent="<?= $jan; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Februari</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $feb; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Maret</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $mar; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>April</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $apr; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Mei</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $mei; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Juni</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $jun; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-2">
                                <p><center><b>Juli</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $jul; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Agustus</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $agt; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>September</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $sep; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Oktober</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $okt; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>November</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $nov; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="col-xs-2">
                                <p><center><b>Desember</b></center></p>
                                <center>
                                    <span class="chart" data-percent="<?= $des; ?>">
                                        <span class="percent"></span>
                                    </span>
                                </center>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>