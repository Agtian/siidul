<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Hasil Evaluasi Capaian</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>data/get_evaluasi" id="form-section2">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">PERIODE</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <!-- <input type="text" class="form-control datepicker" name="tanggal" required> -->
                                <input type="month" class="form-control enddate datepicker-input-month" name="tanggal" autocomplete="off" required />

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-success">Tampilkan</button>
                            </div>
                        </div>
                        <hr>


                        <input type="hidden" name="id_ruang_sub" value="<?= $this->session->userdata('user_id_ruang_sub'); ?>">
                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('user_id'); ?>">
                        <div class="ln_solid"></div>

                    </form>
                    <hr>
                    <div id="respon-section2">

                    </div>
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


    $('#form-section2').submit(function(e) {
        e.preventDefault();
        // alert('error');
        $('#respon-section2').html('');
        // document.getElementById("loader2").style.visibility = "";
        //document.querySelector('#cari_data2').innerHTML = '<span id="loader2" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Menghitung';

        //$("#cari_data").attr("disabled", true);
        var fd2 = new FormData($('#form-section2')[0]);
        console.log(fd2);

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: fd2,
            dataType: 'html'
        }).done(function(result) {
            $('#respon-section2').html(result);
            // $("#cari-data").removeAttr('disabled');
            // document.querySelector('#cari_data2').innerHTML = '<span id="loader2" class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Tampilkan';
            //document.getElementById("loader2").style.visibility = "hidden";

            //console.log(result);

        }).fail(function(jqXHR, thrownError) {
            alert(jqXHR.status + ' ' + thrownError);
        });
    });
</script>