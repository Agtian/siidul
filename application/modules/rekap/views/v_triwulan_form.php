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
                        <?php echo form_open('rekap/triwulan', 'class="form-horizontal "'); ?>
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
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
            	</div>
            </div>
        </div>
    </div>
</div>