/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/assets/js/schemes/schemes.js ***!
  \************************************************/


var tableName = $('#schemesTable').DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [0, 'asc'],
  ajax: {
    url: schemeUrl
  },
  columnDefs: [{
    'targets': [1, 2],
    'orderable': false,
    'className': 'text-center',
    'width': '5%'
  }, {
    targets: '_all',
    defaultContent: 'N/A'
  }],
  columns: [{
    data: 'title',
    name: 'title'
  }, {
    data: function data(row) {
      var checked = row.is_active == 0 ? '' : 'checked';
      var data = [{
        'id': row.id,
        'checked': checked
      }];
      return prepareTemplateRender('#isActive', data);
    },
    name: 'is_active'
  }, {
    data: function data(row) {
      var url = schemeUrl + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#schemeTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var schemeId = $(event.currentTarget).data('id');
  deleteItem(schemeUrl + schemeId, '#schemesTable', 'Scheme');
});
$(document).on('change', '.status', function (event) {
  var schemeId = $(event.currentTarget).data('id');
  updateStatus(schemeId);
});

window.updateStatus = function (id) {
  $.ajax({
    url: schemeUrl + id + '/status',
    method: 'post',
    data: $(this).serialize(),
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#schemesTable').DataTable().ajax.reload(null, false);
      }
    }
  });
};
/******/ })()
;