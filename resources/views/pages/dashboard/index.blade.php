@extends('app.layoutmaster')
@section('title', 'Dashboard')
@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Home
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xxl-12">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body py-9">
                                <div class="row gx-9 h-100">
                                    <div class="col-sm-6 mb-10 mb-sm-0">
                                        <div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                                            style="background-size: 100% 100%;background-image:url({{ asset('assets/media/stock/600x600/img-65.jpg') }})">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-7">
                                                <div class="d-flex flex-stack mb-6">
                                                    <div class="flex-shrink-0 me-5">
                                                        <span
                                                            class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1">Featured</span>
                                                        <span class="text-gray-800 fs-1 fw-bold">9 Degree</span>
                                                    </div>
                                                    <span
                                                        class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">In
                                                        Process</span>
                                                </div>

                                                <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                                        <div class="symbol symbol-30px symbol-circle me-3">
                                                            <img src="{{ asset('assets/media/avatars/300-3.jpg') }}"
                                                                class="" alt="" />
                                                        </div>

                                                        <div class="m-0">
                                                            <span
                                                                class="fw-semibold text-gray-500 d-block fs-8">Manager</span>
                                                            <a href="#"
                                                                class="fw-bold text-gray-800 text-hover-primary fs-7">Robert
                                                                Fox</a>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-30px symbol-circle me-3">
                                                            <span class="symbol-label bg-success">
                                                                <i class="ki-duotone ki-abstract-41 fs-5 text-white">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                            </span>
                                                        </div>

                                                        <div class="m-0">
                                                            <span
                                                                class="fw-semibold text-gray-500 d-block fs-8">Budget</span>
                                                            <span class="fw-bold text-gray-800 fs-7">$64.800</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-6">
                                                <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">Flat cartoony
                                                    illustrations with vivid unblended colors and asymmetrical beautiful
                                                    purple hair lady</span>
                                                <div class="d-flex">
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                        <span class="fs-6 text-gray-700 fw-bold">Feb 6, 2021</span>
                                                        <div class="fw-semibold text-gray-500">Due Date</div>
                                                    </div>

                                                    <div
                                                        class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                        <span class="fs-6 text-gray-700 fw-bold">$
                                                            <span class="ms-n1" data-kt-countup="true"
                                                                data-kt-countup-value="284,900.00">0</span></span>
                                                        <div class="fw-semibold text-gray-500">Budget</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-stack mt-auto bd-highlight">
                                                <div class="symbol-group symbol-hover flex-nowrap">
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                        title="Melody Macy">
                                                        <img alt="Pic"
                                                            src="{{ asset('assets/media/avatars/300-2.jpg') }}" />
                                                    </div>
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                        title="Michael Eberon">
                                                        <img alt="Pic"
                                                            src="{{ asset('assets/media/avatars/300-3.jpg') }}" />
                                                    </div>
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                        title="Susan Redwood">
                                                        <span
                                                            class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                                    </div>
                                                </div>

                                                <a href="#"
                                                    class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">View
                                                    Project
                                                    <i class="ki-duotone ki-exit-right-corner fs-4 ms-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
@endsection


@section('scripts')
    @parent
@endsection
