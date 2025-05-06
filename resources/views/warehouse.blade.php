@extends('layouts.template')

@section('title')
@if (session()->get('locale') == 'th')
เกี่ยวกับวงษ์พาณิชย์ - wpnrayong
@else
About us - wpnrayong
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
@stop('stylesheet')

<style>

    .set-pad-in-md{
        padding-right: 0px !important;
    padding-left: 0px !important;
    }
    .set-margin-card{
        margin-left: 8px !important;
    margin-right: 8px !important;
    }
    .video {
  width: 100%;
  aspect-ratio: 16 / 9;
  border: 1px solid red;
  overflow: hidden;
  position: relative;
}
iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  aspect-ratio: 16 / 9;
}
</style>
<style>
    .owl-carousel .owl-item img {
display: block;
width: 60px !important;
}
.set-pad-in-md {
padding-right: 10px !important;
padding-left: 10px !important;
}
.min-h-90{
min-height: 90px
}
.h-100-lh-20{
    height:100px;
    line-height:20px
}
.h-120-lh-20{
    height:120px !important;
    line-height:20px
}
.h-140-lh-20{
    height:140px !important;
    line-height:20px
}
.ps-about-intro .ps-section__header {
    max-width: 100% !important;
    margin: 0 auto 100px !important;
}
.ps-about-intro .ps-section__header h3 {
    margin-bottom: 40px;
    font-weight: 400;
    line-height: 1.3em;
    color: #000;
    font-size: 32px !important;
}
.ps-vendor-banner {
    position: relative;
    text-align: center !important;
    z-index: 10;
    padding: 160px 0 !important;
}
.ps-section--vendor .ps-section__header p {
    margin-bottom: 30px;
    font-size: 20px !important;
    font-weight: 600;
    color: #666666;
    text-transform: uppercase;
}
.ps-about-intro .ps-section__content {
    border-top: 1px solid #fffbff;
    padding-top: 90px;
}
</style>
@section('content')

<div class="ps-deal-of-day mt-30 pb-5px">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    @if(session()->get('locale') == 'th')
                    <h3>เช่า warehouse</h3>
                    @else
                    <h3>Warehouse</h3>
                    @endif
                </div>
            </div>

        </div>


    </div>
</div>

<div class="ps-page--single" >


<div class="ps-vendor-banner bg--cover" data-background="{{ url('img/slide/warehouse.jpg') }}" style="background: url({{ url('img/slide/warehouse.jpg') }});">
            <div class="container">
                <h2>พื้นที่ระยอง ขนาด 40,000 ตร.ม.. พื้นที่สงขลา ขนาด 29,600 ตร.ม.. ทำเลดี ใกล้เส้นทางคมนาคมหลัก ระบบรักษาความปลอดภัย 24 ชม. แบ่งให้เช่าตามความต้องการ </h2><a class="ps-btn ps-btn--lg" href="{{ url('/contact') }}">Request service</a>
            </div>
        </div>

 <div class="ps-section--vendor ps-vendor-about" style="padding: 100px 0 50px 0;">
            <div class="container">
                <div class="ps-section__header">
                    <p>เช่า Warehouse คลังสินค้า และ ลางวางสินค้าให้เช่า</p>
                    <h4>บริการให้เช่าโกดัง – คลังสินค้า ลานวางสินค้า พื้นที่ระยองและพื้นที่สงขลา แบบครบวงจร <br>พร้อมพื้นที่ให้เลือกหลากหลายขนาด ตอบสนองทุกความต้องการของธุรกิจ</h4>
                </div>
                <div class="ps-section__content">
                    <div class="row d-flex justify-content-center">
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--icon-box-2">
                                <div class="ps-block__thumbnail"><img src="{{ url('/img/download.jpg') }}" alt=""></div>
                                <div class="ps-block__content">
                                    <h4>ใกล้เส้นทางคมนาคมหลัก</h4>
                                    <div class="ps-block__desc" data-mh="about-desc" style="height: 76.7812px;">
                                        <p>ทำเลดี แบ่งให้เช่าตามความต้องการของลูกค้า พร้อมให้คำปรึกษาเกี่ยวกับการเลือกขนาดพื้นที่ที่เหมาะสม</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--icon-box-2">
                                <div class="ps-block__thumbnail"><img src="{{ url('/img/img001.png') }}" alt=""></div>
                                <div class="ps-block__content">
                                    <h4>ความปลอดภัยสูงสุด</h4>
                                    <div class="ps-block__desc" data-mh="about-desc" style="height: 76.7812px;">
                                        <p>การรักษาความปลอดภัยสูงสุดด้วย ระบบกล้องวงจรปิดตรวจจับตลอดเวลา</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--icon-box-2">
                                <div class="ps-block__thumbnail"><img src="{{ url('/img/contact24.png') }}" alt=""></div>
                                <div class="ps-block__content">
                                    <h4>บริการตลอด 24 ชั่วโมง</h4>
                                    <div class="ps-block__desc" data-mh="about-desc" style="height: 76.7812px;">
                                        <p>พร้อมให้บริการตลอด 24 ชั่วโมง 7 วัน มารถเข้าใช้โกดังของคุณได้ตลอดเวลา</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

<div class="ps-about-intro" style="padding: 0px 0 100px 0;">
            <div class="container">

            <br><br>
                <div class="ps-section__header" style="text-align: center;">
                    <h3>คลังสินค้าให้เช่า และ ลานวางสินค้า พื้นที่ระยอง ขนาด 40,000 ตร.ม. พื้นที่สงขลา ขนาด 16,000 ตร.ม. ทำเลดี ใกล้เส้นทางคมนาคมหลัก ระบบรักษาความปลอดภัย 24 ชม. แบ่งให้เช่าตามความต้องการ</h3>

                    <div class="ps-deal-of-day">
    <div class="container">


        <div class="ps-section__content" style="padding-top: 0px;">
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

                    <p>
                    บริการให้เช่าโกดัง – คลังสินค้า ลานวางสินค้า พื้นที่ระยองและพื้นที่สงขลา แบบครบวงจร พร้อมพื้นที่ให้เลือกหลากหลายขนาด ตอบสนองทุกความต้องการของธุรกิจ ไม่ว่าจะเป็นการเก็บสินค้า หรือเป็นศูนย์กระจายสินค้า แบ่งให้เช่าตามความต้องการของลูกค้า
                    พร้อมให้คำปรึกษาเกี่ยวกับการเลือกขนาดพื้นที่ที่เหมาะสม และสิ่งอำนวยความสะดวกครบครัน ระบบรักษาความปลอดภัย 24 ชั่วโมง
                    โครงสร้างพื้นฐานด้านสาธารณูปโภคที่มี เสถียรภาพ ช่วยให้ธุรกิจของคุณดำเนินไปอย่างสะดวก รวดเร็ว และมีประสิทธิภาพ</p>
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
