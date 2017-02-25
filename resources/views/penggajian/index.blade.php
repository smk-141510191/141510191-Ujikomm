@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Penggajian</div>
        <div class="panel-body">
        <a class="btn btn-success" href="{{url('penggajian/create')}}">Tambah Data</a><br><br>

         <div class="form-group"><center>
        <form action="{{url('penggajian')}}/?kode_tunjangan_id=kode_tunjangan_id">
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

                 @php
                            $no=1 ;
                        @endphp
                        <tbody>
                        @foreach($penggajian as $data)
                        <td>{{$no++}}</td>                        
                       <td><img height="120px" alt="Smiley face" width="120px" class="img-circle" src="asset/image/{{$data->tunjangan_pegawai->pegawai->foto}}"></td> 


 
                       <td>{{$data->tunjangan_pegawai->pegawai->User->name}}</td> 

                       <td>{{$data->tunjangan_pegawai->pegawai->nip}}</td> 

                       <td><b>@if($data->tanggal_pengambilan == ""&&$data->status_pengambilan == "0") 

                           Gaji Belum Diambil 

                         @elseif($data->tanggal_pengambilan == ""||$data->status_pengambilan == "0") 
                            Gaji Belum Diambil 
                        @else 

                           Gaji Sudah Diambil Pada {{$data->tanggal_pengambilan}} 

                        @endif</b></td> 

                        <td><a class="btn btn-primary form-control" href="{{route('penggajian.show',$data->id)}}">Lihat</a></td>
                        <td ><a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        @include('models.delete', ['url' => route('penggajian.destroy', $data->id),'model' => $data])
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection