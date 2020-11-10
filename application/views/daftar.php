<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi BKK SMK YPP Purworejo</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #008B8B;
    }
    </style>

</head>

<body>

  <div class="container">

    <div class="card o-hidden border-1 shadow-lg my-12 col-lg-12 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h3 class="text-gray-900">Registrasi</h3>
                <p>Masukkan Informasi anda.</p>

                <?php
                if($this->session->flashdata('message'))
                {
                    echo '<div class="alert alert-success">' 
                        .$this->session->flashdata("message").'</div>';
                }
                ?>
            </div>
              <form class="user" name="daftar" method="POST" action="<?php echo base_url().'daftar/validation'?>">
            <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required autocomplete="off">
                </div>
            </div>
               <div class="col-md-4">
                <div class="form-group">
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
                  <select class="form-control" name="id_tahun">
                    <option value="null">Tahun Lulus</option>
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
                  <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="date" name="tanggal_lahir" class="form-control" required autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="desa" class="form-control" placeholder="Desa" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="rt" class="form-control" placeholder="RT" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="rw" class="form-control" placeholder="RW" required autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" required autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="password" name="konfirmasi_password" class="form-control" placeholder="Ulangi Password" required autocomplete="off">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <input type="text" name="kontak" class="form-control" placeholder="No Handphone" required autocomplete="off">
                </div>
            </div>
        </div>

                
                <button type="submit" name="daftar" class="btn btn-primary btn-user btn-block col-lg-4 mx-auto">
                  Daftar
                </button>
                <hr>
              </form>
              <div class="text-center text-gray-900"><p class="small"> Sudah punya akun? 
                <a href="<?php echo base_url(); ?>login_siswa">Login</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
