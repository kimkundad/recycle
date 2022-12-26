<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="container">
            <div class="header__left">
                <a class="ps-logo" href="{{ url('/') }}"><img class="max-h-65" src="{{ url('img/wpn-logo.png') }}" alt="" /></a>
            </div>
            <div class="header__center pt-10">
                <form class="ps-form--quick-search" action="{{ url('/') }}" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control">
                            <option value="0" selected="selected">หมวดหมู่ : ทั้งหมด</option>
                            <option class="level-0" value="babies-moms">Babies & Moms</option>
                            <option class="level-0" value="books-office">Books & Office</option>
                            <option class="level-0" value="cars-motocycles">Cars & Motocycles</option>
                            <option class="level-0" value="clothing-apparel">Clothing & Apparel</option>
                            <option class="level-1" value="accessories-clothing-apparel">Accessories</option>
                            <option class="level-1" value="bags">Bags</option>
                            <option class="level-1" value="kids-fashion">Kid’s Fashion</option>
                            <option class="level-1" value="mens">Mens</option>
                            <option class="level-1" value="shoes">Shoes</option>
                            <option class="level-1" value="sunglasses">Sunglasses</option>
                            <option class="level-1" value="womens">Womens</option>
                            <option class="level-0" value="computers-technologies">Computers & Technologies</option>
                            <option class="level-1" value="desktop-pc">Desktop PC</option>
                            <option class="level-1" value="laptop">Laptop</option>
                            <option class="level-1" value="smartphones">Smartphones</option>
                            <option class="level-0" value="consumer-electrics">Consumer Electrics</option>
                            <option class="level-1" value="air-conditioners">Air Conditioners</option>
                            <option class="level-2" value="accessories">Accessories</option>
                            <option class="level-2" value="type-hanging-cell">Type Hanging Cell</option>
                            <option class="level-2" value="type-hanging-wall">Type Hanging Wall</option>
                            <option class="level-1" value="audios-theaters">Audios & Theaters</option>
                            <option class="level-2" value="headphone">Headphone</option>
                            <option class="level-2" value="home-theater-system">Home Theater System</option>
                            <option class="level-2" value="speakers">Speakers</option>
                            <option class="level-1" value="car-electronics">Car Electronics</option>
                            <option class="level-2" value="audio-video">Audio & Video</option>
                            <option class="level-2" value="car-security">Car Security</option>
                            <option class="level-2" value="radar-detector">Radar Detector</option>
                            <option class="level-2" value="vehicle-gps">Vehicle GPS</option>
                            <option class="level-1" value="office-electronics">Office Electronics</option>
                            <option class="level-2" value="printers">Printers</option>
                            <option class="level-2" value="projectors">Projectors</option>
                            <option class="level-2" value="scanners">Scanners</option>
                            <option class="level-2" value="store-business">Store & Business</option>
                            <option class="level-1" value="refrigerators">Refrigerators</option>
                            <option class="level-1" value="tv-televisions">TV Televisions</option>
                            <option class="level-2" value="4k-ultra-hd-tvs">4K Ultra HD TVs</option>
                            <option class="level-2" value="led-tvs">LED TVs</option>
                            <option class="level-2" value="oled-tvs">OLED TVs</option>
                            <option class="level-1" value="washing-machines">Washing Machines</option>
                            <option class="level-2" value="type-drying-clothes">Type Drying Clothes</option>
                            <option class="level-2" value="type-horizontal">Type Horizontal</option>
                            <option class="level-2" value="type-vertical">Type Vertical</option>
                            <option class="level-0" value="garden-kitchen">Garden & Kitchen</option>
                            <option class="level-1" value="cookware">Cookware</option>
                            <option class="level-1" value="decoration">Decoration</option>
                            <option class="level-1" value="furniture">Furniture</option>
                            <option class="level-1" value="garden-tools">Garden Tools</option>
                            <option class="level-1" value="home-improvement">Home Improvement</option>
                            <option class="level-1" value="powers-and-hand-tools">Powers And Hand Tools</option>
                            <option class="level-1" value="utensil-gadget">Utensil & Gadget</option>
                            <option class="level-0" value="health-beauty">Health & Beauty</option>
                            <option class="level-1" value="equipments">Equipments</option>
                            <option class="level-1" value="hair-care">Hair Care</option>
                            <option class="level-1" value="perfumer">Perfumer</option>
                            <option class="level-1" value="skin-care">Skin Care</option>
                            <option class="level-0" value="jewelry-watches">Jewelry & Watches</option>
                            <option class="level-1" value="gemstone-jewelry">Gemstone Jewelry</option>
                            <option class="level-1" value="mens-watches">Men’s Watches</option>
                            <option class="level-1" value="womens-watches">Women’s Watches</option>
                            <option class="level-0" value="phones-accessories">Phones & Accessories</option>
                            <option class="level-1" value="iphone-8">Iphone 8</option>
                            <option class="level-1" value="iphone-x">Iphone X</option>
                            <option class="level-1" value="sam-sung-note-8">Sam Sung Note 8</option>
                            <option class="level-1" value="sam-sung-s8">Sam Sung S8</option>
                            <option class="level-0" value="sport-outdoor">Sport & Outdoor</option>
                            <option class="level-1" value="freezer-burn">Freezer Burn</option>
                            <option class="level-1" value="fridge-cooler">Fridge Cooler</option>
                            <option class="level-1" value="wine-cabinets">Wine Cabinets</option>
                        </select>
                    </div>
                    <input class="form-control" type="text" placeholder="ค้นหาสิ่งที่คุณต้องการที่นี่..." id="input-search" />
                    <button>ค้นหา</button>
                </form>
            </div>
            <div class="header__right pt-10">
                <div class="header__actions">
                    <a class="ps-btn set-btn-inner ps-btn--outline" href="#"><img class="img-phone" src="{{ url('img/icon/phone-call.png') }}"> 038606338</a>
                    <a class="header__extra btn_green_header" href="#">
                        <img class="img-icon-green_header" src="{{ url('img/icon/line.png') }}">
                    </a>
                    <a class="header__extra btn_green_header" href="#">
                        <img class="img-icon-green_header" src="{{ url('img/icon/mail.png') }}">
                    </a>
                    <a class="header__extra " href="#">
                        <img height="50" src="{{ url('img/icon/thailand.png') }}">
                    </a>

                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container">
            <div class="navigation__right">
                <ul class="menu">
                    <li class="menu-item"><a class="active" href="{{ url('/') }}">หน้าแรก</a></li>
                    <li class="menu-item"><a href="{{ url('/') }}">บริการ</a></li>
                    <li class="menu-item"><a href="{{ url('/') }}">เกี่ยวกับวงษ์พาณิชย์</a></li>
                    <li class="menu-item"><a href="{{ url('/') }}">กิจกรรม & ประชาสัมพันธ์</a></li>
                    <li class="menu-item"><a href="{{ url('/') }}">ติดต่อเรา</a></li>
                    <li class="menu-item"><a href="{{ url('/') }}">นโยบายส่วนบุคคล</a></li>
                </ul>
                <ul class="navigation__extra">
                    <li><a class="white_btn_kim" href="#">ซื้อสินค้า</a></li>
                    <li><a class="green_btn_kim" href="#">ขายสินค้า</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<header class="header header--mobile" data-sticky="true">
    
    <div class="navigation--mobile">
        <div class="navigation__left"><a class="ps-logo" href="{{ url('') }}"><img src="{{ url('img/wpn-logo.png') }}" alt="" /></a></div>
        <div class="navigation__right">
            <div class="header__actions">
                <div class="ps-cart--mini"><a class="header__extra" href="#"><i class="icon-bag2"></i><span><i>0</i></span></a>
                    
                </div>
                <div class="ps-block--user-header">
                    <div class="ps-block__left"><a href="my-account.html"><i class="icon-user"></i></a></div>
                    <div class="ps-block__right"><a href="my-account.html">Login</a><a href="my-account.html">Register</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-search--mobile">
        <form class="ps-form--search-mobile" action="{{ url('/') }}" method="get">
            <div class="form-group--nest">
                <input class="form-control" type="text" placeholder="Search something..." />
                <button><i class="icon-magnifier"></i></button>
            </div>
        </form>
    </div>
</header>