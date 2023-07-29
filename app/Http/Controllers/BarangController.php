<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BarangController extends Controller
{
    
    public function showCatalog(Request $request)
    {
        $baseAPIUrl = env('BARANG_API_URL', 'http://localhost:5000');
        $endpoint = '/barang';

        try {
            if ($request->has('q')) {
                $param = [
                    'q' => $request->input('q')
                ];

                $response = Http::get($baseAPIUrl . $endpoint, $param);
            } else {
                $response = Http::get($baseAPIUrl . $endpoint);
            }
        } catch (\Throwable $th) {
            return view('katalog', [
                "title" => "Katalog",
                "user" => $request->input('user'),
                "data" => []
            ]);
        }

        if ($response->successful()) {
            $data = $response->json()['data'];

            usort($data, function ($a, $b) {
                return strcmp($a['nama'], $b['nama']);
            });

            return view('katalog', [
                "title" => "Katalog",
                "user" => $request->input('user'),
                "data" => $this->paginateArray($data, 10)
            ]);
        } else {
            return view('katalog', [
                "title" => "Katalog",
                "user" => $request->input('user'),
                "data" => []
            ]);
        }
    }

    public function showBarangDetail(Request $request, $id)
    {
        $baseAPIUrl = env('BARANG_API_URL', 'http://localhost:5000');
        $endpoint = '/barang/' . $id;

        try {
            $response = Http::get($baseAPIUrl . $endpoint);
        } catch (\Throwable $th) {
            abort(500);
        }

        if ($response->successful()) {
            $data = $response->json()['data'];

            return view('barang-detail', [
                "title" => "Katalog",
                "user" => $request->input('user'),
                "data" => $data
            ]);
        } else {
            abort(500);
        }
    }

    public function showBarangBuyPage(Request $request, $id)
    {
        $baseAPIUrl = env('BARANG_API_URL', 'http://localhost:5000');
        $endpoint = '/barang/' . $id;

        try {
            $response = Http::get($baseAPIUrl . $endpoint);
        } catch (\Throwable $th) {
            abort(500);
        }

        if ($response->successful()) {
            $data = $response->json()['data'];

            return view('barang-buy', [
                "title" => "Katalog",
                "user" => $request->input('user'),
                "data" => $data
            ]);
        } else {
            abort(500);
        }
    }

    public function buyBarang(Request $request, $id) {
        $baseAPIUrl = env('BARANG_API_URL', 'http://localhost:5000');
        $endpoint = '/buy/' . $id;

        try {
            $response = Http::post($baseAPIUrl . $endpoint, [
                'jumlah' => $request->input('jumlah')
            ]);
        } catch (\Throwable $th) {
            abort(500);
        }

        $responseData = $response->json()['data'];
        
        Riwayat::create([
            'id_user' => $request->input('user')['id'],
            'nama' => $responseData['nama'],
            'harga' => $responseData['harga'],
            'jumlah' => $request->input('jumlah'),
            'kode' => $responseData['kode'],
        ]);

        if ($response->successful()) {
            return redirect()->route('history', ['id' => $id]);
        } else {
            abort(500);
        }
    }

    private function paginateArray($data, $perPage)
    {
        $currentPage = request()->get('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $paginatedData = array_slice($data, $offset, $perPage);

        $paginatedPosts = new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedData,
            count($data),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return $paginatedPosts;
    }
}
