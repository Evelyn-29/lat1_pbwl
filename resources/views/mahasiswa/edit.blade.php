<h1>Edit Mahasiswa</h1>

@if ($errors->any())
<div style="color: red;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('mahasiswa.update',$mahasiswa->npm) }}">
    @csrf @method('PUT')
    <input type="text" name="npm" value="{{ $mahasiswa->npm }}" readonly><br>
    <input type="text" name="nama" value="{{ $mahasiswa->nama }}"><br>
    <input type="text" name="jurusan" value="{{ $mahasiswa->jurusan }}"><br>
    <input type="number" name="tahun" value="{{ $mahasiswa->tahun }}"><br>
    <input type="email" name="email" value="{{ $mahasiswa->email }}"><br>
    <input type="text" name="telepon" value="{{ $mahasiswa->telepon }}"><br>
    <textarea name="alamat">{{ $mahasiswa->alamat }}</textarea><br>
    <button type="submit">Update</button>
</form>