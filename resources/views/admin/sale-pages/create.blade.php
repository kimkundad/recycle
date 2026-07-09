@extends('admin.layouts.template')

@section('title')
    <title>สร้าง Sale Page</title>
@stop

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">สร้าง Sale Page</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('admin/sale-pages') }}" class="text-muted text-hover-primary">Sale Pages</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">สร้างใหม่</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">

                @if($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
                @endif

                <form method="POST" action="{{ url('admin/sale-pages') }}" enctype="multipart/form-data">
                    @csrf
                    <div style="display:flex;gap:20px;align-items:flex-start;">
                    <div style="flex:1;min-width:0;">

                    {{-- ข้อมูลหลัก --}}
                    <div class="card mb-5">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title fw-bold fs-4">ข้อมูลหลัก</h3>
                        </div>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-3 col-form-label required fw-semibold fs-6">ชื่อหน้า</label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" class="form-control form-control-lg" value="{{ old('title') }}" required>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-3 col-form-label required fw-semibold fs-6">
                                    URL Slug
                                    <span class="text-muted d-block fs-7">a-z, 0-9, - เท่านั้น</span>
                                </label>
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-text text-muted">/sale-page/</span>
                                        <input type="text" name="slug" class="form-control form-control-lg" value="{{ old('slug') }}" placeholder="my-product" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <label class="col-lg-3 col-form-label fw-semibold fs-6">Status</label>
                                <div class="col-lg-9 d-flex align-items-center">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                                        <label class="form-check-label">เปิดใช้งาน</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- เนื้อหา CKEditor --}}
                    <div class="card mb-5">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title fw-bold fs-4">เนื้อหา</h3>
                        </div>
                        <div class="card-body border-top p-9">
                            <textarea name="body" id="sp-editor">{{ old('body') }}</textarea>
                        </div>
                    </div>

                    {{-- ปุ่ม Fixed Bottom --}}
                    <div class="card mb-5">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title fw-bold fs-4">ปุ่ม Fixed Bottom</h3>
                        </div>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-3 col-form-label fw-semibold fs-6">เบอร์โทร</label>
                                <div class="col-lg-9">
                                    <div class="row g-3">
                                        <div class="col-8">
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="0XX-XXX-XXXX">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" name="phone_label" class="form-control" value="{{ old('phone_label', 'โทร') }}" placeholder="ข้อความปุ่ม">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                    ปุ่มสอบถาม
                                    <span class="text-muted d-block fs-7">URL หรือ LINE link</span>
                                </label>
                                <div class="col-lg-9">
                                    <div class="row g-3">
                                        <div class="col-8">
                                            <input type="text" name="inquiry_url" class="form-control" value="{{ old('inquiry_url') }}" placeholder="https://line.me/... หรือ /contact">
                                        </div>
                                        <div class="col-4">
                                            <input type="text" name="inquiry_label" class="form-control" value="{{ old('inquiry_label', 'สอบถาม') }}" placeholder="ข้อความปุ่ม">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Custom Scripts --}}
                    <div class="card mb-5">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title fw-bold fs-4">Custom Scripts</h3>
                        </div>
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                    &lt;head&gt; Scripts
                                    <span class="text-muted d-block fs-7">Google Analytics, Facebook Pixel, Google Ads</span>
                                </label>
                                <div class="col-lg-9">
                                    <textarea name="head_scripts" class="form-control font-monospace" rows="5" placeholder="&lt;script&gt;...&lt;/script&gt;">{{ old('head_scripts') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <label class="col-lg-3 col-form-label fw-semibold fs-6">
                                    &lt;body&gt; Scripts
                                    <span class="text-muted d-block fs-7">LINE Widget, Facebook Chat</span>
                                </label>
                                <div class="col-lg-9">
                                    <textarea name="body_scripts" class="form-control font-monospace" rows="5" placeholder="&lt;script&gt;...&lt;/script&gt;">{{ old('body_scripts') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-3 mb-8">
                        <a href="{{ url('admin/sale-pages') }}" class="btn btn-light">ยกเลิก</a>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                    </div>{{-- /left col --}}

                    {{-- Preview panel --}}
                    <div style="width:400px;flex-shrink:0;position:sticky;top:80px;">
                        <div class="card">
                            <div class="card-header border-0 pt-4 pb-2">
                                <h3 class="card-title fw-bold fs-6 mb-0">ตัวอย่างบนมือถือ</h3>
                                <div class="card-toolbar"><span class="badge badge-light-success fs-8">390px</span></div>
                            </div>
                            <div class="card-body p-3">
                                <div style="border:1.5px solid #dee2e6;border-radius:20px;overflow:hidden;background:#f5f8f6;box-shadow:0 2px 16px rgba(0,0,0,.08);">
                                    <div style="background:#e8f0ec;border-bottom:1px solid #d4ddd8;padding:7px 10px;display:flex;align-items:center;gap:5px;">
                                        <div style="width:8px;height:8px;border-radius:50%;background:#fc5c65;flex-shrink:0;"></div>
                                        <div style="width:8px;height:8px;border-radius:50%;background:#fed330;flex-shrink:0;"></div>
                                        <div style="width:8px;height:8px;border-radius:50%;background:#26de81;flex-shrink:0;"></div>
                                        <div style="flex:1;background:#fff;border-radius:5px;padding:3px 8px;font-size:11px;color:#94a3b8;text-align:center;overflow:hidden;white-space:nowrap;">wpnrayong.com/sale-page/…</div>
                                    </div>
                                    <div style="height:560px;overflow-y:auto;padding:14px 14px 80px;">
                                        <h1 id="sp-prev-title" style="font-size:19px;font-weight:700;color:#0f2d24;margin:0 0 12px;line-height:1.3;font-family:'Noto Sans Thai',sans-serif;">ชื่อหน้า</h1>
                                        <div id="sp-preview-body" class="sp-preview-content"></div>
                                    </div>
                                    <div style="display:flex;border-top:1px solid #e2e8f0;">
                                        <span style="flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:13px 6px;background:#2563eb;color:#fff;font-weight:700;font-size:13px;">
                                            📞 <span id="sp-prev-phone-label">โทร</span>
                                        </span>
                                        <span style="flex:1;display:flex;align-items:center;justify-content:center;gap:5px;padding:13px 6px;background:#06c755;color:#fff;font-weight:700;font-size:13px;">
                                            💬 <span id="sp-prev-inquiry-label">สอบถาม</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- /preview --}}
                    </div>{{-- /flex wrapper --}}
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- CKEditor 5 — load เฉพาะหน้านี้เท่านั้น --}}
<script src="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.umd.js"></script>
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
<style>
.sp-preview-content{font-size:14px;line-height:1.75;color:#1e2e2a;word-break:break-word;font-family:'Noto Sans Thai',Arial,sans-serif;}
.sp-preview-content img{max-width:100%;height:auto;display:block;border-radius:8px;margin:10px auto;}
.sp-preview-content p{margin:0 0 11px;}
.sp-preview-content h2{font-size:17px;font-weight:700;margin:18px 0 7px;color:#0f2d24;}
.sp-preview-content h3{font-size:15px;font-weight:700;margin:14px 0 6px;color:#0f2d24;}
.sp-preview-content ul,.sp-preview-content ol{padding-left:18px;margin:0 0 11px;}
.sp-preview-content li{margin-bottom:4px;}
.sp-preview-content a{color:#0f8f58;}
.sp-preview-content table{width:100%;border-collapse:collapse;font-size:12px;display:block;overflow-x:auto;margin:10px 0;}
.sp-preview-content th,.sp-preview-content td{border:none;padding:3px 5px;text-align:left;}
.sp-preview-content th{font-weight:600;}
.sp-preview-content blockquote{border-left:3px solid #0f8f58;margin:10px 0;padding:7px 12px;background:#f3faf6;border-radius:0 6px 6px 0;}
.sp-preview-content hr{border:none;border-top:1px solid #e0ebe5;margin:14px 0;}
.sp-preview-content figure.image{margin:8px 0;}
.sp-preview-content figure.image figcaption{font-size:12px;color:#6b8c82;text-align:center;margin-top:3px;}
</style>
<script>
(function () {
    const { ClassicEditor, Plugin, ButtonView,
            Essentials, Bold, Italic, Underline, Strikethrough,
            Paragraph, Heading, Link, Image, ImageUpload, ImageResize,
            ImageStyle, ImageToolbar, List, HorizontalLine,
            Table, TableToolbar, BlockQuote, Alignment, FontSize,
            FontColor, FontBackgroundColor, MediaEmbed, Indent, IndentBlock,
            SimpleUploadAdapter, SourceEditing } = CKEDITOR;

    class FileManagerPlugin extends Plugin {
        static get pluginName() { return 'FileManagerPlugin'; }
        init() {
            const editor = this.editor;
            editor.ui.componentFactory.add('fileManager', locale => {
                const btn = new ButtonView(locale);
                btn.set({ label: '📁 File Manager', withText: true, tooltip: 'เลือกรูปจาก File Manager' });
                btn.on('execute', () => {
                    window._spFileManagerCallback = (url) => {
                        editor.model.change(writer => {
                            const img = writer.createElement('imageBlock', { src: url });
                            editor.model.insertContent(img);
                        });
                    };
                    window.open(
                        '{{ url('admin/sale-pages-files') }}',
                        'spFileManager',
                        'width=960,height=640,resizable=yes,scrollbars=yes'
                    );
                });
                return btn;
            });
        }
    }

    ClassicEditor.create(document.querySelector('#sp-editor'), {
        licenseKey: 'GPL',
        plugins: [
            Essentials, Bold, Italic, Underline, Strikethrough,
            Paragraph, Heading, Link, Image, ImageUpload, ImageResize,
            ImageStyle, ImageToolbar, List, HorizontalLine,
            Table, TableToolbar, BlockQuote, Alignment, FontSize,
            FontColor, FontBackgroundColor, MediaEmbed, Indent, IndentBlock,
            SimpleUploadAdapter, SourceEditing, FileManagerPlugin,
        ],
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', 'strikethrough', '|',
                'fontSize', 'fontColor', 'fontBackgroundColor', '|',
                'alignment', '|',
                'bulletedList', 'numberedList', 'outdent', 'indent', '|',
                'link', 'uploadImage', 'fileManager', 'mediaEmbed', '|',
                'insertTable', 'blockQuote', 'horizontalLine', '|',
                'sourceEditing', 'undo', 'redo',
            ],
        },
        simpleUpload: {
            uploadUrl: '{{ url('api/sale-page/upload-image') }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        },
        image: {
            toolbar: ['imageStyle:inline', 'imageStyle:block', 'imageStyle:side', '|', 'imageTextAlternative', 'resizeImage'],
        },
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells'],
        },
    }).then(editor => {
        const prevBody  = document.getElementById('sp-preview-body');
        const prevTitle = document.getElementById('sp-prev-title');
        const prevPhone = document.getElementById('sp-prev-phone-label');
        const prevInq   = document.getElementById('sp-prev-inquiry-label');

        prevBody.innerHTML = editor.getData();
        editor.model.document.on('change:data', () => { prevBody.innerHTML = editor.getData(); });

        [['title', prevTitle, 'ชื่อหน้า'], ['phone_label', prevPhone, 'โทร'], ['inquiry_label', prevInq, 'สอบถาม']]
            .forEach(([name, el, fb]) => {
                const inp = document.querySelector(`[name="${name}"]`);
                if (!inp || !el) return;
                el.textContent = inp.value || fb;
                inp.addEventListener('input', () => { el.textContent = inp.value || fb; });
            });
    }).catch(console.error);
})();
</script>
@stop('scripts')
