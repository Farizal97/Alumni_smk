<?php
	include("sess_check.php");
	
	// query database mencari data bendahara
	if(isset($_GET['nis'])) {
		$sql = "SELECT alumni.*, tahun.* FROM alumni, tahun WHERE alumni.id_thn=tahun.id_thn AND alumni.nis='". $_GET['nis'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
	
	
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
						<form class="form-horizontal" action="alumni_update.php" method="POST">
							<div class="panel panel-default">
								<div class="panel-heading"><h3>Edit Data</h3></div>
								<div class="panel-body">
									<div class="form-group">
										<label class="control-label col-sm-4">NIS Lama</label>
										<div class="col-sm-4">
											<input type="text" name="nislama" class="form-control" value="<?php echo $data['nis'];?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">NIS Baru(Abaikan Jika Tidak Diubah)</label>
										<div class="col-sm-4">
											<input type="number" min="0" class="form-control" name="nis" id="nis" onBlur="checkAlAvailability()" placeholder="NIS Baru">
											<span id="user-availability-status" style="font-size:12px;"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Nama</label>
										<div class="col-sm-4">
											<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama'];?>"required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Telepon</label>
										<div class="col-sm-4">
											<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['telp'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Jenis Kelamin</label>
										<div class="col-sm-4">
											<select class="form-control" name="jk" required>
												<option value="<?php echo $data['jns_kelamin']?>" selected><?php echo $data['jns_kelamin']?></option>
												<option value="Laki-Laki">Laki-Laki</option>
												<option value="Perempuan">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Tempat Lahir</label>
										<div class="col-sm-4">
											<input type="text" name="tmpt" class="form-control" placeholder="Tempat Lahir" value="<?php echo $data['tmpt_lahir']?>" required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Tanggal Lahir</label>
										<div class="col-sm-4">
											<input type="date" name="tgl" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $data['tgl_lahir']?>"required>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4">Tahun Angkatan</label>
										<div class="col-sm-4">
											<select class="form-control" name="thn" required>
												<option value="" selected>==== Pilih Tahun Angkatan ====</option>
													<?php
													$mySql = "SELECT * FROM tahun ORDER BY nama_thn ASC";
													$myQry = mysqli_query($conn, $mySql);
													$dataThn = $data['id_thn'];
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
										<label class="control-label col-sm-4">Alamat</label>
										<div class="col-sm-4">
											<textarea class="form-control" name="alamat" required><?php echo $data['alamat']?></textarea>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<button type="submit" name="perbarui" class="btn btn-warning">Perbarui</button>
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