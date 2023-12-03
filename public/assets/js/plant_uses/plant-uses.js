/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/js/plant_uses/plant-uses.js ***!
  \******************************************************/


var tableName = $('#plantUsesTable').DataTable({
  scrollX: true,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [0, 'asc'],
  ajax: {
    url: plantUseUrl
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
    data: 'name',
    name: 'name'
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
      var data = [{
        'id': row.id
      }];
      return prepareTemplateRender('#plantUsesTemplate', data);
    },
    name: 'id'
  }]
});
$(document).on('submit', '#addNewForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnSave');
  loadingButton.button('loading');
  $.ajax({
    url: plantUseCreateUrl,
    type: 'POST',
    data: new FormData(this),
    dataType: 'JSON',
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#addModal').modal('hide');
        $('#plantUsesTable').DataTable().ajax.reload(null, false);
        setTimeout(function () {
          loadingButton.button('reset');
        }, 1000);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
      setTimeout(function () {
        loadingButton.button('reset');
      }, 1000);
    }
  });
});
$(document).on('click', '.edit-btn', function (event) {
  var plantUseId = $(event.currentTarget).data('id');
  renderData(plantUseId);
});

window.renderData = function (id) {
  $.ajax({
    url: plantUseUrl + id + '/edit',
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        var plantUse = result.data;
        $('#plantUseId').val(plantUse.id);
        $('#editName').val(plantUse.name);

        if (isEmpty(result.data.image_url)) {
          $('#editPreviewImage').attr('src', defaultImageUrl);
        } else {
          $('#editPreviewImage').attr('src', result.data.image_url);
        }

        $('#editModal').modal('show');
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    }
  });
};

$(document).on('submit', '#editForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnEditSave');
  loadingButton.button('loading');
  var id = $('#plantUseId').val();
  $.ajax({
    url: plantUseUrl + id,
    type: 'POST',
    data: new FormData($(this)[0]),
    dataType: 'JSON',
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#editModal').modal('hide');
        $('#plantUsesTable').DataTable().ajax.reload(null, false);
      }
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$(document).on('click', '.delete-btn', function (event) {
  var plantUseId = $(event.currentTarget).data('id');
  deleteItem(plantUseUrl + plantUseId, '#plantUsesTable', 'Plant Use');
});
$('#addModal').on('hidden.bs.modal', function () {
  resetModalForm('#addNewForm', '#validationErrorsBox');
  $('#previewImage').attr('src', defaultImageUrl);
});
$('#editModal').on('hidden.bs.modal', function () {
  resetModalForm('#editForm', '#editValidationErrorsBox');
});
$(document).on('change', '.status', function (event) {
  var plantUseId = $(event.currentTarget).data('id');
  updateStatus(plantUseId);
});

window.updateStatus = function (id) {
  $.ajax({
    url: plantUseUrl + id + '/status',
    method: 'post',
    data: $(this).serialize(),
    cache: false,
    success: function success(result) {
      if (result.success) {
        displaySuccessMessage(result.message);
        $('#plantUsesTable').DataTable().ajax.reload(null, false);
      }
    }
  });
};

$(document).on('change', '#plantUseImage', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#previewImage');
  }
});
$(document).on('change', '#editPlantUseImage', function () {
  if (isValidFile($(this), '#validationErrorsBox')) {
    displayPhoto(this, '#editPreviewImage');
  }
});
/******/ })()
;