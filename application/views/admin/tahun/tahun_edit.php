
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
                        <i class="fas fa-fw fa-file"></i><b> EDIT TAHUN</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <?php foreach($tahun as $t){ ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/update_tahun/<?php echo $t->id_tahun ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_tahun" value="<?php echo $t->id_tahun ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tahun</label>
                                <input class="form-control" id="inputdefault" type="text" name="tahun" required value="<?php echo $t->tahun ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/tahun">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>