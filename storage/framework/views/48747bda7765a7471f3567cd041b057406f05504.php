

<div class="modal text-left fade" id="delete<?php echo e($modal->id); ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="delete" action="<?php echo e(url('golongan')); ?>">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title"><?php echo e(isset($title) ? $title : "Delete Data"); ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo e(isset($message) ? $message : "Apakah anda yakin ingin menghapus data ini?"); ?></p>
			</div>
			<div class="modal-rooter">
				<button type="submit" class="btn btn-primary">Ya</button>
				<button type="button=" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>
			</form>
		</div>
	</div>
</div>