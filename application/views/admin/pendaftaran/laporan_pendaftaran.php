        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-file"></i><b>LAPORAN DATA PENDAFTARAN</b>
        </div>

        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                       <?= form_open('') ?>
                       <div class="row">
                           <div class="col-lg-4">
                               <input type="date" name="tanggal1" class="form-control" required value="<?= set_value('tanggal1') ?>">
                           </div>
                           <div class="col-lg-4">
                               <input type="date" name="tanggal2" class="form-control" required value="<?= set_value('tanggal2') ?>">
                           </div>
                           <div class="col-lg-2">
                               <select name="status" class="form-control">
                                   <option value="3" <?= set_value('status') == '3' ? 'selected' : '' ?>>All</option>
                                   <option value="0" <?= set_value('status') == '0' ? 'selected' : '' ?>>Sedang di proses</option>
                                   <option value="1" <?= set_value('status') == '1' ? 'selected' : '' ?>>Lolos seleksi</option>
                                   <option value="2" <?= set_value('status') == '2' ? 'selected' : '' ?>>Tidak Lolos seleksi</option>
                               </select>
                           </div>
                           <div class="col-lg-2">
                               <button class="btn btn-primary btn-block" name="search"><i class="fa fa-search"></i></button>
                           </div>
                       </div>
                       <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <?php if (isset($_POST['search']) && count($pendaftaran)) : ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        Tanggal : <?= date('d/m/Y', strtotime($_POST['tanggal1'])) ?> s/d. <?= date('d/m/Y', strtotime($_POST['tanggal2'])) ?>
                        <a href="<?= base_url('admin/print_pendaftaran/'. $_POST['tanggal1'] . '/' . $_POST['tanggal2'] . '/' . $_POST['status']) ?>" class="btn btn-primary btn-sm float-right" target="__blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered first">
                            <thead>
                                <th class="text-center">No</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Nama Perusahaan</th>
                                <th>Job Loker</th>
                                <th>Nilai Rata Rata</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($pendaftaran as $pdf): ?>
                                    <tr>
                                        <td class="text-center"><?= $i++ ?></td>
                                        <td><?= $pdf->tanggal ?></td>
                                        <td><?= $pdf->nama ?></td>
                                        <td><?= $pdf->nama_perusahaan ?></td>
                                        <td><?= $pdf->judul_loker ?></td>
                                        <td><?= ($pdf->nilai_smt_1 + $pdf->nilai_smt_2 + $pdf->nilai_smt_3 + $pdf->nilai_smt_4 + $pdf->nilai_smt_5) / 5  ?></td>
                                        <td>
                                            <?php if ($pdf->status == 0 ) : ?>
                                                <span class="badge badge-warning">Sedang Di Proses</span>
                                                <?php elseif($pdf->status == 1 ): ?>
                                                <span class="badge badge-success">Lolos Seleksi</span>
                                                <?php else: ?>
                                                <span class="badge badge-danger">Belum Lolos Seleksi</span>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

        <?php if (isset($_POST['search']) && !count($pendaftaran) ) : ?>
            <div class="alert alert-danger">
                <i class="fas fa-fw fa-dismiss"></i> Data pendaftaran tanggal <?= date('d/m/Y', strtotime($_POST['tanggal1'])) ?> s/d. <?= date('d/m/Y', strtotime($_POST['tanggal2'])) ?> tidak ditemukan
            </div>
        <?php endif ?>
    </div>