<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // Ambil semua data laptop yang dijual
        $propertys = Property::all();
        return view('admin.index', compact('propertys'));
    }

    public function item()
    {   
        $propertys = Property::all();        
        return view('user.index', compact('propertys'));
    }
    

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipe' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'luas_tanah' => 'required|string|max:100',
            'luas_bangunan' => 'required|string|max:50',
            'desc1' => 'required|string|max:50',
            'desc2' => 'required',
            'harga' => 'required',
            'foto' => 'nullable|image|max:10000',
        ]);

        try {
            $data = $request->all();

            // Proses upload file foto jika ada
            if ($request->hasFile('foto')) {
                $fileName = time() . '_' . $request->foto->getClientOriginalName();
                $request->foto->move(public_path('upload/foto'), $fileName);
                $data['foto'] = $fileName;
            }

            Property::create($data); // Simpan data laptop

            return redirect()->route('admin.index')->with('success', 'Data laptop berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->route('admin.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // Ambil data laptop berdasarkan ID
        $property = Property::findOrFail($id);
        return view('admin.edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipe' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'luas_tanah' => 'required|string|max:100',
            'luas_bangunan' => 'required|string|max:50',
            'desc1' => 'required|string|max:50',
            'desc2' => 'required',
            'harga' => 'required',
            'foto' => 'nullable|image|max:10000',
        ]);

        try {
            $property = Property::findOrFail($id);
            $data = $request->all();

            // Ganti file foto jika ada file baru
            if ($request->hasFile('foto')) {
                if ($property->foto && file_exists(public_path('upload/foto/' . $property->foto))) {
                    unlink(public_path('upload/foto/' . $property->foto));
                }

                $fileName = time() . '_' . $request->foto->getClientOriginalName();
                $request->foto->move(public_path('upload/foto'), $fileName);
                $data['foto'] = $fileName;
            }

            $property->update($data); // Update data laptop

            return redirect()->route('admin.index')->with('success', 'Data laptop berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $property = Property::findOrFail($id);

            // Hapus file foto jika ada
            if ($property->foto && file_exists(public_path('upload/foto/' . $property->foto))) {
                unlink(public_path('upload/foto/' . $property->foto));
            }

            $property->delete();

            return redirect()->route('admin.index')->with('success', 'Data laptop berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
