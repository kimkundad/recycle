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
.sp-content figure { margin-inline-start: 10px; margin-inline-end: 10px; }
.sp-content figure.image { margin: 12px 0; }
.sp-content figure.image figcaption { font-size: 13px; color: #6b8c82; text-align: center; margin-top: 6px; }
.sp-content table { width: 100%; border-collapse: collapse; margin: 14px 0; font-size: 14px; overflow-x: auto; display: block; }
.sp-content th, .sp-content td { border: none; padding: 4px 6px; text-align: left; }
.sp-content th { font-weight: 600; }
.sp-content blockquote { border-left: 3px solid #0f8f58; margin: 14px 0; padding: 10px 16px; background: #f3faf6; color: #3a5a50; border-radius: 0 8px 8px 0; }
.sp-content hr { border: none; border-top: 1px solid #e0ebe5; margin: 20px 0; }

/* page title */
.sp-title { font-size: 22px; font-weight: 700; color: #0f2d24; line-height: 1.3; margin: 0 0 16px; }

/* ---- footer inquiry section ---- */
.sp-footer { background: #0e2338; padding: 36px 20px 0; }
.sp-footer__inner { max-width: 600px; margin: 0 auto; }
.sp-footer__heading { font-size: 26px; font-weight: 800; color: #fff; margin: 0 0 4px; line-height: 1.2; }
.sp-footer__sub { font-size: 15px; font-weight: 600; color: #34d399; margin: 0 0 24px; }
.sp-footer__desc { font-size: 14px; color: #9ca3af; margin: 0 0 24px; line-height: 1.7; }

.sp-contact-card { display: flex; align-items: flex-start; gap: 14px; background: rgba(255,255,255,.06); border-radius: 14px; padding: 16px; margin-bottom: 12px; }
.sp-contact-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.sp-contact-icon--phone { background: #166534; }
.sp-contact-icon--line  { background: #166534; }
.sp-contact-name  { font-size: 14px; font-weight: 700; color: #fff; margin: 0 0 2px; }
.sp-contact-value { font-size: 13px; color: #6ee7b7; }
.sp-contact-value a { color: #6ee7b7; text-decoration: none; }

/* ---- inquiry form ---- */
.sp-form-wrap { background: #fff; border-radius: 24px 24px 0 0; margin-top: 28px; padding: 28px 20px 120px; }
.sp-form-title { font-size: 18px; font-weight: 700; color: #0f2d24; margin: 0 0 4px; }
.sp-form-sub { font-size: 13px; color: #6b7280; margin: 0 0 20px; }
.sp-field { margin-bottom: 14px; }
.sp-field label { display: block; font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }
.sp-field label .req { color: #ef4444; }
.sp-field input, .sp-field textarea {
    width: 100%; padding: 12px 14px; border: 1.5px solid #d1d5db; border-radius: 10px;
    font-size: 14px; font-family: inherit; color: #111827; outline: none; transition: border-color 0.15s;
    background: #f9fafb;
}
.sp-field input:focus, .sp-field textarea:focus { border-color: #059669; background: #fff; }
.sp-field textarea { resize: vertical; min-height: 90px; }
.sp-submit {
    width: 100%; padding: 15px; background: #059669; color: #fff; border: none;
    border-radius: 12px; font-size: 16px; font-weight: 700; font-family: inherit;
    cursor: pointer; transition: background 0.15s;
}
.sp-submit:hover { background: #047857; }
.sp-submit:disabled { background: #9ca3af; cursor: not-allowed; }
.sp-form-success {
    display: none; background: #d1fae5; border: 1.5px solid #6ee7b7;
    border-radius: 12px; padding: 16px 18px; text-align: center;
    font-size: 15px; font-weight: 600; color: #065f46; margin-bottom: 20px;
}
.sp-field-err { font-size: 12px; color: #ef4444; margin-top: 4px; display: none; }

/* ---- fixed bottom bar (3 buttons) ---- */
.sp-bar { position: fixed; bottom: 0; left: 0; right: 0; display: flex; z-index: 999; box-shadow: 0 -2px 12px rgba(0,0,0,0.15); }
.sp-bar__btn { flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; padding: 10px 6px; font-size: 12px; font-weight: 700; text-decoration: none; border: none; cursor: pointer; transition: filter 0.15s; font-family: inherit; line-height: 1; }
.sp-bar__btn:hover { filter: brightness(0.92); text-decoration: none; }
.sp-bar__btn svg { flex-shrink: 0; }
.sp-bar__btn--phone   { background: #1d4ed8; color: #fff; }
.sp-bar__btn--line    { background: #06c755; color: #fff; }
.sp-bar__btn--inquiry { background: #065f46; color: #fff; }
</style>
{!! $page->head_scripts !!}
@stop

@section('content')
<div style="background:#f5f8f6;">
<div class="sp-page">

    <h1 class="sp-title">{{ $page->title }}</h1>

    <div class="sp-content">
        {!! $page->body !!}
    </div>

</div>
</div>

{{-- ===== Inquiry Footer ===== --}}
<div class="sp-footer" id="sp-form">
    <div class="sp-footer__inner">
        <h2 class="sp-footer__heading">ขอใบเสนอราคา</h2>
        <p class="sp-footer__sub">ตอบกลับภายใน 24 ชั่วโมง</p>
        <p class="sp-footer__desc">กรอกข้อมูลเบื้องต้น ทีมงานจะติดต่อกลับพร้อมเสนอราคา และผลวิเคราะห์คุณภาพฉบับเต็ม หรือติดต่อทีมขายโดยตรง</p>

        @foreach($page->contacts ?? [] as $c)
        @if(!empty($c['name']) || !empty($c['phone']))
        <div class="sp-contact-card">
            <div class="sp-contact-icon sp-contact-icon--phone">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                </div>
            <div>
                @if(!empty($c['name']))<div class="sp-contact-name">{{ $c['name'] }}</div>@endif
                <div class="sp-contact-value">
                    @if(!empty($c['phone']))<a href="tel:{{ preg_replace('/[^0-9+]/','',$c['phone']) }}">{{ $c['phone'] }}</a>@endif
                    @if(!empty($c['email']))<span style="display:block;color:#9ca3af;font-size:12px;margin-top:2px;">{{ $c['email'] }}</span>@endif
                </div>
            </div>
        </div>
        @endif
        @endforeach

        @if($page->line_url)
        <div class="sp-contact-card">
            <div class="sp-contact-icon sp-contact-icon--line">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="#fff"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.105.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.070 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
                </div>
            <div>
                <div class="sp-contact-name">LINE Official</div>
                <div class="sp-contact-value"><a href="{{ $page->line_url }}" target="_blank">แอด LINE สอบถามราคา</a></div>
            </div>
        </div>
        @endif

        {{-- Form --}}
        <div class="sp-form-wrap">
            <h3 class="sp-form-title">ฟอร์มขอใบเสนอราคา</h3>
            <p class="sp-form-sub">สำหรับโรงงานอุตสาหกรรมและผู้ประกอบการ</p>

            <div class="sp-form-success" id="sp-form-success">
                ✅ ส่งคำขอเรียบร้อยแล้ว ทีมงานจะติดต่อกลับโดยเร็ว
            </div>

            <form id="sp-inquiry-form">
                @csrf
                <div class="sp-field">
                    <label>ชื่อ-นามสกุล <span class="req">*</span></label>
                    <input type="text" name="name" placeholder="ชื่อผู้ติดต่อ" autocomplete="name">
                    <div class="sp-field-err" id="err-name"></div>
                </div>
                <div class="sp-field">
                    <label>เบอร์โทรศัพท์ <span class="req">*</span></label>
                    <input type="tel" name="phone" placeholder="08x-xxx-xxxx" autocomplete="tel">
                    <div class="sp-field-err" id="err-phone"></div>
                </div>
                <div class="sp-field">
                    <label>ชื่อบริษัท / โรงงาน <span class="req">*</span></label>
                    <input type="text" name="company" placeholder="บริษัทของท่าน" autocomplete="organization">
                    <div class="sp-field-err" id="err-company"></div>
                </div>
                <div class="sp-field">
                    <label>อีเมล</label>
                    <input type="email" name="email" placeholder="name@company.com" autocomplete="email">
                    <div class="sp-field-err" id="err-email"></div>
                </div>
                <div class="sp-field">
                    <label>รายละเอียดเพิ่มเติม</label>
                    <textarea name="message" placeholder="เช่น พื้นที่จัดส่ง, รูปแบบการรับสินค้า (Ex-Tank / Delivered)"></textarea>
                </div>
                <p style="font-size:12px;color:#9ca3af;margin:0 0 16px;line-height:1.6;">การส่งฟอร์มถือว่าท่านยินยอมให้บริษัทติดต่อกลับเพื่อเสนอราคาและข้อมูลผลิตภัณฑ์</p>
                <button type="submit" class="sp-submit" id="sp-submit-btn">ส่งคำขอใบเสนอราคา</button>
            </form>
        </div>
    </div>
</div>

{{-- Fixed bottom bar — 3 buttons --}}
<div class="sp-bar">
    @if($page->phone)
    <a href="tel:{{ $page->phone }}" class="sp-bar__btn sp-bar__btn--phone">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        <span>{{ $page->phone_label ?: 'โทรเลย' }}</span>
    </a>
    @endif

    @if($page->line_url)
    <a href="{{ $page->line_url }}" class="sp-bar__btn sp-bar__btn--line" target="_blank">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.105.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.281.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.070 9.436-6.975C23.176 14.393 24 12.458 24 10.314"/></svg>
        <span>LINE</span>
    </a>
    @endif

    <a href="#sp-form" class="sp-bar__btn sp-bar__btn--inquiry" onclick="scrollToForm(event)">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path opacity="0.3" d="M19 15C21.2 15 23 13.2 23 11C23 8.8 21.2 7 19 7H18.7C18.1 4.7 16.1 3 13.7 3C11.3 3 9.2 4.8 8.7 7.3C6 7.9 4 10.3 4 13C4 15.7 6 17.8 8.5 18H19V15Z" fill="currentColor"/><path d="M8 17.9V21C8 21.6 8.4 22 9 22H15C15.6 22 16 21.6 16 21V17.9C16 17.4 15.6 17 15.1 17H8.9C8.4 17 8 17.4 8 17.9Z" fill="currentColor"/></svg>
        <span>ใบเสนอราคา</span>
    </a>
</div>
@stop

@section('body_scripts')
{!! $page->body_scripts !!}
<script>
function scrollToForm(e) {
    e.preventDefault();
    document.getElementById('sp-form').scrollIntoView({ behavior: 'smooth' });
}

document.getElementById('sp-inquiry-form').addEventListener('submit', async function (e) {
    e.preventDefault();

    // clear errors
    document.querySelectorAll('.sp-field-err').forEach(el => {
        el.style.display = 'none';
        el.textContent = '';
    });
    document.querySelectorAll('.sp-field input, .sp-field textarea').forEach(el => {
        el.style.borderColor = '';
    });

    const btn = document.getElementById('sp-submit-btn');
    btn.disabled = true;
    btn.textContent = 'กำลังส่ง…';

    const fd = new FormData(this);

    try {
        const res  = await fetch('{{ url('sale-page/' . $page->slug . '/inquiry') }}', {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': fd.get('_token'), 'Accept': 'application/json' },
            body: fd,
        });
        const data = await res.json();

        if (res.ok && data.ok) {
            document.getElementById('sp-form-success').style.display = 'block';
            this.style.display = 'none';
            document.getElementById('sp-form').scrollIntoView({ behavior: 'smooth' });
        } else if (res.status === 422 && data.errors) {
            Object.entries(data.errors).forEach(([field, msgs]) => {
                const errEl = document.getElementById(`err-${field}`);
                const inp   = this.querySelector(`[name="${field}"]`);
                if (errEl) { errEl.textContent = msgs[0]; errEl.style.display = 'block'; }
                if (inp)   { inp.style.borderColor = '#ef4444'; }
            });
            btn.disabled = false;
            btn.textContent = 'ส่งคำขอใบเสนอราคา';
        } else {
            alert('เกิดข้อผิดพลาด กรุณาลองใหม่');
            btn.disabled = false;
            btn.textContent = 'ส่งคำขอใบเสนอราคา';
        }
    } catch (err) {
        alert('เกิดข้อผิดพลาด กรุณาลองใหม่');
        btn.disabled = false;
        btn.textContent = 'ส่งคำขอใบเสนอราคา';
    }
});
</script>
@stop
