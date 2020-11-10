
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
                        <i class="fas fa-fw fa-user"></i><b> TAMBAH PEGAWAI</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/validation">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama">
                                <?php echo form_error('nama','<small class="text-danger pl-3">' ,'</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Email</label>
                                <input class="form-control" id="inputdefault" type="text" name="email">
                                <?php echo form_error('email','<small class="text-danger pl-3">' ,'</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Password</label>
                                <input class="form-control" id="password1" name="password1" type="password">
                                <?php echo form_error('password1','<small class="text-danger pl-3">' ,'</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Konfirmasi Password</label>
                                <input class="form-control" id="password2" name="password2" type="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="inputdefault" name="level_id" type="hidden" value="2">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Tambah</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/pegawai">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>