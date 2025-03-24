var originalTagsArray = $("#tags").val();
updatePreview(originalTagsArray);

function updatePreview(tagValue) {
    $("#previewContainer").empty();
    if(tagValue){
        var tagArray = tagValue.split(',').map(tag => tag.trim()).filter(v => v);
        tagArray.forEach(tag => {
            var tagElement = $('<span></span>').text(tag).addClass('border border-gray-400 rounded-md me-2 px-2 py-1 dark:text-gray-900 dark:border-gray-200 dark:bg-white');
            $('#previewContainer').append(tagElement);
        });
    }
}
let setTimer;
$('#tags').on('keyup', function(event) {
  clearTimeout(setTimer);
  setTimer = setTimeout(() => {
    let currentValue = $(this).val().trim();
    updatePreview(currentValue);
  }, 300);

});
