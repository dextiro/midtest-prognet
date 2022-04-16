<?php

namespace App\Http\Controllers;

use App\Models\KelompokStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
class KelompokStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelompokstudis = KelompokStudi::All();

        $data = array(
            'kelompokstudis' => $kelompokstudis ,
            'no' => 1);

        return view('kelompokstudi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('nama' => 'nama');
        return view('kelompokstudi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        kelompokstudi::create([
            'nama' => request('nama'),
            'email' => request('email'),

        ]);
        Alert::success('Congrats', 'Data Berhasil Ditambahkan');
        return redirect('/kelompokstudi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KelompokStudi  $kelompokStudi
     * @return \Illuminate\Http\Response
     */
    public function show(KelompokStudi $kelompokStudi)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KelompokStudi  $kelompokStudi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelompokStudi=KelompokStudi::find($id);

        return view('kelompokstudi.edit',compact('kelompokStudi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KelompokStudi  $kelompokStudi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);

        DB::table('kelompok_studis')->where('id', $id)
        ->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);
        Alert::success('Congrats', 'Data Berhasil Diubah');
        return redirect('/kelompokstudi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KelompokStudi  $kelompokStudi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kelompok_studis')->where('id', $id)->delete();
        Alert::success('Congrats', 'Data Berhasil Dihapus');
        return redirect()-> route('kelompokstudi.index');
    }
}
