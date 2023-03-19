@extends('layouts.template')

@section('title')
{{ $objs->title }} - wpnrayong
@stop

@section('stylesheet')
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
                <p class="blog_date">{{ formatDateThat($objs->startdate) }} By วงษ์พาณิชย์ รีไซเคิล</p>
                
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