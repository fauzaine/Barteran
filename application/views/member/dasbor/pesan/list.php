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
<br></br>
  <div class="form-group">
<!--    Bordered Table  -->
                  <div class="panel panel-default">
 <!-- /.panel-heading -->
                      <div class="panel-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<br></br>
<br></br>

<thead>
<tr>
    <th>#</th>
    <th>Postingan</th>
    <th>Penawaran</th>
    <th>Aksi</th>
    
</tr>
</thead>
<tbody>
<?php $i= 1; foreach($pesan as $pesan) { ?>
<tr class="odd gradex">
    <td><?php echo $i ?></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$pesan->gambar) ?>" width="120" height="120"><br><br><a href="<?php echo base_url('member/dasbor/read/'.$pesan->slug_posting) ?>"><?php echo $pesan->judul ?></a></td>
    <td><img src="<?php echo base_url('assets/upload/image/thumbs/'.$pesan->gambar1) ?>" width="120" height="120"><br><br><a href="<?php echo base_url('member/pesan/read/'.$pesan->id_pesan) ?>"><?php echo $pesan->nama_barang1 ?></td>
   <td>
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
