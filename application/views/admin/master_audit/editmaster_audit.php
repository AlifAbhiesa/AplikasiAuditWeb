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
                                <form role="form" id="" action="<?php echo base_url(); ?>masteraudit/updatemaster_audit" method="post">
                                <div class="form-group">
                                    <label>Kode Master Audit</label>
                                    <input type="text" class="form-control" value="<?php echo $id_master; ?>" name="id_master">
                                  </div>
                                   <div class="form-group">
                                    <label>Indikator</label>
                                     <select class="form-control" name="kode_indikator" name="kode_indikator" value="<?php echo $kode_indikator; ?>">
    <option value="<?php echo $kode_indikator; ?>">---- INDIKATOR ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_indikator ORDER BY kode_indikator ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['kode_indikator'].'">'.$data['kode_indikator'].'</option>';
        }
    }
    ?>
</select>
                                  </div>
								  
								  
								  <div class="form-group">
                                    <label>Baseline (Hasil Genap)</label>
                                    <input type="text" class="form-control" value="<?php echo $hasil_genap; ?>" name="hasil_genap">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Target Genap </label>
                                    <input type="text" class="form-control" value="<?php echo $target_genap; ?>" name="target_genap">
                                  </div>
								  
								   
								  
								  <div class="form-group">
                                    <label>Capaian Genap</label>
                                    <input type="text" class="form-control" value="<?php echo $capaian_genap; ?>" name="capaian_genap">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Rencana  Kegiatan Tindak Lanjut Program Studi untuk Semester Genap</label>
                                    <input type="text" class="form-control" value="<?php echo $rencana_kegiatan; ?>" name="rencana_kegiatan">
                                  </div>
								  
								  
								   <div class="form-group">
                                    <label>Jadwal</label>
                                     <select class="form-control" name="id_jadwal" value="<?php echo $id_jadwal; ?>">
    <option value="<?php echo $id_jadwal; ?>">---- JADWAL----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_jadwal ORDER BY id_jadwal ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_jadwal'].'">'.$data['id_jadwal'].'</option>';
        }
    }
    ?>
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