<?php $__env->startSection('content'); ?>
<title>Jabatan</title>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Tambah Jabatan</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?php echo e(route('jabatan.update', $jabatan->id)); ?>" method="POST"> 
                <input name="_method" type="hidden" value="PATCH">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('kode_jabatan') ? ' has-error' : ''); ?>">
                            <label for="kode_jabatan" class="col-md-4 control-label">Kode Jabatan :</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_jabatan" value="<?php echo e($jabatan->kode_jabatan); ?>" class="form-control">
                                    <?php if($errors->has('kode_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('nama_jabatan') ? ' has-error' : ''); ?>">
                            <label for="nama_jabatan" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <input type="text" name="nama_jabatan" value="<?php echo e($jabatan->nama_jabatan); ?>" class="form-control">
                                    <?php if($errors->has('nama_jabatan')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('besaran_uang') ? ' has-error' : ''); ?>">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
                                <div class="col-md-6">
                                    <input type="text" name="besaran_uang" value="<?php echo e($jabatan->besaran_uang); ?>" class="form-control">
                                    <?php if($errors->has('besaran_uang')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>