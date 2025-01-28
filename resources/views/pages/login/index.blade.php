<!DOCTYPE html>
<html lang="pt-BR">

@include ('includes.head')

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
      data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true"
      data-kt-app-header-secondary-enabled="false" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div class="app-wrapper flex-column flex-row-fluid mt-0" id="kt_app_wrapper">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <div class="row justify-content-center">
                                    <img class="w-150px" src="{{asset('assets/media/logo_hs.png')}}">
                                </div>
                                <div class="card mx-auto py-5 mw-500px bg-transparent border-0 shadow-none">
                                    <div class="card-body py-0">
                                        <form class="form w-100" novalidate="novalidate" id="validationLogin"
                                              action="{{route('login.action')}}" method="POST">
                                            <div class="text-center mb-4">
                                                <h1 class="text-muted fs-4 fw-semibold mb-3">Acesse sua conta</h1>
                                            </div>
                                            <div class="fv-row mb-8">
                                                <label for="documento" class="d-flex align-items-center fs-6 form-label fw-medium mb-2">
                                                    <span class="required">Email</span>
                                                </label>
                                                <input type="text" placeholder="Digite seu e-mail" name="email" id="email" autocomplete="off" autofocus
                                                       class="form-control bg-transparent" />
                                            </div>
                                            <div class="fv-row mb-8 position-relative">
                                                <label for="documento" class="d-flex align-items-center fs-6 form-label fw-medium mb-2">
                                                    <span class="required">Senha</span>
                                                </label>
                                                <div class="position-relative" data-kt-password-meter="true">
                                                    <input type="password" placeholder="Digite sua senha" name="password" id="password" autocomplete="off"
                                                           class="form-control bg-transparent"/>
                                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                        data-kt-password-meter-control="visibility">
                                                        <i class="ki-outline ki-eye-slash fs-2"></i>
                                                        <i class="ki-outline ki-eye fs-2 d-none"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <button type="submit" id="submitLogin" class="btn btn-primary">
                                                    <span class="indicator-label">Entrar</span>
                                                    <span class="indicator-progress">Por favor, aguarde um pouco...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('includes.footer')
    </div>
</div>

@section('scripts')
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.serializejson.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        @if (Illuminate\Support\Facades\Session::has('error'))
            handleAlert('{{ Illuminate\Support\Facades\Session::get('error') }}', 'error')
        @endif
    </script>
    <script>
        $(document).ready(function () {
            const fields = {
                'email': {
                    validators: {
                        notEmpty: {
                            message: 'E-mail é obrigatório'
                        },
                        emailAddress: {
                            message: 'E-mail inválido!',
                        }
                    }
                },
                'password': {
                    validators: {
                        notEmpty: {
                            message: 'Senha é obrigatória'
                        },
                        stringLength: {
                            min: 6,
                            message: 'Senha deve conter no mínimo 6 caracteres'
                        }
                    }
                },
            };
            const form = $('#validationLogin')
            let validator = getInstanceFormValidation(form[0], fields);
            form.on('submit', function (e) {
                e.preventDefault();
                validator.validate().then(function (status) {
                    if (status === 'Valid') {
                        handleLogin(form)
                    }
                })
            })

            function handleLogin(form){
                handleAjax(
                    form.attr("action"),
                    form.attr("method"),
                    form.serializeJSON(),
                    function (response) {
                        if(response.status){
                            handleAlert(
                                "Login efetuado com sucesso!<br>Aguarde você será redirecionado em segundos!",
                                "success"
                            );
                            window.location.href = '{{route('dashboard')}}';
                        }else {
                            handleAlert(
                                response.message ??
                                "Ops, ocorreu um erro, verifique os dados e tente novamente!!",
                                "error"
                            );
                        }

                    },
                    function (error) {
                        handleAlert(
                            error?.responseJSON?.message ??
                            "Ops, ocorreu um erro, verifique os dados e tente novamente!!",
                            "error"
                        );
                    },
                    function () {
                        form.find("#submitLogin").prop("disabled", true);
                        form.find("#submitLogin .indicator-label").addClass("d-none");
                        form.find("#submitLogin .indicator-progress").addClass(
                            "d-block"
                        );
                    },
                    function () {
                        form.find("#submitLogin").prop("disabled", false);
                        form.find("#submitLogin .indicator-label").removeClass("d-none");
                        form.find("#submitLogin .indicator-progress").removeClass(
                            "d-block"
                        );
                    }
                )
            }
        })
    </script>
@show
</body>

</html>
