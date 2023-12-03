/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/assets/js/gardens/create-edit.js ***!
  \****************************************************/


$(document).on('change', '#gardenImage', function () {
  var extension = isValidFile($(this), '.alert');

  if (!isEmpty(extension) && extension != false) {
    $('.alert').html('').hide();
    displayPhoto(this, '#previewImage');
  }
});
$(document).ready(function () {
  $('#gardenTypeId').select2({
    'width': '100%'
  });
  $('#descriptionId, #gardenCareId').summernote({
    minHeight: 200,
    height: 200,
    toolbar: [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['para', ['paragraph']]]
  });
});
/******/ })()
;