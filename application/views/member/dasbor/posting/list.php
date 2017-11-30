
<?php
// Cetak notifikasi
if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('sukses');
    echo '</div>';

}
?>
<br></br>
<br></br>

  <div class="form-group">
                  <!--    Bordered Table  -->
                  <div  class="panel panel-default">

                      <!-- /.panel-heading -->
                      <div class="panel-body">
<br></br>
<br></br>


<table  class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr >
    <th>#</th>
    <th>Gambar</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th>Author</th>
    <th>Kota</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
<?php $i= 1; foreach($posting as $posting) { ?>
<tr class="odd gradex">
    <td><?php echo $i ?></td>
    <td ><img src="<?php echo base_url('assets/upload/image/thumbs/'.$posting->gambar) ?>" width="120" height="120"></td>
    <td ><a href="<?php echo base_url('member/dasbor/read/'.$posting->slug_posting) ?>"><?php echo $posting->judul ?></a></td>
    <td ><?php echo $posting->nama_kategori_posting ?></td>
     <td><?php echo $posting->nama ?></td>
    <td ><?php echo $posting->kota ?></td>
    <td ><?php echo $posting->status_posting ?> </td>
    <td>


    <a href="<?php echo base_url('member/posting/edit/'.$posting->id_posting) ?>" class="btn btn-success btn-sm" title="Edit Posting"><i class="fa fa-edit"></i></a>

    <?php
    //Delete
    include('delete.php');
    ?>
    </td>

</tr>
<?php $i++; } ?>
</tbody>
</table>
<br></br>
<br></br>

</div>
</div>
</div>
</div>
<br></br>
<br></br>
<br></br>