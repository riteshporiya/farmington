'use strict';

let tableName = $('#inquiresTable').DataTable({
    scrollX: true,
    deferRender: true,
    scroller: true,
    processing: true,
    serverSide: true,
    'order': [0, 'asc'],
    ajax: {
        url: inquiryUrl,
    },
    columnDefs: [
        {
            'targets': [3],
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
          data: 'email',
          name: 'email',  
        },
        {
            data: 'mobile',
            name: 'mobile',
        },
        {
            data: function (row) {
                let data = [{'id': row.id}];
                return prepareTemplateRender('#inquiresTemplate',
                    data);
            }, name: 'id',
        },
    ],
});

$(document).on('click', '.delete-btn', function (event) {
    let inquiryId = $(event.currentTarget).data('id');
    deleteItem(inquiryUrl + inquiryId, '#inquiresTable', 'Inquiry');
});

$(document).on('click', '.show-data', function (event) {
    let inquiryId = $(event.currentTarget).data('id');
    $.ajax({
        url: inquiryUrl + inquiryId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#inquiryId').val(result.data.id);
                $('#showName').text(result.data.name);
                $('#showEmail').text(result.data.email);
                $('#showMobile').text(result.data.mobile);
                isEmpty(result.data.message) ? $('#showMessage').
                    text('N/A') : $('#showMessage').
                    text(result.data.message);
                $('#showModal').modal('show');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
});
