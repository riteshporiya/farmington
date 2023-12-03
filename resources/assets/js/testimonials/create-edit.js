'use strict';

$(document).on('change', '#testimonialImage', function () {
    let extension = isValidFile($(this), '.alert');
    if (!isEmpty(extension) && extension != false) {
        $('.alert').html('').hide();
        displayPhoto(this, '#previewImage');
    }
});
$(document).ready(function () {

    $('#descriptionId').summernote({
        minHeight: 200,
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['para', ['paragraph']]],
    });
});
