
    <div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-file"></i><b> EDIT PENDAFTARAN</b>
    </div>

        
        <!-- pageheader -->

        
                <div class="card">
                    <div class="card-body">

                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                <form method="POST" action="<?php echo base_url(); ?>admin/update_pendaftaran">
                    <?php foreach($pendaftaran as $pdf) {?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="id_pendaftaran" hidden value="<?php echo $pdf->id_pendaftaran ?>">
                                <input type="hidden" name="id_siswa" hidden value="<?php echo $pdf->id_siswa ?>">
                                <label for="inputdefault" class="text-gray-800">Nama Siswa</label>
                                <select class="form-control" name="id_siswa" disabled="">
                                    <option value="null">Pilih Siswa</option>
                                <?php foreach($siswa as $s){ ?>
                                    <option value="<?php echo $s->id_siswa ?>" <?php if($s->id_siswa == $pdf->id_siswa){ echo "selected"; } ?> > <?php echo $s->nama ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Perusahaan</label>
                                <select class="form-control" name="id_loker" disabled="" >
                                    <option value="null">Pilih Perusahaan</option>
                                    <?php foreach($loker as $l){ ?>
                                        <option value="<?php echo $l->id_loker ?>" <?php if($l->id_loker == $pdf->id_loker){ echo "selected"; } ?> > <?php echo $l->nama_perusahaan ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nilai Matematika Semester 1</label>
                                <input class="form-control" id="inputdefault" type="number" name="nilai_smt_1" value="<?php echo $pdf->nilai_smt_1 ?>" required disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nilai Matematika Semester 2</label>
                                <input class="form-control" id="inputdefault" type="number" name="nilai_smt_2" value="<?php echo $pdf->nilai_smt_2 ?>" required disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nilai Matematika Semester 3</label>
                                <input class="form-control" id="inputdefault" type="number" name="nilai_smt_3" value="<?php echo $pdf->nilai_smt_3 ?>" required disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nilai Matematika Semester 4</label>
                                <input class="form-control" id="inputdefault" type="number" name="nilai_smt_4" value="<?php echo $pdf->nilai_smt_4 ?>" required disabled>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nilai Matematika Semester 5</label>
                                <input class="form-control" id="inputdefault" type="number" name="nilai_smt_5" value="<?php echo $pdf->nilai_smt_5 ?>" required disabled>
                            </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Ayah</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama_ayah" value="<?php echo $pdf->nama_ayah ?>" required disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Ibu</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama_ibu" value="<?php echo $pdf->nama_ibu ?>" required disabled>
                            </div>
                        </div>
                    </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nomer Telepon Orang Tua</label>
                                <input class="form-control" id="inputdefault" type="text" name="no_hp_ortu" value="<?php echo $pdf->no_hp_ortu ?>" required disabled>
                            </div>
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Status</label>
                                <select name="status" type="text" class="form-control" required>
                                	<option value="">Pilih Status</option>
                                	<option value="0" <?= ($pdf->status == 0) ? 'selected' : '' ?> >Proses Seleksi</option>
                                	<option value="1" <?= ($pdf->status == 1) ? 'selected' : '' ?> >Lolos Seleksi</option>
                                	<option value="2" <?= ($pdf->status == 2) ? 'selected' : '' ?> >Belum Lolos Seleksi</option>

                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/pendaftaran">Kembali</a>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>