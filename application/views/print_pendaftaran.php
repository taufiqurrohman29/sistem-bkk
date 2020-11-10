<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<h3 align="center">LAPORAN DATA PENDAFTARAN </h3>
		<h4 align="center"><?= date('d/m/Y', strtotime($this->uri->segment(3))) ?> s/d. <?= date('d/m/Y', strtotime($this->uri->segment(4))) ?> </h4>
		<hr size="5px" color="black">
		<table class="table table-striped table-bordered first">
		 <thead>
		     <th class="text-center">No</th>
		     <th>Tanggal</th>
		     <th>Nama</th>
		     <th>Nama Perusahaan</th>
		     <th>Job Loker</th>
		     <th>Nilai Rata Rata</th>
		     <th>Status</th>
		 </thead>
		 <tbody>
		     <?php $i=1; foreach ($pendaftaran as $pdf): ?>
		         <tr>
		             <td class="text-center"><?= $i++ ?></td>
		             <td><?= date('d/m/Y', strtotime($pdf->tanggal)) ?></td>
		             <td><?= $pdf->nama ?></td>
		             <td><?= $pdf->nama_perusahaan ?></td>
		             <td><?= $pdf->judul_loker ?></td>
		             <td><?= ($pdf->nilai_smt_1 + $pdf->nilai_smt_2 + $pdf->nilai_smt_3 + $pdf->nilai_smt_4 + $pdf->nilai_smt_5) / 5  ?></td>
		             <td>
		                 <?php if ($pdf->status == 0 ) : ?>
		                     Sedang Di Proses
		                     <?php elseif($pdf->status == 1 ): ?>
		                     Lolos Seleksi
		                     <?php else: ?>
		                     Belum Lolos Seleksi
		                 <?php endif ?>
		             </td>
		         </tr>
		     <?php endforeach ?>
		 </tbody>
		</table>

	<script type="text/javascript">window.print();</script>

</body>
</html>