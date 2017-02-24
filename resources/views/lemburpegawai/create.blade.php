@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Lembur Pegawai</div>
        <div class="panel-body">
            <form method="POST" action="{{url('lemburpegawai')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label class="control-label">Kode Lembur</label>  
                    <div class="form-group {{$errors->has('kode_lembur') ? 'has-errors':'message'}}" >
                    <div class="controls">
                  <select class="form-control" name="kode_lembur_id">
                  <option>pilih</option>
                                @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->kode_lembur }}</option>
                                @endforeach
                            </select>
                </div>
                </div>
                </div>
      
                     <div class="control-group">
                        <label class="control-label">Pegawai</label>
                        <div class="controls">
                            <select class="form-control" name="id_pegawai">
                                        <option value="">Pilih</option>
                                        @foreach($pegawai as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                    </div>

                    <div class="control-group">
                    <label class="control-label">Jumlah Jam</label>

                    <div class="form-group {{$errors->has('jumlah_jam') ? 'has-errors':'message'}}" >
                                <input id="jumlah_jam" type="text" class="form-control" name="jumlah_jam" placeholder="Masukan Jumlah Jam" value="{{ old('jumlah_jam') }}"  autofocus>

                             @if($errors->has('jumlah_jam'))
                                <span class="help-block">
                                    <strong>{{$errors->first('jumlah_jam')}}</strong>
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