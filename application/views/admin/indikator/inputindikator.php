<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Indikator</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>indikator/simpanindikator" method="post">
                               
                                  <div class="form-group">
                                    <label>Kode Indikator</label>
                                    <input type="text" class="form-control" name="kode_indikator">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Indikator Audit</label>
                                    <textarea type="text" class="form-control" name="indikator_audit"></textarea>
                                  </div>
                                   
                                  <div class="form-group">
                                    <label>Bobot</label>
                                    <input type="text"class="form-control" name="bobot">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>0</label>
                                    <input type="text" class="form-control" name="nol">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>1</label>
                                    <input type="text" class="form-control" name="satu">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>2</label>
                                    <input type="text" class="form-control" name="dua">
                                  </div>
                                  
								  
								  <div class="form-group">
                                    <label>3</label>
                                    <input type="text" class="form-control" name="tiga">
                                  </div>
                                  
								   <div class="form-group">
                                    <label>4</label>
                                    <input type="text" class="form-control" name="empat">
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