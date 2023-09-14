@extends('layouts.template')


@section('title')
วงษ์พาณิชย์รีไซเคิล ระยอง - wpnrayong
@stop

@section('stylesheet')
<style>
    .owl-prev{
  padding: 20px!important;
}
.cover {
  background-size: cover!important;
  background-position: center!important;
  background-repeat: no-repeat!important;
}
</style>
@stop('stylesheet')

@section('content')

<div class="ps-home-banner">
    <div class="ps-carousel--nav-inside owl-slider " 
    data-owl-auto="true" 
    data-owl-loop="true" 
    data-owl-speed="5000" 
    data-owl-gap="0" 
    data-owl-nav="true" 
    data-owl-dots="true" 
    data-owl-item="1" 
    data-owl-item-xs="1" 
    data-owl-item-sm="1" 
    data-owl-item-md="1" 
    data-owl-item-lg="1" 
    data-owl-duration="1000" 
    data-owl-mousedrag="on" 
    >
        {{-- <div class="ps-banner--autopart" data-background="{{ url('/img/slider/slide_1.png') }}">
            <img src="{{ url('/img/slider/slide_1.png') }}" alt="">
            <div class="d-flex">
                <div class="ps-banner__content" >
                    <h4 class="sub-head-w">วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</h4>
                    <h3 class="head-slide-w">รับซื้อ-ขาย</h3>
                    <p class="detail-slide-w">จำหน่ายเครื่องจักร ทั้งมือหนึ่ง มือสอง รับเข้าประมูลงานต่างๆ อาทิ เหล็ก <Br>
                        โครงสร้าง เศษเหล็ก สแตนเลส อลูมิเนียม อัลลอย</p>
                    <div class="d-flex">
                        <a class="btn-green-b"> ซื้อสินค้า</a>
                        <a class="btn-green-w-g"> ขายสินค้า</a>
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div> --}}

        @isset($slide)
            @foreach ($slide as $item)

                <div class="ps-banner--autopart align-items-center cover" data-background="{{ url('/img/slide/'.$item->image) }}">
                    <img src="{{ url('/img/slide/'.$item->image) }}" alt="">
                    <div class="d-flex">
                        <div class="ps-banner__content" >
                            <h4 class="sub-head-w">{{ $item->title }}</h4>
                            <h3 class="head-slide-w">{{ $item->big_title }}</h3>
                            <p class="detail-slide-w">{{ $item->sub_title }}</p>
                            <div class="d-flex">
                                @if( $item->g_btn === 1)
                                <a class="btn-green-b" href="{{ $item->g_btn_url !== null ? $item->g_btn_url : "#" }}"> {{ $item->g_btn_text }}</a>
                                @endif
                                @if( $item->w_btn === 1)
                                {{-- <a class="btn-green-w-g" href="#"  data-toggle="modal" data-target="#product-quickview"> {{ $item->w_btn_text }}</a> --}}
                                <a class="btn-green-w-g" href="{{ $item->w_btn_url !== null ? $item->w_btn_url : "#" }}"> {{ $item->w_btn_text }}</a>
                                @endif
                            </div>
                        </div>
                        <div>
        
                        </div>
                    </div>
                </div>
                
            @endforeach
        @endisset
    </div>
</div>

<div class="ps-deal-of-day">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>หมวดหมู่สินค้า</h3>
                </div>
            </div>
            <a href="{{ url('/category?id=0') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--nav ow2 sec-slide" 
            data-owl-auto="false" 
            data-owl-loop="true" 
            data-owl-speed="10000" 
            data-owl-gap="30" 
            data-interval="false"
            data-owl-nav="true" 
            data-owl-dots="true" 
            data-owl-item="5" 
            data-owl-item-xs="2" 
            data-owl-item-sm="3" 
            data-owl-item-md="4" 
            data-owl-item-lg="5" 
            data-owl-item-xl="6" 
            data-owl-duration="1000" 
            data-owl-mousedrag="on">

                

                @if(get_category())
                    @foreach(get_category() as $u)
                        <div class="ps-product ps-product--inner">
                            <a href="{{ url('category?id='.$u->id) }}" class="text-center">
                                <div class="ps-block__number photo_cat">
                                    <img class="img-fluid inheritpho" src="{{ url('images/wpnrayong/subcat/'.$u->image) }}"> 
                                </div>
                            <p style="margin-top:10px">{{ $u->sub_name }}</p>
                            </a>
                        </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
</div>

<div class="ps-deal-of-day">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>สินค้าแนะนำ</h3>
                </div>
            </div>
            <a href="{{ url('/category?id=0') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            <div class="">
                <div class="row">

            
                    @isset($pro)
                        @foreach($pro as $u)
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 fix-pad">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail h-min-set" ><a href="{{ url('product_detail/'.$u->id_q) }}">
                                        <img src="{{ url('images/wpnrayong/product/'.$u->image_pro) }}" alt="{{ $u->name_pro }}" /></a>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                        <div class="ps-product__content">
                                            @if($u->discount == 0)

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}"><b>ติดต่อฝ่ายขาย</b></a>
                                            </p>
                                            @else
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif

                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}"><b>ติดต่อฝ่ายขาย</b></a>
                                            </p>
                                            @else
                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif

                                            @endif
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                        </div>
                                        <div class="ps-product__content hover">
                                            @if($u->discount == 0)

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}"><b>ติดต่อฝ่ายขาย</b></a>
                                            </p>
                                            @else
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif

                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp
                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}"><b>ติดต่อฝ่ายขาย</b></a>
                                            </p>
                                            @else
                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif
                                            @endif
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                </div>
            </div>
        </div>
    </div>
</div>


<div class="ps-deal-of-day set-top-mobile-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>บริการของเรา</h3>
                </div>
            </div>
            
            
        </div>
        <div class="ps-section__content">
            <div class="row">
            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="card-green "> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_green pt-20">
                            <h3>รับซิ้อวัสดุรีไซเคิล/ไม่ใช้แล้ว</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/service/03-ให้คำปรึกษา.png') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>ให้คำปรึกษาด้านรีไซเคิลแบบครบวงจร</h3>
                            <p class="mb-0 min-h-145 fs-13px">
                                บริการให้คำปรึกษาด้านการรีไซเคิลแบบครบวงจร <br>
                                ด้วยประสบการณ์และความเชี่ยวชาญด้านการรีไซเคิลวัสดุเหลือใช้ 
                                ทั้งที่ไม่เป็นอันตรายและเป็นอันตรายจากโรงงานอุตสาหกรรม 
                                รวมไปถึงโลหะและวัสดุเหลือใช้ทุกประเภท <br>
                                ให้คำปรึกษาเรื่องการจัดการคุณภาพสิ่งแวดล้อม 
                                จัดอบรมเรื่องการแยกของเสียและการจัดการของเสีย <br>
                                ด้วยกระบวนการรีไซเคิลที่มีประสิทธิภาพ
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green "> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/service/04-บริการทำลายเอกสาร.png') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับรื้อ ถอน ขนย้าย และทำลายวัสดุอุปกรณ์ที่ไม่ใช้แล้ว</h3>
                            <p class="mb-0 min-h-125 fs-13px">บริการรื้อ ถอน ขนย้าย โรงงาน คลังสินค้า เครื่องจักร 
                                และทำลายวัสดุอุปกรณ์ที่ไม่ใช้แล้ว โดยทีมงานมืออาชีพที่มีประสบการณ์และความเชี่ยวชาญ ด้วยเครื่องจักรทุ่นแรงในการเคลื่อนย้าย 
                                พร้อมรถบรรทุกและการบริหารระบบขนส่งที่ปลอดภัย
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green "> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img class="bg_green_icon ml-5px" src="{{ url('img/service/02-รับประมูลงานเหล็ก_2.png') }}" height="60" width="60">
                            </div>
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับซื้อ ฝาก ขาย วัสดุและอุปกรณ์ที่ไม่ใช้แล้วทุกประเภท (Surplus Materials)</h3>
                            <p class="mb-0 min-h-125 fs-13px">รับซื้อ ฝาก ขาย วัสดุและอุปกรณ์ที่ไม่ใช้แล้วทุกประเภท ทั้งที่เป็นอันตรายและไม่เป็นอันตรายจากโรงงาน อุตสาหกรรม อาทิ เช่น เหล็ก สแตนเลส ทองแดง <br>ทองเหลือง อะลูมิเนียม แบตเตอรี่ น้ำมันเก่าที่ใช้แล้ว พลาสติกทุกชนิด เครื่องยนต์ เครื่องจักร อะไหล่ ฯลฯ
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            
                            <img class="bg_green_icon" src="{{ url('img/service/01-รับซื้อวัสดุรีไซเคิล.png') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับบริการจัดเก็บสินค้ารีไซเคิล</h3>
                            <p class="mb-0 min-h-145 fs-13px">บริการจัดเก็บสินค้ารีไซเคิลที่ถูกต้องเหมาะสม คำนึงถึงการรักษาสภาพแวดล้อมและความปลอดภัย มีพื้นที่รองรับปริมาณอย่างเพียงพอ </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img class="bg_green_icon" src="{{ url('img/service/05-บริการจัดเก็บของเสียอุตสาหกรรม.png') }}" height="60" width="60">
                            </div>
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับบริการจัดการขนส่งกากของเสียเพื่อนำไปบำบัด/กำจัดยังปลายทาง</h3>
                            <p class="mb-0 min-h-125 fs-13px">รับบริการระบบขนส่งกากของเสียเพื่อนำไปบำบัดและกำจัดยังปลายทาง ที่ปลอดภัยได้มาตรฐาน มีแผนรับมือเหตุการณ์ฉุกเฉินในด้านการขนส่ง และใบอนุญาตขนส่งสำหรับทั้งของเสียเป็นพิษและปลอดพิษ รวมทั้งให้บริการแบบเร่งด่วนเมื่อโรงงานมีความต้องการใช้บริการ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/service/shredder-industrial-icon.png') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับบริการบดย่อย คัดแยก สกรีนนิ่ง และบรรจุในภาชนะ งานพลาสติกทุกประเภท</h3>
                            <p class="mb-0 min-h-125 fs-13px">รับบริการงานด้านพลาสติกโดยเฉพาะ คัดแยก บดและสกรีนนิ่งแยกตามชนิดของพลาสติก พลาสติกที่	บดแล้วเรานำมาเข้าสู่กระบวนการ COMPOUND <br>และส่งคืนให้โรงงานนั้นๆ เพื่อช่วยลดต้นทุนในการ	ผลิตและช่วยสนับสนุนด้านสิ่งแวดล้อม

                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
           
        </div>
    </div>
</div>


<div class="ps-deal-of-day set-top-mobile-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>เกี่ยวกับเรา</h3>
                </div>
            </div>
            <a href="{{ url('/about') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ps-product--detail ps-product--fullwidth">
                    <div class="ps-product__thumbnail" data-vertical="false">
                        <figure>
                            <div class="ps-wrapper">
                                <div class="ps-product__gallery" data-arrow="true">
                                    <div class="item"><a href="{{ url('img/About/626x418-about-1.jpg') }}"><img src="{{ url('img/About/626x418-about-1.jpg') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/About/626x418-about-2.jpg') }}"><img src="{{ url('img/About/626x418-about-2.jpg') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/About/626x418-about-3.jpg') }}"><img src="{{ url('img/About/626x418-about-3.jpg') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/About/626x418-about-4.jpg') }}"><img src="{{ url('img/About/626x418-about-4.jpg') }}" alt=""></a></div>
                                </div>
                            </div>
                        </figure>
                        <div class="ps-product__variants" data-item="4" data-md="3" data-sm="3" data-arrow="false">
                            <div class="item"><img src="{{ url('img/About/626x418-about-1.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/About/626x418-about-2.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/About/626x418-about-3.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/About/626x418-about-4.jpg') }}" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body ps-product--detail card-body-x">

                            <div class="ps-product__content ps-tab-root">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">เกี่ยวกับเรา</a></li>
                                    <li><a href="#tab-2">วิสัยทัศน์</a></li>
                                    <li><a href="#tab-3">พันธกิจ</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content d-flex justify-content-center">
                                                <div style="max-width:380px">
                                                <br>
                                                <h4>เกี่ยวกับเรา</h4>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px;">ผู้นำด้านธุรกิจรีไซเคิลที่มีประสบการณ์และความเชี่ยวชาญด้านการรีไซเคิลวัสดุเหลือใช้ </p>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px; ">
                                                    ทั้งที่ไม่เป็นอันตรายและเป็นอันตรายจากโรงงานอุตสาหกรรม รวมไปถึงโลหะทุกประเภท 
                                                    อาทิเช่น เหล็ก สแตนเลส ทองแดง <br>ทองเหลือง อะลูมิเนียม แบตเตอรี่ น้ำมันที่ใช้แล้ว 
                                                    พลาสติกทุกชนิด เครื่องยนต์ เครื่องจักร อะไหล่ ฯลฯ </p> <p style="text-indent: 1.5em;margin-bottom: 0px;">
                                                    โดยเราเป็นทั้งผู้รับซื้อและผู้จำหน่าย 
                                                    ครอบคลุมไปถึงการประมูลวัสดุเหลือใช้ทั้งจากโรงงานอุตสาหกรรมขนาดใหญ่ เช่น <br>แยกก๊าซปิโตรเคมี 
                                                    โรงกลั่นน้ำมัน โรงไฟฟ้า โรงงานชิ้นส่วน <br>ยานยนต์ และอุตสาหกรรมหนักทุกประเภท 
                                                    ด้วยมาตรฐานการจัดเก็บที่ถูกต้อง ปลอดภัย และมีประสิทธิภาพ โดยคำนึงถึงสภาพแวดล้อมเป็นสำคัญ

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content d-flex justify-content-center">
                                                <div style="max-width:380px">
                                                <br>
                                                <h4>วิสัยทัศน์ วงษ์พาณิชย์รีไซเคิล </h4>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px;">วงษ์พาณิชย์รีไซเคิล ระยอง มุ่งมั่นสู่การเป็นผู้นำด้านธุรกิจรีไซเคิลระดับประเทศ </p>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px;">  ด้วยกลยุทธ์ ความเชี่ยวชาญมาตรฐานระดับสากล <br>บุคลากรมืออาชีพ สร้างระบบเศรษฐกิจหมุนเวียนเพื่อการเติบโตอย่างยั่งยืน
                                                     โดยคำนึงถึงคุณภาพสิ่งแวดล้อม และความปลอดภัยเป็นสำคัญ 
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-3">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content d-flex justify-content-center">
                                                <div style="max-width:380px">
                                             
                                                <style>
                                                    .table td, .table th {
                                                        border-top: 1px solid #ffffff;
                                                    }
                                                </style>
                                                <br>
                                                <h4>พันธกิจ วงษ์พาณิชย์รีไซเคิล </h4>
                                                <div class="table-responsive mb-9">
                                                    <table class="table mb-3">
                                                        <tbody>
                                                            
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    มุ่งพัฒนาธุรกิจรีไซเคิลอย่างครบวงจร เพื่อสร้างความพึงพอใจให้แก่ลูกค้าผ่านการนำเสนอผลิตภัณฑ์และการบริการที่มีคุณภาพ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    นำ Digital Technology มาช่วยต่อยอดการบริการ <br>เพื่อรองรับลูกค้าทั้งในประเทศและต่างประเทศ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    แสวงหาพันธมิตรทางธุรกิจ เพื่อพัฒนาศักยภาพและ<br>ขีดความสามารถในการแข่งขัน 
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    มุ่งเน้นการบริหารจัดการ โดยคำนึงถึงสิ่งแวดล้อมตามมาตรฐานสากลและความปลอดภัยของชุมชนเป็นสำคัญ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    ปฏิบัติตามกฎหมายอย่างเคร่งครัด ภายใต้หลักการกำกับดูแลกิจการที่ดี มีธรรมาภิบาลและมีความรับผิดชอบต่อสังคม
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="ps-deal-of-day mt-0" style="padding-bottom: 0px">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>ลูกค้าของเรา</h3>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="ps-client-say">
    <div class="container">
        <div class="ps-section__content">
            <div class="ps-carousel--testimonials owl-slider" 
            data-owl-auto="true" 
            data-owl-loop="true" 
            data-owl-speed="2000" 
            data-owl-gap="0" 
            data-owl-nav="false" 
            data-owl-dots="false" 
            data-owl-item="6" 
            data-owl-item-xs="3" 
            data-owl-item-sm="3" 
            data-owl-item-md="4" 
            data-owl-item-lg="3" 
            data-owl-duration="1000" 
            data-owl-mousedrag="on">

                @isset($ban)
                    @foreach ($ban as $item)
                        <div class="ps-block--testimonial text-center">
                            <img src="{{ url('img/alliance/'.$item->image) }}" alt="{{ $item->name }}" class="max-h-55">
                        </div>
                    @endforeach
                @endisset

            </div>
        </div>
    </div>
</div>


<div class="ps-deal-of-day mt-5">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>ใบอนุญาตและรางวัล</h3>
                </div>
            </div>
            <a href="{{ url('/certificate') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
        </div>

        @if(count($cer) > 5 )
        <div class="img-portfolio">
            <div class="dg-wrapper ps-section__content">
                <div class="text-center img_ro img_rotation1" data-image="{{ $cer[0]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[0]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[0]->name }}</h4> --}}
                    </div>
                </div>
                <div class="text-center img_ro img_rotation2" data-image="{{ $cer[1]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[1]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[1]->name }}</h4> --}}
                </div>
                </div>
                <div class="text-center img_ro img_rotation3" data-image="{{ $cer[2]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[2]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[2]->name }}</h4> --}}
                </div>
                </div>
                <div class="text-center img_ro img_rotation4" data-image="{{ $cer[3]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[3]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[3]->name }}</h4> --}}
                </div>
                </div>
                <div class="text-center img_ro img_rotation5" data-image="{{ $cer[4]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[4]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[4]->name }}</h4> --}}
                    </div>
                </div>
                <div class="text-center img_ro img_rotation6" data-image="{{ $cer[5]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[5]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[5]->name }}</h4> --}}
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>


<div class="ps-deal-of-day mt-veri" >
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>กิจกรรม & ประชาสัมพันธ์</h3>
                </div>
            </div>
            <a href="{{ url('/blog') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a>
            
        </div>
        <div class="ps-section__content">
            
            <div class="row">

                @isset($blog)
                    @foreach ($blog as $item)
                        
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ url('blog_detail/'.$item->id) }}"></a>
                                    <img src="{{ url('media/'.$item->image) }}" alt="{{ $item->title }}">
                                </div>
                                <div class="ps-post__content">
                                    <a 
                                    style="min-height: 72px; max-height: 72px; overflow: hidden;"
                                    class="ps-post__title" 
                                    href="{{ url('blog_detail/'.$item->id) }}">
                                    {{ $item->title }}
                                    </a>
                                    <p style="min-height: 68px; max-height: 68px; overflow: hidden;">{{ $item->sub_title }}</p>
                                    <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('blog_detail/'.$item->id) }}">อ่านต่อ</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endisset
                
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>

$(document).on('click','.img_ro',function (event) {
      event.preventDefault();
      
      var img = $(this).data('image');
      var ENDPOINT = "{{ url('/') }}";
      $.ajax({
                url: ENDPOINT + "/getModal?data_id=" + img,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.modal-content-img').html('');
                }
            })
            .done(function (response) {
                $('.modal-content-img').html(response);
                    $('#kt_modal_4_2').modal("show");
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
            
      getModal
      console.log('img : ', img)

});

</script>

@stop('scripts')