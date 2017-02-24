<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\lembur_pegawai;
use App\tunjangan_pegawai;
use App\pegawai;
use App\tunjangan;
use App\penggajian;
use App\jabatan;
use App\kategori_lembur;
use App\golongan;
use App\User;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penggajian = penggajian::all();
        return view ('penggajian.index', compact('penggajian'));
        //
        //$user = request()->user()->id;
        //$jabatan = DB::select("SELECT jabatans.besaran_uang FROM jabatans");
        //$golongan = DB::select("SELECT golongans.besaran_uang FROM golongans");
        //$pegawai = DB::select("SELECT pegawais.id_user FROM pegawais where pegawais.id_user=$user");
        //$tunjanganpegawai = DB::select("SELECT tunjangan_pegawais.id_pegawai,
        //                                tunjangan_pegawais.kode_tunjangan_id FROM tunjangan_pegawais ");
        //$pegawai = pegawai::with('User')->get();
        //$lemburpegawai = DB::select("SELECT lembur_pegawais.id,lembur_pegawais.jumlah_jam,pegawais.id_user FROM lembur_pegawais JOIN pegawais ON pegawais.id=lembur_pegawais.id_pegawai where lembur_pegawais  .id_pegawai=$user");
        //dd($lemburpegawai);
        // DB::insert("INSERT INTO penggajians (tunjangan_pegawai_id,jumlah_jam_lembur,jumlah_uang_lembur,gaji_pokok,total_gaji,tanggal_pengambilan,status_pengambilan,petugas_penerima) VALUES ( '1', '2', '10000', '1000000', '1020000', '1999-04-25', '1', 'Andri')");
        ////return view('penggajian.index',compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjanganpegawai = tunjangan_pegawai::all();
        $pegawai = pegawai::with('User')->get();
    return view('penggajian.create',compact('pegawai','tunjanganpegawai'));

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
    public function store(Request $request)
    {
        $penggajian = Request::all();
       $tunjanganpegawai = tunjangan_pegawai::all();
       $user = $penggajian['id_pegawai'];
       $jumlah_jam_lembur = DB::table('lembur_pegawais')
       ->where('lembur_pegawais.id_pegawai', '=', $user)
       ->sum('lembur_pegawais.jumlah_jam');
       $tunjanganpegawai = tunjangan_pegawai::where('id_pegawai',$penggajian['id_pegawai'])->first();
       $pegawai = pegawai::where('id',$penggajian['id_pegawai'])->first();
       $kategori = kategori_lembur::where('id_jabatan',$pegawai->id_jabatan)->where('id_golongan',$pegawai->id_golongan)->first();
       $jabatan = jabatan::where('id',$pegawai->id_jabatan)->first();
       $golongan = golongan::where('id',$pegawai->id_golongan)->first();
       $lemburpegawai = lembur_pegawai::where('id_pegawai',$penggajian['id_pegawai'])->first();
       $gaji_pokok = jabatan::where('besaran_uang')->first();
       $tunjangan = tunjangan::where('id',$tunjanganpegawai->kode_tunjangan_id)->first();
       $penggajian['tunjangan_pegawai_id']= $tunjangan_pegawai->id;
       $penggajian['jumlah_jam_lembur']= (int)$jumlah_jam_lembur;
       $penggajian['jumlah_uang_lembur']= $kategori_lembur->besaran_uang*(int)$jumlah_jam_lembur;
       $penggajian['gaji_pokok']= $jabatan->besaran_uang+$golongan->besaran_uang;
       $penggajian['total_gaji']= $penggajian['gaji_pokok']+$penggajian['jumlah_uang_lembur']+$tunjangan->besaran_uang;
       penggajian::create($penggajian);
       return redirect('penggajian');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penggajian=penggajian::find($id);
        return view('penggajian.edit',compact('penggajian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataUpdate=Request::all();
        $penggajian=penggajian::find($id);
        $penggajian->update($dataUpdate);
        return redirect('penggajian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        penggajian::find($id)->delete();
        return redirect('penggajian');
    }
}
