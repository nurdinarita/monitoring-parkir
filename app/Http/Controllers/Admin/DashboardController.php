<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\History;

class DashboardController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all()->count();
        $mahasiswa = Mahasiswa::all()->count();
        $users = $dosen + $mahasiswa;

        $riwayat_masuk = History::where('kondisi', 1)->count();
        $riwayat_keluar = History::where('kondisi', 2)->count();

        return view('admin.dashboard.index', compact('users', 'riwayat_masuk', 'riwayat_keluar'));
    }
}
