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
                        <img src="<?= base_url('assets/image/' . $loker->image) ?>" class="img img-responsive img-thumbnail" style="width: 100%; height: 200px">
                    </div>
                </div>

                <div class="media contact-info">
                    <span class="contact-info__icon">
                        <i class="ti-home"></i>
                    </span>
                    <div class="media-body">
                        <h3>Nama Perusahaan</h3>
                        <p><?= $loker->nama_perusahaan ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon">
                        <i class="ti-tablet"></i>
                    </span>
                    <div class="media-body">
                        <h3>Job Loker</h3>
                        <p><?= $loker->judul_loker ?></p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon">
                        <i class="ti-email"></i>
                    </span>
                    <div class="media-body">
                        <h3>Deskripsi</h3>
                        <p><?= $loker->deskripsi_loker ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form class="form-contact contact_form" action="" method="POST">
                    <div class="row">
                        
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input class="form-control" name="nilai_smt_1" type="number" 
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nilai Rapor Matematika Semester 1'"
                                    placeholder="Nilai Rapor Matematika Semester 1" value="<?= set_value('nilai_smt_1') ?>">
                                    <?= form_error('nilai_smt_1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="nilai_smt_2" type="number" 
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nilai Rapor Matematika Semester 2'"
                                    placeholder="Nilai Rapor Matematika Semester 2" value="<?= set_value('nilai_smt_2') ?>">
                                    <?= form_error('nilai_smt_2', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="nilai_smt_3" type="number" 
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nilai Rapor Matematika Semester 3'"
                                    placeholder="Nilai Rapor Matematika Semester 3" value="<?= set_value('nilai_smt_3') ?>">
                                    <?= form_error('nilai_smt_3', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="nilai_smt_4" type="number" 
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nilai Rapor Matematika Semester 4'"
                                    placeholder="Nilai Rapor Matematika Semester 4" value="<?= set_value('nilai_smt_4') ?>">
                                    <?= form_error('nilai_smt_4', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="nilai_smt_5" type="number" 
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nilai Rapor Matematika Semester 5'"
                                    placeholder="Nilai Rapor Matematika Semester 5" value="<?= set_value('nilai_smt_5') ?>">
                                    <?= form_error('nilai_smt_5', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-sm-7">
                            <div class="form-group">
                                <input class="form-control" name="nama_ayah" type="text"
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nama ayah'"
                                    placeholder="Nama ayah" value="<?= set_value('nama_ayah') ?>">
                                    <?= form_error('nama_ayah', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="nama_ibu" type="text"
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nama Ibu'"
                                    placeholder="Nama Ibu" value="<?= set_value('nama_ibu') ?>">
                                    <?= form_error('nama_ibu', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="no_hp_ortu" type="number"
                                    onfocus="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = ''"
                                    onblur="if (!window.__cfRLUnblockHandlers) return false; this.placeholder = 'Nomor Hp Oarng Tua'"
                                    placeholder="Nomor Hp Orang Tua" value="<?= set_value('no_hp_ortu') ?>">
                                    <?= form_error('no_hp_ortu', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <a href="<?= base_url('siswa/loker') ?>" class="btn_2 float-left">kembali</a>
                        <button type="submit" name="submit" class="btn_2 float-right" onclick="return confirm('Apakah data sudah sesuai?')">Kirim</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>