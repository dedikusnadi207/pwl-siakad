function previewUploadedImage(input, img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $(img).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      } else {
        $(img).attr('src', '');
      }
}

function resetUploadedImage(input, img) {
    $(input).val('');
    $(img).attr('src', '');
}
