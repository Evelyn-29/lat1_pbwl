<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

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
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_mahasiswa', 'public');
        }

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit($npm)
    {
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $npm)
    {
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();

        $validated = $request->validate([
            'nama'    => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'tahun'   => 'required|integer|min:2000|max:2099',
            'email'   => 'required|email|unique:mahasiswa,email,' . $mahasiswa->npm . ',npm',
            'telepon' => 'required|string|max:15',
            'alamat'  => 'required|string|max:255',
            'foto'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($mahasiswa->foto) {
                Storage::disk('public')->delete($mahasiswa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_mahasiswa', 'public');
        }

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($npm)
    {
        $mahasiswa = Mahasiswa::where('npm', $npm)->firstOrFail();
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus (soft delete)!');
    }

    public function trash()
    {
        $mahasiswa = Mahasiswa::onlyTrashed()->get();
        return view('mahasiswa.trash', compact('mahasiswa'));
    }

    public function restore($npm)
    {
        $mahasiswa = Mahasiswa::withTrashed()->where('npm', $npm)->firstOrFail();
        $mahasiswa->restore();

        return redirect()->route('mahasiswa.trash')->with('success', 'Data berhasil direstore!');
    }

    public function forceDelete($npm)
    {
        $mahasiswa = Mahasiswa::withTrashed()->where('npm', $npm)->firstOrFail();

        if ($mahasiswa->foto) {
            Storage::disk('public')->delete($mahasiswa->foto);
        }

        $mahasiswa->forceDelete();

        return redirect()->route('mahasiswa.trash')->with('success', 'Data dihapus permanen!');
    }
}
