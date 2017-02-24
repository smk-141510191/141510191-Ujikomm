@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Tunjangan Pegawai</div>
        <div class="panel-body">
        <a class="btn btn-success" href="{{url('tunjanganpegawai/create')}}">Tambah Data</a><br><br>
            
               <div class="form-group"><center>
        <form action="{{url('tunjanganpegawai')}}/?kode_tunjangan_id=kode_tunjangan_id">
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
                        @php
                        $a=1;
                        @endphp
                        @foreach($tunjanganpegawai as $data)
                        <tbody>
                            <td><center>{{$a++}}</td></center>
                            <td><center>{{$data->tunjangan->kode_tunjangan}}</td></center>
                            <td>{{$users->where('id',$data->pegawai->id_user)->first()->name}}</td>
                            <td> Rp.{{$data->tunjangan->besaran_uang}}</td>
                        <td><a href="{{route('tunjanganpegawai.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td ><a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        @include('models.delete', ['url' => route('tunjanganpegawai.destroy', $data->id),'model' => $data])
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection