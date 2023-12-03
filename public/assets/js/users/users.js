/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/js/users/users.js ***!
  \********************************************/


var tableName = '#usersTable';
$(tableName).DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: userUrl
  },
  columnDefs: [{
    'targets': [4],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }],
  columns: [{
    data: 'full_name',
    name: 'first_name'
  }, {
    data: 'email',
    name: 'email'
  }, {
    data: 'mobile',
    name: 'mobile'
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
      var url = userUrl + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#usersTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var userId = $(event.currentTarget).data('id');
  deleteItem(userUrl + userId, tableName, 'User');
});
$(document).on('change', '.isActive', function (event) {
  var userId = $(event.currentTarget).data('id');
  changeIsActive(userId);
});

window.changeIsActive = function (id) {
  $.ajax({
    url: userUrl + id + '/change-is-active',
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