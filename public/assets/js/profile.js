/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/profile.js ***!
  \****************************************/


$(document).on('submit', '#editProfileForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnPrEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: profileUpdateUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      displaySuccessMessage(result.message);
      $('#editProfileModal').modal('hide');
      setTimeout(function () {
        location.reload();
      }, 2000);
    },
    error: function error(result) {
      displayErrorMessage(result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$(document).on('submit', '#changePasswordForm', function (event) {
  event.preventDefault();
  var isValidate = validatePassword();
  console.log(isValidate);

  if (!isValidate) {
    return false;
  }

  var loadingButton = jQuery(this).find('#btnPrPasswordEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: changePasswordUrl,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        $('#changePasswordModal').modal('hide');
        displaySuccessMessage(result.message);
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
$('#editProfileModal').on('hidden.bs.modal', function () {
  resetModalForm('#editProfileForm', '#profilePictureValidationErrorsBox');
});
$('#changeLanguageModal').on('hide.bs.modal', function () {
  resetModalForm('#changeLanguageForm', '#editProfileValidationErrorsBox');
}); // open edit user profile model

$(document).on('click', '.editProfileModal', function (event) {
  renderProfileData();
});

window.renderProfileData = function () {
  $.ajax({
    url: profileUrl,
    type: 'GET',
    success: function success(result) {
      if (result.success) {
        var user = result.data;
        $('#editUserId').val(user.id);
        $('#firstName').val(user.first_name);
        $('#lastName').val(user.last_name);
        $('#userEmail').val(user.email);
        $('#phone').val(user.mobile);
        $('#profilePicturePreview').attr('src', user.avatar);
        $('#editProfileModal').appendTo('body').modal('show');
      }
    }
  });
};

$(document).on('change', '#profilePicture', function () {
  var validFile = isValidFile($(this), '#profilePictureValidationErrorsBox');

  if (validFile) {
    validatePhoto(this, '#profilePicturePreview');
    $('#btnPrEditSave').prop('disabled', false);
  } else {
    $('#btnPrEditSave').prop('disabled', true);
  }
});

window.validatePhoto = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        if (image.height / image.width !== 1) {
          $('#profilePictureValidationErrorsBox').removeClass('d-none');
          $('#profilePictureValidationErrorsBox').html('Image aspect ratio should be 1:1').show();
          $('#btnPrEditSave').prop('disabled', true);
          return false;
        }

        $(selector).attr('src', e.target.result);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

window.isValidFile = function (inputSelector, validationMessageSelector) {
  var ext = $(inputSelector).val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
    $(inputSelector).val('');
    $(validationMessageSelector).removeClass('d-none');
    $(validationMessageSelector).html('The image must be a file of type: jpeg, jpg, png.').show();
    return false;
  }

  $(validationMessageSelector).hide();
  return true;
};

$('#changePasswordModal').on('hidden.bs.modal', function () {
  resetModalForm('#changePasswordForm', '#editPasswordValidationErrorsBox');
});

function validatePassword() {
  var currentPassword = $('#pfCurrentPassword').val().trim();
  var password = $('#pfNewPassword').val().trim();
  var confirmPassword = $('#pfNewConfirmPassword').val().trim();

  if (currentPassword == '' || password == '' || confirmPassword == '') {
    $('#editPasswordValidationErrorsBox').show().html('Please fill all the required fields.');
    return false;
  }

  return true;
}

$(document).on('submit', '#changeLanguageForm', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnLanguageChange');
  loadingButton.button('loading');
  $.ajax({
    url: updateLanguageURL,
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      $('#changePasswordModal').modal('hide');
      displaySuccessMessage(result.message);
      setTimeout(function () {
        location.reload();
      }, 1500);
    },
    error: function error(result) {
      manageAjaxErrors(result, 'editProfileValidationErrorsBox');
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$(document).on('click', '.changePasswordModal', function () {
  $('#changePasswordModal').appendTo('body').modal('show');
});
$(document).on('click', '.changeLanguageModal', function () {
  $('#changeLanguageModal').appendTo('body').modal('show');
});
$(document).ready(function () {
  $('#language').select2({
    width: '100%'
  });
});
/******/ })()
;