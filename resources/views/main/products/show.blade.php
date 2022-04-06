@extends("layouts.main")

@section('title',$product->name)

@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(/images/uploads/{{$product->image}});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">{{$product->name}}</h1>
                <p class="breadcrumb-custom">
                    <a href="/" class="text-blue">Home</a>
                    <span class="mx-2">&gt;</span>
                    <a href="/products" class="text-blue">Products</a>
                    <span class="mx-2">&gt;</span>
                    <span>{{$product->name}}</span>
                </p>

            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    <div class="row grid-items">
        @forelse($product->items as $items)
        <div class="col-lg-3 p-3 col-md-4 col-6">



            @if(explode('.',$items->image)[1] == 'mp4')


            <a target="_blank" class=" shadow item-card d-block" href="/images/uploads/{{$items->image}}"><video class="w-100 h-100" controls>
                    <source src="/images/uploads/{{$items->image}}" type="video/mp4">
                </video></a>
            @else

            <a data-lightbox="example-set" target="_blank" class=" shadow item-card d-block" href="/images/uploads/{{$items->image}}"><img src="/images/uploads/{{$items->image}}" alt="image"></a>
            @endif

        </div>
        @empty
        <div class="col-12">

            <h4 class="text-center">Item dari product <strong>{{$product->name}}</strong> belum diisi oleh Admin</h4>
        </div>
        @endforelse
    </div>
</div>
@endsection

@section('style')
<style>
    .grid-items {
        align-items: stretch;
    }

    .grid-items a {
        height: 100%;
    }

    .grid-items a img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .item-card {
        border-radius: 10px;
        overflow: hidden;
    }
</style>
@endsection