<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>


<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 26-29</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang2629/updatebrng2629" method="post">
                                <input type="hidden" value="<?php echo $id_brng2629; ?>" name="id_brng2629">
								
									<div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" value="<?php echo $judul; ?>" name="judul">
                                  </div>
								  
								  
								  
                                   <div class="form-group">
                                    <label>Nama Dosen</label>
                                     <select class="form-control" name="id_dsn">
    <option value="<?php echo $id_dsn; ?>">---- Dosen ----</option>
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
                                    <label>Dihasilkan/Dipublikasikan pada</label>
                                    <input type="text" class="form-control" value="<?php echo $publikasi; ?>" name="publikasi">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Bulan & Tahun Penyajian/Publikasi</label>
                                    <input type="text" class="form-control" value="<?php echo $bln_thn; ?>" name="bln_thn">
                                  </div>
								  
								  <div class="form-group">
                                    <label>Publikasi Lokal</label>
                                    <select class="form-control" name="pub_lokal">
									<option> -------- Pilih -------</option>
									<option value="YA"> YA </option>
									<option value="TIDAK"> TIDAK </option>
									</select>									
                                  </div>
								  
								  <div class="form-group">
                                    <label>Publikasi Nasional</label>
                                    <select class="form-control" name="pub_nas">
									<option> -------- Pilih -------</option>
									<option value="YA"> YA </option>
									<option value="TIDAK"> TIDAK </option>
									</select>									
                                  </div>
								  
								  <div class="form-group">
                                    <label>Publikasi Internasional</label>
                                    <select class="form-control" name="pub_inter">
									<option> -------- Pilih -------</option>
									<option value="YA"> YA </option>
									<option value="TIDAK"> TIDAK </option>
									</select>									
                                  </div>
								  
								   <div class="form-group">
                                    <label>Penelitian</label>
                                    <select class="form-control" name="penelitian">
									<option> -------- Pilih -------</option>
									<option value="YA"> YA </option>
									<option value="TIDAK"> TIDAK </option>
									</select>									
                                  </div>
								  
								  <div class="form-group">
                                    <label>hibah_penelitian</label>
                                    <input type="text" class="form-control" value="<?php echo $hibah_penelitian; ?>" name="hibah_penelitian">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Dana Pribadi (Rp.)</label>
                                    <input type="text" class="form-control" value="<?php echo $dana_pribadi; ?>" name="dana_pribadi">
                                  </div>
								  
								   <div class="form-group">
                                    <labelDana Lokal/Nasional (Rp.)</label>
                                    <input type="text" class="form-control" value="<?php echo $dana_lokal; ?>" name="dana_lokal">
                                  </div>
								  
								   <div class="form-group">
                                    <label>Dana Internasional (Rp.)</label>
                                    <input type="text" class="form-control" value="<?php echo $dana_internasional; ?>" name="dana_internasional">
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