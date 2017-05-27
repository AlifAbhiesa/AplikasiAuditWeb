<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Audit</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>audit/simpanaudit" method="post">
                                
                                  
								  <div class="form-group">
                                    <label>Kode Indikator</label>
                                     <select class="form-control" name="id_master_audit">
							<option>---- Kode Indikator ----</option>
							<?php
							$jad = $this->session->userdata('id_jadwal');	
							$sql = mysql_query("SELECT * FROM tbl_master_audit where id_jadwal = '$jad' ORDER BY id_master ASC");
							if(mysql_num_rows($sql) != 0){
					while($data = mysql_fetch_assoc($sql)){
					echo '<option value="'.$data['id_master'].'">'.$data['kode_indikator'].'</option>';
					}
					}
						?>
						</select>
                                  </div>
								  
								  
								  <div class="form-group">
                                    <label>Target Genap</label>
                                    <textarea type="text" class="form-control" name="target_genap"></textarea>
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Pelaksanaan Kegiatan Tindak Lanjut Program Studi untuk Semester Genap</label>
                                    <textarea type="text" class="form-control" name="pelaksanaan_kegiatan"></textarea>
                                  </div>
								  
								   
								  
								  <div class="form-group">
                                    <label>Permasalahan Yang Dihadapi pada Semester Genap</label>
                                    <textarea type="text" class="form-control" name="permasalahan"></textarea>
                                  </div>
								  
								  <div class="form-group">
                                    <label>Rencana  Kegiatan Tindak Lanjut Program Studi untuk Semester Genap</label>
                                    <textarea type="text" class="form-control" name="rencana_kegiatan_audit"></textarea>
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