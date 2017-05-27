<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 31 - 32</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang3132/simpanbrng3132" method="post">
                                <input type="hidden" name="id_brng3132">
                                  <div class="form-group">
                                    <label>Judul Kegiatan Pelayanan/Pengabdian kepada Masyarakat</label>
                                    <input type="text" class="form-control" name="judul_kegiatan">
                                  </div>

								   <div class="form-group">
                                    <label>Nama Dosen</label>
                                     <select class="form-control" name="id_dsn">
    <option>---- Dosen ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_dsn where id_jrsn = '".$this->session->userdata('id_jrsn')."' ORDER BY id_dsn ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_dsn'].'">'.$data['nama_dsn'].'</option>';
        }
    }
    ?>
</select>
                                  </div>
								  
								  <div class="form-group">
                                    <label>Tempat Pelaksanaan</label>
                                    <input type="text" class="form-control" name="tempat">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Waktu Pelaksanaan</label>
                                    <input type="text" class="form-control datepicker-input" name="waktu">
                                  </div>
								  
								  
								   <div class="form-group">
                                    <label>Jumlah Dana Yang Terhimpun</label>
                                    <input type="text" class="form-control" name="jml_dana">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Hibah Pengabdian kepada Masyarakat</label>
                                    <input type="text" class="form-control" name="hibah_pengabdian">
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