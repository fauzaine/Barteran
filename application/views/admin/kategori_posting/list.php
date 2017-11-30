<p><a href="<?php echo base_url('admin/kategori_posting/tambah') ?>" class="btn btn-primary">
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
    <th>Nama Kategori</th>
    <th>Keterangan</th>
    <th>Urutan</th>
    <th>Slug</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i= 1; foreach($kategori_posting as $kategori_posting) { ?>
<tr class="odd gradex">
    <td><?php echo $i ?></td>
    <td><?php echo $kategori_posting->nama_kategori_posting ?></td>
    <td><?php echo $kategori_posting->keterangan ?></td>
    <td><?php echo $kategori_posting->urutan ?></td>
    <td><?php echo $kategori_posting->slug_kategori_posting ?></td>
    <td>

    <a href="<?php echo base_url('admin/kategori_posting/edit/'.$kategori_posting->id_kategori_posting) ?>" class="btn btn-success btn-sm" title="Edit Kategori Posting"><i class="fa fa-edit"></i></a>

    <?php
    //Delete
    include('delete.php');
    ?>
    </td>     

</tr>
<?php $i++; } ?>
</tbody>
</table>
