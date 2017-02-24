<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Tunjangan Pegawai</div>
        <div class="panel-body">
  <form method="POST" action="<?php echo e(url('tunjanganpegawai')); ?>">
                <?php echo e(csrf_field()); ?>




                     <div class="control-group">
                        <label class="control-label">Kode Tunjangan</label>
                        <div class="controls">
                            <select class="form-control" name="kode_tunjangan_id">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $data->id; ?>"><?php echo $data->kode_tunjangan; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
      
                     <div class="control-group">
                        <label class="control-label">Pegawai</label>
                        <div class="controls">
                            <select class="form-control" name="id_pegawai">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $data->id; ?>"><?php echo $data->nip; ?>_<?php echo $data->User->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                             
				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>