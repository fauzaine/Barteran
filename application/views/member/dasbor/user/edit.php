<?php
// Validasi input
echo validation_errors('<div class="alert alert-waring">','</div>');

// Open form
echo form_open_multipart(base_url('member/user/edit/'.$user->id_user));
?>
<br></br>
<br></br>
<br></br>

   <!--    Bordered Table  -->
                  <div class="panel panel-default">

                      <div class="panel-body">
<br></br>
<br></br>
<div class="form-group"
<label>Username</label>
<input type="name" name="username" class="form-control" placeholder="username" value="<?php 
echo $user->username ?>">
</div>

<div class="form-group">
<label>Nama lengkap</label>
<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>">
</div>

<div class="form-group">
<label>No Telepon</label>
<input type="text" name="no_telp" class="form-control" placeholder="No Telepon" value="<?php echo set_value('no_telp') ?>">
</div>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $user->email ?>">
</div>



<div class="form-group ">
<label>Gambar</label>
<input type="file" name="gambar" >
</div>

</div>

<div class="col-md-12">
<div class="form-group">
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Save Data">
<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">

</div>
</div>

<br></br>
<br></br>


</div>
<br></br>
<br></br>
<br></br>
<?php
echo form_close();
?>

