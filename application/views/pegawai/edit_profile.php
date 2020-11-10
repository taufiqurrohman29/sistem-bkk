<div class="container-fluid">
	    <div class="alert alert-success" role="alert">
        <i class="fas fa-fw fa-user"></i><b>EDIT PROFILE</b>
        </div> 
	<?php echo $this->session->flashdata('message'); ?>	
        <div class="row">
        	<div class="col-lg-8">
        		<?php echo form_open_multipart('pegawai/edit') ?>
        		<div class="form-group row">
        			<label for="email" class="col-sm-2 col-form-label">Email</label>
        			<div class="col-sm-10">
        				<input type="text" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>" readonly>
        				
        			</div>
        			
        		</div>
        		<div class="form-group row">
        			<label for="email" class="col-sm-2 col-form-label">Nama Lengkap</label>
        			<div class="col-sm-10">
        				<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user['nama']; ?>">
        				<?php echo form_error('nama','<small class="text-danger pl-3">' ,'</small>'); ?>
        				
        			</div>
        			
        		</div>
        		<div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        		<div class="form-group row justify-content-end">
        			<div class="col-sm-10">
        				<button type="submit" class="btn btn-primary">Simpan</button>
        			</div>
        		</div>
        			


        		</form>
        		
        	</div>
        	
        </div>
</div>