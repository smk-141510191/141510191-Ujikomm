<?php

namespace App\Http\Controllers;


use App\kategori_lembur;
use App\jabatan;
use App\golongan;
use Request;
use Form;
use Validator;
use Input;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $kategori = kategori_lembur::with('jabatan')->get();
        $kategori = kategori_lembur::with('golongan')->get();
       
        $kategori= kategori_lembur::where('kode_lembur', request('kode_lembur'))->paginate(0);
        if(request()->has('kode_lembur'))
        {
            $kategori=kategori_lembur::where('kode_lembur', request('kode_lembur'))->paginate(0);
        }
        else
        {
            $kategori=kategori_lembur::paginate(3);
        }
        return view ('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $golongan = golongan::all();
        $jabatan = jabatan::all();
        return view('kategori.create',compact('golongan','jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori=Request::all();
         $rules=['kode_lembur'=>'required:kategori_lemburs',
                 'besaran_uang'=>'required:kategori_lemburs'];
         $message=['kode_lembur.required'=>'Kolom Jangan Kosong',
                   'besaran_uang.required'=>'Kolom Jangan Kosong'];
         $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/kategori/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
        kategori_lembur::create($kategori);
        return redirect('kategori');
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
        //
        $data = kategori_lembur::where('id',$id)->with('golongan','jabatan')->first();
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        $kategori=kategori_lembur::find($id);
        return view('kategori.edit',compact('kategori','jabatan','golongan','data'));
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
        $data = Request::all();
        $kode_lama = kategori_Lembur::where('id', $id)->first()->kode_lembur;
         if ($data['kode_lembur'] != $kode_lama)
        {
        $rules = ['kode_lembur' => 'required|unique:kategori_lemburs',
                  'id_jabatan' => 'required',
                  'id_golongan' => 'required',
                  'besaran_uang' => 'required|numeric'];
        $sms = ['kode_lembur.required' => 'Harus Diisi',
                'kode_lembur.unique' => 'Data Sudah Ada',
                'id_jabatan.required' => 'Harus Diisi',
                'id_golongan.required' => 'Harus Diisi',
                'besaran_uang.required' => 'Harus Diisi',
                'besaran_uang.numeric' => 'Harus Angka'];
        }
        else
        {
            $rules = [
                  'id_jabatan' => 'required',
                  'id_golongan' => 'required',
                  'besaran_uang' => 'required|numeric'];
        $sms = ['id_jabatan.required' => 'Harus Diisi',
                'id_golongan.required' => 'Harus Diisi',
                'besaran_uang.required' => 'Harus Diisi',
                'besaran_uang.numeric' => 'Harus Angka'];
        }
        $valid=Validator::make(Input::all(),$rules,$sms);
        if ($valid->fails()) {

            return redirect('kategori/'.$id.'/edit')
            ->withErrors($valid)
            ->withInput();
        }
        else
        {

        kategori_lembur::where('id', $id)->first()->update([
            'kode_lembur'=> $data['kode_lembur'],
            'id_jabatan'=> $data['id_jabatan'],
            'id_golongan'=> $data['id_golongan'],
            'besaran_uang'=> $data['besaran_uang']
            ]);
        }
        return redirect('kategori');
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
        kategori_lembur::find($id)->delete();
        return redirect('kategori');
    }
}
