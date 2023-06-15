<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">

        </div>
    </div>

    <?php echo $this->session->userdata('message') ?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Input Data</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <?php echo form_open('data/insert_indikator', 'class="form-horizontal "'); ?>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">TANGGAL</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control datepicker" name="tanggal" required>
                            </div>
                        </div>
                        <hr>

                        <?php $no = 1; foreach ($data_indikator->result() as $row) { ?>
                           
                                <label> <h4><b> <?php echo $no++.'. '.$row->DETAIL_INDIKATOR; ?></b></h4></label>
                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" class="form-control" name="num[]" placeholder="Numerator" required>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10"> <h4><?php echo $row->DETAIL_NUM; ?></h4> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" class="form-control" name="den[]" placeholder="Denumerator" required>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10"> <h4><?php echo $row->DETAIL_DEN; ?></h4> </div>
                                </div>
                                <input type="hidden" name="id_indikator[]" value="<?php echo $row->ID; ?>">
                                <input type="hidden" name="id_ruang_sub" value="<?= $this->session->userdata('user_id_ruang_sub'); ?>">
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id'); ?>">
                                <hr>
                        <?php } ?>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>