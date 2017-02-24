@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Kategori Lembur</div>
        <div class="panel-body">
            <form method="POST" action="{{url('kategori')}}">
                {{csrf_field()}}

                    <div class="form-group">
                    <label>Kode Lembur</label>

                    <div class="form-group {{$errors->has('kode_lembur') ? 'has-errors':'message'}}" >
                    <input id="kode_lembur" type="text" class="form-control" name="kode_lembur" placeholder="Masukan Kode Lembur" value="{{ old('kode_lembur') }}"  autofocus>

                            @if($errors->has('kode_lembur'))
                                <span class="help-block">
                                    <strong>{{$errors->first('kode_lembur')}}</strong>
                                </span>
                            @endif
                    </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label">Id Jabatan</label>
                        <div class="form-group {{$errors->has('kode_golongan') ? 'has-errors':'message'}}" >
                        <div class="controls">
                            <select class="form-control" name="id_jabatan">
                            <option >Pilih</option>
                                @foreach ($jabatan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Id Golongan</label>
                        <div class="form-group {{$errors->has('kode_golongan') ? 'has-errors':'message'}}" >
                        <div class="controls">
                            <select class="form-control" name="id_golongan">
                            <option >Pilih</option>
                                @foreach ($golongan as $data)
                                <option value="{{ $data->id }}">{{ $data->nama_golongan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                <div class="form-group">
                    <label>Besaran Uang</label>
                     
                <div class="form-group {{$errors->has('besaran_uang') ? 'has-errors':'message'}}" >
                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" placeholder="Masukkan Besaran Uang" value="{{ old('besaran_uang') }}"  autofocus>

                             @if($errors->has('besaran_uang'))
                                <span class="help-block">
                                <strong>{{$errors->first('besaran_uang')}}</strong>
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

@stop