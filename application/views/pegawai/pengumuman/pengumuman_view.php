        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-building"></i><b> DATA PENGUMUMAN</b>
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
                            <div class="col-sm-10">
                                        <p class="text-left">
                                            <a class="btn btn-sm btn-primary active" href="<?php echo base_url(); ?>pegawai/tambah_pengumuman">
                                                <span class="icon">
                                                <i class="fa fa-plus"></i>
                                                </span>

                                            Tambah Pengumuman</a>
                                        </p>
                                    </div>
                        </div>

                        <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table_id">
                                <thead>
                                    <tr>
                                        <th class="text-gray-900" width="15">No</th>
                                        <th class="text-gray-900">Judul</th>
                                        <th class="text-gray-900" width="70">File</th>
                                        <th class="text-gray-900" width="50">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1; 
                                ?>
                                <?php foreach($pengumuman as $pu) :  ?>
                                    <?php
                                        $file = explode('.', $pu->file); 
                                        $type = strtolower(end($file)); 

                                    ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $pu->judul_pengumuman ?></td>
                                       <!--  <td class="text-gray-800 small"><img width="90" height="70" src="<?php echo base_url('assets/file/').$pu->file  ?>"></td> -->
                                      <td class="text-gray-800 small">
                                           <?php if (in_array($type, ['jpg', 'jpeg', 'png'])): ?>
                                            <img src="<?= base_url('assets/image/' . $pu->file) ?>" class="img img-responsive img-thumbnail" style="width: 150px; height: 150px">
                                        <?php elseif(in_array($type, ['docx', 'doc'])): ?>
                                            <img src="<?= base_url('assets/image/icon-word.png') ?>" class="img img-responsive" style="width: 150px; height: 150px">
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/image/icon-pdf.png') ?>" class="img img-responsive" style="width: 150px; height: 150px">
                                        <?php endif ?>
                                      </td>
                                        
                                        <td>
                                                <a href="<?php echo base_url('pegawai/edit_pengumuman/'.$pu->id_pengumuman); ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo base_url('pegawai/delete_pengumuman/'.$pu->id_pengumuman); ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="far fa-trash-alt" onclick="return confirm('Yakin Ingin Menghapus?')"></i>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


          </div>
      </div>