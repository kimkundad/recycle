@extends('layouts.template')

@section('title')
เกี่ยวกับวงษ์พาณิชย์ - wpnrayong
@stop

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
</style>

@section('content')

<div class="ps-deal-of-day mt-30 pb-5px">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>เกี่ยวกับวงษ์พาณิชย์</h3>
                </div>
            </div>
            
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


<div class="ps-deal-of-day mt-5">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>ใบอนุญาตและรางวัล</h3>
                </div>
            </div>
        </div>
        @if(count($cer) === 6 )
        <div class="img-portfolio">
            <div class="dg-wrapper ps-section__content">
                <div class="text-center img_ro img_rotation1" data-image="{{ $cer[0]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[0]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[0]->name }}</h4>
                    </div>
                </div>
                <div class="text-center img_ro img_rotation2" data-image="{{ $cer[1]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[1]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[1]->name }}</h4>
                </div>
                </div>
                <div class="text-center img_ro img_rotation3" data-image="{{ $cer[2]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[2]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[2]->name }}</h4>
                </div>
                </div>
                <div class="text-center img_ro img_rotation4" data-image="{{ $cer[3]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[3]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[3]->name }}</h4>
                </div>
                </div>
                <div class="text-center img_ro img_rotation5" data-image="{{ $cer[4]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[4]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[4]->name }}</h4>
                    </div>
                </div>
                <div class="text-center img_ro img_rotation6" data-image="{{ $cer[5]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[5]->image) }}" >
                        <h4 class="text-gray-400 fs-16px">{{ $cer[5]->name }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


<div class="ps-deal-of-day mt-veri">
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
            <div class="row justify-content-center">

                @isset($ban)
                    @foreach ($ban as $item)
                        <div class="col-xs-6 col-sm-2 mt-15">
                            <img src="{{ url('img/alliance/'.$item->image) }}" alt="{{ $item->name }}" class="max-h-45">
                        </div>
                    @endforeach
                @endisset

            </div>
            
          
        

                

            
            
        </div>
    </div>
</div>


<div class="ps-deal-of-day mt-40">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>นโยบาย</h3>
                </div>
            </div>
        </div>
        <div class="card" style="border: 1px solid rgb(0 0 0 / 0%);">
            <div class="card-body ps-product--detail card-body-x pl-0 pr-0">

                <div class="ps-product__content ps-tab-root">
                    <ul class="ps-tab-list">
                        <li class="active"><a href="#tab-1">นโยบายสิ่งแวดล้อม</a></li>
                        <li><a href="#tab-2">Quality Policy</a></li>
                        <li><a href="#tab-3">CSR Policy</a></li>
                        <li><a href="#tab-4">SHE Policy </a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tab-1">
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-4">
                                    <img src="{{ url('img/policy 448x542.jpg') }}" class="bor-r-12">
                                </div>
                                <div class="col-md-8">
                                    <div class="row ">
                                        <div class="col-md-6 set-pad-in-md ">
                                            <div class="card-green set-margin-card"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3115.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0">To commit practice in accordance with the law of environment and strictly in related regulations.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-green set-margin-card"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3116.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0">To commit practice in accordance with the law of environment and strictly in related regulations.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-green set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0">To commit practice in accordance with the law of environment and strictly in related regulations.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class="card-green set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3117.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0">To commit practice in accordance with the law of environment and strictly in related regulations.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="ps-tab" id="tab-2">
                            <div >
                                
                            </div>
                        </div>
                        <div class="ps-tab" id="tab-3">
                            <div >
                                
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