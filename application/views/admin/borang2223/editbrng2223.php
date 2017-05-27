<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>



<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 22,23</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang2223/updatebrng2223" method="post">
                                <input type="hidden" value="<?php echo $id_brng2223; ?>" name="id_brng2223">
								
								<div class="form-group">
                                    <label>Nama Matakuliah</label>
                                     <select class="form-control" name="id_mtk">
    <option value="<?php echo $id_mtk; ?>">---- Matakuliah ----</option>
    <?php
    
    $sql = mysql_query("SELECT * FROM tbl_mtk where id_jrsn = '".$this->session->userdata('id_jrsn')."' ORDER BY id_mtk ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_mtk'].'">'.$data['nama_mtk'].'</option>';
        }
    }
    ?>
</select>
                                  </div>
								  
                                  <div class="form-group">
                                    <label>Ketersediaan GBPP</label>
                                    <input type="text"class="form-control" value="<?php echo $sedia_gbpp; ?>" name="sedia_gbpp">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>Ketersediaan RKPSS</label>
                                    <input type="text" class="form-control" value="<?php echo $sedia_rkpss; ?>" name="sedia_rkpss">
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