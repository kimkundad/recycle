<footer class="ps-footer" style="box-shadow: 0px -10px 38px 0px #0000000D;">
    <div class="container">
        <div class="">

            <div class="row ">
                <div class="col-md-8 ps-footer__widgets">
                    <aside class="widget widget_footer widget_contact-us">
                        <div class="widget_content res-center">
                            <img class="max-h-65" src="{{ url('img/wpn-logo_v2.png') }}" alt="" />

                            @if(session()->get('locale') == 'th')
                            <h5 class="pt-20">บริษัท วงษ์พาณิชย์รีไซเคิล ระยอง จำกัด (สำนักงานใหญ่)</h5>
                            <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180 </p>
                            @else
                            <h5 class="pt-20">Wongpanit Recycle Rayong Co., LTD.</h5>
                            <p>1/1 Moo 4 Nikhompattana subdistrict, Nikhompattana district Rayong 21180 </p>
                            @endif

                            <div class="pt-20 d-flex justify-content-center">
                                <a class="ps-btn set-btn-inner ps-btn--outline" href="tel:{{ get_phone2() }}" style="border-radius: 15px; padding: 3px 8px;">
                                    <div class="d-flex">
                                        <img class="img-phone" src="{{ url('img/icon/phone-call.png') }}" style="margin-top: 8px;"> 
                                        <div class="d-flex flex-column">
                                            <div class=" m-mt-10" style="font-size: 13px; line-height: 15px;">{{ get_phone() }}</div>
                                            <div class="" style="font-size: 13px; line-height: 15px;">{{ get_phone2() }}</div>
                                            <div class="" style="font-size: 13px; line-height: 15px;">0875577730</div>
                                        </div>
                                    </div>
                                </a>
                                <a class="header__extra foot-social" target="_blank" href="{{ get_line() }}">
                                    <img class="img-fluid" src="{{ url('img/line_new_icon.png') }}">
                                </a>
                                <a class="header__extra foot-social" href="mailto: {{ get_email() }}">
                                    <img class="img-fluid" src="{{ url('img/email_new_icon.png') }}">
                                </a>
                                <a class="header__extra foot-social" target="_blank" href="{{ get_facebook() }}">
                                    <img class="img-fluid" src="{{ url('img/facebook_new_icon.png') }}">
                                </a>
                
                            </div>
                        </div>
                    </aside>

                    @if(session()->get('locale') == 'th')

                    <aside class="widget widget_footer">
                        <h4 class="widget-title">หน้าแรก </h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('category?id=0') }}">สินค้าและบริการ</a></li>
                            <li><a href="{{ url('category?id=0') }}">สินค้าขายดี</a></li>
                            <li><a href="{{ url('/about') }}">เกี่ยวกับวงษ์พาณิชย์</a></li>
                            <li><a href="{{ url('/certificate') }}">ใบอนุญาตและรางวัล</a></li>
                            <li><a href="{{ url('/blog') }}">กิจกรรม & ประชาสัมพันธ์</a></li>
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">เข้าสู่ระบบ / Login</a></li>
                            @else
                            @if(Auth::user()->roles[0]->name == 'superadmin' || Auth::user()->roles[0]->name == 'admin')
                            <li><a href="{{ url('/admin/dashboard') }}">เข้าสู่หลังบ้าน</a></li>
                            @endif
                            @endif
                        </ul>
                    </aside>
                    <aside class="widget widget_footer">
                        <h4 class="widget-title">บริการ</h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('/contact') }}">รับซิ้อวัสดุรีไซเคิล/ไม่ใช้แล้ว</a></li>
                            <li><a href="{{ url('/contact') }}">รับประมูลงานเหล็ก โครงสร้าง ฯลฯ</a></li>
                            <li><a href="{{ url('/contact') }}">ให้คำปรึกษา</a></li>
                            <li><a href="{{ url('/contact') }}">บริการทำลายเอกสาร</a></li>
                            <li><a href="{{ url('/contact') }}">บริการจัดเก็บของเสียอุตสาหกรรม</a></li>
                            <li><a href="{{ url('/contact') }}">บริการพิเศษอื่นๆ</a></li>
                        </ul>
                    </aside>

                    @else

                    <aside class="widget widget_footer">
                        <h4 class="widget-title">Home </h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('category?id=0') }}">Product and Sevice</a></li>
                            <li><a href="{{ url('category?id=0') }}">Recommend</a></li>
                            <li><a href="{{ url('/about') }}">About us</a></li>
                            <li><a href="{{ url('/certificate') }}">License and Awards</a></li>
                            <li><a href="{{ url('/blog') }}">News</a></li>
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">เข้าสู่ระบบ / Login</a></li>
                            @else
                            @if(Auth::user()->roles[0]->name == 'superadmin' || Auth::user()->roles[0]->name == 'admin')
                            <li><a href="{{ url('/admin/dashboard') }}">เข้าสู่หลังบ้าน</a></li>
                            @endif
                            @endif
                        </ul>
                    </aside>
                    <aside class="widget widget_footer">
                        <h4 class="widget-title">Service</h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('/contact') }}">Buying recyclable and surplus materials</a></li>
                            <li><a href="{{ url('/contact') }}">Bidding, auction steel structure and more</a></li>
                            <li><a href="{{ url('/contact') }}">Counseling service</a></li>
                            <li><a href="{{ url('/contact') }}">Document demolition service</a></li>
                            <li><a href="{{ url('/contact') }}">Industrial waste collection service</a></li>
                            <li><a href="{{ url('/contact') }}">Other services</a></li>
                        </ul>
                    </aside>

                    @endif

                </div>
                <div class="col-md-4">
                    <aside class="widget widget_footer ">
                        @if(session()->get('locale') == 'th')
                        <h4 class="widget-title">แผนที่</h4>
                        @else
                        <h4 class="widget-title">Map</h4>
                        @endif
                        <div class="ps-contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15562.683656431534!2d101.1492991!3d12.7998603!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x23f4b615e2e82d1c!2z4Lia4Lij4Li04Lip4Lix4LiXIOC4p-C4h-C4qeC5jOC4nuC4suC4k-C4tOC4iuC4ouC5jOC4o-C4teC5hOC4i-C5gOC4hOC4tOC4pSDguKPguLDguKLguK3guIcg4LiI4Liz4LiB4Lix4LiU!5e0!3m2!1sth!2sth!4v1673203663218!5m2!1sth!2sth" height="250"></iframe>
                        </div>
                    </aside>
                </div>
            </div>
                
         
            
            
            
        </div>
        
    </div>
</footer>


<div class="ps-footer__copyright ">
    <div class="d-flex justify-content-center">
        <p class="bg-green"></p>
        <p class="text-center fs-12" >&copy; Copyright (c) 2024 Wongpanit Recycle Rayong Co., Ltd.</p>
        <p class="bg-green2"></p>
    </div>
</div>