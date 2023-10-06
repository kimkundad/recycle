@extends('layouts.template')

@section('title')
{{ $objs->title }} - wpnrayong
@stop

@section('stylesheet')


<meta data-react-helmet="true" property="og:title" content="{{ $objs->title }}">
<meta data-react-helmet="true" property="og:type" content="website">
<meta data-react-helmet="true" property="og:url" content="https://wpnrayong.com/blog_detail/{{ $objs->id }}">
<meta data-react-helmet="true" property="og:description" content="{{ $objs[0]->sub_title }}">
<meta data-react-helmet="true" property="og:image" content="{{ url('media/'.$objs->image) }}">

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
            <li><a href="{{ url('/blog') }}">กิจกรรม & ประชาสัมพันธ์</a></li>
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