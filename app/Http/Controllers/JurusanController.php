<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Jurusan;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *
     */
    public function index(){
        $jurusans = Jurusan::All();

        $data = array(
            'jurusans' => $jurusans ,
            'no' => 1);

        return view('jurusan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('nama' => 'nama');

       
        return view('jurusan.create', $data);

      

        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        jurusan::create([
            'nama' => request('nama'),
            'alamat' => request('alamat'),
            'email' => request('email'),
        ]);

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');
        return redirect('/jurusan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        $data = array(
            'nama' => 'nama',
            'jurusan' => $jurusan
        );
        return view('jurusan.edit' ,$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $jurusan=Jurusan::find($id);

     
        return view('jurusan.edit',compact('jurusan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);

        DB::table('jurusans')->where('id', $id)
        ->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);
        Alert::success('Congrats', 'Data Berhasil Diubah');
        return redirect('/jurusan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('jurusans')->where('id', $id)->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect()-> route('jurusan.index');
    }
}
