<html lang="pt-BR">

@include('includes.head')

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <!--begin::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">

            @include('includes.header')
            @include('includes.sidebar')

            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @yield('content')
                </div>

                @include('includes.footer')
            </div>

            <x-modal />

            @section('scripts')
                <!--begin::Global Javascript Bundle(mandatory for all pages)-->
                <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
                <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
                <script src="{{ asset('assets/js/jquery.serializejson.js') }}"></script>
                <script src="{{ asset('assets/js/app.js') }}"></script>
                <script>
                    @if(Illuminate\Support\Facades\Session::has('error'))
                        handleAlert('{{ Illuminate\Support\Facades\Session::get('error') }}', 'error')
                    @endif
                </script>

            @show
</body>

</html>
