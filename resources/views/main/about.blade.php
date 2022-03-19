@extends("layouts.main")

@section('title','About')

@section('content')
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">ABOUT US</h1>
                <p class="breadcrumb-custom">
                    <a href="index.html" class="text-blue">Home</a>
                    <span class="mx-2">&gt;</span>
                    <span>About Us</span>
                </p>
                <p>
                    <a onclick="learnmore()" class="btn btn-primary py-3 px-5 text-black" style="border-radius: 15px">Learn More</a>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="site-section section-scroll" data-link="#about">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-5 ml-auto mb-5 order-md-2 text-center aos-init aos-animate" data-aos="fade">
                <img src="logo2.png" alt="" style="width: 70vmin">
            </div>
            <div class="col-md-6 order-md-1 aos-init aos-animate" data-aos="fade">
                <div class="text-left pb-1 border-primary mb-4">
                    <h2 class="text-blue">Our History</h2>
                </div>
                <h4 class="text-blue">Visi</h4>
                <p>
                    {{$profile->visi}}
                </p>
                <h4 class="text-blue">Misi</h4>
                <div>
                    {!! $profile->misi !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection