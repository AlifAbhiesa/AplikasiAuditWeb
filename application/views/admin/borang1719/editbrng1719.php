<!DOCTYPE html>
<html>
<?php $this->load->view('inc/heada'); ?>

<?php 
$q = mysql_query("select nama_mhs from tbl_mhs,tbl_brng1719 where tbl_mtk.id_mhs = $id_mhs");
$result = $q;
?>

<body class="fixed">

            <div class="rightside">
                <div class="page-head">
                    <h1>Isi Data Borang 17,18a,19</h1>
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
                                <form role="form" id="" action="<?php echo base_url(); ?>borang1719/updatebrng1719" method="post">
                                <input type="hidden" value="<?php echo $id_brng1719; ?>" name="id_brng1719">
								
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
                                    <label>Tanggal Lulus</label>
                                    <input type="text"class="form-control" value="<?php echo $tgl_lulus; ?>" name="tgl_lulus" placeholder="yyyy-mm-dd">
                                  </div>

                                  
                                  <div class="form-group">
                                    <label>Ipk</label>
                                    <input type="text" class="form-control" value="<?php echo $ipk; ?>" name="ipk">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Lama Studi(Bulan)</label>
                                    <input type="text" class="form-control" value="<?php echo $lama_studi; ?>" name="lama_studi">
                                  </div>
                                  
								  <div class="form-group">
                                    <label>Lama Tugas Akhir(Bulan)</label>
                                    <input type="text" class="form-control" value="<?php echo $lama_ta; ?>" name="lama_ta">
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