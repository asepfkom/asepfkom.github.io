
 <table class="table table-striped table-bordered table-hover" id="dataTables-example" border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengusul</th>
            <th>Email Pengusul</th>
            <th>Judul Usulan</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
    <?php $i =1; foreach($usulan as $usulan) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $usulan->nama_pengusul ?></td>
            <td><?php echo $usulan->email_pengusul ?></td>
            <td><?php echo $usulan->judul ?>
            </td>
            <td><?php echo $usulan->keterangan ?></td>
        </tr>
    <?php $i++; } ?>
    </tbody>
</table>