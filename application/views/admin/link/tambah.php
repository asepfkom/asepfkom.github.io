<p>
<button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
<i class="fa fa-plus"></i>Tambah
</button>
</p>
    <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		            <h4 class="modal-title" id="myModalLabel">Tambah Data Baru</h4>
		        </div>
		        <div class="modal-body">

<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//open form
echo form_open(base_url('admin/link'));
?>

<div class="col-md-12">
	<div class="form-group">
		<label>Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama Link" value="<?php echo set_value('nama_link')?>" required>
	</div>
	<div class="form-group">
		<label>URL?Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo set_value('url')?>">
	</div>
	<div class="form-group">
		<label>Target</label>
		<select name="target" class="form-control">
            <option value="_blank">_blank</option>
            <option value="_self">_self</option>
            <option value="_parent">_parent</option>
            <option value="_top">_top</option> 
        </select>
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
<div class="clearfix"></div>
</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
	        </div>
	    </div>
	</div>
</div>