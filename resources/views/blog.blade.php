@extends('layouts.template')

@section('stylesheet')
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

            <div class="ps-post ps-post--horizontal">
                <div class="ps-post__thumbnail">
                    <a class="ps-post__overlay" href="{{ url('/blog_detail') }}"></a>
                    <img src="{{ url('/img/image 31.png') }}" alt="">
                </div>
                <div class="ps-post__content">
                    <div class="ps-post__top">
                        <div class="ps-post__meta"><a href="#">Recycle Engineering</a>
                        </div><a class="ps-post__title" href="#">10 อันดับขยะที่นำมารีไซเคิลมากที่สุด</a>
                        <div class="ps-post__desc">
                            <p>ขยะประเภทพลาสติกมีจำนวนเพิ่มขึ้นอย่างรวดเร็ว เพราะสินค้าและบรรจุภัณฑ์ส่วนมากทำมาจากพลาสติก เช่น ขวดนม กระป๋องยา 
                                ขวดน้ำดื่ม ซึ่งคุณสมบัติที่เหมาะสมของพลาสติกซึ่งมีน้ำหนักเบา สีสันสวยงามไม่เป็นสนิม ทนทานและมีหลายประเภททำให้พลาสติกเป็นที่นิยมมากในปัจจุบัน 
                                ซึ่งขยะพวกนี้เมื่อนำมาเผาก็จะทำให้เกิดมลพิษสิ่งแวดล้อม…</p>
                        </div>
                    </div>
                    <p>December 17, 2022 by<a href="#"> วงษ์พาณิชย์ รีไซเคิล</a></p>
                    <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/blog_detail') }}">อ่านต่อ</a>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
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
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ url('/blog_detail') }}"></a>
                            <img src="{{ url('img/brand/image 26.png') }}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <a class="ps-post__title" href="#">การอบรมคัดแยกขยะเชิงธุรกิจ หลักสูตร 6 วัน</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/blog_detail') }}">อ่านต่อ</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ url('/blog_detail') }}"></a>
                            <img src="{{ url('img/brand/image 27.png') }}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <a class="ps-post__title" href="#">การอบรมคัดแยกขยะเชิงธุรกิจ หลักสูตร 6 วัน</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/blog_detail') }}">อ่านต่อ</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
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
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ url('/blog_detail') }}"></a>
                            <img src="{{ url('img/brand/image 26.png') }}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <a class="ps-post__title" href="#">การอบรมคัดแยกขยะเชิงธุรกิจ หลักสูตร 6 วัน</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/blog_detail') }}">อ่านต่อ</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                    <div class="ps-post">
                        <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ url('/blog_detail') }}"></a>
                            <img src="{{ url('img/brand/image 27.png') }}" alt="">
                        </div>
                        <div class="ps-post__content">
                            <a class="ps-post__title" href="#">การอบรมคัดแยกขยะเชิงธุรกิจ หลักสูตร 6 วัน</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            <a class="ps-btn ps-btn--fullwidth-green" href="{{ url('/blog_detail') }}">อ่านต่อ</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-30">
                <a class="green_btn_kim_out btn_card_in btn-box" href="#">ดูเพิ่มเติม</a>
            </div>

        </div>

    </div>
</div>


@endsection

@section('scripts')
@stop('scripts')