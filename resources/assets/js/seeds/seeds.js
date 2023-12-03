'use strict';

let tableName = '#seedsTable';
$(tableName).DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [[0, 'asc']],
    ajax: {
        url: seedUrl,
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
            data: 'name',
            name: 'name'
        },
        {
            data: 'seed_type.name',
            name: 'seed_type.name'
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
                let url = seedUrl + row.id;
                let data = [
                    {
                        'id': row.id,
                        'url': url + '/edit',
                    }];

                return prepareTemplateRender('#seedsTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let seedId = $(event.currentTarget).data('id');
    deleteItem(seedUrl + seedId, tableName, 'Seed');
});

$(document).on('change', '.isActive', function (event) {
    let seedId = $(event.currentTarget).data('id');
    changeIsActive(seedId);
});

window.changeIsActive = function (id) {
    $.ajax({
        url: seedUrl + id + '/status',
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
