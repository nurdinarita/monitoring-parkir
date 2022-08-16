<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class ProsesController extends Controller
{
    public function proses(Request $request)
    {
        if($request->status == "masuk")
        {
            $mahasiswa = Mahasiswa::where('uid', $request->uid)->first();
            $dosen = Dosen::where('uid', $request->uid)->first();

            if($mahasiswa)
            {
                History::create([
                    'uid' => $request->uid,
                    'nama' => $mahasiswa->nama,
                    'status' => 'Mahasiswa',
                    'kondisi' => 1
                ]);
                return $mahasiswa;
            }
            else if($dosen)
            {
                History::create([
                    'uid' => $request->uid,
                    'nama' => $dosen->nama,
                    'status' => 'Dosen',
                    'kondisi' => 1
                ]);
                return $dosen;
            }
        }
        if($request->status == "keluar")
        {
            $mahasiswa = Mahasiswa::where('uid', $request->uid)->first();
            $dosen = Dosen::where('uid', $request->uid)->first();

            if($mahasiswa)
            {
                History::create([
                    'uid' => $request->uid,
                    'nama' => $mahasiswa->nama,
                    'status' => 'Mahasiswa',
                    'kondisi' => 2
                ]);
                return $mahasiswa;
            }
            else if($dosen)
            {
                History::create([
                    'uid' => $request->uid,
                    'nama' => $dosen->nama,
                    'status' => 'Dosen',
                    'kondisi' => 2
                ]);
                return $dosen;
            }
        }
    }
}
