<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Lowongan;
use App\Models\Rekrutmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RekrutmenController extends Controller
{
    public function lowonganIndex()
    {
        $lowongan = Lowongan::all();
        return view('rekrutmen.lowongan.index', compact('lowongan'));
    }

    public function lowonganCreate()
    {
        $jabatan = Jabatan::all();
        return view('rekrutmen.lowongan.create', compact('jabatan'));
    }

    public function lowonganStore(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
            'deskripsi' => 'required',
        ]);

        try {
            Lowongan::create($request->all());
            return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dibuat');
        } catch (\Exception $e) {
            Log::error('Error creating lowongan: ' . $e->getMessage());
            return redirect()->route('lowongan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function lowonganEdit($id)
    {
        $lowongan = Lowongan::find($id);
        $jabatan = Jabatan::all();
        return view('rekrutmen.lowongan.edit', compact('lowongan', 'jabatan'));
    }

    public function lowonganUpdate(Request $request, $id)
    {
        $request->validate([
            'jabatan' => 'required',
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

        try {
            Lowongan::find($id)->update($request->all());
            return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diupdate');
        } catch (\Exception $e) {
            Log::error('Error updating lowongan: ' . $e->getMessage());
            return redirect()->route('lowongan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function lowonganDestroy($id)
    {
        try {
            Lowongan::destroy($id);
            return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Error deleting lowongan: ' . $e->getMessage());
            return redirect()->route('lowongan.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
