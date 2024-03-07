@extends('master.temp')
@section('konten')
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Edit Data Penerbit</h6>
        <form action="{{route('penerbit.update', $data->id)}}" method="post">
            @method( 'PUT' )
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Kode</label>
                        <input type="text" value="{{$data->kode}}" name="kode" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" value="{{$data->nama}}" name="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" value="{{$data->alamat}}" name="alamat" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Kota</label>
                        <input type="text" value="{{$data->kota}}" name="kota" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="text" value="{{$data->telepon}}" name="telp" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
