<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    //
    protected $table = 'pegawais';
    protected $fillable = array('nip','name','email','id_jabatan','id_golongan','foto');
    protected $visible = array('nip','name','email','id_jabatan','id_golongan','foto');

    public function User()
    {
    	return $this->belongsTo('App\User','id_user');
    }
    public function golongan()
    {
    	return $this->belongsTo('App\golongan','id_golongan');
    }
    public function jabatan()
    {
    	return $this->belongsTo('App\jabatan','id_jabatan');
    }

    public function tunjangan_pegawai()
    {
        return $this->hasOne('App\tunjangan_pegawai','id_pegawai');
    }
    public function lembur_pegawai()
    {
        return $this->hasMany('App\lembur_pegawai','kode_lembur_id');
    }
    
    
}
