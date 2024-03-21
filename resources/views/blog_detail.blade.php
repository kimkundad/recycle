@extends('layouts.template')

@section('title')
{{ $objs->title }} - wpnrayong
@stop

@section('og')
    <meta property="og:url"           content="https://wpnrayong.com/blog_detail/{{ $objs->id }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $objs->title }}" />
    <meta property="og:image"         content="{{ url('media/'.$objs->image) }}?v{{time()}}" />
    <meta property="og:description"   content="{{ $objs->sub_title }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="314" />
@stop('og')

@section('stylesheet')




<style>

.ck-widget__type-around{
    display: none;
}
.ck-widget__resizer{
    display: none;
}

</style>

@stop('stylesheet')

@section('content')


<div class="ps-breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                @if(session()->get('locale') == 'th')
                <a href="{{ url('/blog') }}">กิจกรรม & ประชาสัมพันธ์</a>
                @else
                <a href="{{ url('/blog') }}">News</a>
                @endif
            </li>
            <li>{{ $objs->title }}</li>
        </ul>
    </div>
</div>


<div class="ps-deal-of-day mt-10">
    <div class="container">
        <div class="ps-blog__content bor_shadow">
            <img src="{{ url('media/'.$objs->image) }}" class="img-fluid" style="width:100%">
            <div class="blog_detail_in">
                <h4 class="mt-20">{{ $objs->title }}</h4>
                <p class="blog_date">{{ formatDateThat($objs->startdate) }} BY WPN </p>
                
                <p>
                    {!! $objs->detail !!}
                </p>
                
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')
@stop('scripts')