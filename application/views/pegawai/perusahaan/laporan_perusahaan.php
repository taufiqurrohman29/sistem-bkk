        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-file"></i><b>LAPORAN PERUSAHAAN</b>
        </div>

        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('pegawai/print_perusahaan') ?>" class="btn btn-primary btn-sm float-right" target="__blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                        </div>
                    </div>
                </div>
            </div>


          </div>
      </div>