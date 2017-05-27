<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>


<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 30</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang30/updatebrng30" method="post">
                                <input type="hidden" value="<?php echo $id_brng30; ?>" name="id_brng30">
								
								<div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="text" class="form-control" value="<?php echo $judul_buku; ?>" name="judul_buku">
                                  </div>
								  
                                   <div class="form-group">
                                    <label>Nam Dosen</label>
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
                                    <label>Pendukung MataKuliah</label>
                                     <select class="form-control" name="id_mtk">
    <option>---- Matakuliah ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_mtk where id_jrsn = '".$this->session->userdata('id_jrsn')."' ORDER BY id_mtk ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_mtk'].'">'.$data['nama_mtk'].'</option>';
        }
    }
    ?>
</select>
								  <div class="form-group">
                                    <label>Bulan & Tahun Publikasi</label>
                                    <input type="text" class="form-control datepicker-input" value="<?php echo $bln_thn; ?>" name="bln_thn">
                                  </div>
                                  
								   <div class="form-group">
                                    <label>Asli / Terjemah</label>
                                    <select class="form-control" name="asli_terjemah">
									<option> -------- Pilih -------</option>
									<option value="ASLI"> ASLI </option>
									<option value="TERJEMAH"> TERJEMAH </option>
									</select>									
                                  </div>
								  
								  <div class="form-group">
                                    <label>Tingkat Lokal</label>
                                    <input type="text" class="form-control" value="<?php echo $tk_lokal; ?>" name="tk_lokal">
                                  </div>
								  
								  
								  <div class="form-group">
                                    <label>Tingkat Nasional</label>
                                    <input type="text" class="form-control" value="<?php echo $tk_nasional; ?>" name="tk_nasional">
                                  </div>
								  
								  
								  <div class="form-group">
                                    <label>Tingkat Internasional</label>
                                    <input type="text" class="form-control" value="<?php echo $tk_internasional; ?>" name="tk_internasional">
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