<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\pegawai;
use App\kategori_lembur;
use App\lembur_pegawai;
use App\jabatan;
use App\User;
use Input;
use Validator;

class LemburpegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lemburpegawai = lembur_pegawai::with('pegawai')->get();
        $lemburpegawai = lembur_pegawai::with('kategori_lembur')->get();
        $users = User::all();
        $jabatan = jabatan::all();
       
        $lemburpegawai= lembur_pegawai::where('kode_lembur_id', request('kode_lembur_id'))->paginate(0);
        if(request()->has('kode_lembur_id'))
        {
            $lemburpegawai=lembur_pegawai::where('kode_lembur_id', request('kode_lembur_id'))->paginate(0);
        }
        else
        {
            $lemburpegawai=lembur_pegawai::paginate(3);
        }
           return view('lemburpegawai.index',compact('lemburpegawai','users','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
   
        $kategori = kategori_lembur::all();
        $pegawai = pegawai::with('User')->get();
    
        return view ('lemburpegawai.create', compact('kategori','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = kategori_lembur::all();
        
        $lemburpegawai = Request::all();
        $rules = ['id_pegawai' => 'required',
                  'jumlah_jam' => 'required|numeric'];
        $sms = ['id_pegawai.required' => 'Harus Diisi',
                'jumlah_jam.required' => 'Harus Diisi',
                'jumlah_jam.numeric' => 'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            return redirect('lemburpegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        
        lembur_pegawai::create($lemburpegawai);
        }
        return redirect('lemburpegawai');
    
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
        //
         $lemburpegawai = lembur_pegawai::with('kategori_lembur')->get();
             $users = User::all();
        $kategori = kategori_lembur::all();
     
        $lemburpegawai=lembur_pegawai::find($id);
        return view('lemburpegawai.edit',compact('lemburpegawai','users','kategori'));
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
        //
    $lemburpegawaiUpdate=Request::all();
        $lemburpegawai = Request::all();
        $rules = ['id_pegawai' => 'required',
                  'jumlah_jam' => 'required|numeric'];
        $sms = ['id_pegawai.required' => 'Harus Diisi',
                'jumlah_jam.required' => 'Harus Diisi',
                'jumlah_jam.numeric' => 'Harus Angka'];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            return redirect('lemburpegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        $lemburpegawai=lembur_pegawai::find($id);
        $lemburpegawai->update($lemburpegawaiUpdate);
        }
        return redirect('lemburpegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        lembur_pegawai::find($id)->delete();
        return redirect('lemburpegawai');
    }
}
