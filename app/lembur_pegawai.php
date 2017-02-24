<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pegawai;

class lembur_pegawai extends Model
{
    //
    protected $table = 'lembur_pegawais';
    protected $fillable = array('id','kode_lembur_id','id_pegawai','jumlah_jam');
    protected $visible = array('id','kode_lembur_id','id_pegawai','jumlah_jam');

    public function kategori_lembur ()
    {
        return $this->belongsTo('App\kategori_lembur','kode_lembur_id');
    }
    public function pegawai ()
    {
        return $this->belongsTo('App\pegawai','id_pegawai');
    }
}
