'use strict';

let tableName = '#postsTable';
$(tableName).DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: recordsURL,
    },
    columnDefs: [
        {
            'targets': [2,3],
            'orderable': false,
            'className': 'text-center',
            'width': '8%',
        },
    ],
    columns: [
        {
            data: 'title',
            name: 'title'
        },
        {
            data: 'user.full_name',
            name: 'user.full_name'
        },
        {
            data: function (row) {
                let checked = row.is_active == 0 ? '' : 'checked';
                let data = [{ 'id': row.id, 'checked': checked }];
                return prepareTemplateRender('#isActive', data);
            },
            name: 'is_active',
        },
        {
            data: function (row) {
                let url = recordsURL + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];

                return prepareTemplateRender('#postsTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let recordId = $(event.currentTarget).data('id');
    deleteItem(recordsURL + recordId, tableName, 'Blog');
});

$(document).on('change', '.isActive', function (event) {
    let blogId = $(event.currentTarget).data('id');
    changeIsActive(blogId);
});

window.changeIsActive = function (id) {
    $.ajax({
        url: recordsURL + id + '/status',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $(tableName).DataTable().ajax.reload(null, false);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};
