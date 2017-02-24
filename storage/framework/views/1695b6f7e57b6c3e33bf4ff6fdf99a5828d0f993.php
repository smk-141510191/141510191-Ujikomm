<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Jabatan</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('jabatan')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label>Kode Jabatan</label>

                <div class="form-group <?php echo e($errors->has('kode_jabatan') ? 'has-errors':'message'); ?>" >
                <input id="kode_jabatan" type="text" class="form-control" name="kode_jabatan" placeholder="Masukkan Kode Jabatan" value="<?php echo e(old('kode_jabatan')); ?>"  autofocus>
                                
                            <?php if($errors->has('kode_jabatan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('kode_jabatan')); ?></strong>
                                </span>
                            <?php endif; ?>
                </div>
                </div>
                

                <div class="form-group">
                    <label>Nama Jabatan</label>

                     <div class="form-group <?php echo e($errors->has('nama_jabatan') ? 'has-errors':'message'); ?>" >
                     <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" placeholder="Masukkan Nama Jabatan" value="<?php echo e(old('nama_jabatan')); ?>"  autofocus>

                             <?php if($errors->has('nama_jabatan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nama_jabatan')); ?></strong>
                                </span>
                            <?php endif; ?>
                </div>
                </div>

                <div class="form-group">
                    <label>Besaran Uang</label>

                    <div class="form-group <?php echo e($errors->has('besaran_uang') ? 'has-errors':'message'); ?>" >
                     <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" placeholder="Masukkan Besaran Uang" value="<?php echo e(old('besaran_uang')); ?>"  autofocus>
                            <?php if($errors->has('besaran_uang')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                </span>
                            <?php endif; ?>
                </div>
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