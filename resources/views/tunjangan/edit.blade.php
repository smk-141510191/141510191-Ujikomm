@extends('layouts.app')
@section('content')
<title>Golongan</title>
<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Tunjangan</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{route('tunjangan.update',$tunjangan->id)}}" method="POST">
                <input name="_method" type="hidden" value="PATCH">
                    {{csrf_field()}}    
                    <div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
                            <label for="kode_tunjangan" class="col-md-4 control-label">Kode Tunjangan :</label>
                                <div class="col-md-6">
                                    <input type="text" name="kode_tunjangan" value="{{$tunjangan->kode_tunjangan}}" class="form-control" autofocus>
                                    @if ($errors->has('kode_tunjangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_tunjangan') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('id_jabatan') ? ' has-error' : '' }}">
                            <label for="id_jabatan" class="col-md-4 control-label">Nama Jabatan :</label>
                                <div class="col-md-6">
                                    <select name="id_jabatan" class="form-control">
                                @foreach ($jabatan as $data)
                                <option value="{{$data->id}}" <?php if ($tunjangan->id_jabatan==$data->id) {echo "selected";} ?>>{{$data->nama_jabatan}}</option>
                                @endforeach
                            </select>
                                    @if ($errors->has('id_jabatan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_jabatan') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('id_golongan') ? ' has-error' : '' }}">
                            <label for="id_golongan" class="col-md-4 control-label">Nama Golongan :</label>
                                <div class="col-md-6">
                            <select name="id_golongan" class="form-control">
                                @foreach ($golongan as $data)
                                <option value="{{$data->id}}" <?php if ($tunjangan->id_golongan==$data->id) {echo "selected";} ?>>{{$data->nama_golongan}}</option>
                                @endforeach
                            </select>
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status :</label>
                                <div class="col-md-6">
                                    <input type="text" name="status" value="{{$tunjangan->status}}" class="form-control">
                                    @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
                            <label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak :</label>
                                <div class="col-md-6">
                                    <input type="numeric" name="jumlah_anak" value="{{$tunjangan->jumlah_anak}}" class="form-control">
                                    @if ($errors->has('jumlah_anak'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_anak') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang :</label>
                                <div class="col-md-6">
                                    <input type="text" name="besaran_uang" value="{{$tunjangan->besaran_uang}}" class="form-control">
                                    @if ($errors->has('besaran_uang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('besaran_uang') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4" >
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection