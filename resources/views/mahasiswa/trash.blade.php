@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 text-white p-6">
    <h1 class="text-2xl font-bold mb-6">Data Mahasiswa Terhapus</h1>

    <a href="{{ route('mahasiswa.index') }}" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white font-medium">← Kembali</a>

    @if(session('success'))
    <div class="bg-green-600 text-white p-3 rounded my-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto mt-4">
        <table class="w-full text-sm border border-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2">NPM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Tahun</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Telepon</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($mahasiswa as $m)
                <tr>
                    <td class="px-4 py-2">{{ $m->npm }}</td>
                    <td class="px-4 py-2">{{ $m->nama }}</td>
                    <td class="px-4 py-2">{{ $m->jurusan }}</td>
                    <td class="px-4 py-2">{{ $m->tahun }}</td>
                    <td class="px-4 py-2">{{ $m->email }}</td>
                    <td class="px-4 py-2">{{ $m->telepon }}</td>
                    <td class="px-4 py-2">{{ $m->alamat }}</td>
                    <td class="px-4 py-2 flex gap-2">
                        {{-- Tombol Restore --}}
                        <form action="{{ route('mahasiswa.restore', $m->npm) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-yellow-600 hover:bg-yellow-500 px-2 py-1 rounded text-white">
                                Restore
                            </button>
                        </form>

                        {{-- Tombol Hapus Permanen --}}
                        <form action="{{ route('mahasiswa.forceDelete', $m->npm) }}" method="POST" onsubmit="return confirm('Yakin mau hapus permanen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-500 px-2 py-1 rounded text-white">
                                Hapus Permanen
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection