<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Tunjangan</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('tunjangan')); ?>">
                <?php echo e(csrf_field()); ?>


                    <div class="form-group">
                    <label>Kode Tunjangan</label>

                    <div class="form-group <?php echo e($errors->has('kode_tunjangan') ? 'has-errors':'message'); ?>" >
                    <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" placeholder="Masukkan Kode Tunjangan" value="<?php echo e(old('kode_tunjangan')); ?>"  autofocus>

                             <?php if($errors->has('kode_tunjangan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('kode_tunjangan')); ?></strong>
                                </span>
                            <?php endif; ?>
                </div>
                </div>

                    <div class="control-group">
                        <label class="control-label">Id Jabatan</label>
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
                    <label>Status</label>

                    <div class="form-group <?php echo e($errors->has('status') ? 'has-errors':'message'); ?>" >
                    <input id="statusstatus" type="text" class="form-control" name="status" placeholder="Masukkan Status" value="<?php echo e(old('status')); ?>"  autofocus>

                             <?php if($errors->has('status')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('status')); ?></strong>
                                </span>
                            <?php endif; ?>
                </div>
                </div>

                <div class="form-group">
                    <label>Jumlah anak</label>
                     <div class="form-group <?php echo e($errors->has('jumlah_anak') ? 'has-errors':'message'); ?>" >
                    <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" placeholder="Masukkan Jumlah Anak" value="<?php echo e(old('jumlah_anak')); ?>"  autofocus>

                             <?php if($errors->has('jumlah_anak')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('jumlah_anak')); ?></strong>
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