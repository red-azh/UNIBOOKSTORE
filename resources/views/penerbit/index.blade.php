@extends('master.temp')
@section('konten')
<div class="col-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Halaman index penerbit</h6>
        <div class="table-responsive">
            <a href="{{route('penerbit.create')}}">
                <button class="btn btn-primary">Tambah data</button>
            </a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Telepon</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $pn)


                <tbody>
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$pn->kode}}</td>
                        <td>{{$pn->nama}}</td>
                        <td>{{$pn->alamat}}</td>
                        <td>{{$pn->kota}}</td>
                        <td>{{$pn->telepon}}</td>
                        <td class="d-flex">
                            <a href="{{route('penerbit.edit', $pn->id)}}"><button
                                    class="btn btn-info me-2">edit</button></a>
                            <form action="{{ route('penerbit.destroy', $pn->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection