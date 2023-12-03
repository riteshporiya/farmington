/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/assets/js/plants/plants.js ***!
  \**********************************************/


var tableName = '#plantsTable';
$(tableName).DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: plantUrl
  },
  columnDefs: [{
    targets: '_all',
    defaultContent: 'N/A'
  }, {
    'targets': [5, 6],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }],
  columns: [{
    data: 'name',
    name: 'name'
  }, {
    data: 'plant_type.name',
    name: 'plant_type.name'
  }, {
    data: 'plant_use.name',
    name: 'plant_use.name'
  }, {
    data: function data(row) {
      if (row.size == 0) return 'Large';else if (row.size == 1) return 'Medium';else return 'Small';
    },
    name: 'size'
  }, {
    data: 'color',
    name: 'color'
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
      var url = plantUrl + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#plantsTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var plantId = $(event.currentTarget).data('id');
  deleteItem(plantUrl + plantId, tableName, 'Plant');
});
$(document).on('change', '.isActive', function (event) {
  var plantId = $(event.currentTarget).data('id');
  changeIsActive(plantId);
});

window.changeIsActive = function (id) {
  $.ajax({
    url: plantUrl + id + '/status',
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