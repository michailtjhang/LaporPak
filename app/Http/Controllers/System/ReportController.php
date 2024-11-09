<?php

namespace App\Http\Controllers\System;

use App\Models\Aduan;
use App\Models\Bukti;
use Illuminate\Http\Request;
use App\Models\KategoriAduan;
use App\Models\PermissionRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['aduans'] = Aduan::where('id_pengguna', Auth::user()->id)->get();
        $countFinished = Aduan::where('id_pengguna', Auth::user()->id)->where('status_aduan', '1')->count();
        $countPending = Aduan::where('id_pengguna', Auth::user()->id)->where('status_aduan', '0')->count();
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
            'lokasi_kejadian' => 'required',
            'deskripsi_pengaduan' => 'required|string',
            'files' => 'required|array|max:5', // Memastikan file dalam bentuk array
            'files.*' => 'file|mimes:jpeg,jpg,png|max:5120' // Validasi tiap file
        ]);

        try {
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

            // Create the Aduan record first
            Aduan::create([
                'id_aduan' => $id_aduan,
                'id_pengguna' => Auth::user()->id,
                'kategori_aduan' => $request->kategori_aduan,
                'prioritas_aduan' => $request->prioritas_aduan,
                'lokasi_kejadian' => $request->lokasi_kejadian,
                'deskripsi_pengaduan' => $request->deskripsi_pengaduan,
                'tanggal_pengaduan' => date('Y-m-d'),
                'status_aduan' => 0,
            ]);

            // Upload each file to Cloudinary and create Bukti records
            foreach ($request->file('files') as $file) {
                $originalPath = $file->getRealPath();

                // Upload to Cloudinary
                $cloudinaryResponse = cloudinary()->upload($originalPath, [
                    'folder' => 'files',
                    'use_filename' => true,
                    'unique_filename' => true,
                ]);

                // Get Cloudinary URL and public ID
                $cloudinaryUrl = $cloudinaryResponse->getSecurePath();
                $publicId = $cloudinaryResponse->getPublicId();

                // Save the Cloudinary URL in Bukti
                Bukti::create([
                    'id_aduan' => $id_aduan,
                    'url_file' => $cloudinaryUrl, // Store the Cloudinary URL
                    'id_file' => $publicId, // Store the Cloudinary public ID
                ]);
            }

            return redirect('tickets')->with('success', 'Laporan Aduan Berhasil');
        } catch (\Throwable $th) {
            return redirect('tickets')->with('error', 'Laporan Aduan Gagal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['aduan'] = Aduan::where('id_aduan', $id)
            ->where('id_pengguna', Auth::user()->id)
            ->with('kategori')
            ->first();

        $data['PermissionEdit'] = PermissionRole::getPermission('Edit Aduan', Auth::user()->role_id);
        $data['status'] = Aduan::where('id_aduan', $id)->value('status_aduan');

        $images = Bukti::where('id_aduan', $id)->get();

        return view('system.reports.show', [
            'title' => 'Detail Laporan Aduan ' . $data['aduan']->id_aduan,
            'data' => $data,
            'images' => $images
        ]);
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
        $request->validate([
            'status' => 'required'
        ]);

        $aduan = Aduan::findOrFail($id);
        $aduan->update([
            'status_aduan' => $request->status
        ]);

        return redirect('tickets')->with('success', 'Status Aduan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
