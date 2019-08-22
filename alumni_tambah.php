<?php
	include("sess_check.php");

	// deskripsi halaman
	$pagedesc = "Data Alumni";
	$menuparent = "alumni";
	include("layout_top.php");
?>
<script type="text/javascript">
	function checkAlAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_alavailability.php",
		data:'nis='+$("#nis").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	}
</script>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Alumni</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<form class="form-horizontal" action="alumni_insert.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Tambah Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-3">NIS</label>
										<div class="col-sm-4">
											<input type="number" min="0" class="form-control" name="nis" id="nis" onBlur="checkAlAvailability()" placeholder="NIS" required>
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Jenis Kelamin</label>
										<div class="col-sm-4">
											<select class="form-control" name="jk" required>
												<option value="" selected>==== Pilih Jenis Kelamin ====</option>
												<option value="Laki-Laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tempat Lahir</label>
										<div class="col-sm-4">
											<input type="text" name="tmpt" class="form-control" placeholder="Tempat Lahir" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tanggal Lahir</label>
										<div class="col-sm-4">
											<input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Tahun Angkatan</label>
										<div class="col-sm-4">
											<select class="form-control" name="thn" required>
												<option value="" selected>==== Pilih Tahun Angkatan ====</option>
													<?php
													$mySql = "SELECT * FROM tahun ORDER BY nama_thn ASC";
													$myQry = mysqli_query($conn, $mySql);
													$dataThn = $result['id_thn'];
													while ($Thn = mysqli_fetch_array($myQry)) {
														if ($Thn['id_thn']== $dataThn) {
														$cek = " selected";
														} else { $cek=""; }
														echo "<option value='$Thn[id_thn]' $cek>".$Thn[nama_thn]."</option>";
													}
													?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3">Alamat</label>
										<div class="col-sm-4">
											<textarea class="form-control" name="alamat" required></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
									<a href="alumni.php" class="btn btn-default">Batal</a>
								</div>
							</div><!-- /.panel -->
						</form>
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
	include("layout_bottom.php");
?>