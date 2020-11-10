
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
                        <i class="fas fa-fw fa-user"></i><b> EDIT PEGAWAI</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <?php foreach($user as $u){ ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/update_pegawai/<?php echo $u->id_user ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_user" value="<?php echo $u->id_user ?>">
                                <input type="hidden" name="level_id" value="<?php echo $u->level_id ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama" required value="<?php echo $u->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Email</label>
                                <input class="form-control" id="inputdefault" type="text" name="email" required value="<?php echo $u->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Password</label>
                                <input class="form-control" id="inputdefault" name="password" type="password" required value="<?php echo $u->password ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/pegawai">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>