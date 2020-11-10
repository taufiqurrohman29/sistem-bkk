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
            <div class="col-lg-12">
                <?php foreach ($pengumuman as $pu): ?>

                <?php
                    $file = explode('.', $pu->file); 
                    $type = end($file); 
                ?>

                <div class="container box_1170">
                    <div class="section-top-border">
                        <div class="row">
                            <div class="col-lg-2 col-xs-2">
                                <div class="media contact-info">
                                    <div class="media-body">
                                        <?php if (in_array($type, ['jpg', 'jpeg', 'png'])): ?>
                                            <img src="<?= base_url('assets/image/' . $pu->file) ?>" class="img img-responsive" style="width: 80%;">
                                        <?php elseif(in_array($type, ['docx', 'doc'])): ?>
                                            <img src="<?= base_url('assets/image/icon-word.png') ?>" class="img img-responsive" style="width: 80%;">
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/image/icon-pdf.png') ?>" class="img img-responsive" style="width: 80%;">
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10 col-xs-10">
                                <h3><?= $pu->judul_pengumuman ?></h3>
                                <hr>
                                <?php if (in_array($type, ['jpg', 'jpeg', 'png'])): ?>
                                    <a href="<?= base_url('assets/image/'.$pu->file) ?>" class="btn btn-primary btn-sm" download>Download</a>
                                <?php else: ?>
                                    <a href="<?= base_url('assets/file/'.$pu->file) ?>" class="btn btn-primary btn-sm" download>Download</a>
                                <?php endif ?>
                            </div>
                            
                        </div>
                    </div>
                </div>


                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>