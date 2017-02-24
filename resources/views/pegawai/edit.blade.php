@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Data Lembur Pegawai</div>

                <div class="panel-body">
                    {!! Form::model($pegawai,['method' => 'PATCH','route'=>['pegawai.update',$pegawai->id]]) !!}
                <div class="form-group">
                    {!! Form::label('NIP ', 'NIP ') !!}
                    {!! Form::text('nip',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Nama', 'Nama') !!}
                    {!! Form::text('nama',null,['class'=>'form-control']) !!}
                <div class="form-group">
                    {!! Form::label('E-mail', 'E-mail') !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                </div>
                 <div class="form-group">
                    {!! Form::label('Id jabatan', 'Id jabatan') !!}
                    {!! Form::text('id_jabatan',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Id golongan', 'Id golongan') !!}
                    {!! Form::text('id_golongan',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection