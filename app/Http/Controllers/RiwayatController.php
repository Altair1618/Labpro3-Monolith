<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RiwayatController extends Controller
{
    public function showRiwayat(Request $request) {
        $riwayat = Riwayat::where('id_user', $request->input('user')->id)
                  ->orderBy('created_at', 'desc')
                  ->paginate(10);
        
        return view('riwayat', [
            "title" => "Riwayat",
            "user" => $request->input('user'),
            "data" => $riwayat
        ]);
    }
}
