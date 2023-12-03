/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/assets/js/gardens/gardens.js ***!
  \************************************************/


var tableName = '#gardensTable';
$(tableName).DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: gardenUrl
  },
  columnDefs: [{
    'targets': [2, 3],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }],
  columns: [{
    data: 'name',
    name: 'name'
  }, {
    data: 'garden_type.name',
    name: 'garden_type.name'
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
      var url = gardenUrl + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#gardensTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var gardenId = $(event.currentTarget).data('id');
  deleteItem(gardenUrl + gardenId, tableName, 'Garden');
});
$(document).on('change', '.isActive', function (event) {
  var gardenId = $(event.currentTarget).data('id');
  changeIsActive(gardenId);
});

window.changeIsActive = function (id) {
  $.ajax({
    url: gardenUrl + id + '/status',
    method: 'post',
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $(tableName).DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
};
/******/ })()
;