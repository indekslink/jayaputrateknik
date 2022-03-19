@extends('layouts.admin')
@section('title','Detail Product')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Product</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{route('admin')}}">Home</a></div>
            <div class="breadcrumb-item "><a href="{{route('products.index')}}">Products</a></div>

            <div class="breadcrumb-item">Detail Product</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-5">
                <div class="card card-primary border shadow overflow-hidden" style="border-radius: 10px;">
                    <img src="/images/uploads/{{$product->image}}" alt="image" class="img-fluid">
                    <div class="card-body p-2 h6">
                        <div class="item d-flex py-3 justify-content-between align-items-center">
                            <strong class="mr-5">Name</strong>
                            <span class="text-right">{{$product->name}}</span>
                        </div>
                        <div class="item d-flex py-3 justify-content-between align-items-center">
                            <strong class="mr-5">Total Item</strong>
                            <span class="text-right">{{$product->items->count()}}</span>
                        </div>
                        <div class="item d-flex py-3 justify-content-between align-items-center">
                            <strong class="mr-5">Created At</strong>
                            <span class="text-right">{{\Carbon\Carbon::parse($product->created_at)->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @if($product->items->count()> 0)
            <div class="col-lg-8 col-md-7">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Detail Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="my-grid">
                            @foreach($product->items as $items)
                            <a target="_blank" class="overflow-hidden shadow" href="/images/uploads/{{$items->image}}"><img src="/images/uploads/{{$items->image}}" alt="image"></a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection

@section('style')
<style>
    .my-grid {
        columns: 2;
        column-gap: 1rem;
    }

    .my-grid a {
        display: inline-block;
        width: 100%;
        margin-bottom: 1rem;
        border-radius: 10px;

    }

    .my-grid img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection