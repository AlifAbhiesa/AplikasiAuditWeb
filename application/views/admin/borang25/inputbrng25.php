<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 25</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang25/simpanbrng25" method="post">
                                <input type="hidden" name="id_brng25">
                                  <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                     <select class="form-control" name="id_mhs">
    <option>---- Mahasiswa ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_mhs where id_jrsn = '".$this->session->userdata('id_jrsn')."' ORDER BY id_mhs ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_mhs'].'">'.$data['nama_mhs'].'</option>';
        }
    }
    ?>
</select>
                                  </div>
                                  <div class="form-group">
                                    <label>Statuss</label>
                                    <select class="form-control" name="status">
									<option> -------- Status -------</option>
									<option value="AKTIF"> AKTIF </option>
									<option value="TIDAK AKTIF"> TIDAK AKTIF </option>
									</select>									
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>Reg. Akhir</label>
                                    <input type="text" class="form-control" name="reg_akhir">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Batas Studi</label>
                                    <input type="text" class="form-control" name="bts_studi">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Dosen Wali</label>
                                     <select class="form-control" name="id_dsn">
    <option>---- Dosen Wali ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_dsn where jbtn_dsn = 'Dosen Wali' and id_jrsn = '".$this->session->userdata('id_jrsn')."' ORDER BY id_dsn ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_dsn'].'">'.$data['nama_dsn'].'</option>';
        }
    }
    ?>
</select>
                                  </div>
                                  
								  
								  <div class="form-group">
                                    <label>Status Keluar</label>
                                    <input type="text" class="form-control" name="stts_keluar">
                                  </div>
								  
								   <div class="form-group">
                                    <label>Mundur Semester Pertama</label>
                                    <input type="text" class="form-control" name="mundur_pertama">
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