<p>
    <a href="<?= base_url('roleuser/tambah') ?>" class="btn btn-success btn-lg">
        <i class="fa fa-plus"></i> Tambah Baru
    </a>
</p>

<?php 
// Notifikasi
if ($this->session->flashdata('sukses')) {
    echo '<div>';
    echo '<p class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';
}
?>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Role</th>
            <th>Nama Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($roleusers as $roleuser) { ?>
        <tr>
            <td><?= $no ; $no = $no+1;?></td>
            <td><?= $roleuser->id_roleuser ?></td>
            <td><?= $roleuser->role_name ?></td>
            <td>
                <a href="<?= base_url('roleuser/edit/'.$roleuser->id_roleuser) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

                <a href="<?= base_url('roleuser/delete/'.$roleuser->id_roleuser) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>