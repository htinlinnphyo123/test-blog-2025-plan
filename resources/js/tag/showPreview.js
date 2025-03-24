var tagValue = $("#tags").text();
if(tagValue){
    $("#tags").text(' ');
    tagValue = tagValue.trim();
    var tagArray = tagValue.split(',').map(tag => tag.trim()).filter(v => v);
    tagArray.forEach(tag => {
        var tagElement = $('<span></span>').text(tag).addClass('cursor-pointer border border-gray-400 rounded-md me-2 px-2 py-1 dark:text-gray-900 dark:border-gray-200 dark:bg-white');
        $('#tags').append(tagElement);
    });
}