<div id="myAbout" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">About</h4>
		</div>
		<!-- body modal -->
		<div class="modal-body">
	<form action="<?php echo base_url(); ?>savejadwal" method="post">
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
<br>
		 <button type="submit" class="btn btn-info">Set</button>
		</div>
		
		 
</form>
		 <!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
   </div>
</div>