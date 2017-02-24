<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    //
        protected $table = 'golongans';
    protected $fillable = array('id','kode_golongan','nama_golongan','besaran_uang');
    protected $visible = array('id','kode_golongan','nama_golongan','besaran_uang');

    public function tunjangan()
    {
    	return $this->hasMany('App\tunjangan','id_golongan');
    }
    public function kategori_lembur()
    {
    	return $this->hasMany('App\kategori_lembur','id_golongan');
    }
    public function pegawai()
    {
        return $this->hasMany('App\pegawai','id_golongan');
    }
}
