<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 18b</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang18b/simpanbrng18b" method="post">
                                <input type="hidden" name="id_brng18b">
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
                                    <label>Status Kuliah</label>
                                    <input type="text"class="form-control" name="stts_kuliah">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>Registrasi Akhir</label>
                                    <input type="text" class="form-control" name="reg_akhir">
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