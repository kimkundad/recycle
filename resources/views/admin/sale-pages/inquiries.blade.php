@extends('admin.layouts.template')

@section('title')
    <title>คำขอใบเสนอราคา</title>
@stop

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">คำขอใบเสนอราคา</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('admin/sale-pages') }}" class="text-muted text-hover-primary">Sale Pages</a>
                        </li>
                        <li class="breadcrumb-item"><span class="bullet bg-gray-400 w-5px h-2px"></span></li>
                        <li class="breadcrumb-item text-muted">Inquiries</li>
                    </ul>
                </div>
                <span class="text-muted fs-7">ทั้งหมด <strong class="text-dark">{{ $objs->total() }}</strong> รายการ</span>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">

                {{-- Filter --}}
                <div class="card mb-5">
                    <div class="card-body p-5">
                        <form method="GET" action="{{ url('admin/sale-page-inquiries') }}" class="d-flex gap-3 align-items-center flex-wrap">
                            <select name="sale_page_id" class="form-select form-select-sm" style="max-width:280px;">
                                <option value="">— ทุก Sale Page —</option>
                                @foreach($salePages as $sp)
                                <option value="{{ $sp->id }}" {{ request('sale_page_id') == $sp->id ? 'selected' : '' }}>{{ $sp->title }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">กรอง</button>
                            @if(request('sale_page_id'))
                            <a href="{{ url('admin/sale-page-inquiries') }}" class="btn btn-sm btn-light">ล้าง</a>
                            @endif
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-row-bordered table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr class="fw-bold text-muted fs-7 text-uppercase">
                                        <th class="ps-5">Sale Page</th>
                                        <th>ชื่อ</th>
                                        <th>โทรศัพท์</th>
                                        <th>บริษัท/โรงงาน</th>
                                        <th>อีเมล</th>
                                        <th>รายละเอียด</th>
                                        <th>วันที่</th>
                                        <th class="text-end pe-5">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($objs as $obj)
                                    <tr id="row-{{ $obj->id }}">
                                        <td class="ps-5">
                                            <a href="{{ url('sale-page/' . optional($obj->salePage)->slug) }}" target="_blank" class="text-dark fw-semibold text-hover-primary fs-7">
                                                {{ optional($obj->salePage)->title ?? '—' }}
                                            </a>
                                        </td>
                                        <td class="fw-semibold">{{ $obj->name }}</td>
                                        <td>
                                            <a href="tel:{{ $obj->phone }}" class="text-dark">{{ $obj->phone }}</a>
                                        </td>
                                        <td>{{ $obj->company ?? '—' }}</td>
                                        <td>
                                            @if($obj->email)
                                            <a href="mailto:{{ $obj->email }}" class="text-muted">{{ $obj->email }}</a>
                                            @else —
                                            @endif
                                        </td>
                                        <td style="max-width:220px;">
                                            <span class="text-muted fs-7" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                {{ $obj->message ?? '—' }}
                                            </span>
                                        </td>
                                        <td class="text-muted fs-7 text-nowrap">{{ $obj->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-end pe-5">
                                            <button class="btn btn-sm btn-light-danger"
                                                onclick="deleteInquiry({{ $obj->id }})">ลบ</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-10">ยังไม่มีคำขอ</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($objs->hasPages())
                        <div class="p-5">{{ $objs->links() }}</div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function deleteInquiry(id) {
    if (!confirm('ลบรายการนี้? ไม่สามารถกู้คืนได้')) return;

    fetch(`{{ url('admin/sale-page-inquiries') }}/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
        },
    })
    .then(r => r.json())
    .then(data => {
        if (data.ok) {
            const row = document.getElementById(`row-${id}`);
            if (row) {
                row.style.transition = 'opacity 0.2s';
                row.style.opacity = '0';
                setTimeout(() => row.remove(), 200);
            }
        }
    })
    .catch(console.error);
}
</script>
@stop
