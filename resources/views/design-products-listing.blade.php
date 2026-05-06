@extends('layouts.template')

@section('title')
@if (session()->get('locale') == 'th')
ผลิตภัณฑ์ดีไซน์ - wpnrayong
@else
Upcycle Design Products - wpnrayong
@endif
@stop

@section('og')
    <meta property="og:url" content="{{ url('/design-products') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ session()->get('locale') == 'th' ? 'ผลิตภัณฑ์ดีไซน์' : 'Upcycle Design Products' }}" />
    <meta property="og:image" content="{{ get_facebook_img() }}?v{{ time() }}" />
    <meta property="og:description" content="{{ get_facebook_detail() }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
@stop('og')

@section('stylesheet')
<style>
    .design-products-page {
        background: linear-gradient(180deg, #f7f7f2 0%, #ffffff 28%, #ffffff 100%);
        padding-bottom: 80px;
    }

    .design-products-hero {
        padding: 56px 0 28px;
    }

    .design-products-hero__wrap {
        background: linear-gradient(135deg, #12352d 0%, #1d5a4c 55%, #d8c38d 100%);
        border-radius: 28px;
        color: #fff;
        overflow: hidden;
        padding: 48px;
        position: relative;
    }

    .design-products-hero__wrap:before {
        background: rgba(255, 255, 255, 0.08);
        border-radius: 999px;
        content: "";
        height: 280px;
        position: absolute;
        right: -90px;
        top: -70px;
        width: 280px;
    }

    .design-products-hero__eyebrow {
        color: #d8c38d;
        display: inline-block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.18em;
        margin-bottom: 18px;
        position: relative;
        text-transform: uppercase;
        z-index: 1;
    }

    .design-products-hero h1 {
        color: #fff;
        font-size: 44px;
        line-height: 1.14;
        margin-bottom: 20px;
        max-width: 760px;
        position: relative;
        z-index: 1;
    }

    .design-products-hero p {
        color: rgba(255, 255, 255, 0.88);
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 0;
        max-width: 760px;
        position: relative;
        z-index: 1;
    }

    .design-products-toolbar {
        align-items: center;
        display: flex;
        justify-content: space-between;
        gap: 16px;
        margin: 8px 0 28px;
    }

    .design-products-toolbar__meta {
        color: #5f6d68;
        font-size: 15px;
    }

    .design-products-toolbar__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }

    .design-products-toolbar__chip {
        align-items: center;
        background: #f3f5f4;
        border: 1px solid #d6dfdb;
        border-radius: 999px;
        color: #28453d;
        display: inline-flex;
        font-size: 14px;
        font-weight: 600;
        min-height: 42px;
        padding: 0 16px;
    }

    .design-products-toolbar__sort {
        background: #fff;
        border: 1px solid #d6dfdb;
        border-radius: 999px;
        color: #28453d;
        font-size: 14px;
        font-weight: 600;
        min-height: 42px;
        min-width: 150px;
        padding: 0 16px;
    }

    .design-products-grid {
        min-height: 280px;
    }

    .design-products-layout {
        display: grid;
        gap: 28px;
        grid-template-columns: 280px minmax(0, 1fr);
    }

    .design-products-sidebar {
        align-self: start;
        background: #fff;
        border: 1px solid #e6ece8;
        border-radius: 24px;
        box-shadow: 0 14px 40px rgba(18, 53, 45, 0.06);
        padding: 22px;
        position: sticky;
        top: 24px;
    }

    .design-filter-intro {
        align-items: center;
        border: 1px solid #b8cdc5;
        border-radius: 16px;
        color: #1b4f43;
        display: flex;
        font-size: 15px;
        font-weight: 600;
        gap: 12px;
        margin-bottom: 22px;
        padding: 12px 14px;
    }

    .design-filter-intro i {
        font-size: 18px;
    }

    .design-filter-group + .design-filter-group {
        border-top: 1px solid #edf2ef;
        margin-top: 18px;
        padding-top: 18px;
    }

    .design-filter-group__title {
        color: #12352d;
        font-size: 17px;
        margin-bottom: 14px;
    }

    .design-filter-option {
        align-items: flex-start;
        display: flex;
        gap: 10px;
        margin-bottom: 12px;
    }

    .design-filter-option:last-child {
        margin-bottom: 0;
    }

    .design-filter-option input {
        margin-top: 4px;
    }

    .design-filter-option label {
        color: #536560;
        cursor: pointer;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 0;
    }

    .design-filter-actions {
        display: flex;
        gap: 10px;
        margin-top: 22px;
    }

    .design-filter-btn {
        align-items: center;
        border-radius: 12px;
        display: inline-flex;
        font-size: 13px;
        font-weight: 600;
        justify-content: center;
        min-height: 40px;
        padding: 0 14px;
    }

    .design-filter-btn--primary {
        background: #0f8f58;
        border: 1px solid #0f8f58;
        color: #fff;
    }

    .design-filter-btn--secondary {
        background: #fff;
        border: 1px solid #d6dfdb;
        color: #28453d;
    }

    .design-products-main {
        min-width: 0;
    }

    .design-product-card {
        background: #fff;
        border: 1px solid #e6ece8;
        border-radius: 24px;
        box-shadow: 0 14px 40px rgba(18, 53, 45, 0.06);
        display: flex;
        flex-direction: column;
        height: 100%;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .design-product-card:hover {
        box-shadow: 0 20px 50px rgba(18, 53, 45, 0.12);
        transform: translateY(-4px);
    }

    .design-product-card__image {
        background: #eef3f0;
        display: block;
        overflow: hidden;
        padding-top: 74%;
        position: relative;
    }

    .design-product-card__image img {
        height: 100%;
        left: 0;
        object-fit: cover;
        position: absolute;
        top: 0;
        width: 100%;
    }

    .design-product-card__body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 18px 18px 20px;
    }

    .design-product-card__title {
        font-size: 17px;
        line-height: 1.45;
        margin-bottom: 10px;
        min-height: 76px;
    }

    .design-product-card__title a {
        color: #12352d;
    }

    .design-product-card__summary {
        color: #5f6d68;
        flex: 1;
        font-size: 13px;
        line-height: 1.75;
        margin-bottom: 16px;
        min-height: 118px;
        word-break: break-word;
    }

    .design-product-card__actions {
        display: grid;
        gap: 8px;
        grid-template-columns: 1fr 1fr;
    }

    .design-product-btn {
        align-items: center;
        border-radius: 12px;
        display: inline-flex;
        font-size: 13px;
        font-weight: 600;
        justify-content: center;
        line-height: 1.3;
        min-height: 42px;
        padding: 10px 12px;
        text-align: center;
        transition: all 0.2s ease;
    }

    .design-product-btn:hover {
        transform: translateY(-1px);
    }

    .design-product-btn--primary {
        background: #009247;
        border: 1px solid #009247;
        color: #fff;
    }

    .design-product-btn--primary:hover {
        color: #fff;
    }

    .design-product-btn--secondary {
        background: #fff;
        border: 1px solid #009247;
        color: #12735a;
    }

    .design-product-btn--secondary:hover {
        color: #12735a;
    }

    .design-empty {
        background: #fff;
        border: 1px dashed #cdd8d3;
        border-radius: 24px;
        color: #5f6d68;
        padding: 48px 24px;
        text-align: center;
    }

    .design-products-layout--no-sidebar {
        grid-template-columns: 1fr;
    }

    @media (max-width: 991px) {
        .design-products-hero__wrap {
            padding: 36px 24px;
        }

        .design-products-hero h1 {
            font-size: 34px;
        }

        .design-products-toolbar {
            align-items: flex-start;
            flex-direction: column;
        }

        .design-products-layout {
            grid-template-columns: 1fr;
        }

        .design-products-sidebar {
            position: static;
        }

        .design-product-card__title {
            min-height: 0;
        }

        .design-product-card__summary {
            min-height: 0;
        }
    }

    @media (max-width: 575px) {
        .design-products-hero {
            padding-top: 28px;
        }

        .design-products-hero h1 {
            font-size: 28px;
        }

        .design-products-hero p {
            font-size: 16px;
        }

        .design-product-card__actions {
            grid-template-columns: 1fr;
        }

        .design-products-toolbar__actions {
            display: none;
        }
    }
</style>
@stop('stylesheet')

@section('content')
<div class="design-products-page">
    {{-- <section class="design-products-hero">
        <div class="container">
            <div class="design-products-hero__wrap">
                <span class="design-products-hero__eyebrow">From Waste to Worth.</span>
                @if (session()->get('locale') == 'th')
                    <h1>นิยามใหม่ของวัสดุอุตสาหกรรมเหลือใช้ สู่ผลงานดีไซน์ที่มีคุณค่า</h1>
                    <p>
                        เปลี่ยนวัสดุเหลือใช้ ให้เป็นเฟอร์นิเจอร์ดีไซน์ระดับพรีเมียม
                        ที่สะท้อนทั้ง “ตัวตน” และ “ความยั่งยืน”
                    </p>
                @else
                    <h1>A new definition of industrial surplus materials transformed into meaningful design.</h1>
                    <p>
                        We turn unused materials into premium design furniture that reflects
                        both identity and sustainability.
                    </p>
                @endif
            </div>
        </div>
    </section> --}}

    <section class="design-products-listing" >
        <div class="container">
            @php
                $hasSidebar = $showFilterTypes || $showFilterMaterials || $showFilterSizes;
            @endphp
            <div class="design-products-layout{{ $hasSidebar ? '' : ' design-products-layout--no-sidebar' }}" style="padding-top: 45px">
                @if($hasSidebar)
                <aside class="design-products-sidebar">
                    <div class="design-filter-intro">
                        <i class="icon-equalizer"></i>
                        <span>{{ session()->get('locale') == 'th' ? 'หมวดหมู่ : ผลิตภัณฑ์ดีไซน์' : 'Category : Design Products' }}</span>
                    </div>

                    @if($showFilterTypes)
                    <div class="design-filter-group">
                        <h4 class="design-filter-group__title">{{ session()->get('locale') == 'th' ? 'ประเภทสินค้า' : 'Product Type' }}</h4>
                        @forelse($designTypes as $item)
                        <div class="design-filter-option">
                            <input id="design-type-{{ $item->id }}" class="js-design-filter" data-filter-group="types" type="checkbox" value="{{ $item->id }}">
                            <label for="design-type-{{ $item->id }}">{{ session()->get('locale') == 'th' ? $item->name_th : ($item->name_en ?: $item->name_th) }}</label>
                        </div>
                        @empty
                        <div class="design-filter-option">
                            <label>{{ session()->get('locale') == 'th' ? 'ยังไม่มีข้อมูลประเภทสินค้า' : 'No product types yet' }}</label>
                        </div>
                        @endforelse
                    </div>
                    @endif

                    @if($showFilterMaterials)
                    <div class="design-filter-group">
                        <h4 class="design-filter-group__title">{{ session()->get('locale') == 'th' ? 'วัสดุ' : 'Material' }}</h4>
                        @forelse($designMaterials as $item)
                        <div class="design-filter-option">
                            <input id="design-material-{{ $item->id }}" class="js-design-filter" data-filter-group="materials" type="checkbox" value="{{ $item->id }}">
                            <label for="design-material-{{ $item->id }}">{{ session()->get('locale') == 'th' ? $item->name_th : ($item->name_en ?: $item->name_th) }}</label>
                        </div>
                        @empty
                        <div class="design-filter-option">
                            <label>{{ session()->get('locale') == 'th' ? 'ยังไม่มีข้อมูลวัสดุ' : 'No materials yet' }}</label>
                        </div>
                        @endforelse
                    </div>
                    @endif

                    @if($showFilterSizes)
                    <div class="design-filter-group">
                        <h4 class="design-filter-group__title">{{ session()->get('locale') == 'th' ? 'ขนาด' : 'Size' }}</h4>
                        @forelse($designSizes as $item)
                        <div class="design-filter-option">
                            <input id="design-size-{{ $item->id }}" class="js-design-filter" data-filter-group="sizes" type="checkbox" value="{{ $item->id }}">
                            <label for="design-size-{{ $item->id }}">{{ session()->get('locale') == 'th' ? $item->name_th : ($item->name_en ?: $item->name_th) }}</label>
                        </div>
                        @empty
                        <div class="design-filter-option">
                            <label>{{ session()->get('locale') == 'th' ? 'ยังไม่มีข้อมูลขนาด' : 'No sizes yet' }}</label>
                        </div>
                        @endforelse
                    </div>
                    @endif

                    <div class="design-filter-actions">
                        <button class="design-filter-btn design-filter-btn--primary" type="button" id="design-filter-apply">{{ session()->get('locale') == 'th' ? 'ใช้ตัวกรอง' : 'Apply' }}</button>
                        <button class="design-filter-btn design-filter-btn--secondary" type="button" id="design-filter-reset">{{ session()->get('locale') == 'th' ? 'ล้างค่า' : 'Reset' }}</button>
                    </div>
                </aside>
                @endif

                <div class="design-products-main">
                    <div class="design-products-toolbar">
                        <div class="design-products-toolbar__meta">
                            @if (session()->get('locale') == 'th')
                                แสดงสินค้าดีไซน์ทั้งหมด <strong id="design-products-count">{{ $count }}</strong> รายการ
                            @else
                                Showing <strong id="design-products-count">{{ $count }}</strong> upcycle design products
                            @endif
                        </div>
                        <div class="design-products-toolbar__actions">
                            <span class="design-products-toolbar__chip">{{ session()->get('locale') == 'th' ? 'ตัวกรองจากฐานข้อมูล' : 'Database Filters' }}</span>
                            <select id="design-products-sort" class="design-products-toolbar__sort">
                                <option value="latest">{{ session()->get('locale') == 'th' ? 'ล่าสุด' : 'Latest' }}</option>
                                <option value="sort_asc">{{ session()->get('locale') == 'th' ? 'แนะนำก่อน' : 'Featured First' }}</option>
                                <option value="name_asc">{{ session()->get('locale') == 'th' ? 'ชื่อ A-Z' : 'Name A-Z' }}</option>
                                <option value="name_desc">{{ session()->get('locale') == 'th' ? 'ชื่อ Z-A' : 'Name Z-A' }}</option>
                                <option value="oldest">{{ session()->get('locale') == 'th' ? 'เก่าสุด' : 'Oldest' }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row design-products-grid" id="design-products-wrapper"></div>

                    <div class="auto-load text-center">
                        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60"
                            viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                            <path fill="#000"
                                d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                <animateTransform attributeName="transform" attributeType="XML" type="rotate"
                                    dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    var designEndpoint = "{{ url('/design-products/find') }}";
    var designPage = 1;
    var hasMoreDesignProducts = true;
    var isLoadingDesignProducts = false;
    var currentDesignFilters = {
        types: [],
        materials: [],
        sizes: [],
        sort: 'latest'
    };

    loadDesignProducts(designPage);

    $('#design-filter-apply').on('click', function () {
        applyDesignFilters();
    });

    $('#design-filter-reset').on('click', function () {
        $('.js-design-filter').prop('checked', false);
        $('#design-products-sort').val('latest');
        applyDesignFilters();
    });

    $('#design-products-sort').on('change', function () {
        applyDesignFilters();
    });

    $(window).scroll(function() {
        if (!hasMoreDesignProducts || isLoadingDesignProducts) {
            return;
        }

        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 120) {
            designPage++;
            loadDesignProducts(designPage);
        }
    });

    function loadDesignProducts(page) {
        isLoadingDesignProducts = true;

        $.ajax({
                url: designEndpoint,
                dataType: "json",
                type: "get",
                data: {
                    page: page,
                    types: currentDesignFilters.types,
                    materials: currentDesignFilters.materials,
                    sizes: currentDesignFilters.sizes,
                    sort: currentDesignFilters.sort
                },
                beforeSend: function() {
                    $('.auto-load').show();
                }
            })
            .done(function(response) {
                $('#design-products-count').text(response.total || 0);

                if (!response.html || $.trim(response.html).length === 0) {
                    hasMoreDesignProducts = false;

                    if (page === 1) {
                        $('#design-products-wrapper').html(
                            '<div class="col-12"><div class="design-empty">{{ session()->get('locale') == 'th' ? 'ยังไม่มีสินค้าดีไซน์ในขณะนี้' : 'No design products are available at the moment.' }}</div></div>'
                        );
                    }

                    $('.auto-load').hide();
                    return;
                }

                hasMoreDesignProducts = !!response.has_more;
                $('.auto-load').hide();
                $('#design-products-wrapper').append(response.html);
            })
            .fail(function() {
                $('.auto-load').hide();
            })
            .always(function() {
                isLoadingDesignProducts = false;
            });
    }

    function applyDesignFilters() {
        currentDesignFilters = {
            types: getSelectedFilterValues('types'),
            materials: getSelectedFilterValues('materials'),
            sizes: getSelectedFilterValues('sizes'),
            sort: $('#design-products-sort').val() || 'latest'
        };

        designPage = 1;
        hasMoreDesignProducts = true;
        $('#design-products-wrapper').html('');
        loadDesignProducts(designPage);
    }

    function getSelectedFilterValues(group) {
        return $('.js-design-filter[data-filter-group="' + group + '"]:checked').map(function () {
            return $(this).val();
        }).get();
    }
</script>
@stop('scripts')
