@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-900 text-white p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Mahasiswa</h1>
        <div class="space-x-2">
            <a href="{{ route('mahasiswa.create') }}" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded text-white font-medium">Tambah</a>
            <a href="{{ route('mahasiswa.trash') }}" class="bg-yellow-600 hover:bg-yellow-500 px-4 py-2 rounded text-white font-medium">Lihat Trash</a>
        </div>
    </div>

    @if(session('success'))
    <div class="bg-green-600 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm border border-gray-700">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">NPM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Tahun</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Telepon</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($mahasiswa as $m)
                <tr>
                    <td class="px-4 py-2">
                        @if($m->foto)
                        <img src="{{ asset('storage/' . $m->foto) }}" class="w-16 rounded">
                        @else
                        <img src="{{ asset('images/default-avatar.png') }}" class="w-16 rounded">
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $m->npm }}</td>
                    <td class="px-4 py-2">{{ $m->nama }}</td>
                    <td class="px-4 py-2">{{ $m->jurusan }}</td>
                    <td class="px-4 py-2">{{ $m->tahun }}</td>
                    <td class="px-4 py-2">{{ $m->email }}</td>
                    <td class="px-4 py-2">{{ $m->telepon }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('mahasiswa.edit', $m->npm) }}" class="bg-blue-600 hover:bg-blue-500 px-2 py-1 rounded text-white">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $m->npm) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" onclick="return confirm('Hapus data?')" class="bg-red-600 hover:bg-red-500 px-2 py-1 rounded text-white">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection