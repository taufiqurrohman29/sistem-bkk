
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
                        <i class="fas fa-fw fa-building"></i><b> EDIT PERUSAHAAN</b>
                        </div>

                    <?php foreach($perusahaan as $p){ ?>

                        <?php echo form_open_multipart(''); ?>
                            <div class="form-group">
                                <input type="hidden" name="id_perusahaan" value="<?php echo $p->id_perusahaan ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Perusahaan</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama_perusahaan" required value="<?php echo $p->nama_perusahaan ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Upload Image</label>
                                <br>
                                <input id="inputdefault" type="file" name="image" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Tambah</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/perusahaan">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>