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
                    <h2>Form Evaluasi Capaian</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>

                    <?php echo form_open('data/insert_evaluasi', 'class="form-horizontal "'); ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">PERIODE</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <!-- <input type="text" class="form-control datepicker" name="tanggal" required> -->
                            <input type="month" class="form-control enddate datepicker-input-month" name="tanggal" autocomplete="off" required />

                        </div>
                    </div>
                    <hr>

                    <?php $no = 1;
                    foreach ($data_indikator->result() as $row) { ?>
                        <label>
                            <h4><b> <?php echo $no++ . '. ' . $row->DETAIL_INDIKATOR; ?></b></h4>
                        </label>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea type="text" class="form-control" name="pendorong[]" placeholder="Faktor Pendorong" required ></textarea>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <textarea type="text" class="form-control" name="penghambat[]" placeholder="Faktor Penghambat" required></textarea>
                            </div>

                        </div>
                        <input type="hidden" name="id_indikator[]" value="<?php echo $row->ID; ?>">
                       
                        <hr>
                    <?php } ?>
                    <input type="hidden" name="id_ruang_sub" value="<?= $this->session->userdata('user_id_ruang_sub'); ?>">
                    <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id'); ?>">
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

<script>
    const monthControl = document.querySelector('input[type="month"]');
    const date = new Date()
    const month = ("0" + (date.getMonth() + 1)).slice(-2)
    const year = date.getFullYear()
    monthControl.value = `${year}-${month}`;
</script>