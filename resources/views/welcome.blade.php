@extends('layouts.template')


@section('title')
    {{ __('home.meta_title') }}
@stop

@section('og')
    <meta property="og:url"           content="http://wpnrayong.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ get_title_facebook() }}" />
    <meta property="og:image"         content="{{ get_facebook_img() }}?v{{time()}}" />
    <meta property="og:description"   content="{{ get_facebook_detail() }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
@stop('og')

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
.hi-153{
    height:153px
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
                                <h4 class="sub-head-w">{{ localized($item, 'title') }}</h4>
                                <h3 class="head-slide-w">{{ localized($item, 'big_title') }}</h3>
                                <p class="detail-slide-w">{!! nl2br(localized($item, 'sub_title') ?? '') !!}</p>
                                <div class="d-flex">
                                    @if( $item->g_btn === 1)
                                    <a class="btn-green-b" href="{{ $item->g_btn_url !== null ? $item->g_btn_url : "#" }}"> {{ localized($item, 'g_btn_text') }}</a>
                                    @endif
                                    @if( $item->w_btn === 1)
                                    <a class="btn-green-w-g" href="{{ $item->w_btn_url !== null ? $item->w_btn_url : "#" }}"> {{ localized($item, 'w_btn_text') }}</a>
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
                    <h3>{{ __('home.category_heading') }}</h3>
                </div>
            </div>
            <a href="{{ url('/category?id=0') }}" class="">
                {{ __('home.see_more') }} <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
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
                        <div class="ps-product ps-product--inner photo_cat">
                            <a href="{{ url('category?id='.$u->id) }}" class="text-center photo_cat">
                                <div class="ps-block__number photo_cat">
                                    <img class="img-fluid inheritpho " src="{{ url('images/wpnrayong/subcat/'.$u->image) }}">
                                </div>
                            <p style="margin-top:10px">{{ zh_localized($u, 'sub_name') }}</p>
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
                    <h3>{{ __('home.recommended') }}</h3>
                </div>
            </div>
            <a href="{{ url('/recomment') }}" class="">
                {{ __('common.view_all') }} <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
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
                                    <div class="ps-product__container">
                                    <a class="ps-product__vendor" href="#">{{ localized($u, 'name_pro') }}</a>
                                        <div class="ps-product__content">
                                            @if($u->discount == 0)

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}">
                                                    <b>{{ __('common.contact_seller') }}</b>
                                                </a>
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
                                                <a href="{{ url('/contact') }}">
                                                    <b>{{ __('common.contact_seller') }}</b>
                                                </a>
                                            </p>
                                            @else
                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif

                                            @endif

                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">{{ __('common.view_product') }}</a>
                                        </div>
                                        <div class="ps-product__content hover">
                                            @if($u->discount == 0)

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}">
                                                    <b>{{ __('common.contact_seller') }}</b>
                                                </a>
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
                                                <a href="{{ url('/contact') }}">
                                                    <b>{{ __('common.contact_seller') }}</b>
                                                </a>
                                            </p>
                                            @else
                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif
                                            @endif
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">{{ __('common.view_product') }}</a>
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
                    <h3>{{ __('home.our_services') }}</h3>
                </div>
            </div>


        </div>
        <div class="ps-section__content">
            @if(app()->getLocale() === 'th')
            <div class="row">

                    {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class=" card-out-green">
                            <div class="card-green-content">
                                <div class="d-flex justify-content-between">
                                    <img class="bg_green_icon" src="{{ url('img/service/รับรื้อถอน.png') }}" height="60" width="60">
                                    <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                                </div>
                                <div class="ps-block__content_out-green pt-20">
                                    <h3>ให้บริการรับรื้อถอนโรงงานอุตสาหกรรม โรงงานปิโตรเคมี โรงไฟฟ้า อาคารขนาดใหญ่ คลังสินค้า</h3>
                                    <p class="mb-0 fs-13px">
                                        ให้บริการรับรื้อถอนโรงงานอุตสาหกรรม โรงงานปิโตรเคมี โรงไฟฟ้า อาคารขนาดใหญ่ คลังสินค้า วางแผนงานอย่างเป็นระบบ ควบคุมงานด้วยวิศวกรผู้เชี่ยวชาญเรื่องรื้ออาคาร ด้วยเครื่องจักรอันทันสมัย มีประสิทธิภาพสูง และระบบขนส่งอย่างครบวงจร รวมทั้งรับซื้ออุปกรณ์เหลือใช้ จากการรื้อถอน เครื่องจักร เศษเหล็ก เศษทองแดง      สแตนเลส ให้ราคาดี ประเมินหน้างานฟรียินดีให้คำปรึกษา
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}



                    <!-- /////////////////////////////////////////////// -->


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class=" card-out-green">
                            <div class="card-green-content">
                                <div class="d-flex justify-content-between">
                                    <img class="bg_green_icon" src="{{ url('img/service/รับรื้อถอน.png') }}" height="60" width="60">
                                    <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                                </div>
                                <div class="ps-block__content_out-green pt-20">
                                    <h3>รับรื้อถอนโรงงานอุตสาหกรรม โรงงานปิโตรเคมี โรงไฟฟ้า</h3>
                                    <p class="mb-0 min-h-125 fs-13px">
                                        ให้บริการรับรื้อถอนโรงงานอุตสาหกรรม โรงงานปิโตรเคมี <br>
                                        โรงไฟฟ้า อาคารขนาดใหญ่ คลังสินค้า วางแผนงานอย่างเป็นระบบ ควบคุมงานด้วยวิศวกรผู้เชี่ยวชาญเรื่องรื้ออาคาร ด้วยเครื่องจักรอันทันสมัย มีประสิทธิภาพสูง และระบบขนส่งอย่างครบวงจร รวมทั้งรับซื้ออุปกรณ์เหลือใช้ จากการรื้อถอน เครื่องจักร เศษเหล็ก เศษทองแดง สแตนเลส ให้ราคาดี
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class=" card-out-green">
                            <div class="card-green-content">
                                <div class="d-flex justify-content-between">
                                    <img class="bg_green_icon" src="{{ url('img/service/steel.svg') }}" height="60" width="60">
                                    <a class="green_btn_kim_out btn_card_in" href="{{ url('/steel?id=10') }}">ขอรับบริการ</a>
                                </div>
                                <div class="ps-block__content_out-green pt-20">
                                    <h3>เหล็กรูปพรรณ</h3>
                                    <p class="mb-0 min-h-145 fs-13px">
                                        จัดจำหน่ายเหล็กรูปพรรณทุกชนิดแบบครบวงจรในภาคตะวันออก ภายใต้ชื่อที่ลูกค้าไว้วางใจมายาวนาน “WPN” เรามุ่งมั่นในการคัดสรรสินค้าเหล็กคุณภาพสูง ควบคุมคุณภาพอย่างเข้มงวด ด้วยกระบวนการผลิตที่ได้มาตรฐาน มอก. เพื่อรองรับทุกความต้องการของงานก่อสร้าง โครงการอุตสาหกรรม และงานโครงสร้างต่าง ๆ อย่างมีประสิทธิภาพ
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class=" card-out-green">
                            <div class="card-green-content">
                                <div class="d-flex justify-content-between">
                                    <img class="bg_green_icon" src="{{ url('img/service/warehouse.svg') }}" height="60" width="60">
                                    <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                                </div>
                                <div class="ps-block__content_out-green pt-20">
                                    <h3>Warehouse ให้เช่า</h3>
                                    <p class="mb-0 min-h-145 fs-13px">
                                        บริการให้เช่าโกดัง – คลังสินค้า ลานวางสินค้า พื้นที่ระยองและพื้นที่สงขลา แบบครบวงจร พร้อมพื้นที่ให้เลือกหลากหลายขนาด ตอบสนองทุกความต้องการของธุรกิจ ไม่ว่าจะเป็นการเก็บสินค้า หรือเป็นศูนย์กระจายสินค้า แบ่งให้เช่าตามความต้องการของลูกค้า พร้อมให้คำปรึกษาเกี่ยวกับการเลือกขนาดพื้นที่ที่เหมาะสม และสิ่งอำนวยความสะดวกครบครัน ระบบรักษาความปลอดภัย 24 ชั่วโมง
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- /////////////////////////////////////////////// -->

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
                                    <h3>ให้บริการจัดเก็บสินค้ารีไซเคิล</h3>
                                    <p class="mb-0 min-h-145 fs-13px">บริการจัดเก็บสินค้ารีไซเคิลที่ถูกต้องเหมาะสม <br>มีพื้นที่รองรับปริมาณอย่างเพียงพอและเป็นระบบ โดยคำนึงถึงการรักษาสภาพแวดล้อมและความปลอดภัย<br> </p>
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
                                    <h3>บริการจัดการขนส่งกากของเสียเพื่อนำไปบำบัด/กำจัดยังปลายทาง</h3>
                                    <p class="mb-0 min-h-125 fs-13px">ให้บริการระบบขนส่งกากของเสียเพื่อนำไปบำบัดและกำจัดยังปลายทาง ที่ปลอดภัยได้มาตรฐาน มีแผนรับมือเหตุการณ์ฉุกเฉินในด้านการขนส่ง และใบอนุญาตขนส่งสำหรับทั้งของเสียเป็นพิษและปลอดพิษ รวมทั้งให้บริการแบบเร่งด่วนเมื่อโรงงานมีความต้องการใช้บริการ</p>
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
                                    <h3>บริการบดย่อย คัดแยก สกรีนนิ่ง และบรรจุในภาชนะ งานพลาสติกทุกประเภท</h3>
                                    <p class="mb-0 min-h-125 fs-13px">ให้บริการงานด้านพลาสติกโดยเฉพาะ คัดแยก บดและสกรีนนิ่งแยกตามชนิดของพลาสติก พลาสติกที่บดแล้วนำมาเข้าสู่กระบวนการ COMPOUND <br>และส่งคืนให้โรงงานนั้นๆ เพื่อช่วยลดต้นทุนในการผลิตและช่วยสนับสนุนด้านสิ่งแวดล้อม

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            @else

            <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-out-green">
                        <div class="card-green-content">
                            <div class="d-flex justify-content-between">
                                <img class="bg_green_icon" src="{{ url('img/service/รับรื้อถอน.png') }}" height="60" width="60">
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>{{ __('home.services.demolition.title') }}</h3>
                                <p class="mb-0 min-h-125 fs-13px">
                                    {!! __('home.services.demolition.body') !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-out-green">
                        <div class="card-green-content">
                            <div class="d-flex justify-content-between">
                                <img class="bg_green_icon" src="{{ url('img/service/steel.svg') }}" height="60" width="60">
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/steel?id=10') }}">{{ __('home.request_service') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>{{ __('home.services.steel.title') }}</h3>
                                <p class="mb-0 min-h-145 fs-13px">
                                    {{ __('home.services.steel.body') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="card-out-green">
                        <div class="card-green-content">
                            <div class="d-flex justify-content-between">
                                <img class="bg_green_icon" src="{{ url('img/service/warehouse.svg') }}" height="60" width="60">
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>{{ __('home.services.warehouse.title') }}</h3>
                                <p class="mb-0 min-h-145 fs-13px">
                                    {{ __('home.services.warehouse.body') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class=" card-out-green">
                        <div class="card-green-content">
                            <div class="d-flex justify-content-between">
                                <img class="bg_green_icon" src="{{ url('img/service/03-ให้คำปรึกษา.png') }}" height="60" width="60">
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service_alt') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>{{ __('home.services.consult.title') }}</h3>
                                <p class="mb-0 min-h-145 fs-12px hi-153">
                                    {{ __('home.services.consult.body') }}
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service_alt') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>{{ __('home.services.dismantle.title') }}</h3>
                                <p class="mb-0 min-h-125 fs-13px hi-153">{{ __('home.services.dismantle.body') }}
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service_alt') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3 style="font-size: 16px;">{{ __('home.services.surplus.title') }}</h3>
                                <p class="mb-0 min-h-125 fs-13px hi-153">
                                    {{ __('home.services.surplus.body') }}
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service_alt') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>{{ __('home.services.storage.title') }}</h3>
                                <p class="mb-0 min-h-145 fs-13p hi-153x">
                                    {!! __('home.services.storage.body') !!}</p>
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service_alt') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3 style="font-size: 16px;">{{ __('home.services.waste.title') }}</h3>
                                <p class="mb-0 min-h-125 fs-13px hi-153">
                                    {{ __('home.services.waste.body') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class=" card-out-green">
                        <div class="card-green-content">
                            <div class="d-flex justify-content-between">
                                <img class="bg_green_icon" src="{{ url('img/service/shredder-industrial-icon.png') }}" height="60" width="60">
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">{{ __('home.request_service_alt') }}</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3 style="font-size: 14px;">{{ __('home.services.plastic.title') }}</h3>
                                <p class="mb-0 min-h-125 fs-13px hi-153">
                                    {{ __('home.services.plastic.body') }}

                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @endif

        </div>
    </div>
</div>


<div class="ps-deal-of-day set-top-mobile-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>{{ __('home.about_heading') }}</h3>
                </div>
            </div>
            <a href="{{ url('/about') }}" class="">
                {{ __('common.view_all') }} <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
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

                            @include('partials.about-tabs')

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
                    <h3>{{ __('home.customers') }}</h3>
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
                    <h3>{{ __('home.licenses') }}</h3>
                </div>
            </div>
            <a href="{{ url('/certificate') }}" class="">
                {{ __('common.view_more') }} <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
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
                    <h3>{{ __('home.news') }}</h3>
                </div>
            </div>
            <a href="{{ url('/blog') }}" class="">
                {{ __('common.view_more') }} <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
        </div>

        <div class="ps-section__content">

            <div class="row">

                @isset($blog)
                    @foreach ($blog as $item)

                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail" style="overflow: hidden; max-height: 190px; min-height: 190px;">
                                    <a class="ps-post__overlay" href="{{ url('blog_detail/'.$item->id) }}"></a>
                                    <img src="{{ url('media/'.$item->image) }}" alt="{{ $item->title }}" style="max-height: 190px; min-height: 190px;">
                                </div>

                                <div class="ps-post__content">
                                    <a
                                    style="min-height: 72px; max-height: 72px; overflow: hidden;"
                                    class="ps-post__title"
                                    href="{{ url('blog_detail/'.$item->id) }}">
                                    {{ localized($item, 'title') }}
                                    </a>
                                    <p style="min-height: 68px; max-height: 68px; overflow: hidden;">{{ localized($item, 'sub_title') }}</p>
                                    {{-- English shows the Thai label when the post has no English title (existing behaviour). --}}
                                    <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('blog_detail/'.$item->id) }}">{{ app()->getLocale() === 'en' && blank($item->title_en) ? __('common.read_more', [], 'th') : __('common.read_more') }}</a>
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
