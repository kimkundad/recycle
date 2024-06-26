@extends('layouts.template')

@section('title')

    @if (session()->get('locale') == 'th')
    {{ $objs->name_pro }} - wpnrayong
    @else
        @if ($objs->name_pro_en == null)
        {{ $objs->name_pro }} - wpnrayong
        @else
        {{ $objs->name_pro_en }} - wpnrayong
        @endif
    @endif

@stop

@section('og')
    <meta property="og:url"           content="{{ url('/product_detail/'.$objs->id_q) }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $objs->name_pro }}" />
    <meta property="og:image"         content="{{ url('images/wpnrayong/product/'.$objs->image_pro) }}?v{{time()}}" />
    <meta property="og:description"   content="{{ get_facebook_detail() }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
@stop('og')

@section('stylesheet')

@stop('stylesheet')

@section('content')

    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    @if (session()->get('locale') == 'th')
                    <a href="{{ url('category?id=0') }}">สินค้าทั้งหมด</a>
                    @else
                    <a href="{{ url('category?id=0') }}">All Products</a>
                    @endif
                </li>
                <li>
                    @if (session()->get('locale') == 'th')
                    {{ $objs->name_pro }}
                    @else
                        @if ($objs->name_pro_en == null)
                        {{ $objs->name_pro }}
                        @else
                        {{ $objs->name_pro_en }}
                        @endif
                    @endif
                </li>
            </ul>
        </div>
    </div>
    <div class="ps-page--product pt-5px" >
        <div class="container">
            <div class="ps-page__container">
                <div class="">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <div class="ps-product__thumbnail" data-vertical="true">

                                @if(count($img) > 0 )

                                <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            @isset($img)
                                            @foreach($img as $u)
                                            <div class="item">
                                                <a href="{{ url('images/wpnrayong/product_images/'.$u->image) }}">
                                                    <img src="{{ url('images/wpnrayong/product_images/'.$u->image) }}" alt="{{ $objs->name_pro }}">
                                                </a>
                                            </div>
                                            @endforeach
                                            @endisset
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    @isset($img)
                                        @foreach($img as $u)
                                            <div class="item">
                                                <img src="{{ url('images/wpnrayong/product_images/'.$u->image) }}" alt="{{ $objs->name_pro }}">
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>

                                @else
                                <img src="{{ url('images/wpnrayong/product/'.$objs->image_pro) }}" alt="{{ $objs->name_pro }}" />
                                @endif
                                {{-- <figure>
                                    <div class="ps-wrapper">
                                        <div class="ps-product__gallery" data-arrow="true">
                                            <div class="item"><a href="{{ url('img/product/Rectangle 38.png') }}"><img src="{{ url('img/product/Rectangle 38.png') }}" alt=""></a></div>
                                            <div class="item"><a href="{{ url('img/product/image 34.png') }}"><img src="{{ url('img/product/image 34.png') }}" alt=""></a></div>
                                            <div class="item"><a href="{{ url('img/product/image 38.png') }}"><img src="{{ url('img/product/image 38.png') }}" alt=""></a></div>
                                            <div class="item"><a href="{{ url('img/product/image 39.png') }}"><img src="{{ url('img/product/image 39.png') }}" alt=""></a></div>
                                        </div>
                                    </div>
                                </figure>
                                <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                    <div class="item"><img src="{{ url('img/product/Rectangle 38.png') }}" alt=""></div>
                                    <div class="item"><img src="{{ url('img/product/image 34.png') }}" alt=""></div>
                                    <div class="item"><img src="{{ url('img/product/image 38.png') }}" alt=""></div>
                                    <div class="item"><img src="{{ url('img/product/image 39.png') }}" alt=""></div>
                                </div> --}}

                            </div>
                            <div class="ps-product__info">

                            @if (session()->get('locale') == 'th')
                            <h1>{{ $objs->name_pro }}</h1>
                            @else
                                @if ($objs->name_pro_en == null)
                                <h1>{{ $objs->name_pro }}</h1>
                                @else
                                <h1>{{ $objs->name_pro_en }}</h1>
                                @endif
                            @endif

                                <div class="d-flex">
                                            @if($objs->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($objs->amount, 2) }}</p>
                                            @else

                                            @php
                                                $discount = ($objs->amount * $objs->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($objs->amount-$discount, 2) }} <del>฿{{ number_format($objs->amount, 2) }} </del></p>
                                            @endif
                                            @if($objs->discount > 0)
                                    <span class="badge badge-light-success fs-base w-80px p-5px mt-10px ml-10px">{{ $objs->discount }}% ส่วนลด</span>
                                    @endif
                                </div>

                                <div class="ps-product__desc">
                                    <p>
                                        {{ $objs->title_pro }}
                                    </p>
                                    <div class="ps-product__specification">
                                        @if($brand)
                                        <p class="mt-10px"><strong>Brand:</strong> {{ $brand->name }}</p>
                                        @endif
                                        <p class="mt-10px"><strong>SKU:</strong> {{ $objs->sku }}</p>
                                        <p class="mt-10px"><strong>Net weight:</strong> {{ $objs->weight }}</p>
                                        <p class="mt-10px"><strong>Condition:</strong>
                                            @if (session()->get('locale') == 'th')
                                            <h1>{{ $objs->condition }}</h1>
                                            @else
                                                @if ($objs->condition_en == null)
                                                <h1>{{ $objs->condition }}</h1>
                                                @else
                                                <h1>{{ $objs->condition_en }}</h1>
                                                @endif
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="ps-product__variations bor-line-top">
                                    <figure>
                                        @if (session()->get('locale') == 'th')
                                        <figcaption class="contact-product-title">ติดต่อเพื่อซื้อสินค้า</figcaption>
                                        @else
                                        <figcaption class="contact-product-title">Contact to buy products</figcaption>
                                        @endif
                                    </figure>
                                </div>
                                <div class="header d-flex">
                                    <div class="header__actions con-position-pro">
                                        <a class="ps-btn set-btn-inner ps-btn--outline" href="tel:{{ get_phone2() }}">
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
                                        <a class="header__extra btn_green_header" target="_blank" href="{{ get_facebook() }}">
                                            <img class="img-icon-green_header" src="{{ url('img/icon/facebook_line.png') }}">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="ps-section--default mt-20 mb-5px">
                            <div class="ps-section__header mb-20">
                                @if (session()->get('locale') == 'th')
                                <h3>ข้อมูลเพิ่มเติม</h3>
                                @else
                                <h3>Additional information</h3>
                                @endif
                            </div>
                        </div>

                            <p>
                                @if (session()->get('locale') == 'th')
                                    {!! $objs->detail_pro !!}
                                @else
                                    @if ($objs->condition_en == null)
                                    {!! $objs->detail_pro !!}
                                    @else
                                    {!! $objs->detail_pro_en !!}
                                    @endif
                                @endif
                            </p>


                    </div>
                </div>

            </div>
            <div class="ps-section--default ps-customer-bought">
                <div class="ps-section__header">
                    @if (session()->get('locale') == 'th')
                    <div class="d-flex justify-content-between">
                        <h3>สินค้าแนะนำ</h3>
                        <a href="{{ url('/category?id=0') }}" class="">
                            ดูเพิ่มเติม <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
                        </a>
                    </div>
                    @else
                    <div class="d-flex justify-content-between">
                        <h3>Recommended</h3>
                        <a href="{{ url('/category?id=0') }}" class="">
                            View Moew <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
                        </a>
                    </div>
                    @endif
                </div>
                <div class="ps-section__content">
                    <div class="">
                        <div class="row">

                            @isset($pro)
                        @foreach($pro as $u)
                            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 fix-pad">
                                <div class="ps-product">
                                    <div class="ps-product__thumbnail h-min-set" ><a href="{{ url('product_detail/'.$u->id_q) }}">
                                        <img src="{{ url('images/wpnrayong/product/'.$u->image_pro) }}" alt="{{ $u->name_pro }}" /></a>
                                    </div>
                                    <div class="ps-product__container">
                                        @if(session()->get('locale') == 'th')
                                        <a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                        @else
                                            @if($u->name_pro_en == null)
                                                <a class="ps-product__vendor" href="#">{{ $u->name_pro }}</a>
                                            @else
                                                <a class="ps-product__vendor" href="#">{{ $u->name_pro_en }}</a>
                                            @endif

                                        @endif
                                        <div class="ps-product__content">
                                            @if($u->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif
                                            @if(session()->get('locale') == 'th')
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                            @else
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">View</a>
                                            @endif
                                        </div>
                                        <div class="ps-product__content hover">
                                            @if($u->discount == 0)
                                            <p class="ps-product__price text-green">฿{{ number_format($u->amount, 2) }}
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @else

                                            @php
                                                $discount = ($u->amount * $u->discount) / 100 ;
                                            @endphp

                                            <p class="ps-product__price sale">฿{{ number_format($u->amount-$discount, 2) }} <del>฿{{ number_format($u->amount, 2) }} </del>
                                                @if($u->unit_id !== 3 && $u->unit_id !== null)
                                                <b> {{ $u->name_unit }}</b>
                                                @endif
                                            </p>
                                            @endif
                                            @if(session()->get('locale') == 'th')
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">ดูข้อมูลสินค้า</a>
                                            @else
                                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('product_detail/'.$u->id_q) }}">View</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('scripts')
@stop('scripts')
