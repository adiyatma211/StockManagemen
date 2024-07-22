<?php
namespace App\Http\Controllers\APIControllers;
use App\Models\Merek;
use App\Models\TipeMerek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PaymentApiController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Paymen Pembayaran 
    |--------------------------------------------------------------------------
    */
    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=>'required',
            'tipe_id' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'statusCode' => '0',
                'Responses' => 'Gagal',
                'totalResults' => 0,
                'Results' => $validator->errors()
            ]);
        }
        try {
            $payment = new Payment();
            $payment->user_id = $request->user_id;
            $payment->tipe_id = $request->tipe_id;
            $payment->jumlah = $request->jumlah;
            $payment->total_harga = $request->total_harga;
            $payment->status = $request->status;
            $payment->save();

            return response()->json([
                'statusCode' => '1',
                'Responses' => 'Sukses Data Berhasil di Tambahkan',
                'totalResults' => 1,
                'Results' => $payment
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
    | Tampil Invoice
    |--------------------------------------------------------------------------
    */
    public function invoice(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'statusCode' => '0',
                    'Responses' => 'Validasi Gagal',
                    'totalResults' => 0,
                    'Results' => $validator->errors()
                ], 422);
            }
        
            $userId = $request->user_id;
        
            // Ambil semua payment (invoice) untuk user tertentu
            $showInvoice = Payment::where('user_id', $userId)
                ->with('items.tipeMerek') // Load relasi jika diperlukan
                ->get();
        
            $totalResults = $showInvoice->count();
        
            if ($totalResults == 0) {
                return response()->json([
                    'statusCode' => '1',
                    'Responses' => 'Tidak ada invoice untuk user ini',
                    'totalResults' => 0,
                    'Results' => []
                ]);
            }
        
            return response()->json([
                'statusCode' => '1',
                'Responses' => 'Sukses Data Berhasil di Tampilkan',
                'totalResults' => $totalResults,
                'Results' => $showInvoice
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
