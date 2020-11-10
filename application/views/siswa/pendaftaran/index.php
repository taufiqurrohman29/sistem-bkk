<section class="special_cource padding_top">
    <div class="container">
        <marquee><div class="alert alert-danger">Pastikan anda selalu cek pengumuman untuk informasi terbaru</div></marquee>
        
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('message') ?></div>                    
        <?php endif ?>
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2><?= $title ?></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Job loker</th>
                                <th>Rata-rata nilai</th>
                                <th>Status Pendaftaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;foreach ($pendaftaran as $pdf): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $pdf->nama_perusahaan ?></td>
                                <td><?= $pdf->judul_loker ?></td>
                                <td><?= $hasil = (($pdf->nilai_smt_1 + $pdf->nilai_smt_2 + $pdf->nilai_smt_3 + $pdf->nilai_smt_4+ $pdf->nilai_smt_5)/5) ?></td>
                                <td>
                                <?php if ($pdf->status == 0): ?>
                                    <div class="badge badge-info">
                                        Sedang di proses
                                    </div>
                                <?php elseif($pdf->status == 1): ?>
                                    <div class="badge badge-success">
                                        Lolos seleksi
                                    </div>
                                <?php else: ?>
                                    <div class="badge badge-danger">
                                        Belum lolos seleksi
                                    </div>
                                <?php endif ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('siswa/detail_pendaftaran/'.$pdf->id_pendaftaran) ?>" class="btn btn-info btn-sm">Detail</a>
                                    <?php if ($pdf->status == 0): ?>
                                        <a href="<?= base_url('siswa/batal_pendaftaran/'.$pdf->id_pendaftaran) ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin pendaftaran ini mau di batalkan <?= $pdf->nama_perusahaan ?> ?')">Batalkan</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php $i++;endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>