<!-- TinyMCE -->
<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js')?> " type="text/javascript"></script>
<script>
tinymce.init({
  selector: 'textarea',
  height: 150,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
});
</script>
<?php
// Validasi input
echo validation_errors('<div class="alert alert-waring">','</div>');

// Error upload file
if(isset($error)){
  echo '<div class="alert alert-warning">';
  echo $error;
  echo '</div>';

}

// Open form
echo form_open_multipart(base_url('member/pesan/tambah/'.$posting->id_posting));
?>
<br></br>
<br></br>
<br></br>  
<!--    Bordered Table  -->
                  <div class="panel panel-default">

                      <div class="panel-body">

<div align="center">
<div>

<h3>Anda Akan Melakukan Penawaran Pertukaran Barang : </h3>
<hr>
<h3><big><?php echo $posting->judul ?></h3>
</div>
<div>
<img src="<?php echo base_url('assets/upload/image/thumbs/'.$posting->gambar) ?>" width="300" height="360">
</div>
</div>
<hr>
<h3 align="center">Dengan Barang : </h3>
<hr>
<div class="col-md-8">
<div class="form-group form-group">
<label>Nama Barang</label>
<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?php echo set_value('nama_barang') ?>" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group ">
<label>Gambar</label>
<input type="file" name="gambar" >
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Deskripsi</label>
<textarea name="deskripsi" class="form-control" placeholder="Tuliskan Deskripsi, Alamat, dan Kontak yang dapat dihubungi utuk melakukan penukaran"><?php echo set_value('deskripsi') ?></textarea>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Kirim Permintaan">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
<br>
</br>  
<br>
</br> 
<br>
</br> 
</div>
</div>
</div>
</div>
<?php
echo form_close();
?>