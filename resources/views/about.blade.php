@extends('layouts.template')

@section('title')
{{ __('about.meta_title') }}
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

<style>

    .set-pad-in-md{
        padding-right: 0px !important;
    padding-left: 0px !important;
    }
    .set-margin-card{
        margin-left: 8px !important;
    margin-right: 8px !important;
    }
    .video {
  width: 100%;
  aspect-ratio: 16 / 9;
  border: 1px solid red;
  overflow: hidden;
  position: relative;
}
iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  aspect-ratio: 16 / 9;
}
</style>
<style>
    .owl-carousel .owl-item img {
display: block;
width: 60px !important;
}
.set-pad-in-md {
padding-right: 10px !important;
padding-left: 10px !important;
}
.min-h-90{
min-height: 90px
}
.h-100-lh-20{
    height:100px;
    line-height:20px
}
.h-120-lh-20{
    height:120px !important;
    line-height:20px
}
.h-140-lh-20{
    height:140px !important;
    line-height:20px
}
</style>
@section('content')

<div class="ps-deal-of-day mt-30 pb-5px">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>{{ __('home.about_heading') }}</h3>
                </div>
            </div>

        </div>
        <div class="ps-section__content">

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12  ps-product--detail ps-product--fullwidth">
                    <div class="ps-product__thumbnail" data-vertical="false">
                        <figure>
                            <div class="ps-wrapper">
                                <div class="ps-product__gallery" data-arrow="true" data-loops="true">
                                    <div class="item"><a href="{{ url('img/About/626x418-about-1.jpg') }}"><img src="{{ url('img/About/626x418-about-1.jpg') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/About/626x418-about-2.jpg') }}"><img src="{{ url('img/About/626x418-about-2.jpg') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/About/626x418-about-3.jpg') }}"><img src="{{ url('img/About/626x418-about-3.jpg') }}" alt=""></a></div>
                                    <div class="item"><a href="{{ url('img/About/626x418-about-4.jpg') }}"><img src="{{ url('img/About/626x418-about-4.jpg') }}" alt=""></a></div>
                                </div>
                            </div>
                        </figure>
                        <div class="ps-product__variants" data-item="4" data-md="3" data-sm="3" data-arrow="false">
                            <div class="item"><img src="{{ url('img/About/626x418-about-1.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/About/626x418-about-2.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/About/626x418-about-3.jpg') }}" alt=""></div>
                            <div class="item"><img src="{{ url('img/About/626x418-about-4.jpg') }}" alt=""></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body ps-product--detail card-body-x">

                            @include('partials.about-tabs')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@if((get_youtube() !== null))
<div class="ps-deal-of-day mt-30 pb-5px">
    <div class="container">
        <div class="ps-section__content">

            <div class="row justify-content-md-center">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12  ps-product--detail ps-product--fullwidth">
                    <div class="video">
                        <iframe src="{{ get_youtube() }}?version=3&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=0&amp;mute=0&amp;loop=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif

<div class="ps-deal-of-day mt-5">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>{{ __('home.licenses') }}</h3>
                </div>
            </div>
            <a href="{{ url('/certificate') }}" class="">
                {{ __('common.view_more') }} <img class="img-icon-green_header_footer" src="{{ url('img/icon/PngItem_6391407.png') }}">
            </a>
        </div>

        @if(count($cer) > 5 )
        <div class="img-portfolio">
            <div class="dg-wrapper ps-section__content">
                <div class="text-center img_ro img_rotation1" data-image="{{ $cer[0]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[0]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[0]->name }}</h4> --}}
                    </div>
                </div>
                <div class="text-center img_ro img_rotation2" data-image="{{ $cer[1]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[1]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[1]->name }}</h4> --}}
                </div>
                </div>
                <div class="text-center img_ro img_rotation3" data-image="{{ $cer[2]->id }}">
                    <div class="scale-100">
                        <img src="{{ url('img/certificate/'.$cer[2]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[2]->name }}</h4> --}}
                </div>
                </div>
                <div class="text-center img_ro img_rotation4" data-image="{{ $cer[3]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[3]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[3]->name }}</h4> --}}
                </div>
                </div>
                <div class="text-center img_ro img_rotation5" data-image="{{ $cer[4]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[4]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[4]->name }}</h4> --}}
                    </div>
                </div>
                <div class="text-center img_ro img_rotation6" data-image="{{ $cer[5]->id }}">
                    <div class="scale-100 text-center">
                        <img src="{{ url('img/certificate/'.$cer[5]->image) }}" >
                        {{-- <h4 class="text-gray-400 fs-16px">{{ $cer[5]->name }}</h4> --}}
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>


<div class="ps-deal-of-day mt-veri">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>{{ __('home.customers') }}</h3>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="ps-client-say">
    <div class="container">
        <div class="ps-section__content">
            <div class="ps-carousel--testimonials owl-slider"
            data-owl-auto="true"
            data-owl-loop="true"
            data-owl-speed="2000"
            data-owl-gap="0"
            data-owl-nav="false"
            data-owl-dots="false"
            data-owl-item="6"
            data-owl-item-xs="3"
            data-owl-item-sm="3"
            data-owl-item-md="4"
            data-owl-item-lg="3"
            data-owl-duration="1000"
            data-owl-mousedrag="on">

                @isset($ban)
                    @foreach ($ban as $item)
                        <div class="ps-block--testimonial text-center">
                            <img src="{{ url('img/alliance/'.$item->image) }}" alt="{{ $item->name }}" class="" style="width: 100% !important;">
                        </div>
                    @endforeach
                @endisset

            </div>
        </div>
    </div>
</div>


<div class="ps-deal-of-day mt-40">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>{{ __('about.policy_heading') }}</h3>
                </div>
            </div>
        </div>
        <div class="card" style="border: 1px solid rgb(0 0 0 / 0%);">
            <div class="card-body ps-product--detail card-body-x pl-0 pr-0">

                @includeFirst(['partials.about-policy.' . app()->getLocale(), 'partials.about-policy.en'])

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')


<script>

    $(document).on('click','.img_ro',function (event) {
          event.preventDefault();

          var img = $(this).data('image');
          var ENDPOINT = "{{ url('/') }}";
          $.ajax({
                    url: ENDPOINT + "/getModal?data_id=" + img,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.modal-content-img').html('');
                    }
                })
                .done(function (response) {
                    $('.modal-content-img').html(response);
                        $('#kt_modal_4_2').modal("show");
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });

          getModal
          console.log('img : ', img)

    });

    </script>

@stop('scripts')
