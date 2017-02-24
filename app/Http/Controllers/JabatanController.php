<?php

namespace App\Http\Controllers;

use App\jabatan;
use App\pegawai;
use App\Form;
use Request;
use Validator;
use Input;


class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = jabatan::all();
        $jabatan= jabatan::where('nama_jabatan', request('nama_jabatan'))->paginate(0);
        if(request()->has('nama_jabatan'))
        {
            $jabatan=jabatan::where('nama_jabatan', request('nama_jabatan'))->paginate(0);
        }
        else
        {
            $jabatan=jabatan::paginate(3);
        }

        return view ('jabatan.index', compact('jabatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = pegawai::all();
        $jabatan = jabatan::all();
        return view ('jabatan.create', compact('pegawai','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan=Request::all();
        $rules=['kode_jabatan'=>'required:jabatans',
                 'nama_jabatan'=>'required:jabatans',
                 'besaran_uang'=>'required:jabatans'];
         $message=[
                  'kode_jabatan.required'=>'Kolom Jangan Kosong',
                  'nama_jabatan.required'=>'Kolom Jangan Kosong',
                  'besaran_uang.required'=>'Kolom Jangan Kosong',];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/jabatan/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {

        jabatan::create($jabatan);
        return redirect('jabatan');
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
        $jabatan=jabatan::find($id);
        return view('jabatan.edit',compact('jabatan'));
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
        $jabatan=jabatan::find($id);
        $jabatan->update($dataUpdate);
        return redirect('jabatan');
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
        jabatan::find($id)->delete();
        return redirect('jabatan');
    }
}
