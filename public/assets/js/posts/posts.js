/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/js/posts/posts.js ***!
  \********************************************/


var tableName = '#postsTable';
$(tableName).DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: recordsURL
  },
  columnDefs: [{
    'targets': [2],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }],
  columns: [{
    data: 'title',
    name: 'title'
  }, {
    data: 'description',
    name: 'description'
  }, {
    data: function data(row) {
      var url = recordsURL + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#postsTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var recordId = $(event.currentTarget).data('id');
  deleteItem(recordsURL + recordId, tableName, 'Post');
});
/******/ })()
;