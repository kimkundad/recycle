@extends('admin.layouts.template')

@section('title')
    <title>แก้ไข{{ $groupTitle }}</title>
@stop

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">แก้ไข{{ $groupTitle }}</h1>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <form class="form" method="POST" action="{{ $url }}">
                        {{ method_field($method) }}
                        {{ csrf_field() }}
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">ชื่อภาษาไทย</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="name_th" class="form-control form-control-lg form-control-solid" value="{{ old('name_th', $objs->name_th) }}">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ชื่อภาษาอังกฤษ</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="name_en" class="form-control form-control-lg form-control-solid" value="{{ old('name_en', $objs->name_en) }}">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">ลำดับ</label>
                                    <div class="col-lg-8">
                                        <input type="number" name="sort" class="form-control form-control-lg form-control-solid" value="{{ old('sort', $objs->sort) }}">
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">เปิดใช้งานทันที</label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                            <input class="form-check-input w-45px h-30px" type="checkbox" name="status" @if($objs->status == 1) checked="checked" @endif value="1"/>
                                            <label class="form-check-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <a href="{{ url('admin/design-product-filters') }}" class="btn btn-light btn-active-light-primary me-2">ยกเลิก</a>
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
