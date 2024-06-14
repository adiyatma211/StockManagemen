<?php

namespace App\Http\Controllers\Merek;

use App\Http\Controllers\Controller;
use App\Models\TipeMerek;
use App\Models\Merek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showTipeMerek = TipeMerek::all();
        return view('dashboard.merek.c_merek',[
            'showTipeMerek' => $showTipeMerek
        ]);
    }

    public function editMerek($id)
    {

        $showMerek = Merek::find($id);
        $showTipeMerek = TipeMerek::all();
        return view('dashboard.merek.e_merek',[
            'showTipeMerek' => $showTipeMerek,
            'showMerek' => $showMerek
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function editindex()
    {
        $showMerek = TipeMerek::all();
        return view('dashboard.tipemerek.c_tipemerek');
    }

/**
     * Display a listing of the resource.
     */
    public function edittipe($id)
    {
        $tipeMerek = TipeMerek::find($id);


        return view('dashboard.tipemerek.e_tipemerek',([
            'tipeMerek' => $tipeMerek
        ]));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // dd("Test");
        // Validasi data yang diterima dari formulir
        // Jika ada file logo yang diunggah, simpan gambar baru
        // if ($request->hasFile('gambarimage')) {
        //     $image = $request->file('gambarimage');
        //     $imageName = time().'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $imageName);
        // }

        // // Buat objek baru dari model Merek
        // $merek = new Merek();

        // // Set properti merek
        // $merek->nama = $request['nama'];
        // $merek->gambarimage = $imageName; // Simpan nama gambar yang dihasilkan
        // $merek->tipe_id = $request['tipe_id'];
        // // dd($merek);
        // $merek->save();

        if ($request->hasFile('gambarimage')) {
            $image = $request->file('gambarimage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        // Buat objek baru dari model Merek
        $merek = new Merek();

        // Set properti merek
        $merek->nama = $request['nama'];
        $merek->gambarimage = $imageName; // Simpan nama gambar yang dihasilkan

        // Ambil tipe-tipe yang dipilih dari form
        $selectedTipes = $request->input('tipe_id');

        // Gabungkan tipe-tipe menjadi satu string yang dipisahkan koma
        $tipeIdsString = implode(',', $selectedTipes);

        // Set tipe_id pada objek merek
        $merek->tipe_id = $tipeIdsString;

        // Simpan merek ke database

        // dd($merek);
        $merek->save();


        // Redirect atau tindakan lainnya setelah pembuatan berhasil
        return redirect()->route('merek');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        TipeMerek::create([
            'nama_tipe' => $request->nama_tipe,
            'ukuran' => $request->ukuran,
            'stok' => $request->stok,
        ]);

        // dd($show);
        return redirect()->route('tipemerek')->withSuccess('Tipe Merek Berhasil Disimpan!');

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
    public function editItem(Request $request, $id)
    {

        // Mengambil data tipe merek yang akan diupdate
        $validatedData = $request->validate([
            'nama_tipe' => 'required',
            'ukuran' => 'required',
            'stok' => 'required',
        ]);

        // Mengambil data tipe merek yang akan diupdate
        $tipeMerek = TipeMerek::find($id);

        // Memeriksa apakah data ditemukan
        if (!$tipeMerek) {
            // Jika tidak ditemukan, redirect atau tampilkan pesan error
            return redirect()->route('tipemerek')->withErrors('Tipe Merek tidak ditemukan!');
        }

        // Mengupdate data tipe merek dengan data baru dari request
        $tipeMerek->nama_tipe = $request->nama_tipe;
        $tipeMerek->ukuran = $request->ukuran;
        $tipeMerek->stok = $request->stok;
        $tipeMerek->save();

        // Redirect ke halaman tipe merek dengan pesan sukses
        return redirect()->route('tipemerek')->withSuccess('Tipe Merek Berhasil Diupdate!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // dd('test');
        // Temukan entitas Merek yang ingin diupdate
        $merek = Merek::findOrFail($id);
        if ($request->hasFile('gambarimage')) {
            $image = $request->file('gambarimage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Hapus gambar lama jika ada
            if ($merek->gambarimage) {
                unlink(public_path('images').'/'.$merek->gambarimage);
            }

            // Set properti gambar baru
            $merek->gambarimage = $imageName;
        }

// Update gambar jika ada file gambar yang diunggah
        $merek->nama = $request->input('nama');

// Ambil tipe-tipe yang dipilih dari form
        $selectedTipes = $request->input('tipe_id');
// Set properti nama
        // Gabungkan tipe-tipe menjadi satu string yang dipisahkan koma
        $tipeIdsString = implode(',', $selectedTipes);

        // Set tipe_id pada objek merek
        $merek->tipe_id = $tipeIdsString;
// Simpan perubahan merek ke database
        $merek->save();

        // dd($merek);
         // Redirect ke halaman yang sesuai setelah update berhasil
        return redirect()->route('merek')->with('success', 'Merek berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipeMerek = TipeMerek::find($id);

    // Periksa apakah data ditemukan
    if (!$tipeMerek) {
        // Jika tidak ditemukan, lakukan tindakan yang sesuai
        // Misalnya, redirect ke halaman yang sesuai atau tampilkan pesan error
        return redirect()->back()->withErrors('Data tidak ditemukan');
    }

    // Hapus data tipe merek
    $tipeMerek->delete();

    // Redirect ke halaman tertentu dengan pesan sukses
    return redirect()->route('tipemerek')->withSuccess('Tipe Merek berhasil dihapus');

    }

    public function destroyMerek($id)
    {
        $Merek = Merek::find($id);

    // Periksa apakah data ditemukan
    if (!$Merek) {
        // Jika tidak ditemukan, lakukan tindakan yang sesuai
        // Misalnya, redirect ke halaman yang sesuai atau tampilkan pesan error
        return redirect()->back()->withErrors('Data tidak ditemukan');
    }

    // Hapus data tipe merek
    $Merek->delete();

    // Redirect ke halaman tertentu dengan pesan sukses
    return redirect()->route('merek')->withSuccess('Tipe Merek berhasil dihapus');

    }
}
