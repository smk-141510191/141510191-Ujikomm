<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\tunjangan_pegawai;
use App\pegawai;
use App\User;
use App\tunjangan;
use Validator;
use Input;


class TunjanganpegawaiController extends Controller
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
        $users = User::all();


         $tunjanganpegawai= tunjangan_pegawai::where('kode_tunjangan_id', request('kode_tunjangan_id'))->paginate(0);
        if(request()->has('kode_tunjangan_id'))
        {
            $tunjanganpegawai=tunjangan_pegawai::where('kode_tunjangan_id', request('kode_tunjangan_id'))->paginate(0);
        }
        else
        {
            $tunjanganpegawai=tunjangan_pegawai::paginate(3);
        }

        return view('tunjanganpegawai.index',compact('tunjanganpegawai','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
         $tunjangan = tunjangan::all();
        $pegawai = pegawai::with('User')->get();
        
        return view('tunjanganpegawai.create',compact('tunjangan','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $tunjangan = tunjangan::all();
        $pegawai = pegawai::with('User')->get();
        $tunjanganpegawai = Request::all();
        
        $rules = ['id_pegawai' => 'required|unique:tunjangan_pegawais'];
        $sms = ['id_pegawai.unique' => 'Data Sudah Ada Tidak Boleh Sama',
                'id_pegawai.required' => 'Harus Diisi',];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {
  
            return redirect('tunjanganpegawai/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {

        tunjangan_pegawai::create($tunjanganpegawai);
        }
        return redirect('tunjanganpegawai');
        
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
        $tunjanganpegawai=tunjangan_pegawai::find($id);
        $tunjangan = tunjangan::all();
        $pegawai = pegawai::with('User')->get();
        return view('tunjanganpegawai.edit',compact('tunjanganpegawai', 'tunjangan' , 'pegawai'));
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
         $dataUpdate=Request::all();
        $tunjanganpegawai=tunjangan_pegawai::find($id);
        $tunjanganpegawai->update($dataUpdate);
        return redirect('tunjanganpegawai');
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
        tunjangan_pegawai::find($id)->delete();
        return redirect('tunjanganpegawai');
    }
}
