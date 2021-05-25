<?php

namespace App\Http\Controllers;

use App\Penilaian;
use App\Guru;
use App\Siswa;
use App\MataPelajaran;
use Auth;
use Illuminate\Http\Request;
use DB;
use PDF;

class PenilaianController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function id() {
        $id = str_replace('@mail.com', '', Auth::user()->email);
        return $id;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexGuru()
    {
        $guru = Guru::where('nip', '=', $this->id())->first();
        $penilaian = Penilaian::where('id_mapel', '=', $guru->id_mapel)->get();
        return view('guru.penilaian', ['guru' => $guru, 'penilaian' => $penilaian]);
    }

    public function indexSiswa()
    {
        $siswa = Siswa::where('nis', '=', $this->id())->first();
        $penilaian = Penilaian::where('id_siswa', '=', $siswa->id)->get();
        return view('siswa.nilai', ['penilaian' => $penilaian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_mapel)
    {
        $siswa = Siswa::all();
        return view('guru.createPenilaian', ['siswa' => $siswa, 'id_mapel' => $id_mapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilaiSetara = $this->nilaiSetara($request->nilai);
        $nilaiHuruf = $this->nilaiHuruf($nilaiSetara);
        Penilaian::create([
            'id_siswa' => $request->siswa,
            'id_mapel' => $request->id_mapel,
            'nilai' => $request->nilai,
            'nilai_setara' => $nilaiSetara,
            'nilai_huruf' => $nilaiHuruf
        ]);
        return redirect('penilaian/penilaian/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show(Penilaian $penilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penilaian = Penilaian::find($id);
        $siswa = Siswa::all();
        return view('guru.editPenilaian', ['penilaian' => $penilaian, 'siswa' => $siswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nilaiSetara = $this->nilaiSetara($request->nilai);
        $nilaiHuruf = $this->nilaiHuruf($nilaiSetara);

        $penilaian = Penilaian::find($id);
        $penilaian->id_siswa = $request->siswa;
        $penilaian->nilai = $request->nilai;
        $penilaian->nilai_setara = $nilaiSetara;
        $penilaian->nilai_huruf = $nilaiHuruf;
        $penilaian->save();
        
        return redirect('penilaian/penilaian/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::find($id);
        $penilaian->delete();
        return redirect('penilaian/penilaian/');
    }

    /**
     * Custom function for Penilaian
     */

    public function nilaiSetara($nilai) {
        if ($nilai > 80 && $nilai <= 100) {
            return 4;
        } else if ($nilai > 73 && $nilai <= 80) {
            return 3.5;
        } else if ($nilai > 65 && $nilai <= 73) {
            return 3;
        } else if ($nilai > 60 && $nilai <= 65) {
            return 2.5;
        } else if ($nilai > 50 && $nilai <= 60) {
            return 2;
        } else if ($nilai > 39 && $nilai <= 50) {
            return 1;
        } else {
            return 0;
        }
    }

    public function nilaiHuruf($nilaiSetara) {
        if ($nilaiSetara == 4)
            return 'A';
        else if ($nilaiSetara == 3.5)
            return 'B+';
        else if ($nilaiSetara == 3)
            return 'B';
        else if ($nilaiSetara == 2.5)
            return 'C+';
        else if ($nilaiSetara == 2)
            return 'C';
        else if ($nilaiSetara == 1)
            return 'D';
        else
            return 'E';
    }

    public function rapot() {
        $siswa = Siswa::where('nis', '=', $this->id())->first();
        $penilaian = Penilaian::where('id_siswa', '=', $siswa->id)->get();
        $pdf = PDF::loadview('siswa.rapot', ['siswa' => $siswa, 'penilaian' => $penilaian]);
        return $pdf->stream();

    }
}
