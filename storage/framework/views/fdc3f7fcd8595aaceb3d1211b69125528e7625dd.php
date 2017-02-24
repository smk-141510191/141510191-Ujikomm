<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Golongan</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('golongan')); ?>">
                <?php echo e(csrf_field()); ?>



                <div class="form-group ">
                    <label>Kode Golongan</label>
                            
                <div class="form-group <?php echo e($errors->has('kode_golongan') ? 'has-errors':'message'); ?>" >
                <input id="kode_golongan" type="text" class="form-control" name="kode_golongan" placeholder="Masukkan Kode Golongan" value="<?php echo e(old('kode_golongan')); ?>"   autofocus>

                            <?php if($errors->has('kode_golongan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('kode_golongan')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>  
                            </div>
                           
                        


                 <div class="form-group">
                            <label >Nama Golongan</label>
                           
                <div class="form-group <?php echo e($errors->has('nama_golongan') ? 'has-errors':'message'); ?>" >
                <input id="nama_golongan" type="text" class="form-control" name="nama_golongan"  placeholder="Masukkan Nama Golongan" value="<?php echo e(old('nama_golongan')); ?>" autofocus>

                             <?php if($errors->has('nama_golongan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nama_golongan')); ?></strong>
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