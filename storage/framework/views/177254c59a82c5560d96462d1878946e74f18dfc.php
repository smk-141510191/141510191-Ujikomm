<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Pegawai</div>

                <div class="panel-body">
                    <?php echo Form::model($pegawai,['method' => 'PATCH','route'=>['pegawai.update',$pegawai->id]]); ?>

                <div class="form-group">
                    <?php echo Form::label('nip', 'Nip'); ?>

                    <?php echo Form::text('nip',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('id_jabatan', 'Id Jabatan'); ?>

                    <?php echo Form::text('id_jabatan',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('id_pegawai', 'Id Pegawai'); ?>

                    <?php echo Form::text('id_pegawai',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('jumlah_jam', 'Jumlah Jam'); ?>

                    <?php echo Form::text('jumlah_jam',null,['class'=>'form-control']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::submit('SIMPAN', ['class' => 'btn btn-primary']); ?>

                </div>
                <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>