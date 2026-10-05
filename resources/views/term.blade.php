@extends('layouts.template')

@section('title')
    {{ __('term.meta_title') }}
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

@section('content')




<div class="ps-deal-of-day mt-10">
    <div class="container">
        @includeFirst(['partials.term.' . app()->getLocale(), 'partials.term.en'])
    </div>
</div>

@endsection

@section('scripts')
@stop('scripts')