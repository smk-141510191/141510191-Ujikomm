<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tunjangan</div>
        <div class="panel-body">
        <a class="btn btn-success" href="<?php echo e(url('tunjangan/create')); ?>">Tambah Data</a><br><br>

        <div class="form-group"><center>
        <form action="<?php echo e(url('tunjangan')); ?>/?kode_tunjangan=kode_tunjangan">
        <input type="text" name="kode_tunjangan" placeholder="Cari">
        <input class="btn btn-sm btn-primary" type="submit" value="Cari" /></form>
        </center></div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Kode Tunjangan</th>
                        <th>Id Jabatan</th>
                        <th>Id Golongan</th>
                        <th>Status</th>
                        <th>Jumlah Anak</th>
                        <th>Besaran Uang</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                <?php $__currentLoopData = $tunjangan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tbody>
                    <tr> 
                        <td> <?php echo e($id++); ?> </td>
                        <td> <?php echo e($data->kode_tunjangan); ?> </td>
                        <td> <?php echo e($data->jabatan->nama_jabatan); ?> </td>
                        <td> <?php echo e($data->golongan->nama_golongan); ?> </td>
                        <td> <?php echo e($data->status); ?> </td>
                        <td> <?php echo e($data->jumlah_anak); ?> </td>
                        <td> Rp. <?php echo e($data->besaran_uang); ?> </td>
                        <td><a href="<?php echo e(route('tunjangan.edit',$data->id)); ?>" class="btn btn-warning">Edit</a></td>
                        <td><a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                         <?php echo $__env->make('models.delete',['url'=>route('tunjangan.destroy',$data->id),'model'=>$data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                        
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>