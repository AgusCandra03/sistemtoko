@extends('layouts.dashboard')
@section('header', 'Tambah Product')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form Tambah Product</h3>
    </div>
    <form action="{{ url('product') }} " method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label>Foto Product</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" required="">

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Name Product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required="">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga Beli</label>
            <input type="number" class="form-control @error('price_buy') is-invalid @enderror" name="price_buy" value="{{ old('price_buy') }}" required="">

            @error('price_buy')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga Jual</label>
            <input type="number" class="form-control @error('price_sell') is-invalid @enderror" name="price_sell" value="{{ old('price_sell') }}" required="">

            @error('price_sell')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required="">

            @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tambah data</button>
      </div>
    </form>
  </div>
@endsection