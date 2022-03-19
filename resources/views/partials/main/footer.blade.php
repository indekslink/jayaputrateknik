<footer class="site-footer pb-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-around">
                    <div class="col-lg-4 col-md-5">
                        <h2 class="footer-heading mb-4">Quick Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/products">Products</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <h2 class="footer-heading mb-4">Follow Us</h2>
                        @foreach(\App\Models\Sosmed::latest()->get() as $sm)
                        <a href="{{$sm->url}}" target="_blank" class="pl-0 pr-3"><span class="{{$sm->icon}}"></span></a>
                        @endforeach
                        <!-- <a href="/#" class="pl-0 pr-3"><span class="icon-facebook"></span></a> -->
                        <!-- <a href="/#" class="pl-3 pr-3"><span class="icon-twitter"></span></a> -->
                        <!-- <a href="/#" class="pl-3 pr-3"><span class="icon-instagram"></span></a> -->
                        <!-- <a href="/#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a> -->
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-white" type="button" id="button-addon2">Send</button>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <div class="border-top pt-5">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Jaya Putra Teknik
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </div>
</footer>