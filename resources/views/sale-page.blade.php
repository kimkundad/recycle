@extends('layouts.sale-page')

@section('title'){{ $page->title }}@stop

@section('og')
<meta property="og:title" content="{{ $page->title }}" />
<meta property="og:description" content="{{ mb_substr(strip_tags($page->body), 0, 160) }}" />
@stop

@section('head_scripts')
<style>
/* reset */
*, *::before, *::after { box-sizing: border-box; }

/* page */
.sp-page { max-width: 600px; margin: 0 auto; padding: 16px 16px 100px; }

/* CKEditor content reset — mobile-first */
.sp-content { font-size: 15px; line-height: 1.8; color: #1e2e2a; word-break: break-word; }
.sp-content img { max-width: 100%; height: auto; display: block; border-radius: 10px; margin: 12px auto; }
.sp-content p { margin: 0 0 14px; }
.sp-content h2 { font-size: 20px; font-weight: 700; margin: 24px 0 10px; color: #0f2d24; }
.sp-content h3 { font-size: 17px; font-weight: 700; margin: 20px 0 8px; color: #0f2d24; }
.sp-content ul, .sp-content ol { padding-left: 22px; margin: 0 0 14px; }
.sp-content li { margin-bottom: 6px; }
.sp-content a { color: #0f8f58; }
.sp-content table { width: 100%; border-collapse: collapse; margin: 14px 0; font-size: 14px; overflow-x: auto; display: block; }
.sp-content th, .sp-content td { border: 1px solid #d4e4dc; padding: 8px 10px; text-align: left; }
.sp-content th { background: #f0f7f4; font-weight: 600; }
.sp-content blockquote { border-left: 3px solid #0f8f58; margin: 14px 0; padding: 10px 16px; background: #f3faf6; color: #3a5a50; border-radius: 0 8px 8px 0; }
.sp-content hr { border: none; border-top: 1px solid #e0ebe5; margin: 20px 0; }
.sp-content figure.image { margin: 12px 0; }
.sp-content figure.image figcaption { font-size: 13px; color: #6b8c82; text-align: center; margin-top: 6px; }

/* fixed bottom bar */
.sp-bar { position: fixed; bottom: 0; left: 0; right: 0; display: flex; z-index: 999; box-shadow: 0 -2px 12px rgba(0,0,0,0.12); }
.sp-bar__btn { flex: 1; display: flex; align-items: center; justify-content: center; gap: 8px; padding: 16px 10px; font-size: 16px; font-weight: 700; text-decoration: none; border: none; cursor: pointer; transition: filter 0.15s; font-family: inherit; }
.sp-bar__btn:hover { filter: brightness(0.93); text-decoration: none; }
.sp-bar__btn--phone { background: #2563eb; color: #fff; }
.sp-bar__btn--inquiry { background: #06c755; color: #fff; }
.sp-bar__btn svg { flex-shrink: 0; }

/* page title */
.sp-title { font-size: 22px; font-weight: 700; color: #0f2d24; line-height: 1.3; margin: 0 0 16px; }
</style>
{!! $page->head_scripts !!}
@stop

@section('content')
<div style="background:#f5f8f6; min-height:100vh;">
<div class="sp-page">

    <h1 class="sp-title">{{ $page->title }}</h1>

    <div class="sp-content">
        {!! $page->body !!}
    </div>

</div>
</div>

{{-- Fixed bottom bar --}}
@if($page->phone || $page->inquiry_url)
<div class="sp-bar">
    @if($page->phone)
    <a href="tel:{{ $page->phone }}" class="sp-bar__btn sp-bar__btn--phone">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        {{ $page->phone_label ?: 'โทร' }}
    </a>
    @endif
    @if($page->inquiry_url)
    <a href="{{ $page->inquiry_url }}" class="sp-bar__btn sp-bar__btn--inquiry" @if(str_starts_with($page->inquiry_url, 'http')) target="_blank" @endif>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4C2.9 2 2 2.9 2 4v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
        {{ $page->inquiry_label ?: 'สอบถาม' }}
    </a>
    @endif
</div>
@endif
@stop

@section('body_scripts')
{!! $page->body_scripts !!}
@stop
