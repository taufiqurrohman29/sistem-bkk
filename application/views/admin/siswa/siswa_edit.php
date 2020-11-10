
    <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                        <i class="fas fa-fw fa-user"></i><b> EDIT SISWA </b>
                        </div>
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                    <?php foreach ($siswa as $s) { ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/update_siswa">
                        <input type="hidden" name="id_siswa" value="<?php echo $s->id_siswa ?>" hidden>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Siswa</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama" value="<?php echo $s->nama ?>" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Jurusan</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama_jurusan" value="<?php echo $s->nama_jurusan ?>" required disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tahun Lulus</label>
                                <input class="form-control" id="inputdefault" type="text" name="tahun" value="<?php echo $s->tahun ?>" required disabled>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Jenis Kelamin</label>
                                <input class="form-control" id="inputdefault" type="text" name="jenis_kelamin" value="<?php echo $s->jenis_kelamin ?>" required>
                            </div>
                        </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tempat Lahir</label>
                                <input class="form-control" id="inputdefault" type="text" name="tempat" value="<?php echo $s->tempat ?>" required>
                            </div>
                        </div>
                        
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tanggal Lahir</label>
                                <input class="form-control" id="inputdefault" type="date" name="tanggal_lahir" value="<?php echo $s->tanggal_lahir ?>" required>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Desa</label>
                                <input class="form-control" id="inputdefault" type="text" name="desa" value="<?php echo $s->desa ?>" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">RT</label>
                                <input class="form-control" id="inputdefault" type="text" name="rt" value="<?php echo $s->rt ?>" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">RW</label>
                                <input class="form-control" id="inputdefault" type="text" name="rw" value="<?php echo $s->rw ?>" required>
                            </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kecamatan</label>
                                <input class="form-control" id="inputdefault" type="text" name="kecamatan" value="<?php echo $s->kecamatan ?>" required>
                            </div>
                        </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kabupaten</label>
                                <input class="form-control" id="inputdefault" type="text" name="kabupaten" value="<?php echo $s->kabupaten ?>" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kodepos</label>
                                <input class="form-control" id="inputdefault" type="text" name="kodepos" value="<?php echo $s->kodepos ?>" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Email</label>
                                <input class="form-control" id="inputdefault" type="text" name="email" value="<?php echo $s->email ?>" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Password</label>
                                <input class="form-control" id="inputdefault" type="password" name="password" value="<?php echo $s->password ?>" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kontak Handphone</label>
                                <input class="form-control" id="inputdefault" type="text" name="kontak" value="<?php echo $s->kontak ?>" required>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Status Pekerjaan</label>

                            <select name="status_pekerjaan" type="text" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Belum Bekerja" <?= ($s->status_pekerjaan == 'Belum Bekerja') ? 'selected' : '' ?> >Belum Bekerja</option>
                                    <option value="Sudah Bekerja" <?= ($s->status_pekerjaan == 'Sudah Bekerja') ? 'selected' : '' ?> >Sudah Bekerja</option>
                                    <option value="Mahasiswa" <?= ($s->status_pekerjaan == 'Mahasiswa') ? 'selected' : '' ?> >Mahasiswa</option>

                                </select>
                            </div>
                        <input type="hidden" name="level_id" value="<?php echo $s->level_id ?>" hidden>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Simpan</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/siswa">Kembali</a>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>