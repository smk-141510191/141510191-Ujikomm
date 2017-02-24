<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\lembur_pegawai;

class kategori_lembur extends Model
{
    //
    protected $table = 'kategori_lemburs';
    protected $fillable = array('id','kode_lembur','id_jabatan','id_golongan','besaran_uang');
    protected $visible = array('id','kode_lembur','id_jabatan','id_golongan','besaran_uang');

    public function jabatan()
    {
    	return $this->belongsTo('App\jabatan','id_jabatan');
    }
    public function golongan()
    {
    	return $this->belongsTo('App\golongan','id_golongan');
    }
    public function lembur_pegawai()
    {
    	return $this->hasOne('App\lembur_pegawai','kode_lembur_id');
    }
}
