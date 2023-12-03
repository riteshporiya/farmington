'use strict';

let tableName = $('#plantTypesTable').DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [0, 'asc'],
    ajax: {
        url: plantTypeUrl,
    },
    columnDefs: [
        {
            'targets': [1, 2],
            'orderable': false,
            'className': 'text-center',
            'width': '5%',
        },
        {
            targets: '_all',
            defaultContent: 'N/A',
        },
    ],
    columns: [
        {
            data: function (row) {
                return '<a href="#" class="show-data link-color" data-id="' +
                    row.id +
                    '">' + row.name + '</a>';
            },
            name: 'name',
        },
        {
            data: function (row) {
                let checked = row.is_active == 0 ? '' : 'checked';
                let data = [
                    {
                        'id': row.id,
                        'checked': checked,
                    }];
                return prepareTemplateRender('#isActive',
                    data);
            },
            name: 'is_active',
        },
        {
            data: function (row) {
                let data = [{'id': row.id}];
                return prepareTemplateRender('#plantTypesTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    const loadingButton = jQuery(this).find('#btnSave');
    loadingButton.button('loading');
    $.ajax({
        url: plantTypeCreateUrl,
        type: 'POST',
        data: new FormData(this),
        dataType: 'JSON',
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addModal').modal('hide');
                $('#plantTypesTable').DataTable().ajax.reload(null, false);
                setTimeout(function () {
                    loadingButton.button('reset');
                }, 1000);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
            setTimeout(function () {
                loadingButton.button('reset');
            }, 1000);
        },
    });
});

$(document).on('click', '.edit-btn', function (event) {
    const plantTypeId = $(event.currentTarget).data('id');
    renderData(plantTypeId);
});

window.renderData = function (id) {
    $.ajax({
        url: plantTypeUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let plantType = result.data;
                $('#plantTypeId').val(plantType.id);
                $('#editName').val(plantType.name);
                $('#editDescription').summernote('code', result.data.description);
                if (isEmpty(result.data.image_url)) {
                    $('#editPreviewImage').
                        attr('src', defaultImageUrl);
                } else {
                    $('#editPreviewImage').
                        attr('src', result.data.image_url);
                }
                $('#editModal').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    const loadingButton = jQuery(this).find('#btnEditSave');
    loadingButton.button('loading');
    const id = $('#plantTypeId').val();
    $.ajax({
        url: plantTypeUrl + id,
        type: 'POST',
        data: new FormData($(this)[0]),
        dataType: 'JSON',
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editModal').modal('hide');
                $('#plantTypesTable').DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
});

$(document).on('click', '.delete-btn', function (event) {
    let plantTypeId = $(event.currentTarget).data('id');
    deleteItem(plantTypeUrl + plantTypeId, '#plantTypesTable', 'Plant Type');
});
$('#addModal').on('hidden.bs.modal', function () {
    resetModalForm('#addNewForm', '#validationErrorsBox');
    $('#description').summernote('code', '');
    $('#previewImage').attr('src', defaultImageUrl);
});
$('#editModal').on('hidden.bs.modal', function () {
    resetModalForm('#editForm', '#editValidationErrorsBox');
});
$(document).on('change', '.status', function (event) {
    let plantTypeId = $(event.currentTarget).data('id');
    updateStatus(plantTypeId);
});

window.updateStatus = function (id) {
    $.ajax({
        url: plantTypeUrl + id + '/status',
        method: 'post',
        data: $(this).serialize(),
        cache: false,
        success: function success(result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#plantTypesTable').DataTable().ajax.reload(null, false);
            }
        }
    });
};

$('#description, #editDescription').summernote({
    minHeight: 200,
    height: 200,
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough']],
        ['para', ['paragraph']]],
});

$(document).on('click', '.show-data', function (event) {
    let plantTypeId = $(event.currentTarget).data('id');
    $.ajax({
        url: plantTypeUrl + plantTypeId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showPlantTYpeId').val(result.data.id);
                $('#showName').text(result.data.name);
                let element = document.createElement('textarea');
                element.innerHTML = (!isEmpty(result.data.description))
                    ? result.data.description
                    : 'N/A';
                $('#showDescription').append(element.value);
                $('#showModal').modal('show');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});
$(document).on('change', '#plantTypeImage', function () {
    if (isValidFile($(this), '#validationErrorsBox')) {
        displayPhoto(this, '#previewImage');
    }
});
$(document).on('change', '#editPlantTypeImage', function () {
    if (isValidFile($(this), '#validationErrorsBox')) {
        displayPhoto(this, '#editPreviewImage');
    }
});
