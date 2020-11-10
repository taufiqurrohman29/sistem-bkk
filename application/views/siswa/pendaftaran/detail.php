<section class="contact-section section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2><?= $title ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-4" >
                  <div class="media contact-info">
                    <div class="media-body">
                        <img src="<?= base_url('assets/image/' . $pendaftaran->image) ?>" class="img img-responsive img-thumbnail" style="width: 100%; height: 200px">
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon">
                        <i class="ti-home"></i>
                    </span>
                    <div class="media-body">
                        <h3>Nama Perusahaan</h3>
                        <p><?= $pendaftaran->nama_perusahaan ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon">
                        <i class="ti-tablet"></i>
                    </span>
                    <div class="media-body">
                        <h3>Job Loker</h3>
                        <p><?= $pendaftaran->judul_loker ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon">
                        <i class="ti-email"></i>
                    </span>
                    <div class="media-body">
                        <h3>Deskripsi</h3>
                        <p><?= $pendaftaran->deskripsi_loker ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row">
                    
                    <div class="col-sm-5">
                        <div class="input-group">
                            <br><br>
                            <input class="form-control mb-3" name="nilai_smt_1" type="number"  readonly value="<?= $pendaftaran->nilai_smt_1 ?>">
                        </div>
                        <div class="input-group">
                            <br><br>
                            <input class="form-control mb-3" name="nilai_smt_2" type="number"  readonly value="<?= $pendaftaran->nilai_smt_2 ?>">
                        </div>
                        <div class="input-group">
                            <br><br>
                            <input class="form-control mb-3" name="nilai_smt_3" type="number"  readonly value="<?= $pendaftaran->nilai_smt_3 ?>">
                        </div>
                        <div class="input-group">
                            <br><br>
                            <input class="form-control mb-3" name="nilai_smt_4" type="number"  readonly value="<?= $pendaftaran->nilai_smt_4 ?>">
                        </div>
                        <div class="input-group">
                            <br><br>
                            <input class="form-control mb-3" name="nilai_smt_5" type="number"  readonly value="<?= $pendaftaran->nilai_smt_5 ?>">
                        </div>
                    </div>

                    <div class="col-sm-7">
                        <div class="form-group">
                            <input class="form-control" name="nama_ayah" type="text"
                                onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nama ayah'"
                                placeholder="Nama ayah" readonly value="<?= $pendaftaran->nama_ayah ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="nama_ibu" type="text"
                                onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nama Ibu'"
                                placeholder="Nama Ibu" readonly value="<?= $pendaftaran->nama_ibu ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="no_hp_ortu" type="number"
                                onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nomor Hp Oarng Tua'"
                                placeholder="Nomor Hp Orang Tua" readonly value="<?= $pendaftaran->no_hp_ortu ?>">
                        </div>
                        <div class="form-group">
                            <p>Status : <b>
                                <?php if ($pendaftaran->status == 0): ?>
                                    Sedang di proses
                                <?php elseif($pendaftaran->status == 1): ?>
                                    Lolos seleksi
                                <?php else: ?>
                                    Belum lolos seleksi
                                <?php endif ?>
                            </b></p>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <a href="<?= base_url('siswa/pendaftaran') ?>" class="btn_2 float-left">kembali</a>
                </div>
            
            </div>
            
        </div>
    </div>
</section>