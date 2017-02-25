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
Use Input;
use auth;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tunjanganpegawai = tunjangan_pegawai::with('tunjangan')->get();
        $tunjanganpegawai = tunjangan_pegawai::with('pegawai')->get();


    
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
         return view('tunjanganpegawai.index',compact('tunjanganpegawai'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjanganpegawai = tunjangan::all();
        $pegawai = pegawai::with('User')->get();
        return view('tunjanganpegawai.create',compact('tunjangan','pegawai'));
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
}
    public function store(Request $request)
    {
        $penggajian=Input::all();
         // dd($penggajian);
        $wheretunjanganpegawai=tunjangan_pegawai::where('id',$penggajian['kode_tunjangan_id'])->first();
        // dd($where);
        $wherepenggajian=penggajian::where('kode_tunjangan_id',$where->id)->first();
        // dd($wherepenggajian);
        $wheretunjangan=tunjangan::where('id',$where->kode_tunjangan_id)->first();
        // dd($wheretunjangan);
        $wherepegawai=pegawai::where('id',$where->id_pegawai)->first();
        // dd($wherepegawai);
        $wherekategori=kategori_lembur::where('id_jabatan',$wherepegawai->id_jabatan)->where('id_golongan',$wherepegawai->id_golongan)->first();
         // dd($wherekategori_lembur);
        $wherelemburpegawai=lembur_pegawai::where('id_pegawai',$wherepegawai->id)->first();
        // dd($wherelemburpegawai);
        $wherejabatan=jabatan::where('id',$wherepegawai->id_jabatan)->first();
        // dd($wherejabatan);
        $wheregolongan=golongan::where('id',$wherepegawai->id_golongan)->first();
        // dd($wheregolongan);

        $penggajian=new penggajian ;
        if (isset($wherepenggajian)) {
            $error=true ;
            $tunjanganpegawai=tunjanganpegawai::all();
            return view('penggajian.create',compact('tunjanganpegawai','error'));
        }
        elseif (!isset($wherelemburpegawai)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
        $penggajian->status_pengambilan=0 ;
        $penggajian->tanggal_pengambilan =date('d-m-y');
        $penggajian->kode_tunjangan_id=Input::get('kode_tunjangan_id');
        $penggajian->petugas_penerima=auth::User()->name ;
        $penggajian->save();
        }
        elseif (!isset($wherelemburpegawai)||!isset($wherekategori)) {
            $nol=0 ;
            $penggajian->jumlah_jam_lembur=$nol;
            $penggajian->jumlah_uang_lembur=$nol ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->total_gaji=($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajian->status_pengambilan=0 ;
            $penggajian->tanggal_pengambilan =date('d-m-y');
        $penggajian->kode_tunjangan_id=Input::get('kode_tunjangan_id');
        $penggajian->petugas_penerima=auth::user()->name ;
        $penggajian->save();
        }
        else{

            $penggajian->jumlah_jam_lembur=$wherelemburpegawai->jumlah_jam;
            $penggajian->jumlah_uang_lembur=$wherelemburpegawai->jumlah_jam*$wherekategori->besaran_uang ;
            $penggajian->gaji_pokok=$wherejabatan->besaran_uang+$wheregolongan->besaran_uang;
            $penggajian->total_gaji=($wherelemburpegawai->jumlah_jam*$wherekategori->besaran_uang)+($wheretunjangan->besaran_uang)+($wherejabatan->besaran_uang+$wheregolongan->besaran_uang);
            $penggajian->tanggal_pengambilan =date('d-m-y');
            $penggajian->kode_tunjangan_id=Input::get('kode_tunjangan_id');
            $penggajian->status_pengambilan=0 ;
            $penggajian->petugas_penerima=auth::user()->name ;
            $penggajian->save();
            }
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
        $penggajian=penggajian::find($id);
        return view('penggajian.read',compact('penggajian'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji=penggajian::find($id);

        $penggajian=new penggajian ;

        $penggajian=array('status_pengambilan'=>1,'tanggal_pengambilan'=>date('y-m-d'));

        penggajian::where('id',$id)->update($penggajian);
        return redirect('penggajian');

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
