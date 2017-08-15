<?php
$string	= file_get_contents('mahasiswa.json');
$json	= json_decode($string,true);

// $jsonIterator	= new RecursiveIteratorIterator(
	// new RecursiveIteratorIterator(json_decode($string,true)),
	// RecursiveIteratorIterator::SELF_FIRST);

?>

<table border="1">
	<tr style='background:#1abc9c; color:white'>
		<th>Nrp</th>
		<th>Nama</th>
		<th>Jurusan</th>
		<th>Jenis Kelamin</th>
	</tr>

<?php
foreach ($json as $key => $value) {
?>

<tr>
	<td><?php echo $value['nrp']; ?></td>
	<td><?php echo $value['nama']; ?></td>
	<td><?php echo $value['jurusan']; ?></td>
	<td><?php echo $value['jenis_kelamin']; ?></td>
</tr>

<?php
};

	echo "</table>";
?>