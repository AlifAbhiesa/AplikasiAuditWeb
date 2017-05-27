<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 33</h1>
                </div>

                <div class="content label-normal">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-title">
                                <h3>Isi Data</h3>
                            </div>
                            <div class="box-body">
                                <form role="form" id="" action="<?php echo base_url(); ?>borang33/simpanbrng33" method="post">
                                <input type="hidden" name="id_brng33">
                                 <div class="form-group">
                                    <label>Nama Instansi</label>
                                    <input type="text" class="form-control" name="nama_instansi">
                                  </div>
								  
                                   
								 
								  <div class="form-group">
                                    <label>Jenis Kegiatan</label>
                                    <input type="text" class="form-control" name="jenis_kegiatan">
                                  </div>
								  
								  
								  <div class="form-group">
                                    <label>Awal Kerjasama</label>
                                    <input type="text" class="form-control datepicker-input" name="awal_kerjasama">
                                  </div>
								  
								   <div class="form-group">
                                    <label>Akhir Kerjasama</label>
                                    <input type="text" class="form-control datepicker-input" name="akhir_kerjasama">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Manfaat Yang Diperoleh</label>
                                    <textarea type="text" class="form-control" name="manfaat"></textarea>
                                  </div>

								   <div class="form-group">
                                    <label>Dalam Negri</label>
                                    <select class="form-control" name="dalam_negri">
									<option> -------- Pilih -------</option>
									<option value="YA"> YA </option>
									<option value="TIDAK"> TIDAK </option>
									</select>									
                                  </div>
								  
								   <div class="form-group">
                                    <label>Luar Negri</label>
                                    <select class="form-control" name="luar_negri">
									<option> -------- Pilih -------</option>
									<option value="YA"> YA </option>
									<option value="TIDAK"> TIDAK </option>
									</select>									
                                  </div>
                                  <button type="submit" class="btn btn-info">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.wrapper -->
        </div>
        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui-1.10.4.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        
        <!-- Interface -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js" type="text/javascript"></script>
        
        <!-- Forms -->
        <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrapValidator/bootstrapValidator.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/datepicker/datepicker.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){                
                //Date picker
                $('.datepicker-input').datepicker();
                
            });
        </script>
    </body>
</html>