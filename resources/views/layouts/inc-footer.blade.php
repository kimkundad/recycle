<footer class="ps-footer" style="box-shadow: 0px -10px 38px 0px #0000000D;">
    <div class="container">
        <div class="">

            <div class="row ">
                <div class="col-md-8 ps-footer__widgets">
                    <aside class="widget widget_footer widget_contact-us">
                        <div class="widget_content res-center">
                            <img class="max-h-65" src="{{ url('img/wpn-logo_v2.png') }}" alt="" />

                            <h5 class="pt-20">{{ __('common.footer.company_name') }}</h5>
                            <p>{!! __('common.footer.address') !!}</p>

                            <div class="pt-20 d-flex justify-content-center">
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

                    <aside class="widget widget_footer">
                        <h4 class="widget-title">{{ __('common.footer.home_title') }}</h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('category?id=0') }}">{{ __('common.footer.products_services') }}</a></li>
                            <li><a href="{{ url('category?id=0') }}">{{ __('common.footer.best_sellers') }}</a></li>
                            <li><a href="{{ url('/about') }}">{{ __('common.footer.about') }}</a></li>
                            <li><a href="{{ url('/certificate') }}">{{ __('common.footer.licenses') }}</a></li>
                            <li><a href="{{ url('/blog') }}">{{ __('common.footer.news') }}</a></li>
                            <li><a href="{{ url('/term') }}">{{ __('common.footer.privacy') }}</a></li>
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">{{ __('common.admin_login') }}</a></li>
                            @else
                            @if(Auth::user()->roles[0]->name == 'superadmin' || Auth::user()->roles[0]->name == 'admin')
                            <li><a href="{{ url('/admin/dashboard') }}">{{ __('common.admin_login') }}</a></li>
                            @endif
                            @endif
                        </ul>
                    </aside>
                    <aside class="widget widget_footer">
                        <h4 class="widget-title">{{ __('common.footer.service_title') }}</h4>
                        <ul class="ps-list--link">
                            <li><a href="{{ url('/contact') }}">{{ __('common.footer.service_buy') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('common.footer.service_bidding') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('common.footer.service_consult') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('common.footer.service_shred') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('common.footer.service_waste') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('common.footer.service_other') }}</a></li>
                        </ul>
                    </aside>

                </div>
                <div class="col-md-4">
                    <aside class="widget widget_footer ">
                        <h4 class="widget-title">{{ __('common.map') }}</h4>
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
