<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Kategori Lembur</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('kategori')); ?>">
                <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                    <label>Kode Lembur</label>

                    <div class="form-group <?php echo e($errors->has('kode_lembur') ? 'has-errors':'message'); ?>" >
                    <input id="kode_lembur" type="text" class="form-control" name="kode_lembur" placeholder="Masukan Kode Lembur" value="<?php echo e(old('kode_lembur')); ?>"  autofocus>

                            <?php if($errors->has('kode_lembur')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('kode_lembur')); ?></strong>
                                </span>
                            <?php endif; ?>
                    </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Id Jabatan</label>
                        <div class="form-group <?php echo e($errors->has('kode_golongan') ? 'has-errors':'message'); ?>" >
                        <div class="controls">
                            <select class="form-control" name="id_jabatan">
                            <option >Pilih</option>
                                <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_jabatan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Golongan</label>
                        <div class="form-group <?php echo e($errors->has('kode_golongan') ? 'has-errors':'message'); ?>" >
                        <div class="controls">
                            <select class="form-control" name="id_golongan">
                            <option >Pilih</option>
                                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->nama_golongan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
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