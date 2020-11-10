<link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/nice-select.css">
<section class="contact-section section_padding">
    <div class="container">
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
                <form class="form-contact contact_form" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="text"  value="<?= ($siswa->email) ? $siswa->email : set_value('email') ?>" readonly disabled>
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input class="form-control" name="nama" type="text"  value="<?= ($siswa->nama) ? $siswa->nama : set_value('nama') ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Status Pekerjaan</label>
                                <div class="mb-5">
                                <select name="status_pekerjaan" class="default-select form-control" id="default-select" >
                                    <option value="">-- Pilih Status Pekerjaan --</option>
                                    <option value="Mahasiswa" <?= ($siswa->status_pekerjaan == 'Mahasiswa') ? 'selected' : '' ?>>Mahasiswa</option>
                                    <option value="Sudah Bekerja" <?= ($siswa->status_pekerjaan == 'Sudah Bekerja') ? 'selected' : '' ?>>Sudah Bekerja</option>
                                    <option value="Belum Bekerja" <?= ($siswa->status_pekerjaan == 'Belum Bekerja') ? 'selected' : '' ?>>Belum Bekerja</option>
                                </select>
                                </div>
                                    <?= form_error('status_pekerjaan', '<small class="text-danger">', '</small>') ?>
                            </div>
                            
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="">No Handphone</label>
                                <input class="form-control" name="kontak" type="number"  value="<?= ($siswa->kontak) ? $siswa->kontak : set_value('kontak') ?>">
                                    <?= form_error('kontak', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Picture</label><br>
                                <img src="<?= base_url('assets/image/' . $siswa->image) ?>" class="img img-responsive img-thumbnail" style="width: 150px; height: 150px">
                                <input class="form-control" name="picture" type="file" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <a href="<?= base_url('siswa/change_password') ?>" class="btn_2 float-left">Ubah Password</a>
                        <button type="submit" name="submit" class="btn_2 float-right">Simpan</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>

<script src="<?= base_url('assets/frontend/') ?>js/jquery.nice-select.min.js" type="1e165e1c1e5c8419ef51e687-text/javascript"></script>