<div class="right_col" role="main">
    <div class="page-title">
        <div class="clearfix"></div>

        <?php echo $this->session->userdata('message') ?>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            	<div class="x_panel">
            		<div class="x_title">
                        <h2>Form Tambah Ruang</h2>
                        <div class="clearfix"></div>
                    </div>
            		<div class="x_content">
                        <br>
                        <form class="form-horizontal form-label-left">
                            <div class="form-group">
    	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ruang</label>
    	                        <div class="col-md-9 col-sm-9 col-xs-12">
    	                          	<input type="text" class="form-control" name="nama_ruang" required>
                            	</div>
                            </div>
                            <div class="form-group">
    	                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kepala Ruang</label>
    	                        <div class="col-md-9 col-sm-9 col-xs-12">
    	                          	<input type="text" class="form-control" name="nama_kepala_ruang" required>
                            	</div>
                            </div>
                        </form>
                    </div>
            	</div>
            </div>
        </div>
    </div>
</div>