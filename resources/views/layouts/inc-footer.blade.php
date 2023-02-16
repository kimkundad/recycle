<footer class="ps-footer" style="box-shadow: 0px -10px 38px 0px #0000000D;">
    <div class="container">
        <div class="">

            <div class="row ">
                <div class="col-md-8 ps-footer__widgets">
                    <aside class="widget widget_footer widget_contact-us">
                        <div class="widget_content">
                            <img class="max-h-65" src="{{ url('img/wpn-logo.png') }}" alt="" />
                            <h5 class="pt-20">บริษัท วงษ์พาณิชย์ รีไซเคิล ระยอง จำกัด</h5>
                            <p>ที่อยู่ 1/1 หมู่ 4 ต.นิคมพัฒนา อ.นิคมพัฒนา จ.ระยอง 21180 </p>
                            <div class="pt-20">
                                <a class="ps-btn set-btn-inner-footer ps-btn--outline" href="tel:{{ get_phone() }}">
                                    <img class="img-phone-footer" src="{{ url('img/icon/phone-call.png') }}"> {{ get_phone() }}
                                </a>
                                <a class="btn_green_heade_footer" href="mailto: {{ get_email() }}">
                                    <img class="img-icon-green_header_footer" src="{{ url('img/icon/mail.png') }}">
                                </a>
                                <a class="btn_green_heade_footer" target="_blank" href="{{ get_line() }}">
                                    <img class="img-icon-green_header_footer" src="{{ url('img/icon/line.png') }}">
                                </a>
                                <a class="btn_green_heade_footer" href="{{ get_facebook() }}">
                                    <img class="img-icon-green_header_footer" src="{{ url('img/icon/facebook.png') }}">
                                </a>
                                <a class="" href="fax:+{{ get_fax() }}">
                                    <img class="img-icon-green_header_footer h-34" src="{{ url('img/icon/fax.png') }}">
                                </a>
                            </div>
                        </div>
                    </aside>
                    <aside class="widget widget_footer">
                        <h4 class="widget-title">หน้าแรก</h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('/product') }}">หมวดหมู่สินค้า</a></li>
                            <li><a href="{{ url('/product') }}">สินค้าขายดี</a></li>
                            <li><a href="{{ url('/service') }}">เกี่ยวกับวงษ์พาณิชย์</a></li>
                            <li><a href="{{ url('/about') }}">รับรองและรางวัล</a></li>
                            <li><a href="{{ url('/blog') }}">กิจกรรม & ประชาสัมพันธ์</a></li>
                            <li><a href="{{ url('/login') }}">เข้าสู่ระบบ / Login</a></li>
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
                </div>
                <div class="col-md-4">
                    <aside class="widget widget_footer ">
                        <h4 class="widget-title">แผนที่</h4>
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
        <p class="text-center fs-12" >&copy; Copyright (c) 2015 Wongpanit Recycle Rayong Co., Ltd.</p>
        <p class="bg-green2"></p>
    </div>
</div>