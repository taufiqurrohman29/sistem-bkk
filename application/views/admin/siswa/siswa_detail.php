<div class="container-fluid">

          <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-user"></i><b> DETAIL SISWA</b>
        </div>
        <div class="row">
          <div class="col-sm-12">

               <p class="text-left">
                    <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/siswa">Kembali</a>
               </p>
          </div>
          </div>
          <div class="card">
                    <div class="card-body">

          <table class="table table hover table-borderes">

          	<?php foreach($siswa as $s) :  ?>
                    <img class="mb-3" style="width: 15%" src="<?php echo base_url('assets/image/').$s->image  ?>">
          		<tr>
          			<td class="text-gray-800">Nama Siswa</td>
          			<td class="text-gray-800"><?php echo $s->nama; ?></td>
          		</tr>
                    <tr>
                         <td class="text-gray-800">Jurusan</td>
                         <td class="text-gray-800"><?php echo $s->nama_jurusan; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Tahun</td>
                         <td class="text-gray-800"><?php echo $s->tahun; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Jenis Kelamin</td>
                         <td class="text-gray-800"><?php echo $s->jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Tempat Lahir</td>
                         <td class="text-gray-800"><?php echo $s->tempat; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Tanggal Lahir</td>
                         <td class="text-gray-800"><?php echo $s->tanggal_lahir; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Desa</td>
                         <td class="text-gray-800"><?php echo $s->desa; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">RT</td>
                         <td class="text-gray-800"><?php echo $s->rt; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">RW</td>
                         <td class="text-gray-800"><?php echo $s->rw; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Kecamatan</td>
                         <td class="text-gray-800"><?php echo $s->kecamatan; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Kabupaten</td>
                         <td class="text-gray-800"><?php echo $s->kabupaten; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Kode Pos</td>
                         <td class="text-gray-800"><?php echo $s->kodepos; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Email</td>
                         <td class="text-gray-800"><?php echo $s->email; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Kontak</td>
                         <td class="text-gray-800"><?php echo $s->kontak; ?></td>
                    </tr>
                    <tr>
                         <td class="text-gray-800">Status Pekerjaan</td>
                         <td class="text-gray-800"><?php echo $s->status_pekerjaan; ?></td>
                    </tr>
                    
                    

          	<?php endforeach; ?>
          	



          </table>
     </div>
</div>
</div>