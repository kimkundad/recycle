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
                                    <li class="active"><a href="#tab-1">เกี่ยวกับเรา</a></li>
                                    <li><a href="#tab-2">วิสัยทัศน์</a></li>
                                    <li><a href="#tab-3">พันธกิจ</a></li>
                                </ul>
                                <div class="ps-tabs">
                                    <div class="ps-tab active" id="tab-1">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                                <br>
                                                <h4>บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</h4>
                                                <p>ผู้นำด้านธุรกิจรีไซเคิลที่มีประสบการณ์และความเชี่ยวชาญด้านการรีไซเคิลวัสดุเหลือใช้ <br><br>
                                                    ทั้งที่ไม่เป็นอันตรายและเป็นอันตรายจากโรงงานอุตสาหกรรม รวมไปถึงโลหะทุกประเภท 
                                                    อาทิเช่น เหล็ก สแตนเลส ทองแดง ทองเหลือง อะลูมิเนียม แบตเตอรี่ น้ำมันที่ใช้แล้ว 
                                                    พลาสติกทุกชนิด เครื่องยนต์ เครื่องจักร อะไหล่ ฯลฯ <br><br> โดยเราเป็นทั้งผู้รับซื้อและผู้จำหน่าย 
                                                    ครอบคลุมไปถึงการประมูลวัสดุเหลือใช้ทั้งจากโรงงานอุตสาหกรรมขนาดใหญ่ เช่นแยกก๊าซ ปิโตรเคมี 
                                                    โรงกลั่นน้ำมัน โรงไฟฟ้า โรงงานชิ้นส่วนยานยนต์ และอุตสาหกรรมหนักทุกประเภท 
                                                    ด้วยมาตรฐานการจัดเก็บที่ถูกต้อง ปลอดภัย และมีประสิทธิภาพ โดยคำนึงถึงสภาพแวดล้อมเป็นสำคัญ

                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-2">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                                <br>
                                                <h4>วิสัยทัศน์ วงษ์พาณิชย์รีไซเคิล </h4>
                                                <p>วงษ์พาณิชย์รีไซเคิล ระยอง มุ่งมั่นสู่การเป็นผู้นำด้านธุรกิจรีไซเคิลระดับประเทศ <br><br>
                                                    ด้วยกลยุทธ์ ความเชี่ยวชาญมาตรฐานระดับสากล บุคลากรมืออาชีพ สร้างระบบเศรษฐกิจหมุนเวียนเพื่อการเติบโตอย่างยั่งยืน
                                                     โดยคำนึงถึงคุณภาพสิ่งแวดล้อม และความปลอดภัยเป็นสำคัญ 
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-tab" id="tab-3">
                                        <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 350px;">
                                            <div class="scrollable-content">
                                             
                                                <style>
                                                    .table td, .table th {
                                                        border-top: 1px solid #ffffff;
                                                    }
                                                </style>
                                                <br>
                                                <div class="table-responsive mb-9">
                                                    <table class="table mb-3">
                                                        <tbody>
                                                            
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    มุ่งพัฒนาธุรกิจรีไซเคิลอย่างครบวงจร เพื่อสร้างความพึงพอใจให้แก่ลูกค้าผ่านการนำเสนอผลิตภัณฑ์และการบริการที่มีคุณภาพ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    นำ Digital Technology มาช่วยต่อยอดการบริการ เพื่อรองรับลูกค้าทั้งในประเทศและต่างประเทศ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    แสวงหาพันธมิตรทางธุรกิจ เพื่อพัฒนาศักยภาพและขีดความสามารถในการแข่งขัน 
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center">
                                                                    <b class="top-10"><i class="fa fa-genderless text-success fs-2 me-2"></i></b> 
                                                                    มุ่งเน้นการบริหารจัดการ โดยคำนึงถึงสิ่งแวดล้อมตามมาตรฐานสากลและความปลอดภัยของชุมชนเป็นสำคัญ
                                                                </td>
                                                            </tr>
                                                            <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                                <td class="d-flex align-items-center">
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
                        <li class="active"><a href="#tabx-1">นโยบายสิ่งแวดล้อม</a></li>
                        <li><a href="#tabx-2">นโยบายควบคุมคุณภาพ</a></li>
                        <li><a href="#tabx-3">นโยบาย HSE</a></li>
                        <li><a href="#tabx-4">นโยบาย CSR </a></li>
                    </ul>
                    <div class="ps-tabs">
                        <div class="ps-tab active" id="tabx-1">
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
                                                        <p class="mb-0 min-h-67">ดำเนินธุรกิจตามข้อกำหนดและระเบียบปฏิบัติด้านกฎหมายสิ่งแวดล้อมอย่างเคร่งครัด</p>
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
                                                        <p class="mb-0 min-h-67">มุ่งเน้นการบริหารจัดการ โดยคำนึงถึงการลดผลกระทบด้านสิ่งแวดล้อม และความปลอดภัยของชุมชนเป็นสำคัญ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 min-h-67">จัดทำระบบการจัดการสิ่งแวดล้อมโดยถือเป็นส่วนหนึ่งของการดำเนินธุรกิจ รวมทั้งการติดตามและรายงานผลการดำเนินงานด้านการพัฒนาอย่างต่อเนื่อง                                                        </p>
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
                                                        <p class="mb-0 min-h-67">เสริมสร้างความตระหนักรู้และส่งเสริมการมีส่วนร่วมเกี่ยวกับมาตรฐานสิ่งแวดล้อมให้แก่พนักงานทุกระดับ</p>
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
                                                        <p class="mb-0 min-h-67">บริหารจัดการด้านคุณภาพและความปลอดภัยอย่างต่อเนื่อง เพื่อให้สอดคล้องกับข้อกำหนดตามมาตรฐานการดำเนินงานของบริษัทอย่างเคร่งครัดและมีประสิทธิผล                                                        </p>
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
                                                        <p class="mb-0 min-h-67">ตรวจสอบประสิทธิภาพและผลลัพธ์ของการควบคุมคุณภาพ เพื่อให้เกิดประสิทธิภาพสูงสุด</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 min-h-67">เสริมสร้างความตระหนักรู้เกี่ยวกับนโยบายควบคุมคุณภาพให้แก่พนักงาน
                                                            เพื่อให้การดำเนินงานดำรงอยู่ในมาตรฐาน และสร้างความพึงพอใจให้แก้ผู้ใช้บริการ</p>
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
                                                        <p class="mb-0 min-h-67">พัฒนาศักยภาพของบุคลากรให้มีความรู้ความสามารถ เพื่อให้การดำเนินงานบรรลุวัตถุประสงค์ตามเป้าหมายขององค์กร</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="ps-tab" id="tabx-3">
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-12">
                                    <div class=" card-out-green-head set-margin-card"> 
                                        <div class="card-green-content">
                                            <div class="ps-block__content_out-green text-center">
                                                <p class="mb-0"><b>บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด มีความมุ่งมั่นในการสร้างสถานที่ทำงานให้น่าอยู่โดยเน้น 4 เรื่องสำคัญ ได้แก่ สะอาด ปลอดภัย ไร้มลพิษ มีชีวิตชีวาในการทำงาน</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p class="mb-0 min-h-134">มุ่งมั่นที่จะลดอุบัติเหตุและป้องกันพนักงานรวมทั้งบุคคลภายนอก ที่เข้ามาภายในบริษัทไม่ให้เกิดอุบัติเหตุหรือโรคจากการทำงานใดๆ ทั้งสิ้น รวมทั้งมุ่งมั่นที่จะปฏิบัติตามที่กฎหมายกำหนด                                                      </p>
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
                                                        <p class="mb-0 min-h-134">มุ่งมั่นที่จะป้องกันและปราบปรามพร้อมทั้งให้ความรู้ถึงพิษภัยและโทษทัณฑ์ของยาเสพติด เพื่อให้พนักงานปราศจากยากเสพติดและเป็นบริษัทสีขาว</p>
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
                                                        <p class="mb-0 min-h-134">
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
                                                        <p class="mb-0 min-h-134">
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
                                                        <p class="mb-0 min-h-134">พนักงานทุกคนรวมทั้งบุคคลภายนอกที่เข้ามาภายในบริษัทฯ มีหน้าที่ต้องปฏิบัติตามกฎระเบียบความปลอดภัยในการทำงานของบริษัทฯ อย่างเคร่งครัดและระมัดระวังไม่ให้เกิดอุบัติเหตุและความสูญเสียใดๆ ทั้งต่อตนเองและเพื่อนร่วมงาน ตลอดจนทรัพย์สินของบริษัทฯ
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
                                                        <p class="mb-0 min-h-134">ผู้บังคับบัญชาทุกระดับมีหน้าที่รับผิดชอบเกี่ยวกับความปลอดภัยของผู้ใต้บังคับบัญชาตามสายงานอย่างจริงจังและต่อเนื่อง ตลอดจนต้องฝึกสอนและเป็นตัวอย่างในการปฏิบัติตามกฎระเบียบความปลอดภัยในการทำงานของบริษัทฯ

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
                                                        <p class="mb-0 min-h-134"> 
                                                            ทางบริษัทฯ จะนำการปฏิบัติงานด้านความปลอดภัยและการเกิดอุบัติเหตุในแต่ละแผนกเป็นส่วนหนึ่งในการพิจารณาต่อสัญญาการจ้างและประเมินผลการปฏิบัติงานประจำปี
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="ps-tab" id="tabx-4">
                            <div class="row align-content-lg-stretch">
                                <div class="col-md-12" style="margin-bottom:20px">
                                    <div class=" card-out-green-head set-margin-card"> 
                                        <div class="card-green-content">
                                            <div class="ps-block__content_out-green text-center">
                                                <p class="mb-0"><b>บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด ยึดมั่นในหลักจริยธรรมทางธุรกิจ <br>โดยมุ่งหวังที่จะยกระดับและพัฒนาคุณภาพชีวิตของคนในสังคม เพื่อเป็นรากฐานที่ดีในการสร้างสังคมที่แข็งแกร่งอย่างยั่งยืน
                                                </b></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p class="mb-0 min-h-67">มุ่งมั่นดำเนินธุรกิจด้วยการรับผิดชอบต่อสังคม (Corporate Social Responsibility: CSR) ภายใต้หลักพื้นฐานทางจริยธรรม เพื่อการเติบโตอย่างยั่งยืนร่วมกับชุมชน</p>
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
                                                        <p class="mb-0 min-h-67">นำประสบการณ์และความเชี่ยวชาญทางด้านเทคโนโลยี มาร่วมพัฒนาคุณภาพชีวิตของคนในชุมชน และสิ่งแวดล้อม</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 set-pad-in-md">
                                            <div class=" card-out-greenxx set-margin-card mt-16"> 
                                                <div class="card-green-content">
                                                    <div class="d-flex justify-content-between">
                                                        <img class="bg_green_icon rd-10 mt-8px" src="{{ url('img/Group 3118.png') }}">
                                                    </div>
                                                    <div class="ps-block__content_out-green pt-25">
                                                        <p class="mb-0 min-h-67">ส่งเสริมกิจกรรมเพื่อสังคมและชุมชน มุ่งลดการใช้งานทรัพยากรจากเขตภูมิภาคให้น้อยที่สุด                                                      </p>
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
                                                        <p class="mb-0 min-h-67">สร้างความตระหนักรู้ ความเข้าใจ และความร่วมมือ ในโครงการหรือกิจกรรมด้าน CSR ให้แก่บุคคลากรทุกระดับ
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