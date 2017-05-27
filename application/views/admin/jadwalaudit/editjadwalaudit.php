<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>
<?php 
$q = mysql_query("select nama_jrsn from tbl_jrsn,tbl_jadwal where tbl_jrsn.id_jrsn = $id_jrsn");
$result = $q;
?>


<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Jadwal Audit</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>jadwalaudit/updatejadwalaudit" method="post">
                             <div class="form-group">
                                    <label>Kode Jadwal</label>
                                    <input type="text" value="<?php echo $id_jadwal; ?>" class="form-control" name="id_jadwal" disabled="true">
                                  </div>
                                  <div class="form-group">
                                    <label>Nama Jurusan</label>
                                    <input type="text" disabled ="true" class="form-control" value="<?php echo mysql_result($q,0); ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" value="<?php echo $tahun; ?>" class="form-control" name="tahun">
                                  </div>

                                  
                                   
                                  <div class="form-group">
                                    <label>Semester</label>
                                    <select name ="semester" class="form-control">
									<option value="GANJIL">GANJIL</OPTION>
									<option value="GENAP">GENAP</OPTION>
</SELECT>
                                  </div>
								  
                                  <div class="form-group">
                                    <label>Tanggal Visitasi</label>
                                    <input type="text" class="form-control datepicker-input" value="<?php echo $tgl_visitasi; ?>" name="tgl_visitasi">
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