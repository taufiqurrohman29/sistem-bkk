
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
                        <i class="fas fa-fw fa-file"></i><b> EDIT JURUSAN</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <?php foreach($jurusan as $j){ ?>
                        <form method="POST" action="<?php echo base_url(); ?>pegawai/update_jurusan/<?php echo $j->id_jurusan ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_jurusan" value="<?php echo $j->id_jurusan ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kode Jurusan</label>
                                <input class="form-control" id="inputdefault" type="text" name="kode_jurusan" required value="<?php echo $j->kode_jurusan ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Jurusan</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama_jurusan" required value="<?php echo $j->nama_jurusan ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>pegawai/jurusan">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>