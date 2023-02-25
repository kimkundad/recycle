
<style>
    .fb_dialog{
        display: none !important;
    }
    .fb-customerchat{
        display: none !important;
    }
</style>

<ul class="menu-sh bottomRight">
    <li class="share top">
      <img src="{{ url('img/chat.png') }}" id="close_chat">
      <ul class="submenu">
        <li><a href="#" onclick="FB.CustomerChat.showDialog();" class="facebook"><img src="{{ url('img/messenger.png') }}"></a></li>
        <li><a href="{{ get_line() }}" class="twitter"><img src="{{ url('img/line.png') }}"></a></li>
        <li><a href="mailto: {{ get_email() }}" class="googlePlus"><img src="{{ url('img/email.png') }}"></a></li>
        <li><a href="tel:{{ get_phone() }}" class="instagram"><img src="{{ url('img/call.png') }}"></a></li>
      </ul>
    </li>
  </ul>

  
<div id="back2top"><i class="icon icon-arrow-up"></i></div>
   <!-- <div class="ps-site-overlay"></div> -->
    <div class="ps-panel--sidebar" id="cart-mobile">
        <div class="ps-panel__header">
            <h3>ติดต่อเรา</h3>
        </div>
        <div class="navigation__content">
            <div class="p-15">
                <p class="fs-16 fw-700 text-center">ท่านสามารถติดต่อสอบถาม <br> ซื้อสินค้า ขอใช้บริการ ผ่านช่องทางด้านล่าง</p>
                <div class="d-15">
                    <form class="ps-form--contact-us" id="contactForm3">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุชื่อ-นามสกุลของคุณ" name="name" id='name3' required />
                                    <label for="name" class="form__label">ชื่อ-นามสกุล</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุอีเมลของคุณ" name="email" id='email3' required />
                                    <label for="email" class="form__label">อีเมล</label>
                                </div>
                            </div>
                            <div class="col-xl-12col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <input type="input" class="form__field" placeholder="ระบุเบอร์โทรศัพท์ของคุณ" name="phone" id='phone3' required />
                                    <label for="phone" class="form__label">เบอร์โทรศัพท์</label>
                                </div>
                            </div>
                         
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <select class="form__field" aria-label="Select example" name="type" id='type3'>
                                        <option>กรุณาเลือกหัวข้อที่ต้องการ</option>
                                        @if(type_contact())
                                            @foreach (type_contact() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <label for="name" class="form__label">หัวข้อที่ต้องการติดต่อ</label>
                                </div>
                            </div>
                            
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="form__group field">
                                    <textarea class="form__field" placeholder="ระบุข้อความที่ต้องการ" style="height:80px" name="massage" id='massage3'></textarea>
                                    <label for="massage" class="form__label">ข้อความ (500/500)</label>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <div class="g-recaptcha" data-sitekey="6LdQnlkUAAAAAOfsIz7o-U6JSgrSMseulLvu7lI8"></div>
                            </div>
                        </div>
                        <div class="text-center mt-20">
                            <a class="ps-btn--fullwidth-green btn-block" id="btnSendData_mobile" href="#" style="border-radius: 5px">ส่งข้อความ</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--include ../../data/menu/menu-product-categories-->
    <div class="ps-panel--sidebar" id="navigation-mobile">
        <div class="ps-panel__header">
            <h3>หมวดหมู่สินค้า</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">

                


                @if(get_data_category())
                            @foreach(get_data_category() as $u)
                            <li class="current-menu-item menu-item-has-children"> 
                                <a href="#" class="active">{{ $u->cat_name }}</a> 
                                <span class="sub-toggle">
                                </span>
                                <ul class="sub-menu" >
                                    @if($u->option)
                                    @foreach($u->option as $j)
                                    <li class="current-menu-item ">
                                        <a href="{{ url('category?id='.$j->id) }}">{{ $j->sub_name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                    
                                </ul>
                            </li>
                            @endforeach
                            @endif
               
                {{-- <li class="menu-item-has-children has-mega-menu"><a href="shop-default">สินค้า 1</a><span class="sub-toggle"></span>
                    <div class="mega-menu">
                        <div class="mega-menu__column">
                            <h4>สินค้า 1.1<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="#">Shop Default</a>
                                </li>
                                <li><a href="#">Shop Fullwidth</a>
                                </li>
                                <li><a href="#">Shop Categories</a>
                                </li>
                                <li><a href="#">Shop Sidebar</a>
                                </li>
                                <li><a href="#">Shop Without Banner</a>
                                </li>
                                <li><a href="#">Shop Carousel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Product Layout<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="#">Shop Default</a>
                                </li>
                                <li><a href="#">Shop Fullwidth</a>
                                </li>
                                <li><a href="#">Shop Categories</a>
                                </li>
                                <li><a href="#">Shop Sidebar</a>
                                </li>
                                <li><a href="#">Shop Without Banner</a>
                                </li>
                                <li><a href="#">Shop Carousel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Product Types<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="#">Shop Default</a>
                                </li>
                                <li><a href="#">Shop Fullwidth</a>
                                </li>
                                <li><a href="#">Shop Categories</a>
                                </li>
                                <li><a href="#">Shop Sidebar</a>
                                </li>
                                <li><a href="#">Shop Without Banner</a>
                                </li>
                                <li><a href="#">Shop Carousel</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mega-menu__column">
                            <h4>Woo Pages<span class="sub-toggle"></span></h4>
                            <ul class="mega-menu__list">
                                <li><a href="#">Shop Default</a>
                                </li>
                                <li><a href="#">Shop Fullwidth</a>
                                </li>
                                <li><a href="#">Shop Categories</a>
                                </li>
                                <li><a href="#">Shop Sidebar</a>
                                </li>
                                <li><a href="#">Shop Without Banner</a>
                                </li>
                                <li><a href="#">Shop Carousel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li> --}}
                
            </ul>
        </div>
    </div>
    <div class="navigation--list">
        <div class="navigation__content">
            <a class="navigation__item ps-toggle--sidebar" href="#menu-mobile">
                <i class="icon-list4"></i>
                <span> เมนู</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#navigation-mobile">
                <i class="icon-bag2"></i>
                <span> สินค้า</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#search-sidebar">
                <i class="icon-magnifier"></i>
                <span> ค้นหา</span>
            </a>
            <a class="navigation__item ps-toggle--sidebar" href="#cart-mobile">
                <img src="{{ url('assets/img/icons/vendor-3.png') }}"  style="height:26px">
                <span> ติดต่อเรา</span>
            </a>
        </div>
    </div>
    <div class="ps-panel--sidebar" id="search-sidebar">
        <div class="ps-panel__header">
            <form class="ps-form--search-mobile" action="{{ url('/category') }}" method="get">
                <div class="form-group--nest">
                    <input type="hidden" name="id" value="0">
                    <input class="form-control" type="text" placeholder="ค้นหาสิ่งที่คุณต้องการที่นี่...">
                    <button><i class="icon-magnifier"></i></button>
                </div>
            </form>
        </div>
        <div class="navigation__content"></div>
    </div>
    <div class="ps-panel--sidebar" id="menu-mobile">
        <div class="ps-panel__header">
            <h3>เมนู</h3>
        </div>
        <div class="ps-panel__content">
            <ul class="menu--mobile">
                <li class="menu-item-has-children">
                    <a href="{{ url('/') }}">หน้าแรก</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ url('/service') }}">บริการ</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ url('/about') }}">เกี่ยวกับวงษ์พาณิชย์</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ url('/blog') }}">กิจกรรม & ประชาสัมพันธ์</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ url('/contact') }}">ติดต่อเรา</a>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{ url('/term') }}">นโยบายส่วนบุคคล</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="{{ url('/category') }}" method="get">
                <input type="hidden" name="id" value="0">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>


    <div class="modal fade" id="product-quickview" tabindex="-1" role="dialog" aria-labelledby="product-quickview" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                <div class="text-center header_green" >
                    <h3 class="modal-title top-20 " style="color: #fff;">สินค้าที่รับซื้อ</h3>
                </div>

                <span class="modal-close" data-dismiss="modal"><img src="{{ url('img/close.png') }}" class="h-30px"></span>
                <article class="ps-product--detailx ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header p-20" >
                        
                        <div class="ps-product__content ps-tab-root">
                            <ul class="ps-tab-list">
                                <li class="active"><a href="#tab-1x">พลาสติก (รีไซเคิลได้)</a></li>
                                <li><a href="#tab-2x">โลหะ</a></li>
                                <li><a href="#tab-3x">เครื่องจัก</a></li>
                                <li><a href="#tab-4x">อื่นๆ</a></li>
                            </ul>
                            <div class="ps-tabs">
                                <div class="ps-tab active" id="tab-1x">
                                    <div class="ps-document">
                                        <p>1. พลาสติก โพลีเอทิลีน เทอร์ฟะธาเลต (Polyethylene Terephthalate : PETE or PET)
                                            เช่นพวก สายรัด ขวดน้ำอัดลม กระเป๋าหิ้ว เฟอร์นิเจอร์ พรม แผ่นผนังและภาชนะใหม่ (เป็นครั้งคราว)</p>
                                        <p>
                                            2. พลาสติก โพลีเอทิลีนความหนาแน่นสูง (High-density Polyethylene : HDPE) เช่น ขวด  ถังรีไซเคิล ท่อเกษตร และไม้พลาสติก
                                        </p>
                                        <p>
                                            3. พลาสติก โพลีไวนิลคลอไรด์ (Polyvinyl Chloride : PVC) เช่น ท่อโปรไฟล์ หน้าต่าง ผนังรั้ว พื้น
                                        </p>
                                        <p>
                                            4. พลาสติก โพลีเอทิลีนความหนาแน่นต่ำ (Low-density Polyethylene : LDPE) เช่น ถุงพลาสติก  ขวด ท่อ ภาชนะต่างๆ และอุปกรณ์ทำงานขึ้นรูปต่างๆ
                                        </p>
                                        <p>
                                            5. พลาสติก โพลีโพรพีลีน (Polypropylene : PP) เช่น ชิ้นส่วนรถยนต์ เส้นใยอุตสาหกรรม และภาชนะบรรจุอาหาร
                                        </p>
                                        <p>
                                            6. พลาสติก โพลิสไตรีน (Polystyrene : PS) เช่น เครื่องใช้พลาสติก ภาชนะแบบฝาพับ บรรจุภัณฑ์ อุปกรณ์เสริมสำหรับโต๊ะทำงาน 
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-tab " id="tab-2x">
                                    <div class="ps-document">
                                        <h5>x2 the Raw, Wayward Spirit of Rock 'N' Roll</h5>
                                        <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the show on the road.</p>
                                    </div>
                                </div>
                                <div class="ps-tab " id="tab-3x">
                                    <div class="ps-document">
                                        <h5>x3 the Raw, Wayward Spirit of Rock 'N' Roll</h5>
                                        <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the show on the road.</p>
                                    </div>
                                </div>
                                <div class="ps-tab " id="tab-4x">
                                    <div class="ps-document">
                                        <h5>x4 the Raw, Wayward Spirit of Rock 'N' Roll</h5>
                                        <p>Embodying the raw, wayward spirit of rock ‘n’ roll, the Kilburn portable active stereo speaker takes the unmistakable look and sound of Marshall, unplugs the chords, and takes the show on the road.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="w-100 mg-5">
                                    <a class="green_btn_kim_out btn_card_in btn-box btn-block mg-5 text-center" href="{{ url('/contact') }}">สอบถามเพิ่มเติม</a>
                                </div>
                                <div class="w-100 mg-5">
                                    <a class="btn-green-b-pop btn_card_in btn-box btn-block mg-5 text-center" href="{{ url('/contact') }}">สอบถามเพิ่มเติม</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </article>
            </div>
        </div>
      </div>



      <div class="modal fade " id="success_popup" tabindex="-1" role="dialog" aria-labelledby="success_popup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
            
                <span class="modal-close" data-dismiss="modal"><img src="{{ url('img/close_green.svg') }}" class="h-30px"></span>
                <article class="ps-product--detailx ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header p-20" >
                        
                       <div class="text-center">
                            <img src="{{ url('img/message 1.svg') }}" >
                            <h4 class="text-green fs-22px">ส่งข้อความสำเร็จ</h4>
                            <p>เจ้าหน้าที่ได้รับข้อความของท่าน และจะรีบดำเนินการโดยทันที โปรดรอการติดต่อกลับผ่านช่องทางที่ท่านระบุไว้</p>
                            <br>
                            <a class="btn-green-b-pop btn_card_in btn-box mg-5 text-center" data-dismiss="modal" >ปิด</a>
                       </div>
                        
                    </div>
                </article>
            </div>
        </div>
      </div>


      <div class="modal fade " id="kt_modal_4_2" tabindex="-1" role="dialog" aria-labelledby="kt_modal_4_2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content p-10" style="padding:20px">
                <div class="d-flex justify-content-end">
                    <span class="modal-close" data-dismiss="modal"><img src="{{ url('img/close_green.svg') }}" class="h-30px"></span>
                </div>
                
                <article class="ps-product--detailx ps-product--fullwidth ps-product--quickview">
                    <div class="ps-product__header p-20" >
                        
                       <div class="text-center">
                            
                            <div class="modal-content-img">

                            </div>

                            
                            <br>
                            <a class="btn-green-b-pop btn_card_in btn-box mg-5 text-center" data-dismiss="modal" >ปิด</a>
                       </div>
                        
                    </div>
                </article>
            </div>
        </div>
      </div>