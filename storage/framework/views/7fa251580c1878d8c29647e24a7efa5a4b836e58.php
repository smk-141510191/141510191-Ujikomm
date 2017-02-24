<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Lembur Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="<?php echo e(url('lemburpegawai/create')); ?>">Tambah Data</a><br><br>

         <div class="form-group"><center>
        <form action="<?php echo e(url('lemburpegawai')); ?>/?kode_lembur_id=kode_lembur_id">
        <input type="text" name="kode_lembur_id" placeholder="Cari">
        <input class="btn btn-sm btn-primary" type="submit" value="Cari" /></form>
        </center></div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>No</th>
                        <th>Kode Lembur</th>
                        <th>Nama Pegawai</th>
                        <th>Jumlah Jam</th>
                        <th colspan="3"><center>Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                <?php $__currentLoopData = $lemburpegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tbody>
                    <tr> 
                        <td> <?php echo e($id++); ?></td>
                        <td> <?php echo e($data->kategori_lembur->kode_lembur); ?> </td>
                       <td><?php echo e($users->where('id',$data->pegawai->id_user)->first()->name); ?></td>
                        <td> <?php echo e($data->jumlah_jam); ?></td>
                        <td><a href="<?php echo e(route('lemburpegawai.edit',$data->id)); ?>" class="btn btn-warning">Edit</a></td>
                        <td><a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                         <?php echo $__env->make('models.delete',['url'=>route('lemburpegawai.destroy',$data->id),'model'=>$data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                                   
                    
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>