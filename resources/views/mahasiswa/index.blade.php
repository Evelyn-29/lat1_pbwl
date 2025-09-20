<h1>Daftar Mahasiswa</h1>

<a href="{{ route('mahasiswa.create') }}">Tambah Data</a> |
<a href="{{ route('mahasiswa.trash') }}">Lihat Trash</a>

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
            <a href="{{ route('mahasiswa.edit',$m->npm) }}">Edit</a> |
            <form action="{{ route('mahasiswa.destroy',$m->npm) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>