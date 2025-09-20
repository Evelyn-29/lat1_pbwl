<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Tampilkan semua data mahasiswa
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Form input mahasiswa baru
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Simpan data mahasiswa baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm'     => 'required|unique:mahasiswa,npm|max:10',
            'nama'    => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'tahun'   => 'required|integer|min:2000|max:2099',
            'email'   => 'required|email|unique:mahasiswa,email',
            'telepon' => 'required|string|max:15',
            'alamat'  => 'required|string|max:255',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Form edit data mahasiswa
     */
    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update data mahasiswa
     */
    public function update(Request $request, $npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);

        $validated = $request->validate([
            'nama'    => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'tahun'   => 'required|integer|min:2000|max:2099',
            'email'   => 'required|email|unique:mahasiswa,email,' . $npm . ',npm',
            'telepon' => 'required|string|max:15',
            'alamat'  => 'required|string|max:255',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Soft delete (hapus sementara) data mahasiswa
     */
    public function destroy($npm)
    {
        $mahasiswa = Mahasiswa::findOrFail($npm);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus (soft delete)!');
    }

    /**
     * Tampilkan data yang sudah dihapus (trash)
     */
    public function trash()
    {
        $mahasiswa = Mahasiswa::onlyTrashed()->get();
        return view('mahasiswa.trash', compact('mahasiswa'));
    }

    /**
     * Restore data dari trash
     */
    public function restore($npm)
    {
        $mahasiswa = Mahasiswa::withTrashed()->findOrFail($npm);
        $mahasiswa->restore();

        return redirect()->route('mahasiswa.trash')->with('success', 'Data berhasil direstore!');
    }
}
