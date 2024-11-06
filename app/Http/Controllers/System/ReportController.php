<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Aduan;
use App\Models\Bukti;
use App\Models\KategoriAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['aduans'] = Aduan::where('id_pengguna', Auth::user()->id)->get();
        $countFinished = Aduan::where('status_aduan', '1')->count();
        $countPending = Aduan::where('status_aduan', '0')->count();
        return view('system.reports.index', [
            'title' => 'Laporan Aduan',
            'data' => $data,
            'countFinished' => $countFinished,
            'countPending' => $countPending
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriAduan::get();
        return view('system.reports.create', [
            'title' => 'Form Laporan Aduan Baru',
            'kategoris' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Request()->validate([
            'kategori_aduan' => 'required',
            'prioritas_aduan' => 'required',
            'tautan_konten' => 'required',
            'deskripsi_pengaduan' => 'required|string',
            'file' => 'required|mimes:jpg,png,jpeg,pdf|max:5000'
        ]);

        try {
            $file = $request->file('file');
            $fileName = date('YmdHis') . time() . '.' . $file->getClientOriginalExtension();
            // $file->move(public_path('files'), $fileName);

            $aduan = Aduan::latest()->first();
            $kodeUser = "AD";
    
            if ($aduan == null) {
                $id_aduan = $kodeUser . "001";
            } else {
                $id_aduan = $aduan->id_aduan;
                $urutan = (int) substr($id_aduan, 3, 3);
                $urutan++;
                $id_aduan = $kodeUser . sprintf("%03s", $urutan);
            }

            Aduan::create([
                'id_aduan' => $id_aduan,
                'id_pengguna' => Auth::user()->id,
                'kategori_aduan' => $request->kategori_aduan,
                'prioritas_aduan' => $request->prioritas_aduan,
                'tautan_konten' => $request->tautan_konten,
                'deskripsi_pengaduan' => $request->deskripsi_pengaduan,
                'tanggal_pengaduan' => date('Y-m-d'),
                'status_aduan' => 0,
            ]);

            Bukti::create([
                'id_aduan' => $id_aduan,
                'jenis_bukti' => $file->getClientOriginalExtension(),
                'lokasi_file' => $fileName
            ]);

            return redirect()->intended('tickets')->with('success', 'Laporan Aduan Berhasil');
        } catch (\Throwable $th) {
            return redirect()->intended('tickets')->with('error', 'Laporan Aduan Gagal');
        }
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
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
