<?php $__env->startSection('content'); ?>
<div class="col-md-9">
        <div class="panel panel-info">
        <div class="panel-heading"><h1><center><strong>Edit Data Golongan</h1></strong></div>
        <div class="panel-body">

                <div class="panel-body">
                    <form action="<?php echo e(route('golongan.update',$golongan->id)); ?>" method="POST">
                        <input name="_method" type="hidden" value="PATCH">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                        <label for="kode_golongan" class="col-md-4 control-label">Kode Golongan </label>
                        <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('besaran_uang') ? 'has-errors':'message'); ?>" >
                            <input type="text" name="kode_golongan" class="form-control"  value="<?php echo e($golongan->kode_golongan); ?>" autofocus="">
                        <?php if($errors->has('besaran_uang')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="nama_golongan" class="col-md-4 control-label">Nama Golongan</label>
                        <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('nama_golongan') ? 'has-errors':'message'); ?>" >
                            <input type="text" name="nama_golongan" class="form-control" value ="<?php echo e($golongan->nama_golongan); ?>">
                        <?php if($errors->has('nama_golongan')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nama_golongan')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                        <div class="col-md-6">
                        <div class="form-group <?php echo e($errors->has('besaran_uang') ? 'has-errors':'message'); ?>" >
                            <input type="text" name="besaran_uang" class="form-control" value ="<?php echo e($golongan->besaran_uang); ?>">
                         <?php if($errors->has('besaran_uang')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('besaran_uang')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-3 ">
   <div class="panel panel-default">
       <div class="panel-heading">
           <center>
               <h3><strong>HALAMAN WEB</strong></h3>
               <h5></h5>
               <div class="collapse navbar-collapse">
                   <!-- Left Side Of Navbar -->
                   <ul class="nav navbar-nav">
                       &nbsp;
                   </ul>

                   <!-- Right Side Of Navbar -->

                   <ul class="nav navbar-nav navbar-center">
                       <!-- Authentication Links -->
                       <?php if(Auth::guest()): ?>
                           <li><a class="" href="<?php echo e(url('/login')); ?>">Login</a></li>
                       <?php else: ?>
                           <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                               </a>

                               <ul class="dropdown-menu" role="menu">
                                   <li>
                                       <a href="<?php echo e(url('/logout')); ?>"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                           Logout
                                       </a>

                                       <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                           <?php echo e(csrf_field()); ?>

                                       </form>
                                   </li>
                               </ul>
                           </li>
                       <?php endif; ?>
                   </ul>
               </div>


               <div class="panel-body" align="center">
                   
                   <a href="<?php echo e(url('jabatan')); ?>">Jabatan</a><hr>
                   <a href="<?php echo e(url('golongan')); ?>">Golongan</a><hr>
                   <a href="<?php echo e(url('pegawai')); ?>">Pegawai</a><hr>
                   <a href="<?php echo e(url('kategori')); ?>">Kategori Lembur</a><hr>
                   <a href="<?php echo e(url('lemburpegawai')); ?>">Lembur Pegawai</a><hr>
                   <a href="<?php echo e(url('tunjangan')); ?>">Tunjangan</a><hr>
                   <a href="<?php echo e(url('tunjanganpegawai')); ?>">Tunjangan Karyawan</a><hr>
                   <a href="<?php echo e(url('penggajian')); ?>">Penggajian Karyawan</a><hr>  
 

               </div>
           </center>
       </div>
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>