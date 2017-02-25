@extends('layouts.app')
@section('content')
                    
    <div class="">
         <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Penggajian</div>
                <div class="panel-body">
                        
         <table class="table table-striped table-hover table-bordered">
          <center>
          <p><img width="200px" height="200px" src="<?php echo url('assets/image/') ?>/<?php echo $penggajian->tunjanganpegawai->pegawai->photo; ?>" class="img-circle" alt="Cinque Terre" ></p>

                        <h3>Nama : {{$penggajian->tunjanganpegawai->pegawai->User->name}}</h3>
                        <h4>NIP  : {{$penggajian->tunjanganpegawai->pegawai->nip}}</h4>
                        <b>@if($penggajian->tangggal_pengambilan == ""&&$penggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @elseif($penggajian->tanggal_pengambilan == ""||$penggajian->status_pengambilan == "0")
                            Gaji Belum Diambil
                        @else
                            Gaji Sudah Diambil Pada {{$penggajian->tanggal_pengambilan}}
                        @endif</b>
                        <h5>Gaji Lembur Sebesar Rp.{{$penggajian->jumlah_uang_lembur}}<hr> Gaji Pokok Sebesar Rp.{{$penggajian->gaji_pokok}}<hr>Mendapat Tunjangan Sebesar Rp.{{$penggajian->tunjanganpegawai->tunjangan->besaran_uang}}<hr>Jadi Total Gaji Rp.{{$penggajian->total_gaji}}
                        </h5>
                        
 <hr><a class="btn btn-info col-md-12" href="{{url('penggajian')}}">Kembali</a>
                                
                        </center>
                        </div> 
                        
                    </table>
              
        
@endsection