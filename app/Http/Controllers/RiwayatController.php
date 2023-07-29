<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RiwayatController extends Controller
{
    public function showRiwayat(Request $request) {
        $riwayat = Riwayat::withUserId($request->input('user')->id)
                   ->orderByCreationTime('desc')
                   ->paginate(10);
        
        return view('riwayat', [
            "title" => "Riwayat",
            "user" => $request->input('user'),
            "data" => $riwayat
        ]);
    }
}
