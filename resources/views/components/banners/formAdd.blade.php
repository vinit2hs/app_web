<form id="form_new_banner" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
      action="{{ route('banners.store') }}" enctype="multipart/form-data" data-table="#banners-table">
    <div class="mb-13 text-center">
        <h1 id="titleForm" class="mb-3">Novo Banner</h1>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            {{--begin::Image input--}}
            <div class="image-input image-input-empty bgi-size-contain bgi-position-center w-100"
                 style="background-image: url('{{asset('assets/media/svg/files/blank-image.svg')}}')"
                 data-kt-image-input="true">
                {{--begin::Image preview wrapper--}}
                <div class="image-input-wrapper bgi-size-cover bgi-position-center w-100 h-225px">

                </div>
                {{--end::Image preview wrapper--}}

                {{--begin::Edit button--}}
                <label
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Alterar imagem">
                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                    {{--begin::Inputs--}}
                    <input type="file" name="imagem" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="avatar_remove"/>
                    {{--end::Inputs--}}
                </label>
                {{--end::Edit button--}}

                {{--begin::Cancel button--}}
                <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="cancel"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Remover imagem">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
                {{--end::Cancel button--}}

                {{--begin::Remove button--}}
                <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="remove"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Remover imagem">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
                {{--end::Remove button--}}
            </div>
            {{--end::Image input--}}
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="name" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Nome do Banner</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o nome do banner"
                   name="name" id="name">
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="link" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Link de navegação no app</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o link do banner"
                   name="link" id="link">
        </div>
    </div>
    <div class="text-center mt-2">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
            Cancelar
        </button>

        <button type="submit" class="btn btn-primary">
<span class="indicator-label">
Adicionar
</span>
            <span class="indicator-progress">
Por favor, aguarde...
<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
        </button>
    </div>
</form>

<script>
    $(document).ready(function () {
        let form = $('#form_new_banner');
        let validator = getInstanceFormValidation(form[0], {
            'imagem': {
                validators: {
                    notEmpty: {
                        message: 'Imagem do banner é obrigatória'
                    },
                    file: {
                        extension: 'jpg,jpeg,png',
                        type: 'image/jpeg,image/png',
                        message: 'O arquivo selecionado não é válido'
                    },
                }
            },
            'link': {
                validators: {
                    notEmpty: {
                        message: "Link é obrigatório"
                    },
                }
            },
            'name': {
                validators: {
                    notEmpty: {
                        message: "Nome é obrigatório"
                    },
                }
            },
        },)
        handleSubmit(form, validator)
    })
</script>
