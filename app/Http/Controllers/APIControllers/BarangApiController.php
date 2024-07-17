<?php

namespace App\Http\Controllers\APIControllers;
use App\Models\Merek;
use App\Models\TipeMerek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class BarangApiController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Show Merek dan Detail merek
    |--------------------------------------------------------------------------
    */
    public function barang()
    {
        try {
            $ShowBarang = Merek::all();
            $result = $ShowBarang->map(function($merek) {
                $tipeIds = explode(',', $merek->tipe_id);
                $tipeMereks = TipeMerek::whereIn('id', $tipeIds)->get();

                $tipeDetails = $tipeMereks->map(function($tipeMerek) {
                    return [
                        'tipe_id' => $tipeMerek->id,
                        'nama_tipe' => $tipeMerek->nama_tipe,
                        'ukuran' => $tipeMerek->ukuran,
                        'stok' => $tipeMerek->stok,
                    ];
                });
                return [
                    'id' => $merek->id,
                    'nama' => $merek->nama,
                    'gambarimage' => $merek->gambarimage,
                    'tipe_details' => $tipeDetails,
                ];
            });
            $totalResults = count($result);
            return response()->json([
                'statusCode' => '1',
                'Responses' => 'Sukses Data Berhasil di Tampilkan',
                'totalResults' => $totalResults,
                'Results' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '0',
                'Responses' => 'Gagal',
                'totalResults' => 0,
                'Results' => $e->getMessage()
            ]);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Show Detail merek Berdasarkan ID
    |--------------------------------------------------------------------------
    */
    public function barangDetail($id)
    {
        try {
            $ShowBarang = Merek::find($id);

            if (!$ShowBarang) {
                return response()->json([
                    'statusCode' => '0',
                    'Responses' => 'Data tidak ditemukan',
                    'totalResults' => 0,
                    'Results' => null
                ], 404);
            }

            $tipeIds = explode(',', $ShowBarang->tipe_id);
            $tipeMereks = TipeMerek::whereIn('id', $tipeIds)->get();

            $tipeDetails = $tipeMereks->map(function($tipeMerek) {
                return [
                    'tipe_id' => $tipeMerek->id,
                    'nama_tipe' => $tipeMerek->nama_tipe,
                    'ukuran' => $tipeMerek->ukuran,
                    'stok' => $tipeMerek->stok,
                ];
            });

            $totalResults = $tipeDetails->count();

            return response()->json([
                'statusCode' => '1',
                'Responses' => 'Sukses Data Berhasil di Tampilkan',
                'totalResults' => $totalResults,
                'Results' => [
                    'id' => $ShowBarang->id,
                    'nama' => $ShowBarang->nama,
                    'gambarimage' => $ShowBarang->gambarimage,
                    'tipe_details' => $tipeDetails
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => '0',
                'Responses' => 'Gagal',
                'totalResults' => 0,
                'Results' => $e->getMessage()
            ], 500);
        }
    }
}
