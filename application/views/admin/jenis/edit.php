<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//opern form
echo form_open(base_url('admin/jenis/edit/'.$jenis->id_jenis));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Jenis Buku</label>
		<input type="text" name="nama_jenis" class="form-control" placeholder="Nama jenis buku" value="<?php echo $jenis->nama_jenis ?>" required>
	</div>
	<div class="form-group">
		<label>Kode Jenis Buku</label>
		<input type="text" name="kode_jenis" class="form-control" placeholder="Kode Jenis Buku" value="<?php echo $jenis->kode_jenis ?>" required>
	</div>
	<div class="form-group">
		<label>Urutan Tampil</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan Tampil" value="<?php echo $jenis->urutan ?>">
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $jenis->keterangan ?></textarea>
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