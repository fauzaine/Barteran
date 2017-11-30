<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal<?php echo 
$pesan->id_pesan ?>" title="Delete">
	<i class="fa fa-trash-o"></i>
</button>
<div class="modal fade" id="myModal<?php echo $pesan->id_pesan ?>" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Hapus Data?</h4>
	</div>
	<div class="modal-body">
		Yakin ingin menghapus data ini?
		</div>
		<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">close</button>
			<a href="<?php echo base_url('admin/pesan/delete/'.$pesan->id_pesan) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, hapus data ini</a>
			</div>
			</div>
			</div>
			</div>

