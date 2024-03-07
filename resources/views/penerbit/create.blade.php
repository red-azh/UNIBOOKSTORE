@extends('master.temp')
@section('konten')
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Basic Form</h6>
        <form action="{{route('penerbit.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Kode</label>
                        <input type="text" name="kode" class="form-control">
                    </div>
                    @error('kode')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    @error('nama')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>
                    @error('alamat')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Kota</label>
                        <input type="text" name="kota" class="form-control">
                    </div>
                    @error('kota')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Telepon</label>
                        <input type="text" name="telp" class="form-control">
                    </div>
                    @error('telp')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection