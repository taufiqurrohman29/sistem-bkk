        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-building"></i><b> DATA LOKER</b>
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
                                            <a class="btn btn-sm btn-primary active" href="<?php echo base_url(); ?>admin/tambah_loker">
                                                <span class="icon">
                                                <i class="fa fa-plus"></i>
                                                </span>

                                            Tambah Loker</a>
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
                                        <th class="text-gray-900">Nama Perusahaan</th>
                                        <th class="text-gray-900">Job Loker</th>
                                        <th class="text-gray-900">Image</th>
                                        <th class="text-gray-900">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1; 
                                ?>
                                <?php foreach($loker as $l) :  ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $l->nama_perusahaan ?></td>
                                        <td class="text-gray-800 small"><?php echo $l->judul_loker ?></td>
                                        <td class="text-gray-800 small"><img width="90" height="70" src="<?php echo base_url('assets/image/').$l->image  ?>"></td>
                                        
                                        <td>
                                                <a href="<?php echo base_url('admin/edit_loker/'.$l->id_loker); ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/delete_loker/'.$l->id_loker); ?>" class="btn btn-danger btn-circle btn-sm">
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