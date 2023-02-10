<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <div href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="symbol symbol-50px me-5">
                        <span class="symbol-label bg-light-primary">
                            <span class="svg-icon svg-icon-2x svg-icon-primary">
                                <i class="las la-store-alt fs-1" style="color: #009ef7"></i>
                            </span>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <h4 class="text-inverse-success fw-bold fs-7">กำไรขาดทุนวันนี้</h4>
                        <h1 href="#" class="text-inverse-success fs-1 fw-bolder">23.090.00</h1>
                        <h4 class="text-inverse-success fw-bold fs-7">เปรียบเทียบ (19,340.00 เมื่อวาน)
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="symbol symbol-50px me-5">
                        <span class="symbol-label bg-light-info">
                            <span class="svg-icon svg-icon-2x svg-icon-info">
                                <i class="fa-regular fa-credit-card fs-1" style="color: #3b36db"></i>
                            </span>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <h4 class="text-inverse-success fw-bold fs-7">ลูกค้าใหม่</h4>
                        <h1 href="#" class="text-inverse-success fs-1 fw-bolder">914 คน</h1>
                        <h4 class="text-inverse-success fw-bold fs-7">สมัครฝาก 610 คน (เป็นเงิน
                            304,223.00)</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="d-flex align-items-center p-5">
                    <div class="symbol symbol-50px me-5">
                        <span class="symbol-label bg-light-primary">
                            <span class="svg-icon svg-icon-2x svg-icon-primary">
                                <i class="las la-donate fs-1" style="color: #06152c"></i>
                            </span>
                        </span>
                    </div>
                    <div class="d-flex flex-column">
                        <h4 class="text-inverse-success fw-bold fs-7">เครดิตที่ใช้ไป</h4>
                        <h1 href="#" class="text-inverse-success fs-1 fw-bolder">450,442.00</h1>
                        <h4 class="text-inverse-success fw-bold fs-7">ยอดฝาก 450,442.00</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <!--begin::Col-->
    <div class="col-xl-8">
        <!--begin::Chart Widget 1-->
        <div class="card card-flush h-lg-100">
            <!--begin::Header-->
            <div class="card-header pt-5">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">ภาพรวมที่ผ่านมา</span>
                    <div class="d-flex bd-highlight  d-flex fs-6 fw-semibold align-items-center me-1">
                        <div class="p-2 mt-3 me-1 flex-grow-1 bd-highlight">
                            <h2><b>8,169.00</b></h2>
                            <span>รายการฝาก</span>
                        </div>
                        <div class="p-2 mt-3 me-1 flex-grow-1 bd-highlight">
                            <h2><b>509.00</b></h2>
                            <span>รายการถอน</span>
                        </div>
                        <div class="p-2 mt-3 me-1 flex-grow-1 bd-highlight">
                            <h2><b>178,965.00</b></h2>
                            <span>ส่วนต่าง</span>
                        </div>
                    </div>
                </h3>
                <!--end::Title-->
                <!--begin::Toolbar-->
                <div class="card-toolbar">
                    <!--begin::Menu 2-->
                    <div class="d-flex align-items-center fw-bold">
                        <!--begin::Label-->
                        <div class="text-gray-400 fs-7 me-2">Date</div>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <select onchange="dayofmonth()" id="dayofmonth"
                            class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                            data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                            data-placeholder="Select an option">
                            <option></option>
                            <option value="today" selected="selected">วันนี้</option>
                            <option value="7daysago">7 วันที่แล้ว</option>
                            <option value="month">1 เดือน</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Menu 2-->
                    <!--end::Menu-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-0 px-0">
                <!--begin::Chart-->
                <div id="kt_charts_widget_1" class="min-h-auto ps-4 pe-6 mb-3" style="height: 350px"></div>
                <!--end::Chart-->
                <!--begin::Info-->
                <div class="d-flex align-items-center px-9">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center me-6">
                        <!--begin::Bullet-->
                        <span class="rounded-1 bg-primary me-2 h-10px w-10px"></span>
                        <!--end::Bullet-->
                        <!--begin::Label-->
                        <span class="fw-semibold fs-6 text-gray-600">ฝาก</span>
                        <!--end::Label-->
                    </div>
                    <!--ed::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center">
                        <!--begin::Bullet-->
                        <span class="rounded-1 bg-success me-2 h-10px w-10px"></span>
                        <!--end::Bullet-->
                        <!--begin::Label-->
                        <span class="fw-semibold fs-6 text-gray-600">ถอน</span>
                        <!--end::Label-->
                    </div>
                    <!--ed::Item-->
                </div>
                <!--ed::Info-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Chart Widget 1-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-4">
        <!--begin::Engage widget 1-->
        <div class="card h-md-100">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column flex-center">

                <div class="card-header pt-7">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-dark">Leading Companies</span>
                        <span class="text-gray-400 pt-2 fw-semibold fs-6">8k social visitors</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Nav-->
                        <ul class="nav" id="kt_chart_widget_19_tabs">
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light active fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_19_tab_1" href="#kt_chart_widget_19_tab_content_1">2022</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4" data-bs-toggle="tab" id="kt_chart_widget_19_tab_2" href="#kt_chart_widget_19_tab_content_2">Month</a>
                            </li>
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>

                <div class="card-body pt-0">
                    <!--begin::Tab Content (ishlamayabdi)-->
                    <div class="tab-content">
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade show active" id="kt_chart_widget_19_tab_content_1">
                            <!--begin::Chart container-->
                            <div id="kt_charts_widget_19_chart_1" class="w-100 h-400px mb-13 mt-n4"></div>
                            <!--end::Chart container-->
                            <!--begin::Items-->
                            <div class="m-0">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/atica.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">579</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->2.6%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/telegram-2.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Binford Ltd.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Media</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">2,588</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-danger fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                                    <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->0.4%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/balloon.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Barone LLC.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">794</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->0.2%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/kickstarter.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Video Channel</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">1,578</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->4.1%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/vimeo.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Biffco Enterprises</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">3,458</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->8.3%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/plurk.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Big Kahuna Burger</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">2,047</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->1.9%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Tap pane-->
                        <!--begin::Tap pane-->
                        <div class="tab-pane fade" id="kt_chart_widget_19_tab_content_2">
                            <!--begin::Chart container-->
                            <div id="kt_charts_widget_19_chart_2" class="w-100 h-400px mb-13 mt-n4"></div>
                            <!--end::Chart container-->
                            <!--begin::Items-->
                            <div class="m-0">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/atica.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">579</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->2.6%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/telegram-2.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Binford Ltd.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Media</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">2,588</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-danger fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-danger ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                                    <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->0.4%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/balloon.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Barone LLC.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">794</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->0.2%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/kickstarter.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Video Channel</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">1,578</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->4.1%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/vimeo.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Biffco Enterprises</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">3,458</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->8.3%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Separator-->
                                <div class="separator separator-dashed my-4"></div>
                                <!--end::Separator-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center me-5">
                                        <!--begin::Flag-->
                                        <img src="assets/media/svg/brand-logos/plurk.svg" class="me-4 w-30px" style="border-radius: 4px" alt="" />
                                        <!--end::Flag-->
                                        <!--begin::Content-->
                                        <div class="me-5">
                                            <!--begin::Title-->
                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Big Kahuna Burger</a>
                                            <!--end::Title-->
                                            <!--begin::Desc-->
                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                            <!--end::Desc-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Number-->
                                        <span class="text-gray-800 fw-bold fs-4 me-3">2,047</span>
                                        <!--end::Number-->
                                        <!--begin::Info-->
                                        <div class="m-0">
                                            <!--begin::Label-->
                                            <span class="badge badge-light-success fs-base">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                            <span class="svg-icon svg-icon-5 svg-icon-success ms-n1">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->1.9%</span>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Tap pane-->
                    </div>
                    <!--end::Tab Content-->
                </div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Engage widget 1-->
    </div>
    <!--end::Col-->
</div>

{{-- <script>
    $(document).ready(function() {
        dayofmonth()
    });

    function dayofmonth() {
        date = document.getElementById("dayofmonth").value;
        $.ajax({
            type: "POST",
            url: "/api/deposit_withdraw_overview",
            data: {
                'date': date,
            },
            dataType: 'json',
            success: function(response) {
                const infodeposit = response.infodeposit;
                infodeposit.forEach(element => {
                    console.log(element)
                });
            }
        })
    }
</script> --}}


