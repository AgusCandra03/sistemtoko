@extends('layouts.dashboard')
@section('header', 'Inventaris product')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
    img {
        width: 100px;
    }
</style>
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <a href="{{ url('product/create') }}" class="btn btn-sm btn-primary pull-right">Tambah Product</a>
              </div>
              <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>{{ session('success') }}</h5>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <form action="{{ url('product') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="search" class="form-control" placeholder="Cari Product" name="search" value="{{request('search')}}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Foto Product</th>
                            <th>Nama Product</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($product as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}.</td>
                            <td><img src="{{ asset('storage/img/'.$data->image) }}" alt="{{ $data->image }}"></td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->price_buy }}</td>
                            <td>{{ $data->price_sell }}</td>
                            <td>{{ $data->stock }}</td>
                            <td class="text-center">
                                <form action="{{ url('product', ['id'=>$data->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ url('product/'.$data->id.'/edit') }}" class="btn btn-info btn-sm">Edit</a>
                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Yakin ingin menghapus data ini ?')">                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                  <div class="d-flex justify-content-end mt-4">
                    {{ $product->links() }}
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endsection