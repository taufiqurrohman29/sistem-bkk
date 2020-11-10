<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<h3 align="center">LAPORAN DATA PERUSAHAAN</h3>
<hr>
<br>
	
	<table class="table table-striped table-bordered">
     <thead>
         <tr>
             <th class="text-gray-900" width="15">No</th>
             <th class="text-gray-900">Nama Perusahaan</th>
             <th class="text-gray-900">Image</th>
         </tr>
     </thead>
     <tbody>
     <?php
     $no = 1;

      foreach($perusahaan as $p) :  ?>
         <tr>
             <td class="text-gray-800 small"><?= $no++; ?></td>
             <td class="text-gray-800 small"><?php echo $p->nama_perusahaan ?></td>
             <td class="text-gray-800 small"><img width="90" height="70" src="<?php echo base_url('assets/image/').$p->image  ?>"></td>
         </tr>
     <?php endforeach ?>
     </tbody>
 </table>

	<script type="text/javascript">window.print();</script>

</body>
</html>