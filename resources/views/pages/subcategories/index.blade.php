@extends('app.layoutmaster')
@section('title', 'Subcategorias')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Subcategorias
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Subcategorias</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="card-header border-0 py-6">
                        <div class="flex-grow-1 card-toolbar">
                            <div class="row flex-grow-1 w-100 justify-content-end mb-6">
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col-3" data-kt-subscription-table-toolbar="base">
                                    <button id="new_target" data-target="#modal_master" data-width="mw-650px"
                                            data-url="{{ route('subcategorias.create') }}" class="btn btn-primary w-100">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                        Nova Subcategoria
                                    </button>
                                </div>
                            </div>
                            <div class="row flex-grow-1 w-100 justify-content-start align-items-end gy-4"
                                 data-kt-docs-table-toolbar="base">
                                <div class="col">
                                    <label for="filter_nome" class="form-label fs-7 text-gray-800 mb-3">
                                        Nome:
                                    </label>
                                    <input type="text" name="filter_nome" id="filter_nome"
                                           class="form-control form-control-solid" placeholder="Digite o nome da marca">
                                </div>
                                <div class="col">
                                    <label for="filter_active" class="form-label fs-7 text-gray-800 mb-3">
                                        Ativo:
                                    </label>
                                    <select name="filter_active" id="filter_active" class="form-select form-select-solid"
                                            data-control="select2" data-allow-clear="true"
                                            data-placeholder="Selecione uma opção">
                                        <option></option>
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="filter_brand" class="form-label fs-7 text-gray-800 mb-3">
                                        Categoria:
                                    </label>
                                    <select name="filter_category" id="filter_category" class="form-select form-select-solid"
                                            data-control="select2" data-allow-clear="true"
                                            data-placeholder="Selecione uma categoria">
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-light-primary w-100" data-table="#subcategories-table"
                                            id="searchTable">
                                        <i class="ki-duotone ki-filter-search fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Filtrar
                                    </button>
                                </div>
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
@endsection
