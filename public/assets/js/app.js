$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".menu-link", function (e) {
        let action = $(this).data("table-action");
        switch (action) {
            case "edit_row":
                handleModal(this);
                break;
            case "show_row":
                const modal = $($(this).data("target"));
                handleModal(this, function () {
                    const form = modal.find("form");
                    form.find("input, button, select, textarea").prop(
                        "disabled",
                        true
                    );
                    form.find("button").detach();
                    form.find("#titleForm").text("Informações gerais");
                });
                break;
            case "delete_row":
                handleDeleteRow(this);
                break;
        }
    });

    // Search Filters datatable
    $(document).on("click", "#searchTable", function () {
        $(this.dataset.table).DataTable().search("").draw();
    });

    //Open Modal New Item DataTable
    $(document).on("click", "#new_target", function () {
        handleModal(this);
    });
});

function handleDeleteRow(element) {
    let table = $(element).data("table");
    let url = $(element).data("url");
    handleAlert(
        'Deseja realmente <span class="badge badge-danger">deletar</span> este item?',
        "warning",
        true
    ).then(function (result) {
        if (result.isConfirmed) {
            handleAjax(
                url,
                "DELETE",
                null,
                function (e) {
                    $(table).DataTable().draw();
                    handleAlert(
                        e.message ?? "Item deletado com sucesso!",
                        "success"
                    );
                },
                function (error) {
                    handleAlert(
                        error?.responseJSON?.message ?? "Erro ao deletar item!",
                        "error"
                    );
                }
            );
        }
    });
}

function handleAjax(
    url,
    type,
    data,
    success,
    error,
    beforeSend,
    complete,
    xhrFields
) {
    $.ajax({
        url,
        type,
        data,
        xhrFields,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend,
        success: (data) => {
            if (data?.logout) {
                handleAlert(data?.message, "error").then(function () {
                    window.location.href = data?.redirect;
                });
            } else if (data?.status !== undefined && data?.status === false) {
                handleAlert(data?.message, "error");
            } else {
                success(data);
            }
        },
        error: (er) => {
            if (er.responseJSON?.logout) {
                handleAlert(er.responseJSON?.message, "error").then(
                    function () {
                        window.location.href = er.responseJSON?.redirect;
                    }
                );
            } else {
                error(er);
            }
        },
        complete,
    });
}

function handleModal(element, onSuccess, onError, onBeforeSend, onComplete) {
    let el = $(element);
    handleAjax(
        el.data("url"),
        "GET",
        null,
        function (response) {
            let modal = $(el.data("target"));
            let maxWidth = el.data("width");
            if (maxWidth) {
                modal
                    .find(".modal-dialog")
                    .removeClass(function (index, className) {
                        return (className.match(/\bmw-\S+/g) || []).join(" ");
                    });
                modal.find(".modal-dialog").addClass(`${maxWidth}`);
            }
            modal.modal("hide");
            modal.find(".modal-body").html(response.html);
            modal.modal("show");
            KTComponents.init();
            if (onSuccess) {
                onSuccess();
            }
        },
        function (error) {
            let message = "Erro ao abrir formulário!";
            if (error.message) {
                message = error.message;
            } else if (error.responseJSON?.message) {
                message = error.responseJSON?.message;
            }

            handleAlert(message, "error");
            if (onError) {
                onError();
            }
        },
        onBeforeSend,
        onComplete
    );
}

function handleSubmit(form, validator, isModal = true, isDataTable = true) {
    let modal = $("#modal_master");
    form.on("submit", function (event) {
        event.preventDefault();
        if (validator) {
            validator.validate().then(function (status) {
                if (status === "Valid") {
                    let formData = form.serializeJSON();
                    handleAjax(
                        form.attr("action"),
                        form.attr("method"),
                        formData,
                        function (response) {
                            if (isModal) {
                                modal.modal("hide");
                                modal.find(".modal-boyd").html("");
                            }
                            if (isDataTable) {
                                $(form.data("table")).DataTable().draw();
                            }

                            handleAlert(
                                response.message
                                    ? response.message
                                    : "Operação realizada com sucesso!",
                                "success"
                            );
                        },
                        function (error) {
                            handleAlert(
                                error?.responseJSON?.message ??
                                    "Ops, ocorreu um erro, verifique os dados e tente novamente!!",
                                "error"
                            );
                        },
                        function () {
                            form.find("input, button, select").prop(
                                "disabled",
                                true
                            );
                            form.find(".indicator-label").addClass("d-none");
                            form.find(".indicator-progress").addClass(
                                "d-block"
                            );
                        },
                        function () {
                            form.find("input, button, select").prop(
                                "disabled",
                                false
                            );
                            form.find(".indicator-label").removeClass("d-none");
                            form.find(".indicator-progress").removeClass(
                                "d-block"
                            );
                        }
                    );
                }
            });
        }
    });
}

function handleAlert(
    html,
    type,
    showCancelButton,
    textConfirm,
    textCancel,
    confirmEvent,
    cancelEvent
) {
    return Swal.fire({
        html: html,
        icon: type,
        buttonsStyling: false,
        showCancelButton,
        confirmButtonText: textConfirm ?? "Ok, avançar!",
        cancelButtonText: textCancel ?? "Não, cancelar",
        customClass: {
            actions: "row w-100",
            confirmButton: "col btn btn-primary",
            cancelButton: "col btn btn-danger",
        },
    });
}

function getInstanceFormValidation(form, fields) {
    return FormValidation.formValidation(form, {
        framework: "bootstrap",
        icon: {
            valid: "glyphicon glyphicon-ok",
            invalid: "glyphicon glyphicon-remove",
            validating: "glyphicon glyphicon-refresh",
        },
        fields: fields,
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            excluded: new FormValidation.plugins.Excluded({
                excluded: function (field, element, elements) {
                    let exclude_validation = $(element).attr(
                        "data-exclude-validation"
                    );
                    return exclude_validation === "true" || element.disabled;
                },
            }),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: ".fv-row",
                eleInvalidClass: "",
                eleValidClass: "",
            }),
        },
    });
}
