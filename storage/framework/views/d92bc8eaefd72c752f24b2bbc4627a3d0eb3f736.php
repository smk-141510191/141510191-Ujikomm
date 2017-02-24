<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="<?php echo e(url('pegawai/create')); ?>">Tambah Data</a><br><br>
            <table class="table table-striped table-bordered table-hover">

        <div class="form-group"><center>
        <form action="<?php echo e(url('pegawai')); ?>/?nip=nip">
        <input type="text" name="nip" placeholder="Cari">
        <input class="btn btn-sm btn-primary" type="submit" value="Cari" /></form>
        </center></div>

                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Photo</th>
                        <th colspan="3">Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tbody>
                    <tr> 
                        <td> <?php echo e($id++); ?> </td>
                        <td> <?php echo e($data->nip); ?> </td>
                        <td> <?php echo e($data->User->name); ?> </td>
                        <td> <?php echo e($data->User->email); ?> </td>
                        <td> <?php echo e($data->jabatan->nama_jabatan); ?> </td>
                        <td> <?php echo e($data->golongan->nama_golongan); ?> </td>
                         <td><center><img src="/assets/image/<?php echo e($data->foto); ?>" class="img-polaroid"" method="post" width="50px" height="50px"></center></td>
                        
                            <td><center>
                            <a href="<?php echo e(route('pegawai.edit',$data->id)); ?>" class="btn btn-primary">Edit</a>
                            </center></td>
                              <td >
                            <center><a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Delete</a></center>
                        <?php echo $__env->make('models.delete',['url' => route('pegawai.destroy', $data->id),'model'=>$data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                        
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>