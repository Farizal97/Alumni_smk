<?php
	include("sess_check.php");
	
	// query database memasukan data ke database
	if(isset($_POST['simpan'])) {
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$tmpt = $_POST['tmpt'];
		$tgl = $_POST['tgl'];
		$thn = $_POST['thn'];
		$foto = "user.jpg";
		$kerja = "-";

		
		$sqlcek = "SELECT * FROM alumni WHERE nis='$nis'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			$sql = "INSERT INTO alumni (nis,nama,id_thn,jns_kelamin,tmpt_lahir,tgl_lahir,telp,pekerjaan,alamat,foto,password)
					VALUES('$nis','$nama','$thn','$jk','$tmpt','$tgl','$telp','$kerja','$alamat','$foto','$nis')";
			$ress = mysqli_query($conn, $sql);		
			header("location: alumni.php?act=add&msg=success");
		}else{
			header("location: alumni_tambah.php?act=add&msg=double");	
		}
	}
?>