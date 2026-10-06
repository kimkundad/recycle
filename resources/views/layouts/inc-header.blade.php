<header class="header header--1" data-sticky="true">
    <div class="header__top">
        <div class="container">
            <div class="header__left">
                <a class="ps-logo" href="{{ url('/') }}"><img class="max-h-65" src="{{ url('img/wpn-logo_v2.png') }}" alt="" /></a>
            </div>
            <div class="header__center pt-10">
                <form class="ps-form--quick-search" action="{{ url('/category') }}" method="get">
                    <div class="form-group--icon"><i class="icon-chevron-down"></i>
                        <select class="form-control" name="id">
                            <option value="0" selected="selected">{{ __('common.search.category_all') }}</option>
                            @if(get_data_category())
                                @foreach(get_data_category() as $u)
                                    <option class="level-0" style="color: #009247; font-weight: 700; font-size: 14px;" disabled>{{ localized($u, 'cat_name') }}</option>
                                    @if($u->option)
                                        @foreach($u->option as $j)
                                            {{-- English keeps its existing rule: sub_name_en only when the parent category has cat_name_en. --}}
                                            <option class="level-0" value="{{ $j->id }}" style="padding-left:15px">{{ app()->getLocale() === 'en' && $u->cat_name_en == null ? $j->sub_name : localized($j, 'sub_name') }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </select>

                    </div>

                    @isset($search)
                    <input class="form-control" name="search" type="text" value="{{ $search === "" ?  : $search }}" placeholder="{{ __('common.search.placeholder') }}" id="input-search" />
                    @else
                    <input class="form-control" name="search" type="text"  placeholder="{{ __('common.search.placeholder') }}" id="input-search" />
                    @endisset
                    <button>{{ __('common.search.button') }}</button>
                </form>
            </div>
            <div class="header__right pt-10">
                <div class="header__actions">
                    <a class="ps-btn set-btn-inner ps-btn--outline" href="tel:{{ get_phone2() }}" style="border-radius: 15px; padding: 3px 8px;">
                        <div class="d-flex">
                            <img class="img-phone" src="{{ url('img/icon/phone-call.png') }}" style="margin-top: 8px;">
                            <div class="d-flex flex-column">
                                <div class=" m-mt-10" style="font-size: 13px; line-height: 15px;">{{ get_phone() }}</div>
                                <div class="" style="font-size: 13px; line-height: 15px;">{{ get_phone2() }}</div>
                                <div class="" style="font-size: 13px; line-height: 15px;">0945692969</div>
                            </div>
                        </div>
                    </a>
                    <a class="header__extra " target="_blank" href="{{ get_line() }}">
                        <img class="img-fluid" src="{{ url('img/line_new_icon.png') }}">
                    </a>
                    <a class="header__extra " href="mailto: {{ get_email() }}">
                        <img class="img-fluid" src="{{ url('img/email_new_icon.png') }}">
                    </a>
                    <a class="header__extra" target="_blank" href="{{ get_facebook() }}">
                        <img class="img-fluid" src="{{ url('img/facebook_new_icon.png') }}">
                    </a>

                    <div class="ps-dropdown language"><a href="#">
                        @if(app()->getLocale() === 'en')
                        <img height="50" class="img-flag" src="{{ url('img/icon/english_icon.png') }}"></a>
                        @elseif(app()->getLocale() === 'zh')
                        <img height="50" class="img-flag" src="{{ url('img/flag/cn.svg') }}" alt="中文" style="border-radius: 50%;"></a>
                        @else
                        <img height="50" class="img-flag" src="{{ url('img/icon/thai_icon.png') }}"></a>
                        @endif

                        <ul class="ps-dropdown-menu">
                            <li><a href="{{ url('/lang/change?lang=en') }}"><img src="{{ url('img/flag/en.png') }}" alt="" /> English</a></li>
                            <li><a href="{{ url('/lang/change?lang=zh') }}"><img src="{{ url('img/flag/cn.svg') }}" height="12" alt="" /> 中文</a></li>
                            <li><a href="{{ url('/lang/change?lang=th') }}"><img src="{{ url('img/flag/th.png') }}" height="12" /> ภาษาไทย</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <nav class="navigation navigation_header" style="">
        <div class="container">
            <div class="navigation__right">
                <ul class="menu">
                    <li class="menu-item"><a href="{{ url('/') }}">{{ __('common.nav.home') }}</a></li>
                    <li class="menu-item"><a href="{{ url('/service') }}">{{ __('common.nav.service') }}</a></li>
                    <li class="menu-item"><a href="{{ url('/steel?id=10') }}">{{ __('common.nav.steel') }}</a></li>
                    @if (app()->getLocale() === 'th')
                    <li class="menu-item"><a href="{{ url('/design-products') }}">{{ __('common.nav.design_products') }}</a></li>
                    @endif
                    <li class="menu-item"><a href="{{ url('/warehouse') }}">{{ __('common.nav.warehouse') }}</a></li>
                    <li class="menu-item"><a href="{{ url('/about') }}">{{ __('common.nav.about') }}</a></li>
                    <li class="menu-item"><a href="{{ url('/blog') }}">{{ __('common.nav.news') }}</a></li>
                    <li class="menu-item"><a href="{{ url('/contact') }}">{{ __('common.nav.contact') }}</a></li>
                </ul>
                <ul class="navigation__extra ">
                    <li><a class="white_btn_kim" href="{{ url('/category?id=0') }}" >{{ __('common.nav.buy') }}</a></li>
                    <li><a class="green_btn_kim" href="{{ url('/contact') }}"  >{{ __('common.nav.sell') }}</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<header class="header header--mobile" data-sticky="true">

    <div class="navigation--mobile">
        <div class="navigation__left">
            <a class="ps-logo" href="{{ url('/') }}">
                <img src="{{ url('img/wpn-logo_v2.png') }}" alt="" class="header--mobile-img-logo" />
            </a>
        </div>
        <div class="navigation__right">
            <div class="header__actions">

                <div class="ps-block--user-header ">
                    <a class="header__extra " target="_blank" href="{{ get_line() }}">
                        <img class="img-fluid" src="{{ url('img/line_new_icon.png') }}">
                    </a>
                    <a class="header__extra " href="mailto: {{ get_email() }}">
                        <img class="img-fluid" src="{{ url('img/email_new_icon.png') }}">
                    </a>
                    <a class="header__extra" target="_blank" href="{{ get_facebook() }}">
                        <img class="img-fluid" src="{{ url('img/facebook_new_icon.png') }}">
                    </a>
                    <div class="ps-dropdown language" style="padding-left: 5px;">
                        <a href="#">
                        @if(app()->getLocale() === 'en')
                        <img height="50" class="img-flag img_langx" src="{{ url('img/icon/english_icon.png') }}" ></a>
                        @elseif(app()->getLocale() === 'zh')
                        <img height="50" class="img-flag img_langx" src="{{ url('img/flag/cn.svg') }}" alt="中文" style="border-radius: 50%;" ></a>
                        @else
                        <img height="50" class="img-flag img_langx" src="{{ url('img/icon/thai_icon.png') }}" ></a>
                        @endif

                        <ul class="ps-dropdown-menu">
                            <li><a href="{{ url('/lang/change?lang=en') }}"><img src="{{ url('img/flag/en.png') }}" alt="" /> English</a></li>
                            <li><a href="{{ url('/lang/change?lang=zh') }}"><img src="{{ url('img/flag/cn.svg') }}" height="12" alt="" /> 中文</a></li>
                            <li><a href="{{ url('/lang/change?lang=th') }}"><img src="{{ url('img/flag/th.png') }}" height="12" /> ภาษาไทย</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
