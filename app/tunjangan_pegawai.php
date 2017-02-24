<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tunjangan_pegawai extends Model
{
    protected $table = 'tunjangan_pegawais';
    protected $fillable = array('id','kode_tunjangan','id_pegawai');
    protected $visible = array('id','kode_tunjangan','id_pegawai');

    public function tunjangan()
    {
    	return $this->belongsTo('App\tunjangan','kode_tunjangan_id');
    }
    public function pegawai()
    {
    	return $this->belongsTo('App\pegawai','id_pegawai');
    }
    public function penggajian()
    {
        return $this->hasMany('App\penggajian','tunjangan_pegawai_id');
    }
}
