@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Tambah Data Tunjangan Pegawai</div>
        <div class="panel-body">
  <form method="POST" action="{{url('tunjanganpegawai')}}">
                {{csrf_field()}}



                     <div class="control-group">
                        <label class="control-label">Kode Tunjangan</label>
                        <div class="controls">
                            <select class="form-control" name="kode_tunjangan_id">
                                        <option value="">Pilih</option>
                                        @foreach($tunjangan as $data)
                                        <option value="{!! $data->id !!}">{!! $data->kode_tunjangan !!}</option>
                                        @endforeach
                                    </select>
      
                     <div class="control-group">
                        <label class="control-label">Pegawai</label>
                        <div class="controls">
                            <select class="form-control" name="id_pegawai">
                                        <option value="">Pilih</option>
                                        @foreach($pegawai as $data)
                                        <option value="{!! $data->id !!}">{!! $data->nip !!}_{!! $data->User->name !!}</option>
                                        @endforeach
                                    </select>
                             
				<div class="form-group">
					<input class="btn btn-success" type="submit" name="submit" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>

@stop