function maxFileSize(input, photoId) {
    const file = input.files[0];    
    if (file) {
        const maxFileSizeMB = 2097152; // 2MB (2*1024*1024)

        if (file.size > maxFileSizeMB) {
            alert('Please upload file smaller than 2 MB.');
            input.value = ''; // clear the file input
            document.getElementById(photoId).src = '';  // clear the preview image 
        } else {
            document.getElementById(photoId).src = window.URL.createObjectURL(file);
        }
    }
}

window.maxFileSize = maxFileSize;