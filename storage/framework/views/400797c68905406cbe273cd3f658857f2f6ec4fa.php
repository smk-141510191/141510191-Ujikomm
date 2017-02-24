<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Lembur Pegawai</div>
        <div class="panel-body">
            <form method="POST" action="<?php echo e(url('lemburpegawai')); ?>">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label>Kode Lembur</label>  
                    <div class="form-group <?php echo e($errors->has('kode_lembur') ? 'has-errors':'message'); ?>" >
                    <div class="controls">
                  <select class="form-control" name="kode_lembur_id">
                  <option>pilih</option>
                                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->kode_lembur); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                </div>
                </div>
                </div>
      
                     <div class="control-group">
                        <label class="control-label">Pegawai</label>
                        <div class="controls">
                            <select class="form-control" name="id_pegawai">
                                        <option value="">Pilih</option>
                                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo $data->id; ?>"><?php echo $data->nip; ?>_<?php echo $data->User->name; ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </select>
                                        </div>
                                    </div>

                    <div class="control-group">
                    <label class="control-label">Jumlah Jam</label>

                    <div class="form-group <?php echo e($errors->has('jumlah_jam') ? 'has-errors':'message'); ?>" >
                                <input id="jumlah_jam" type="text" class="form-control" name="jumlah_jam" placeholder="Masukan Jumlah Jam" value="<?php echo e(old('jumlah_jam')); ?>"  autofocus>

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