@extends('layouts.template')

@section('title')
หมวดหมู่และสินค้า วงษ์พาณิชย์รีไซเคิล ระยอง - wpnrayong
@stop

@section('stylesheet')

<style>
.ps-breadcrumb {
    padding: 20px 0;
    background-color: #f0f6fb;
}
</style>

@stop('stylesheet')

@section('content')


<div class="ps-breadcrumb">
    <div class="container">
        <div class="d-flex justify-content-between">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}">หน้าแรก</a></li>
                <li>สินค้าทั้งหมด</li>
            </ul>
            <a class="hide-green-ban-filter ps-btn set-btn-inner ps-btn--outline" href="#" id="filter-sidebar"><i class="icon-equalizer"></i> Filter</a>
        </div>
    </div>
</div>


<div class="ps-page--shop" id="shop-sidebar">
        <div class="container">

            {{-- <div class="d-flex flex-wrap justify-content-center mt-15 hide-mobile">

                @if(get_category())
                    @foreach(get_category() as $u)
                    <a href="{{ url('category?id='.$u->id) }}">
                        <div class="text-center porduct-top-list">
                            <img src="{{ url('img/category/'.$u->icons) }}" height="22" width="22"><br>
                            {{ $u->sub_name }}
                        </div>
                    </a>
                    @endforeach
                @endif
                
            </div> --}}

            

            <div class="ps-layout--shop">
                <div class="ps-layout__left">
                    <aside class="widget widget_shop ">
                        <a class="green_btn_kim_out btn_card_in btn-box2 btn-block" href="#">
                            <div class="d-flex">
                                <img src="{{ url('img/filter-variant.png') }}" height="32" width="32">
                                <div class="pt-5px">
                                    <h4 class="widget-title">หมวดหมู่ : ทุกหมวด</h4>
                                </div>
                            </div>
                        </a>
                        <br>
                        <ul class="ps-list--categories">
                            

                            @if(get_data_category())
                            @foreach(get_data_category() as $u)
                            <li class="current-menu-item menu-item-has-children"> 
                                <a href="#" >{{ $u->cat_name }}</a> 
                                <span class="sub-toggle">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                                <ul class="sub-menu" >
                                    @if($u->option)
                                    @foreach($u->option as $j)
                                    <li class="current-menu-item ">
                                        <a href="{{ url('category?id='.$j->id) }}">{{ $j->sub_name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                    
                                </ul>
                            </li>
                            @endforeach
                            @endif
                            
                        </ul>


                        
                    </aside>

                    {{-- <aside class="widget widget_shop widget_shop_bg">
                        <h4 class="widget-title mt-10 mb-1">ค้นหาจากแบรนด์สินค้า </h4>
                        <figure class="ps-custom-scrollbar" data-height="250" id="result_check">
                            @if(get_brand())
                            @foreach(get_brand() as $u)
                            <div class="ps-checkbox">
                                <input class="form-control" type="checkbox" id="m-brand-{{ $u->id }}" name="brand" data-id="{{ $u->id }}"/>
                                <label for="m-brand-{{ $u->id }}">{{ $u->name }} ({{ $u->option }})</label>
                            </div>
                            @endforeach
                            @endif
                            
                        </figure>
                        
                    </aside> --}}
                </div>
                <div class="ps-layout__right">
                    <div class="ps-shopping ps-tab-root">
                        
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-shopping-product">
                                    <div class="row" id="data-wrapper">


                                    </div>
                                </div>

                                @if($count > 12)

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
                </div>
            </div>
        </div>
    </div>

@endsection

<div class="ps-filter--sidebar">
    <div class="ps-filter__header">
        <h3 class="text-green">ค้นหาหมวดหมู่และสินค้า</h3><a class="ps-btn--close ps-btn--no-boder" href="#"></a>
    </div>
    <div class="ps-filter__content">
        <aside class="widget widget_shop ">
            <a class="green_btn_kim_out btn_card_in btn-box2 btn-block" href="#">
                <div class="d-flex">
                    <img src="{{ url('img/filter-variant.png') }}" height="32" width="32">
                    <div class="pt-5px">
                        <h4 class="widget-title">หมวดหมู่ : ทุกหมวด</h4>
                    </div>
                </div>
            </a>
            <br>
            <ul class="ps-list--categories">
                


                            @if(get_data_category())
                            @foreach(get_data_category() as $u)
                            <li class="current-menu-item menu-item-has-children"> 
                                <a href="#" class="active">{{ $u->cat_name }}</a> 
                                <span class="sub-toggle">
                                    <i class="fa fa-angle-down"></i>
                                </span>
                                <ul class="sub-menu" style="display: block;">
                                    @if($u->option)
                                    @foreach($u->option as $j)
                                    <li class="current-menu-item ">
                                        <a href="{{ url('category?id='.$j->id) }}">{{ $j->sub_name }}</a>
                                    </li>
                                    @endforeach
                                    @endif
                                    
                                </ul>
                            </li>
                            @endforeach
                            @endif
            </ul>
        </aside>
        {{-- <aside class="widget widget_shop widget_shop_bg">
            <h4 class="widget-title mt-10 mb-1">ค้นหาจากแบรนด์สินค้า</h4>
            <figure class="ps-custom-scrollbar" data-height="250" id="result_check2">
                @if(get_brand())
                    @foreach(get_brand() as $u)
                        <div class="ps-checkbox">
                            <input class="form-control" type="checkbox" id="m-brand-{{ $u->id }}x" name="brand" data-id="{{ $u->id }}"/>
                            <label for="m-brand-{{ $u->id }}x">{{ $u->name }} ({{ $u->option }})</label>
                        </div>
                    @endforeach
                @endif
            </figure>
        </aside> --}}
    </div>
</div>

@section('scripts')


<script>

    $("#result_check input").click(function() {
        $('#data-wrapper').html('');
        
        infinteLoadMore(1);
    }); 
    $("#result_check2 input").click(function() {
        $('#data-wrapper').html('');
        
        infinteLoadMore(1);
    }); 

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

        var category = {{ $category_id }}
        var search = '{{ $search }}'
        var data_brand = '';
        var receiptNos2 = $("#result_check input:checkbox:checked").map(function () {
                console.log('<---', $(this).data('id') )
                return $(this).data('id')
                }).get();

                var receiptNos3 = $("#result_check2 input:checkbox:checked").map(function () {
                console.log('<---', $(this).data('id') )
                return $(this).data('id')
                }).get();

                if(receiptNos2 == '' && receiptNos3 == ''){
                    data_brand = '';
                }else if(receiptNos2 !== '' && receiptNos3 == ''){
                    data_brand = receiptNos2;
                }else if(receiptNos2 == '' && receiptNos3 !== ''){
                    data_brand = receiptNos3;
                }else{

                }
                console.log('--->', receiptNos2)
        $.ajax({
                url: ENDPOINT + "/category_find?category="+ category +"&page=" + page + "&brand=" + data_brand + "&search=" + search,
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