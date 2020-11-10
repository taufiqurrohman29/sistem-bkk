
    <div class="container-fluid">
        <!-- pageheader -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                        <i class="fas fa-fw fa-building"></i><b> TAMBAH PENGUMUMAN</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>

                        <?php echo form_open_multipart('admin/tambah_pengumuman_aksi'); ?>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Judul</label>
                                <input class="form-control" id="inputdefault" type="text" name="judul_pengumuman" required>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Upload File</label>
                                <br>
                                <input id="inputdefault" type="file" name="image" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Tambah</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/pengumuman">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>