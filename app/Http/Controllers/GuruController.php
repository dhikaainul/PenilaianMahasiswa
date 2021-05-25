<?php

namespace App\Http\Controllers;

use App\Guru;
use App\MataPelajaran;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru.index', ['guru' => $guru]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('admin.guru.create', ['mapel' => $mapel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Guru::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_mapel' => $request->mapel
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->nip . '@mail.com',
            'password' => Hash::make($request->nip),
            'roles' => 'Guru'
        ]);

        return redirect('guru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
     
    public function show($nip)
    {
        $guru = Guru::where('nip', '=', $nip)->first();
        return view('guru.biodata', ['guru' => $guru]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        $mapel = MataPelajaran::all();
        return view('admin.guru.edit', ['guru' => $guru, 'mapel' => $mapel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->alamat = $request->alamat;
        $guru->no_telp = $request->no_telp;
        $guru->id_mapel = $request->mapel;
        $guru->save();
        return redirect('guru');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::find($id);
        $guru->delete();
        return redirect('guru');
    }

    /**
     * Custom function for Dosen
     */

    public function editBiodata($id) 
    {
        $guru = Guru::find($id);
        return view('guru.editBiodata', ['guru' => $guru]);
    }

    public function updateBiodata(Request $request, $id) 
    {
        $guru = Guru::find($id);
        $guru->nama = $request->nama;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->alamat = $request->alamat;
        $guru->no_telp = $request->no_telp;
        $guru->save();

        if ($request->file('photo') != null) {
            $user = User::find(Auth::user()->id);
            if($user->photo && file_exists(storage_path('app/public/' . $user->photo))) {
                \Storage::delete('public/'.$user->photo);
            }
            $image_name = $request->file('photo')->store('images', 'public');
            $user->photo = $image_name;
            $user->save();
        }

        return redirect('guru/biodata/' . $guru->nip);
    }
}
