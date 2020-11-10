<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<h3 align="center">DATA SISWA SMK YPP PURWOREJO</h3><hr>

	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jurusan</th>
			<th>Tahun Lulus</th>
			<th>Jenis Kelamin</th>
			<th>Status Pekerjaan</th>
			<th>Telepon</th>
		</tr>
	

	<?php 
	$no= 1;
	foreach ($siswa as $s) :?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $s->nama ?></td>
			<td><?php echo $s->kode_jurusan ?></td>
			<td><?php echo $s->tahun ?></td>
			<td><?php echo $s->jenis_kelamin ?></td>
			<td><?php echo $s->status_pekerjaan ?></td>
			<td><?php echo $s->kontak ?></td>
		</tr>
	<?php endforeach; ?>
	</table>

	<script type="text/javascript">window.print();</script>

</body>
</html>