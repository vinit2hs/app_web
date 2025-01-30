<form id="form_update_subcategories" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="PUT"
      action="{{ route('subcategorias.update', $subcategory->id) }}" data-table="#subcategories-table">
    <div class="mb-13 text-center">
        <h1 id="titleForm" class="mb-3">Editar Subcategoria</h1>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="name" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Nome</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o nome da Subcategoria"
                   name="name" id="name" value="{{$subcategory->name}}">
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="category_id" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Categoria</span>
            </label>
            <select name="category_id" id="category_id" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Selecione uma categoria" data-dropdown-parent="#form_update_subcategories">
                <option></option>
                @foreach($categories as $category)
                    <option @selected($subcategory->category_id == $category->id) value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="active" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Ativo</span>
            </label>
            <select name="active" id="active" class="form-select form-select-solid" data-control="select2"
                    data-placeholder="Selecione uma opção" data-dropdown-parent="#form_update_subcategories">
                <option></option>
                <option @selected($subcategory->active == 1) value="1">Sim</option>
                <option @selected($subcategory->active == 0) value="0">Não</option>
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
        let form = $('#form_update_subcategories');
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
            'category_id': {
                validators: {
                    notEmpty: {
                        message: "Categoria é necessária"
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
