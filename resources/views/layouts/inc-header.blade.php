<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="container">
            <div class="header__left">
                <a class="ps-logo" href="{{ url('/') }}"><img class="max-h-65" src="{{ url('img/wpn-logo.png') }}" alt="" /></a>
            </div>
            <div class="header__center pt-10">
                <form class="ps-form--quick-search" action="{{ url('/category') }}" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control" name="id">
                            <option value="0" selected="selected">หมวดหมู่ : ทั้งหมด</option>
                            @if(get_data_category())
                                @foreach(get_data_category() as $u)
                                    <option class="level-0" style="color: #009247; font-weight: 700; font-size: 14px;" disabled>{{ $u->cat_name }}</option>
                                    @if($u->option)
                                        @foreach($u->option as $j)
                                            <option class="level-0" value="{{ $j->id }}" style="padding-left:15px">{{ $j->sub_name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </select>

                    </div>
                    @isset($search)
                    <input class="form-control" name="search" type="text" value="{{ $search === "" ?  : $search }}" placeholder="ค้นหาสิ่งที่คุณต้องการที่นี่..." id="input-search" />
                    @else
                    <input class="form-control" name="search" type="text"  placeholder="ค้นหาสิ่งที่คุณต้องการที่นี่..." id="input-search" />
                    @endisset
                    <button>ค้นหา</button>
                </form>
            </div>
            <div class="header__right pt-10">
                <div class="header__actions">
                    <a class="ps-btn set-btn-inner ps-btn--outline" href="tel:{{ get_phone() }}">
                        <div class="d-flex">
                            <img class="img-phone" src="{{ url('img/icon/phone-call.png') }}"> 
                            <div class="d-flex flex-column">
                                <div class="fs-14px">{{ get_phone() }}</div>
                                <div class="fs-14px mt--5px">{{ get_phone2() }}</div>
                            </div>
                        </div>
                    </a>
                    <a class="header__extra btn_green_header" target="_blank" href="{{ get_line() }}">
                        <img class="img-icon-green_header" src="{{ url('img/icon/line.png') }}">
                    </a>
                    <a class="header__extra btn_green_header" href="mailto: {{ get_email() }}">
                        <img class="img-icon-green_header" src="{{ url('img/icon/mail.png') }}">
                    </a>
                    
                    <div class="ps-dropdown language"><a href="#"><img height="50" src="{{ url('img/icon/thailand.png') }}"></a>
                        <ul class="ps-dropdown-menu">
                            <li><a href="#"><img src="{{ url('img/flag/en.png') }}" alt="" /> English</a></li>
                            <li><a href="#"><img src="{{ url('img/flag/th.png') }}" height="12" /> ภาษาไทย</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container">
            <div class="navigation__right">
                <ul class="menu">
                    <li class="menu-item"><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                    <li class="menu-item"><a href="{{ url('/service') }}">สินค้าและบริการ</a></li>
                    <li class="menu-item"><a href="{{ url('/about') }}">เกี่ยวกับวงษ์พาณิชย์</a></li>
                    <li class="menu-item"><a href="{{ url('/blog') }}">กิจกรรม & ประชาสัมพันธ์</a></li>
                    <li class="menu-item"><a href="{{ url('/contact') }}">ติดต่อเรา</a></li>
                    <li class="menu-item"><a href="{{ url('/term ') }}">นโยบายข้อมูลส่วนบุคคล</a></li>
                </ul>
                <ul class="navigation__extra">
                    <li><a class="white_btn_kim" href="{{ url('/category?id=0') }}" >ซื้อสินค้า</a></li> 
                    {{-- <li><a class="green_btn_kim" href="#"  data-toggle="modal" data-target="#product-quickview" >ขายสินค้า</a></li> --}}
                    <li><a class="green_btn_kim" href="{{ url('/contact') }}"  >ขายสินค้า</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile" data-sticky="true">
    
    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo" href="{{ url('/') }}">
                <img src="{{ url('img/wpn-logo.png') }}" alt="" class="header--mobile-img-logo" />
            </a>
        </div>
        <div class="navigation__right">
            <div class="header__actions">
                
                <div class="ps-block--user-header ">
                    <a class="header__extra btn_green_header" target="_blank" href="{{ get_line() }}">
                        <img class="img-icon-green_header" src="{{ url('img/icon/line.png') }}">
                    </a>
                    <a class="header__extra btn_green_header" href="mailto: {{ get_email() }}">
                        <img class="img-icon-green_header" src="{{ url('img/icon/mail.png') }}">
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</header>
