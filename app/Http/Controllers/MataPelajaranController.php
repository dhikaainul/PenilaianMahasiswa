<?php

namespace App\Http\Controllers;

use App\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MataPelajaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request, $next) {
            if(Gate::allows('administrator')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses');
        });   
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = MataPelajaran::all();
        return view('admin.matapelajaran.index', ['mapel' => $mapel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.matapelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MataPelajaran::create([
            'nama_mapel' => $request->nama_mapel,
            'jam' => $request->jam,
        ]);
        return redirect('mapel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = MataPelajaran::find($id);
        return view('admin.matapelajaran.edit', ['mapel' => $mapel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mapel = MataPelajaran::find($id);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->jam = $request->jam;
        $mapel->save();
        return redirect('mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MataKuliah  $mataKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = MataPelajaran::find($id);
        $mapel->delete();
        return redirect('mapel');
    }
}
