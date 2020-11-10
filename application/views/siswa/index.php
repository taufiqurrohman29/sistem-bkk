<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-6">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h5>Website Job Loker</h5>
                        <h1><?= $identitas->judul_website ?></h1>
                        <p>Pelayanan penyaluran bursa tenaga kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="feature_part">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xl-4">
                <a href="<?= base_url('siswa/loker') ?>">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon">
                                <i class="ti-layers"></i>
                            </span>
                            <h4>Loker</h4>
                            <p>Cari loker yang tersedia</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-4">
                <a href="<?= base_url('siswa/pendaftaran') ?>">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon">
                                <i class="ti-new-window"></i>
                            </span>
                            <h4>Pendaftaran</h4>
                            <p>Cek lamaran anda</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-xl-4">
                <a href="<?= base_url('siswa/pengumuman') ?>">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <span class="single_service_icon style_icon">
                                <i class="ti-light-bulb"></i>
                            </span>
                            <h4>Pengumuman</h4>
                            <p>Cek pengumuman</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-lg-stretch">
            <div class="col-md-7 col-lg-7">
                <div class="learning_img">
                    <img src="<?= base_url('assets/frontend/') ?>img/learning_img.png" alt="">
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="learning_member_text">
                    <h5>Tentang BKK</h5>
                    <hr>
                    <p><?= $tentang_bkk->deskripsi ?></p>
                    <!-- <a href="#" class="btn_1">Read More</a> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="member_counter">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter"><?php echo $this->loker_model->semua_loker()->num_rows() ?></span>
                    <h4>Loker</h4>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter"><?php echo $this->db->get_where('pendaftaran', ['id_siswa' => $this->session->userdata('id_siswa')])->num_rows() ?></span>
                    <h4>Pendaftaran</h4>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single_member_counter">
                    <span class="counter"><?php echo $this->pengumuman_model->semua_pengumuman()->num_rows() ?></span>
                    <h4>Pengumuman</h4>
                </div>
            </div>
        </div>
    </div>
</section>

