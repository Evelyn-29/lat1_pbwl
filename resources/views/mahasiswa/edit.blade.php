@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-black">Edit Data Mahasiswa</h1>

        <a href="{{ route('mahasiswa.index') }}" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-white font-medium inline-block mb-4">
            ← Kembali
        </a>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('mahasiswa.update', $mahasiswa->npm) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 text-black">NPM</label>
                <input type="text" name="npm" value="{{ $mahasiswa->npm }}" class="w-full p-2 text-black bg-gray-100 rounded" readonly>
            </div>

            <div>
                <label class="block mb-1 text-black">Nama</label>
                <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="w-full p-2 text-black bg-gray-100 rounded">
            </div>

            <div>
                <label class="block mb-1 text-black">Jurusan</label>
                <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}" class="w-full p-2 text-black bg-gray-100 rounded">
            </div>

            <div>
                <label class="block mb-1 text-black">Tahun</label>
                <input type="number" name="tahun" value="{{ $mahasiswa->tahun }}" class="w-full p-2 text-black bg-gray-100 rounded">
            </div>

            <div>
                <label class="block mb-1 text-black">Email</label>
                <input type="email" name="email" value="{{ $mahasiswa->email }}" class="w-full p-2 text-black bg-gray-100 rounded">
            </div>

            <div>
                <label class="block mb-1 text-black">Telepon</label>
                <input type="text" name="telepon" value="{{ $mahasiswa->telepon }}" class="w-full p-2 text-black bg-gray-100 rounded">
            </div>

            <div>
                <label class="block mb-1 text-black">Alamat</label>
                <textarea name="alamat" class="w-full p-2 text-black bg-gray-100 rounded">{{ $mahasiswa->alamat }}</textarea>
            </div>

            <div>
                <label class="block mb-1 text-black">Foto</label>
                @if($mahasiswa->foto)
                <img src="{{ $mahasiswa->foto_url }}" alt="Foto Mahasiswa" class="w-24 h-24 mb-2 rounded">
                @endif
                <input type="file" name="foto" class="w-full p-2 text-black bg-gray-100 rounded">
            </div>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-500 text-black font-bold py-2 px-4 rounded">
                Update
            </button>
        </form>
    </div>
</div>
@endsection