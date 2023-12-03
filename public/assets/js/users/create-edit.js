/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!**************************************************!*\
  !*** ./resources/assets/js/users/create-edit.js ***!
  \**************************************************/


$(document).on('change', '#userImage', function () {
  console.log('in');
  var extension = isValidFile($(this), '.alert');

  if (!isEmpty(extension) && extension != false) {
    $('.alert').html('').hide();
    displayPhoto(this, '#previewImage');
  }
});
/******/ })()
;