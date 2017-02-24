@extends('layouts.app')

@section('content')

<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">Golongan</div>
        <div class="panel-body">

        <a class="btn btn-success" href="{{url('golongan/create')}}">Tambah Data</a><br><br>

    <div class="form-group"><center>
    <form action="{{url('golongan')}}/?nama_golongan=nama_golongan">
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
                @foreach ($golongan as $data)
                <tbody>
                    <tr> 
                        <td> {{$id++}} </td>
                        <td> {{$data->kode_golongan}} </td>
                        <td> {{$data->nama_golongan}}</td>
                        <td> Rp.{{$data->besaran_uang}}</td>
                        <td><a href="{{route('golongan.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
                        <td><a data-toggle="modal" href="#delete{{ $data->id }}" class="btn btn-danger" title="Delete" data-toggle="tooltip">Hapus</a>
                        @include('models.delete',['url'=>route('golongan.destroy',$data->id),'model'=>$data])</td>
                                   
                    
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{$golongan->links()}}
        </div>
    </div>
</div>

@endsection