<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = Request()->q;
        $jurusan = Jurusan::paginate(20);
        if ($q) {
        $jurusan = Jurusan::where('nama_jurusan','like','%'.$q)->orWhere('kode_jurusan','like','%'.$q.'%')->paginate(20);
        }
        return view('dashboard.jurusan.index', compact('jurusan','q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jurusan.create');
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
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
        ], [
            'nama_jurusan.required' => 'Wajib Diisi',
            'kode_jurusan.required' => 'Wajib Diisi',
        ]);

        Jurusan::create($request->except('_token'));
        alert()->success("info",'Jurusan berhasil di Tambahkan');

        return redirect('/admin/jurusan')->with('pesan', "Jurusan Berhasil Di Tambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('dashboard.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
        ], [
            'nama_jurusan.required' => 'Wajib Diisi',
            'kode_jurusan.required' => 'Wajib Diisi',
        ]);

        $jurusan->update($request->except('_token'));
        alert()->success("info",'Jurusan berhasil di ubah');
        return redirect('/admin/jurusan')->with('pesan', "Jurusan Berhasil Di Perbarui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $jurusan->delete();
        alert()->success("info",'Jurusan berhasil di hapus');

        return redirect('/admin/jurusan')->with('pesan', "Jurusan Berhasil Di Hapus");
    }
}
