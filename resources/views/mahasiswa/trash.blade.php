<h1>Data Mahasiswa Terhapus</h1>

<a href="{{ route('mahasiswa.index') }}">Kembali ke Daftar</a>

@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>NPM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Tahun</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    @foreach($mahasiswa as $m)
    <tr>
        <td>{{ $m->npm }}</td>
        <td>{{ $m->nama }}</td>
        <td>{{ $m->jurusan }}</td>
        <td>{{ $m->tahun }}</td>
        <td>{{ $m->email }}</td>
        <td>{{ $m->telepon }}</td>
        <td>{{ $m->alamat }}</td>
        <td>
            <a href="{{ route('mahasiswa.restore',$m->npm) }}">Restore</a>
        </td>
    </tr>
    @endforeach
</table>