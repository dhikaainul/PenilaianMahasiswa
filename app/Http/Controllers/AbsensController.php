<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
// use App\Guru;
use App\MataPelajaran;
// use App\Siswa;
// use Auth;

class AbsensController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function id() {
    //     $id = str_replace('@mail.com', '', Auth::user()->email);
    //     return $id;
    // }

    // public function absen()
    // {
    //     $siswa = Siswa::where('nis', '=', $this->id())->first();
    //     $absens = Absensi::where('id_siswa', '=', $siswa->id)->get();
    //     return view('siswa.absensi', ['absens' => $absens]);
    // }
    
    public function absen()
    {
        $absensi = Absensi::all();
        return view('siswa.absensi', ['absensi' => $absensi]);
    }

    // public function absen()
    // {
    //     $absensi = Absensi::where('id', '=', $this->id())->first();
    //     $mapel = MataPelajaran::where('id', '=', $mapel->id)->get();
    //     return view('siswa.absensi', ['mapel' => $mapel, 'absensi' => $absensi]);
    // }

    public function absen2()
    {
        $absensi = Absensi::all();
        return view('guru.absensi', ['absensi' => $absensi]);
    }
//     public function index()
//  {
//  $article = Article::all();
//  return view('manage',['article' => $article]);
//  }
    public function addabsen(){ 
        $mapel = MataPelajaran::all();
        return view('siswa.createAbsensi', ['mapel' => $mapel]);
	}
    public function addAbsensi(Request $request) {   
        Absensi::create([ 
			'datetime' => $request->datetime, 
			'status' => $request->status,
            'id_mapel' => $request->mapel,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas
        ]); 
        return redirect('siswa/absensi');      
	}
    public function edit($id)
    {
        $absensi = Absensi::find($id);
        $mapel = MataPelajaran::all();
        return view('guru.editAbsensi', ['mapel' => $mapel, 'absensi' => $absensi]);
    }

    public function update(Request $request, $id)
    {
        $absensi = Absensi::find($id);
        $absensi->datetime = $request->datetime;
        $absensi->status = $request->status;
        $absensi->id_mapel = $request->mapel;
        $absensi->nama_siswa = $request->nama_siswa;
        $absensi->kelas = $request->kelas;
        $absensi->save();
        return redirect('guru/absensi2');
    }

    public function destroy($id)
    {
        $absensi = Absensi::find($id);
        $absensi->delete();
        return redirect('guru/absensi2');
    } 
}
