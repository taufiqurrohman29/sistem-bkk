
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
                        <i class="fas fa-fw fa-file"></i><b> EDIT TENTANG BKK</b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <?php foreach($tentang_bkk as $tb){ ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/update_tentang_bkk/<?php echo $tb->id_tentang_bkk ?>">
                            <div class="form-group">
                                <input type="hidden" name="id_tentang_bkk" value="<?php echo $tb->id_tentang_bkk ?>">
                            </div> 
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Judul</label>
                                <input class="form-control" id="inputdefault" type="text" name="judul" required value="<?php echo $tb->judul ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Deskripsi</label>
                                <input class="form-control" id="inputdefault" type="text" name="deskripsi" required value="<?php echo $tb->deskripsi ?>">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/tentang_bkk">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>