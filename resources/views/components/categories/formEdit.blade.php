<form id="form_update_category" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="PUT"
      action="{{ route('categorias.update', $category->id) }}" data-table="#categories-table">
    <div class="mb-13 text-center">
        <h1 id="titleForm" class="mb-3">Editar Categoria</h1>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="name" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Nome</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o nome da Categoria"
                   name="name" id="name" value="{{$category->name}}">
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="brand_id" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Marca</span>
            </label>
            <select name="brand_id" id="brand_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Selecione uma marca" data-dropdown-parent="#form_update_category">
                <option></option>
                @foreach($brands as $brand)
                    <option @selected($category->brand_id == $brand->id) value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="active" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Ativo</span>
            </label>
            <select name="active" id="active" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Selecione uma opção" data-dropdown-parent="#form_update_category">
                <option></option>
                <option @selected($category->active == 1) value="1">Sim</option>
                <option @selected($category->active == 0) value="0">Não</option>
            </select>
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
    $(document).ready(function() {
        let form = $('#form_update_category');
        let validator = getInstanceFormValidation(form[0], {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Nome da marca é necessário'
                    }
                }
            },
            'active': {
                validators: {
                    notEmpty: {
                        message: "Ativo é necessário"
                    },
                }
            },
            'brand_id': {
                validators: {
                    notEmpty: {
                        message: "Marca é necessária"
                    },
                }
            }
        }, )
        handleSubmit(form, validator)

        $(form.find('[data-control="select2"]')).on('change', function() {
            validator.revalidateField(this.name);
        });
    })
</script>
