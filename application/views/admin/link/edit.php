<?php
// Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"> ','</div>'); 

//opern form
echo form_open(base_url('admin/link/edit/'.$link->id_link));
?>

<div class="col-md-12">
	<div class="form-group">
		<label>Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama Link " value="<?php echo $link->nama_link ?>" required>
	</div>
	<div class="form-group">
		<label>URL/Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?php echo base_url() ?>" value="<?php echo $link->url ?>" required>
	</div>
	<div class="form-group">
		<label>Target</label>
		<select name="target" class="form-control">
            <option value="_blank">_blank</option>
            <option value="_self" <?php if ($link->target=="_self") { echo "selected";
            }?>>_self</option>
            <option value="_parent" <?php if ($link->target=="_parent") { echo "selected";
            }?>>_parent</option>
            <option value="_top"<?php if ($link->target=="_top") { echo "selected";
            }?>>_top</option> 
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