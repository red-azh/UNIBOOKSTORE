@extends('master.temp')
@section('konten')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Data Buku</p>
                    <h6 class="mb-0">{{$data =
                        DB::table('buku')->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Data Penerbit</p>
                    <h6 class="mb-0">{{$penerbit =
                        DB::table('penerbit')->count()}}</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Today Revenue</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Revenue</p>
                    <h6 class="mb-0">$1234</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    
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
            </tr>
        </thead>
        <tbody>
            @php $no = 1;
            @endphp
            @foreach ($buku as $buku)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $buku->kode }}</td>
                <td>{{ $buku->kategori }}</td>
                <td>{{ $buku->nama_buku }}</td>
                <td>{{ $buku->harga }}</td>
                <td>{{ $buku->stok }}</td>
                <td>{{ $buku->pnb->nama }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
