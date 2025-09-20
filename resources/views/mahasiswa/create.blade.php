<h1>Tambah Mahasiswa</h1>

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('mahasiswa.store') }}">
    @csrf
    <input type="text" name="npm" placeholder="NPM" value="{{ old('npm') }}"><br>
    <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}"><br>
    <input type="text" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}"><br>
    <input type="number" name="tahun" placeholder="Tahun" value="{{ old('tahun') }}"><br>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
    <input type="text" name="telepon" placeholder="Telepon" value="{{ old('telepon') }}"><br>
    <textarea name="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea><br>
    <button type="submit">Simpan</button>
</form>