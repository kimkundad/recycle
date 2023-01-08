@extends('layouts.template')

@section('stylesheet')
@stop('stylesheet')

@section('content')

    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{url('/product') }}">สินค้าทั้งหมด</a></li>
                <li>FELTEN & GUILLEAUME M EED 150 M6</li>
            </ul>
        </div>
    </div>
    <div class="ps-page--product pt-5px" >
        <div class="container">
            <div class="ps-page__container">
                <div class="">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">
                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            <div class="item"><a href="{{ url('img/product/Rectangle 38.png') }}"><img src="{{ url('img/product/Rectangle 38.png') }}" alt=""></a></div>
                                            <div class="item"><a href="{{ url('img/product/image 34.png') }}"><img src="{{ url('img/product/image 34.png') }}" alt=""></a></div>
                                            <div class="item"><a href="{{ url('img/product/image 38.png') }}"><img src="{{ url('img/product/image 38.png') }}" alt=""></a></div>
                                            <div class="item"><a href="{{ url('img/product/image 39.png') }}"><img src="{{ url('img/product/image 39.png') }}" alt=""></a></div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    <div class="item"><img src="{{ url('img/product/Rectangle 38.png') }}" alt=""></div>
                                    <div class="item"><img src="{{ url('img/product/image 34.png') }}" alt=""></div>
                                    <div class="item"><img src="{{ url('img/product/image 38.png') }}" alt=""></div>
                                    <div class="item"><img src="{{ url('img/product/image 39.png') }}" alt=""></div>
                                </div>
                            </div>
                            <div class="ps-product__info">
                                <h1>Marshall Kilburn Portable Wireless Speaker</h1>
                                <div class="d-flex">
                                    <p class="ps-product__price sale"><del>฿1,280 </del> ฿640 </p>
                                    <span class="badge badge-light-success fs-base w-80px p-5px mt-10px ml-10px">50% ส่วนลด</span>
                                </div>
                                
                                <div class="ps-product__desc">
                                    <p>
                                        Setting the bar as one of the loudest speakers in its class, <br>
                                        the Kilburn is a compact, stout-hearted hero with a well-balanced <br>
                                        audio which boasts a clear midrange and extended highs for a sound.
                                    </p>
                                    <div class="ps-product__specification">
                                        <p class="mt-10px"><strong>Brand:</strong> ABB</p>
                                        <p class="mt-10px"><strong>SKU:</strong> SF1133569600-1</p>
                                        <p class="mt-10px"><strong>Net weight:</strong> CA. 6900 KG</p>
                                        <p class="mt-10px"><strong>Condition:</strong> Used</p>
                                    </div>
                                </div>
                                <div class="ps-product__variations bor-line-top">
                                    <figure>
                                        <figcaption class="contact-product-title">ติดต่อเพื่อซื้อสินค้า</figcaption>
                                        
                                    </figure>
                                </div>
                                <div class="header d-flex">
                                    <div class="header__actions con-position-pro">
                                        <a class="ps-btn set-btn-inner ps-btn--outline" href="#"><img class="img-phone" src="{{ url('img/icon/phone-call.png') }}"> 038606338</a>
                                        <a class="header__extra btn_green_header" href="#">
                                            <img class="img-icon-green_header" src="{{ url('img/icon/line.png') }}">
                                        </a>
                                        <a class="header__extra btn_green_header" href="#">
                                            <img class="img-icon-green_header" src="{{ url('img/icon/mail.png') }}">
                                        </a>
                                        <a class="header__extra btn_green_header" href="#">
                                            <img class="img-icon-green_header" src="{{ url('img/icon/facebook_line.png') }}">
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="ps-section--default mt-20 mb-5px">
                            <div class="ps-section__header mb-20">
                                <h3>Additional Information</h3>
                            </div>
                        </div>
                 
                            <h4>Special Instructions</h4>
                           <p> NOTICE: If you are the winning bidder and default by failing to adhere to this sellers terms and conditions your account with Liquidity Services WILL BE LOCKED.</p>
                            
                            <h4>Inspection</h4>
                            <p>Most items offered for sale are used and may contain defects not immediately detectable. Bidders may inspect the property prior to bidding. 
                            Inspection is by appointment only. Please use the 'Ask a Question' feature to schedule an appointment for Inspection.</p>
                            
                            <h4>Guaranty Waiver</h4>
                            <p>All property is offered for sale 'AS IS, WHERE IS.' The Seller makes no warranty, guaranty or representation of any kind, expressed or implied, 
                            as to the merchantability or fitness for any purpose of the property offered for sale. Please note that upon removal of the property, all sales are final.</p>
                            
                            <h4>Description Warranty</h4>
                            <p>Seller warrants to the Buyer that the property offered for sale will conform to its description. Any claim for misdescription must be made prior to removal of the property. 
                            If Seller confirms that the property does not conform to the description, Seller will keep the property and refund any money paid. 
                            The liability of the seller shall not exceed the actual purchase price of the property.</p>
                            
                            <p>Make/Brand : TA Instruments</p>
                            
                            <p>Model : TGA Q500</p>
                            
                            <p>Inventory ID : 3269835</p>
                            
                            <p>Condition : Used/See Description</p>
                            
                            <p> VIN/Serial : 0500-0174</p>
                            
                            <p>Lot size classification : Customer Pickup</p>
                            
                            <p>Lot#13424-15570</p>
                            

                    </div>
                </div>
                
            </div>
            <div class="ps-section--default ps-customer-bought">
                <div class="ps-section__header">
                    <div class="d-flex justify-content-between">
                        <h3>สินค้าแนะนำ</h3>
                        <a href="{{ url('/product') }}" class="">
                            ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
                        </a>
                    </div>
                </div>
                <div class="ps-section__content">
                    <div class="row justify-content-between">
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
            </div>
           
        </div>
    </div>

@endsection

@section('scripts')
@stop('scripts')