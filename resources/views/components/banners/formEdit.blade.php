<form id="form_update_banner" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
      action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data" data-table="#banners-table">
    <div class="mb-13 text-center">
        <h1 id="titleForm" class="mb-3">Editar Banner</h1>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            {{--begin::Image input--}}
            <div class="image-input image-input-empty bgi-size-contain bgi-position-center w-100"
                 style="background-image: url('{{asset('assets/media/svg/files/blank-image.svg')}}')"
                 data-kt-image-input="true">
                {{--begin::Image preview wrapper--}}
                <div id="banner" class="image-input-wrapper bgi-size-cover bgi-position-center w-100 h-225px"
                     style="background-image: url('{{asset("storage/{$banner->image}")}}')">

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
                    <input type="file" name="imagem" data-exclude-validation="true" accept=".png, .jpg, .jpeg"/>
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
            <label for="title" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Nome do Banner</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o nome do banner"
                   name="title" id="title" value="{{$banner->title}}">
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="link" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Link de navegação no app</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o link do banner"
                   name="link" id="link" value="{{$banner->link}}">
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="priority" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Ordem de exibição do banner</span>
            </label>
            <input type="number" min="1" class="form-control form-control-solid"
                   placeholder="Digite a ordem de exibição do banner"
                   name="priority" id="priority" value="{{$banner->priority}}">
        </div>
    </div>
    <div class="text-center mt-2">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
            Cancelar
        </button>

        <button type="submit" class="btn btn-primary">
            <span class="indicator-label">
                Salvar
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
        let form = $('#form_update_banner');
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
            'title': {
                validators: {
                    notEmpty: {
                        message: "Nome é obrigatório"
                    },
                }
            },
            'priority': {
                validators: {
                    notEmpty: {
                        message: "Ordem é obrigatória"
                    },
                    digits: {
                        message: 'Ordem precisa ser um número'
                    },
                    greaterThan: {
                        min: 1,
                        message: 'Ordem deve ser maior que 0'
                    }
                }
            },
        },)
        handleSubmit(form, validator)

        const targetNode = document.getElementById('banner');

        if (targetNode) {
            const observer = new MutationObserver(() => {
                const bgImage = window.getComputedStyle(targetNode).getPropertyValue('background-image');
                const inputImagem = $('input[name="imagem"]');

                if (bgImage === 'none') {
                    // Remove o atributo data-exclude-validation se background-image for none
                    inputImagem.removeAttr('data-exclude-validation');
                } else {
                    // Adiciona o atributo se houver uma imagem de background
                    inputImagem.attr('data-exclude-validation', 'true');
                }
            });

            // Configura o observer para observar mudanças no atributo "style"
            observer.observe(targetNode, {attributes: true, attributeFilter: ['style']});
        }
    })
</script>
