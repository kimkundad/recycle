@extends('layouts.template')

@section('title')
@if (session()->get('locale') == 'th')
{{ $objs->name_pro }} - ผลิตภัณฑ์ดีไซน์
@else
{{ $objs->name_pro_en ?: $objs->name_pro }} - Upcycle Design Products
@endif
@stop

@section('og')
    <meta property="og:url" content="{{ url('/design-products/'.$objs->id_q) }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ session()->get('locale') == 'th' ? $objs->name_pro : ($objs->name_pro_en ?: $objs->name_pro) }}" />
    <meta property="og:image" content="{{ url('images/wpnrayong/product/'.$objs->image_pro) }}?v{{ time() }}" />
    <meta property="og:description" content="{{ strip_tags(session()->get('locale') == 'th' ? ($objs->title_pro ?: get_facebook_detail()) : ($objs->title_pro_en ?: $objs->title_pro ?: get_facebook_detail())) }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
@stop('og')

@section('stylesheet')
<style>
    .design-detail-page {
    
        padding-bottom: 72px;
    }
    .ps-breadcrumb{
     
    }

    .design-detail-breadcrumb {
        padding: 26px 0 8px;
    }

    .design-detail-breadcrumb .breadcrumb {
        background: transparent;
        margin-bottom: 0;
        padding: 0;
    }

    .design-detail-breadcrumb .breadcrumb li,
    .design-detail-breadcrumb .breadcrumb a {
        color: #5f6d68;
        font-size: 14px;
    }

    .design-detail-card {
        background: #fff;
        border: 1px solid #e6ece8;
        border-radius: 32px;
        box-shadow: 0 18px 50px rgba(18, 53, 45, 0.07);
        overflow: hidden;
        padding: 34px;
    }

    .design-detail-layout {
        align-items: start;
        display: grid;
        gap: 34px;
        grid-template-columns: minmax(0, 680px) minmax(0, 1fr);
    }

    .design-detail-gallery {
        max-width: 680px;
        width: 100%;
    }

    .design-gallery {
        display: grid;
        gap: 18px;
        grid-template-columns: 78px minmax(0, 1fr);
        align-items: start;
    }

    .design-gallery__thumbs {
        display: flex;
        flex-direction: column;
        gap: 12px;
        max-height: 640px;
        overflow-y: auto;
        padding-right: 4px;
    }

    .design-gallery__thumb {
        background: #fff;
        border: 1px solid #dce7e2;
        border-radius: 14px;
        cursor: pointer;
        height: 78px;
        overflow: hidden;
        padding: 0;
        transition: all 0.2s ease;
        width: 100%;
    }

    .design-gallery__thumb.is-active {
        border-color: #0f8f58;
        box-shadow: 0 0 0 3px rgba(15, 143, 88, 0.12);
    }

    .design-gallery__thumb img {
        height: 100%;
        object-fit: cover;
        width: 100%;
    }

    .design-gallery__stage {
        background: linear-gradient(180deg, #f7f8f6 0%, #eef2ef 100%);
        border: 1px solid #e1e9e4;
        border-radius: 28px;
        min-height: 560px;
        overflow: hidden;
        position: relative;
    }

    .design-gallery__main {
        align-items: center;
        display: flex;
        height: 100%;
        justify-content: center;
        min-height: 560px;
        padding: 22px;
        width: 100%;
    }

    .design-gallery__main img {
        display: block;
        height: 100%;
        max-height: 516px;
        max-width: 100%;
        object-fit: contain;
        width: 100%;
    }

    .design-gallery__controls {
        display: flex;
        gap: 10px;
        position: absolute;
        right: 18px;
        top: 18px;
        z-index: 2;
    }

    .design-gallery__control {
        align-items: center;
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid #dce7e2;
        border-radius: 999px;
        color: #12352d;
        cursor: pointer;
        display: inline-flex;
        font-size: 18px;
        height: 40px;
        justify-content: center;
        width: 40px;
    }

    .design-gallery__hint {
        bottom: 18px;
        color: #6b7c77;
        font-size: 12px;
        left: 24px;
        position: absolute;
        z-index: 2;
    }

    .design-detail-content {
        min-width: 0;
        width: 100%;
    }

    .design-detail-kicker {
        color: #0f8f58;
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.12em;
        margin-bottom: 16px;
        text-transform: uppercase;
    }

    .design-detail-title {
        color: #12352d;
        font-size: 40px;
        line-height: 1.18;
        margin-bottom: 18px;
    }

    .design-detail-summary {
        color: #536560;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 22px;
        max-width: 640px;
    }

    .design-detail-meta {
        display: grid;
        gap: 14px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        margin-bottom: 24px;
    }

    .design-detail-meta__item {
        background: #f6f8f7;
        border: 1px solid #e6ece8;
        border-radius: 18px;
        min-height: 84px;
        padding: 16px 18px;
    }

    .design-detail-meta__label {
        color: #6d7e79;
        display: block;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        margin-bottom: 6px;
        text-transform: uppercase;
    }

    .design-detail-meta__value {
        color: #12352d;
        font-size: 17px;
        font-weight: 600;
        line-height: 1.5;
    }

    .design-detail-contact {
        background: linear-gradient(135deg, #12352d 0%, #1d5a4c 100%);
        border-radius: 24px;
        color: #fff;
        margin-bottom: 26px;
        padding: 24px;
    }

    .design-detail-contact h3 {
        color: #fff;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .design-detail-contact p {
        color: rgba(255, 255, 255, 0.82);
        font-size: 15px;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .design-detail-contact__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .design-detail-btn {
        align-items: center;
        border-radius: 12px;
        display: inline-flex;
        font-size: 14px;
        font-weight: 600;
        justify-content: center;
        min-height: 46px;
        padding: 11px 16px;
        text-align: center;
        transition: all 0.2s ease;
    }

    .design-detail-btn:hover {
        transform: translateY(-1px);
    }

    .design-detail-btn--light {
        background: #fff;
        border: 1px solid #fff;
        color: #12352d;
    }

    .design-detail-btn--ghost {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.38);
        color: #fff;
    }

    .design-detail-body {
        margin-top: 34px;
    }

    .design-detail-sections {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .design-detail-body__card {
        background: #fff;
        border: 1px solid #e6ece8;
        border-radius: 28px;
        box-shadow: 0 14px 40px rgba(18, 53, 45, 0.05);
        padding: 28px;
    }

    .design-detail-body__card--full {
        grid-column: 1 / -1;
    }

    .design-detail-body__card h3 {
        color: #12352d;
        font-size: 26px;
        margin-bottom: 16px;
    }

    .design-detail-body__content {
        color: #42534f;
        font-size: 16px;
        line-height: 1.95;
    }

    .design-detail-list {
        display: grid;
        gap: 12px;
        margin: 0;
        padding: 0;
    }

    .design-detail-list li {
        align-items: flex-start;
        color: #42534f;
        display: flex;
        gap: 12px;
        font-size: 15px;
        line-height: 1.85;
        list-style: none;
    }

    .design-detail-list li:before {
        color: #0f8f58;
        content: "•";
        font-size: 24px;
        line-height: 1;
        margin-top: 2px;
    }

    .design-detail-note {
        color: #6b7c77;
        font-size: 13px;
        line-height: 1.8;
        margin-top: 14px;
    }

    .design-detail-body--legacy {
        display: none;
    }

    .design-detail-related {
        margin-top: 42px;
    }

    .design-detail-related__header {
        align-items: center;
        display: flex;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
    }

    .design-detail-related__header h3 {
        color: #12352d;
        font-size: 28px;
        margin-bottom: 0;
    }

    .design-detail-related__header a {
        color: #0f8f58;
        font-size: 15px;
        font-weight: 600;
    }

    .design-related-card {
        background: #fff;
        border: 1px solid #e6ece8;
        border-radius: 24px;
        box-shadow: 0 14px 34px rgba(18, 53, 45, 0.05);
        height: 100%;
        overflow: hidden;
    }

    .design-related-card__image {
        display: block;
        padding-top: 72%;
        position: relative;
    }

    .design-related-card__image img {
        height: 100%;
        left: 0;
        object-fit: cover;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .design-related-card__body {
        padding: 18px;
    }

    .design-related-card__title {
        color: #12352d;
        display: block;
        font-size: 16px;
        font-weight: 600;
        line-height: 1.55;
        margin-bottom: 12px;
        min-height: 50px;
    }

    .design-related-card__link {
        color: #0f8f58;
        font-size: 14px;
        font-weight: 600;
    }

    @media (max-width: 1199px) {
        .design-detail-layout {
            grid-template-columns: 1fr;
        }

        .design-detail-gallery,
        .design-detail-gallery .ps-product__thumbnail {
            max-width: 100%;
        }
    }

    @media (max-width: 767px) {
        .design-detail-card {
            border-radius: 24px;
            padding: 22px;
        }

        .design-detail-title {
            font-size: 30px;
        }

        .design-detail-meta {
            grid-template-columns: 1fr;
        }

        .design-detail-related__header {
            align-items: flex-start;
            flex-direction: column;
        }

        .design-detail-sections {
            grid-template-columns: 1fr;
        }

        .design-detail-body__card--full {
            grid-column: auto;
        }

        .design-gallery {
            gap: 12px;
            grid-template-columns: 1fr;
        }

        .design-gallery__thumbs {
            flex-direction: row;
            max-height: none;
            overflow-x: auto;
            overflow-y: hidden;
            order: 2;
            padding-bottom: 4px;
            padding-right: 0;
        }

        .design-gallery__thumb {
            flex: 0 0 72px;
            height: 72px;
        }

        .design-gallery__stage,
        .design-gallery__main {
            min-height: 360px;
        }

        .design-gallery__main img {
            max-height: 316px;
        }
    }
</style>
@stop('stylesheet')

@section('content')
<div class="design-detail-page">
    @php
        $isThaiLocale = session()->get('locale') == 'th';
        $localizedName = $isThaiLocale ? $objs->name_pro : ($objs->name_pro_en ?: $objs->name_pro);
        $localizedSummary = $isThaiLocale
            ? ($objs->title_pro ?: 'ผลงานดีไซน์ที่เปลี่ยนวัสดุเหลือใช้ให้กลายเป็นชิ้นงานที่ใช้งานได้จริงและมีคุณค่าในพื้นที่ของคุณ')
            : ($objs->title_pro_en ?: $objs->title_pro ?: 'A design-led piece that transforms surplus materials into something functional, distinctive, and worth keeping.');
        $localizedDetail = $isThaiLocale ? ($objs->detail_pro ?: '') : ($objs->detail_pro_en ?: $objs->detail_pro ?: '');
        $materialText = $isThaiLocale
            ? ($objs->material ?: 'ยังไม่ได้ระบุข้อมูลวัสดุที่ใช้สำหรับสินค้าชิ้นนี้')
            : ($objs->material_en ?: $objs->material ?: 'Material information has not been specified for this product yet.');
        $highlightText = $isThaiLocale
            ? ($objs->highlights ?: 'ยังไม่ได้ระบุจุดเด่นสินค้าสำหรับสินค้าชิ้นนี้')
            : ($objs->highlights_en ?: $objs->highlights ?: 'Highlights have not been specified for this product yet.');
        $useCaseText = $isThaiLocale
            ? ($objs->use_case ?: 'ยังไม่ได้ระบุการใช้งานสำหรับสินค้าชิ้นนี้')
            : ($objs->use_case_en ?: $objs->use_case ?: 'Use case information has not been specified for this product yet.');
    @endphp


    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    @if (session()->get('locale') == 'th')
                    <a href="{{ url('design-products') }}">ผลิตภัณฑ์ดีไซน์</a>
                    @else
                    <a href="{{ url('design-products') }}">Upcycle Design Products</a>
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

    <div class="container">
        <section class="design-detail-card ps-product--detail ps-product--fullwidth">
            <div class="ps-product__header design-detail-layout">
                <div class="design-detail-gallery">
                    @php
                        $galleryImages = collect();
                        if (!empty($objs->image_pro)) {
                            $galleryImages->push([
                                'full' => url('images/wpnrayong/product/'.$objs->image_pro),
                                'thumb' => url('images/wpnrayong/product/'.$objs->image_pro),
                            ]);
                        }
                        foreach ($img as $galleryItem) {
                            $galleryImages->push([
                                'full' => url('images/wpnrayong/product_images/'.$galleryItem->image),
                                'thumb' => url('images/wpnrayong/product_images/'.$galleryItem->image),
                            ]);
                        }
                        $galleryImages = $galleryImages->values();
                        $mainImage = $galleryImages->first();
                    @endphp

                    <div class="design-gallery">
                        <div class="design-gallery__thumbs">
                            @foreach($galleryImages as $index => $galleryImage)
                                <button
                                    class="design-gallery__thumb{{ $index === 0 ? ' is-active' : '' }}"
                                    type="button"
                                    data-design-thumb
                                    data-image="{{ $galleryImage['full'] }}"
                                    aria-label="Gallery image {{ $index + 1 }}"
                                >
                                    <img src="{{ $galleryImage['thumb'] }}" alt="{{ $objs->name_pro }}">
                                </button>
                            @endforeach
                        </div>

                        <div class="design-gallery__stage">
                            <div class="design-gallery__controls">
                                <a class="design-gallery__control" href="{{ $mainImage['full'] ?? url('images/wpnrayong/product/'.$objs->image_pro) }}" target="_blank" id="design-gallery-link" aria-label="Open image">
                                    +
                                </a>
                            </div>
                            <div class="design-gallery__main">
                                <img
                                    id="design-gallery-main-image"
                                    src="{{ $mainImage['full'] ?? url('images/wpnrayong/product/'.$objs->image_pro) }}"
                                    alt="{{ $objs->name_pro }}"
                                >
                            </div>
                            <div class="design-gallery__hint">
                                {{ session()->get('locale') == 'th' ? 'คลิกภาพย่อยเพื่อดูภาพเพิ่มเติม' : 'Select a thumbnail to view more images' }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="design-detail-content ps-product__info">
                    <span class="design-detail-kicker">{{ $isThaiLocale ? 'Design Product' : 'Upcycle Design Product' }}</span>
                    <h1 class="design-detail-title">{{ $localizedName }}</h1>

                    <p class="design-detail-summary">
                        {{ session()->get('locale') == 'th' ? ($objs->title_pro ?: 'ผลงานดีไซน์ที่เปลี่ยนวัสดุเหลือใช้ให้กลายเป็นชิ้นงานที่ใช้งานได้จริงและมีคุณค่าในพื้นที่ของคุณ') : ($objs->title_pro_en ?: $objs->title_pro ?: 'A design-led piece that transforms surplus materials into something functional, distinctive, and worth keeping.') }}
                    </p>

                    <div class="design-detail-meta">
                        <div class="design-detail-meta__item">
                            <span class="design-detail-meta__label">{{ session()->get('locale') == 'th' ? 'ประเภท' : 'Category' }}</span>
                            <div class="design-detail-meta__value">{{ $objs->cat_name ?: (session()->get('locale') == 'th' ? 'ผลิตภัณฑ์ดีไซน์' : 'Design Product') }}</div>
                        </div>
                        <div class="design-detail-meta__item">
                            <span class="design-detail-meta__label">{{ session()->get('locale') == 'th' ? 'Condition' : 'Condition' }}</span>
                            <div class="design-detail-meta__value">{{ session()->get('locale') == 'th' ? ($objs->condition ?: '-') : ($objs->condition_en ?: $objs->condition ?: '-') }}</div>
                        </div>
                        <div class="design-detail-meta__item">
                            <span class="design-detail-meta__label">SKU</span>
                            <div class="design-detail-meta__value">{{ $objs->sku ?: '-' }}</div>
                        </div>
                        <div class="design-detail-meta__item">
                            <span class="design-detail-meta__label">{{ session()->get('locale') == 'th' ? 'น้ำหนักสุทธิ' : 'Net Weight' }}</span>
                            <div class="design-detail-meta__value">{{ $objs->weight ?: '-' }}</div>
                        </div>
                    </div>

                    <div class="design-detail-contact">
                        <h3>{{ session()->get('locale') == 'th' ? 'สนใจชิ้นงานนี้?' : 'Interested in this piece?' }}</h3>
                        <p>{{ session()->get('locale') == 'th' ? 'สอบถามรายละเอียดเพิ่มเติม นัดชมสินค้า หรือพูดคุยเรื่องงานออกแบบและการใช้งานได้กับทีมของเรา' : 'Talk with our team for more details, viewing arrangements, or design-use consultation.' }}</p>
                        <div class="design-detail-contact__actions">
                            <a class="design-detail-btn design-detail-btn--light" href="{{ url('/contact') }}">{{ session()->get('locale') == 'th' ? 'สอบถามรายละเอียด' : 'Make an Inquiry' }}</a>
                            <a class="design-detail-btn design-detail-btn--ghost" href="tel:{{ get_phone2() }}">{{ session()->get('locale') == 'th' ? 'โทรหาเรา' : 'Call Us' }}</a>
                            <a class="design-detail-btn design-detail-btn--ghost" target="_blank" href="{{ get_line() }}">LINE</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="design-detail-body">
            <div class="design-detail-sections">
                <div class="design-detail-body__card">
                    <h3>{{ $isThaiLocale ? 'คำอธิบายสินค้า' : 'Description' }}</h3>
                    <div class="design-detail-body__content">
                        <p>{{ $localizedSummary }}</p>
                    </div>
                </div>

                <div class="design-detail-body__card">
                    <h3>{{ $isThaiLocale ? 'วัสดุที่ใช้' : 'Material' }}</h3>
                    <div class="design-detail-body__content">
                        <p>{{ $materialText }}</p>
                    </div>
                </div>

                <div class="design-detail-body__card">
                    <h3>{{ $isThaiLocale ? 'จุดเด่นสินค้า' : 'Highlights / Features' }}</h3>
                    <div class="design-detail-body__content">
                        <p>{!! nl2br(e($highlightText)) !!}</p>
                    </div>
                </div>

                <div class="design-detail-body__card">
                    <h3>{{ $isThaiLocale ? 'การใช้งาน' : 'Use Case' }}</h3>
                    <div class="design-detail-body__content">
                        <p>{!! nl2br(e($useCaseText)) !!}</p>
                    </div>
                </div>

                <div class="design-detail-body__card design-detail-body__card--full">
                    <h3>{{ $isThaiLocale ? 'รายละเอียดเพิ่มเติม' : 'Additional Information' }}</h3>
                    <div class="design-detail-body__content">
                        @if (!empty(trim(strip_tags($localizedDetail))))
                            {!! $localizedDetail !!}
                        @else
                            <p>{{ $isThaiLocale ? 'สามารถสอบถามรายละเอียดเพิ่มเติมเกี่ยวกับขนาด การใช้งาน และแนวทางการจัดวางได้กับทีมงานของเรา' : 'Please contact our team for additional details on dimensions, usage guidance, and placement recommendations.' }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="design-detail-body design-detail-body--legacy">
            <div class="design-detail-body__card">
                <h3>{{ session()->get('locale') == 'th' ? 'รายละเอียดเพิ่มเติม' : 'Additional Information' }}</h3>
                <div class="design-detail-body__content">
                    @if (session()->get('locale') == 'th')
                        {!! $objs->detail_pro !!}
                    @else
                        {!! $objs->detail_pro_en ?: $objs->detail_pro !!}
                    @endif
                </div>
            </div>
        </section>

        <section class="design-detail-related">
            <div class="design-detail-related__header">
                <h3>{{ session()->get('locale') == 'th' ? 'ชิ้นงานดีไซน์อื่นที่น่าสนใจ' : 'More Upcycle Design Products' }}</h3>
                <a href="{{ url('/design-products') }}">{{ session()->get('locale') == 'th' ? 'ดูทั้งหมด' : 'View All' }}</a>
            </div>
            <div class="row">
                @foreach($pro as $u)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <article class="design-related-card">
                            <a class="design-related-card__image" href="{{ url('/design-products/'.$u->id_q) }}">
                                <img src="{{ url('images/wpnrayong/product/'.$u->image_pro) }}" alt="{{ $u->name_pro }}">
                            </a>
                            <div class="design-related-card__body">
                                <a class="design-related-card__title" href="{{ url('/design-products/'.$u->id_q) }}">
                                    {{ session()->get('locale') == 'th' ? $u->name_pro : ($u->name_pro_en ?: $u->name_pro) }}
                                </a>
                                <a class="design-related-card__link" href="{{ url('/design-products/'.$u->id_q) }}">
                                    {{ session()->get('locale') == 'th' ? 'ดูรายละเอียด' : 'View Details' }}
                                </a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script>
    (function () {
        var mainImage = document.getElementById('design-gallery-main-image');
        var mainLink = document.getElementById('design-gallery-link');
        var thumbs = document.querySelectorAll('[data-design-thumb]');

        if (!mainImage || !thumbs.length) {
            return;
        }

        thumbs.forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                var nextImage = thumb.getAttribute('data-image');

                if (!nextImage) {
                    return;
                }

                mainImage.src = nextImage;
                if (mainLink) {
                    mainLink.href = nextImage;
                }

                thumbs.forEach(function (item) {
                    item.classList.remove('is-active');
                });

                thumb.classList.add('is-active');
            });
        });
    })();
</script>
@stop('scripts')
