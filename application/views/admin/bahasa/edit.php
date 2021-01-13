<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//opern form
echo form_open(base_url('admin/bahasa/edit/'.$bahasa->id_bahasa));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Bahasa Buku</label>
		<input type="text" name="nama_bahasa" class="form-control" placeholder="Nama bahasa buku" value="<?php echo $bahasa->nama_bahasa ?>" required>
	</div>
	<div class="form-group">
		<label>Kode Bahasa Buku</label>
		<input type="text" name="kode_bahasa" class="form-control" placeholder="Kode Bahasa Buku" value="<?php echo $bahasa->kode_bahasa ?>" required>
	</div>
	<div class="form-group">
		<label>Urutan Tampil</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan Tampil" value="<?php echo $bahasa->urutan ?>">
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $bahasa->keterangan ?></textarea>
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