<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Username</th>
            <th>Status</th>
            <th>Instansi</th>
        </tr>
    </thead>
    <tbody>
    <?php $i =1; foreach($anggota as $anggota) { ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $anggota->nama_anggota ?></td>
            <td><?php echo $anggota->email ?></td>
            <td><?php echo $anggota->telepon ?></td>
            <td><?php echo $anggota->username ?></td> 
            <td><?php echo $anggota->status_anggota ?></td>
            <td><?php echo $anggota->instansi ?></td>
        </tr>
    <?php $i++; } ?>
    </tbody>
</table>