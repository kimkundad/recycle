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
                                <div class="ps-product__gallery" data-arrow="true" data-loops="true">
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
                                                                <td class="d-flex align-items-center f-about-1st">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    มุ่งพัฒนาธุรกิจรีไซเคิลอย่างครบวงจร เพื่อสร้างความพึงพอใจให้แก่ลูกค้าผ่านการนำเสนอผลิตภัณฑ์และการบริการที่มีคุณภาพ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center f-about-1st">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    นำ Digital Technology มาช่วยต่อยอดการบริการ <br>เพื่อรองรับลูกค้าทั้งในประเทศและต่างประเทศ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center f-about-1st">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    แสวงหาพันธมิตรทางธุรกิจ เพื่อพัฒนาศักยภาพและ<br>ขีดความสามารถในการแข่งขัน 
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center f-about-1st">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    มุ่งเน้นการบริหารจัดการ โดยคำนึงถึงสิ่งแวดล้อมตามมาตรฐานสากลและความปลอดภัยของชุมชนเป็นสำคัญ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center f-about-1st">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
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
                            <img src="{{ url('img/alliance/'.$item->image) }}" alt="{{ $item->name }}" class="" style="width: 100% !important;">
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
                        <li class="active"><a href="#tabx-1">นโยบายสิ่งแวดล้อม</a></li>
                        <li><a href="#tabx-2">นโยบายควบคุมคุณภาพ</a></li>
                        <li><a href="#tabx-3">นโยบาย HSE</a></li>
                        <li><a href="#tabx-4">นโยบาย CSR </a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tabx-1">
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-12" style="margin-bottom:20px">
                                    <div class=" card-out-green-head set-margin-card"> 
                                        <div class="card-green-content">
                                            <div class="ps-block__content_out-green text-center">
                                                <p class="mb-0"><b>บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด ดำเนินธุรกิจการให้บริการกำจัดวัสดุที่ไม่ใช้แล้วที่ไม่ปนเปื้อน โดยวิธีการรีไซเคิล เพื่อให้เกิดความมั่นใจต่อชุมชน สังคม และกลุ่มโรงงานอุตสาหกรรม บริษัทมีความมุ่งมั่นในการบริหารจัดการสิ่งแวดล้อม เพื่อลดปัญหาที่จะส่งผลกระทบต่อสิ่งแวดล้อมให้สอดคล้องกับธุรกิจ ดังนี้

                                                </b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ url('img/About/policy_about_page.png') }}" class="bor-r-12">
                                </div>
                                <div class="col-md-8">
                                    <div class="row ">
                                        <div class="col-md-6 set-pad-in-md ">
                                            <div class="card-green set-margin-card set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3115.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-20">
                                                        <p class="mb-0 min-h-89">มุ่งมั่นที่จะดำเนินระบบให้เป็นไปตามข้อกำหนดกฎหมายที่ว่าด้วย สิ่งแวดล้อม ระเบียบ และข้อบังคับที่เกี่ยวข้องอย่างเคร่งครัด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3116.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-20">
                                                        <p class="mb-0 min-h-89">เราจะสร้างความพึงพอใจให้กับลูกค้า และพัฒนาวิธีการนำวัสดุที่ไม่ใช้แล้ว นำกลับมาใช้ใหม่ให้ได้เกิดประโยชน์สูงสุด โดยไม่ก่อให้เกิดความเดือดร้อนรำคาญต่อชุมชนข้างเคียง</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16 set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-20">
                                                        <p class="mb-0 min-h-89">
                                                            มีมาตรการป้องกันน้ำที่มีโอกาสปนเปื้อนไหลสู่รางระบายน้ำสาธารณะและควบคุมการจัดการด้านสิ่งแวดล้อม พร้อมกับการใช้ทรัพยากรต่าง ๆ อย่างมีประสิทธิภาพ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class="card-green set-margin-card mt-16 set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3117.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-20">
                                                        <p class="mb-0 min-h-89">มุ่งมั่นส่งเสริมและสร้างจิตสำนึกให้พนักงานทุกระดับปฏิบัติตามมาตรการต่าง ๆ ด้านสิ่งแวดล้อม อาชีวอนามัย และความปลอดภัย โดยมีการปรับปรุงอย่างต่อเนื่อง อย่างมีประสิทธิภาพ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="ps-tab" id="tabx-2">
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-12" style="margin-bottom:20px">
                                    <div class=" card-out-green-head set-margin-card"> 
                                        <div class="card-green-content">
                                            <div class="ps-block__content_out-green text-center">
                                                <p class="mb-0"><b>บริษัท วงพาณิชย์รีไซเคิล ระยอง จำกัด ดำเนินธุรกิจการให้บริการกำจัดวัสดุที่ไม่ใช้แล้วที่ไม่เปนเปื้อน โดยวิธีการรีไซเคิล เพื่อให้เกิดความมั่นใจต่อชุมชน สังคม และกลุ่มโรงงานอุตสาหกรรม เพื่อให้เกิดความมุ่งมั่นต่อองค์กร ชุมชน และผู้มีส่วนได้ส่วนเสียว่า บริษัทมีความมุ่งมั่นในการบริหารจัดการคุณภาพและสิ่งแวดล้อมให้สอดคล้องกับธุรกิจ เพื่อช่วยลดปัญหาที่อาจเกิดผลกระทบโดยรวม ดังนี้
                                                </b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ url('img/About/policy_q_about_page.png') }}" class="bor-r-12">
                                </div>
                                <div class="col-md-8">
                                    <div class="row ">
                                        <div class="col-md-6 set-pad-in-md ">
                                            <div class="card-green set-margin-card set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3115.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-20">
                                                        <p class="mb-0 min-h-89">ผู้บริหารและพนักงานทุกคนตระหนักถึงความสำคัญและมุ่งเน้นการบริการอย่างมีคุณภาพ ควบคู่ความปลอดภัยและปฏิบัติตามข้อกำหนดกฎหมายที่เกี่ยวข้อง ทั้งนี้เพื่อให้ลูกค้าเกิดความพึงพอใจสูงสุด
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3116.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-20">
                                                        <p class="mb-0 min-h-89">ทบทวนประสิทธิภาพและประสิทธิผลของระบบบริหารคุณภาพเป็นระยะ เพื่อนำไปสู่กระบวนการปรับปรุงอย่างต่อเนื่อง
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16 set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-20">
                                                        <p class="mb-0 min-h-89">
                                                        มุ่งมั่น ส่งเสริม สร้างจิตสำนึกที่ดี มีส่วนร่วมในกิจกรรมด้านต่าง ๆ รวมถึงให้การสนับสนุนงานด้านสังคมและสาธารณประโยชน์</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class="card-green set-margin-card mt-16 set-padd-new"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3117.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-20">
                                                        <p class="mb-0 min-h-89">เผยแพร่นโยบายคุณภาพให้พนักงานทุกคน ตลอดจนผู้มีส่วนได้เสียที่เกี่ยวข้อทราบ เพื่อให้มั่นใจว่าบริษัทฯ มีความมุ่งมั่นที่จะรักษาไว้ซึ่งมาตรฐานการบริการอย่างมีคุณภาพ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="ps-tab" id="tabx-3">
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
                            </style>
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-12" style="margin-bottom:20px">
                                    <div class=" card-out-green-head set-margin-card"> 
                                        <div class="card-green-content">
                                            <div class="ps-block__content_out-green text-center">
                                                <p class="mb-0"><b>นโยบาย HSE (นโยบายความปลอดภัยอาชีวอนามัยและสภาพแวดล้อมในการทำงาน)
                                                    บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด มีความมุ่งมั่นในการสร้างสถานที่ทานให้น่าอยู่โดยเน้น </b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div style="margin-top:35px"></div>
                                    <img src="{{ url('img/About/HSE.png') }}" class="bor-r-12">
                                </div>
                                <div class="col-md-8">

                                    <div class="ps-section__header" style="margin-bottom: 0px !important; border-bottom: 1px solid #ffffff; padding-bottom: 0px;">
                                        <h3></h3>
                                        <div class="ps-section__nav">
                                            <a class="ps-carousel__prev" href=".ps-carousel--testimonials">
                                                <i class="icon-chevron-left"></i>
                                            </a>
                                            <a class="ps-carousel__next" href=".ps-carousel--testimonials">
                                                <i class="icon-chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="ps-carousel--testimonials owl-slider" 
                                    data-owl-auto="false"
                                     data-owl-loop="false" 
                                     data-owl-gap="10" 
                                     data-owl-nav="false" 
                                     data-owl-dots="false" 
                                     data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
                                       
                                        <div class="row">
                                            <div class="col-md-6 set-pad-in-md ">
                                                <div class="card-green set-margin-card set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="mt-8px img-60" src="{{ url('img/Group 3115.png') }}">
                                                        </div>
                                                        <div class="ps-block__content_green pt-25">
                                                            <p class="mb-0 min-h-90">บริษัทฯ มุ่งมั่นที่จะลดอุบัติเหตุและป้องกันพนักงานรวมทั้งบุคคลภายนอก ที่เข้ามาภายในบริษัทไม่ ให้เกิดอุบัติเหตุหรือโรคจากการทำงานใด ๆ ทั้งสิ้น รวมทั้งการมุ่งมั่นที่จะปฏิบัติตามกฎหมายกำหนด </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 set-pad-in-md">
                                                <div class=" card-out-greenxx set-margin-card set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="bg_green_icon rd-10 mt-8px img-60" src="{{ url('img/Group 3116.png') }}">
                                                        </div>
                                                        <div class="ps-block__content_out-green pt-25">
                                                            <p class="mb-0 min-h-90">บริษัทฯ มุ่งมั่นที่จะป้องการและปราบปรามพร้อมทั้งให้ความรู้ถึงพิษภัยและโทษทัณฑ์ของยาเสพติด เพื่อให้พนักงานบริษัท วงษ์พาณิชย์ฯ ปราศจากยาเสพติดและเป็นบริษัทสีขาว</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-6 set-pad-in-md">
                                                <div class=" card-out-greenxx set-margin-card mt-16 set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="mt-8px img-60" src="{{ url('img/Group 3118.png') }}" style="height:60px">
                                                            
                                                        </div>
                                                        <div class="ps-block__content_out-green ">
                                                            <p class="mb-0 min-h-90">
                                                            บริษัทฯ จะส่งเสริมกิจกรรมทุกกิจกรรมที่จะสร้างความปลอดภัยและสุขภาพอนามัยที่ดีแก่พนักงานตลอดจนพัฒนาและปรับปรุงสภาพแวดล้อมการทำงานให้เป็นสถานที่ทำงานที่ปลอดภัยน่าอยู่น่าทำงานและไม่เกิดผลกระทบต่อสิ่งแวดล้อม
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 set-pad-in-md">
                                                <div class="card-green set-margin-card mt-16 set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="bg_green_icon rd-10 mt-8px img-60" src="{{ url('img/Group 3117.png') }}">
                                                        </div>
                                                        <div class="ps-block__content_green pt-25">
                                                            <p class="mb-0 min-h-90">
                                                                พนักงานและบุคคลภายนอกที่เข้ามาภายในบริษัทฯ ทุกคน ต้องให้ความร่วมมือในกิจกรรมความปลอดภัยทุกกิจกรรมและดูแลรักษาความสะอาดและความเป็นระเบียบเรียบร้อยของสถานที่ปฏิบัติงานตามมาตรฐาน 5 ส
                                                                
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 set-pad-in-md">
                                                <div class="card-green set-margin-card mt-16 set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="mt-8px img-60" src="{{ url('img/five.png') }}" style="height:60px">
                                                        </div>
                                                        <div class="ps-block__content_green ">
                                                            <p class="mb-0 min-h-90">พนักงานทุกคนรวมทั้งบุคคลภายนอกที่เข้ามาภายในบริษัทฯ มีหน้าที่ต้องปฏิบัติตามกฎระเบียบความปลอดภัยในการทำงานของบริษัทฯ อย่างเคร่งครัดและระมัดระวังไม่ให้เกิดอุบัติเหตุและความสูญเสียใดๆ ทั้งต่อตนเองและเพื่อนร่วมงาน ตลอดจนทรัพย์สินของบริษัทฯ
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-6 set-pad-in-md">
                                                <div class=" card-out-greenxx set-margin-card mt-16 set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="bg_green_icon rd-10 mt-8px img-60" src="{{ url('img/six.png') }}">
                                                        </div>
                                                        <div class="ps-block__content_out-green ">
                                                            <p class="mb-0 min-h-90">ผู้บังคับบัญชาทุกระดับมีหน้าที่รับผิดชอบเกี่ยวกับความปลอดภัยของผู้ใต้บังคับบัญชาตามสายงานอย่างจริงจังและต่อเนื่อง ตลอดจนต้องฝึกสอนและเป็นตัวอย่างในการปฏิบัติตามกฎระเบียบความปลอดภัยในการทำงาน<br>ของบริษัทฯ
    
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-md-6 set-pad-in-md">
                                                <div class=" card-out-greenxx set-margin-card mt-16 set-pad-20"> 
                                                    <div class="card-green-content">
                                                        <div class="d-flex justify-content-between">
                                                            <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/seven.png') }}">
                                                        </div>
                                                        <div class="ps-block__content_out-green pt-25">
                                                            <p class="mb-0 min-h-90"> 
                                                                ทางบริษัทฯ จะนำการปฏิบัติงานด้านความปลอดภัยและการเกิดอุบัติเหตุในแต่ละแผนกเป็นส่วนหนึ่งในการพิจารณาต่อสัญญาการจ้างและประเมินผลการปฏิบัติ<br>งานประจำปี
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    {{-- <div class="row ">

                                        <div class="col-md-6 set-pad-in-md ">
                                            <div class="card-green set-margin-card"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3115.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0 ">มุ่งมั่นที่จะลดอุบัติเหตุและป้องกันพนักงานรวมทั้งบุคคลภายนอก ที่เข้ามาภายในบริษัทไม่ให้เกิดอุบัติเหตุหรือโรคจากการทำงานใดๆ ทั้งสิ้น รวมทั้งมุ่งมั่นที่จะปฏิบัติตามที่กฎหมายกำหนด                                                      </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3116.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 ">มุ่งมั่นที่จะป้องกันและปราบปรามพร้อมทั้งให้ความรู้ถึงพิษภัยและโทษทัณฑ์ของยาเสพติด เพื่อให้พนักงานปราศจากยากเสพติดและเป็นบริษัทสีขาว</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3118.png') }}" style="height:60px">
                                                        
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 ">
                                                            ส่งเสริมกิจกรรมสร้างความปลอดภัยและสุขภาพอนามัยที่ดีแก่พนักงาน ตลอดจนพัฒนาและปรับปรุงสภาพแวดล้อมการทำงานให้เป็นสถานที่ทำงานที่ปลอดภัยน่าอยู่น่าทำงานและไม่เกิดผลกระทบต่อสิ่งแวดล้อม
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class="card-green set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3117.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0 ">
                                                            พนักงานและบุคคลภายนอกที่เข้ามาภายในบริษัทฯ ทุกคน ต้องให้ความร่วมมือในกิจกรรมความปลอดภัยทุกกิจกรรมและดูแลรักษาความสะอาดและความเป็นระเบียบเรียบร้อยของสถานที่ปฏิบัติงานตามมาตรฐาน 5 ส
                                                            
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class="card-green set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/five.png') }}" style="height:60px">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0 ">พนักงานทุกคนรวมทั้งบุคคลภายนอกที่เข้ามาภายในบริษัทฯ มีหน้าที่ต้องปฏิบัติตามกฎระเบียบความปลอดภัยในการทำงานของบริษัทฯ อย่างเคร่งครัดและระมัดระวังไม่ให้เกิดอุบัติเหตุและความสูญเสียใดๆ ทั้งต่อตนเองและเพื่อนร่วมงาน ตลอดจนทรัพย์สินของบริษัทฯ
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/six.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 ">ผู้บังคับบัญชาทุกระดับมีหน้าที่รับผิดชอบเกี่ยวกับความปลอดภัยของผู้ใต้บังคับบัญชาตามสายงานอย่างจริงจังและต่อเนื่อง ตลอดจนต้องฝึกสอนและเป็นตัวอย่างในการปฏิบัติตามกฎระเบียบความปลอดภัยในการทำงานของบริษัทฯ

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/seven.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 "> 
                                                            ทางบริษัทฯ จะนำการปฏิบัติงานด้านความปลอดภัยและการเกิดอุบัติเหตุในแต่ละแผนกเป็นส่วนหนึ่งในการพิจารณาต่อสัญญาการจ้างและประเมินผลการปฏิบัติงานประจำปี
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                    </div> --}}
                                    
                                </div>
                            </div>
                        </div>

                        <div class="ps-tab" id="tabx-4">
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-12" style="margin-bottom:20px">
                                    <div class=" card-out-green-head set-margin-card set-pad-18x"> 
                                        <div class="card-green-content">
                                            <div class="ps-block__content_out-green text-center">
                                                <p class="mb-0"><b>บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด ดำเนินธุรกิจการประมูลค้าของเก่า การให้บริการด้านการจัดการวัสดุที่ใช้แล้ว การคัดแยกเพื่อการรีไซเคลิ นำกลับมาใช้และจำหน่าย มีความรับผิดชอบต่อชุมชน และสังคม เป็นหนึ่งในนโยบายหลักในการบริหาร โดยให้ความสำคัญต่อการสร้างสรรค์สิ่งแวดล้อมให้สังคมในชุมชนรอบโรงงาน และ การมีส่วนร่วมในชุมชน ซึ่งมีนโยบายในการดำเนินงานดังต่อไปนี้
                                                </b></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ url('img/About/CSR.png') }}" class="bor-r-12">
                                </div>
                                <div class="col-md-8">
                                    <div class="row ">
                                        <div class="col-md-6 set-pad-in-md ">
                                            <div class="card-green set-margin-card set-pad-18x"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3115.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0 min-h-67">มุ่งมั่น พัฒนา ในธุรกิจเจริญเติบโตอย่างยั่งยืน ควบคู่การดูแลเอาใจใส่สิ่งแวดล้อมและความปลอดภัยของชุมชน และให้ความช่วยเหลือ สังคมด้วยความตั้งใจ
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card set-pad-18x"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3116.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 min-h-67">ช่วยเหลือและพัฒนาสังคมโดยใช้จุดแข็งด้านประสบการณ์การจัดการวัสดุที่ไม่ใช้แล้วมาใช้เพื่อความรับผิดชอบต่อสังคม
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16 set-pad-18x"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 min-h-67">ดำเนินกิจกรรมด้านความรับผิดชอบต่อสังคมให้เกิดประโยชน์ต่อสังคมทั้ง ชุมชนใกล้ : ชุมชนรอบโรงงาน และชุมชนไกล : ชุมชนในพื้นที่ห่างไกลที่สาธารณูปโภคเข้าไปไม่ถึง (Society)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class="card-green set-margin-card mt-16 set-pad-18x"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="mt-8px" src="{{ url('img/Group 3117.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_green pt-25">
                                                        <p class="mb-0 min-h-67" style="min-height:89px">มุ่งเน้นการใช้ทรัพยากรอย่างเกิดประโยชน์สูงสุดแทนการปล่อยทิ้งไปโดยสูญเปล่า โดยอิงปรัชญาของเศรษฐกิจพอเพียง ที่ใช้ประโยชน์จากทรัพยากรท้องถิ่นให้มากที่สุด
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