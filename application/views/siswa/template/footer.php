  <footer class="footer-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-12 col-sm-6 col-md-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Contact us</h4>
                            <div class="contact_info">
                                <p>
                                    <span>Website : </span> <?= $identitas->judul_website ?>
                                </p>
                                <p>
                                    <span>Alamat : </span><?= $identitas->alamat ?>
                                </p>
                                <p>
                                    <span>Email : </span><?= $identitas->email ?>
                                </p>
                                <p>
                                    <span>No.Telp : </span><?= $identitas->telepon ?>
                                </p>
                            </div>
                            <div class="social_icon">
                                <a href="#">
                                    <i class="ti-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-twitter-alt"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-instagram"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-skype"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright_part_text text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="footer-text m-0">
                                        Copyright &copy;
                                        All rights reserved | <a href="#"><?= $identitas->judul_website ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="http://code.jquery.com/jquery-2.2.0.min.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script src="<?= base_url('assets/vendor/toast/jquery.toast.min.js') ?>" type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script async='async' type="text/javascript">                

            $(document).ready(function(){
                alert('hello world');
            })
              
            <?php if ($this->session->flashdata('message')): ?>
               notifikasi('message', "<?= $this->session->flashdata('message'); ?>");
            <?php elseif($this->session->flashdata('failed')): ?>
               notifikasi('failed', "<?= $this->session->flashdata('failed'); ?>");
            <?php endif ?>
        </script>
        <script src="<?= base_url('assets/frontend/') ?>js/popper.min.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script src="<?= base_url('assets/frontend/') ?>js/jquery.magnific-popup.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>

        <script src="<?= base_url('assets/frontend/') ?>js/swiper.min.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>

        <script
            src="<?= base_url('assets/frontend/') ?>js/masonry.pkgd.js"
            type="cc19fd475a05c03a09563b83-text/javascript"></script>

        <script
            src="<?= base_url('assets/frontend/') ?>js/owl.carousel.min.js"
            type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script
            src="<?= base_url('assets/frontend/') ?>js/jquery.nice-select.min.js"
            type="cc19fd475a05c03a09563b83-text/javascript"></script>

        <script src="<?= base_url('assets/frontend/') ?>js/slick.min.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script
            src="<?= base_url('assets/frontend/') ?>js/jquery.counterup.min.js"
            type="cc19fd475a05c03a09563b83-text/javascript"></script>
        <script
            src="<?= base_url('assets/frontend/') ?>js/waypoints.min.js"
            type="cc19fd475a05c03a09563b83-text/javascript"></script>

        <script src="<?= base_url('assets/frontend/') ?>js/custom.js" type="cc19fd475a05c03a09563b83-text/javascript"></script>

        <script
            async="async"
            src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
            type="cc19fd475a05c03a09563b83-text/javascript"></script>

    </body>

    <!-- Mirrored from colorlib.com/preview/theme/etrain/index.html by HTTrack
    Website Copier/3.x [XR&CO'2014], Tue, 14 Jan 2020 08:19:26 GMT -->
</html>