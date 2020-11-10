
    <div class="container-fluid">
        <div class="alert alert-success" role="alert">
                <i class="fas fa-fw fa-user"></i><b> TAMBAH SISWA </b>
        </div>
                <div class="card">
                    <div class="card-body">
                        
                    <?php
                        if($this->session->flashdata('message'))
                        {
                            echo '<div class="alert alert-success">' 
                                .$this->session->flashdata("message").'</div>';
                        }
                    ?>
                        <form method="POST" action="<?php echo base_url(); ?>admin/tambah_siswa_aksi">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Nama Siswa</label>
                                <input class="form-control" id="inputdefault" type="text" name="nama" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Jurusan</label>
                                <select class="form-control" name="id_jurusan">
                                    <option value="null">Pilih Jurusan</option>
                                <?php foreach($jurusan as $j){ ?>
                                    <option value="<?php echo $j->id_jurusan ?>"><?php echo $j->nama_jurusan ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tahun Lulus</label>
                                <select class="form-control" name="id_tahun">
                                    <option value="null">Pilih Tahun</option>
                                <?php foreach($tahun as $t){ ?>
                                    <option value="<?php echo $t->id_tahun ?>"><?php echo $t->tahun ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin">
                                <option disabled selected="selected" value="null">
                                    Pilih Jenis Kelamin
                                </option>
                                <option value="Laki-laki">
                                    Laki-laki
                                </option>
                                <option value="Perempuan">
                                    Perempuan
                                </option>
                            </select>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tempat Lahir</label>
                                <input class="form-control" id="inputdefault" type="text" name="tempat" required>
                            </div>
                        </div>
                        
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Tanggal Lahir</label>
                                <input class="form-control" id="inputdefault" type="date" name="tanggal_lahir" required>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Desa</label>
                                <input class="form-control" id="inputdefault" type="text" name="desa" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">RT</label>
                                <input class="form-control" id="inputdefault" type="text" name="rt" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">RW</label>
                                <input class="form-control" id="inputdefault" type="text" name="rw" required>
                            </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kecamatan</label>
                                <input class="form-control" id="inputdefault" type="text" name="kecamatan" required>
                            </div>
                        </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kabupaten</label>
                                <input class="form-control" id="inputdefault" type="text" name="kabupaten" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kodepos</label>
                                <input class="form-control" id="inputdefault" type="text" name="kodepos" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Email</label>
                                <input class="form-control" id="inputdefault" type="text" name="email" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Password</label>
                                <input class="form-control" id="inputdefault" type="password" name="password1" required>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Konfirmasi Password</label>
                                <input class="form-control" id="inputdefault" name="password2" type="password" required>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Kontak Handphone</label>
                                <input class="form-control" id="inputdefault" type="text" name="kontak" required>
                            </div>
                            </div>
                            <div class="col-md-8">
                            <div class="form-group">
                                <label for="inputdefault" class="text-gray-800">Status Pekerjaan</label>
                            <select class="form-control" name="status_pekerjaan">
                                <option disabled selected="selected" value="null">
                                    Pilih Status
                                </option>
                                <option value="Belum Bekerja">
                                    Belum Bekerja
                                </option>
                                <option value="Sudah Bekerja">
                                    Sudah Bekerja
                                </option>
                                <option value="Mahasiswa">
                                    Mahasiswa
                                </option>
                            </select>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control" id="inputdefault" type="hidden" name="level_id" value="3" required>
                            </div>
                            </div>
                        </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary active">Tambah</button>
                                        <a class="btn btn-space btn-outline-primary" href="<?php echo base_url(); ?>admin/siswa">Kembali</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>