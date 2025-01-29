@extends('app.layoutmaster')
@section('title', 'Banners')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Banners
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Banners</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="card-header border-0 py-6">
                        <div class="flex-grow-1 card-toolbar">
                            <div class="row w-100 justify-content-end mb-6">
                                <div class="col-3 d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                    <button id="new_target" data-target="#modal_master" data-width="mw-750px"
                                            data-url="{{ route('banners.create') }}" class="btn btn-primary w-100">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                        Novo Banner
                                    </button>
                                </div>
                            </div>
                            <div class="row flex-grow-1 w-100 justify-content-start align-items-end gy-4"
                                 data-kt-docs-table-toolbar="base">

                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>


        @endsection


        @section('scripts')
            @parent
            {!! $dataTable->scripts() !!}
            <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
            <script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
            <script>
                $(document).ready(function () {
                    // Verifica se o elemento foi adicionado dinamicamente
                    const targetNode = $("body")[0]; // Observa todo o body

                    const observer = new MutationObserver(function (mutations) {
                        mutations.forEach(function (mutation) {
                            $(mutation.addedNodes).each(function () {
                                if ($(this).is('a[data-fslightbox="lightbox-basic"]') || $(this).find('a[data-fslightbox="lightbox-basic"]').length) {
                                    if (typeof refreshFsLightbox === 'function') {
                                        refreshFsLightbox();
                                        console.log("fslightbox recarregado!");
                                    }
                                }
                            });
                        });
                    });

                    // Configurações para observar mudanças no DOM
                    observer.observe(targetNode, {
                        childList: true,
                        subtree: true,
                    });
                });

            </script>
@endsection
