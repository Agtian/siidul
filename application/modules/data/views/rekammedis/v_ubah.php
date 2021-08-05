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
                    <h2>Form Ubah Data</h2>
                    <div class="clearfix"></div>
                </div>
        		<div class="x_content">
                    <br>
                    <?php echo form_open('data/update_indikator', 'class="form-horizontal "'); ?>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">TANGGAL</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" class="form-control" name="tanggal" value="<?= $tanggal; ?>" readonly>
                            </div>
                        </div>
                        <hr>

                        <?php $no = 1; foreach ($data_indikator->result() as $row) { ?>
                            <?php if ($no == 3 || $no == 4) { ?>
                                <label> <h4><b> <?php echo $no++.'. '.$row->DETAIL_INDIKATOR; ?></b></h4></label>

                                <input type="hidden" name="id[]" value="<?= $row->ID_INDIKATOR_MUTU; ?>">

                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" class="form-control" name="num[]" placeholder="Numerator" value="<?= $row->NUM?>" required>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10"> <h4><?php echo $row->DETAIL_NUM; ?></h4> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" class="form-control" name="den[]" placeholder="Denumerator" value="<?= $row->DEN?>" required>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10"> <h4><?php echo $row->DETAIL_DEN; ?></h4> </div>
                                </div>
                                <input type="hidden" name="id_indikator[]" value="<?php echo $row->ID_INDIKATOR; ?>">
								<input type="hidden" name="id_ruang_sub" value="<?= $this->session->userdata('user_id_ruang_sub'); ?>">
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id'); ?>">
                                <hr>
                            <?php } else { ?>
                                <input type="hidden" name="id[]" value="<?= $row->ID_INDIKATOR_MUTU; ?>">

                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" class="form-control" name="num[]" placeholder="Numerator" value="<?= $row->NUM?>" required>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10"> <h4><?php echo $row->DETAIL_NUM; ?></h4> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-2">
                                        <input type="text" class="form-control" name="den[]" placeholder="Denumerator" value="<?= $row->DEN?>" required>
                                    </div>
                                    <div class="col-md-10 col-sm-10 col-xs-10"> <h4><?php echo $row->DETAIL_DEN; ?></h4> </div>
                                </div>
                                <input type="hidden" name="id_indikator[]" value="<?php echo $row->ID_INDIKATOR; ?>">
                                <input type="hidden" name="id_ruang_sub" value="<?= $this->session->userdata('user_id_ruang_sub'); ?>">
                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id'); ?>">
                                <hr>
                            <?php } ?>

                            
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