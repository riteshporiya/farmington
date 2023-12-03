/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**********************************************************!*\
  !*** ./resources/assets/js/testimonials/testimonials.js ***!
  \**********************************************************/


var tableName = $('#testimonialsTable').DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [0, 'asc'],
  ajax: {
    url: testimonialUrl
  },
  columnDefs: [{
    'targets': [4, 5],
    'orderable': false,
    'className': 'text-center',
    'width': '5%'
  }, {
    targets: '_all',
    defaultContent: 'N/A'
  }],
  columns: [{
    data: function data(row) {
      return '<img src="' + row.image_url + '" class="rounded-circle datatable-thumbnail-rounded"' + '</img>';
    },
    name: 'id'
  }, {
    data: 'name',
    name: 'name'
  }, {
    data: 'company',
    name: 'company'
  }, {
    data: 'designation',
    name: 'designation'
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
      var url = testimonialUrl + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#testimonialTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('click', '.delete-btn', function (event) {
  var testimonialId = $(event.currentTarget).data('id');
  deleteItem(testimonialUrl + testimonialId, '#testimonialsTable', 'Testimonial');
});
$(document).on('change', '.status', function (event) {
  var testimonialId = $(event.currentTarget).data('id');
  updateStatus(testimonialId);
});

window.updateStatus = function (id) {
  $.ajax({
    url: testimonialUrl + id + '/status',
    method: 'post',
    data: $(this).serialize(),
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#testimonialsTable').DataTable().ajax.reload(null, false);
      }
    }
  });
};
/******/ })()
;