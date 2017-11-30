<!-- TinyMCE -->
<script src="<?php echo base_url('assets/tinymce/js/tinymce/tinymce.min.js') ?>" type="text/javascript"></script>
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
echo form_open_multipart(base_url('member/posting/tambah'));
?>

<br></br>
<br></br>
<br></br>
<div class="col-md-15">

                  <!--    Bordered Table  -->
                  <div class="panel panel-default">

                      <div class="panel-body">
<br></br>
<br></br>

<div class="col-md-8">
<div class="form-group form-group-lg">
<label>Judul</label>
<input type="text" name="judul" class="form-control" placeholder="Judul Posting" value="<?php echo set_value('judul') ?>" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group form-group-lg">
<label>Kategori</label>
<select class="form-control" name="id_kategori_posting">	<?php foreach($kategori as $kategori) { ?>
	<option value="<?php echo $kategori->id_kategori_posting ?>"><?php echo $kategori->nama_kategori_posting ?>
	<?php } ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Status Posting</label>
<select class="form-control" name="status_posting">
<option value="Publish">Publikasikan</option>
<option value="Sold">Sudah Sold Out</option>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Kota</label>
<select class="form-control" name="kota">
<option value="Jakarta Barat">Jakarta Barat</option>
<option value="Jakarta Utara">Jakarta Utara</option>
<option value="Jakarta Timur">Jakarta Timur</option>
<option value="Jakarta Selatan">Jakarta Selatan</option>
<option value="Jakarta Pusat">Jakarta Pusat</option>
</select>
</div>
</div>

<div class="col-md-7">
<div class="form-group ">
<label>Gambar</label>
<input type="file" name="gambar">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Deskripsi</label>
<textarea name="isi" class="form-control" placeholder="isi"><?php echo set_value('isi') ?></textarea>
</div>

<div class="col-md-12">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Save Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>
<br>
</br>

<br></br>
<br></br>


</div>
</div>
</div>
</div>
<br></br>
<br></br>
<br></br>
<?php
echo form_close();
?>
