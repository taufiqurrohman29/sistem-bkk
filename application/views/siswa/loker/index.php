<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <h2><?= $title ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($loker as $l): ?>
            <?php if (!$this->db->get_where('pendaftaran', ['id_loker' => $l->id_loker, 'id_siswa' => $this->session->userdata('id_siswa')])->num_rows()): ?>
            <div class="col-sm-6 col-lg-4 text-center" >
                <div class="single_special_cource" style="box-shadow: 0px 2px 15px #ddd">
                    <img src="<?= base_url('assets/image/' . $l->image) ?>" class="special_img" alt="" style="width: 100%; height: 200px">
                    <div class="special_cource_text">
                        <a href="" class="btn_4"><?= $l->nama_perusahaan ?></a>
                        <a href="">
                            <h3><?= $l->judul_loker ?></h3>
                        </a>
                        <div class="author_info">

                            <a href="<?= base_url('siswa/detail_loker/' . $l->id_loker) ?>" class="btn btn-primary btn-block">Kirim Lamaran</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</section>
<br><br>