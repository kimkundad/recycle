@extends('layouts.template')

@section('title')
บริการของเรา - wpnrayong
@stop

@section('stylesheet')


@stop('stylesheet')

@section('content')




<div class="ps-deal-of-day mt-30">
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
                            <img class="bg_green_icon" src="{{ url('img/service/03-ให้คำปรึกษา.jpg') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>ให้คำปรึกษาด้านรีไซเคิลแบบครบวงจร</h3>
                            <p class="mb-0 min-h-145 fs-13px">บริการให้คำปรึกษาด้านการรีไซเคิลแบบครบวงจร ด้วยประสบการณ์และความเชี่ยวชาญด้านการรีไซเคิลวัสดุเหลือใช้ ทั้งที่ไม่เป็นอันตรายและเป็นอันตรายจากโรงงานอุตสาหกรรม รวมไปถึงโลหะและวัสดุเหลือใช้ทุกประเภท ให้คำปรึกษาเรื่องการจัดการคุณภาพสิ่งแวดล้อม จัดอบรมเรื่องการแยกของเสียและการจัดการของเสีย ด้วยกระบวนการรีไซเคิลที่มีประสิทธิภาพ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green "> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <img class="bg_green_icon" src="{{ url('img/service/04-บริการทำลายเอกสาร.jpg') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับรื้อ ถอน ขนย้าย และทำลายวัสดุอุปกรณ์ที่ไม่ใช้แล้ว</h3>
                            <p class="mb-0 min-h-125 fs-13px">บริการรื้อ ถอน ขนย้าย โรงงาน คลังสินค้า เครื่องจักร และทำลายวัสดุอุปกรณ์ที่ไม่ใช้แล้ว ดำเนินงานโดยทีมงานมืออาชีพที่มีประสบการณ์และความเชี่ยวชาญ ด้วยเครื่องจักรทุ่นแรงในการเคลื่อนย้าย พร้อมรถบรรทุกและการบริหารระบบขนส่งที่ปลอดภัย</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green "> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img class="bg_green_icon ml-5px" src="{{ url('img/service/02-รับประมูลงานเหล็ก_2.jpg') }}" height="60" width="60">
                            </div>
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับซื้อ ฝาก ขาย วัสดุและอุปกรณ์ที่ไม่ใช้แล้วทุกประเภท</h3>
                            <p class="mb-0 min-h-125 fs-13px">รับซื้อ ฝาก ขาย วัสดุและอุปกรณ์ที่ไม่ใช้แล้วทุกประเภท ทั้งที่เป็นอันตรายและไม่เป็นอันตรายจากโรงงาน
                                อุตสาหกรรม อาทิ เช่น เหล็ก สแตนเลส ทองแดง ทองเหลือง อะลูมิเนียม แบตเตอรี่ น้ำมันเก่าที่ใช้แล้ว พลาสติกทุกชนิด เครื่องยนต์ เครื่องจักร อะไหล่ ฯลฯ
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            
                            <img class="bg_green_icon" src="{{ url('img/service/01-รับซื้อวัสดุรีไซเคิล.jpg') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับบริการจัดเก็บสินค้ารีไซเคิล</h3>
                            <p class="mb-0 min-h-145 fs-13px">บริการจัดเก็บสินค้ารีไซเคิลที่ถูกต้องเหมาะสม คำนึงถึงการรักษาสภาพแวดล้อมและความปลอดภัย มีพื้นที่รองรับปริมาณอย่างเพียงพอ</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class=" card-out-green"> 
                    <div class="card-green-content">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <img class="bg_green_icon" src="{{ url('img/service/05-บริการจัดเก็บของเสียอุตสาหกรรม.jpg') }}" height="60" width="60">
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
                            <img class="bg_green_icon" src="{{ url('img/service/06-บริการพิเศษอื่นๆ.jpg') }}" height="60" width="60">
                            <a class="green_btn_kim_out btn_card_in" href="{{ url('/contact') }}">ขอรับบริการ</a>
                        </div>
                        <div class="ps-block__content_out-green pt-20">
                            <h3>รับบริการพิเศษอื่นๆ เช่น ทำใบอนุญาตที่เกี่ยวข้องของกรมโรงงานอุตสาหกรรม</h3>
                            <p class="mb-0 min-h-125 fs-13px">บริการให้คำปรึกษา การขอใบอนุญาตที่เกี่ยวข้องกับกรมโรงงานอุตสาหกรรม รับดำเนินการจัดเตรียมเอกสารและรายงานต่าง ๆ ในการขออนุญาตเกี่ยวกับโรงงานโดยทีมงาน<br>ผู้เชี่ยวชาญ
                            </p>
                        </div>
                    </div>
                </div>
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
                    <h3>Highlight Projects</h3>
                </div>
            </div>
        </div>
        <div class="ps-section__content">
            
            <div class="row line-green row-mo">
                <div class="col-md-5 desktop-d hide-green-ban ps-product--detail ps-product--fullwidth" style="margin-bottom: 0rem;">
                    <img id="img-hili2" src="{{ url('img/hproject/'.$hpro[0]->image) }}" class="img-fluid bor-r-12" >
                </div>
                <div class="col-md-7 desktop-990">

                    <div class="hide-green-ban-mo">
                        <img id="img-hili" src="{{ url('img/hproject/'.$hpro[0]->image) }}" class="w-100 bor-r-12">
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
                                                <p style="font-size: 16px;">{{ $u->content }}
                                                    </p>
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


<div class="ps-deal-of-day mt-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>หมวดหมู่สินค้า</h3>
                </div>
            </div>
            {{-- <a href="{{ url('category?id=0') }}" class="">
                ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}"> 
            </a> --}}
            
        </div>
        <div class="ps-section__content">
            <div class="row">
            
                @if(get_data_category())
                        @foreach(get_data_category() as $u)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <a href="{{ url('category?id='.$u->id) }}" class="text-center">
                                <img class="img-fluid" src="{{ url('img/category/'.$u->image) }}"> 
                                <p style="margin-top:10px">{{ $u->cat_name }}</p>
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