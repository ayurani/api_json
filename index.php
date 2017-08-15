<html>
<head>
<title></title>
<body>
	<form action="?" method="POST" enctype="multipart/form-data">
		<div>
			<h2>Inputkan Data Mahasiswa</h2>
			<table border="0" cellspacing="3px" cellpadding="3px" align="center">
				<tr>
					<td>NRP : </td>
					<td>
						<input type="text" name="nrp" placeholder="Masukkan NRP Mahasiswa">
					</td>
				</tr>
				<tr>
					<td>Nama Mahasiswa : </td>
					<td>
						<input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" maxlength=40/>
					</td>
				</tr>
				<tr>
					<td>Jurusan : </td>
					<td>
						<input type="text" name="jurusan" placeholder="Jurusan Mahasiswa" maxlength=40/>
					</td>
				</tr>
				<tr>
					<td>Jenis Kelamin : </td>
					<td>
						<input type="radio" name="jenis_kelamin" value="laki-laki">Laki - Laki
						<input type="radio" name="jenis_kelamin" value="perempuan">Perempuan
					</td>
				</tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Save">
				<input type="reset" name="reset" value="Reset"></td>
			</table>
		</div>
	</form>
	<form action="parsing.php" method="post" enctype="multipart/form-data">
		<tr>
			<td>
			<input type="submit" name="submit" value="Load">
			</td>
		</tr>
	</form>
</body>
</head>
</html>


<?php
error_reporting(0);
include "koneksi.php";

$nrp = $_POST["nrp"];
$nama = $_POST["nama"];
$jurusan = $_POST["jurusan"];
$jenis_kelamin = $_POST["jenis_kelamin"];

if ($nrp!="" && $nama!="" && $jurusan!="" && $jenis_kelamin!="") {
	$query = "insert into mahasiswa (nrp,nama,jurusan,jenis_kelamin) values ('$nrp','$nama','$jurusan','$jenis_kelamin')";
	mysqli_query($koneksi,$query);
};


$tab_name = "mahasiswa";
$queri = "select * from data_mhs";
$hasil = mysqli_query($koneksi,$queri);
$field_count = mysqli_num_fields($hasil);
$sitejson = array();

while ($data=mysqli_fetch_array($hasil)) {
	$sitejson[]=array(
			'nrp' => $data['nrp'], 
			'nama' => $data['nama'],
			'jurusan' => $data['jurusan'],
			'jenis_kelamin' => $data['jenis_kelamin'] 
		);
};


$file = fopen('mahasiswa.json','w');
fwrite($file,json_encode($sitejson));
fclose($file);   

?>