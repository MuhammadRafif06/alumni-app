<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswas;
use App\Models\jenis_kelamin;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menambahkan page awal
        $siswas = Siswas::paginate(10);

        $genders = jenis_kelamin::get();

        return view('siswa', compact ('siswas', 'genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
        'id_jenkel' => 'required|integer',
        'nama' => 'required|max:255',
        'tgl_lahir' => 'required|date',
        'nik' => 'required|min:10|max:12',
        'jurusan' => 'required|max:3',
        'angkatan' => 'required|digits:2',
        'alamat' => 'required|string|max:255'
        ],
        [
            'nama.required' => 'woy diisi bosss !',
            'nik.required' => 'woy diisi bosss !',
            'jurusan.required' => 'woy diisi bosss !',
            'angkatan.required' => 'woy diisi bosss !',
            'tgl_lahir.required' => 'woy diisi bosss !',
            'alamat.required' => 'woy diisi bosss !',
        ]
    );
        ///metode eloquent
        $siswas = new Siswas();
        $siswas->id_jenkel = $request->id_jenkel;
        $siswas->nama = $request->nama;
        $siswas->tgl_lahir = $request->tgl_lahir;
        $siswas->nik = $request->nik;
        $siswas->jurusan = $request->jurusan;
        $siswas->angkatan = $request->angkatan;
        $siswas->alamat = $request->alamat;
        $siswas->save();


        if ($siswas) {
            return redirect('/siswa')->with(['berhasil' => 'berhasil create data']);
        } else {
            return redirect('/siswa')->with(['gagal' => 'ada masalah a']);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswas::find($id);
        $siswa->delete();
        
        if ($siswa) {
            return redirect('/siswa')->with(['berhasil' => 'berhasil delete data']);
        } else {
            return redirect('/siswa')->with(['gagal' => 'ada masalah a']);
        }
    }
}
