@extends('master.temp')
@section('konten')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Halaman index Buku</h6>
        <div class="table-responsive">
            <a href="{{ route('buku.create') }}">
                <button class="btn btn-primary">Tambah data</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($data as $buku)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $buku->kode }}</td>
                        <td>{{ $buku->kategori }}</td>
                        <td>{{ $buku->nama_buku }}</td>
                        <td>{{ $buku->harga }}</td>
                        <td>{{ $buku->stok }}</td>
                        <td>{{ $buku->pnb->nama }}</td>
                        <td class="d-flex">
                            <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-info me-2">Edit</a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
