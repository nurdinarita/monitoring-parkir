<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function masuk()
    {
        $masuk = History::where('kondisi', 1)->orderBy('id', 'desc')->get();
        return view('admin.history.masuk')->with([
            'active' => 'History',
            'masuk' => $masuk
        ]);
    }

    public function keluar()
    {
        $keluar = History::where('kondisi', 2)->orderBy('id', 'desc')->get();
        return view('admin.history.keluar')->with([
            'active' => 'History',
            'keluar' => $keluar
        ]);
    }

}
