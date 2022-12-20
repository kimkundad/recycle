@extends('layouts.template')

@section('stylesheet')
@stop('stylesheet')

@section('content')


<div class="ps-home-banner">
    <div class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
        <div class="ps-banner--autopart" data-background="{{ url('/img/slider/slide_1.png') }}"><img src="{{ url('/img/slider/slide_1.png') }}" alt="">
            <div class="ps-banner__content">
                <h4></h4>
                <h3></h3>
                <p>.</p>
                
            </div>
        </div>
        <div class="ps-banner--autopart" data-background="{{ url('/img/slider/slide_1.png') }}"><img src="{{ url('/img/slider/slide_1.png') }}" alt="">
            <div class="ps-banner__content">
                <h4></h4>
                <h3></h3>
                <p>.</p>
            </div>
        </div>
    </div>
</div>
<div class="ps-deal-of-day">
    <div class="ps-container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>หมวดหมู่สินค้า</h3>
                </div>
            </div>
            <a href="#" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="3" data-owl-item-md="4" data-owl-item-lg="5" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/banner_1.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/img_b-3.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/img_b-4.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/img_b-5.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/banner_1.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/banner_1.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/banner_1.png') }}"> 
                </div>
                <div class="ps-product ps-product--inner">
                    <img class="img-fluid" src="{{ url('img/img_b-2.png') }}"> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ps-deal-of-day">
    <div class="ps-container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>สินค้าแนะนำ</h3>
                </div>
            </div>
            <a href="#" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            <div class="">
                <div class="row">
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ url('img/product/Image.png') }}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ url('img/product/Image (2).png') }}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ url('img/product/Image (3).png') }}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ url('img/product/Image (4).png') }}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6 ">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                    <p class="ps-product__price">$1310.00</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="checkout.html">ดูข้อมูลสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ps-deal-of-day">
    <div class="ps-container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>บริการของเรา</h3>
                </div>
            </div>
            <a href="#" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            <div class="d-flex">
                <div class="card-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_green pt-20">
                            <h3>รับซิ้อวัสดุรีไซเคิล/ไม่ใช้แล้ว</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับประมูลงานเหล็ก โครงสร้าง ฯลฯ</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>ให้คำปรึกษา</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="d-flex mt-30">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>บริการทำลายเอกสาร</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>บริการจัดเก็บของเสียอุตสาหกรรม</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>บริการพิเศษอื่นๆ</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ps-deal-of-day">
    <div class="ps-container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>เกี่ยวกับวงษ์พาณิชย์</h3>
                </div>
            </div>
            <a href="#" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
@stop('scripts')