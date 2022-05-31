@extends("layouts.main")

@section('title','Galleries')

@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">Galleries</h1>
                <p class="breadcrumb-custom">
                    <a href="/" class="text-blue">Home</a>
                    <span class="mx-2">&gt;</span>
                    <span>Galleries</span>
                </p>

            </div>
        </div>
    </div>
</div>


<div class="container py-5">
    @foreach($galleries as $tgl => $items)

    <div class="text-left pb-1 border-primary mb-2">
        <h4 class="text-blue">{{date('d-M-Y') == $tgl ? 'Latest Uploads' : $tgl}}</h4>
    </div>

    <div class="row  grid-products mb-5">
        @foreach($items as $gallery)
        <div class="p-2 col-lg-3 col-md-4 col-6 ">
            <a class="shadow" href="/images/uploads/gallery/{{$gallery->item}}" data-fancybox="{{$tgl}}">
                @if(explode('.',$gallery->item)[1] == 'mp4')
                <video controls class="img-fluid img-thumbnail">
                    <source src="/images/uploads/gallery/{{$gallery->item}}">
                    </source>
                </video>
                @else
                <img class="img-fluid" loading="lazy" src="/images/uploads/gallery/{{$gallery->item}}" alt="Gallery">
                @endif
            </a>
        </div>

        @endforeach
    </div>


    @endforeach

</div>
@endsection
@section("script")
<!-- fancybox -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
@endsection
@section('style')
<!-- Fancybox -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<style>
    .grid-products a {
        text-decoration: none;
        display: block;
        color: black;
        overflow: hidden;
        border-radius: 10px;
        height: 25vh;
    }


    .grid-products video,
    .grid-products img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover;
    }
</style>
@endsection