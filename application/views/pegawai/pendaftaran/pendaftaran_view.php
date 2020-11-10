        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-file"></i><b> DATA PENDAFTARAN</b>
        </div>

                    <!-- Content Row -->
          <div class="row">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

     
                        </div>
                        <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first" id="table_id">
                                <thead>
                                    <tr>
                                        <th class="text-gray-900" width="15">No</th>
                                        <th class="text-gray-900">Nama</th>
                                        <th class="text-gray-900">Nama Perusahaan</th>
                                        <th class="text-gray-900">Kontak</th>
                                        <th class="text-gray-900">Rata-Rata Nilai</th>
                                        <th class="text-gray-900">Status</th>
                                        <th class="text-gray-900">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                    foreach($pendaftaran as $pdf){ 
                                ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $pdf->nama ?></td>
                                        <td class="text-gray-800 small"><?php echo $pdf->nama_perusahaan ?></td>
                                        <td class="text-gray-800 small"><?php echo $pdf->kontak ?></td>
                                        <td class="text-gray-800 small"><?php echo $hasil = (($pdf->nilai_smt_1 + $pdf->nilai_smt_2 + $pdf->nilai_smt_3 + $pdf->nilai_smt_4+ $pdf->nilai_smt_5)/5) ?></td>
                                        <td class="text-gray-800 small">
                                            <?php if ($pdf->status == 0 ) : ?>
                                                <span class="badge badge-warning">Sedang Di Proses</span>
                                                <?php elseif($pdf->status == 1 ): ?>
                                                <span class="badge badge-success">Lolos Seleksi</span>
                                                <?php else: ?>
                                                <span class="badge badge-danger">Belum Lolos Seleksi</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            
                                                <a href="<?php echo base_url('pegawai/edit_pendaftaran/'.$pdf->id_pendaftaran); ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo base_url('pegawai/detail_pendaftaran/'.$pdf->id_pendaftaran); ?>" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?php echo base_url('pegawai/delete_pendaftaran/'.$pdf->id_pendaftaran); ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="far fa-trash-alt" onclick="return confirm('Yakin Ingin Menghapus?')"></i>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


          </div>
      </div>