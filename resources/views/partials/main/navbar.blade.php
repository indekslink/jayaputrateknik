<div class="site-wrap">
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar py-3" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-11 col-xl-2">
                    <img src="/logo2.png" alt="" style="width: 20vmin" />
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li class="{{request()->is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
                            <li class="{{request()->is('about') ? 'active' : ''}}"><a href="/about">About Us</a></li>
                            <li class="{{request()->is('products') || request()->is('products/*') ? 'active' : ''}}">
                                <a href="/products">Product</a>
                            </li>
                            <!-- <li><a href="/">Blog</a></li> -->
                            <li class="{{request()->is('contact-us') ? 'active' : ''}}"><a href="/contact-us">Contact US</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="/#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
            </div>
        </div>
    </header>
</div>