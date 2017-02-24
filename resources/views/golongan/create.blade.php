@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Golongan</div>
        <div class="panel-body">
            <form method="POST" action="{{url('golongan')}}">
                {{csrf_field()}}


                <div class="form-group ">
                    <label>Kode Golongan</label>
                            
                <div class="form-group {{$errors->has('kode_golongan') ? 'has-errors':'message'}}" >
                <input id="kode_golongan" type="text" class="form-control" name="kode_golongan" placeholder="Masukkan Kode Golongan" value="{{ old('kode_golongan') }}"   autofocus>

                            @if($errors->has('kode_golongan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('kode_golongan')}}</strong>
                                </span>
                            @endif
                            </div>  
                            </div>
                           
                        


                 <div class="form-group">
                            <label >Nama Golongan</label>
                           
                <div class="form-group {{$errors->has('nama_golongan') ? 'has-errors':'message'}}" >
                <input id="nama_golongan" type="text" class="form-control" name="nama_golongan"  placeholder="Masukkan Nama Golongan" value="{{ old('nama_golongan') }}" autofocus>

                             @if($errors->has('nama_golongan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('nama_golongan')}}</strong>
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