<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tunjangan Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="<?php echo e(url('tunjanganpegawai/create')); ?>">Tambah Data</a><br><br>
            
               <div class="form-group"><center>
        <form action="<?php echo e(url('tunjanganpegawai')); ?>/?kode_tunjangan_id=kode_tunjangan_id">
        <input type="text" name="kode_tunjangan_id" placeholder="Cari">
        <input class="btn btn-sm btn-primary" type="submit" value="Cari" /></form>
        </center></div>
       
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th><center>No</th></center>
                        <th><center>Kode Tunjangan</th></center>
                        <th><center>Nama Pengguna</th></center>
                        <th><center>Besaran Uang</th></center>
                                <th colspan="2"><center>Opsi</th></center>
                            </tr>
                        </thead>
                        <?php 
                        $a=1;
                         ?>
                        <?php $__currentLoopData = $tunjanganpegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tbody>
                            <td><center><?php echo e($a++); ?></td></center>
                            <td><center><?php echo e($data->tunjangan->kode_tunjangan); ?></td></center>
                            <td><?php echo e($users->where('id',$data->pegawai->id_user)->first()->name); ?></td>
                            <td> Rp.<?php echo e($data->tunjangan->besaran_uang); ?></td>
                        <td><a href="<?php echo e(route('tunjanganpegawai.edit',$data->id)); ?>" class="btn btn-warning">Edit</a></td>
                        <td ><a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        <?php echo $__env->make('models.delete', ['url' => route('tunjanganpegawai.destroy', $data->id),'model' => $data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>