@extends('layouts.main')

@section('title','Home')


@section('style')
<style>
    .owl-carousel .owl-stage {
        display: flex;
    }

    .owl-carousel .owl-stage .owl-item>div,
    .owl-carousel .owl-stage .owl-item a,
    .owl-carousel .owl-stage .owl-item img {
        height: 100%;
    }
</style>
@endsection


@section("content")
<div class="site-blocks-cover overlay" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                <h1 class="text-white font-weight-light mb-5 text-uppercase font-weight-bold">{{$slogan}}</h1>
                <p><a href="/about" class="btn btn-primary py-3 px-5 text-black" style="border-radius: 15px;">Jaya Putra Teknik</a></p>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container">
    <div class="row align-items-center no-gutters align-items-stretch overlap-section" style="z-index: 0;">
        <div class="col-md-4">
            <div class="feature-1 pricing h-100 text-center">
                <div class="icon">
                    <span class="icon-dollar text-black"></span>
                </div>
                <h2 class="my-4 heading text-black">Jaya Putra Teknik</h2>
                <h2 class="my-4 heading text-black">Best Prices</h2>
                <p class="text-black">send goods the price is definitely more economical.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="free-quote bg-dark h-100">
                <h2 class="my-4 heading  text-center text-black">Get Free Quote</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="fq_name">Name</label>
                        <input type="text" class="form-control btn-block" id="fq_name" name="fq_name" placeholder="Enter Name">
                    </div>
                    <div class="form-group mb-4">
                        <label for="fq_email">Email</label>
                        <input type="text" class="form-control btn-block" id="fq_email" name="fq_email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary text-black py-2 px-4 btn-block" value="Get Quote">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-1 pricing h-100 text-center">
                <div class="icon">
                    <span class="icon-phone text-black"></span>
                </div>
                <h2 class="my-4 heading text-black">Jaya Putra Teknik</h2>
                <h2 class="my-4 heading text-black">24/7 Support</h2>
                <p class="text-black">very fast service response up to 24 hours.</p>
            </div>
        </div>
    </div>
</div> -->

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="mb-0 text-blue">What We Offer</h2>
                <p class="color-black-opacity-5">Jaya Putra Teknik.</p>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class=" text-blue flaticon-sea-ship-with-containers"></span></div>
                    <div>
                        <h3>Kemudi Kapal</h3>
                        <p>Bergerak di jasa pengadaan sistem kemudi hidrolik pada kapal.</p>
                        <p class="mb-0"><a href="/" class="text-blue">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class=" text-blue flaticon-sea-ship-with-containers"></span></div>
                    <div>
                        <h3>Kemudi Hidrolik</h3>
                        <p>Sistemkemudi hidrolik (Hydraulic steering gear) dan winch hidrolik untuk jangkar dan ramdoor, Baik pemasangan kapal baru ataupun perbaikan</p>
                        <p class="mb-0"><a href="/#" class="text-blue">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class=" text-blue flaticon-sea-ship-with-containers"></span></div>
                    <div>
                        <h3>Perlengkapan Hidrolik dan Elektrikal</h3>
                        <p>Kami juga menyediakan stok kebutuhan perlengkapan hidrolik dan elektrikal pada kapal. Seperti powerpack, hidrolik cilinder, hidrolik motor, helm pump, powersteering, steering whel, macam-macam valve, Rudder angle indicator, RPM indicator, power supply, dll.</p>
                        <p class="mb-0"><a href="/#" class="text-blue">Learn More</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="site-section block-13">
    <div class="owl-carousel  nonloop-block-13">



        @foreach($products as $product)
        <div class="h-100">
            <a href="{{route('main.products.show',$product->slug)}}" class="unit-1 text-center h-100">
                <img src="/images/uploads/{{$product->image}}" alt="Image" class="img-fluid h-100">
                <div class="unit-1-text">
                    <h3 class="unit-1-heading">{{$product->name}}</h3>
                    <!-- <p class="px-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos tempore ullam minus voluptate libero.</p> -->
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>


<div class="site-section bg-light mt-5">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center border-primary">
                <h2 class="font-weight-light  text-blue">More Services</h2>
                <p class="color-black-opacity-5">Jaya Putra Teknik</p>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class=" text-blue flaticon-barn"></span></div>
                    <div>
                        <h3>Warehousing</h3>
                        <p>warehousing companies that produce goods to be sent directly to customers, while logistics companies are shipping service companies that use warehousing to temporarily store customer shipments..</p>
                        <p><a href="/#" class="text-blue">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class=" text-blue flaticon-platform"></span></div>
                    <div>
                        <h3>Storage</h3>
                        <p>Temporary storage of goods before they are used. In general, the material is put into the storage area after the stuffing process is complete.</p>
                        <p><a href="/#" class="text-blue">Learn More</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="unit-4 d-flex">
                    <div class="unit-4-icon mr-4"><span class=" text-blue flaticon-car"></span></div>
                    <div>
                        <h3>Delivery Van</h3>
                        <p>Time Delivery. The advantages of implementing the milkrun system are transportation cost efficiency, shortening lead time from ordering to delivery, reducing truck & driver control and reducing unnecessary stock.</p>
                        <p><a href="/#" class="text-blue">Learn More</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="site-blocks-cover overlay inner-page-cover video-play-area bg_cover" style="background-image: url(images/6.png); background-attachment: fixed;">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">

            <div class="col-md-7 video-play-item" data-aos="fade-up" data-aos-delay="400">
                <a href="/" class="play-single-big mb-4 video-popup"><span class="icon-play"></span></a>
                <h2 class="text-white font-weight-light mb-5 h1">View Our Services By Watching This Short Video</h2>

            </div>
        </div>
    </div>
</div>


@endsection