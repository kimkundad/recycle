@extends('layouts.template')

@section('title')
{{ session()->get('locale') == 'th' ? 'ผลิตภัณฑ์ดีไซน์' : 'Upcycle Design Products' }}
@stop

@section('content')
<div class="ps-page--default pt-80 pb-80">
    <div class="container text-center">
        <h1>{{ session()->get('locale') == 'th' ? 'ผลิตภัณฑ์ดีไซน์' : 'Upcycle Design Products' }}</h1>
    </div>
</div>
@endsection
