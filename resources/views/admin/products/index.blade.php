@extends('layouts.admin')
@section('title','Products')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Products</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>

            <div class="breadcrumb-item">Products</div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            {{session('success')}}
        </div>
    </div>

    @endif
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <a href="{{route('products.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">

                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Hero Image</th>
                                <th>Nama</th>
                                <th>Items</th>
                                <th class="text-center">Action</th>
                            </tr>
                            @forelse($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="/images/uploads/{{$product->image}}" class="img-thumbnail" width="50" height="50" alt=""></td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->items->count()}} Gambar</td>
                                <td class="text-center">
                                    <a href="{{route('products.show',$product->slug)}}" class="btn btn-sm mx-1 btn-info">Detail</a>
                                    <a href="{{route('products.edit',$product->slug)}}" class="btn btn-sm mx-1 btn-warning">Edit</a>
                                    <form action="{{route('products.destroy',$product->slug)}}" method="post" onclick="showConfirm(this,event,'<h4>Hapus Data Product</h4> <h3><strong>{{$product->name}}</strong></h3> <div><small>Item dari produk tersebut akan ikut terhapus!</small></div>')" class="mx-1 d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Masih Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="card-footer text-right">
                <nav class="d-inline-block">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div> -->
        </div>
    </div>
</section>
@endsection