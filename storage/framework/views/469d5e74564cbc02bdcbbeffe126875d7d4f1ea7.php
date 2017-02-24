<div class="modal text-left fade" id="delete<?php echo e($model->id); ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo Form::open(['method' => 'delete', 'url' => $url]); ?>

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo e(isset($title) ? $title : "Hapus Data"); ?></h4>
			</div>
			<div class="modal-body">
				<p>
					<?php echo e(isset($message) ? $message : "Apakah anda yakin ingin menghapus data ini?"); ?>

				</p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Iya</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>
			<?php echo Form::close(); ?>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->