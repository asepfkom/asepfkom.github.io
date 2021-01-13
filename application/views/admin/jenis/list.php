<?php include('tambah.php') ?>
<br>
<?php
//Notification
if($this->session->flashdata('sukses'))
{
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo  $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Kode Jenis</th>
            <th>Nama Jenis</th>
            <th>Keterangan</th>
            <th>Urutan</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $i =1; foreach($jenis as $jenis) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $jenis->kode_jenis ?></td>
            <td><?php echo $jenis->nama_jenis ?></td>
            <td><?php echo $jenis->keterangan ?></td>
            <td><?php echo $jenis->urutan ?></td>
            <td>
            	<a href="<?php echo base_url('admin/jenis/edit/'.$jenis->id_jenis) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

                <?php include('delete.php'); ?>
            </td>
        </tr>
    <?php $i++; } ?>
    </tbody>
</table>
