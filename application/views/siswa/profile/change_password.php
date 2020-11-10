<link rel="stylesheet" href="<?= base_url('assets/frontend/') ?>css/nice-select.css">
<section class="contact-section section_padding">
    <div class="container">
        <?php if ($this->session->flashdata('message')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('message') ?></div>                    
        <?php endif ?>
        <?php if ($this->session->flashdata('failed')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('failed') ?></div>                    
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
                        
                        <div class="col-sm-12">
                           <div class="form-group">
                                <label>Current Password</label>
                                <input class="form-control" name="passwordLama" type="password"  value="<?=  set_value('passwordLama') ?>">
                                    <?= form_error('passwordLama', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input class="form-control" name="password1" type="password"  value="<?=  set_value('password1') ?>">
                                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="form-control" name="password2" type="password"  value="<?=  set_value('password2') ?>">
                                    <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                            </div>
                            
                        </div>

                  
                    </div>
                    <div class="form-group mt-3">
                        <a href="<?= base_url('siswa/profile') ?>" class="btn_2 float-left">Ubah Profile</a>
                        <button type="submit" name="submit" class="btn_2 float-right">Simpan</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</section>

<script>
    <script src="<?= base_url('assets/frontend/') ?>js/jquery.nice-select.min.js" type="1e165e1c1e5c8419ef51e687-text/javascript"></script>
</script>