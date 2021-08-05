<div class="right_col" role="main">
	<div class="page-title">
	    <div class="clearfix"></div>

	    <?php echo $this->session->userdata('message') ?>

        <div class="x_content">
	    	<div class="row">
              	<div class="col-md-12">
	                <div class="panel panel-body">
	                  	<div class="x_title">
	                    	<h4>Chart tahun <?= date('Y'); ?></h4>
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