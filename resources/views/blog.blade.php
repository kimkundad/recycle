@extends('layouts.template')

@section('title')
กิจกรรม & ประชาสัมพันธ์ วงษ์พาณิชย์ - wpnrayong
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
<meta name="csrf-token" content="{{ csrf_token() }}">
@stop('stylesheet')

@section('content')

<div class="ps-deal-of-day mt-40">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>กิจกรรม & ประชาสัมพันธ์</h3>
                </div>
            </div>
        </div>
        <div class="ps-blog__content">

            @isset($objs[0])
            <div class="ps-post ps-post--horizontal">
                <div class="ps-post__thumbnail">
                    <a class="ps-post__overlay" href="{{ url('blog_detail/'.$objs[0]->id) }}"></a>
                    <img src="{{ url('media/'.$objs[0]->image) }}" alt="{{ $objs[0]->title }}">
                </div>
                <div class="ps-post__content">
                    <div class="ps-post__top">
                        <div class="ps-post__meta">
                        </div><a class="ps-post__title" href="{{ url('blog_detail/'.$objs[0]->id) }}">{{ $objs[0]->title }}</a>
                        <div class="ps-post__desc">
                            <p>{{ $objs[0]->sub_title }}…</p>
                        </div>
                    </div>
                    <p>{{ formatDateThat($objs[0]->startdate) }} BY WPN </a></p>
                    <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('blog_detail/'.$objs[0]->id) }}">อ่านต่อ</a>
                </div>
            </div>
            @endisset

            <div class="row " id="data-wrapper">
                {{-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ url('/blog_detail') }}"></a>
                            <img src="{{ url('img/brand/image 25.png') }}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <a class="ps-post__title" href="#">การอบรมคัดแยกขยะเชิงธุรกิจ หลักสูตร 6 วัน</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/blog_detail') }}">อ่านต่อ</a>
                        </div>
                    </div>
                </div> --}}

                


            </div>

            @if(count($objs) > 6)
            <div class="text-center mt-30">
                <a class="green_btn_kim_out btn_card_in btn-box" href="#">ดูเพิ่มเติม</a>
            </div> 
            <br><br>
            @endif

            <div class="auto-load text-center">
                <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                    <path fill="#000"
                        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                            from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                    </path>
                </svg>
            </div>

        </div>

    </div>
</div>


@endsection

@section('scripts')

<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 1;
    infinteLoadMore(page);
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            infinteLoadMore(page);
        }
    });
    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/blogs?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.auto-load').html("");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }
</script>
@stop('scripts')