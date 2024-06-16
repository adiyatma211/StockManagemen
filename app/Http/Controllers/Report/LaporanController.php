<?php

namespace App\Http\Controllers\Report;

use App\Models\TipeMerek;
use App\Models\ReportHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ShowReport = Auth::user();
        $ShowTipeMerek = TipeMerek::all();
        return view('dashboard.reports.c_laporan',[
            'ShowReport' => $ShowReport,
            'ShowTipeMerek' => $ShowTipeMerek
        ]);
    }

     /**
     * Display a listing of the resource.
     */
    public function editlaporan($id)
    {
        $showLaporan = ReportHarian::find($id);
        $ShowTipeMerek = TipeMerek::all();
        return view('dashboard.reports.e_laporan',
    [
        'showLaporan' => $showLaporan,
        'ShowTipeMerek' => $ShowTipeMerek
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $request->validate([
        //     'tipemerek_id' => 'required|exists:tipe_mereks,id',
        //     'stok_awal' => 'required|numeric', // Pastikan validasi stok_awal disesuaikan
        //     'stok_masuk' => 'required|numeric',
        //     'stok_keluar' => 'required|numeric',
        //     'tanggal_hari' => 'required|date_format:d-m-Y',
        // ]);


        $tipeMerek = TipeMerek::findOrFail($request->tipemerek_id);
        $stok_awal = $tipeMerek->stok;
        $stok_masuk = $request->stok_masuk;
        $stok_keluar = $request->stok_keluar;
        $stok_total = $stok_awal + $stok_masuk - $stok_keluar;

        // Update stok menggunakan metode update() dari Eloquent
        $tipeMerek->update([
            'stok' => $stok_total
        ]);

        // dd($updateResult); // Periksa nilai $updateResult untuk memastikan apakah update berhasil



        ReportHarian::create([
            'user_id' => Auth::user()->id,
            'tipemerek_id' => $request->tipemerek_id,
            'stok_awal' => $stok_awal,
            'stok_masuk' => $stok_masuk,
            'stok_keluar' => $stok_keluar,
            'stok_total' => $stok_total,
            'tanggal_hari' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal_hari),
        ]);
        // dd($dd);

        return redirect()->route('laporan')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $reportHarian = ReportHarian::findOrFail($id);

        // Ambil TipeMerek berdasarkan tipemerek_id
        $tipeMerek = TipeMerek::findOrFail($request->tipemerek_id);

        // Hitung stok_awal, stok_masuk, stok_keluar, dan stok_total
        $stok_awal = $tipeMerek->stok;
        $stok_masuk = $request->stok_masuk;
        $stok_keluar = $request->stok_keluar;
        $stok_total = $request->stok_total;

        // Update stok pada TipeMerek
        $tipeMerek->update([
            'stok' => $stok_total
        ]);

        // Update data ReportHarian
        $reportHarian->update([
            'user_id' => Auth::user()->id,
            'tipemerek_id' => $request->tipemerek_id,
            'stok_awal' => $stok_awal,
            'stok_masuk' => $stok_masuk,
            'stok_keluar' => $stok_keluar,
            'stok_total' => $stok_total,
            'tanggal_hari' => $request->tanggal_hari,

        ]);
        return redirect()->route('laporan')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Laporan = ReportHarian::find($id);

        // Periksa apakah data ditemukan
        if (!$Laporan) {
            // Jika tidak ditemukan, lakukan tindakan yang sesuai
            // Misalnya, redirect ke halaman yang sesuai atau tampilkan pesan error
            return redirect()->back()->withErrors('Data tidak ditemukan');
        }

        // Hapus data tipe merek
        $Laporan->delete();

        // Redirect ke halaman tertentu dengan pesan sukses
        return redirect()->route('laporan')->withSuccess('Tipe Merek berhasil dihapus');
    }
}
