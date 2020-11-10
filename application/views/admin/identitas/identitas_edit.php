
    <div class="container-fluid">

        
        <!-- pageheader -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                        <i class="fas fa-fw fa-file"></i><b> EDIT IDENTITAS BKK</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <?php foreach($identitas as $i){ ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/update_identitas/<?php echo $i->id_identitas ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_identitas" value="<?php echo $i->id_identitas ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Judul Website</label>
                                <input class="form-control" id="inputdefault" type="text" name="judul_website" required value="<?php echo $i->judul_website ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Alamat</label>
                                <input class="form-control" id="inputdefault" type="text" name="alamat" required value="<?php echo $i->alamat ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Email</label>
                                <input class="form-control" id="inputdefault" type="text" name="email" required value="<?php echo $i->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Telepon</label>
                                <input class="form-control" id="inputdefault" type="text" name="telepon" required value="<?php echo $i->telepon ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/identitas">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>