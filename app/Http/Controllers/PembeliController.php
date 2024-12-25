<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Property;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    public function index()
    {
        $pembelis = Pembeli::all();
        return view('data_transaksi.index', compact('pembelis'));
    }

    public function create($property_id)
    {
        $property = Property::findOrFail($property_id); // Load property by ID
        return view('transaksi.index', [
            'property_id' => $property->id,
            'title' => $property->title,
            'tipe' => $property->tipe,
            'harga' => $property->harga
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_kartu' => 'required|string|max:20',
            'alamat_penagih' => 'required|string',
            'title' => 'required|string|max:255',
            'harga' => 'required',
            'property_id' => 'required|exists:properties,id',
        ]);
    
        try {
            Pembeli::create($request->all());
            return redirect()->route('user.index')->with('success', 'Transaksi berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    

    public function destroy($id)
    {
        try {
            $pembeli = Pembeli::findOrFail($id);

            if ($pembeli->foto && file_exists(public_path('upload/foto/' . $pembeli->foto))) {
                unlink(public_path('upload/pembeli/' . $pembeli->foto));
            }

            $pembeli->delete();

            return redirect()->route('data_transaksi.index')->with('success', 'Data pembeli berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('data_transaksi.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
