<?php
// Validasi input
echo validation_errors('<div class="alert alert-waring">','</div>');

// Open form
echo form_open(base_url('admin/kategori_posting/edit/'.$kategori_posting->id_kategori_posting));
?>

<div class="col-md-8">
<div class="form-group">
<label>Kategori</label>
<input type="text" name="nama_kategori_posting" class="form-control" value="<?php echo $kategori_posting->nama_kategori_posting ?>" placeholder="Kategori" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Urutan</label>
<input type="number" name="urutan" class="form-control" value="<?php echo $kategori_posting->urutan ?>" placeholder="Urutan" required>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Keterangan</label>
<textarea name="keterangan" class="form-control" type="keterangan" placeholder="Keterangan"><?php echo $kategori_posting->keterangan ?></textarea>
</div>

<div class="col-md-12">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Save Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>

<?php echo form_close(); ?>

