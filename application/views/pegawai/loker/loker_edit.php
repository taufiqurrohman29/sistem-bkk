
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-fw fa-building"></i><b> EDIT LOKER</b>
        </div>
        <!-- pageheader -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>

                    <?php foreach($loker as $l){ ?>

                        <?php echo form_open_multipart(''); ?>
                            <div class="form-group">
                                <input type="hidden" name="id_loker" value="<?php echo $l->id_loker ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Perusahaan</label>
                                <select class="form-control" name="nama_perusahaan">
                                    <option value="null">Pilih</option>
                                <?php foreach($perusahaan as $p){ ?>
                                    <option value="<?php echo $p->nama_perusahaan ?>"><?php echo $p->nama_perusahaan ?> </option>
                                <?php } ?>
                                </select>
                                 
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Job Loker</label>
                                <input class="form-control" id="inputdefault" type="text" name="judul_loker" value="<?php echo $l->judul_loker ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Upload Image</label>
                                <br>
                                <input id="inputdefault" type="file" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Deskripsi</label>
                                <textarea class="form-control" id="inputdefault" type="text" name="deskripsi_loker" rows="10" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Tambah</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>pegawai/loker">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>