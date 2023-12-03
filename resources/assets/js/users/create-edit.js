'use strict';

$(document).on('change', '#userImage', function () {
    console.log('in');
    let extension = isValidFile($(this), '.alert');
    if (!isEmpty(extension) && extension != false) {
        $('.alert').html('').hide();
        displayPhoto(this, '#previewImage');
    }
});
