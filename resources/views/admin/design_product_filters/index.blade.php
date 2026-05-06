@extends('admin.layouts.template')

@section('title')
    <title>ตัวกรองสินค้าดีไซน์</title>
@stop

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">ตัวกรองสินค้าดีไซน์</h1>
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ url('dashboard') }}" class="text-muted text-hover-primary">จัดการ</a>
                            </li>
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <li class="breadcrumb-item text-muted">ประเภทสินค้า วัสดุ และขนาด</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">

                    @if(session('edit_success'))
                        <div class="alert alert-success mb-5">{{ session('edit_success') }}</div>
                    @endif

                    <div class="card mb-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title">
                                <span class="card-label fw-bold fs-5">การแสดงผลตัวกรองบนหน้าเว็บไซต์</span>
                            </h3>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex flex-wrap gap-8 align-items-center">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input w-45px h-30px js-filter-visibility" type="checkbox" id="show_filter_types" data-field="show_filter_types" @if($showFilterTypes) checked @endif>
                                    <label class="form-check-label fw-semibold ms-3" for="show_filter_types">แสดงตัวกรอง "ประเภทสินค้า"</label>
                                </div>
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input w-45px h-30px js-filter-visibility" type="checkbox" id="show_filter_materials" data-field="show_filter_materials" @if($showFilterMaterials) checked @endif>
                                    <label class="form-check-label fw-semibold ms-3" for="show_filter_materials">แสดงตัวกรอง "วัสดุ"</label>
                                </div>
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input w-45px h-30px js-filter-visibility" type="checkbox" id="show_filter_sizes" data-field="show_filter_sizes" @if($showFilterSizes) checked @endif>
                                    <label class="form-check-label fw-semibold ms-3" for="show_filter_sizes">แสดงตัวกรอง "ขนาด"</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-5 g-xl-8">
                        @foreach($groupItems as $groupKey => $group)
                            <div class="col-xl-4">
                                <div class="card card-xl-stretch mb-xl-8">
                                    <div class="card-header border-0 pt-5">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold fs-3 mb-1">{{ $group['title'] }}</span>
                                            <span class="text-muted mt-1 fw-semibold fs-7">{{ $group['title_en'] }}</span>
                                        </h3>
                                        <div class="card-toolbar">
                                            <a href="{{ url('admin/design-product-filters/create?group='.$groupKey) }}" class="btn btn-sm btn-primary">สร้างใหม่</a>
                                        </div>
                                    </div>
                                    <div class="card-body py-3">
                                        <div class="table-responsive">
                                            <table class="table align-middle gs-0 gy-3">
                                                <thead>
                                                    <tr>
                                                        <th>ชื่อ</th>
                                                        <th>ผูกสินค้า</th>
                                                        <th>สถานะ</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($group['items'] as $item)
                                                        <tr>
                                                            <td>
                                                                <div class="fw-bold text-dark">{{ $item->name_th }}</div>
                                                                <div class="text-muted fs-7">{{ $item->name_en ?: '-' }}</div>
                                                            </td>
                                                            <td>{{ $item->products_count }}</td>
                                                            <td>
                                                                <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                                    <input class="form-check-input w-45px h-30px js-design-filter-status" type="checkbox" data-group="{{ $groupKey }}" data-id="{{ $item->id }}" @if($item->status == 1) checked="checked" @endif value="1"/>
                                                                    <label class="form-check-label"></label>
                                                                </div>
                                                            </td>
                                                            <td class="text-end">
                                                                <a href="{{ url('admin/design-product-filters/'.$groupKey.'/'.$item->id.'/edit') }}" class="btn btn-sm btn-light-primary me-1">แก้ไข</a>
                                                                <a href="{{ url('api/del_design_product_filter/'.$groupKey.'/'.$item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-light-danger">ลบ</a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-muted">ยังไม่มีข้อมูล</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.js-design-filter-status').change(function () {
            $.ajax({
                type: 'POST',
                url: '{{ url('api/api_post_status_design_product_filter') }}',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: {
                    group: $(this).data('group'),
                    item_id: $(this).data('id')
                }
            });
        });

        $('.js-filter-visibility').change(function () {
            $.ajax({
                type: 'POST',
                url: '{{ url('api/update_design_filter_visibility') }}',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                data: {
                    field: $(this).data('field'),
                    value: $(this).is(':checked') ? 1 : 0
                }
            });
        });
    });
</script>
@stop
