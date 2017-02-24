<?php

namespace App\Http\Controllers;

use Request;
use App\jabatan;
use App\golongan;
use App\tunjangan;
use Validator;
use Input;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tunjangan = tunjangan::with('jabatan')->get();
        $tunjangan = tunjangan::with('golongan')->get();
        $tunjangan = tunjangan::all();

        $tunjangan= tunjangan::where('kode_tunjangan', request('kode_tunjangan'))->paginate(0);
        if(request()->has('kode_tunjangan'))
        {
            $tunjangan=tunjangan::where('kode_tunjangan', request('kode_tunjangan'))->paginate(0);
        }
        else
        {
            $tunjangan=tunjangan::paginate(3);
        }
        return view('tunjangan.index',compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $jabatan = jabatan::all();
         $golongan = golongan::all();
         return view ('tunjangan.create', compact('tunjangan','jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $tunjangan = Request::all();
        $rules = ['kode_tunjangan'  => 'required|unique:tunjangans',
            'id_jabatan' => 'required',
            'id_golongan' => 'required',
            'status' => 'required',
            'jumlah_anak' => 'required|numeric',
            'besaran_uang' => 'required|numeric'];
        $sms = ['kode_tunjangan.required' => 'Harus Diisi',
                'kode_tunjangan.unique' => 'Data Sudah Ada',
                'jumlah_anak.numeric' => 'Harus Angka',
                'besaran_uang.numeric' => 'Harus Angka',
                'id_jabatan.required' => 'Harus Diisi',
                'id_golongan.required' => 'Harus Diisi',
                'status.required' => 'Harus Diisi',
                'jumlah_anak.required' => 'Harus Diisi',
                'besaran_uang.required' => 'Harus Diisi'
                ];
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) { 
            return redirect('tunjangan/create')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {
        tunjangan::create($tunjangan);
        return redirect('tunjangan');
        }
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
        $tunjangan = tunjangan::with('golongan');
        $tunjangan = tunjangan::with('jabatan');
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        $tunjangan=tunjangan::find($id);
        return view('tunjangan.edit',compact('tunjangan','jabatan','golongan'));
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
        $tunjanganUpdate=Request::all();
        $tunjangan=tunjangan::find($id);
        $tunjangan->update($tunjanganUpdate);
        return redirect('tunjangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}
