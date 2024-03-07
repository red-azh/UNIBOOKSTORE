@extends('master.temp')
@section('konten')
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Basic Form</h6>
        <form action="{{route('buku.store')}}" method="post">
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
                        <label for="" class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>
                    @error('kategori')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Buku</label>
                        <input type="text" name="nb" class="form-control">
                    </div>
                    @error('nb')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control">
                    </div>
                    @error('harga')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Stok</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    @error('stok')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="" class="form-label">Penerbit</label>
                        <select class="form-select mb-3" name="penerbit">
                            <option selected hidden></option>
                            @foreach ($penerbit as $item)
                            <option value="{{$item->id}}">{{$item['nama']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('penerbit')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
