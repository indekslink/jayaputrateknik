@extends("layouts.main")

@section('title','Products')

@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">OUR PRODUCT</h1>
                <p class="breadcrumb-custom">
                    <a href="/" class="text-blue">Home</a>
                    <span class="mx-2">&gt;</span>
                    <span>Our Product</span>
                </p>

            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <div class="row  grid-products">
        @foreach($products as $product)
        <div class="col-lg-3 py-3 col-md-4 col-sm-6">
            <a href="{{route('main.products.show',$product->slug)}}">

                <div class="card shadow">
                    <div class="parent-image">
                        <img src="/images/uploads/{{$product->image}}" alt="image">
                    </div>
                    <div class="card-body text-center">
                        <h6>{{$product->name}}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('style')

<style>
    .grid-products a {
        text-decoration: none;
        display: block;
        color: black;
    }

    .grid-products .card {
        border-radius: 10px;
        overflow: hidden;
    }

    .grid-products .parent-image {
        height: 35vh;

    }

    .grid-products .parent-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection