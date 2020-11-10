        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-users"></i><b> DATA SISWA</b>
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
                                            <a class="btn btn-sm btn-primary active" href="<?php echo base_url(); ?>admin/tambah_siswa">
                                                <span class="icon">
                                                <i class="fa fa-plus"></i>
                                                </span>
                                            Tambah Siswa</a>
                                            <a class="btn btn-sm btn-danger active" href="<?php echo base_url(); ?>admin/print_siswa">
                                                <span class="icon">
                                                <i class="fa fa-print"></i>
                                                </span>
                                            Print</a>
                                            <a class="btn btn-sm btn-warning active" href="<?php echo base_url(); ?>admin/pdf_siswa">
                                                <span class="icon">
                                                <i class="fa fa-file"></i>
                                                </span>
                                            Export PDF</a>
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
                                        <th class="text-gray-900">Nama</th>
                                        <th class="text-gray-900">Jurusan</th>
                                        <th class="text-gray-900">Tahun Lulus</th>
                                        <th class="text-gray-900">Status Pekerjaan</th>
                                        <th class="text-gray-900">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                    foreach($siswa as $s){ 
                                ?>
                                    <tr>
                                        <td class="text-gray-800 small"><?= $no++; ?></td>
                                        <td class="text-gray-800 small"><?php echo $s->nama ?></td>
                                        <td class="text-gray-800 small"><?php echo $s->nama_jurusan ?></td>
                                        <td class="text-gray-800 small"><?php echo $s->tahun ?></td>
                                        <td class="text-gray-800 small"><?php echo $s->status_pekerjaan ?></td>
                                            </td>
                                        <td>
                                            
                                                <a href="<?php echo base_url('admin/edit_siswa/'.$s->id_siswa); ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fa fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/detail_siswa/'.$s->id_siswa); ?>" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/delete_siswa/'.$s->id_siswa); ?>" class="btn btn-danger btn-circle btn-sm">
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