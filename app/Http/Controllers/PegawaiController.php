<?php

namespace App\Http\Controllers;

use App\golongan;
use App\jabatan;
use App\pegawai;
use App\User;
use App\Form;
use Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
        use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = pegawai::all();
        $pegawai= pegawai::where('nip', request('nip'))->paginate(0);
        if(request()->has('nip'))
        {
            $pegawai=pegawai::where('nip', request('nip'))->paginate(0);
        }
        else
        {
            $pegawai=pegawai::paginate(3);
        }
        return view ('pegawai.index', compact('pegawai'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $golongan = golongan::all();
        $jabatan = jabatan::all();
        return view ('pegawai.create', compact('golongan','jabatan', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
                'name' => 'required',
                'nip' => 'required|numeric|min:3|unique:pegawais',
                'permission' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                ]);

                $user = User::create([
                    'name' => $request->get('name'),
                    'permission' => $request->get('permission'),
                    'email' => $request->get('email'),
                    'password' => bcrypt($request->get('password')),
                ]);

        $file = Input::file('foto');
        $destinationPath = public_path().'/assets/image/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('foto')){
        $pegawai= new pegawai;
        $pegawai->nip=$request->get('nip');
        $pegawai->id_jabatan =$request->get('id_jabatan');
        $pegawai->id_golongan=$request->get('id_golongan');
        $pegawai->id_user =$user->id;
        $pegawai->foto = $filename;
        $pegawai->save();

                return redirect('/pegawai');

          
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
         $data = pegawai::where('id',$id)->with('golongan','jabatan','User')->first();
        $jabatan = jabatan::all();
        $golongan = golongan::all();
        return view('pegawai.edit',compact('pegawai','jabatan','golongan','data'));
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
        $old_pegawai = pegawai::where('id', $id)->first();
        $old_email = User::where('id', $old_pegawai->id_user)->first()->email;
        $old_password = User::where('id', $old_pegawai->id_user)->first()->password;
        $data = Request::all();
        $validati = ([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required',
            'password' => 'required|min:6',
            'nip'=>'required|unique:pegawais',
            'id_jabatan' => 'required',
            'id_golongan' => 'required',
            'foto' => 'required',
            ]);
        if ($old_email==$data['email']) {
            $validati['email'] = '';
            $data['email'] = $old_email;
        }
        if ($data['password']==null) {
            $validati['password'] = '';
            $data['password'] = $old_password;
        }
        else{
            $validati['password'] = 'min:6';
            $data['password'] = bcrypt($data['password']);
        }
        if (Input::file() == null)
        {
            $validati['foto'] = '';
        }
        if ($data['nip']==$old_pegawai['nip'])
        {
            $validati['nip'] = '';
        }
        else{
            $validati['nip'] = 'required|unique:pegawais';
        }

        $validation = Validator::make(Request::all(), $validati);

        if ($validation->fails()) {
            return redirect('pegawai/'.$id.'/edit')->withErrors($validation)->withInput();
        }

        $user = User::where('id', $old_pegawai->id_user)->first()->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'permission' => $data['permission'],
            'password' => $data['password'],
            ]);
        $user = User::where('id', $old_pegawai->id_user)->first();
        

        if (Input::file()==null)
        {
            $data['foto'] = $old_pegawai->foto;

        }
        else
        {
            $file = Input::file('foto');
            $destination_path = public_path().'/assets/foto';
            $filename = $user->name.'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destination_path,$filename);
            $data['foto'] = $filename;
        }

        pegawai::where('id', $id)->first()->update([
            'nip' => $data['nip'],
            'jabatan_id' => $data['jabatan_id'],
            'golongan_id' => $data['golongan_id'],
            'foto' => $data['foto'],
            ]);
        return redirect('pegawai');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        pegawai::find($id)->delete();
        return redirect('pegawai');
    }
}
