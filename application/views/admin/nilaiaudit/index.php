<?php $this->load->view('inc/heada'); ?>
<body class="fixed">
    
	
        <div class="rightside">
            <div class="page-head">
                <h1>Data Nilai Audit</h1>
            </div>

            <div class="content">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
				
                   
                        <div class="box">
                            <div class="box-title">
                                <h3>Nilai Audit</h3>
                            </div><!-- /.box-title -->
                            <div class="box-body">
                               <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>No Indikator</th>
                                        <th>Indikator Audit</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
										<th>Bobot x Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; foreach($nilaiaudit as $row) { $no++; ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['kode_indikator']; ?></td>
                                        <td><?php echo $row['indikator_audit']; ?></td>
                                        <td><?php echo $row['bobot']; ?></td>
                                        <td><?php echo $row['nilai']; ?></td>
										<td><?php echo $row['bobotXnilai']; ?></td>
                                      
										
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<?php 
					
					$usdt = $this->session->userdata('id_jadwal');
$q = mysql_query("CALL select_nilai_jdw('".$usdt."')");
$result = mysql_fetch_assoc($q);
 ?>
<br><center><h2> Nilai Audit = <?php echo $result['jml']; ?></h2></center>					<!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- Main row -->
               
        </div>
    </div><!-- /.wrapper -->
</div>
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Pilih Periode Audit</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	<form action="<?php echo base_url(); ?>audit/inputaudit" method="post">
		<label>Jadwal Audit</label>
                                     <select class="form-control" name="id_jadwal">
    <option>---- JADWAL ----</option>
    <?php
    
    $sql = mysql_query("SELECT distinct id_jadwal FROM tbl_jadwal ORDER BY id_jadwal ASC");
    if(mysql_num_rows($sql) != 0){
        while($data = mysql_fetch_assoc($sql)){
            echo '<option value="'.$data['id_jadwal'].'">'.$data['id_jadwal'].'</option>';
        }
    }
    ?>
</select>
		
		</div>
		 <button type="submit" class="btn btn-info">Tambah</button>
		 
</form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
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
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $("#example1").dataTable();
    $("#example3").dataTable();
    $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": false,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
});
</script>
</body>
</html>