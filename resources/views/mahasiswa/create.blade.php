@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-black">Tambah Mahasiswa</h1>

        <a href="{{ route('mahasiswa.index') }}" class="inline-block mb-4 bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white font-medium">
            ← Kembali
        </a>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('mahasiswa.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="npm" class="block mb-1 font-medium text-black">NPM</label>
                <input type="text" name="npm" id="npm" value="{{ old('npm') }}" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label for="nama" class="block mb-1 font-medium text-black">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label for="jurusan" class="block mb-1 font-medium text-black">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label for="tahun" class="block mb-1 font-medium text-black">Tahun</label>
                <input type="number" name="tahun" id="tahun" value="{{ old('tahun') }}" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium text-black">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label for="telepon" class="block mb-1 font-medium text-black">Telepon</label>
                <input type="text" name="telepon" id="telepon" value="{{ old('telepon') }}" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full p-2 bg-gray-100 text-black border border-gray-400 rounded focus:ring focus:ring-blue-400">{{ old('alamat') }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium text-black">Foto (jpg/png)</label>
                <input type="file" name="foto" class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-500">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection