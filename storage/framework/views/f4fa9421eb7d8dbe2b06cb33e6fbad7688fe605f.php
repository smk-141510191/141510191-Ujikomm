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
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>Nip Pegawai</th> 
                            <th>Status Pengambilan</th>
                            <th colspan="3"> <center>Opsi</center></th>
                            </tr>
                        </thead>

                 <?php 
                            $no=1 ;
                         ?>
                        <tbody>
                        <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <td><?php echo e($no++); ?></td>                        
                       <td><img height="120px" alt="Smiley face" width="120px" class="img-circle" src="asset/image/<?php echo e($data->tunjangan_pegawai->pegawai->foto); ?>"></td> 


 
                       <td><?php echo e($data->tunjangan_pegawai->pegawai->User->name); ?></td> 

                       <td><?php echo e($data->tunjangan_pegawai->pegawai->nip); ?></td> 

                       <td><b><?php if($data->tanggal_pengambilan == ""&&$data->status_pengambilan == "0"): ?> 

                           Gaji Belum Diambil 

                         <?php elseif($data->tanggal_pengambilan == ""||$data->status_pengambilan == "0"): ?> 
                            Gaji Belum Diambil 
                        <?php else: ?> 

                           Gaji Sudah Diambil Pada <?php echo e($data->tanggal_pengambilan); ?> 
data
                        <?php endif; ?></b></td> 

                        <td><a class="btn btn-primary form-control" href="<?php echo e(route('penggajian.show',$data->id)); ?>">Lihat</a></td>
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