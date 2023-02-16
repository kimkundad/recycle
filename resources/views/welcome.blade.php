@extends('layouts.template')

@section('stylesheet')
@stop('stylesheet')

@section('content')


<div class="ps-home-banner">
    <div class="ps-carousel--nav-inside owl-slider" 
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
    data-owl-animate-in="fadeIn" 
    data-owl-animate-out="fadeOut"
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

                <div class="ps-banner--autopart" data-background="{{ url('/img/slider/'.$item->image) }}">
                    <img src="{{ url('/img/slider/slide_1.png') }}" alt="">
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
            <div class="ps-carousel--nav owl-slider sec-slide" 
            data-owl-auto="false" 
            data-owl-loop="false" 
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
                            <a href="{{ url('category/'.$u->id) }}">
                            <img class="img-fluid" src="{{ url('img/category/'.$u->image) }}"> 
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
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="{{ url('product_detail/'.$u->id_q) }}"><img src="{{ url('img/product/'.$u->image_pro) }}" alt="{{ $u->name_pro }}" /></a>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                        <div class="ps-product__content">
                                            @if($u->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}</p>
                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del></p>
                                            @endif
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                        </div>
                                        <div class="ps-product__content hover">
                                            @if($u->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}</p>
                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del></p>
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
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
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
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green "> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับประมูลงานเหล็ก โครงสร้าง ฯลฯ</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>ให้คำปรึกษา</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>บริการทำลายเอกสาร</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>บริการจัดเก็บของเสียอุตสาหกรรม</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/icon/Group 3112.png') }}">
                            <a class="green_btn_kim_out btn_card_in" href="#">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>บริการพิเศษอื่นๆ</h3>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        </div>
                    </div>
                </div>
            </div>
                
            </div>
           
        </div>
    </div>
</div>


<div class="ps-deal-of-day">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>เกี่ยวกับวงษ์พาณิชย์</h3>
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
                                    <div class="item"><a href="{{ url('img/thum/image 4.png') }}"><img src="{{ url('img/thum/image 4.png') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/thum/image 2.png') }}"><img src="{{ url('img/thum/image 2.png') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/thum/image 3.png') }}"><img src="{{ url('img/thum/image 3.png') }}" alt=""></a></div>
                                </div>
                            </div>
                        </figure>
                        <div class="ps-product__variants" data-item="3" data-md="3" data-sm="3" data-arrow="false">
                            <div class="item"><img src="{{ url('img/thum/image 4.png') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/thum/image 2.png') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/thum/image 3.png') }}" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body ps-product--detail card-body-x">

                            <div class="ps-product__content ps-tab-root">
                                <ul class="ps-tab-list">
                                    <li class="active"><a href="#tab-1">เกี่ยวกับบริษัท</a></li>
                                    <li><a href="#tab-2">วิสัยทัศน์</a></li>
                                    <li><a href="#tab-3">พันธกิจ</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                                <h4>บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</h4>
                                                <p>ก่อตั้งขึ้นโดยทีมบริหารที่มีประสบการณ์และมีความชำนาญในธุรกิจด้านการนำวัสดุที่ใช้แล้วกลับมาใช้ใหม่ <br><br>
                                                    ตลอดระยะเวลาที่ผ่านมา บริษัทวงษ์พาณิชย์รีไซเคิลฯ  จัดจำหน่ายสินค้าที่ได้มาตราฐาน อีกทั้งการบริการที่รวดเร็ว 
                                                    ตรงต่อเวลา เพื่อตอบสนองความต้องการของตลาดอย่างแท้จริง เพื่อให้ลูกค้าทุกท่านได้รับความพึงพอใจสูงสุด 
                                                    โดยทีมงานฝ่ายขาย ฝ่ายการตลาด และฝ่ายจัดส่ง ที่พร้อมจะตอบสนองความต้องการของลูกค้าตลอดไป  
                                                    ซึ่ง สินค้าที่ทาง บริษัทวงษ์พาณิชย์รีไซเคิลฯ รับซื้อ และ ขาย หลักๆ นอกเหนือจาก เศษเหล็กทั่วไป พลาสติก ก็จะมี 
                                                    เหล็กกล้าไร้สนิม โลหะอัลลอย ซิงค์ นิกเกิล ดีบุก สแตนเลส อลูมิเนียม ตะกั่ว ทองแดง สายไฟ พาเลทพลาสติกพาเลทไม้
                                                     เครื่องจักรต่าง ทั้งนี้ทางบริษัทวงษ์พาณิชย์รีไซเคิล ระยอง จำกัด. เรายังรับริการทำลายเอกสารสำคัญต่างๆ อีกด้วย <br><br>
                                                    เริ่มต้นกิจการเมื่อปี 2517 ด้วยเงินลงทุนเพียง 1,000 บาท โดยใช้รถปิกอัพเก่าๆ 1 คัน ออกรับซื้อของเก่าตามหมู่บ้านต่างๆ ทั้ง 9 อำเภอ
                                                     ในจังหวัดพิษณุโลก จากนั้นธุรกิจได้เติบโตอย่างต่อเนื่องจนเพิ่มรถเป็น 3 คัน และมีตึกแถวหลายคูหา ปริมาณขยะที่รับซื้อเพิ่มมากขึ้นจนกระทั่งในปี 2532
                                                      จึงได้มีการสร้างโรงงานคัดแยกขยะครบวงจรบนเนื้อที่ 6 ไร่ 2 งาน นับเป็นโรงงานคัดแยกขยะรีไซเคิลที่ทันสมัยที่สุดแห่งประเทศไทย ด้วยเงินลงทุนกว่า50ล้านบาท
                                                       สามารถรองรับปริมาณขยะได้ถึง 800,000 – 1,000,000 กิโลกรัม/วัน ปัจจุบันมีเนื้อที่กว่า 12 ไร่ มีพนักงานกว่า 150 คน โดยรับซื้อวัสดุเหลือใช้และวัสดุที่ต้องการกำจัดประเภท 
                                                       พลาสติก กระดาษ โลหะ ขวดแก้ว อุปกรณ์สำนักงาน หรือแม้แต่ขยะเศษอาหารและขยะที่ไม่สามารถนำกลับมาใช้ใหม่ได้ 
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                                <h4>วิสัยทัศน์ วงษ์พาณิชย์รีไซเคิล </h4>
                                                <p>ก่อตั้งขึ้นโดยทีมบริหารที่มีประสบการณ์และมีความชำนาญในธุรกิจด้านการนำวัสดุที่ใช้แล้วกลับมาใช้ใหม่ <br><br>
                                                    ตลอดระยะเวลาที่ผ่านมา บริษัทวงษ์พาณิชย์รีไซเคิลฯ  จัดจำหน่ายสินค้าที่ได้มาตราฐาน อีกทั้งการบริการที่รวดเร็ว 
                                                    ตรงต่อเวลา เพื่อตอบสนองความต้องการของตลาดอย่างแท้จริง เพื่อให้ลูกค้าทุกท่านได้รับความพึงพอใจสูงสุด 
                                                    โดยทีมงานฝ่ายขาย ฝ่ายการตลาด และฝ่ายจัดส่ง ที่พร้อมจะตอบสนองความต้องการของลูกค้าตลอดไป  
                                                    ซึ่ง สินค้าที่ทาง บริษัทวงษ์พาณิชย์รีไซเคิลฯ รับซื้อ และ ขาย หลักๆ นอกเหนือจาก เศษเหล็กทั่วไป พลาสติก ก็จะมี 
                                                    เหล็กกล้าไร้สนิม โลหะอัลลอย ซิงค์ นิกเกิล ดีบุก สแตนเลส อลูมิเนียม ตะกั่ว ทองแดง สายไฟ พาเลทพลาสติกพาเลทไม้
                                                     เครื่องจักรต่าง ทั้งนี้ทางบริษัทวงษ์พาณิชย์รีไซเคิล ระยอง จำกัด. เรายังรับริการทำลายเอกสารสำคัญต่างๆ อีกด้วย <br><br>
                                                    เริ่มต้นกิจการเมื่อปี 2517 ด้วยเงินลงทุนเพียง 1,000 บาท โดยใช้รถปิกอัพเก่าๆ 1 คัน ออกรับซื้อของเก่าตามหมู่บ้านต่างๆ ทั้ง 9 อำเภอ
                                                     ในจังหวัดพิษณุโลก จากนั้นธุรกิจได้เติบโตอย่างต่อเนื่องจนเพิ่มรถเป็น 3 คัน และมีตึกแถวหลายคูหา ปริมาณขยะที่รับซื้อเพิ่มมากขึ้นจนกระทั่งในปี 2532
                                                      จึงได้มีการสร้างโรงงานคัดแยกขยะครบวงจรบนเนื้อที่ 6 ไร่ 2 งาน นับเป็นโรงงานคัดแยกขยะรีไซเคิลที่ทันสมัยที่สุดแห่งประเทศไทย ด้วยเงินลงทุนกว่า50ล้านบาท
                                                       สามารถรองรับปริมาณขยะได้ถึง 800,000 – 1,000,000 กิโลกรัม/วัน ปัจจุบันมีเนื้อที่กว่า 12 ไร่ มีพนักงานกว่า 150 คน โดยรับซื้อวัสดุเหลือใช้และวัสดุที่ต้องการกำจัดประเภท 
                                                       พลาสติก กระดาษ โลหะ ขวดแก้ว อุปกรณ์สำนักงาน หรือแม้แต่ขยะเศษอาหารและขยะที่ไม่สามารถนำกลับมาใช้ใหม่ได้ 
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-3">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                                <h4>พันธกิจ วงษ์พาณิชย์รีไซเคิล </h4>
                                                <p>ก่อตั้งขึ้นโดยทีมบริหารที่มีประสบการณ์และมีความชำนาญในธุรกิจด้านการนำวัสดุที่ใช้แล้วกลับมาใช้ใหม่ <br>
                                                    ตลอดระยะเวลาที่ผ่านมา บริษัทวงษ์พาณิชย์รีไซเคิลฯ  จัดจำหน่ายสินค้าที่ได้มาตราฐาน อีกทั้งการบริการที่รวดเร็ว 
                                                    ตรงต่อเวลา เพื่อตอบสนองความต้องการของตลาดอย่างแท้จริง เพื่อให้ลูกค้าทุกท่านได้รับความพึงพอใจสูงสุด 
                                                    โดยทีมงานฝ่ายขาย ฝ่ายการตลาด และฝ่ายจัดส่ง ที่พร้อมจะตอบสนองความต้องการของลูกค้าตลอดไป  
                                                    ซึ่ง สินค้าที่ทาง บริษัทวงษ์พาณิชย์รีไซเคิลฯ รับซื้อ และ ขาย หลักๆ นอกเหนือจาก เศษเหล็กทั่วไป พลาสติก ก็จะมี 
                                                    เหล็กกล้าไร้สนิม โลหะอัลลอย ซิงค์ นิกเกิล ดีบุก สแตนเลส อลูมิเนียม ตะกั่ว ทองแดง สายไฟ พาเลทพลาสติกพาเลทไม้
                                                     เครื่องจักรต่าง ทั้งนี้ทางบริษัทวงษ์พาณิชย์รีไซเคิล ระยอง จำกัด. เรายังรับริการทำลายเอกสารสำคัญต่างๆ อีกด้วย <br>
                                                    เริ่มต้นกิจการเมื่อปี 2517 ด้วยเงินลงทุนเพียง 1,000 บาท โดยใช้รถปิกอัพเก่าๆ 1 คัน ออกรับซื้อของเก่าตามหมู่บ้านต่างๆ ทั้ง 9 อำเภอ
                                                     ในจังหวัดพิษณุโลก จากนั้นธุรกิจได้เติบโตอย่างต่อเนื่องจนเพิ่มรถเป็น 3 คัน และมีตึกแถวหลายคูหา ปริมาณขยะที่รับซื้อเพิ่มมากขึ้นจนกระทั่งในปี 2532
                                                      จึงได้มีการสร้างโรงงานคัดแยกขยะครบวงจรบนเนื้อที่ 6 ไร่ 2 งาน นับเป็นโรงงานคัดแยกขยะรีไซเคิลที่ทันสมัยที่สุดแห่งประเทศไทย ด้วยเงินลงทุนกว่า50ล้านบาท
                                                       สามารถรองรับปริมาณขยะได้ถึง 800,000 – 1,000,000 กิโลกรัม/วัน ปัจจุบันมีเนื้อที่กว่า 12 ไร่ มีพนักงานกว่า 150 คน โดยรับซื้อวัสดุเหลือใช้และวัสดุที่ต้องการกำจัดประเภท 
                                                       พลาสติก กระดาษ โลหะ ขวดแก้ว อุปกรณ์สำนักงาน หรือแม้แต่ขยะเศษอาหารและขยะที่ไม่สามารถนำกลับมาใช้ใหม่ได้ 
                                                    </p>
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

<div class="ps-client-say">
    <div class="container">
        <div class="ps-section__content">
            <div class="ps-carousel--testimonials owl-slider" 
            data-owl-auto="true" 
            data-owl-loop="true" 
            data-owl-speed="10000" 
            data-owl-gap="30" 
            data-owl-nav="false" 
            data-owl-dots="false" 
            data-owl-item="8" 
            data-owl-item-xs="3" 
            data-owl-item-sm="3" 
            data-owl-item-md="4" 
            data-owl-item-lg="3" 
            data-owl-duration="1000" 
            data-owl-mousedrag="on">

                @isset($ban)
                    @foreach ($ban as $item)
                        <div class="ps-block--testimonial text-center">
                            <img src="{{ url('img/brand/'.$item->image) }}" alt="{{ $item->name }}" class="max-h-55">
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
        </div>

        @if(count($cer) === 5 )
        <div class="img-portfolio">
            <div class="dg-wrapper ps-section__content">
                <div class="text-center img_ro img_rotation1">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[0]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[0]->name }}</h4>
                    </div>
                </div>
                <div class="text-center img_ro img_rotation2">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[1]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[1]->name }}</h4>
                </div>
                </div>
                <div class="text-center img_ro img_rotation3">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[2]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[2]->name }}</h4>
                </div>
                </div>
                <div class="text-center img_ro img_rotation4">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[3]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[3]->name }}</h4>
                </div>
                </div>
                <div class="text-center img_ro img_rotation5">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[4]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[4]->name }}</h4>
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
                                    <a class="ps-post__title" href="{{ url('blog_detail/'.$item->id) }}">{{ $item->title }}</a>
                                    <p>{{ $item->sub_title }}</p>
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
@stop('scripts')