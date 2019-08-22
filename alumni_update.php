<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$nislama = $_POST['nislama'];
		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$telp = $_POST['telp'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$tmpt = $_POST['tmpt'];
		$tgl = $_POST['tgl'];
		$thn = $_POST['thn'];
		
		if($nis!=""){
			$sqlcek = "SELECT * FROM alumni WHERE nis='$nis'";
			$ress = mysqli_query($conn, $sqlcek);
			$rows = mysqli_num_rows($ress);
			if($rows<1){
			$sql = "UPDATE alumni SET
				nis='". $nis ."',
				nama='". $nama ."',
				id_thn='". $thn ."',
				jns_kelamin='". $jk ."',
				tmpt_lahir='". $tmpt ."',
				tgl_lahir='". $tgl ."',
				telp='". $telp ."',
				alamat='". $alamat ."'
				WHERE nis='". $nislama ."'";
			$ress = mysqli_query($conn, $sql);			
			header("location: alumni.php?act=update&msg=success");
			}else{
				header("location: alumni_edit.php?nis=$nislama&act=add&msg=double");			
			}
		}else{
			$sql = "UPDATE alumni SET
				nama='". $nama ."',
				id_thn='". $thn ."',
				jns_kelamin='". $jk ."',
				jns_kelamin='". $jk ."',
				tmpt_lahir='". $tmpt ."',
				tgl_lahir='". $tgl ."',
				telp='". $telp ."',
				alamat='". $alamat ."'
				WHERE nis='". $nislama ."'";
			$ress = mysqli_query($conn, $sql);			
			header("location: alumni.php?act=update&msg=success");
		}
}
?>