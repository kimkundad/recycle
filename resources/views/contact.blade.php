@extends('layouts.template')

@section('title')
@if (session()->get('locale') == 'th')
ติดต่อเรา - wpnrayong
@else
Contact us - wpnrayong
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

@section('content')


<div class="ps-deal-of-day mt-30 pb-0px">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    @if(session()->get('locale') == 'th')
                    <h3>ติดต่อเรา</h3>
                    @else
                    <h3>Contact us</h3>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

<div class="ps-vendor-banner bg--cover desktop-d" data-background="{{ url('img/bg-contact.png') }}" style="background: url({{ url('img/bg-contact.png') }});">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-md-3">
                <div class="set-box-green-800">

                    @if(session()->get('locale') == 'th')
                    <div class="box-green-800">
                        <p style="margin-bottom: 4px; padding-bottom: 0px; font-size:16px">ที่อยู่</p>
                        <h4 style="margin-bottom: 4px;">สำนักงานใหญ่</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/place/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%A7%E0%B8%87%E0%B8%A9%E0%B9%8C%E0%B8%9E%E0%B8%B2%E0%B8%93%E0%B8%B4%E0%B8%8A%E0%B8%A2%E0%B9%8C%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%84%E0%B8%B4%E0%B8%A5+%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%AD%E0%B8%87+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/data=!4m2!3m1!1s0x0:0x23f4b615e2e82d1c?sa=X&ved=1t:2428&hl=en-US&ictx=111&cshid=1741235549668208" target="_blank">แผนที่</a>
                        </p>

                        <h4 style="margin-bottom: 4px;">สำนักงานห้วยโป่ง</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 22/9 ซ.ชากลูกหญ้า 4 ถ.วัดชากลูกหญ้า ต.ห้วยโป่ง อ.เมืองระยอง จ.ระยอง 21150 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/@12.7513181,101.1252694,17z?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">แผนที่</a></p>

                        <h4 style="margin-bottom: 4px;">สำนักงานสงขลา</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 428 หมู่2 ต.พะวง อ.เมืองสงขลา จ.สงขลา 90100 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/place/WPN+Recycle+Rayong+SKL/@7.1349492,100.5747619,17z/data=!3m1!4b1!4m6!3m5!1s0x304d33930e9c7071:0x5c2d395e1452c1f2!8m2!3d7.1349492!4d100.5747619!16s%2Fg%2F11tfk8qn8b?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">แผนที่</a></p>
                        <h4 class="mt-10">ช่องทางการติดต่อ</h4>
                        <p>โทรศัพท์ : <a href="tel:{{ get_phone2() }}">{{ get_phone2() }}</a>, <a href="tel:{{ get_phone() }}">{{ get_phone() }}</a>, <a href="tel:0945692969">0945692969</a><br>
                        อีเมล : <a href="mailto: {{ get_email() }}">{{ get_email() }}</a></p>
                    </div>
                    @else
                    <div class="box-green-800">
                        <p style="margin-bottom: 4px; padding-bottom: 0px; font-size:16px">Address</p>
                        <h4 style="margin-bottom: 4px;">Head office</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">Wongpanit Recycle Rayong Co., LTD.</p>
                        <p>1/1 Moo 4 Nikhompattana subdistrict, Nikhompattana district, Rayong province 21180 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/place/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%A7%E0%B8%87%E0%B8%A9%E0%B9%8C%E0%B8%9E%E0%B8%B2%E0%B8%93%E0%B8%B4%E0%B8%8A%E0%B8%A2%E0%B9%8C%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%84%E0%B8%B4%E0%B8%A5+%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%AD%E0%B8%87+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/data=!4m2!3m1!1s0x0:0x23f4b615e2e82d1c?sa=X&ved=1t:2428&hl=en-US&ictx=111&cshid=1741235549668208" target="_blank">Map</a></p>

                        <h4 style="margin-bottom: 4px;">Huai Pong Office</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">Wongpanit Recycle Rayong Co., LTD.</p>
                        <p>22/9 Soi.Chaklukya 4, Watchaklukya Road,
                            Huaypong subdistrict, Muang Rayong district,
                            Rayong province 21150 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/@12.7513181,101.1252694,17z?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Map</a></p>


                        <h4 style="margin-bottom: 4px;">Songkhla Office</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">Wongpanit Recycle Rayong Co., LTD.</p>
                        <p>428 Moo. 2, Phawong subdistrict, Mueang Songkhla district, Songkhla province 90100 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/place/WPN+Recycle+Rayong+SKL/@7.1349492,100.5747619,17z/data=!3m1!4b1!4m6!3m5!1s0x304d33930e9c7071:0x5c2d395e1452c1f2!8m2!3d7.1349492!4d100.5747619!16s%2Fg%2F11tfk8qn8b?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Map</a></p>
                        <h4 class="mt-10">Contact</h4>
                        <p>Phone : <a href="tel:{{ get_phone2() }}">{{ get_phone2() }}</a>, <a href="tel:{{ get_phone() }}">{{ get_phone() }}</a>, <a href="tel:0945692969">0945692969</a><br>
                        Email : <a href="mailto: {{ get_email() }}">{{ get_email() }}</a></p>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col col-md-7">
                <div class="d-flex justify-content-end bg-white-con">
                    <form class="ps-form--contact-us" id="contactForm">
                        @if(session()->get('locale') == 'th')
                        <h3>ติดต่อเรา</h3>
                        <p class="fs-16 fw-700">ท่านสามารถติดต่อสอบถาม ซื้อสินค้า ขอใช้บริการ ผ่านช่องทางด้านล่าง</p>
                        @else
                        <h3>Contact us</h3>
                        <p class="fs-16 fw-700">You can contact us to inquire, purchase products, and request services through the channels below.</p>
                        @endif

                        @if(session()->get('locale') == 'th')
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุชื่อ-นามสกุลของคุณ" name="name" id='name' required />
                                    <label for="name" class="form__label">ชื่อ-นามสกุล</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุอีเมลของคุณ" name="email" id='email' required />
                                    <label for="email" class="form__label">อีเมล</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุเบอร์โทรศัพท์ของคุณ" name="phone" id='phone' required />
                                    <label for="phone" class="form__label">เบอร์โทรศัพท์</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <select class="form__field" aria-label="Select example" name="type" id='type'>
                                        <option>กรุณาเลือกหัวข้อที่ต้องการ</option>

                                        @isset($type_contact)
                                            @foreach ($type_contact as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endisset

                                    </select>
                                    <label for="name" class="form__label">หัวข้อที่ต้องการติดต่อ</label>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <textarea class="form__field" placeholder="ระบุข้อความที่ต้องการ" style="height:80px" maxlength="500" name="massage" id='massage'></textarea>
                                    <label for="massage" class="form__label">ข้อความ (<span id="count">500</span>/500)</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                            </div>
                        </div>
                        <div class="text-center mt-20">
                            <button  class="ps-btn--fullwidth-green btn-block" id="btnSendData" style="border-radius: 5px">ส่งข้อความ</button >
                        </div>
                        @else
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Enter your first and last name." name="name" id='name' required />
                                    <label for="name" class="form__label">First name and last name</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Enter your email" name="email" id='email' required />
                                    <label for="email" class="form__label">Email</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="Enter your phone number" name="phone" id='phone' required />
                                    <label for="phone" class="form__label">Phone No.</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <select class="form__field" aria-label="Select example" name="type" id='type'>
                                        <option>Please select the desired topic.</option>

                                        @isset($type_contact)
                                            @foreach ($type_contact as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endisset

                                    </select>
                                    <label for="name" class="form__label">Topic you want to contact</label>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <textarea class="form__field" placeholder="Required message" style="height:80px" maxlength="500" name="massage" id='massage'></textarea>
                                    <label for="massage" class="form__label">message (<span id="count">500</span>/500)</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                            </div>
                        </div>
                        <div class="text-center mt-20">
                            <button  class="ps-btn--fullwidth-green btn-block" id="btnSendData" style="border-radius: 5px">Send</button >
                        </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="desktop-h">
    <div class="p-15">
        <div class="">

                    @if(session()->get('locale') == 'th')
                    <div class="box-green-800">
                        <p style="margin-bottom: 4px; padding-bottom: 0px; font-size:16px">ที่อยู่</p>
                        <h4 style="margin-bottom: 4px;">สำนักงานใหญ่</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/place/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%A7%E0%B8%87%E0%B8%A9%E0%B9%8C%E0%B8%9E%E0%B8%B2%E0%B8%93%E0%B8%B4%E0%B8%8A%E0%B8%A2%E0%B9%8C%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%84%E0%B8%B4%E0%B8%A5+%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%AD%E0%B8%87+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/data=!4m2!3m1!1s0x0:0x23f4b615e2e82d1c?sa=X&ved=1t:2428&hl=en-US&ictx=111&cshid=1741235549668208" target="_blank">แผนที่</a></p>

                        <h4 style="margin-bottom: 4px;">สำนักงานห้วยโป่ง</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 22/9 ซ.ชากลูกหญ้า 4 ถ.วัดชากลูกหญ้า ต.ห้วยโป่ง อ.เมืองระยอง จ.ระยอง 21150 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/@12.7513181,101.1252694,17z?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Map</a></p>
                        <h4 style="margin-bottom: 4px;">สำนักงานสงขลา</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด</p>
                        <p>ที่อยู่ 428 หมู่2 ต.พะวง อ.เมืองสงขลา จ.สงขลา 90100 <br>
                        <a style="color: #ffbf00;" href="https://www.google.com/maps/place/WPN+Recycle+Rayong+SKL/@7.1349492,100.5747619,17z/data=!3m1!4b1!4m6!3m5!1s0x304d33930e9c7071:0x5c2d395e1452c1f2!8m2!3d7.1349492!4d100.5747619!16s%2Fg%2F11tfk8qn8b?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Map</a></p>
                        <h4 class="mt-10">ช่องทางการติดต่อ</h4>
                        <p>โทรศัพท์ : <a href="tel:{{ get_phone2() }}">{{ get_phone2() }}</a>, <a href="tel:{{ get_phone() }}">{{ get_phone() }}</a>, <a href="tel:0945692969">0945692969</a><br>
                        อีเมล : <a href="mailto: {{ get_email() }}">{{ get_email() }}</a></p>
                    </div>
                    @else
                    <div class="box-green-800">
                        <p style="margin-bottom: 4px; padding-bottom: 0px; font-size:16px">Address</p>
                        <h4 style="margin-bottom: 4px;">Head office</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">Wongpanit Recycle Rayong Co., LTD.</p>
                        <p>1/1 Moo 4 Nikhompattana subdistrict, Nikhompattana district, Rayong province 21180 <br>
                        <a href="https://www.google.com/maps/place/%E0%B8%9A%E0%B8%A3%E0%B8%B4%E0%B8%A9%E0%B8%B1%E0%B8%97+%E0%B8%A7%E0%B8%87%E0%B8%A9%E0%B9%8C%E0%B8%9E%E0%B8%B2%E0%B8%93%E0%B8%B4%E0%B8%8A%E0%B8%A2%E0%B9%8C%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%8B%E0%B9%80%E0%B8%84%E0%B8%B4%E0%B8%A5+%E0%B8%A3%E0%B8%B0%E0%B8%A2%E0%B8%AD%E0%B8%87+%E0%B8%88%E0%B8%B3%E0%B8%81%E0%B8%B1%E0%B8%94/data=!4m2!3m1!1s0x0:0x23f4b615e2e82d1c?sa=X&ved=1t:2428&hl=en-US&ictx=111&cshid=1741235549668208" target="_blank">Map</a></p>

                        <h4 style="margin-bottom: 4px;">Huai Pong Office</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">Wongpanit Recycle Rayong Co., LTD.</p>
                        <p>22/9 Soi.Chaklukya 4, Watchaklukya Road,
                            Huaypong subdistrict, Muang Rayong district,
                            Rayong province 21150 <br>
                        <a href="https://www.google.com/maps/@12.7513181,101.1252694,17z?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Map</a></p>

                        <h4 style="margin-bottom: 4px;">Songkhla Office</h4>
                        <p style="padding-bottom: 1px; margin-bottom: 0rem;">Wongpanit Recycle Rayong Co., LTD.</p>
                        <p>428 Moo. 2, Phawong subdistrict, Mueang Songkhla district, Songkhla province 90100 <br>
                        <a href="https://www.google.com/maps/place/WPN+Recycle+Rayong+SKL/@7.1349492,100.5747619,17z/data=!3m1!4b1!4m6!3m5!1s0x304d33930e9c7071:0x5c2d395e1452c1f2!8m2!3d7.1349492!4d100.5747619!16s%2Fg%2F11tfk8qn8b?entry=ttu&g_ep=EgoyMDI1MDMwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank">Map</a></p>

                        <h4 class="mt-10">Contact</h4>
                        <p>Phone : <a href="tel:{{ get_phone2() }}">{{ get_phone2() }}</a>, <a href="tel:{{ get_phone() }}">{{ get_phone() }}</a>, <a href="tel:0945692969">0945692969</a><br>
                        Email : <a href="mailto: {{ get_email() }}">{{ get_email() }}</a></p>
                    </div>
                    @endif
        </div>
        <div class="d-15">
            <form class="ps-form--contact-us" id="contactForm2">

                @if(session()->get('locale') == 'th')
                <div class="row">
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุชื่อ-นามสกุลของคุณ" name="name" id='name2' required />
                            <label for="name" class="form__label">ชื่อ-นามสกุล</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุอีเมลของคุณ" name="email" id='email2' required />
                            <label for="email" class="form__label">อีเมล</label>
                        </div>
                    </div>
                    <div class="col-xl-12col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุเบอร์โทรศัพท์ของคุณ" name="phone" id='phone2' required />
                            <label for="phone" class="form__label">เบอร์โทรศัพท์</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <select class="form__field" aria-label="Select example" name="type" id='type2'>
                                <option>กรุณาเลือกหัวข้อที่ต้องการ</option>
                                @isset($type_contact)
                                    @foreach ($type_contact as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            <label for="name" class="form__label">หัวข้อที่ต้องการติดต่อ</label>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <textarea class="form__field" placeholder="ระบุข้อความที่ต้องการ" style="height:80px" maxlength="500" name="massage" id='massage2'></textarea>
                            <label for="massage" class="form__label">ข้อความ (<span id="count2">500</span>/500)</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                    </div>

                </div>
                <div class="text-center mt-20">
                    <button  class="ps-btn--fullwidth-green btn-block" id="btnSendData2" style="border-radius: 5px">ส่งข้อความ</button >
                </div>
                @else
                <div class="row">
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="ระบุชื่อ-นามสกุลของคุณ" name="name" id='name2' required />
                            <label for="name" class="form__label">Enter your first and last name.</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Enter your email" name="email" id='email2' required />
                            <label for="email" class="form__label">Email</label>
                        </div>
                    </div>
                    <div class="col-xl-12col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Enter your phone number" name="phone" id='phone2' required />
                            <label for="phone" class="form__label">Phone No.</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <select class="form__field" aria-label="Select example" name="type" id='type2'>
                                <option>Please select the desired topic.</option>
                                @isset($type_contact)
                                    @foreach ($type_contact as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            <label for="name" class="form__label">Topic you want to contact</label>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form__group field">
                            <textarea class="form__field" placeholder="Required message" style="height:80px" maxlength="500" name="massage" id='massage2'></textarea>
                            <label for="massage" class="form__label">message (<span id="count2">500</span>/500)</label>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                    </div>

                </div>
                <div class="text-center mt-20">
                    <button  class="ps-btn--fullwidth-green btn-block" id="btnSendData2" style="border-radius: 5px">Send</button >
                </div>
                @endif

            </form>
        </div>
    </div>
    <br>
</div>



<div class="ps-contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15562.683656431534!2d101.1492991!3d12.7998603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x23f4b615e2e82d1c!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4p-C4h-C4qeC5jOC4nuC4suC4k-C4tOC4iuC4ouC5jOC4o-C4teC5hOC4i-C5gOC4hOC4tOC4pSDguKPguLDguKLguK3guIcg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1673203663218!5m2!1sth!2sth" height="500"></iframe>
</div>


@endsection

@section('scripts')




<script>

$("#massage").keyup(function(){
  $("#count").text("" + (500 - $(this).val().length));
});
$("#massage2").keyup(function(){
  $("#count2").text("" + (500 - $(this).val().length));
});

    $(document).on('click','#btnSendData',function (event) {
      event.preventDefault();

      var form = $('#contactForm')[0];
      var formData = new FormData(form);
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var msg = document.getElementById("massage").value;
      var phone = document.getElementById("phone").value;
      var type = document.getElementById("type").value;
        console.log(formData)
    if(name == '' || msg == '' || email == '' || phone == '' || type == ''){

    @if(session()->get('locale') == 'th')
        swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
    @else
        swal("Please enter complete information.");
    @endif

    }else{
      $.LoadingOverlay("show", {
        background  : "rgba(255, 255, 255, 0.4)",
        image       : "{{ url('img/loading-gif.gif') }}",
        fontawesome : ""
      });
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        }
    });
      $.ajax({
          url: "{{url('/api/add_contact')}}",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: formData,
          processData: false,
          contentType: false,
          cache:false,
          type: 'POST',
          success: function (data) {
          //  console.log(data.data.status)
              if(data.data.status == 200){
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 0);
                $('#success_popup').modal('show');
                $("#name").val('');
                $("#massage").val('');
                $("#email").val('');
                $("#phone").val('');
              setTimeout(function(){
                //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
              }, 3000);
              }else{
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 500);

                @if(session()->get('locale') == 'th')
                    swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
                @else
                    swal("Please enter complete information.");
                @endif

              }
          },
          error: function () {
          }
      });
    }
    });



    $(document).on('click','#btnSendData2',function (event) {
      event.preventDefault();

      var form = $('#contactForm2')[0];
      var formData = new FormData(form);
      var name = document.getElementById("name2").value;
      var email = document.getElementById("email2").value;
      var msg = document.getElementById("massage2").value;
      var phone = document.getElementById("phone2").value;
      var type = document.getElementById("type2").value;
        console.log(formData)
    if(name == '' || msg == '' || email == '' || phone == '' || type == ''){

        @if(session()->get('locale') == 'th')
            swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
        @else
            swal("Please enter complete information.");
        @endif

    }else{
      $.LoadingOverlay("show", {
        background  : "rgba(255, 255, 255, 0.4)",
        image       : "{{ url('img/loading-gif.gif') }}",
        fontawesome : ""
      });
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        }
    });
      $.ajax({
          url: "{{url('/api/add_contact')}}",
          headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
          data: formData,
          processData: false,
          contentType: false,
          cache:false,
          type: 'POST',
          success: function (data) {
          //  console.log(data.data.status)
              if(data.data.status == 200){
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 0);
                $('#success_popup').modal('show');
                $("#name2").val('');
                $("#massage2").val('');
                $("#email2").val('');
                $("#phone2").val('');
              setTimeout(function(){
                //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
              }, 3000);
              }else{
                setTimeout(function(){
                    $.LoadingOverlay("hide");
                }, 500);

                @if(session()->get('locale') == 'th')
                    swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");
                @else
                    swal("Please enter complete information.");
                @endif

              }
          },
          error: function () {
          }
      });
    }
    });
    </script>

@stop('scripts')
