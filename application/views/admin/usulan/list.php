<p>
	<a href="<?php echo base_url('admin/usulan/tambah')?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah
	</a>
    <a href="<?php echo base_url('admin/usulan/export_toexcel')?>" class="btn btn-primary">
        <i class="fa fa-file-excel-o"></i> Export
    </a>
</p>

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
            <th>Nama Pengusul</th>
            <th>Email Pengusul</th>
            <th>Data Usulan</th>
            <th>Keterangan</th>
            <th>Info</th>
            <th width="15%">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php $i =1; foreach($usulan as $usulan) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $usulan->nama_pengusul ?></td>
            <td><?php echo $usulan->email_pengusul ?></td>
            <td><?php echo $usulan->judul ?>
            <small>
                <br>Penulis: <?php echo $usulan->penulis ?>
                <br>Penerbit: <?php echo $usulan->penerbit ?>
                <br>Penerbit: <?php echo $usulan->status_usulan ?>
            </small>
            </td>
            <td><?php echo $usulan->keterangan ?></td>
            <td>
            <small>
                Tanggal Usulan: <?php echo date('d-m-Y H:i:s', strtotime($usulan->tanggal_usulan ))?>
                <br>IP Address: <?php echo $usulan->ip_address ?>
            </small>
            </td>
            <td>
            	<a href="<?php echo base_url('admin/usulan/edit/'.$usulan->id_usulan) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

                <?php include('delete.php'); ?>
            </td>
        </tr>
    <?php $i++; } ?>
    </tbody>
</table>
