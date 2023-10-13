@extends('layouts.dashboard')
@section('header', 'Edit Product')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
    img {
        width: 200px;
    }
</style>
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Form edit product</h3>
    </div>
    <form action="{{ url('product/'.$product->id) }} " method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('put') }}

      <div class="card-body">
        <div class="form-group">
            <div>
                <img src="{{ asset('storage/img/'.$product->image) }}" alt="">
            </div>
            <label>Foto product</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Name product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga Beli</label>
            <input type="text" class="form-control @error('price_buy') is-invalid @enderror" name="price_buy" value="{{ $product->price_buy }}" required>

            @error('price_buy')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga Jual</label>
            <input type="text" class="form-control @error('price_sell') is-invalid @enderror" name="price_sell" value="{{ $product->price_sell }}" required>

            @error('price_sell')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ $product->stock }}" required>

            @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan data</button>
      </div>
    </form>
  </div>
@endsection