        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-file"></i><b> DATA JURUSAN</b>
        </div>  
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                         
                        <div class="row">
                                    <div class="col-sm-8">
                                        <p class="text-left">
                                            <a class="btn btn-sm btn-primary active" href="<?php echo base_url(); ?>admin/tambah_jurusan">
                                                <span class="icon">
                                                <i class="fa fa-plus"></i>
                                                </span>

                                            Tambah Jurusan</a>
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
                            <table class="table table-striped table-bordered first" id="table_id">
                                <thead>
                                    <tr>
                                        <th class="text-gray-900" width="15">No</th>
                                        <th class="text-gray-900">Kode</th>
                                        <th class="text-gray-900">Jurusan</th>
                                        <th class="text-gray-900">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                    foreach($jurusan as $j) : 
                                ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?=$no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $j->kode_jurusan ?></td>
                                        <td class="text-gray-800 small"><?php echo $j->nama_jurusan ?></td>
                                            </td>
                                        <td>
                                            
                                                <a href="<?php echo base_url('admin/edit_jurusan/'.$j->id_jurusan); ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/delete_jurusan/'.$j->id_jurusan); ?>" class="btn btn-danger btn-circle btn-sm">
                                                    <i class="far fa-trash-alt" onclick="return confirm('Yakin Ingin Menghapus?')"></i>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


          </div>
      </div>