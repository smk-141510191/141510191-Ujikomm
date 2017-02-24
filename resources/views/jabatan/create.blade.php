@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Jabatan</div>
        <div class="panel-body">
            <form method="POST" action="{{url('jabatan')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label>Kode Jabatan</label>

                <div class="form-group {{$errors->has('kode_jabatan') ? 'has-errors':'message'}}" >
                <input id="kode_jabatan" type="text" class="form-control" name="kode_jabatan" placeholder="Masukkan Kode Jabatan" value="{{ old('kode_jabatan') }}"  autofocus>
                                
                            @if($errors->has('kode_jabatan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('kode_jabatan')}}</strong>
                                </span>
                            @endif
                </div>
                </div>
                

                <div class="form-group">
                    <label>Nama Jabatan</label>

                     <div class="form-group {{$errors->has('nama_jabatan') ? 'has-errors':'message'}}" >
                     <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" placeholder="Masukkan Nama Jabatan" value="{{ old('nama_jabatan') }}"  autofocus>

                             @if($errors->has('nama_jabatan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('nama_jabatan')}}</strong>
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