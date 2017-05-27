<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>



<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 1-7</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang17/updatebrng17" method="post">
                                <input type="hidden" value="<?php echo $id_brng17; ?>" name="id_brng17">
								
                                  <div class="form-group">
                                    <label>Kode Matakuliah</label>
                                    <input type="text" disabled="true" class="form-control" value="<?php echo $id_mtk; ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Kelas</label>
                                    <input type="text"class="form-control" value="<?php echo $kelas; ?>" name="kelas">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>RKPSS sesuai dengan BAP</label>
                                    <input type="text" class="form-control" value="<?php echo $rkpss; ?>" name="rkpss">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Berita Acara Pengembalian Tugas/Kuis</label>
                                    <input type="text" class="form-control" value="<?php echo $kmbl_tgs_kuis; ?>" name="kmbl_tgs_kuis">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Solusi UTS</label>
                                    <input type="text" class="form-control" value="<?php echo $sol_uts; ?>" name="sol_uts">
                                  </div>
                                  
								  
								  <div class="form-group">
                                    <label>Solusi UAS</label>
                                    <input type="text" class="form-control" value="<?php echo $sol_uas; ?>" name="sol_uas">
                                  </div>
                                  
								  
								  <div class="form-group">
                                    <label>Berita Acara Pengembalian Berkas UTS dan UAS</label>
                                    <input type="text" class="form-control" name="kmbl_uts_uas" value="<?php echo $kmbl_uts_uas; ?>">
                                  </div>
								  
								   <div class="form-group">
                                    <label>Waktu Pemasukan Nilai UTS</label>
                                    <input type="text" class="form-control" name="msk_nil_uts" value="<?php echo $msk_nil_uts; ?>">
                                  </div>
								  
								   <div class="form-group">
                                    <label>Waktu Pemasukan Nilai UAS</label>
                                    <input type="text" class="form-control" name="msk_nil_uas" value="<?php echo $msk_nil_uas; ?>">
                                  </div>

<div class="form-group">
                                    <label>Kode Jadwal</label>
                                     <select class="form-control" name="id_jadwal">
    <option value="<?php echo $id_jadwal; ?>">---- KODE JADWAL ----</option>
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