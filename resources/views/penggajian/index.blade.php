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
                @foreach ($penggajian as $data)
                <tbody>
                    <tr> 
                        <td> {{$id++}} </td>
                        <td> {{$data->tunjangan_pegawai->kode_tunjangan_id}} </td>
                        <td> {{$data->jumalah_jam_lembur}} </td>
                        <td> Rp.{{$data->jumlah_uang_lembur}} </td>
                        <td> Rp.{{$data->gaji_pokok}} </td>
                        <td> Rp.{{$data->total_gaji}} </td>
                        <td> {{$data->tanggal_pengembalian}} </td>
                        <td> {{$data->status_pengembalian}} </td>
                        <td> {{$data->petugas_penerima}} </td>
                        <td><a href="{{route('penggajian.edit',$data->id)}}" class="btn btn-warning">Edit</a></td>
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