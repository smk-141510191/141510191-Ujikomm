<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Data Lembur Pegawai</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('lemburpegawai')); ?>">
                <?php echo e(csrf_field()); ?>


                
                  <div class="form-group<?php echo e($errors->has('kode_lembur') ? ' has-error' : ''); ?>">
                            <label for="kode_lembur" class="col-md-4 control-label">Kode Lembur :</label>
                                <div class="col-md-6">
                                    <select name="kode_lembur" class="form-control">
                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" <?php if ($data->kode_lembur==$data->id) {echo "selected";} ?>><?php echo e($data->kode_lembur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                                   
                    </div>
                    </div>
      
                     <div class="form-group<?php echo e($errors->has('id_pegawai') ? ' has-error' : ''); ?>">
                            <label for="id_pegawai" class="col-md-4 control-label">Nama Pegawai :</label>
                                <div class="col-md-6">
                                    <select name="id_pegawai" class="form-control">
                                <option value="">Pilih</option>
                                    <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo $data->id; ?>"><?php if ($data->id_pegawai==$data->id) {echo "selected";} ?>><?php echo e($data->id_pegawai); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                            </div>
                            </div>

                    <div class="form-group<?php echo e($errors->has('jumlah_jam') ? ' has-error' : ''); ?>">
                            <label for="jumlah_jam" class="col-md-4 control-label">Jumlah Jam :</label>
                                <div class="col-md-6">
                                    <input type="text" name="jumlah_jam" value="<?php echo e($lemburpegawai->jumlah_jam); ?>" class="form-control">
                                    <?php if($errors->has('jumlah_jam')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('jumlah_jam')); ?></strong>
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