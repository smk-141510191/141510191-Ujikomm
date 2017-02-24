<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Lembur Pegawai</div>

                <div class="panel-body">
                    <?php echo Form::model($pegawai,['method' => 'PATCH','route'=>['pegawai.update',$pegawai->id]]); ?>

                <div class="form-group">
                    <?php echo Form::label('NIP ', 'NIP '); ?>

                    <?php echo Form::text('nip',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('Nama', 'Nama'); ?>

                    <?php echo Form::text('nama',null,['class'=>'form-control']); ?>

                <div class="form-group">
                    <?php echo Form::label('E-mail', 'E-mail'); ?>

                    <?php echo Form::text('email',null,['class'=>'form-control']); ?>

                </div>
                 <div class="form-group">
                    <?php echo Form::label('Id jabatan', 'Id jabatan'); ?>

                    <?php echo Form::text('id_jabatan',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('Id golongan', 'Id golongan'); ?>

                    <?php echo Form::text('id_golongan',null,['class'=>'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::submit('Simpan', ['class' => 'btn btn-primary']); ?>

                </div>
                <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>