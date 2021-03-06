<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//kalau ada error upload tampilkan
if (isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;	
	echo '</div>';
}

//open form multipart untuk data dan upload
echo form_open_multipart(base_url('admin/file_buku/edit/'.$file_buku->id_file_buku));
?>

<div class="form-group">
	<label>Judul File</label>
	<input type="text" name="judul_file" class="form-control" placeholder="Judul File" required="required" value="<?php echo $file_buku->judul_file ?>">
</div>
<div class="form-group">
	<label>Upload File<small>(File Lama: <a href="<?php echo base_url('admin/file_buku/unduh/'.$file_buku->id_file_buku)?>" target="_blank"><i class="fa fa-download"></i><?php echo $file_buku->nama_file ?></a>)</small></label>
	<input type="file" name="nama_file" class="form-control" placeholder="Judul File" value="<?php echo $file_buku->nama_file ?>">
</div>
<div class="form-group">
	<label>Urutan File</label>
	<input type="number" name="urutan" class="form-control" placeholder="Urutan File" required="required" value="<?php echo $file_buku->urutan ?>">
</div>
<div class="form-group">
	<label>Keterangan</label>
	<textarea name="keterangan" class="form-control" placeholder="Keterangan"><?php echo $file_buku->judul_file ?></textarea>
</div>
<div class="form-group">
	

	<input type="submit" name="submit" class="btn btn-success" value="Update Data File">
<input type="reset" name="reset" class="btn btn-default" value="Reset">
                
</div>


<?php
//form close
echo form_close();
?>