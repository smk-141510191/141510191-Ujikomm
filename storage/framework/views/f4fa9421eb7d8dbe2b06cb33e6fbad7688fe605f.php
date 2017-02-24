<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Penggajian</div>
        <div class="panel-body">
        <a class="btn btn-success" href="<?php echo e(url('penggajian/create')); ?>">Tambah Data</a><br><br>

         <div class="form-group"><center>
        <form action="<?php echo e(url('penggajian')); ?>/?kode_tunjangan_id=kode_tunjangan_id">
        <input type="text" name="kode_tunjangan_id" placeholder="Cari">
        <input class="btn btn-sm btn-primary" type="submit" value="Cari" /></form>
        </center></div>

            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>Id</th>
                        <th>Id Tunjangan Pegawai</th>
                        <th>Jumlah Jam Lembur</th>
                        <th>Jumlah Uang Lembur</th>
                        <th>Gaji Pokok</th>
                        <th>Total Gaji</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Pengembalian</th>
                        <th>Petugas Penerima</th>
                        <th colspan="3">Opsi</th>
                    </tr>
                </thead>

                <?php $id=1; ?>
                <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tbody>
                    <tr> 
                        <td> <?php echo e($id++); ?> </td>
                        <td> <?php echo e($data->tunjangan_pegawai->kode_tunjangan_id); ?> </td>
                        <td> <?php echo e($data->jumalah_jam_lembur); ?> </td>
                        <td> Rp.<?php echo e($data->jumlah_uang_lembur); ?> </td>
                        <td> Rp.<?php echo e($data->gaji_pokok); ?> </td>
                        <td> Rp.<?php echo e($data->total_gaji); ?> </td>
                        <td> <?php echo e($data->tanggal_pengembalian); ?> </td>
                        <td> <?php echo e($data->status_pengembalian); ?> </td>
                        <td> <?php echo e($data->petugas_penerima); ?> </td>
                        <td><a href="<?php echo e(route('penggajian.edit',$data->id)); ?>" class="btn btn-warning">Edit</a></td>
                        <td ><a data-toggle="modal" href="#delete<?php echo e($data->id); ?>" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        <?php echo $__env->make('models.delete', ['url' => route('penggajian.destroy', $data->id),'model' => $data], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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