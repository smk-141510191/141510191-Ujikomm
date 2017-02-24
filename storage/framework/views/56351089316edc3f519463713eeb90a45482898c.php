<?php $__env->startSection('content'); ?>
	
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Tambah Data Tunjangan</h1></strong></div>
        <div class="panel-body">
			<form method="POST" action="<?php echo e(url('tunjangan')); ?>">
			 	<?php echo e(csrf_field()); ?>


                    <div class="form-group">
                    <label>Kode Tunjangan</label>
                    <input class="form-control" type="text" name="kode_tunjangan" placeholder="Masukkan Kode Golongan">
                </div>

                    <div class="control-group">
                        <label class="control-label">Nama Jabatan</label>
                        <div class="controls">
                            <select class="span11" name="id_jabatan">
                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div><br>

                    <div class="control-group">
                        <label class="control-label">Nama Golongan</label>
                        <div class="controls">
                            <select class="span11" name="id_golongan">
                                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div><br>

                <div class="form-group">
                    <label>Status</label>
                    <input class="form-control" type="text" name="status" placeholder="Status">
                </div>

                <div class="form-group">
                    <label>Jumlah anak</label>
                    <input class="form-control" type="text" name="jumlah_anak" placeholder="Masukkan Kode Golongan">
                </div>

                    
				<div class="form-group">
					<label>Besaran Uang</label>
					<input class="form-control" type="text" name="besaran_uang" placeholder="Masukkan Besaran Uang">
				</div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>