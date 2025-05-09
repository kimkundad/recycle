@extends('layouts.template')


@section('title')
    @if (session()->get('locale') == 'th')
        วงษ์พาณิชย์รีไซเคิล ระยอง - wpnrayong
    @else
        Wongpanit Recycle Rayong
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
                        @if(session()->get('locale') == 'th')
                            <div class="ps-banner__content" >
                                <h4 class="sub-head-w">{{ $item->title }}</h4>
                                <h3 class="head-slide-w">{{ $item->big_title }}</h3>
                                <p class="detail-slide-w"><?php echo nl2br($item->sub_title); ?></p>
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
                        @else

                        @if($item->title_en == null)

                        <div class="ps-banner__content" >
                                <h4 class="sub-head-w">{{ $item->title }}</h4>
                                <h3 class="head-slide-w">{{ $item->big_title }}</h3>
                                <p class="detail-slide-w"><?php echo nl2br($item->sub_title); ?></p>
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
                        @else

                            <div class="ps-banner__content" >
                                <h4 class="sub-head-w">{{ $item->title_en }}</h4>
                                <h3 class="head-slide-w">{{ $item->big_title_en }}</h3>
                                <p class="detail-slide-w"><?php echo nl2br($item->sub_title_en); ?></p>
                                <div class="d-flex">
                                    @if( $item->g_btn === 1)
                                    <a class="btn-green-b" href="{{ $item->g_btn_url !== null ? $item->g_btn_url : "#" }}"> {{ $item->g_btn_text_en }}</a>
                                    @endif
                                    @if( $item->w_btn === 1)
                                    {{-- <a class="btn-green-w-g" href="#"  data-toggle="modal" data-target="#product-quickview"> {{ $item->w_btn_text }}</a> --}}
                                    <a class="btn-green-w-g" href="{{ $item->w_btn_url !== null ? $item->w_btn_url : "#" }}"> {{ $item->w_btn_text_en }}</a>
                                    @endif
                                </div>
                            </div>
                        @endif


                        @endif

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


<div class="ps-deal-of-day set-top-mobile-30">
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request Service</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>Industrial Plant, Petrochemical Plant, and Power Plant Demolition</h3>
                                <p class="mb-0 min-h-125 fs-13px">
                                    We provide demolition services for industrial plants, petrochemical plants,<br>
                                    power plants, large buildings, and warehouses. Our projects are systematically planned and supervised by demolition engineers using modern, high-efficiency machinery. We offer a complete logistics system and purchase surplus equipment from demolitions, including machinery, scrap metal, copper, and stainless steel, at competitive prices.
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/steel?id=10') }}">Request Service</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>Structural Steel</h3>
                                <p class="mb-0 min-h-145 fs-13px">
                                    We offer a complete range of structural steel products in the Eastern region under the trusted name "WPN". Our commitment lies in sourcing high-quality steel products, with strict quality control and production processes that comply with TIS standards, to meet the diverse needs of construction, industrial projects, and various structural works effectively.
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
                                <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">Request Service</a>
                            </div>
                            <div class="ps-block__content_out-green pt-20">
                                <h3>Warehouse for Rent</h3>
                                <p class="mb-0 min-h-145 fs-13px">
                                    We offer comprehensive warehouse rental services, including storage yards, in Rayong and Songkhla areas. A variety of space sizes are available to meet all your business needs, whether for storage or as a distribution center. Spaces can be rented flexibly according to your requirements, with consultation services for selecting suitable space sizes. Fully equipped facilities and 24-hour security are provided.
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


<div class="ps-deal-of-day set-top-mobile-30">
    <div class="container">
        <div class="ps-section__header">
            @if(session()->get('locale') == 'th')
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>เกี่ยวกับเรา</h3>
                </div>
            </div>
            <a href="{{ url('/about') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
            @else
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>About us</h3>
                </div>
            </div>
            <a href="{{ url('/about') }}" class="">
                View all <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
            @endif

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

                            @if(session()->get('locale') == 'th')
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
                            @else
                            <div class="ps-product__content ps-tab-root">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">About us</a></li>
                                    <li><a href="#tab-2">Vision</a></li>
                                    <li><a href="#tab-3">Mission</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content d-flex justify-content-center">
                                                <div style="max-width:380px">
                                                <br>
                                                <h4>About us</h4>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px;">Recycling Business Leaders with Experience and Expertise in Recycling Scrap Materials </p>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px; text-align: justify">
                                                    including both hazardous and non-hazardous materials from industrial factories and all types of metals,
                                                    such as metals, stainless steel, copper, brass, aluminum, battery, used oil,
                                                    all types of plastic, motors, machinery, parts, etc.
                                                    We are both buyers and sellers
                                                    whose roles include bidding for scrap materials from large industrial factories such as petrochemical gas separation plants,
                                                    oil refineries, electrical power plants, parts factories vehicle factories, and all types of plants in heavy industries
                                                    with correct, safe and efficient collection standards with primary consideration given to environmental conditions.

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
                                                <h4>Wongpanit Recycle's Vision </h4>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px;">Wongpanit Recycle Rayong is committed to becoming a national leader in the recycling business </p>
                                                <p style="text-indent: 1.5em;margin-bottom: 0px; text-align: justify">  with strategy and expertise meeting international standards,
                                                    professional personnel generating economic systems for sustainable growth,
                                                    and primary consideration given to environmental conditions and safety.
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
                                                <h4>Wongpanit Recycle's Mission </h4>
                                                <div class="table-responsive mb-9">
                                                    <table class="table mb-3">
                                                        <tbody>

                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b>
                                                                    Commitment to development of a one-stop recycling business to build customer satisfaction through the provision of quality products and services.
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b>
                                                                    Application of digital technology to improve services in order to support both domestic and foreign customers.
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b>
                                                                    Seeking of business allies to develop competitive capacity and ability.
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b>
                                                                    Commitment to management with primary consideration given to environmental conditions and safety.
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex  f-about-1st">
                                                                    <b class="top-10x"><i class="fa fa-genderless text-success fs-2 me-2"></i></b>
                                                                    Strict compliance with the law under good governance principles with corporate social responsibility.
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
                            @endif

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
                    @if(session()->get('locale') == 'th')
                    <h3>ลูกค้าของเรา</h3>
                    @else
                    <h3>Our Customers</h3>
                    @endif
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

        @if(session()->get('locale') == 'th')
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
        @else
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>License and Awards</h3>
                </div>
            </div>
            <a href="{{ url('/certificate') }}" class="">
                View More <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
        </div>
        @endif

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

        @if(session()->get('locale') == 'th')
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
        @else
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>News</h3>
                </div>
            </div>
            <a href="{{ url('/blog') }}" class="">
                View More <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
        </div>
        @endif

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

                                @if(session()->get('locale') == 'th')
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
                                @else
                                    @if($item->title_en == null)
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
                                    @else
                                    <div class="ps-post__content">
                                        <a
                                        style="min-height: 72px; max-height: 72px; overflow: hidden;"
                                        class="ps-post__title"
                                        href="{{ url('blog_detail/'.$item->id) }}">
                                        {{ $item->title_en }}
                                        </a>
                                        <p style="min-height: 68px; max-height: 68px; overflow: hidden;">{{ $item->sub_title_en }}</p>
                                        <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('blog_detail/'.$item->id) }}">Read more</a>
                                    </div>
                                    @endif
                                @endif
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
