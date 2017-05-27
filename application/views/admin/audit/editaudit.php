<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>


<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Master Audit</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>audit/updateaudit" method="post">
                                <input type="hidden" value="<?php echo $id_audit; ?>" name="id_audit">
								
                                   <div class="form-group">
                                    <label>Kode Indikator</label>
                                     <input value = "<?php echo $id_master_audit; ?>" class="form-control" name= "id_master_audit" disabled = "true">
                                  </div>
								  
								 <div class="form-group">
                                    <label>Target Genap</label>
                                    <input type="text" class="form-control" name="target_genap" value= "<?php echo $target_genap; ?>">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Pelaksanaan Kegiatan Tindak Lanjut Program Studi untuk Semester Genap</label>
                                    <input type="text" class="form-control" value= "<?php echo $pelaksanaan_kegiatan; ?>" name="pelaksanaan_kegiatan">
                                  </div>
								  
								   
								  
								  <div class="form-group">
                                    <label>Permasalahan Yang Dihadapi pada Semester Genap</label>
                                    <input type="text" class="form-control" value= "<?php echo $permasalahan; ?>" name="permasalahan">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Rencana  Kegiatan Tindak Lanjut Program Studi untuk Semester Genap</label>
                                    <textarea type="text" class="form-control" value= "<?php echo $rencana_kegiatan_audit; ?>" name="rencana_kegiatan"></textarea>
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