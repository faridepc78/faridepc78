function validateCkeditor(text_field, text_error) {
    CKEDITOR.replace(text_field);
    var length = CKEDITOR.instances[text_field].getData().replace(/<[^>]*>/gi, '').length;
    if (!length) {
        toastr['info'](text_error, 'پیام');
        return false;
    } else {
        return true;
    }
}

function removeSpaces(string) {
    return string.trimStart();
}

function changeStyleType(id) {

    id.keyup(function () {
        var id_value = id.val().length;

        if (id_value != 0) {
            id.css('direction','ltr');
        } else {
            id.css('direction','rtl');
        }
    });

}
