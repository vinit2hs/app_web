<form id="form_new_product" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
    action="{{ route('produtos.store') }}" data-table="#products-table">
    <div class="mb-13 text-center">
        <h1 id="titleForm" class="mb-3">Novo Produto</h1>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="name" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Nome</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o nome do Produto"
                name="name" id="name">
        </div>
        <div class="col-12 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="description" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Descrição</span>
            </label>
            <textarea class="form-control form-control-solid" placeholder="Digite a descrição do Produto" rows="4"
                name="description" id="description"></textarea>
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="brand_id" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Marca</span>
            </label>
            <select name="brand_id" id="brand_id" class="form-select form-select-solid" data-control="select2"
                data-allow-clear="true" data-placeholder="Selecione uma marca" data-dropdown-parent="#form_new_product">
                <option></option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand['id'] }}">{{ $brand['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="category_id" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Categoria</span>
            </label>
            <select name="category_id" id="category_id" class="form-select form-select-solid" data-control="select2"
                data-allow-clear="true" data-placeholder="Selecione uma categoria" data-dropdown-parent="#form_new_product">
                <option></option>
                @foreach ($categories as $categoria)
                    <option value="{{ $categoria['id'] }}">{{ $categoria['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="sub_category_id" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Sub Categoria</span>
            </label>
            <select name="sub_category_id" id="sub_category_id" class="form-select form-select-solid"
                data-control="select2" data-allow-clear="true" data-placeholder="Selecione uma sub categoria"
                data-dropdown-parent="#form_new_product">
                <option></option>
                @foreach ($subCategories as $subcategory)
                    <option value="{{ $subcategory['id'] }}">{{ $subcategory['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="volume_id" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span class="required">Tipo de volume</span>
            </label>
            <select name="volume_id" id="volume_id" class="form-select form-select-solid" data-control="select2"
                data-allow-clear="true" data-placeholder="Selecione um volume" data-dropdown-parent="#form_new_product">
                <option></option>
                @foreach ($volumes as $volume)
                    <option value="{{ $volume['id'] }}">{{ $volume['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="sankhya_code" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span>Código do Sankhya</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o código do Sankhya"
                name="sankhya_code" id="sankhya_code">
        </div>
        <div class="col-6 d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
            <label for="intelbras_code" class="d-flex align-items-center fs-6 fw-semibold mb-2">
                <span>Código da Intelbras</span>
            </label>
            <input type="text" class="form-control form-control-solid" placeholder="Digite o código da Intelbras"
                name="intelbras_code" id="intelbras_code">
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
    $(document).ready(function() {
        let form = $('#form_new_product');
        let validator = getInstanceFormValidation(form[0], {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Nome do produto é necessário'
                    },
                    stringLength: {
                        min: 5,
                        max: 100,
                        message: 'O nome do produto deve ser maior que 5 e menor que 100 caracteres'
                    },
                }
            },
            'description': {
                validators: {
                    notEmpty: {
                        message: "Descrição do produto é necessária"
                    },
                    stringLength: {
                        min: 10,
                        message: 'A Descrição do produto deve ser maior que 10 caracteres'
                    },
                }
            },
            'brand_id': {
                validators: {
                    notEmpty: {
                        message: "Marca é necessaria"
                    },
                }
            },
            'category_id': {
                validators: {
                    notEmpty: {
                        message: "Categoria é necessaria"
                    }
                }
            },
            'sub_category_id': {
                validators: {
                    notEmpty: {
                        message: "Sub Categoria é necessaria"
                    }
                }
            },
            'volume_id': {
                validators: {
                    notEmpty: {
                        message: "Tipo de Volume é necessario"
                    }
                }
            },
            'sankhya_code': {
                validators: {
                    digits: {
                        message: 'Código do sankhya precisa ser um número'
                    }
                }
            },
            'intelbras_code': {
                validators: {
                    digits: {
                        message: 'Código da intelbras precisa ser um número'
                    }
                }
            }
        }, )
        handleSubmit(form, validator)

        $(form.find('[data-control="select2"]')).on('change', function() {
            validator.revalidateField(this.name);
        });
    })
</script>
