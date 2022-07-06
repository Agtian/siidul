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
                            <form action="<?= base_url('administrator/filter') ?>" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_ruang">Ruang <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control" id="id_ruang" name="id_ruang">
                                            <?php foreach ($data_ruang as $key) { ?>
                                                <option value="<?= $key->ID_RUANG ?>"><?= $key->NAMA_SUB_RUANG ?></option>
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
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-body">
                        <div class="x_title">
                            <h4> Tabel Kelengkapan Data </h4>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th width="10">NO</th>
                                            <th>RUANG</th>
                                            <th>INPUTAN TERAKHIR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($data_kelengkapan as $row) { ?>
                                            <?php
                                                if(date('Y-m') == date('Y-m', strtotime($row->TANGGAL))) {
                                                    $background = "";
                                                } else {
                                                    $background = "bg-danger";
                                                }
                                            ?>
                                            <tr class="<?= $background; ?>">
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->NAMA_SUB_RUANG; ?></td>
                                                <td><?= formatHariTanggal($row->TANGGAL) ?></td>
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
</div>