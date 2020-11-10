
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
                        <i class="fas fa-fw fa-file"></i><b> TAMBAH JURUSAN</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/tambah_jurusan_aksi">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kode Jurusan</label>
                                <input class="form-control" id="inputdefault" type="text" name="kode_jurusan" required>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Jurusan</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama_jurusan" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Tambah</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/jurusan">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>