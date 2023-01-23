@extends('layouts.template')

@section('stylesheet')

<style>
.ps-breadcrumb {
    padding: 20px 0;
    background-color: #f0f6fb;
}
</style>

@stop('stylesheet')

@section('content')


<div class="ps-breadcrumb">
    <div class="container">
        <div class="d-flex justify-content-between">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li>สินค้าทั้งหมด</li>
            </ul>
            <a class="hide-green-ban-filter ps-btn set-btn-inner ps-btn--outline" href="#" id="filter-sidebar"><i class="icon-equalizer"></i> Filter</a>
        </div>
    </div>
</div>


<div class="ps-page--shop" id="shop-sidebar">
        <div class="container">


            <div class="d-flex flex-wrap mt-15 hide-mobile">
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Clothing & Shoes</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Entertainment</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Music</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Sport & Lifestyle</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Pets</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Kitchen Accessories</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Travel Equipment </a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Growing & Garden</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Electrical Tools</a>
                </div>
                <div class="text-center porduct-top-list">
                    <i class="icon-3d-rotate"></i><br>
                    <a href="#">Mother Care </a>
                </div>
            </div>

            

            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop ">
                        <a class="green_btn_kim_out btn_card_in btn-box2 btn-block" href="#">
                            <div class="d-flex">
                                <img src="{{ url('img/filter-variant.png') }}" height="32" width="32">
                                <div class="pt-5px">
                                    <h4 class="widget-title">หมวดหมู่ : ทุกหมวด</h4>
                                </div>
                            </div>
                        </a>
                        <br>
                        <ul class="ps-list--categories">
                            <li class="current-menu-item menu-item-has-children"> <a href="#">Clothing &amp; Apparel</a> <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li class="current-menu-item ">
                                        <a href="#">Womens</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Mens</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Bags</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Sunglasses</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Accessories</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Kid's Fashion</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="current-menu-item menu-item-has-children"><a href="#">Garden &amp; Kitchen</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li class="current-menu-item "><a href="#">Cookware</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Decoration</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Furniture</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Garden Tools</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Home Improvement</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Powers And Hand Tools</a>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Utensil &amp; Gadget</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="current-menu-item menu-item-has-children"><a href="#">Consumer Electrics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                <ul class="sub-menu">
                                    <li class="current-menu-item menu-item-has-children"><a href="#">Air Conditioners</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li class="current-menu-item "><a href="#">Accessories</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Type Hanging Cell</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Type Hanging Wall</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="current-menu-item menu-item-has-children"><a href="#">Audios &amp; Theaters</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li class="current-menu-item "><a href="#">Headphone</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Home Theater System</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Speakers</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="current-menu-item menu-item-has-children"><a href="#">Car Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li class="current-menu-item "><a href="#">Audio &amp; Video</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Car Security</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Radar Detector</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Vehicle GPS</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="current-menu-item menu-item-has-children"><a href="#">Office Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li class="current-menu-item "><a href="#">Printers</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Projectors</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Scanners</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Store &amp; Business</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="current-menu-item menu-item-has-children"><a href="#">TV Televisions</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li class="current-menu-item "><a href="#">4K Ultra HD TVs</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">LED TVs</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">OLED TVs</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="current-menu-item menu-item-has-children"><a href="#">Washing Machines</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                        <ul class="sub-menu">
                                            <li class="current-menu-item "><a href="#">Type Drying Clothes</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Type Horizontal</a>
                                            </li>
                                            <li class="current-menu-item "><a href="#">Type Vertical</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="current-menu-item "><a href="#">Refrigerators</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="current-menu-item "><a href="#">Books &amp; Office</a>
                            </li>
                            <li class="current-menu-item "><a href="#">Cars &amp; Motocycles</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="widget widget_shop widget_shop_bg">
                        <h4 class="widget-title mt-10 mb-1">Expanded Filters</h4>
                        <figure class="ps-custom-scrollbar" data-height="250">
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-1" name="brand">
                                <label for="brand-1">Adidas (3)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-2" name="brand">
                                <label for="brand-2">Amcrest (1)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-3" name="brand">
                                <label for="brand-3">Apple (2)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-4" name="brand">
                                <label for="brand-4">Asus (19)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-5" name="brand">
                                <label for="brand-5">Baxtex (20)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-6" name="brand">
                                <label for="brand-6">Adidas (11)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-7" name="brand">
                                <label for="brand-7">Casio (9)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-8" name="brand">
                                <label for="brand-8">Electrolux (0)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-9" name="brand">
                                <label for="brand-9">Gallaxy (0)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-10" name="brand">
                                <label for="brand-10">Samsung (0)</label>
                            </div>
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="brand-11" name="brand">
                                <label for="brand-11">Sony (0)</label>
                            </div>
                        </figure>
                    </aside>
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-6 mb-10">
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ url('/product_detail') }}"><img src="{{ url('img/product/Image (1).png') }}" alt="" /></a>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#">ROBERT’S STORE</a>
                                                    <div class="ps-product__content">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                    <div class="ps-product__content hover">
                                                        <p class="ps-product__price text-green">$1310.00</p>
                                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/product_detail') }}">ดูข้อมูลสินค้า</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-30">
                                    <a class="green_btn_kim_out btn_card_in btn-box" href="#">ดูเพิ่มเติม</a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<div class="ps-filter--sidebar">
    <div class="ps-filter__header">
        <h3 class="text-green">ค้นหาหมวดหมู่และสินค้า</h3><a class="ps-btn--close ps-btn--no-boder" href="#"></a>
    </div>
    <div class="ps-filter__content">
        <aside class="widget widget_shop ">
            <a class="green_btn_kim_out btn_card_in btn-box2 btn-block" href="#">
                <div class="d-flex">
                    <img src="{{ url('img/filter-variant.png') }}" height="32" width="32">
                    <div class="pt-5px">
                        <h4 class="widget-title">หมวดหมู่ : ทุกหมวด</h4>
                    </div>
                </div>
            </a>
            <br>
            <ul class="ps-list--categories">
                <li class="current-menu-item menu-item-has-children"> <a href="#">Clothing &amp; Apparel</a> <span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item ">
                            <a href="#">Womens</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Mens</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Bags</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Sunglasses</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Accessories</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Kid's Fashion</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="#">Garden &amp; Kitchen</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item "><a href="#">Cookware</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Decoration</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Furniture</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Garden Tools</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Home Improvement</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Powers And Hand Tools</a>
                        </li>
                        <li class="current-menu-item "><a href="#">Utensil &amp; Gadget</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item menu-item-has-children"><a href="#">Consumer Electrics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                    <ul class="sub-menu">
                        <li class="current-menu-item menu-item-has-children"><a href="#">Air Conditioners</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="#">Accessories</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Type Hanging Cell</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Type Hanging Wall</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="#">Audios &amp; Theaters</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="#">Headphone</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Home Theater System</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Speakers</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="#">Car Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="#">Audio &amp; Video</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Car Security</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Radar Detector</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Vehicle GPS</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="#">Office Electronics</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="#">Printers</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Projectors</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Scanners</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Store &amp; Business</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="#">TV Televisions</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="#">4K Ultra HD TVs</a>
                                </li>
                                <li class="current-menu-item "><a href="#">LED TVs</a>
                                </li>
                                <li class="current-menu-item "><a href="#">OLED TVs</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item menu-item-has-children"><a href="#">Washing Machines</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">
                                <li class="current-menu-item "><a href="#">Type Drying Clothes</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Type Horizontal</a>
                                </li>
                                <li class="current-menu-item "><a href="#">Type Vertical</a>
                                </li>
                            </ul>
                        </li>
                        <li class="current-menu-item "><a href="#">Refrigerators</a>
                        </li>
                    </ul>
                </li>
                <li class="current-menu-item "><a href="#">Books &amp; Office</a>
                </li>
                <li class="current-menu-item "><a href="#">Cars &amp; Motocycles</a>
                </li>
            </ul>
        </aside>
        <aside class="widget widget_shop widget_shop_bg">
            <h4 class="widget-title mt-10 mb-1">Expanded Filters</h4>
            <figure class="ps-custom-scrollbar" data-height="250">
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-1" name="brand">
                    <label for="brand-1">Adidas (3)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-2" name="brand">
                    <label for="brand-2">Amcrest (1)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-3" name="brand">
                    <label for="brand-3">Apple (2)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-4" name="brand">
                    <label for="brand-4">Asus (19)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-5" name="brand">
                    <label for="brand-5">Baxtex (20)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-6" name="brand">
                    <label for="brand-6">Adidas (11)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-7" name="brand">
                    <label for="brand-7">Casio (9)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-8" name="brand">
                    <label for="brand-8">Electrolux (0)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-9" name="brand">
                    <label for="brand-9">Gallaxy (0)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-10" name="brand">
                    <label for="brand-10">Samsung (0)</label>
                </div>
                <div class="ps-checkbox">
                    <input class="form-control" type="checkbox" id="brand-11" name="brand">
                    <label for="brand-11">Sony (0)</label>
                </div>
            </figure>
        </aside>
    </div>
</div>

@section('scripts')
@stop('scripts')