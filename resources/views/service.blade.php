@extends('layouts.template')

@section('title')
@if (session()->get('locale') == 'th')
บริการของเรา - wpnrayong
@else
Product and Sevice - wpnrayong
@endif
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

    </style>
@stop('stylesheet')

@section('content')


<div class="ps-deal-of-day" style="    padding-top: 50px;">
    <div class="container">
        <div class="ps-section__header">
            @if(session()->get('locale') == 'th')
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>หมวดหมู่สินค้า</h3>
                </div>
            </div>
            <a href="{{ url('/category?id=0') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
            @else
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>Product category</h3>
                </div>
            </div>
            <a href="{{ url('/category?id=0') }}" class="">
                See more <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
            @endif

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
            @if(session()->get('locale') == 'th')
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>สินค้าแนะนำ</h3>
                </div>
            </div>
            <a href="{{ url('/recomment') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
            @else
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>Recommended Products</h3>
                </div>
            </div>
            <a href="{{ url('/recomment') }}" class="">
                View all <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
            @endif

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
                                        @if(session()->get('locale') == 'th')
                                        <a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                        @else
                                            @if($u->name_pro_en == null)
                                                <a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                            @else
                                                <a class="ps-product__vendor" href="#">{{ $u->name_pro_en }}</a>
                                            @endif

                                        @endif
                                        <div class="ps-product__content">
                                            @if($u->discount == 0)

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}">
                                                    @if(session()->get('locale') == 'th')
                                                    <b>ติดต่อฝ่ายขาย</b>
                                                    @else
                                                    <b>Contact Seller</b>
                                                    @endif
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
                                                    @if(session()->get('locale') == 'th')
                                                    <b>ติดต่อฝ่ายขาย</b>
                                                    @else
                                                    <b>Contact Seller</b>
                                                    @endif
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

                                            @if(session()->get('locale') == 'th')
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                            @else
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">View</a>
                                            @endif
                                        </div>
                                        <div class="ps-product__content hover">
                                            @if($u->discount == 0)

                                            @if($u->typePrice == 1)
                                            <p class="ps-product__price sale">
                                                <a href="{{ url('/contact') }}">
                                                    @if(session()->get('locale') == 'th')
                                                    <b>ติดต่อฝ่ายขาย</b>
                                                    @else
                                                    <b>Contact Seller</b>
                                                    @endif
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
                                                    @if(session()->get('locale') == 'th')
                                                    <b>ติดต่อฝ่ายขาย</b>
                                                    @else
                                                    <b>Contact Seller</b>
                                                    @endif
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
                                            @if(session()->get('locale') == 'th')
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                            @else
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">View</a>
                                            @endif
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

<div class="ps-deal-of-day mt-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    @if(session()->get('locale') == 'th')
                    <h3>บริการของเรา</h3>
                    @else
                    <h3>Our services</h3>
                    @endif
                </div>
            </div>


        </div>
        <div class="ps-section__content">
            @if(session()->get('locale') == 'th')
            <div class="row">

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
    <div class=" card-out-green">
        <div class="card-green-content">
            <div class="d-flex justify-content-between">
                <img class="bg_green_icon" src="{{ url('img/service/03-ให้คำปรึกษา.png') }}" height="60" width="60">
                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request service</a>
            </div>
            <div class="ps-block__content_out-green pt-20">
                <h3>Consultancy about Comprehensive Recycling</h3>
                <p class="mb-0 min-h-145 fs-12px hi-153">
                    Consultancy services about comprehensive recycling
                    with experience and expertise in recycling scrap materials,
                    including both non-hazardous and hazardous materials from industrial factories,
                    metals and all types of scrap materials.
                    Consultancy about environmental quality management
                    Providing training in waste separation and management
                    with efficient recycling processes.
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
                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request service</a>
            </div>
            <div class="ps-block__content_out-green pt-20">
                <h3>Dismantling, Removal, Transporting and Demolition of Scrap Materials</h3>
                <p class="mb-0 min-h-125 fs-13px hi-153">Dismantling, removal, and transport services for factories, warehouses, machinery,
                    and disused equipment by an efficient professional team with experience and expertise using labor-saving machinery for transporting goods,
                    trucks, and safe cargo transport system management.
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
                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request service</a>
            </div>
            <div class="ps-block__content_out-green pt-20">
                <h3 style="font-size: 16px;">Purchase, Custody, and Sale of All Types of Scrap Materials and Equipment.</h3>
                <p class="mb-0 min-h-125 fs-13px hi-153">
                    Purchase, Custody, and Sale of all types of scrap materials and disused equipment,
                    including both hazardous and non-hazardous materials from industrial factories, such as metals, stainless steel, copper,
                    brass, aluminum, batteries, used oil, all types of plastic, motors, machinery, parts, etc.
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
                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request service</a>
            </div>
            <div class="ps-block__content_out-green pt-20">
                <h3>Recyclable Product Collection Services</h3>
                <p class="mb-0 min-h-145 fs-13p hi-153x">
                    The right recyclable product collection services
                    Sufficient space and system for handling goods
                    with consideration given to saving the environment and ensuring safety.<br> </p>
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
                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request service</a>
            </div>
            <div class="ps-block__content_out-green pt-20">
                <h3 style="font-size: 16px;">Waste and Materials Transport Services for Treatment/Disposal at the Destination </h3>
                <p class="mb-0 min-h-125 fs-13px hi-153">
                    Waste and Materials transport service provision for treatment and disposal at the destination that is safe and meets standards.
                    Plans for handling transport in emergency situations
                    and permission to transport both toxic and non-toxic waste,
                    including urgent service provision when factories require such services.</p>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
    <div class=" card-out-green">
        <div class="card-green-content">
            <div class="d-flex justify-content-between">
                <img class="bg_green_icon" src="{{ url('img/service/shredder-industrial-icon.png') }}" height="60" width="60">
                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request service</a>
            </div>
            <div class="ps-block__content_out-green pt-20">
                <h3 style="font-size: 14px;">Grinding, Sorting, Screening and Packaging Services for All Types of Plastic Objects</h3>
                <p class="mb-0 min-h-125 fs-13px hi-153">
                    Plastic service provision, particularly plastic sorting,
                    grinding and screening for sorting by plastic type. Sending crushed plastic to the COMPOUND process
                    and returning it to the factory to help reduce production costs and help support the environment.

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

<div class="ps-deal-of-day mt-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>Highlight Projects</h3>
                </div>
            </div>
        </div>
        <div class="ps-section__content">

            <div class="row line-green row-mo">
                <div class="col-md-5 desktop-d hide-green-ban ps-product--detail ps-product--fullwidth" style="margin-bottom: 0rem;">
                    @if(isset($hpro[0]->image))
                    <img id="img-hili2" src="{{ url('img/hproject/'.$hpro[0]->image) }}" class="img-fluid bor-r-12" >
                    @endif
                </div>
                <div class="col-md-7 desktop-990">

                    <div class="hide-green-ban-mo">
                        @if(isset($hpro[0]->image))
                        <img id="img-hili" src="{{ url('img/hproject/'.$hpro[0]->image) }}" class="w-100 bor-r-12">
                        @endif
                    </div>

                    <div class="card" style="border: 1px solid rgb(0 0 0 / 0%);">
                        <div class="card-body ps-product--detail " style="margin-bottom: 0rem;">

                            <div class="ps-product__content ps-tab-root">
                                @php
                                    $h = 1;
                                    @endphp
                                <ul class="ps-tab-list">
                                    @if(isset($hpro))
                                    @foreach($hpro as $u)

                                    <li class="
                                    @if($h == 1)
                                    active
                                    @endif"><a href="#tab-{{ $u->id }}" class="fs-12 aHilight" data-image="{{ $u->image }}">{{ $u->header }}</a></li>

                                    @php
                                    $h++;
                                    @endphp
                                    @endforeach
                                    @endif


                                </ul>
                                <div class="ps-tabs">
                                    @php
                                    $s = 1;
                                    @endphp
                                    @if(isset($hpro))
                                    @foreach($hpro as $u)


                                    <div class="ps-tab
                                    @if($s == 1)
                                    active
                                    @endif
                                    " id="tab-{{ $u->id }}">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                                <h4>{{ $u->header }}</h4>

                                                @if(session()->get('locale') == 'th')
                                                <p style="font-size: 16px;">{{ $u->content }}</p>
                                                @else
                                                    @if($u->content_en == null)
                                                        <p style="font-size: 16px;">{{ $u->content }}</p>
                                                    @else
                                                        <p style="font-size: 16px;">{{ $u->content_en }}</p>
                                                    @endif

                                                @endif

                                            </div>
                                        </div>
                                    </div>

                                    @php
                                    $s++;
                                    @endphp
                                    @endforeach
                                    @endif


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<br><br>


{{-- <div class="ps-deal-of-day">
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
                                <div class="ps-block__number">
                                    <img class="img-fluid" src="{{ url('images/wpnrayong/subcat/'.$u->image) }}">
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
                                    <div class="ps-product__thumbnail"><a href="{{ url('product_detail/'.$u->id_q) }}">
                                        <img src="{{ url('images/wpnrayong/product/'.$u->image_pro) }}" alt="{{ $u->name_pro }}" /></a>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                        <div class="ps-product__content">
                                            @if($u->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                        </div>
                                        <div class="ps-product__content hover">
                                            @if($u->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                            @if($u->unit_id !== 3 && $u->unit_id !== null)
                                            <b> {{ $u->name_unit }}</b>
                                            @endif
                                            </p>
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
</div> --}}


@endsection

@section('scripts')

<script type="text/javascript">

        $(".aHilight").click(function() {
            var image = $(this).data('image');
            console.log(image);
            $("#img-hili").attr('src', "img/hproject/"+image);
            $("#img-hili2").attr('src', "img/hproject/"+image);
        });

</script>

@stop('scripts')
