<p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-primary">
<i class="fa fa-plus"></i> Tambah</a></p>

<?php
// Cetak notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';

}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th>#</th>
    <th>Photo</th>
    <th>Nama</th>
    <th>Username</th>
    <th>Email</th>
    <th>No_Telepon</th>
    <th>Level</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i= 1; foreach($user as $user) { ?>
<tr class="odd gradex">
    <td><?php echo $i ?></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$user->gambar) ?>" width="60" height="60"></td>
    <td><a href="<?php echo base_url('admin/user/lihat_user/'.$user->id_user) ?>"><?php echo $user->nama ?></a></td>
    <td><?php echo $user->username ?></td>
    <td><?php echo $user->email ?></td>
    <td><?php echo $user->no_telp ?></td>
    <td><?php echo $user->akses_level ?></td>
    <td>

    <a href="<?php echo base_url('admin/user/profile_edit_password/'.$user->id_user) ?>" class="btn btn-primary btn-sm" title="Edit Password"><i class="fa fa-edit"></i></a>

    <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-success btn-sm" title="Edit User"><i class="fa fa-edit"></i></a>

    <?php
    //Delete
    include('delete.php');
    ?>
    </td>     

</tr>
<?php $i++; } ?>
</tbody>
</table>
