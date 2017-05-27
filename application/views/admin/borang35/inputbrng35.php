<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 35</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang35/simpanbrng35" method="post">
                                <input type="hidden" name="id_brng35">
                                  
                                  <div class="form-group">
                                    <label>NIK Dosen</label>
                                     <select class="form-control" name="id_dsn">
    <option>---- NIK DOSEN ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_dsn ORDER BY id_dsn ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_dsn'].'">'.$data['nip_dsn'].'</option>';
        }
    }
    ?>
</select>
                                  </div>

                                  <div class="form-group">
                                    <label>Nama Organisasi</label>
                                    <input type="text"class="form-control" name="nama_org">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>Kurun Waktu</label>
                                    <input type="text" class="form-control" name="kurun_wkt">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Tingkat Lokal</label>
                                    <input type="text" class="form-control" name="tk_lokal">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Tingkat Nasional</label>
                                    <input type="text" class="form-control"  name="tk_nasional">
                                  </div>
                                  
								  
								  <div class="form-group">
                                    <label>Tingkat Internasional</label>
                                    <input type="text" class="form-control" name="tk_internasional">
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