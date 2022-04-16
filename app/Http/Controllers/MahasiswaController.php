<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = jurusan::all();
        $mahasiswas = mahasiswa::All();
        

        $data = array(
            'mahasiswas' => $mahasiswas,
            'jurusan' => $jurusan,
            'no' => 1);
        return view('mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= DB::Table('jurusans')->get();
        $data = array('nama' => 'nama');

        return view('mahasiswa.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_telepon = $request->no_telepon;
        $mahasiswa->jurusan_id = $request->jurusan_id ;
        $mahasiswa->save();

        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect('/mahasiswa');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::all();
        $mahasiswa=Mahasiswa::find($id);

        $data = array(
            'jurusan' => $jurusan,);

        return view('mahasiswa.edit',compact('mahasiswa','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
    $jurusan = jurusan::all();
       $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        DB::table('mahasiswas')->where('id', $id)
        ->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'jurusan_id' => $request->jurusan_id,
            
        ]);
        Alert::success('Congrats', 'Data Berhasil Diubah');
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('mahasiswas')->where('id', $id)->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect()-> route('mahasiswa.index');
    }
}
