        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-school"></i><b> IDENTITAS BURSA KERJA KHUSUS</b>
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
                                        <th class="text-gray-900">Judul Website</th>
                                        <th class="text-gray-900">alamat</th>
                                        <th class="text-gray-900">email</th>
                                        <th class="text-gray-900">telepon</th>
                                        <th class="text-gray-900">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                    foreach($identitas as $i){ 
                                ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $i->judul_website ?></td>
                                        <td class="text-gray-800 small"><?php echo $i->alamat ?></td>
                                        <td class="text-gray-800 small"><?php echo $i->email ?></td>
                                        <td class="text-gray-800 small"><?php echo $i->telepon ?></td>
                                            </td>
                                        <td>
                                            
                                                <a href="<?php echo base_url('pegawai/edit_identitas/'.$i->id_identitas); ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
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