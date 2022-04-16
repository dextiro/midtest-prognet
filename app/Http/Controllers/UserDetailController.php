<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\KelompokStudi;
use App\Models\Userdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompokstudi = KelompokStudi::all();
        $mahasiswa = Mahasiswa::All();
        $userdetails = Userdetail::All();
        

        $data = array(
            'mahasiswa' => $mahasiswa,
            'kelompokstudi' => $kelompokstudi,
            'userdetails' => $userdetails,
            'no' => 1);
        return view('userdetail.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('id' => 'id');
        $data= DB::Table('kelompokstudis')->get();
        $data= DB::Table('mahasiswas')->get();

        return view('userdetail.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'kelompokstudi_id' => 'required',
        ]);

        DB::table('userdetails')->insert([
            'id_mahasiswa' => $request->mahasiswa_id,
            'id_kelompokstudi' => $request->kelompokstudi_id,
        ]);
        Alert::success('Congrats', 'Data Berhasil Ditambahkan');

        return redirect('/userdetail');
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
        $kelompokstudi = kelompokstudi::all();
        $mahasiswa = mahasiswa::all();
        $userdetail=Userdetail::find($id);

        $data = array(
            'kelompokstudi' => $kelompokstudi,
            'mahasiswa' => $mahasiswa);

        return view('userdetail.edit',compact('mahasiswa','kelompokstudi','userdetail'));
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
        DB::table('userdetails')->where('id', $id)
        ->update([
            'mahasiswa_id' => $request->mahasiswa_id,
            'kelompokstudi_id' => $request->kelompokstudi_id,
            
        ]);
        Alert::success('Congrats', 'Data Berhasil Diubah');
        return redirect('/userdetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('userdetails')->where('id', $id)->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect()-> route('userdetail.index');
    }
}
