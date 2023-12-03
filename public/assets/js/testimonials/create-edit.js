/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/assets/js/testimonials/create-edit.js ***!
  \*********************************************************/


$(document).on('change', '#testimonialImage', function () {
  var extension = isValidFile($(this), '.alert');

  if (!isEmpty(extension) && extension != false) {
    $('.alert').html('').hide();
    displayPhoto(this, '#previewImage');
  }
});
$(document).ready(function () {
  $('#descriptionId').summernote({
    minHeight: 200,
    height: 200,
    toolbar: [['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['para', ['paragraph']]]
  });
});
/******/ })()
;