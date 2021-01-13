<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//open form
echo form_open(base_url('admin/anggota/tambah'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Anggota</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama_anggota" value="<?php echo set_value('nama_anggota')?>" required>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email')?>" required>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username')?>"
		required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>" required>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Telepon</label>
		<input type="telepon" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon')?>" required>
	</div>
	<div class="form-group">
		<label>Status Anggota</label>
		<select name="status_anggota" class="form-control">
			<option value="Active">Active</option>
			<option value="Not Active">Not Active</option>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Instansi</label>
		<textarea name="instansi" class="form-control" placeholder="Instansi"><?php echo set_value('instansi')?></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset" >
	</div>
</div>

<?php
//form close
echo form_close();
?>