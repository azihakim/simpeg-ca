<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AbsensiController extends Controller
{

    public function index()
    {
        $data = Absensi::all();
        return view('absensi.index', compact('data'));
    }

    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'absen' => 'required|string',
            'photo' => 'required|string',
            'location' => 'required|string',
        ]);

        // Decode the base64 image data
        $imageData = $validated['photo'];
        $image = str_replace('data:image/png;base64,', '', $imageData);
        $image = str_replace(' ', '+', $image);
        $imageName = uniqid() . '.png'; // Generate a unique filename
        $path = 'absensi/' . $imageName; // Define the path where the image will be stored

        // Save the image to storage
        Storage::disk('public')->put($path, base64_decode($image));

        // Store the attendance record
        $absensi = new Absensi();
        $absensi->keterangan = $validated['absen'];
        $absensi->foto = $imageName; // Store the path of the photo in the database
        $absensi->lokasi = $validated['location'];
        $absensi->id_karyawan = auth()->user()->id;

        $absensi->save();

        return response()->json(['success' => true, 'message' => 'Absensi berhasil disimpan.']);
    }
}
