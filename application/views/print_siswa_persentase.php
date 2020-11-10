<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<h3 align="center">LAPORAN DATA SISWA SMK YPP Purworejo</h3>
	<h3 align="center">Tahun : <?= $this->db->get_where('tahun', ['id_tahun' => $_GET['tahun']])->row()->tahun  ?></h3>
	<hr size="5px" color="black">
    <table class="table table-bordered">
     <thead>
         <tr>
             <th>JURUSAN</th>
             <th>JUMLAH LULUSAN</th>
             <th>BERKERJA</th>
             <th>%</th>
             <th>KULIAH</th>
             <th>%</th>
             <th>BELUM KERJA</th>
             <th>%</th>
             <th>JUMLAH</th>
         </tr>
     </thead>
     <tbody>
         <?php 
         $total_lulusan = 0;
         $total_bekerja = 0;
         $total_mahasiswa = 0;
         $total_belum_bekerja = 0;
         $total_persen_bekerja = 0;
         $total_persen_mahasiswa = 0;
         $total_persen_belum_bekerja = 0;
         $total_jumlah = 0;
         foreach ($jurusan as $key): ?>
         <?php 
             $jumlah_lulusan = $this->db->get_where('siswa', ['id_tahun' => $_GET['tahun'], 'id_jurusan' => $key->id_jurusan])->num_rows(); 
             $jumlah_bekerja = $this->db->get_where('siswa', ['id_tahun' => $_GET['tahun'], 'id_jurusan' => $key->id_jurusan, 'status_pekerjaan' => 'Sudah Bekerja'])->num_rows(); 
             $jumlah_belum_bekerja = $this->db->get_where('siswa', ['id_tahun' => $_GET['tahun'], 'id_jurusan' => $key->id_jurusan, 'status_pekerjaan' => 'Belum Bekerja'])->num_rows(); 
             $jumlah_mahasiswa = $this->db->get_where('siswa', ['id_tahun' => $_GET['tahun'], 'id_jurusan' => $key->id_jurusan, 'status_pekerjaan' => 'Mahasiswa'])->num_rows(); 
         ?>
         <tr>
            <td><?= $key->nama_jurusan ?></td>
            <td><?= $jumlah_lulusan ?></td>
            <td><?= $jumlah_bekerja ?></td>
            <td><?= round($jumlah_bekerja ? ($jumlah_bekerja / $jumlah_lulusan) * 100 : 0, 0, 2)  ?>%</td>
            <td><?= $jumlah_mahasiswa ?></td>
            <td><?= round($jumlah_mahasiswa ? ($jumlah_mahasiswa / $jumlah_lulusan) * 100 : 0, 0, 2)  ?>%</td>
            <td><?= $jumlah_belum_bekerja ?></td>
            <td><?= round($jumlah_belum_bekerja ? ($jumlah_belum_bekerja / $jumlah_lulusan) * 100 : 0, 0, 2)  ?>%</td>
            <td><?= $jumlah_bekerja + $jumlah_mahasiswa + $jumlah_belum_bekerja ?></td>
        </tr>
         <?php 
             $total_lulusan += $jumlah_lulusan;
             $total_bekerja += $jumlah_bekerja;
             $total_mahasiswa += $jumlah_mahasiswa;
             $total_belum_bekerja += $jumlah_belum_bekerja;
             $total_persen_bekerja += $jumlah_bekerja ? ($jumlah_bekerja / $jumlah_lulusan) * 100 : 0;
             $total_persen_mahasiswa += $jumlah_mahasiswa ? ($jumlah_mahasiswa / $jumlah_lulusan) * 100 : 0;;
             $total_persen_belum_bekerja += $jumlah_belum_bekerja ? ($jumlah_belum_bekerja / $jumlah_lulusan) * 100 : 0;;
             $total_jumlah += $jumlah_bekerja + $jumlah_mahasiswa + $jumlah_belum_bekerja;
         endforeach ?>
     </tbody>
     <tfoot>
        <tr>
            <th>Total</th>
            <th><?= $total_lulusan ?></th>
            <th><?= $total_bekerja ?></th>
            <th><?= round($total_persen_bekerja, 0, 2) ?>%</th>
            <th><?= $total_mahasiswa ?></th>
            <th><?= round($total_persen_mahasiswa, 0, 2) ?>%</th>
            <th><?= $total_belum_bekerja ?></th>
            <th><?= round($total_persen_belum_bekerja, 0, 2) ?>%</th>
            <th><?= $total_jumlah ?></th>
        </tr>
     </tfoot>
 </table>
<script type="text/javascript">print();</script>
</body>
</html>