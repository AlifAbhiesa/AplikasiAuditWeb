<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<?php 
$q = mysql_query("select nama_mtk from tbl_mtk,tbl_brng810 where tbl_mtk.id_mtk = $id_mtk");
$result = $q;
?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 8 - 10</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang810/updatebrng810" method="post">
                                <input type="hidden" name="id_brng810" value="<?php echo $id_brng810; ?>">
                                  <div class="form-group">
                                    <label>Nama Matakuliah</label>
                                    <input type="text" disabled ="true" class="form-control" value="<?php echo mysql_result($q,0); ?>">
                                  </div>
                                  <div class="form-group">
                                    <label>Awal</label>
                                    <input type="text" value="<?php echo $awal; ?>" class="form-control" name="awal">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>Tengah</label>
                                    <input type="text" class="form-control" value="<?php echo $tengah; ?>" name="tengah">
                                  </div>
								  
                                  <div class="form-group">
                                    <label>Akhir</label>
                                    <input type="text" class="form-control" value="<?php echo $akhir; ?>" name="akhir">
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