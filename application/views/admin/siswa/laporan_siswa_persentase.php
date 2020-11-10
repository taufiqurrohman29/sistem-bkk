        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-file"></i><b>LAPORAN DATA SISWA PERSENTASE</b>
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
                           <div class="col-lg-10">
                               <select class="form-control" required name="id_tahun">
                                    <option value="">-- Pilih tahun --</option>
                                   <?php foreach ($tahun as $t): ?>
                                    <option value="<?= $t->id_tahun ?>" <?= set_value('id_tahun') ? set_value('id_tahun') == $t->id_tahun ? 'selected' : '' : '' ?>><?= $t->tahun ?></option>
                                   <?php endforeach ?>
                               </select>
                           </div>
                           <div class="col-lg-2">
                               <button class="btn btn-primary btn-block"><i class="fa fa-search"></i></button>
                           </div>
                       </div>
                       <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>

        <br><br>

        <?php if (@$_POST['id_tahun']): ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        Tahun Lulus : <?= $this->db->get_where('tahun', ['id_tahun' => $_POST['id_tahun']])->row()->tahun; ?>
                        <a href="<?= base_url('admin/print_siswa_persentase?tahun='.$_POST['id_tahun']) ?>" class="btn btn-primary btn-sm float-right" target="__blank"><i class="fa fa-print"></i> Print</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>JURUSAN</th>
                                    <th>JUMLAH LULUSAN</th>
                                    <th>BEKERJA</th>
                                    <th>%</th>
                                    <th>KULIAH</th>
                                    <th>%</th>
                                    <th>BELUM KERJA</th>
                                    <th>%</th>
                                    <th>JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $total_lulusan = 0;
                                $total_bekerja = 0;
                                $total_mahasiswa = 0;
                                $total_belum_bekerja = 0;
                                $total_persen_bekerja = 0;
                                $total_persen_mahasiswa = 0;
                                $total_persen_belum_bekerja = 0;
                                $total_jumlah = 0;
                                foreach ($jurusan as $j): ?>
                                <?php 
                                    $jumlah_lulusan = $this->db->get_where('siswa', ['id_tahun' => $_POST['id_tahun'], 'id_jurusan' => $j->id_jurusan])->num_rows(); 
                                    $jumlah_bekerja = $this->db->get_where('siswa', ['id_tahun' => $_POST['id_tahun'], 'id_jurusan' => $j->id_jurusan, 'status_pekerjaan' => 'Sudah Bekerja'])->num_rows(); 
                                    $jumlah_belum_bekerja = $this->db->get_where('siswa', ['id_tahun' => $_POST['id_tahun'], 'id_jurusan' => $j->id_jurusan, 'status_pekerjaan' => 'Belum Bekerja'])->num_rows(); 
                                    $jumlah_mahasiswa = $this->db->get_where('siswa', ['id_tahun' => $_POST['id_tahun'], 'id_jurusan' => $j->id_jurusan, 'status_pekerjaan' => 'Mahasiswa'])->num_rows(); 
                                ?>
                                <tr>
                                    <td><?= $j->nama_jurusan ?></td>
                                    <td><?= $jumlah_lulusan ?></td>
                                    <td><?= $jumlah_bekerja ?></td>
                                    <td><?= round($jumlah_bekerja ? ($jumlah_bekerja / $jumlah_lulusan) * 100 : 0, 0, 2)  ?>%</td>
                                    <td><?= $jumlah_mahasiswa ?></td>
                                    <td><?= round($jumlah_mahasiswa ? ($jumlah_mahasiswa / $jumlah_lulusan) * 100 : 0, 0, 2)  ?>%</td>
                                    <td><?= $jumlah_belum_bekerja ?></td>
                                    <td><?= round($jumlah_belum_bekerja ? ($jumlah_belum_bekerja / $jumlah_lulusan) * 100 : 0, 0, 2)  ?>%</td>
                                    <td><?= $jumlah_bekerja + $jumlah_mahasiswa + $jumlah_belum_bekerja ?></td>
                                </tr>
                                <?php 
                                    $total_lulusan += $jumlah_lulusan;
                                    $total_bekerja += $jumlah_bekerja;
                                    $total_mahasiswa += $jumlah_mahasiswa;
                                    $total_belum_bekerja += $jumlah_belum_bekerja;
                                    $total_persen_bekerja += $jumlah_bekerja ? ($jumlah_bekerja / $jumlah_lulusan) * 100 : 0;
                                    $total_persen_mahasiswa += $jumlah_mahasiswa ? ($jumlah_mahasiswa / $jumlah_lulusan) * 100 : 0;;
                                    $total_persen_belum_bekerja += $jumlah_belum_bekerja ? ($jumlah_belum_bekerja / $jumlah_lulusan) * 100 : 0;;
                                    $total_jumlah += $jumlah_bekerja + $jumlah_mahasiswa + $jumlah_belum_bekerja;
                                endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <th><?= $total_lulusan ?></th>
                                    <th><?= $total_bekerja ?></th>
                                    <th><?= round($total_persen_bekerja, 0, 2) ?>%</th>
                                    <th><?= $total_mahasiswa ?></th>
                                    <th><?= round($total_persen_mahasiswa, 0, 2) ?>%</th>
                                    <th><?= $total_belum_bekerja ?></th>
                                    <th><?= round($total_persen_belum_bekerja, 0, 2) ?>%</th>
                                    <th><?= $total_jumlah ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>