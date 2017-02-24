<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Golongan</div>
        <div class="panel-body">

        <a class="btn btn-success" href="<?php echo e(url('golongan/create')); ?>">Tambah Data</a><br><br>

    <div class="form-group"><center>
    <form action="<?php echo e(url('golongan')); ?>/?nama_golongan=nama_golongan">
        <input type="text" name="nama_golongan" placeholder="Cari">
        <input class="btn btn-sm btn-primary" type="submit" value="Cari" /></form>
    </center></div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>No</th>
                        <th>Kode Golongan</th>
                        <th>Nama Golongan</th>
                        <th>Besaran Uang</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                <?php $__currentLoopData = $golongan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tbody>
                    <tr> 
                        <td> <?php echo e($id++); ?> </td>
                        <td> <?php echo e($data->kode_golongan); ?> </td>
                        <td> <?php echo e($data->nama_golongan); ?></td>
                        <td> Rp.<?php echo e($data->besaran_uang); ?></td>
                        <td><a href="<?php echo e(route('golongan.edit',$data->id)); ?>" class="btn btn-warning">Edit</a></td>
                        <td><a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        <?php echo $__env->make('models.delete',['url'=>route('golongan.destroy',$data->id),'model'=>$data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                                   
                    
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
            <?php echo e($golongan->links()); ?>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>