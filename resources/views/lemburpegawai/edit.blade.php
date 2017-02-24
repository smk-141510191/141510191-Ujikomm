@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Edit Data Lembur Pegawai</div>
        <div class="panel-body">
            <form method="POST" action="{{url('lemburpegawai')}}">
                {{csrf_field()}}

                
                  <div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
                            <label for="kode_lembur" class="col-md-4 control-label">Kode Lembur :</label>
                                <div class="col-md-6">
                                    <select name="kode_lembur" class="form-control">
                                @foreach ($kategori as $data)
                                <option value="{{$data->id}}" <?php if ($data->kode_lembur==$data->id) {echo "selected";} ?>>{{$data->kode_lembur}}</option>
                                @endforeach
                            </select>
                                   
                    </div>
                    </div>
      
                     <div class="form-group{{ $errors->has('id_pegawai') ? ' has-error' : '' }}">
                            <label for="id_pegawai" class="col-md-4 control-label">Nama Pegawai :</label>
                                <div class="col-md-6">
                                    <select name="id_pegawai" class="form-control">
                                <option value="">Pilih</option>
                                    @foreach($pegawai as $data)
                                    <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                    @endforeach
                            </select>
                            </div>
                            </div>

                    <div class="form-group{{ $errors->has('jumlah_jam') ? ' has-error' : '' }}">
                            <label for="jumlah_jam" class="col-md-4 control-label">Jumlah Jam :</label>
                                <div class="col-md-6">
                                    <input type="text" name="jumlah_jam" value="{{$lemburpegawai->jumlah_jam}}" class="form-control">
                                    @if ($errors->has('jumlah_jam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_jam') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                 

                <div class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection