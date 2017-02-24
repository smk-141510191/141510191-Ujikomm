@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Tunjangan</div>
        <div class="panel-body">
            <form method="POST" action="{{url('tunjangan')}}">
                {{csrf_field()}}

                    <div class="form-group">
                    <label>Kode Tunjangan</label>

                    <div class="form-group {{$errors->has('kode_tunjangan') ? 'has-errors':'message'}}" >
                    <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" placeholder="Masukkan Kode Tunjangan" value="{{ old('kode_tunjangan') }}"  autofocus>

                             @if($errors->has('kode_tunjangan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('kode_tunjangan')}}</strong>
                                </span>
                            @endif
                </div>
                </div>

                    <div class="control-group">
                        <label class="control-label">Id Jabatan</label>
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
                    <label>Status</label>

                    <div class="form-group {{$errors->has('status') ? 'has-errors':'message'}}" >
                    <input id="statusstatus" type="text" class="form-control" name="status" placeholder="Masukkan Status" value="{{ old('status') }}"  autofocus>

                             @if($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{$errors->first('status')}}</strong>
                                </span>
                            @endif
                </div>
                </div>

                <div class="form-group">
                    <label>Jumlah anak</label>
                     <div class="form-group {{$errors->has('jumlah_anak') ? 'has-errors':'message'}}" >
                    <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" placeholder="Masukkan Jumlah Anak" value="{{ old('jumlah_anak') }}"  autofocus>

                             @if($errors->has('jumlah_anak'))
                                <span class="help-block">
                                    <strong>{{$errors->first('jumlah_anak')}}</strong>
                                </span>                           
                            @endif
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